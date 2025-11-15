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
        $userInfoId = $this->session->get('userInfoId');
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
        $temp_user_reffer = $this->db->table('temp_user_reffer')
                                    ->where('ref_reffer_user_idd', $userInfoId)
                                    ->get()
                                    ->getRow();
        if ($current_wallet_balance >= $user_buying_id->buying_price) {
            // Deduct wallet amount
            if ($temp_user_reffer) {
                $this->db->table('user_reffer')->insert([
                    'reffer_ref_user_idd'   => $temp_user_reffer->ref_reffer_user_idd,
                    'reffer_main_idd'       => $temp_user_reffer->rreffer_main_id,
                    'timessstamps'          => time(),
                ]);
                $this->db->table('temp_user_reffer')
                         ->where('ref_reffer_user_idd', $userInfoId)
                         ->delete();
                         $this->db->table('user_full_info')
                         ->where('user_full_info_idd', $userInfoId)
                         ->update(['sts' => 1]);
                $this->get_upper_user_id($userInfoId);
            }else {
                //
            }
        } else {
            // Insufficient balance
            $data['status'] = 'error';
            $data['message'] = 'Insufficient wallet balance.';
            return json_encode($data)->with(200);
        }
    }

    public function get_upper_user_id($user_id)
    {
        $user_reffer_info = $this->db->table('user_reffer')
                                    ->where('reffer_ref_user_idd', $user_id)
                                    ->get()
                                    ->getRow();

        if (!$user_reffer_info) return false;

        // Check this upper user
        $this->team_check_and_increement($user_reffer_info->reffer_main_idd);

        // Go next upper
        return $this->get_upper_user_id($user_reffer_info->reffer_main_idd);
    }

    public function team_check_and_increement($userid)
    {
        $user_info_data = $this->db->table('user_full_info')
                                    ->where('user_full_info_idd', $userid)
                                    ->join('user_badge_s', 'user_badge_s.batch_user_inf_ids = user_full_info.user_full_info_idd', 'left')
                                    ->join('batch_details', 'user_badge_s.batch_b_detail_idds = batch_details.batch_detail_idd', 'left')
                                    ->get()
                                    ->getRow();
        $now_position = $user_info_data->batch_position ?? 1;
        $next_level   = $now_position + 1;
        $next_level_user = $user_info_data->next_level_no ?? 4;
    }

    // batch_detail_idd         batch_position         batch_position       position_no     next_level_no
    // 1 	                    silver       	        1 	 	            1 	            4
	// 2 	                    bronze       	        2 	 	            4 	            4
	// 3 	                    gold       	            3 	 	            4 	            4
	// 4 	                    platinum       	        4 	 	            4 	            4
	// 5 	                    diamond       	        5 	 	            4 	            4
	// 6 	                    ruby       	            6 	 	            4 	            10
	// 7 	                    legendary       	    7 	 	            10 	            1


}
