<?php

namespace App\Controllers;
use Config\Services;
use App\Libraries\Template;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Database;


class User extends BaseController
{
    protected $session;
    protected $template;
    protected $regModel;
    protected $productModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->session = Services::session();
        $this->template = new Template();
        $this->regModel = new RegModel();
        $this->productModel = new ProductModel();
        $this->db = Database::connect();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // return $this->template->front('user/dashboard');
    }
    public function dashboard()
    {
        $userId = $this->session->get('userInfoId');
        $prevToday = date('Y-m-d', strtotime('-1 day'));
        $data['daily_profit'] = $this->db->table('daily_profit_checkbox')
                                    ->get()
                                    ->getResult();
        $data['profit_check'] = $this->db->table('user_daily_profit_check')
                                    ->where('user_infossss_iddsss', $userId)
                                    ->get()
                                    ->getRow();
        return $this->template->front('user/dashboard', $data);
    }
    public function profile()
    {
        $userId = $this->session->get('userInfoId');
        $userData = $this->regModel->find($userId);
         $data = [
            'title' => 'My Profile',
            'user'  => $userData
        ];
        return $this->template->front('user/profile',$data);
    }
    public function editProfile() {
        $user_id = $this->request->getPost('user_id');
        $user_full_name = $this->request->getPost('user_full_name');
        $user_address = $this->request->getPost('user_full_address');
        $updateData = [
            'user_full_name' => $user_full_name,
            'user_full_address' => $user_address
        ];
        $result = $this->regModel->update($user_id, $updateData);
        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Update failed.']);
        }
    }

    public function show_product_by_cats()
    {
        $data['cats'] = $this->db->table('category')->get()->getResult();
        $data['products'] = $this->db
                                 ->table('product_buying_info')
                                 ->join('product_information', 'product_buying_info.product_buy_product_idd = product_information.id', 'left')
                                 ->join('category', 'product_information.category_id = category.cat_id', 'left')
                                 ->join('sub_category', 'product_information.product_subcat_id = sub_category.sub_cat_idd', 'left')
                                 ->get()
                                 ->getResult();
        return $this->template->front('user/product_by_cats', $data);
    }

    public function income_details_sho_here_view_file()
    {
        $userInfoId = $this->session->get('userInfoId');
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
        $data['product_sells_income'] = $this->db
                                 ->table('product_profit_continue_check')
                                 ->selectSum('profit_amountsss')
                                 ->where('user_info_id_info', $userInfoId)
                                 ->get()
                                 ->getRow()
                                 ->profit_amountsss;
        $data['reffer_income_amnt'] = $this->db
                                 ->table('user_reffer_incomes_show')
                                 ->selectSum('user_reffer_profit_amount')
                                 ->where('user_infos_idd_did', $userInfoId)
                                 ->get()
                                 ->getRow()
                                 ->user_reffer_profit_amount;
        $data['games_income_amnt'] = $this->db
                                 ->table('user_games_incomes_added')
                                 ->selectSum('user_games_profit_amount')
                                 ->where('user_inf_id_unqqqqq', $userInfoId)
                                 ->get()
                                 ->getRow()
                                 ->user_games_profit_amount;
        $data['daily_income_amnt'] = $this->db
                                 ->table('user_daily_profit_check')
                                 ->selectSum('profits_takas_amnt')
                                 ->where('user_infossss_iddsss', $userInfoId)
                                 ->get()
                                 ->getRow()
                                 ->profits_takas_amnt;
        $data['current_wallet_balance'] = $user_added_wallet - $user_used_wallet;
        return $this->template->front('user/income_details_view_file', $data);
    }

    public function view_products_income_details()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['product_sells'] = $this->db
                                 ->table('product_sells_infos')
                                 ->where('sell_user_idd', $userInfoId)
                                 ->where('return_product_price', 0)
                                 ->join('product_information', 'product_sells_infos.product_unq_idd = product_information.id', 'left')
                                 ->get()
                                 ->getResult();
        return $this->template->front('user/product_sells_income_view_file', $data);
    }

    public function get_uncompleted_products_show_here()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['product_sells'] = $this->db
                                 ->table('product_sells_infos')
                                 ->where('sell_user_idd', $userInfoId)
                                 ->where('return_product_price', 0)
                                 ->join('product_information', 'product_sells_infos.product_unq_idd = product_information.id', 'left')
                                 ->get()
                                 ->getResult();
        foreach ($data['product_sells'] as $single) {
            $ths = $this->db
                 ->table('product_profit_continue_check')
                 ->where('product_sells_lot_id', $single->product_sells_info_idd)
                 ->countAllResults();

            $this_day = $this->db
                             ->table('product_profit_continue_check')
                             ->where('product_sells_lot_id', $single->product_sells_info_idd)
                             ->where('now_profit_days_date', date('Y-m-d', time()))
                             ->get()
                             ->getRow();

            if ($ths < $single->profit_continue_days && !$this_day ) {
                $data['product_sell_status'][] = ["status"=>"n","sel_id" => $single->product_sells_info_idd, "prod_id"=>$single->product_unq_idd, "prod_buy_id" => $single->product_buy_lot_id, "profit" => $single->profit_amounts, "days"=> $ths+1];
            }elseif ($ths == $single->profit_continue_days && !$this_day ) {
                $data['product_sell_status'][] = ["status"=>"c","sel_id" => $single->product_sells_info_idd, "prod_id"=>$single->product_unq_idd, "prod_buy_id" => $single->product_buy_lot_id, "profit" => $single->profit_amounts, "days"=> $ths+1];
            }
        }
        return $this->response->setJSON($data);
    }

    public function get_single_uncompleted_product_func()
    {
        $userInfoId = $this->session->get('userInfoId');
        $product_buy_id = $this->request->getPost('product_buy_idd');



    }



}
