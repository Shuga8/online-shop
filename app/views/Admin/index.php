<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>

<!-- content -->

<body>


    <aside class="aside" id="aside">

        <div class="logo">
            <i class="fa-solid fa-cart-plus"></i>
        </div>

        <div class="links">
            <a href=""><i class="fa-solid fa-gauge"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span></a>
            <a href=""><i class="fa-solid fa-boxes-stacked"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Manage products</span></a>
            <a href=""><i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Product</span></a>
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
    </main>

    <!-- Header -->
    <?php

    include_once APPROOT . "/views/includes/admin-footer.php";

    ?>