<?php

namespace App\Controllers;
use Config\Services;
use App\Libraries\Template;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Database;
use App\Libraries\BanglaConverter;



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

    private function getDownline($userId, &$total = [])
    {
        $rows = $this->db->table('user_reffer')
            ->where('reffer_main_idd', $userId)
            ->get()
            ->getResult();

        foreach ($rows as $row) {
            if (!in_array($row->reffer_ref_user_idd, $total)) {
                $total[] = $row->reffer_ref_user_idd;
                $this->getDownline($row->reffer_ref_user_idd, $total);
            }
        }
        return $total;
    }

    public function dashboard()
    {
        $userId = $this->session->get('userInfoId');
        $data['my_info'] = $this->regModel->find($userId);
        $data['user_batch'] = $this->db->table('user_badge_s')
                                           ->where('batch_user_inf_ids', $userId)
                                           ->join('batch_details', 'batch_details.batch_detail_idd = user_badge_s.batch_b_detail_idds', 'left')
                                           ->get()
                                           ->getRow();

        $data['my_invest_package'] = $this->db->table('user_badge_s')
                                            ->where('batch_user_inf_ids', $userId)
                                            ->join('batch_details', 'batch_details.batch_detail_idd = user_badge_s.batch_b_detail_idds', 'left')
                                            ->get()
                                            ->getRow();

        $downlines = $this->getDownline($userId);
        $data['downline_count'] = count($downlines);

        $user_added_wallet = $this->db->table('user_added_amounts')
                                    ->selectSum('added_amount')
                                    ->where('user_info_id_addeds', $userId)
                                    ->get()
                                    ->getRow()
                                    ->added_amount;
        $user_used_wallet = $this->db->table('user_cutted_amnt')
                                    ->selectSum('cutting_amounts')
                                    ->where('user_cut_user_idd', $userId)
                                    ->get()
                                    ->getRow()
                                    ->cutting_amounts;
        $data['product_sells_income'] = $this->db
                                 ->table('product_profit_continue_check')
                                 ->selectSum('profit_amountsss')
                                 ->where('user_info_id_info', $userId)
                                 ->get()
                                 ->getRow()
                                 ->profit_amountsss;
        $data['reffer_income_amnt'] = $this->db
                                 ->table('user_reffer_incomes_show')
                                 ->selectSum('user_reffer_profit_amount')
                                 ->where('user_infos_idd_did', $userId)
                                 ->get()
                                 ->getRow()
                                 ->user_reffer_profit_amount;
        $data['games_income_amnt'] = $this->db
                                 ->table('user_games_incomes_added')
                                 ->selectSum('user_games_profit_amount')
                                 ->where('user_inf_id_unqqqqq', $userId)
                                 ->get()
                                 ->getRow()
                                 ->user_games_profit_amount;
        $data['daily_income_amnt'] = $this->db
                                 ->table('user_daily_profit_check')
                                 ->selectSum('profits_takas_amnt')
                                 ->where('user_infossss_iddsss', $userId)
                                 ->get()
                                 ->getRow()
                                 ->profits_takas_amnt;
        $data['current_wallet_balance'] = $user_added_wallet - $user_used_wallet;

        return $this->template->front('user/dashboard', $data);
    }

    public function get_daily_check_func()
    {
        $data['daily_profit'] = $this->db->table('daily_profit_checkbox')
                                    ->get()
                                    ->getResult();
        $data['profit_check'] = $this->db->table('user_daily_profit_check')
                                    ->where('user_infossss_iddsss', $userId)
                                    ->get()
                                    ->getResult();


        /* <div class="profit-box "><i class="bi bi-cash-stack"></i><h6><?= // $profit->days_list; ?> দিন </h6><h5>৳ <b><?= // $profit->profit_amount; ?></b></h5></div>; */

        return $this->response->setJSON(['success' => true, 'data' => $data]);
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
        $start_of_month = date('Y-m-01 00:00:00');
        $end_of_month   = date('Y-m-t 23:59:59');

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
        $data['user_added_info'] = $this->db->table('user_added_amounts')
                                    ->where('user_info_id_addeds', $userInfoId)
                                    ->where('times_stamps >=', strtotime($start_of_month))
                                    ->where('times_stamps <=', strtotime($end_of_month))
                                    ->orderBy('times_stamps', 'DESC')
                                    ->get()
                                    ->getResult();
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
                                 ->orderBy('product_sells_info_idd', 'DESC')
                                 ->join('product_information', 'product_sells_infos.product_unq_idd = product_information.id', 'left')
                                 ->get()
                                 ->getResult();

        $data['product_profit_s'] = $this->db
                                 ->table('product_profit_continue_check')
                                 ->where('user_info_id_info', $userInfoId)
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

    public function add_profit_in_sell_products()
    {
        $userInfoId = $this->session->get('userInfoId');
        $sells_id = $this->request->getPost('sells_id');
        $product_buy_id = $this->request->getPost('product_buy_id');
        $product_id = $this->request->getPost('product_id');

        $product_sells_info = $this->db
                                 ->table('product_sells_infos')
                                 ->where('product_sells_info_idd', $sells_id)
                                 ->where('return_product_price', 0)
                                 ->get()
                                 ->getRow();

        if ($product_sells_info) {
            $ths = $this->db
                        ->table('product_profit_continue_check')
                        ->where('product_sells_lot_id', $product_sells_info->product_sells_info_idd)
                        ->countAllResults();
            if ($ths < 7) {
                $this->db->table('product_profit_continue_check')->insert([
                    "user_info_id_info"         => $userInfoId,
                    "product_id_infosss"        => $product_sells_info->product_unq_idd,
                    "product_buy_lot_iddsdds"   => $product_sells_info->product_buy_lot_id,
                    "product_sells_lot_id"      => $product_sells_info->product_sells_info_idd,
                    "profit_amountsss"          => $product_sells_info->profit_amounts,
                    "now_profit_days_date"      => date('Y-m-d', time()),
                    "now_profit_days_times"     => time(),
                ]);

                $this->db->table('user_added_amounts')->insert([
                    "added_amount"                  => $product_sells_info->profit_amounts,
                    "user_info_id_addeds"           => $userInfoId,
                    "amount_perpose"                => 'Products Profit added',
                    "times_stamps"                  => time(),
                ]);

            }else if ($ths >= 7) {
                $this->db->table('product_sells_infos')
                         ->where('product_sells_info_idd', $product_sells_info->product_sells_info_idd)
                         ->update([
                            "return_product_price"  => 1,
                            "return_date"           => date('Y-m-d', time())
                         ]);

                $this->db->table('user_added_amounts')->insert([
                    "added_amount"                  => $product_sells_info->product_sell_price,
                    "user_info_id_addeds"           => $userInfoId,
                    "amount_perpose"                => 'Products Price Return',
                    "times_stamps"                  => time(),
                    "any_id_here"                   => $product_sells_info->product_unq_idd
                ]);

            }
        }

    }

    public function daily_checking_func_s()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data = [];
        return $this->template->front('user/user_daly_profit_check', $data);
    }

    public function gamming_all_page_func()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['lottery_info'] = $this->db
                                 ->table('lotary_shedual')
                                 ->where('expire_dates >=', date('Y-m-d', time()))
                                 ->get()
                                 ->getRow();
        return $this->template->front('user/gamming_all_view_pages', $data);
    }

    public function lottery_system_func_system()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['lottery_info'] = $this->db
                                 ->table('lotary_shedual')
                                 ->where('expire_dates >=', date('Y-m-d', time()))
                                 ->get()
                                 ->getRow();
        if ($data['lottery_info']) {
            $data['lottery_price_info'] = $this->db
                                    ->table('lottery_prices')
                                    ->where('lottery_unq_idddd', $data['lottery_info']->lotary_shedual_idd)
                                    ->get()
                                    ->getResult();
            $data['user_lottery_attend'] = $this->db
                                    ->table('user_lottery_enrolls')
                                    ->where('user_lottery_nos', $data['lottery_info']->lotary_shedual_idd)
                                    ->get()
                                    ->getResult();
            $data['total_price'] = $this->db->table('lottery_prices')
                                    ->selectSum('prices_amountss')
                                    ->get()
                                    ->getRow()
                                    ->prices_amountss ?? 0;
            $data['buy_ticket_info'] = $this->db
                                        ->table('user_lottery_enrolls')
                                        ->where('user_lottery_nos', $data['lottery_info']->lotary_shedual_idd)
                                        ->where('user_id_infoss', $userInfoId)
                                        ->get()
                                        ->getResult();
            $data['total_buy_ticket'] = $this->db
                                        ->table('user_lottery_enrolls')
                                        ->where('user_lottery_nos', $data['lottery_info']->lotary_shedual_idd)
                                        ->where('user_id_infoss', $userInfoId)
                                        ->countAllResults();
        }
        return $this->template->front('user/lottery_all_view_pages', $data);
    }

    public function buy_ticket_func()
    {
        $userInfoId = $this->session->get('userInfoId');
        $lottery_id = $this->request->getPost('lottery_id');

        $lottery_info = $this->db
                                 ->table('lotary_shedual')
                                 ->where('lotary_shedual_idd', $lottery_id)
                                 ->get()
                                 ->getRow();
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
        $current_balance = $user_added_wallet - $user_used_wallet;
        if ($lottery_info && $current_balance > $lottery_info->ticket_prices) {
                $this->db->table('user_lottery_enrolls')->insert([
                        "user_id_infoss"    => $userInfoId,
                        "bet_amountss_s"    => $lottery_info->ticket_prices,
                        "user_lottery_nos"  => $lottery_id,
                        "users_ticket_noss" => rand(0, 60).'-'.time(),
                        "entry_timess"      => time(),
                        "entry_datess"      => date('Y-m-d', time()),
                ]);
                $this->db->table('user_cutted_amnt')->insert([
                        "user_cut_user_idd"     => $userInfoId,
                        "cutting_perpose"       => 'লটারী টিকেট কেনা',
                        "cut_descs"             => 'লটারী টিকেট কেনায় খরচ হয়েছে। ',
                        "cutting_amounts"       => $lottery_info->ticket_prices,
                        "cut_any_idd"           => '',
                        "cuting_date_yy"        => date('Y-m-d', time()),
                        "time_stamps"           => time(),
                ]);
                $this->db->table('user_lottery_winning_price')->insert([
                        "user_iddd"                 => $userInfoId,
                        "lottery_idd"               => $lottery_id,
                        "possition_ss_price"        => '',
                        "lottery_price_amounts"     => 0,
                        "entry_dates"               => date('Y-m-d', time()),
                        "entry_times"               => time(),
                ]);
            echo json_encode(['status'=>1, 'msg'=>'Buy Ticket Successfully']);
        }
    }

    public function all_lottery_history_system_func()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['all_lotary_info'] = $this->db
                                        ->table('lotary_shedual')
                                        ->orderBy('lotary_shedual_idd', 'DESC')
                                        ->get()
                                        ->getResult();
        return $this->template->front('user/all_lottery_history_system_view_file', $data);
    }

    public function single_lottery_system_func_views()
    {
        $userInfoId = $this->session->get('userInfoId');
        $lottery_id = $this->request->getGet('id');
        if ($lottery_id) {
            $data['lottery_info'] = $this->db
                                        ->table('lotary_shedual')
                                        ->where('lotary_shedual_idd', $lottery_id)
                                        ->get()
                                        ->getRow();
            if ($data['lottery_info']) {

                $data['lottery_price_info'] = $this->db
                                                    ->table('lottery_prices')
                                                    ->where('lottery_unq_idddd', $data['lottery_info']->lotary_shedual_idd)
                                                    ->get()
                                                    ->getResult();
                $data['user_lottery_attend'] = $this->db
                                                    ->table('user_lottery_enrolls')
                                                    ->where('user_lottery_nos', $data['lottery_info']->lotary_shedual_idd)
                                                    ->join('user_full_info', 'user_lottery_enrolls.user_id_infoss = user_full_info.user_full_info_idd', 'left')
                                                    ->get()
                                                    ->getResult();
                $data['total_price'] = $this->db->table('lottery_prices')
                                            ->selectSum('prices_amountss')
                                            ->get()
                                            ->getRow()
                                            ->prices_amountss ?? 0;
                $data['my_buying_ticket_info'] = $this->db
                                                    ->table('user_lottery_enrolls')
                                                    ->where('user_lottery_nos', $data['lottery_info']->lotary_shedual_idd)
                                                    ->where('user_id_infoss', $userInfoId)
                                                    ->get()
                                                    ->getResult();
                $data['lottery_winning_info'] = $this->db
                                                    ->table('user_lottery_winning_price')
                                                    ->where('lottery_idd', $data['lottery_info']->lotary_shedual_idd)
                                                    ->orderBy('possition_ss_price', 'ASC')
                                                    ->join('user_full_info', 'user_lottery_winning_price.user_iddd = user_full_info.user_full_info_idd', 'left')
                                                    ->get()
                                                    ->getResult();
                $data['total_buy_ticket'] = $this->db
                                                ->table('user_lottery_enrolls')
                                                ->where('user_lottery_nos', $data['lottery_info']->lotary_shedual_idd)
                                                ->where('user_id_infoss', $userInfoId)
                                                ->countAllResults();

                return $this->template->front('user/single_lottery_system_func_views_file', $data);
            }else {
                return redirect()->to('user/all_lottery_history_system');
            }
        }else {
            return redirect()->to('user/all_lottery_history_system');
        }
    }

    public function your_lottery_history_system_func_views()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['my_lotary_info'] = $this->db
                                        ->table('lotary_shedual')
                                        ->join('user_lottery_enrolls', 'lotary_shedual.lotary_shedual_idd = user_lottery_enrolls.user_lottery_nos', 'inner')
                                        // ->join('user_lottery_winning_price', 'user_lottery_winning_price.lottery_idd = lotary_shedual.lotary_shedual_idd', 'left')
                                        ->where('user_lottery_enrolls.user_id_infoss', $userInfoId)
                                        ->orderBy('lotary_shedual.lotary_shedual_idd', 'DESC')
                                        ->get()
                                        ->getResult();
        return $this->template->front('user/your_lottery_history_system_view_file', $data);
    }




}
