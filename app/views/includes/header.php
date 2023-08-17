<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo SITE_NAME; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-store" />

    <link rel="shortcut icon" href="<?php echo SITE_URL . "/public/favicon.ico" ?>" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/style.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/cart.css">

    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="" class="site-block-top-search">
                                <span class="icon icon-search2"></span>
                                <input type="text" class="form-control border-0" placeholder="Search">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center" style="border: none">
                            <div class="site-logo">
                                <a href="<?php echo SITE_URL;  ?>/index" class="js-logo-clone"><img src="<?= SITE_URL; ?>/public/images/logo.jpg" alt="" style="width: 180px;height: 70px;object-fit:cover;"></a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>
                                    <li><a href="#"><span class="icon icon-person"></span></a></li>
                                    <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                    <li>
                                        <a href="<?php echo SITE_URL;  ?>/cart" class="site-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            <span class="count count-span" style="display: none;"></span>
                                        </a>
                                    </li>
                                    <li class="d-inline-block d-md-none ml-md-0"><a href="javascript:void(0)" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li class="<?php echo $data['home-class']; ?>">
                            <a href="<?php echo SITE_URL;  ?>/index">Home</a>

                            <!-- <ul class="dropdown">
                                <li><a href="#">Menu One</a></li>
                                <li><a href="#">Menu Two</a></li>
                                <li><a href="#">Menu Three</a></li>
                                <li class="has-children">
                                    <a href="#">Sub Menu</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Menu One</a></li>
                                        <li><a href="#">Menu Two</a></li>
                                        <li><a href="#">Menu Three</a></li>
                                    </ul>
                                </li>
                            </ul> -->

                        </li>

                        <li class="<?php echo $data['about-class']; ?>">

                            <a href="<?php echo SITE_URL;  ?>/about">About</a>

                            <!-- <ul class="dropdown">
                                <li><a href="#">Menu One</a></li>
                                <li><a href="#">Menu Two</a></li>
                                <li><a href="#">Menu Three</a></li>
                            </ul> -->
                        </li>

                        <li class="<?php echo $data['shop-class']; ?>"><a href="<?php echo SITE_URL;  ?>/pages/shop">Shop</a></li>
                        <li class="<?php echo $data['cont-class']; ?>"><a href="<?php echo SITE_URL;  ?>/contact">Contact</a></li>

                        <?php if (!isset($_SESSION['g_uid'])) : ?>
                            <li class="<?php echo $data['login-class']; ?>"><a href="<?php echo SITE_URL;  ?>/login">Login</a></li>
                        <?php else : ?>
                            <li class=""><a href="<?php echo SITE_URL;  ?>/logout">Logout</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Flash message -->
        <?php

        include_once APPROOT . "/views/components/flash-message.php";

        ?>