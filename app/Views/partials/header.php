<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="clckd" content="1b9426ff5dde5e9cee1b9034894eef48" />
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
            .navbar {background: linear-gradient(90deg, #032d6c, #0e327f);box-shadow: 0 4px 15px rgba(0,0,0,0.1);}
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
            

                
            /* Floating Button */
            .lc-floating-btn {
                position: fixed;
                bottom: 80px;
                right: 25px;
                width: 60px;
                height: 60px;
                background: #0d6efd;
                color: #fff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 28px;
                cursor: pointer;
                z-index: 1001;
                box-shadow: 0 4px 15px rgba(0,0,0,.3);
                transition: .3s;
            }

            .lc-floating-btn:hover {
                transform: scale(1.1);
                background: #0b5ed7;
            }

            /* Chat Window */
            .lc-chat-window {
                position: fixed;
                bottom: 95px;
                right: 25px;
                width: 300px;
                height: 400px;
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 10px 40px rgba(0,0,0,.25);
                display: flex;
                flex-direction: column;
                z-index: 1000;

                opacity: 0;
                visibility: hidden;
                transform: translateY(30px) scale(.93);
                transition: .5s ease;
            }

            .lc-chat-window.lc-open {
                opacity: 1;
                visibility: visible;
                transform: translateY(0) scale(1);
            }

            /* Header */
            .lc-chat-header {
                background: #0d6efd;
                color: #fff;
                padding: 1rem;
                border-radius: 16px 16px 0 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            /* Messages */
            .lc-chat-messages {
                flex: 1;
                padding: 1rem;
                overflow-y: auto;
                background: #f8f9fa;
                display: flex;
                flex-direction: column;
                gap: .75rem;
            }

            .lc-message {
                max-width: 80%;
                padding: .7rem 1rem;
                border-radius: 18px;
                font-size: 1.2rem;
            }

            .lc-message.sent {
                background: #0d6efd;
                color: #fff;
                align-self: flex-end;
                border-bottom-right-radius: 4px;
            }

            .lc-message.received {
                background: #e9ecef;
                color: #212529;
                align-self: flex-start;
                border-bottom-left-radius: 4px;
            }

            .lc-message-time {
                font-size: .8rem;
                margin-top: 4px;
                opacity: .8;
                color: #481818;
            }

            /* Input */
            .lc-chat-input {
                padding: .75rem;
                border-top: 1px solid #dee2e6;
                background: #fff;
            }

            /* Mobile */
            @media (max-width: 576px) {
                .lc-chat-window {
                    bottom: 0;
                    right: 0;
                    left: 0;
                    width: 100vw;
                    height: calc(var(--vh, 1vh) * 100);
                    border-radius: 0;
                    transform: translateY(100%);
                }

                .lc-chat-window.lc-open {
                    transform: translateY(0);
                }

                .lc-chat-header {
                    border-radius: 0;
                }
            }
        </style>
    <?php } ?>

        <!-- jQuery Connect  -->
    <script src="inc/plugin/jq3.min.js"></script> 

    <!-- jquery ui-->
    <script src="inc/plugin/jqui/jquery-ui.min.js"></script>
    <script src="inc/plugin/sweetalert2/dist/sweetalert2.min.js"></script>




</head>

