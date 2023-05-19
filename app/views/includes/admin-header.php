<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo SITE_NAME . " | " . $data['title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <aside class="aside" id="aside">

        <div class="logo">
            <i class="fa-solid fa-cart-plus"></i>
        </div>

        <div class="links">
            <a href="<?php echo SITE_URL; ?>/Admins/index"><i class="fa-solid fa-gauge"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span></a>
            <a href=""><i class="fa-solid fa-boxes-stacked"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Manage products</span></a>
            <a href="<?php echo SITE_URL; ?>/Admins/new"><i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Product</span></a>
            <a href=""><i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Add Admin</span></a>
            <a href=""><i class="fa-solid fa-power-off"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Sign out</span></a>
        </div>

    </aside>

    <main id="main">
        <header id="header" class="header">
            <nav id="navbar">
                <a href="javascript:void(0)" id="toggle-icon">&#9776;</a>
            </nav>

            <div class="other-nav">

                <div class="country-flag">
                    <img src="<?php echo SITE_URL; ?>/public/images/nigeria-flag.png" alt="User icon /">
                </div>

                <div class="user-icon">
                    <img src="<?php echo SITE_URL; ?>/public/images/user_icon.png" alt="User icon /">
                </div>

                <a href=""><i class="fas fa-gear"></i> Settings</a>

            </div>
        </header>