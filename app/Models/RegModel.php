<?php

namespace App\Models;
use CodeIgniter\Model;


class RegModel extends Model
{
    protected $table='user_full_info';
    protected $primaryKey='user_full_info_idd';
    protected $allowedFields=[ 'user_full_info_idd', 'user_full_name', 'user_full_address', 'user_email_no', 'user_phone_no', 'user_pro_pic_paths', ];

public function insertData($userData, $loginData, $roleData)
{
    $this->db->transStart(); 

    // 1️⃣ Insert user full info
    $this->db->table('user_full_info')->insert($userData);
    $userFullInfoId = $this->db->insertID();

    // 2️⃣ Insert login details
    $loginData['login_user_idd'] = $userFullInfoId;
    $this->db->table('user_login_details')->insert($loginData);
    $loginId = $this->db->insertID();

    // 3️⃣ Insert role
    $roleData['role_user_idd'] = $userFullInfoId;
    $this->db->table('user_in_role')->insert($roleData);

    $this->db->transComplete();

    if ($this->db->transStatus() === false) {
        // DEBUG:
        log_message('error', 'Registration failed: ' . print_r($this->db->error(), true));
        return false;
    }

    return [
        'user_full_info_idd' => $userFullInfoId,
        'login_idd'          => $loginId
    ];
}
}