<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Nazox - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url();?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url();?>/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="home-btn d-none d-sm-block">
        <a href="#"><i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div>
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                        <div class="w-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div>
                                        <div class="text-center">
                                            <div>
                                                <a href="<?= base_url() ?>" class="logo"><img
                                                        src="<?php echo base_url()?>/assets/images/logo.png" height="40"
                                                        alt="logo"></a>
                                            </div>
                                            <h4 class="font-size-18 mt-4">Welcome Back to <?= ucfirst($role) ?> Login !
                                            </h4>
                                            <p class="text-muted">Sign in to continue as JOINT <?= ucfirst($role) ?>.
                                            </p>
                                        </div>

                                        <div class="p-2 mt-5">

                                            <?= $this->include('layouts/alert') ?>

                                            <form class="" method="post"
                                                action="<?php echo base_url('/'.$role.'/postLogin') ?>" novalidate>
                                                <div class="mb-3 auth-form-group-custom mb-4">
                                                    <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Enter email" required>
                                                </div>

                                                <div class="mb-3 auth-form-group-custom mb-4">
                                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                    <label for="userpassword">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Enter password" required>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customControlInline">
                                                    <label class="form-check-label" for="customControlInline">Remember
                                                        me</label>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <button class="btn btn-primary w-md waves-effect waves-light"
                                                        type="submit">Log In</button>
                                                </div>

                                                <!-- <div class="mt-4 text-center">
                                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                                    </div> -->
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="authentication-bg">
                        <div class="bg-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url();?>/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url();?>/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url();?>/assets/js/app.js"></script>

</body>

</html>
<style>
.alert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    /* float: left; */
    text-align: left;
}
</style>