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

class Customer extends BaseController
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
        return $this->template->front('user/dashboard');
    }

    public function all_package_show_here()
    {
        $data['invest_packages'] = $this->db->table('invest_package')
                                    ->get()
                                    ->getResult();
        return $this->template->front('user/all_package_show_view_file', $data);
    }

    public function buy_single_package_action_form()
    {
        $userInfoId = $this->session->get('userInfoId');
        $package_id = $this->request->getPost('package_id');
        $package_price = $this->request->getPost('package_price');
        $single_package_info = $this->db->table('invest_package')
                                        ->where('invest_package_p_iddd', $package_id)
                                        ->get()
                                        ->getRow();

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
        $current_wallet_balance = $data['user_added_wallet'] - $data['user_used_wallet'];

        if ($current_wallet_balance < $package_price) {
            $response = [
                'success' => false,
                'message' => 'Insufficient wallet balance to purchase this package.'
            ];
            echo json_encode($response);
            return;
        }else {
            $this->db->table('user_package_enroll')
                    ->insert([
                        'user_id'                       => $userInfoId,
                        'package_id'                    => $package_id,
                        'enrollment_date'               => date('Y-m-d', time()),
                        'start_date'                    => date('Y-m-d', time()),
                        'expire_day_numberss'           => $single_package_info->expire,
                        'expiry_date'                   => date('Y-m-d', strtotime("+" . $single_package_info->expire . " days")),
                        'invested_amount'               => $package_price,
                        'daily_return_percnts'          => $single_package_info->daily_return_percentage,
                        'daily_return_rate'             => $single_package_info->invest_amount * ($single_package_info->daily_return_percentage / 100),
                        'total_earned'                  => 0,
                        'status'                        => 1,
                        'payment_status'                => 0,
                        'transaction_id'                => 0,
                        'last_return_calculated_date'   => 0,
                        'created_at'                    => date('Y-m-d H:i:s'),
                        'updated_at'                    => date('Y-m-d H:i:s')
                    ]);
            $last_insert_id = $this->db->insertID();
            // Deduct from user's wallet
            $data_deduct = [
                'user_cut_user_idd'     => $userInfoId,
                'cutting_perpose'       => 'package_purchase',
                'cut_descs'             => 'Purchased package ID: ' . $package_id,
                'cutting_amounts'       => $package_price,
                'cut_any_idd'           => $last_insert_id,
                'time_stamps'           => time(),
            ];
            $this->db->table('user_cutted_amnt')->insert($data_deduct);
            $response = [
                'success' => true,
                'message' => 'Package purchased successfully.'
            ];
            echo json_encode($response);
            return;
        }
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
        $user_id = $this->session->get('userId');
        $product_id = $this->request->getPost('product_id');
        echo $product_id;
    }

    public function my_wallet_view()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['user_info'] = $this->regModel->find($userInfoId);

        $data['added_amounts'] = $this->db->table('user_added_amounts')
                                    ->where('user_info_id_addeds', $userInfoId)
                                    ->limit(20)
                                    ->get()
                                    ->getResult();

        $data['used_amounts'] = $this->db->table('user_cutted_amnt')
                                    ->where('user_cut_user_idd', $userInfoId)
                                    ->limit(20)
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

        $rootUser = $this->db->table('user_full_info')
            ->where('user_full_info_idd', $user_id)
            ->get()
            ->getRowArray();


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
            $getdata = [
                    'user_id'       => $user_info->user_full_info_idd,
                    'user_pic'      => $user_info->user_pro_pic_paths,
                    'full_name'     => $user_info->user_full_name,
                    'email_no'      => $user_info->user_email_no,
                    'full_address'  => $user_info->user_full_address,
                    'phone_no'      => $user_info->user_phone_no,
                ];
            echo json_encode($getdata);
        }else {
            $user_infos = $this->db->table('user_full_info')
                              ->where('user_email_no', $input_post_data)
                              ->get()
                              ->getRow();
            if ($user_infos) {
                $getdata = [
                        'user_id'       => $user_info->user_full_info_idd,
                        'user_pic'      => $user_infos->user_pro_pic_paths,
                        'full_name'     => $user_infos->user_full_name,
                        'email_no'      => $user_infos->user_email_no,
                        'full_address'  => $user_infos->user_full_address,
                        'phone_no'      => $user_infos->user_phone_no,
                    ];
                echo json_encode($getdata);
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

        $data['present_reffers'] = $this->db->table('user_reffer a')
                                    ->where('a.reffer_main_idd', $userInfoId)
                                    ->join('user_full_info b', 'a.reffer_ref_user_idd = b.user_full_info_idd', 'left')
                                    ->join('user_badge_s c', 'a.reffer_ref_user_idd = c.batch_user_inf_ids', 'left')
                                    ->where('c.batch_b_detail_idds', $data['batch_users']->batch_detail_idd)
                                    ->get()
                                    ->getResult();

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
            'user_name'             => $username,
            'user_emails'           => $email_no,
            'user_password'         => password_hash($password, PASSWORD_BCRYPT),
            'password_show'         => $password,
            'user_phone_numbers'    => $phone,
            'status'                => 1,
            'login_user_idd'        => $new_user_id
        ];
        $this->db->table('user_login_details')->insert($data_login);

        $data_reffer = [
            'ref_reffer_user_idd'   => $new_user_id,
            'rreffer_main_id'       => $userInfoId,
            'entry_times'           => time()
        ];
        $this->db->table('temp_user_reffer')->insert($data_reffer);

        $data_reffer = [
            'role_user_idd'   => $new_user_id,
            'role_role_idd'   => 2,
        ];
        $this->db->table('user_in_role')->insert($data_reffer);

        return redirect()->to('/user/referrals')->with('success', 'New referral added successfully.');
    }

    public function transfer_wallet_amount_to_user()
    {
        $userInfoId = $this->session->get('userInfoId');
        $user_id_transfer = $this->request->getPost('user_id_transfer');
        $transfer_amount = $this->request->getPost('transfer_amount');

        $data_transfer = [
            'cutting_user_idd'  => $userInfoId,
            'added_user_idd'    => $user_id_transfer,
            'transfer_amounts'  => $transfer_amount,
            'tranfer_dates'     => date('Y-m-d'),
            'tranfer_times'     => time()
        ];
        $this->db->table('user_transfer_balance_info')->insert($data_transfer);
        $new_transfer_id = $this->db->insertID();

        // Deduct from sender's wallet
        $data_deduct = [
            'user_cut_user_idd'     => $userInfoId,
            'cutting_perpose'       => 'balance_transfer',
            'cut_descs'             => 'Balance transfer to user ID: ' . $user_id_transfer,
            'cutting_amounts'       => $transfer_amount,
            'cut_any_idd'           => $new_transfer_id,
            'time_stamps'           => time(),
        ];
        $this->db->table('user_cutted_amnt')->insert($data_deduct);

        $data_added = [
            'added_amount'               => $transfer_amount,
            'user_info_id_addeds'        => $user_id_transfer,
            'amount_perpose'             => 'balance_transfer',
            'payment_description'       => 'Balance transfer from user ID: ' . $userInfoId,
            'times_stamps'               => time(),
            'any_id_here'                => $new_transfer_id,
        ];
        $this->db->table('user_added_amounts')->insert($data_added);
        $response = [
            'success' => true,
            'message' => 'Amount transferred successfully.'
        ];
        echo json_encode($response);
    }

    public function view_all_products()
    {
        $data['all_products'] = $this->db->table('product_information')
                                    ->join('category', 'product_information.category_id = category.cat_id', 'left')
                                    ->join('sub_category', 'product_information.product_subcat_id = sub_category.sub_cat_idd', 'left')
                                    ->get()
                                    ->getResult();
        $this->template->front('user/view_all_products', $data);
    }

    public function get_all_products_json_output()
    {
        $data['cats'] = $this->db->table('category')->get()->getResult();
        $data['all_products'] = $this->db->table('product_buying_info')
                                    ->where('product_in_stock !=', 0)
                                    ->join('product_information', 'product_information.id = product_buying_info.product_buy_product_idd', 'left')
                                    ->get()
                                    ->getResult();
        echo json_encode($data);
    }

    public function get_single_product_details_by_id()
    {
        $userInfoId = $this->session->get('userInfoId');
        $product_id = $this->request->getPost('product_id');
        $buying_id  = $this->request->getPost('buying_id');

        // Fetch product details based on product_id and buying_id
        $product_details = $this->db->table('product_buying_info')
                                    ->where('product_buying_info_idd', $buying_id)
                                    ->join('product_information', 'product_information.id = product_buying_info.product_buy_product_idd', 'left')
                                    ->get()
                                    ->getRow();
        echo json_encode(['product_details' => $product_details]);
    }

    public function buy_a_single_product_action_form()
    {
        $userInfoId = $this->session->get('userInfoId');
        $product_id = $this->request->getPost('product_id');
        $buying_id  = $this->request->getPost('buying_id');

        $this->teams->enroll_product_self($product_id, $userInfoId, $buying_id);
    }

    /**
     * Build a nested downline tree for a given user id.
     * Returns an array of nodes: ['user_id'=>..., 'full_name'=>..., 'children'=>[...]]
     */
    private function buildDownlineTree($userId, array &$visited = [])
    {
        if (in_array($userId, $visited)) {
            return [];
        }
        $visited[] = $userId;

        $children = $this->db->table('user_reffer')
                             ->where('reffer_main_idd', $userId)
                             ->join('user_full_info', 'user_reffer.reffer_ref_user_idd = user_full_info.user_full_info_idd', 'left')
                             ->join('user_badge_s', 'user_badge_s.batch_user_inf_ids = user_full_info.user_full_info_idd', 'left')
                             ->join('batch_details', 'batch_details.batch_detail_idd = user_badge_s.batch_b_detail_idds', 'left')
                             ->get()
                             ->getResult();

        $tree = [];
        foreach ($children as $child) {
            $childId = $child->reffer_ref_user_idd;
            if (in_array($childId, $visited)) {
                continue;
            }
            $node = [
                'user_id'   => $childId,
                'full_name' => property_exists($child, 'user_full_name') ? $child->user_full_name : null,
                'photo'     => property_exists($child, 'user_pro_pic_paths') ? $child->user_pro_pic_paths : null,
                'level'     => property_exists($child, 'position_no') ? $child->position_no : null,
                'role'      => property_exists($child, 'batch_name') ? $child->batch_name : null,
                'children'  => $this->buildDownlineTree($childId, $visited),
            ];
            $tree[] = $node;
        }
        return $tree;
    }

    /**
     * Count total downline recursively for a given user id.
     * Uses visited array to avoid cycles.
     */
    private function countDownline($userId, array &$visited = [])
    {
        if (in_array($userId, $visited)) {
            return 0;
        }
        $visited[] = $userId;

        $children = $this->db->table('user_reffer')
                             ->where('reffer_main_idd', $userId)
                             ->get()
                             ->getResult();

        $count = 0;
        foreach ($children as $child) {
            $childId = $child->reffer_ref_user_idd;
            if (in_array($childId, $visited)) {
                continue;
            }
            $count += 1;
            $count += $this->countDownline($childId, $visited);
        }
        return $count;
    }

    /**
     * Public endpoint: returns JSON with total downline count and nested tree.
     * Accepts POST `user_id` (optional — falls back to session `userInfoId`).
     */
    public function get_downline_recursive()
    {
        $userId = $this->request->getPost('user_id') ?? $this->session->get('userInfoId');
        $data_my_info = $this->regModel->find($userId);
        if (empty($userId)) {
            echo json_encode(['error' => 'No user id provided']);
            return;
        }

        $visitedForTree = [];
        $tree = $this->buildDownlineTree($userId, $visitedForTree);

        $visitedForCount = [];
        $count = $this->countDownline($userId, $visitedForCount);

        $this->template->front('user/my_full_teams_php_array', ['count' => $count, 'tree' => $tree, 'my_info' => $data_my_info]);
    }

    public function my_invest_package_show_here()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['user_packages'] = $this->db->table('user_package_enroll')
                                    ->where('user_id', $userInfoId)
                                    ->join('invest_package', 'user_package_enroll.package_id = invest_package.invest_package_p_iddd', 'left')
                                    ->get()
                                    ->getResult();
        $this->template->front('user/my_invest_package_show_view_file', $data);
    }

    public function my_invest_package_show_here_single_package($invest_package)
    {
        if (!is_numeric($invest_package)) {
            return redirect()->to('user/myPackage')->with('error', 'Invalid package ID.');
        }else {
            $userInfoId = $this->session->get('userInfoId');
            $data['single_invest_package'] = $this->db->table('user_package_enroll')
                                        ->where('user_package_enroll.id', $invest_package)
                                        ->join('invest_package', 'user_package_enroll.package_id = invest_package.invest_package_p_iddd', 'left')
                                        ->get()
                                        ->getRow();

            if (!$data['single_invest_package'] || $data['single_invest_package']->user_id != $userInfoId) {
                return redirect()->to('user/myPackage')->with('error', 'Package not found or access denied.');
            }else {
                $data['invest_pachage_roi'] = $this->db->table('user_invest_pachage_roi_insert')
                                            ->where('user_enroll_package_idd_unq', $data['single_invest_package']->package_id)
                                            ->where('user_enroll_package_idd_unq', $data['single_invest_package']->id)
                                            ->get()
                                            ->getResult();
                return $this->template->front('user/my_invest_package_single_view_file', $data);
            }
        }
    }

    public function get_withdraw_history()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['user_withdraws'] = $this->db->table('user_withdraw_request')
                                    ->where('user_id_unp', $userInfoId)
                                    ->get()
                                    ->getResult();
        return $this->template->front('user/withdraw_history_all', $data);
    }

    public function my_inactive_referral_lists()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['referrals'] = $this->db->table('temp_user_reffer')
                                        ->where('rreffer_main_id', $userInfoId)
                                        ->join('user_full_info', 'user_full_info.user_full_info_idd = temp_user_reffer.ref_reffer_user_idd', 'left')
                                        ->get()
                                        ->getResult();
        return $this->template->front('user/my_inactive_referrals_file', $data);
    }

}