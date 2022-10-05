<!doctype html>
<html lang="en" class="light-theme">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= base_url() ?>admin_assets/images/favicon-32x32.png" type="image/png" />
        <!--plugins-->
        <link href="<?= base_url() ?>admin_assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="<?= base_url() ?>admin_assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/css/bootstrap-extended.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/css/style.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/css/icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="<?= base_url() ?>admin_assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
	     <link href="<?= base_url() ?>admin_assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
        <!-- loader-->
        <link href="<?= base_url() ?>admin_assets/css/pace.min.css" rel="stylesheet" />


        <!--Theme Styles-->
        <link href="<?= base_url() ?>admin_assets/css/dark-theme.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/css/light-theme.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/css/semi-dark.css" rel="stylesheet" />
        <link href="<?= base_url() ?>admin_assets/css/header-colors.css" rel="stylesheet" />

        <base id='myBase' href='<?= base_url() ?>'>
        <base id='page' dt='<?= $current_page ?>'>       
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>        
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            $("html").attr("class", "<?= $_SESSION['theme_type'] ?>");
            $(document).ready(function (e) {
                $(".change_theme").on("click", function () {
                    var type = $(this).attr('t-type');
                    $("html").attr("class", type);
                    $.get("<?= base_url('admin/change_theme/') ?>" + type, function (data) {});
                })

                $('.change_theme').each(function (e) {
                    if ($(this).attr('t-type') == "<?= $_SESSION['theme_type'] ?>") {
                        $(this).prop("checked", true);
                    } else
                    {
                        $(this).prop("checked", false);
                    }
                })

            })
        </script>
        <title>Rephone</title>
    </head>

    <body>


        <!--start wrapper-->
        <div class="wrapper">
            <!--start top header-->
            <header class="top-header">        
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-icon d-xl-none">
                        <i class="bi bi-list"></i>
                    </div>
                    <!--                    <div class="top-navbar d-none d-xl-block">
                                            <ul class="navbar-nav align-items-center">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url() ?>index.html">Dashboard</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url() ?>app-emailbox.html">Email</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url() ?>javascript:;">Projects</a>
                                                </li>
                                                <li class="nav-item d-none d-xxl-block">
                                                    <a class="nav-link" href="<?= base_url() ?>javascript:;">Events</a>
                                                </li>
                                                <li class="nav-item d-none d-xxl-block">
                                                    <a class="nav-link" href="<?= base_url() ?>app-to-do.html">Todo</a>
                                                </li>
                                            </ul>
                                        </div>-->
                    <!--                    <div class="search-toggle-icon d-xl-none ms-auto">
                                            <i class="bi bi-search"></i>
                                        </div>-->
                    <!--                    <form class="searchbar d-none d-xl-flex ms-auto">
                                            <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                                            <input class="form-control" type="text" placeholder="Type here to search">
                                            <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i class="bi bi-x-lg"></i></div>
                                        </form>-->
                    <div class="top-navbar-right ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="<?= base_url() ?>#" data-bs-toggle="dropdown">
                                    <div class="user-setting d-flex align-items-center gap-1">
                                        <img src="<?= base_url() ?>admin_assets/images/avatars/avatar-1.png" class="user-img" alt="">
                                        <div class="user-name d-none d-sm-block"><?= $_SESSION['staff_username'] ?></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url() ?>admin_assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="60" height="60">
                                                <div class="ms-3">
                                                    <h6 class="mb-0 dropdown-user-name"><?= $_SESSION['staff_username'] ?></h6>
                                                    <!--<small class="mb-0 dropdown-user-designation text-secondary">HR Manager</small>-->
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" data-toggle="modal"  data-bs-toggle="modal" data-bs-target="#change_user" href="javascript:void(0);">
                                            <div class="d-flex align-items-center" >
                                                <div class="setting-icon"><i class="bi bi-gear-fill"></i></div>
                                                <div class="setting-text ms-3"><span>Change Password</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <div class="d-flex align-items-center signout">
                                                <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                                <div class="setting-text ms-3"><span>Logout</span></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
            <!--end top header-->
            <?php $this->load->view('admin/sidebar'); ?>
            <div class="modal fade" id="change_user" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Change password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/change_password') ?>" method="post">
                            <div class="modal-body">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="a_password" placeholder="Enter password" required class="form-control">
                                </div>               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


