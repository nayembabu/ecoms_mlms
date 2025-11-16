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
        $user_buying_id = $this->db->table('product_buying_info')
                                    ->where('product_buying_info_idd', $buying_id)
                                    ->join('product_information', 'product_information.id = product_buying_info.product_buy_product_idd', 'left')
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
        if ($current_wallet_balance > $user_buying_id->selling_pricess) {
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
                $this->db->table('user_cutted_amnt')->insert([
                    'user_cut_user_idd' => $userInfoId,
                    'cutting_perpose'   => 'Product Purchase - ' . $user_buying_id->product_name,
                    'cut_descs'         => 'Product Purchase - ' . $user_buying_id->product_name,
                    'cutting_amounts'   => $user_buying_id->selling_pricess,
                    'cut_any_idd'       => $product_id,
                    'cuting_date_yy'    => date('Y-m-d'),
                    'time_stamps'       => time(),
                ]);
                $this->db->table('product_sells_infos')->insert([
                    'sell_user_idd'         => $userInfoId,
                    'product_unq_idd'       => $user_buying_id->product_buy_product_idd,
                    'product_buy_lot_id'    => $user_buying_id->product_buying_info_idd,
                    'profit_amounts'        => $user_buying_id->daily_profits_amount,
                    'product_sell_price'    => $user_buying_id->selling_pricess,
                    'profit_continue_days'  => $user_buying_id->continue_days,
                    'dates_s_sell'          => date('Y-m-d'),
                    'created_at'            => time(),
                ]);
                $this->db->table('product_buying_info')
                         ->where('product_buying_info_idd', $user_buying_id->product_buying_info_idd)
                         ->update(['product_in_stock' => $user_buying_id->product_in_stock - 1]);
                $this->get_upper_user_id($userInfoId);

                // Product purchased Successfully
                $data['status'] = 'success';
                $data['message'] = 'Product purchased successfully.';
                echo json_encode($data);
            }else {
                $this->db->table('user_cutted_amnt')->insert([
                    'user_cut_user_idd' => $userInfoId,
                    'cutting_perpose'   => 'Product Purchase - ' . $user_buying_id->product_name,
                    'cut_descs'         => 'Product Purchase - ' . $user_buying_id->product_name,
                    'cutting_amounts'   => $user_buying_id->selling_pricess,
                    'cut_any_idd'       => $product_id,
                    'cuting_date_yy'    => date('Y-m-d'),
                    'time_stamps'       => time(),
                ]);
                $this->db->table('product_sells_infos')->insert([
                    'sell_user_idd'         => $userInfoId,
                    'product_unq_idd'       => $user_buying_id->product_buy_product_idd,
                    'product_buy_lot_id'    => $user_buying_id->product_buying_info_idd,
                    'profit_amounts'        => $user_buying_id->daily_profits_amount,
                    'product_sell_price'    => $user_buying_id->selling_pricess,
                    'profit_continue_days'  => $user_buying_id->continue_days,
                    'dates_s_sell'          => date('Y-m-d'),
                    'created_at'            => time(),
                ]);
                $this->db->table('product_buying_info')
                         ->where('product_buying_info_idd', $user_buying_id->product_buying_info_idd)
                         ->update(['product_in_stock' => $user_buying_id->product_in_stock - 1]);

                // Product purchased Successfully
                $data['status'] = 'success';
                $data['message'] = 'Product purchased successfully.';
                echo json_encode($data);
            }
        } else {
            // Insufficient balance
            $data['status'] = 'error';
            $data['message'] = 'Insufficient wallet balance.';
            echo json_encode($data);
        }
    }

    public function get_upper_user_id($user_id)
    {
        $user_reffer_info = $this->db->table('user_reffer')
                                    ->where('reffer_ref_user_idd', $user_id)
                                    ->get()
                                    ->getRow();

        if (!$user_reffer_info->reffer_main_idd) return false;

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
        $total_downline = $this->db->table('user_reffer')
                                    ->where('reffer_main_idd', $userid)
                                    ->where('batch_details.batch_position', $now_position)
                                    ->join('user_full_info', 'user_full_info.user_full_info_idd = user_reffer.reffer_ref_user_idd', 'left')
                                    ->join('user_badge_s', 'user_badge_s.batch_user_inf_ids = user_full_info.user_full_info_idd', 'left')
                                    ->join('batch_details', 'user_badge_s.batch_b_detail_idds = batch_details.batch_detail_idd', 'left')
                                    ->countAllResults();
        if ($total_downline >= $next_level_user) {
            // Update user badge
                $this->db->table('user_badge_s')
                         ->where('batch_user_inf_ids', $userid)
                         ->update(['batch_b_detail_idds' => $$user_info_data->batch_detail_idd + 1]);
        }else {
            return;
        }
    }

}
