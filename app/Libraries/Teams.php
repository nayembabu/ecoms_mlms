<?php

namespace App\Libraries;

use Config\Services;
use Config\Database;

class Teams
{
    protected $db;
    protected $session;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->session = Services::session();
    }

    public function enroll_product_self($product_id, $user_id, $buying_id)
    {
        $user_buying_id = $this->db->table('product_information')
                                    ->where('id', $buying_id)
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
        $current_wallet_balance = $user_added_wallet - $user_used_wallet;
        $user_info_data = $this->db->table('user_full_info')
                                    ->where('user_full_info_idd', $userInfoId)
                                    ->get()
                                    ->getRow();
        $temp_user_reffer = $this->db->table('temp_user_reffer')
                                    ->where('ref_reffer_user_idd', $userInfoId)
                                    ->get()
                                    ->getRow();
        if ($current_wallet_balance >= $user_buying_id->buying_price) {
            // Deduct wallet amount
        } else {
            // Insufficient balance
            $data['status'] = 'error';
            $data['message'] = 'Insufficient wallet balance.';
            return json_encode($data)->with(200);
        }
    }



}