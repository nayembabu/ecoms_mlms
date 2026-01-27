<?php

namespace App\Controllers;

use Config\Services;
use Config\Database;
use App\Libraries\Template;
use App\Libraries\Teams;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Libraries\BanglaConverter;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Faucet extends BaseController
{
    protected $session;
    protected $db;
    protected $template;
    protected $teams;
    protected $regModel;
    protected $productModel;
    protected $userModel;

    public function __construct()
    {
        $this->session      = Services::session();
        $this->db           = Database::connect();
        $this->template     = new Template();
        $this->teams        = new Teams();
        $this->regModel     = new RegModel();
        $this->productModel = new ProductModel();
        $this->userModel    = new UserModel();
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please login again.  ');
        }
    }

    public function index()
    {
        $user_id = $this->session->get('userInfoId');
        $data['setting'] = $this->db->table('settings')
                             ->where('vendor_idd', 1)
                             ->get()
                             ->getRow();
        $data['my_info'] = $this->db->table('user_full_info')
                                    ->where('user_full_info_idd', $user_id)
                                    ->get()
                                    ->getRow();
        return view('faucet/dashboard', $data);
    }

    public function get_all_ads_listing()
    {
        $data_faucet = $this->db->table('ads_management_s')
                                    ->get()
                                    ->getResult();
        echo json_encode($data_faucet);
    }

    public function auto_income_page_view_fun()
    {
        $user_id = $this->session->get('userInfoId');
        $data['setting'] = $this->db->table('settings')
                             ->where('vendor_idd', 1)
                             ->get()
                             ->getRow();
        $data['my_info'] = $this->db->table('user_full_info')
                                    ->where('user_full_info_idd', $user_id)
                                    ->get()
                                    ->getRow();
        return view('faucet/auto_income', $data);
    }

    public function auto_income_second_page_fun()
    {
        $user_id = $this->session->get('userInfoId');
        $data['setting'] = $this->db->table('settings')
                             ->where('vendor_idd', 1)
                             ->get()
                             ->getRow();
        $data['my_info'] = $this->db->table('user_full_info')
                                    ->where('user_full_info_idd', $user_id)
                                    ->get()
                                    ->getRow();
        return view('faucet/auto_income_two', $data);
    }

    public function get_my_total_rcn_balance()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['user_added_wallet'] = $this->db->table('ads_point_add')
                                    ->selectSum('amount')
                                    ->where('user_id', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->amount;
        $data['user_used_wallet'] = $this->db->table('ads_cut_point')
                                    ->selectSum('amount')
                                    ->where('user_id', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->amount;
        $current_rcn_balance = $data['user_added_wallet'] - $data['user_used_wallet'];
        echo json_encode($current_rcn_balance);
    }

    public function add_my_rcn_point_balance()
    {
        $userInfoId = $this->session->get('userInfoId');
        $ads_id = $this->request->getPost('id');
        $amount_rw = $this->request->getPost('rew');
        $data['ads_view'] = [];
        if (is_numeric($ads_id)) {
            $data['ads_view'] = $this->db->table('ads_management_s')
                                 ->where('id', $ads_id)
                                 ->get()
                                 ->getRow();
        }

        $this->db->table('ads_point_add')
                ->insert([
                    'user_id'                       => $userInfoId,
                    'wallet_address'                => 'rcn-0',
                    'source_type'                   => 'View Ads',
                    'source_id'                     => $ads_id,
                    'ad_network'                    => $data['ads_view']->ads_link ?? '',
                    'amount'                        => $data['ads_view']->ads_reward ?? $amount_rw,
                    'currency'                      => 'rcn',
                    'ip_address'                    => $this->request->getIPAddress(),
                    'user_agent'                    => $this->request->getUserAgent()->getAgentString(),
                    'created_at'                    => time(),
                ]);
        $response = [
            'success' => true,
            'message' => $data['ads_view']->ads_reward ?? $amount_rw. ' rcn add successfully.'
        ];
        echo json_encode($response);
        return;
    }




}
