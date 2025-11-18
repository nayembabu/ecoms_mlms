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

    // Only allow users with session userRole == 'super' to access admin routes
    $routes->group('admin', ['filter' => 'auth'], function($routes) {
        $routes->get('dashboard', 'Admin::index');
    });

    $routes->group('user', ['filter' => 'auth'], function($routes) {
        $routes->get('dashboard', 'User::dashboard');
        $routes->get('profile', 'User::profile');
        $routes->get('allProduct', 'User::show_product_by_cats');

        $routes->get('singleProduct', 'Customer::get_single_products_by_id');
        $routes->get('myWallet', 'Customer::my_wallet_view');
        $routes->get('fullTeams', 'Customer::view_my_full_teams');
        $routes->get('balanceTransfer', 'Customer::transfer_my_wallet_balance');
        $routes->get('deposites', 'Customer::deposite_my_account');
        $routes->get('withdraw', 'Customer::withdraw_my_wallet_balance');
        $routes->get('set_account_number', 'Customer::set_account_number');
        $routes->get('referrals', 'Customer::my_referrals_list');
        $routes->get('add_referral', 'Customer::add_new_referral_view');
        $routes->get('viewAllProducts', 'Customer::view_all_products');
        $routes->get('incomeDetails', 'User::income_details_sho_here_view_file');
        $routes->get('product-sells-income', 'User::view_products_income_details');

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

    });



