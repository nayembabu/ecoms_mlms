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
        $user_id = $this->request->getPost('user_id');

        
    }

}
