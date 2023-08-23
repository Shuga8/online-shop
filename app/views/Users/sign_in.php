<!-- Header -->
<?php

include_once APPROOT . "/views/includes/header.php";

?>

<!-- content -->

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo SITE_URL;  ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Login</strong></div>
        </div>
    </div>
</div>

<style>
    .auth-container {
        margin: 0 auto;
        margin-top: 20px !important;
        max-width: 350px;
        height: 350px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        box-shadow: 2px 2px 7px #ccc, -2px -2px 7px #ccc;
        border-radius: 5px;
        padding: 5px;
    }

    .auth-container a {
        color: #fff;
        font-size: 1.3rem;
        font-weight: 700;
        width: 80%;
        padding: 3px 30px;
        background: #5199ffa9;
        border-radius: 3px;
        text-align: center;
        box-shadow: -2px 2px 4px #aaa, 2px -2px 4px #bbb;
    }

    .auth-container pre {
        margin-top: 15px;
    }
</style>

<div class="site-section">
    <div class="container">
        <div class="auth-container">

            <a href="<?= $data['gclient']->createAuthUrl() ?>">Sign in <img src="<?php echo SITE_URL; ?>/public/images/google_icon.png" alt="Google /" style="width: 25px;height:25px;object-fit:contain;"></a>

        </div>

    </div>
</div>


<!--  content ends here -->


<!-- Footer -->
<?php

include_once APPROOT . "/views/includes/footer.php";

?>