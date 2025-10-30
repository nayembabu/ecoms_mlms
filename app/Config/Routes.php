<?php

    use CodeIgniter\Router\RouteCollection;
    // $routes = Services::routes();

    $routes->get('/', 'Home::index');
    $routes->get('login', 'Home::login');
    $routes->post('login_check', 'Auth::login_check');
    $routes->get('register', 'Auth::register');
    $routes->post('register_user', 'Auth::register_user');
    $routes->get('logout', 'Auth::logout');

    // Only allow users with session userRole == 'super' to access admin routes
    $routes->group('admin', ['filter' => 'auth'], function($routes) {
        $routes->get('dashboard', 'Admin::index');
    });

    $routes->group('user', ['filter' => 'auth'], function($routes) {
        $routes->get('profile', 'User::profile');
        $routes->post('edit-profile','User::editProfile');
        $routes->get('allProduct', 'User::show_product_by_cats');
        $routes->get('singleProduct', 'Customer::get_single_products_by_id');
        $routes->post('buySingleProduct', 'Customer::buy_a_single_product');
        $routes->get('myWallet', 'Customer::my_wallet_view');
        $routes->get('fullTeams', 'Customer::view_my_full_teams');
        $routes->post('getRefferById', 'Customer::get_person_reffer_details_by_person_id');
        $routes->get('balanceTransfer', 'Customer::transfer_my_wallet_balance');
        $routes->post('getUserByPhone', 'Customer::get_person_details_by_person_phone_email');
    });


    // Additional routing can be added here