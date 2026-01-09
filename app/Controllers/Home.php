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
        return view('welcome_message', $data);
    }

    public function login()
    {
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/user/dashboard');
        }else {
            return $this->template->front('front/login');
        }
    }

    public function register_new_referral($refId = null)
    {
        if(!$refId){
            return redirect()->to('/register');
        }else{
            if ($this->session->get('isLoggedIn')) {
                return redirect()->to('/user/add_referral');
            }else {
                $data['user_info'] = $this->db
                                          ->table('user_full_info')
                                          ->where('user_reffer_code_times', $refId)
                                          ->get()
                                          ->getRow();
                if ($data['user_info']) {
                    // User information found
                    $data['referral_id'] = $refId;
                    return view('front/register_new_user_referral', $data);
                }else {
                    // No user found with the given referral code
                    return redirect()->to('/register');
                }
            }
        }
    }

    public function new_referral_added_user()
    {
        $full_name = $this->request->getPost('fullname');
        $username = $this->request->getPost('username');
        $email_no = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $password = $this->request->getPost('password');
        $referral_code = $this->request->getPost('referral_code');
        $referral_id = $this->request->getPost('referral_id');
        $referral_usr_id = $this->request->getPost('referral_usr_id');
        $referral_phn_id = $this->request->getPost('referral_phn_id');

        $data['user_info'] = $this->db
                                    ->table('user_full_info')
                                    ->where('user_reffer_code_times', $referral_code)
                                    ->get()
                                    ->getRow();

        $user_find = $this->userModel
                    ->groupStart()
                        ->where('user_emails', $email_no)
                        ->orWhere('user_name', $username)
                        ->orWhere('user_phone_numbers', $phone)
                    ->groupEnd()
                    ->first();

        if ($data['user_info']) {
            if ($user_find) {
                return redirect()->back()->with('error', 'Email, Phone, or Username already exists.');
            }else {

                $data_user = [
                    'user_full_name'        => $full_name,
                    'user_full_address'     => $address,
                    'user_email_no'         => $email_no,
                    'user_phone_no'         => $phone,
                    'sts'                   => 0,
                    'user_pro_pic_paths'    => 'inc/img/user_pic/'.rand(0, 102).'.png',
                    'user_reffer_code_times'=> time(),
                    'join_date'             => date('Y-m-d', time()),
                    'join_timming'          => time(),
                ];
                $this->db->table('user_full_info')->insert($data_user);
                $new_user_id = $this->db->insertID();
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
                    'rreffer_main_id'       => $data['user_info']->user_full_info_idd,
                    'entry_times'           => time()
                ];
                $this->db->table('temp_user_reffer')->insert($data_reffer);
                $data_reffer = [
                    'role_user_idd'   => $new_user_id,
                    'role_role_idd'   => 2,
                ];
                $this->db->table('user_in_role')->insert($data_reffer);
                $this->db->table('user_badge_s')->insert([
                    'batch_user_inf_ids'   => $new_user_id,
                    'batch_b_detail_idds'  => 1,
                    'timess'               => time(),
                ]);
                return redirect()->to('/login')->with('success', 'Registered successfully.');
            }
        }else {
            return redirect()->back()->with('error', 'Invalid referral code.');
        }
    }

    public function checkUnique()
    {
        $field = $this->request->getPost('field');
        $value = trim($this->request->getPost('value'));

        // security: only allowed fields
        $columns = [
            'email'    => 'user_emails',
            'phone'    => 'user_phone_numbers',
            'username' => 'user_name',
        ];

        if (!array_key_exists($field, $columns) || $value === '') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid request'
            ]);
        }

        $builder = $this->db->table('user_login_details');

        $exists = $builder
            ->select('login_idd')
            ->where($columns[$field], $value)
            ->limit(1)
            ->get()
            ->getRow();

        if ($exists) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => ucfirst($field) . ' already exists'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success'
        ]);
    }




}
