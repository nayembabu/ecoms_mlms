<?php

namespace App\Libraries;
use Config\Services;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Database;


class Template
{
    protected $session;
    protected $regModel;
    protected $productModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->session = Services::session();
        $this->regModel = new RegModel();
        $this->productModel = new ProductModel();
        $this->db = Database::connect();
        $this->userModel = new UserModel();
    }

    public function front($view, $data = [])
    {
        $data['setting'] = $this->db->table('settings')
                             ->where('vendor_idd', 1)
                             ->get()
                             ->getRow();
        if ($this->session->get('isLoggedIn')) {
            $user_id = $this->session->get('userInfoId');
            $data['my_info'] = $this->db->table('user_full_info')
                                        ->where('user_full_info_idd', $user_id)
                                        ->get()
                                        ->getRow();
        }
        echo view('partials/header', $data);
        echo view('partials/topmenu', $data);
        echo view($view, $data);
        echo view('partials/footer', $data);
    }

}
