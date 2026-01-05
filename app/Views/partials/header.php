<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>" target="">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="inc/front/assets/imgs/bg_icons.png" type="image/x-icon">
    <title>Royal Chain - Online Banking & Finance</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="inc/assets/css/vendors/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- wow css -->
    <link rel="stylesheet" href="inc/assets/css/animate.min.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="inc/assets/css/bulk-style.css">
    <link rel="stylesheet" type="text/css" href="inc/assets/css/vendors/animate.css">
    <link rel="stylesheet" href="inc/plugin/jqui/jquery-ui.min.css">
    <link rel="stylesheet" href="inc/plugin/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="inc/plugin/sweetalert2/dist/sweetalert2.min.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="inc/assets/css/style.css">

    <?php $session = $session ?? \Config\Services::session(); if ($session->get('isLoggedIn')) { ?>
        <style>
            body {background: #f7f9fc;font-family: 'Times New Roman';}
            .navbar {background: linear-gradient(90deg, #0d6efd, #2563eb);box-shadow: 0 4px 15px rgba(0,0,0,0.1);}
            .navbar-brand, .navbar-nav .nav-link {color: #fff !important; transition: 0.3s ease;}
            .navbar-nav .nav-link:hover {color: #ffe082 !important;}
            .user-info {display: flex; align-items: center; gap: 10px; color: #fff;}
            .user-info img {width: 40px; height: 40px; border-radius: 50%; border: 2px solid #fff;}
            .user-info small {display: block; line-height: 1.1;}
            .content-section {padding: 60px 0; animation: fadeIn 0.6s ease-in-out;}
            .card {border: none; border-radius: 12px; box-shadow: 0 6px 20px rgba(0,0,0,0.05); transition: transform .2s ease;}
            .card:hover {transform: translateY(-5px);}
            .kpi-icon {font-size: 2rem; color: #0d6efd; background: #eef5ff; border-radius: 10px; padding: 12px;}
            .footer {background:#fff; padding:20px 0; box-shadow:0 -3px 10px rgba(0,0,0,0.05);}
            @keyframes fadeIn {from {opacity:0; transform:translateY(15px);} to {opacity:1; transform:none;}}
        </style>
    <?php } ?>

        <!-- jQuery Connect  -->
    <script src="inc/plugin/jq3.min.js"></script>

    <!-- jquery ui-->
    <script src="inc/plugin/jqui/jquery-ui.min.js"></script>
    <script src="inc/plugin/sweetalert2/dist/sweetalert2.min.js"></script>

</head>

