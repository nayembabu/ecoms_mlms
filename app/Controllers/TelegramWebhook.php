<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Config\Services;
use App\Libraries\Template;
use App\Libraries\Teams;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Database;
use App\Libraries\BanglaConverter;

class TelegramWebhook extends BaseController
{
    protected $botToken = '8245289808:AAFGK1gZF18dMqgWWYAEg3OEamEgJLfq4VA';

    protected $allowedAdmins = [
            '8054315438',
            '8415759767'
        ];

    protected $session;
    protected $template;
    protected $teams;
    protected $regModel;
    protected $productModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->session = Services::session();
        $this->template = new Template();
        $this->teams        = new Teams();
        $this->regModel     = new RegModel();
        $this->productModel = new ProductModel();
        $this->db           = Database::connect();
        $this->userModel    = new UserModel();
    }

    public function index()
    {
        $update = json_decode(file_get_contents('php://input'), true);

        if (!isset($update['callback_query'])) {
            return;
        }

        $callback = $update['callback_query'];
        $chatId   = $callback['message']['chat']['id'];
        $data     = $callback['data'];
        $messageId= $callback['message']['message_id'];

        // // 🔐 Admin verify
        if (!in_array((string)$chatId, $this->allowedAdmins, true)) {
            $this->sendMessage($chatId, "⚠️ You are not authorized.");
            return;
        }

        [$action, $depositId] = explode('_', $data);

        $deposit = $this->db->table('user_recharge_history')
                                ->where('user_recharge_history_idd', $depositId)
                                ->where('styatus', 0)
                                ->join('user_full_info', 'user_full_info.user_full_info_idd = user_recharge_history.user_info_idsq', 'left')
                                ->get()
                                ->getRow();


        if (!$deposit) {
            $this->sendMessage($chatId, '⚠️ Already processed!');
            return;
        }

        if ($action === 'approve') {

            $this->db->transStart();

            $this->db->table('user_recharge_history')
                    ->where('user_recharge_history_idd', $depositId)
                    ->update([
                        'styatus'   => 1,
                        'app_by'    => $chatId
                    ]);

            $this->db->table('user_added_amounts')->insert([
                        'user_info_id_addeds'       => $deposit->user_info_idsq,
                        'added_amount'              => $deposit->amount_dep,
                        'amount_perpose'            => 'Recharge ',
                        'payment_description'       => 'Deposite Wallet Amount',
                        'times_stamps'              => time()
                    ]);
            $this->db->transComplete();

            $msg = "✅ Deposit Approved\n\n🆔 ID: {$depositId}";
            $s = "✅ Done";

        } else {
            $this->db->table('user_recharge_history')
                    ->where('user_recharge_history_idd', $depositId)
                    ->update([
                        'styatus'   => 2,
                        'app_by'    => $chatId
                    ]);
            $msg = "❌ Deposit Rejected\n\n🆔 ID: {$depositId}";
            $s = "❌ বাদ";
        }

        $this->sendMessage($chatId, $s);
        // $this->editDepositMessage($chatId, $messageId, $textmsg);
    }

    private function sendMessage($chatId, $text)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";

        $data = [
            'chat_id' => $chatId,
            'text'    => $text
        ];

        file_get_contents($url.'?'.http_build_query($data));
    }

    function editDepositMessage($chatId, $messageId, $text)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/editMessageText";

        $data = [
            'message_id' => $messageId,
            'text'       => $text,
            'parse_mode' => 'Markdown',
            'reply_markup' => json_encode([
                'inline_keyboard' => []
            ])
        ];

        file_get_contents($url . '?' . http_build_query($data));
    }


}
