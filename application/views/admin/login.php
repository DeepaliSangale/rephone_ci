<!doctype html>
<html lang="en" class="light-theme">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="admin_assets/images/favicon-32x32.png" type="image/png" />
        <!-- Bootstrap CSS -->
        <link href="admin_assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="admin_assets/css/bootstrap-extended.css" rel="stylesheet" />
        <link href="admin_assets/css/style.css" rel="stylesheet" />
        <link href="admin_assets/css/icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <!-- loader-->
        <link href="admin_assets/css/pace.min.css" rel="stylesheet" />

        <title>Rephone</title>
    </head>

    <body>

        <!--start wrapper-->
        <div class="wrapper">

            <!--start content-->
            <main class="authentication-content">
                <div class="container-fluid">
                    <div class="authentication-card">
                        <div class="card shadow rounded-0 overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                    <img src="<?= base_url() ?>admin_assets/images/error/login-img.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body p-4 p-sm-5">
                                        <h5 class="card-title">Sign In</h5>
                                        <p class="card-text mb-5">See your growth and get consulting support!</p>
                                        <form class="form-body" method="post">
                                            <div class="d-grid">
                                                <?php
                                                $errorMsg = $this->session->userdata('errorMsg');
                                                $this->session->unset_userdata('errorMsg');
                                                if (!empty($errorMsg)) {
                                                    ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?php echo $errorMsg; ?>
                                                    </div>   
                                                <?php } ?>
                                                <!--                                                <div class="ms-3">
                                                                                                    <div class="text-danger">A simple success alert—check it out!</div>
                                                                                                </div>-->
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Username</label>
                                                    <div class="ms-auto position-relative">
                                                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-fill"></i></div>
                                                        <input type="text" class="form-control radius-30 ps-5" id="inputEmailAddress" placeholder="Username" required name="username">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="ms-auto position-relative">
                                                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                                        <input type="password" class="form-control radius-30 ps-5" id="inputChoosePassword" placeholder="Enter Password" required name="password">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <!--                                                    <div class="form-check form-switch">
                                                                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                                                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                                                                        </div>-->
                                                </div>
                                                <!--<div class="col-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>-->
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                                                </div>
                                            </div>
                                            <!--                                                <div class="col-12">
                                                                                                <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up here</a></p>
                                                                                            </div>-->
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </main>

    <!--end page main-->

</div>
<!--end wrapper-->


<!--plugins-->
<script src="<?= base_url() ?>admin_assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>admin_assets/js/pace.min.js"></script>


</body>

</html>


<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
        <title>Digimedia</title>
        <link rel="stylesheet" href="<?= base_url() ?>admin_assets/vendors/feather/feather.css">
        <link rel="stylesheet" href="<?= base_url() ?>admin_assets/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="<?= base_url() ?>admin_assets/vendors/css/vendor.bundle.base.css">
         endinject 
         Plugin css for this page 
         End plugin css for this page 
         inject:css 
        <link rel="stylesheet" href="<?= base_url() ?>admin_assets/css/vertical-layout-light/style.css">
         endinject 
        <link rel="shortcut icon" href="<?= base_url() ?>admin_assets/images/favicon.png" />
        <link rel="stylesheet" href="<?= base_url() ?>admin_assets/css/custom.css">
        <base id='myBase' href='<?= base_url() ?>'>

        <script src="<?= base_url() ?>https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
        <script src="<?= base_url() ?>https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>

    <body>

        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo">
                                    <img src="<?= base_url() ?><?= base_url() ?>admin_assets/images/logo.png" alt="logo">
                                    <img src="<?= base_url() ?><?= base_url() ?>admin_assets/images/logo.svg" alt="logo">
                                </div>
                                <h4>Hello! let's get started</h4>
                                <h6 class="font-weight-light">Login to continue.</h6>
<?php
$errorMsg = $this->session->userdata('errorMsg');
$this->session->unset_userdata('errorMsg')
?>
<?php if (!empty($errorMsg)) { ?>
                                                                                                                            <div class="alert alert-danger" role="alert">
    <?php echo $errorMsg; ?>
                                                                                                                            </div>   
<?php } ?>
                                <form class="pt-3" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value=LOGIN>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 content-wrapper ends 
            </div>
             page-body-wrapper ends 
        </div>
         Jquery Core Js  
        <script src="<?= base_url() ?><?= base_url() ?>admin_assets/vendors/js/vendor.bundle.base.js"></script>
         endinject 
         Plugin js for this page 
         End plugin js for this page 
         inject:js 
        <script src="<?= base_url() ?><?= base_url() ?>admin_assets/js/off-canvas.js"></script>
        <script src="<?= base_url() ?><?= base_url() ?>admin_assets/js/hoverable-collapse.js"></script>
        <script src="<?= base_url() ?><?= base_url() ?>admin_assets/js/template.js"></script>
        <script src="<?= base_url() ?><?= base_url() ?>admin_assets/js/settings.js"></script>
        <script src="<?= base_url() ?><?= base_url() ?>admin_assets/js/todolist.js"></script>
    </body>
</html>-->