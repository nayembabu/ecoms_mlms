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
        $userInfoId = $this->session->get('userInfoId');

        if ($role != 'super') {
            $this->session->destroy();
            helper('url');
            header('Location: ' . site_url('logout'));
            exit;
        }
    }

    public function index()
    {
        $data['user_added_wallet'] = $this->db->table('user_added_amounts')
                                    ->selectSum('added_amount')
                                    ->get()
                                    ->getRow()
                                    ->added_amount;
        $data['user_used_wallet'] = $this->db->table('user_cutted_amnt')
                                    ->selectSum('cutting_amounts')
                                    ->get()
                                    ->getRow()
                                    ->cutting_amounts;
        $data['current_wallet_balance'] = $data['user_added_wallet'] - $data['user_used_wallet'];

        $data['ttl_product_sell'] = $this->db->table('product_sells_infos')
                                    ->selectSum('product_sell_price')
                                    ->get()
                                    ->getRow()
                                    ->product_sell_price;
        $data['package_enroll_total'] = $this->db->table('user_package_enroll')
                                    ->selectSum('invested_amount')
                                    ->get()
                                    ->getRow()
                                    ->invested_amount;



        return $this->template->back('admin/dashboard', $data);
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
        // ->join('', ' = ', 'left')
        $user_id = $this->request->getPost('user_id');
        $data['users_data'] = $this->db->table('user_full_info')
                                ->where('user_full_info_idd', $user_id)
                                ->join('user_login_details', 'user_login_details.login_user_idd = user_full_info.user_full_info_idd', 'left')
                                ->join('user_badge_s', 'user_badge_s.batch_user_inf_ids = user_full_info.user_full_info_idd', 'left')
                                ->join('batch_details', 'batch_details.batch_detail_idd = user_badge_s.batch_b_detail_idds', 'left')
                                ->get()
                                ->getRow();

        $data['user_added_wallet'] = $this->db->table('user_added_amounts')
                                    ->selectSum('added_amount')
                                    ->where('user_info_id_addeds', $user_id)
                                    ->get()
                                    ->getRow()
                                    ->added_amount;
        $data['user_used_wallet'] = $this->db->table('user_cutted_amnt')
                                    ->selectSum('cutting_amounts')
                                    ->where('user_cut_user_idd', $user_id)
                                    ->get()
                                    ->getRow()
                                    ->cutting_amounts;
        $data['current_wallet_balance'] = $data['user_added_wallet'] - $data['user_used_wallet'];

        return $this->response->setJSON($data);
    }

    public function add_user_wallet_amount()
    {
        $user_id = $this->request->getPost('user_id');
        $add_amount = $this->request->getPost('add_amount');
        $this->db->table('user_added_amounts')->insert([
            'user_info_id_addeds'       => $user_id,
            'added_amount'              => $add_amount,
            'amount_perpose'            => 'Admin Added',
            'payment_description'       => 'Admin Added Wallet Amount',
            'times_stamps'              => time()
        ]);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function user_wallet_amount_cut()
    {
        $user_id = $this->request->getPost('user_id');
        $add_amount = $this->request->getPost('add_amount');
        $this->db->table('user_cutted_amnt')->insert([
            'user_cut_user_idd'         => $user_id,
            'cutting_amounts'           => $add_amount,
            'cutting_perpose'           => 'Admin Cut',
            'cut_descs'                 => 'Admin Cut Wallet Amount',
            'cuting_date_yy'            => date('Y-m-d', time()),
            'time_stamps'               => time()
        ]);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function account_activate_deactivate()
    {
        $user_id = $this->request->getPost('user_id');

        $current_status = $this->db->table('user_login_details')
                                ->where('login_user_idd', $user_id)
                                ->get()
                                ->getRow()
                                ->status;
        $new_status = ($current_status == 1) ? 0 : 1;
        $this->db->table('user_login_details')
                ->where('login_user_idd', $user_id)
                ->update(['status' => $new_status]);
        $this->db->table('user_full_info')
                ->where('user_full_info_idd', $user_id)
                ->update(['sts' => $new_status]);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function account_suspend_activate()
    {
        $user_id = $this->request->getPost('user_id');
        $current_status = $this->db->table('user_login_details')
                                ->where('login_user_idd', $user_id)
                                ->get()
                                ->getRow()
                                ->status;
        $new_status = ($current_status == 2) ? 1 : 2;
        $this->db->table('user_login_details')
                ->where('login_user_idd', $user_id)
                ->update(['status' => $new_status]);
        $this->db->table('user_full_info')
                ->where('user_full_info_idd', $user_id)
                ->update(['sts' => $new_status]);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function product_management()
    {
        $data['categories'] = $this->db->table('category')
                                    ->get()
                                    ->getResult();
        $data['sub_categories'] = $this->db->table('sub_category')
                                    ->get()
                                    ->getResult();
        return $this->template->back('admin/product_management', $data);
    }

    public function product_buy_management()
    {
        $data['products'] = $this->db->table('product_information')
                                    ->get()
                                    ->getResult();
        return $this->template->back('admin/product_buy_management', $data);
    }

    public function category_management()
    {
        return $this->template->back('admin/category_management');
    }

    public function subcategory_management()
    {
        return $this->template->back('admin/subcategory_management');
    }

    public function get_all_products()
        {
            $all_products = $this->db->table('product_information')
                                        ->orderBy('id', 'DESC')
                                        ->join('category', 'category.cat_id = product_information.category_id', 'left')
                                        ->join('sub_category', 'sub_category.sub_cat_idd = product_information.product_subcat_id', 'left')
                                        ->get()
                                        ->getResult();
            return $this->response->setJSON($all_products);
    }

    public function get_all_product_buy_info()
    {
        $data = $this->db->table('product_buying_info')
                        ->where('product_in_stock !=', 0)
                        ->orderBy('product_buying_info_idd', 'DESC')
                        ->join('product_information', 'product_information.id = product_buying_info.product_buy_product_idd', 'left')
                        ->join('category', 'category.cat_id = product_information.category_id', 'left')
                        ->join('sub_category', 'sub_category.sub_cat_idd = product_information.product_subcat_id', 'left')
                        ->get()
                        ->getResult();
        return $this->response->setJSON($data);
    }

    public function single_product_buy_profile_info()
    {
        $product_id = $this->request->getPost('product_id');
        $data = $this->db->table('product_buying_info')
                        ->where('product_buying_info_idd', $product_id)
                        ->join('product_information', 'product_information.id = product_buying_info.product_buy_product_idd', 'left')
                        ->get()
                        ->getRow();
        return $this->response->setJSON($data);
    }

    public function delete_product_this()
    {
        $product_id = $this->request->getPost('product_id');
        $this->db->table('product_information')
                ->where('id', $product_id)
                ->delete();
        return $this->response->setJSON(['status' => 'success']);
    }

    public function store_new_product()
    {
        $image = $this->request->getFile('image');

        if (!$image->isValid()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'ছবি সঠিক নয়'
            ]);
        }

        $newName = $image->getRandomName();
        $uploadPath = 'inc/img/products_img/';
        $image->move($uploadPath, $newName);

        // 🔥 Resize & Compress
        $imageService = Services::image()
            ->withFile($uploadPath . $newName)
            ->resize(600, 600, true, 'width')
            ->save($uploadPath . $newName, 65);

        $this->db->table('product_information')->insert([
                            'product_name'          => $this->request->getPost('name'),
                            'category_id'           => $this->request->getPost('category'),
                            'product_subcat_id'     => $this->request->getPost('subcategory'),
                            'product_model'     => $this->request->getPost('model'),
                            'product_details'       => $this->request->getPost('details'),
                            'image_thumb'           => $uploadPath.''.$newName,
                        ]);

        return $this->response->setJSON([
            'status' => 'success'
        ]);
    }

    public function get_subcategories_by_category()
    {
        $category_id = $this->request->getGet('category_id');
        $subcategories = $this->db->table('sub_category')
                                ->where('subcat_cat_id', $category_id)
                                ->get()
                                ->getResult();
        return $this->response->setJSON($subcategories);
    }

    public function add_product_buy_info()
    {
        $product_id         = $this->request->getPost('product_id');
        $product_buy_price  = $this->request->getPost('product_buy_price');
        $product_buy_qnty   = $this->request->getPost('product_buy_qnty');
        $daily_profits_percent = $this->request->getPost('daily_profits_percent');
        $daily_profits_amount  = $this->request->getPost('daily_profits_amount');
        $continue_days         = $this->request->getPost('continue_days');

        if (empty($product_id) || empty($product_buy_price) || empty($product_buy_qnty) || empty($daily_profits_percent) || empty($daily_profits_amount) || empty($continue_days)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'সব তথ্য প্রদান করুন।']);
        }elseif (!is_numeric($product_buy_price) || !is_numeric($product_buy_qnty) || !is_numeric($daily_profits_percent) || !is_numeric($daily_profits_amount) || !is_numeric($continue_days)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'সংখ্যাগত মান প্রদান করুন।']);
        }elseif ($product_buy_qnty <= 0 || $daily_profits_percent <= 0 || $daily_profits_amount <= 0 || $continue_days <= 0) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'শূন্য বা ঋণাত্মক মান গ্রহণযোগ্য নয়।']);
        }elseif ($daily_profits_amount > $product_buy_price) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'দৈনিক লাভের পরিমাণ প্রোডাক্টের মূল্যের চেয়ে বেশি হতে পারে না।']);
        }elseif (($daily_profits_percent / 100) * $product_buy_price != $daily_profits_amount) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'দৈনিক লাভের শতাংশ এবং পরিমাণের মধ্যে সামঞ্জস্য নেই।']);
        }elseif ($continue_days < 1) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'চালানোর দিন সংখ্যা কমপক্ষে ১ হতে হবে।']);
        }else {
            $this->db->table('product_buying_info')->insert([
                    'product_buy_product_idd'     => $product_id,
                    'buying_dates'                => date('Y-m-d', time()),
                    'continue_days'               => $continue_days,
                    'expire_datess'               => date('Y-m-d', strtotime('+'.$continue_days.' days')),
                    'daily_profits_amount'        => $daily_profits_amount,
                    'product_buy_qnty'            => $product_buy_qnty,
                    'product_in_stock'            => $product_buy_qnty,
                    'timesstampss'                => time(),
                    'selling_pricess'             => $product_buy_price,
                    'profit_percentagessss'       => $daily_profits_percent,
                ]);

            return $this->response->setJSON(['status' => 'success']);
        }
    }



}
