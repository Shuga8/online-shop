<?php 

    $admin_session = (array) $_SESSION['admin'][0];

    extract($admin_session);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo SITE_NAME . " | " . $data['title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-store" />
    <link rel="shortcut icon" href="<?php echo SITE_URL; ?>/public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/fonts/icomoon/style.css">
    <?php if(isset($data['link'])){
        echo $data['link'];
    } ?>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>

<!-- Flash message -->
<?php

include_once APPROOT . "/views/components/flash-message.php";

?>


    <aside class="aside" id="aside">

        <div class="logo">
            <figure>
                <img src="<?= SITE_URL; ?>/public/images/favicon.jpg" alt="Logo /" style="width: 50px;margin-top: 10px;">
            </figure>
        </div>

        <div class="links">
            <a href="<?php echo SITE_URL; ?>/admins/index"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
            <a href="<?php echo SITE_URL; ?>/admins/manage"><i class="fa-solid fa-boxes-stacked"></i><span>Manage products</span></a>
            <a href="<?php echo SITE_URL; ?>/admins/new"><i class="fa-solid fa-circle-plus"></i><span>Product</span></a>
            <a href="<?php echo SITE_URL; ?>/admins/featured"><i class="fa-solid fa-star"></i><span>Featured products</span></a>
            <a href="<?php echo SITE_URL; ?>/admins/logout"><i class="fa-solid fa-power-off"></i><span>Sign out</span></a>
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