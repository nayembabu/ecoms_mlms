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
    }

    public function index()
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
        $data['setting'] = $this->db->table('settings')
                             ->where('vendor_idd', 1)
                             ->get()
                             ->getRow();
        return view('faucet/auto_income', $data);
    }




}
