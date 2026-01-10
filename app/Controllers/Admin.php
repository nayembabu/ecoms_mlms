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
        $users = $this->db->table('user_full_info')
                        ->groupStart()
                            ->where('user_emails', $query)
                            ->orWhere('user_name', $query)
                            ->orWhere('user_phone_numbers', $query)
                        ->groupEnd()
                        ->join('user_in_role', '', 'left')
                        ->join('role_details', '', 'left')
                        ->join('user_login_details', '', 'left')
                        ->join('user_badge_s', '', 'left')
                        ->join('batch_details', ' ', 'left')
                        ->get()
                        ->getResult();


        // $users = ;
        return $this->response->setJSON($users);
    }

}
