<?php

namespace App\Controllers;
use Config\Services;
use App\Libraries\Template;
use App\Libraries\Teams;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Database;
use App\Libraries\BanglaConverter;

class Admin extends BaseController
{
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

        $role = $this->session->get('userRole');
        if ($role == 'cust') {
            $this->session->destroy();
            helper('url');
            header('Location: ' . site_url('logout'));
            exit;
        }
    }

    public function index()
    {
        return $this->template->back('admin/dashboard');
    }
    public function user_management()
    {
        return $this->template->back('admin/user_management');
    }

    public function search_user_info()
    {
        $query = $this->request->getPost('query');
        $users = $this->db->table('user_login_details')
                        ->groupStart()
                            ->where('user_emails', $query)
                            ->orWhere('user_name', $query)
                            ->orWhere('user_phone_numbers', $query)
                            ->orWhere('user_reffer_code_times', $query)
                        ->groupEnd()
                        ->join('user_full_info', 'user_login_details.login_user_idd = user_full_info.user_full_info_idd', 'left')
                        ->get()
                        ->getResult();
        return $this->response->setJSON($users);
    }

    public function single_user_profile_info()
    {
        // ->join('', ' = ', 'left')
        $user_id = $this->request->getPost('user_id');
        $data['users_data'] = $this->db->table('user_full_info')
                                ->where('user_full_info_idd', $user_id)
                                ->join('user_login_details', 'user_login_details.login_user_idd = user_full_info.user_full_info_idd', 'left')
                                ->join('user_badge_s', 'user_badge_s.batch_user_inf_ids = user_full_info.user_full_info_idd', 'left')
                                ->join('batch_details', 'batch_details.batch_detail_idd = user_badge_s.batch_b_detail_idds', 'left')
                                ->get()
                                ->getRow();

        $data['user_added_wallet'] = $this->db->table('user_added_amounts')
                                    ->selectSum('added_amount')
                                    ->where('user_info_id_addeds', $user_id)
                                    ->get()
                                    ->getRow()
                                    ->added_amount;
        $data['user_used_wallet'] = $this->db->table('user_cutted_amnt')
                                    ->selectSum('cutting_amounts')
                                    ->where('user_cut_user_idd', $user_id)
                                    ->get()
                                    ->getRow()
                                    ->cutting_amounts;
        $data['current_wallet_balance'] = $data['user_added_wallet'] - $data['user_used_wallet'];

        return $this->response->setJSON($data);
    }

    public function add_user_wallet_amount()
    {
        $user_id = $this->request->getPost('user_id');
        $add_amount = $this->request->getPost('add_amount');
        $this->db->table('user_added_amounts')->insert([
            'user_info_id_addeds'       => $user_id,
            'added_amount'              => $add_amount,
            'amount_perpose'            => 'Admin Added',
            'payment_description'       => 'Admin Added Wallet Amount',
            'times_stamps'              => time()
        ]);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function user_wallet_amount_cut()
    {
        $user_id = $this->request->getPost('user_id');
        $add_amount = $this->request->getPost('add_amount');
        $this->db->table('user_cutted_amnt')->insert([
            'user_cut_user_idd'         => $user_id,
            'cutting_amounts'           => $add_amount,
            'cutting_perpose'           => 'Admin Cut',
            'cut_descs'                 => 'Admin Cut Wallet Amount',
            'cuting_date_yy'            => date('Y-m-d', time()),
            'time_stamps'               => time()
        ]);
        return $this->response->setJSON(['status' => 'success']);
    }

}
