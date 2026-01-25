<?php

    use CodeIgniter\Router\RouteCollection;
    // $routes = Services::routes();

    $routes->get('/', 'Home::index');
    $routes->get('login', 'Home::login');

    $routes->get('register', 'Auth::register');
    $routes->post('register_user', 'Auth::register_user');
    $routes->get('logout', 'Auth::logout');
    $routes->get('register_ref/(:num)', 'Home::register_new_referral/$1');
    $routes->get('register_ref/', 'Home::register_new_referral');

    $routes->post('login_check', 'Auth::login_check');
    $routes->post('new_referral_added', 'Home::new_referral_added_user');
    $routes->post('check-unique', 'Home::checkUnique');
    $routes->post('telegram/webhook', 'TelegramWebhook::index');

    // Only allow users with session userRole == 'super' to access admin routes
    $routes->group('lead', ['filter' => 'auth'], function($routes) {
        $routes->get('dashboard', 'Admin::index');
        $routes->get('user', 'Admin::user_management');
        $routes->get('product', 'Admin::product_management');
        $routes->get('product_buy', 'Admin::product_buy_management');
        $routes->get('category', 'Admin::category_management');
        $routes->get('subcat', 'Admin::subcategory_management');
        $routes->get('addMoneySys', 'Admin::add_money_system');
        $routes->get('costMoneySys', 'Admin::admin_cost_money_system');
        $routes->get('custRechargeCheck', 'Admin::cust_recharge_history_checking');

        $routes->get('adsManage', 'Admin::ads_management_check');
        $routes->get('getAds', 'Admin::get_all_ads_management_check');

        $routes->get('getAllProducts', 'Admin::get_all_products');
        $routes->get('getAllProductBuyIno', 'Admin::get_all_product_buy_info');
        $routes->get('getSubcategories', 'Admin::get_subcategories_by_category');

        $routes->post('search_user_info', 'Admin::search_user_info');
        $routes->post('single_user_profile', 'Admin::single_user_profile_info');
        $routes->post('add_user_wallet_amount', 'Admin::add_user_wallet_amount');
        $routes->post('user_wallet_amount_cut', 'Admin::user_wallet_amount_cut');
        $routes->post('account_activate_deactivate', 'Admin::account_activate_deactivate');
        $routes->post('account_suspend_activate', 'Admin::account_suspend_activate');
        $routes->post('deleteProduct', 'Admin::delete_product_this');
        $routes->post('store_new_product', 'Admin::store_new_product');
        $routes->post('single_product_buy_profile_info', 'Admin::single_product_buy_profile_info');
        $routes->post('add_product_buy_info', 'Admin::add_product_buy_info');
        $routes->post('add_money_post_form', 'Admin::add_money_post_form');
        $routes->post('add_post', 'Admin::add_post');
        $routes->post('insertNewAds', 'Admin::insert_new_ads_manage');
    });

    $routes->group('user', ['filter' => 'auth'], function($routes) {
        $routes->get('dashboard', 'User::dashboard');
        $routes->get('profile', 'User::profile');
        $routes->get('allProduct', 'User::show_product_by_cats');

        $routes->get('withdraw/history', 'Customer::get_withdraw_history');

        $routes->get('singleProduct', 'Customer::get_single_products_by_id');
        $routes->get('myWallet', 'Customer::my_wallet_view');
        $routes->get('fullTeams', 'Customer::view_my_full_teams');
        $routes->get('balanceTransfer', 'Customer::transfer_my_wallet_balance');
        $routes->get('deposites', 'Customer::deposite_my_account');
        $routes->get('withdraw', 'Customer::withdraw_my_wallet_balance');
        $routes->get('set_account_number', 'Customer::set_account_number');
        $routes->get('referrals', 'Customer::my_referrals_list');
        $routes->get('inactive_referrals', 'Customer::my_inactive_referral_lists');
        $routes->get('add_referral', 'Customer::add_new_referral_view');
        $routes->get('viewAllProducts', 'Customer::view_all_products');
        $routes->get('incomeDetails', 'User::income_details_sho_here_view_file');
        $routes->get('product-sells-income', 'User::view_products_income_details');
        $routes->get('daily_check', 'User::daily_checking_func_s');
        $routes->get('gamming_pages', 'User::gamming_all_page_func');
        $routes->get('lottery_system', 'User::lottery_system_func_system');
        $routes->get('all_lottery_history_system', 'User::all_lottery_history_system_func');
        $routes->get('single_lottery_view', 'User::single_lottery_system_func_views');
        $routes->get('your_lottery_history_system', 'User::your_lottery_history_system_func_views');
        $routes->get('myWalletss', 'Customer::get_downline_recursive');
        $routes->get('allPackage', 'Customer::all_package_show_here');
        $routes->get('myPackage', 'Customer::my_invest_package_show_here');
        $routes->get('mySinglePackage/(:num)', 'Customer::my_invest_package_show_here_single_package/$1');

        $routes->get('incomePage', 'Faucet::index');
        $routes->get('autoIncomePage', 'Faucet::auto_income_page_view_fun');
        $routes->get('autoIncomePageTwo', 'Faucet::auto_income_second_page_fun');

        $routes->post('edit-profile','User::editProfile');

        $routes->post('buySingleProduct', 'Customer::buy_a_single_product');
        $routes->post('getRefferById', 'Customer::get_person_reffer_details_by_person_id');
        $routes->post('getUserByPhone', 'Customer::get_person_details_by_person_phone_email');
        $routes->post('amountWallet', 'Customer::get_my_wallet_amount');
        $routes->post('withdraw_req', 'Customer::withdraw_request');
        $routes->post('set_account_number_action', 'Customer::set_account_number_action');
        $routes->post('add_new_referral', 'Customer::add_new_referrals');
        $routes->post('amountWalletTransfer', 'Customer::transfer_wallet_amount_to_user');
        $routes->post('getAllProducts', 'Customer::get_all_products_json_output');
        $routes->post('getSingleProductDetails', 'Customer::get_single_product_details_by_id');
        $routes->post('buySingleProducts', 'Customer::buy_a_single_product_action_form');
        $routes->post('getUncompletedProducts', 'User::get_uncompleted_products_show_here');
        $routes->post('getSingleUncompletedProduct', 'User::get_single_uncompleted_product_func');
        $routes->post('add_profit_in_sell_products', 'User::add_profit_in_sell_products');
        $routes->post('get_daily_check', 'User::get_daily_check_func');
        $routes->post('buy_a_ticket_s', 'User::buy_ticket_func');
        $routes->post('buySinglePackage', 'Customer::buy_single_package_action_form');
        $routes->post('getAllAds', 'Faucet::get_all_ads_listing');
        $routes->post('getMyTotalRCN', 'Faucet::get_my_total_rcn_balance');
        $routes->post('addMyRCNPoint', 'Faucet::add_my_rcn_point_balance');
        $routes->post('getWalletInfo', 'Customer::get_the_wallet_full_info');
        $routes->post('pamentRequestSubmit', 'Customer::pament_request_submit_fun');
        $routes->post('rechargeHistoryGetting', 'Customer::recharge_history_getting_fun');

    });



    $routes->group('games', ['filter' => 'auth'], function($routes) {
        $routes->get('getUserInfo', 'Games::get_user_info_json');
        $routes->get('taptap', 'Games::telegram_tap_tap');
        $routes->get('bycycle', 'Games::game_bi_cycle_view');
        $routes->get('coinFlip', 'Games::game_coin_tos_tos');
        $routes->get('lastCoinAdd', 'Games::get_last_tap_tap_added_coin');


        $routes->post('insert_added_coin_tap_tap', 'Games::insert_added_coin_tap_tap');
        $routes->post('insert_cut_coin_tap', 'Games::insert_cut_withdraw_coin_tap_tap');
    });

