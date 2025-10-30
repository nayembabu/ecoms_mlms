<?php

namespace App\Controllers;
use Config\Services;
use App\Libraries\Template;
use App\Libraries\Teams;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Database;

class Home extends BaseController
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
        $this->session      = Services::session();
        $this->template     = new Template();
        $this->teams        = new Teams();
        $this->regModel     = new RegModel();
        $this->productModel = new ProductModel();
        $this->db           = Database::connect();
        $this->userModel    = new UserModel();
    }

    public function index()
    {
        $data['cats'] = $this->db->table('category')->get()->getResult();
        $data['products'] = $this->db
                                 ->table('product_buying_info')
                                 ->join('product_information', 'product_buying_info.product_buy_product_idd = product_information.id', 'left')
                                 ->join('category', 'product_information.category_id = category.cat_id', 'left')
                                 ->join('sub_category', 'product_information.product_subcat_id = sub_category.sub_cat_idd', 'left')
                                 ->get()
                                 ->getResult();
        return $this->template->front('welcome_message', $data);
    }

    public function login()
    {
        return $this->template->front('front/login');
    }
}
