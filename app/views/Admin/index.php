<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>

<!-- content -->


<div class="content">

    <div class="first-row">

        <div class="col-xl-4">

            <div class="card">
                <div class="card-header">
                    <div class="content">
                        <h3>Welcome Back !</h3>
                        <p>Admin Dashboard</p>
                    </div>
                    <img src="<?php echo SITE_URL; ?>/public/images/profile-img.png" alt="Image /">
                </div>

                <div class="card-body">

                    <div class="left">
                        <img src="<?php echo SITE_URL; ?>/public/images/user_icon.png" alt="User /">

                        <div class="box">
                            <h3>John Doe</h3>
                            <p>Admin</p>
                        </div>
                    </div>

                    <div class="right">

                        <div class="up">

                            <div class="1">
                                <h3>Role</h3>
                                <p>Super Admin</p>
                            </div>

                        </div>

                        <div class="down">
                            <a href="">View Profile&nbsp; <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">

            </div>

        </div>

        <div class="col-xl-8">

            <div class="upper-col">
                <div class="one">
                    <div class="">
                        <h5>Completed orders</h5>

                        <p>1,200</p>
                    </div>

                    <div class="icon">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>

                <div class="two">
                    <div class="">
                        <h5>Pending Orders</h5>

                        <p class="amount">12000</p>
                    </div>

                    <div class="icon">
                        <i class="fa-solid fa-rotate"></i>
                    </div>
                </div>

                <div class="three">
                    <div class="">
                        <h5>Failed Orders</h5>

                        <p class="amount">20</p>
                    </div>

                    <div class="icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                </div>
            </div>

            <div class="lower-col">

            </div>
        </div>

    </div>

</div>


<!-- Footer -->
<?php

include_once APPROOT . "/views/includes/admin-footer.php";

?>