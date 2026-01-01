<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use Config\Database;
use App\Libraries\Template;
use App\Libraries\Teams;
use App\Models\RegModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Libraries\BanglaConverter;


class Games extends BaseController
{
    protected $session;
    protected $db;
    protected $template;

    public function __construct()
    {
        $this->session      = Services::session();
        $this->db           = Database::connect();
        $this->template     = new Template();
    }

    public function telegram_tap_tap()
    {
        $userInfoId = $this->session->get('userInfoId');
        $data['my_info'] = $this->db->table('user_full_info')
                                    ->where('user_full_info_idd', $userInfoId)
                                    ->get()
                                    ->getRow();
        $data['games_infoss'] = $this->db->table('tap_tap_games_infoss')
                                        ->where('tap_tap_games_infoss_idd', 1)
                                        ->get()
                                        ->getRow();
        $data['user_tap_tap_info'] = $this->db->table('user_tap_tap_games_infoss')
                                        ->where('user_info_autos_ididdid', $userInfoId)
                                        ->join('tap_tap_games_boost_info', 'tap_tap_games_boost_info.tap_tap_games_boost_info_idd = user_tap_tap_games_infoss.user_now_boosts_id', 'left')
                                        ->join('tap_tap_game_lavel', 'tap_tap_game_lavel.tap_tap_game_lavel_idd = user_tap_tap_games_infoss.user_now_levels_id', 'left')
                                        ->get()
                                        ->getRow();
        if (!$data['user_tap_tap_info']) {
            $this->db->table('user_tap_tap_games_infoss')
                    ->insert([
                        'user_info_autos_ididdid'  => $userInfoId,
                        'user_now_boosts_id'       => 1,
                        'user_now_levels_id'       => 1,
                    ]);
            $last_insert_id = $this->db->insertID();
            $data['user_tap_tap_info'] = $this->db->table('user_tap_tap_games_infoss')
                                                ->where('user_tap_tap_games_infoss_iddddd', $last_insert_id)
                                                ->join('tap_tap_games_boost_info', 'tap_tap_games_boost_info.tap_tap_games_boost_info_idd = user_tap_tap_games_infoss.user_now_boosts_id', 'left')
                                                ->join('tap_tap_game_lavel', 'tap_tap_game_lavel.tap_tap_game_lavel_idd = user_tap_tap_games_infoss.user_now_levels_id', 'left')
                                                ->get()
                                                ->getRow();
        }
        $data['user_taps_add'] = $this->db->table('tap_tap_games_coin_add')
                                    ->selectSum('tap_tap_games_coin_add_taps')
                                    ->where('user_info_pr_id_idd', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->tap_tap_games_coin_add_taps;
        $data['user_coin_added'] = $this->db->table('tap_tap_games_coin_add')
                                    ->selectSum('coin_added_amount')
                                    ->where('user_info_pr_id_idd', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->coin_added_amount;
        $data['user_coin_used'] = $this->db->table('tap_tap_coin_cutted_info')
                                    ->selectSum('coin_cutted_amount')
                                    ->where('user_info_unq_idddidd', $userInfoId)
                                    ->get()
                                    ->getRow()
                                    ->coin_cutted_amount;
        $data['current_coin_balance'] = $data['user_coin_added'] - $data['user_coin_used'];
        $data['tap_tap_games_boosts'] = $this->db->table('tap_tap_games_boost_info')
                                    ->get()
                                    ->getResult();
        $data['tap_tap_game_lavels'] = $this->db->table('tap_tap_game_lavel')
                                    ->get()
                                    ->getResult();
        return view('games/telegram_tap_tap_games_view_file', $data);
    }

    public function insert_added_coin_tap_tap()
    {
        $userInfoId = $this->session->get('userInfoId');
        $added_coin = $this->request->getPost('added_coin');
        $taps = $this->request->getPost('taps');

        $this->db->table('tap_tap_games_coin_add')
                ->insert([
                    'user_info_pr_id_idd'           => $userInfoId,
                    'coin_added_amount'             => $added_coin,
                    'tap_tap_games_coin_add_taps'   => $taps,
                    'coin_added_text'               => 'Tap Tap Game থেকে কয়েন যোগ হয়েছে',
                    'times_stamps'                  => time(),
                ]);
        return true;
    }

    public function game_bi_cycle_view()
    {
        return view('games/bi-cycle');
    }


}



