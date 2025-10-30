<?php

namespace App\Controllers;
use Config\Services;
use App\Libraries\Template;
use App\Libraries\Teams;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Database;

class Customer extends BaseController
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
        return $this->template->front('user/dashboard');
    }

    public function get_single_products_by_id()
    {
        $id = $this->request->getGet('id');
        $data['single_product'] = $this->db->table('product_buying_info')
                                        ->where('product_buying_info_idd', $id)
                                        ->join('product_information', 'product_buying_info.product_buy_product_idd = product_information.id', 'left')
                                        ->join('category', 'product_information.category_id = category.cat_id', 'left')
                                        ->join('sub_category', 'product_information.product_subcat_id = sub_category.sub_cat_idd', 'left')
                                        ->get()
                                        ->getRow();
        return $this->template->front('user/single_product', $data);
    }

    public function buy_a_single_product()
    {
        $product_id = $this->request->getPost('product_id');
        $user_id = $this->session->get('userId');
        echo $product_id;
    }

    public function my_wallet_view()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['user_info'] = $this->regModel->find($userInfoId);
// user_added_amounts
        $data['added_amounts'] = $this->db->table('user_added_amounts')
                                    ->where('user_info_id_addeds', $userInfoId)
                                    ->get()
                                    ->getResult();

        $data['used_amounts'] = $this->db->table('user_cutted_amnt')
                                    ->where('user_cut_user_idd', $userInfoId)
                                    ->get()
                                    ->getResult();

        $user_added_wallet = $this->db->table('user_added_amounts')
                                    ->selectSum('added_amount')
                                    ->where('user_info_id_addeds', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->added_amount;
        $user_used_wallet = $this->db->table('user_cutted_amnt')
                                    ->selectSum('cutting_amounts')
                                    ->where('user_cut_user_idd', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->cutting_amounts;
        $data['current_wallet_balance'] = $user_added_wallet - $user_used_wallet;

        $this->template->front('user/my_wallet', $data);
    }

    public function buy_a_single_product_with_id()
    {
        // userInfoId
        // userRole

        $product_id = $this->request->getPost('product_id');
        $user_id = $this->session->get('userInfoId');
        echo $product_id;

    }

    public function view_my_full_teams()
    {
        $user_id = $this->session->get('userInfoId');

        $data['my_info'] = $this->db->table('user_full_info')
                                    ->where('user_full_info_idd', $user_id)
                                    ->get()
                                    ->getRow();

        $data['ref_users'] = $this->db->table('user_reffer')
                                    ->where('reffer_main_idd', $user_id)
                                    ->join('user_full_info', 'user_reffer.reffer_ref_user_idd = user_full_info.user_full_info_idd', 'left')
                                    ->get()
                                    ->getResult();
        $this->template->front('user/my_full_teams', $data);
    }

    public function get_person_reffer_details_by_person_id()
    {
        $product_id = $this->request->getPost('person_id');

        $data_ref_users = $this->db->table('user_reffer')
                                    ->where('reffer_main_idd', $product_id)
                                    ->join('user_full_info', 'user_reffer.reffer_ref_user_idd = user_full_info.user_full_info_idd', 'left')
                                    ->get()
                                    ->getResult();
        echo json_encode($data_ref_users);
    }

    public function transfer_my_wallet_balance()
    {
        $this->template->front('user/transfer_my_wallet_balance_view');
    }

    public function get_person_details_by_person_phone_email()
    {
        $input_post_data = $this->request->getPost('input_data');

        $user_info = $this->db->table('user_full_info')
                              ->where('user_phone_no', $input_post_data)
                              ->get()
                              ->getRow();
        if ($user_info) {
            echo json_encode($user_info);
        }else {
            $user_infos = $this->db->table('user_full_info')
                              ->where('user_email_no', $input_post_data)
                              ->get()
                              ->getRow();
            if ($user_infos) {
                echo json_encode($user_infos);
            }else {
                echo json_encode('No User Found here... ');
            }
        }
    }


}