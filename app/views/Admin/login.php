<?php 

extract($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> - <?= SITE_NAME ?></title>
    <meta http-equiv="Cache-Control" content="no-store" />
    <link rel="shortcut icon" href="<?php echo SITE_URL; ?>/public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>

<body class="text-white">


    <section class="vh-100 text-white">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6 sm-none">
                    <img src="<?php echo SITE_URL; ?>/public/images/megamenu-img.png" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <div class="logo my-4">
                        <img class="img-fluid img-responsive" src="<?php echo SITE_URL; ?>/public/images/logo-sm.jpg" alt="" style="width: 100px;display: block;margin: 0px auto;">
                    </div>
                    <form action="" method="POST">
                        <div class="mb-3 mx-auto d-flex justify-content-center">
                            <span class="alert alert-success text-center py-1 px-4">Redirecting ...</span>
                            <span class="alert alert-danger text-center py-1 px-4">Error ...</span>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label text-white" for="uname">Username</label>
                            <input type="text" id="uname" class="form-control form-control-lg" />
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label text-white" for="pass">Password</label>
                            <input type="password" id="pass" class="form-control form-control-lg" />
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="" id="pass_visibility" />
                                <label class="form-check-label text-white" for="form1Example3">Show password</label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>

                        <button type="submit" id="login-btn" class="btn btn-primary btn-lg btn-block">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('document').ready(function() {

            $(".alert-success").hide();
            $(".alert-danger").hide();

            $("#pass_visibility").click(function() {
                
                var passwordField = $("#pass");

                if (passwordField.attr("type") === "password") {
                    passwordField.attr("type", "text");
                } else {
                    passwordField.attr("type", "password");
                }
            });


            $("#login-btn").click(function(e) {

                e.preventDefault();

                let uname = $("#uname").val();
                let pass = $("#pass").val();
                let loginBtn = $("#login-btn").val();

                let unameError = "";
                let passError = "";

                if (uname == "") {
                    unameError = "Username is required ";
                }
                if (pass == "") {
                    passError = "Password is required ";
                }

                if (unameError != "") {
                    $("#uname").addClass("is-invalid");
                    $("#uname").next('.invalid-feedback').text(unameError)
                    setTimeout(() => {
                        $("#uname").removeClass("is-invalid");
                    }, 1500);
                }

                if (passError != "") {
                    $("#pass").addClass("is-invalid");
                    $("#pass").next('.invalid-feedback').text(passError)
                    setTimeout(() => {
                        $("#pass").removeClass("is-invalid");
                    }, 1500);
                }



                if (unameError != "" || passError != "") {
                    return false;
                }

                $.post("<?= SITE_URL; ?>/admins/auth", {

                    username: uname,
                    password: pass,
                    login: loginBtn

                }, function(data, status) {

                    if (data !== "continue") {

                        $(".alert-danger").html(data);

                        $(".alert-danger").show();

                        setTimeout(() => {
                            $(".alert-danger").hide();
                        }, 1500);
                    }else{

                        $(".alert-success").show();

                        setTimeout(() => {
                            $(".alert-success").hide();
                        }, 1500);

                        setTimeout(() => {

                            location.href  = "<?= SITE_URL; ?>/admins/index";

                        }, 1800);

                    }
                })
            });
        })
    </script>


</body>

</html>