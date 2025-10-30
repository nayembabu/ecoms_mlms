<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\Template;
use App\Models\RegModel;
use Config\Database;
use Config\Services;

// $builder = $db->table('user_login_details');

class Auth extends BaseController
{
    protected $template;
    protected $userModel;
    protected $regestationModel;
    protected $db_login_info;
    protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->template = new Template();
        $this->regestationModel = new RegModel();
        $this->db = Database::connect();
        $this->db_login_info = $this->db->table('login_info');
    }

    public function register()
    {   
        return $this->template->front('front/register');
    }
    public function register_user()
    {
        $uniq_id = uniqid();
        $user_full_name    = $this->request->getPost('user_full_name');
        $user_full_address = $this->request->getPost('user_full_address');
        $user_email_no     = $this->request->getPost('user_email');
        $user_phone_no     = $this->request->getPost('user_phone');
        $user_name         = $this->request->getPost('userNam');
        $user_password     = $this->request->getPost('user_password');


        $user_pro_pic_paths = null;
        $file = $this->request->getFile('profile_pic');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'inc/user_pic/', $newName); 
            $user_pro_pic_paths = 'inc/user_pic/' . $newName;
        }

        if (empty($user_full_name) || empty($user_email_no) || empty($user_password)) {
            return redirect()->to('/register')->with('error', 'Please fill in all required fields.');
        }
        $userData = [
            'user_full_name'     => $user_full_name,
            'user_full_address'  => $user_full_address,
            'user_email_no'      => $user_email_no,
            'user_phone_no'      => $user_phone_no,
            'user_pro_pic_paths' => $user_pro_pic_paths,
        ];

        $loginData = [
            'user_name'       => $user_name,
            'status'          => "1",
            'password_show'   => $user_password,
            'user_emails'     => $user_email_no,
            'user_password'   => password_hash($user_password, PASSWORD_BCRYPT),
        ];

        $roleData = [
            'role_role_idd' => "2",
        ];

        // ✅ Insert data using the model
        $insertResult = $this->regestationModel->insertData($userData, $loginData, $roleData);

        if ($insertResult === false) {
            return redirect()->to('/register')->with('error', 'Registration failed. Please try again.');
        }

        // ✅ Registration successful
        return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function login_check()
    {
        $session = session();
        $email = $this->request->getPost('u_name');
        $password = $this->request->getPost('password');

            // Dummy check for example purposes
        if (empty($email) || empty($password)) {
            return redirect()->to('/login')->with('error', 'Email and password are required');
        } else {
            $user = $this->userModel
                         ->where('user_emails', $email)
                         ->join('user_in_role', 'user_in_role.role_user_idd = user_login_details.login_user_idd', 'left')
                         ->join('role_details', 'role_details.role_detail_idd = user_in_role.role_role_idd', 'left')
                         ->first();
            if ($user && password_verify($password, $user['user_password'])) {

                $this->db_login_info->insert([
                    'logged_user_id'    => $user['login_user_idd'],
                    'logged_time'       => time(),
                    'logged_dates'      => date('Y-m-d'),
                    'logged_agent_info' => json_encode([
                        'ip' => $this->request->getIPAddress(),
                        'userAgent' => $this->request->getUserAgent()->getAgentString()
                    ])
                ]);

                $session->set('isLoggedIn', true);
                $session->set('loggedInfo', $this->db->insertID());
                $session->set('userInfoId', $user['login_user_idd']);
                $session->set('userRole', $user['role_names']);
                $session->set('userName', $user['user_full_name'] ?? $user['user_name']);

                if ($user['role_names'] === 'super') {
                    $session->setFlashdata('success', 'Login successful');
                    return redirect()->to('/admin/dashboard');
                }elseif ($user['role_names'] === 'cust') {
                    $session->setFlashdata('success', 'Login successful');
                    return redirect()->to('/user/dashboard');
                }
            } else {
                $session->setFlashdata('error', 'Invalid email or password');
            }
        }
        return redirect()->to('/login')->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        $session = session();
        $this->db_login_info
             ->where('login_info_iddd', $session->get('loggedInfo'))
             ->update([
                'logout_times' => time(),
                'logout_dates' => date('Y-m-d')
            ]);
        $session->destroy();
        return redirect()->to('/login')->with('success', 'Logged out successfully');
    }
}