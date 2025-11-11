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

        $data['user_added_wallet'] = $this->db->table('user_added_amounts')
                                    ->selectSum('added_amount')
                                    ->where('user_info_id_addeds', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->added_amount;
        $data['user_used_wallet'] = $this->db->table('user_cutted_amnt')
                                    ->selectSum('cutting_amounts')
                                    ->where('user_cut_user_idd', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->cutting_amounts;
        $data['current_wallet_balance'] = $data['user_added_wallet'] - $data['user_used_wallet'];

        $this->template->front('user/my_wallet', $data);
    }

    public function buy_a_single_product_with_id()
    {
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

    public function get_my_wallet_amount()
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
        $data['current_wallet_balance'] = $user_added_wallet - $user_used_wallet;
        echo json_encode($data['current_wallet_balance']);
    }

    public function deposite_my_account()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data_ref_users = $this->db->table('user_recharge_history')
                                    ->where('user_info_idsq', $userInfoId)
                                    ->get()
                                    ->getResult();
        $this->template->front('user/deposite_my_wallet_balance_view');
    }

    public function withdraw_my_wallet_balance()
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
        $data['current_wallet_balance'] = $user_added_wallet - $user_used_wallet;
        $data['user_info'] = $this->db->table('user_full_info')
                                    ->where('user_full_info_idd', $userInfoId)
                                    ->get()
                                    ->getRow();
        $data['withdraw_history'] = $this->db->table('user_withdraw_request')
                                    ->where('user_id_unp', $userInfoId)
                                    ->where('approve_status', 0)
                                    ->get()
                                    ->getResult();
        $this->template->front('user/withdraw_my_account_balanced', $data);
    }

    public function withdraw_request() 
    {
        $userInfoId = $this->session->get('userInfoId');
        $withdraw_amount = $this->request->getPost('withdraw_amount');
        $additional_notes = $this->request->getPost('additional_notes');

        $data = [
            'user_id_unp' => $userInfoId,
            'requ_amount_taka' => $withdraw_amount,
            'additional_notes' => $additional_notes,
            'approve_status' => 0,
            'date_today' => date('Y-m-d'),
            'today_times' => time()
        ];
        $this->db->table('user_withdraw_request')->insert($data);
        $last = $this->db->insertID();

        $data = [
            'user_cut_user_idd' => $userInfoId,
            'cutting_amounts' => $withdraw_amount,
            'cut_descs'     => $additional_notes,
            'cutting_perpose' => 'withdraw_request',
            'time_stamps' => time(),
            'cut_any_idd' => $last
        ];
        $this->db->table('user_cutted_amnt')->insert($data);

        return redirect()->to('/user/withdraw')->with('success', 'Your withdrawal request has been submitted successfully.');
    }

    public function set_account_number()
    {
        $this->template->front('user/set_account_number_view');
    }

    public function set_account_number_action()
    {
        $userInfoId = $this->session->get('userInfoId');
        $bank_name = $this->request->getPost('bank_name');
        $account_number = $this->request->getPost('account_number');
        $account_holder_name = $this->request->getPost('account_holder_name');

        $data = [
            'user_withdraw_method' => $bank_name,
            'user_withdraw_nos' => $account_number,
            'payments_names' => $account_holder_name
        ];

        $this->db->table('user_full_info')->where('user_full_info_idd', $userInfoId)->update($data);
        return redirect()->to('/user/dashboard')->with('success', 'Your account details have been saved successfully.');
    }

    public function my_referrals_list()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['ref_users'] = $this->db->table('user_reffer')
                                    ->where('reffer_main_idd', $userInfoId)
                                    ->join('user_full_info', 'user_reffer.reffer_ref_user_idd = user_full_info.user_full_info_idd', 'left')
                                    ->get()
                                    ->getResult();
        $data['batch_users'] = $this->db->table('user_badge_s')
                                    ->where('batch_user_inf_ids', $userInfoId)
                                    ->join('batch_details', 'batch_details.batch_detail_idd = user_badge_s.batch_b_detail_idds', 'left')
                                    ->get()
                                    ->getRow();

        $this->template->front('user/my_referrals_list_view', $data);
    }

    public function add_new_referral_view()
    {
        $this->template->front('user/add_new_referral_view');
    }

    public function add_new_referral_action()
    {
        $userInfoId = $this->session->get('userInfoId');
    }

    public function add_new_referrals()
    {
        $userInfoId = $this->session->get('userInfoId');

        $full_name = $this->request->getPost('fullname');
        $username = $this->request->getPost('user_name');
        $email_no = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

        // Insert into user_full_info
        $data_user = [
            'user_full_name'        => $full_name,
            'user_full_address'     => $address,
            'user_email_no'         => $email_no,
            'user_phone_no'         => $phone,
            'sts'                   => 0,
            'user_reffer_code_times'=> time(),
            'join_date'             => date('Y-m-d'),
            'join_timming'          => time(),
        ];
        $this->db->table('user_full_info')->insert($data_user);
        $new_user_id = $this->db->insertID();
        // Insert into user_login_details
        $data_login = [
            'user_name'      => $username,
            'user_emails'    => $email_no,
            'user_password'  => password_hash($password, PASSWORD_BCRYPT),
            'password_show'  => $password,
            'status'         => 1,
            'login_user_idd' => $userInfoId
        ];
        $this->db->table('user_login_details')->insert($data_login);

        $data_reffer = [
            'ref_reffer_user_idd'   => $userInfoId,
            'rreffer_main_id'       => $new_user_id,
            'entry_times'           => time()
        ];
        $this->db->table('temp_user_reffer')->insert($data_reffer);

        $data_reffer = [
            'rreffer_main_id'       => $userInfoId,
            'ref_reffer_user_idd'   => $new_user_id
        ];
        $this->db->table('temp_user_reffer')->insert($data_reffer);

        return redirect()->to('/user/referrals')->with('success', 'New referral added successfully.');
    }






}