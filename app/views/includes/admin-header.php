<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo SITE_NAME . " | " . $data['title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-store" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
</head>

<body>


    <aside class="aside" id="aside">

        <div class="logo">
            <i class="fa-solid fa-cart-plus"></i>
        </div>

        <div class="links">
            <a href="<?php echo SITE_URL; ?>/admins/index"><i class="fa-solid fa-gauge"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span></a>
            <a href="<?php echo SITE_URL; ?>/admins/manage"><i class="fa-solid fa-boxes-stacked"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Manage products</span></a>
            <a href="<?php echo SITE_URL; ?>/admins/new"><i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Product</span></a>
            <a href="<?php echo SITE_URL; ?>/admins/add"><i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Add Admin</span></a>
            <a href="<?php echo SITE_URL; ?>/admins/logout"><i class="fa-solid fa-power-off"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Sign out</span></a>
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

                <a href="<?php echo SITE_URL; ?>/admins/settings"><i class="fas fa-gear"></i></a>

            </div>
        </header>

        <div class="banner">
            <div class="first">
                <?php echo $data['title'] ?>
            </div>

            <div class="last">
                <?php echo 'Admin \\ ' . $data['title'] ?>
            </div>
        </div>