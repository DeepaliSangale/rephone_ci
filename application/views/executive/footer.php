

<!--other new-->

<!--start overlay-->

<div class="overlay nav-toggle-icon"></div>

<!--end overlay-->



<!--Start Back To Top Button-->

<a href="<?= base_url() ?>javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

<!--End Back To Top Button-->



<!--start switcher-->

<div class="switcher-body">

    <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>

    <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">

        <div class="offcanvas-header border-bottom">

            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>

        </div>

        <div class="offcanvas-body">

            <h6 class="mb-0">Theme Variation</h6>

            <hr>

            <div class="form-check form-check-inline">

                <input class="form-check-input change_theme" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked t-type="light-theme">

                <label class="form-check-label" for="LightTheme">Light</label>

            </div>

            <div class="form-check form-check-inline">

                <input class="form-check-input change_theme" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2" t-type="dark-theme">

                <label class="form-check-label" for="DarkTheme">Dark</label>

            </div>

            <div class="form-check form-check-inline">

                <input class="form-check-input change_theme" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3" t-type="semi-dark">

                <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>

            </div>

            <hr>

        </div>

    </div>

</div>

<!--end switcher-->













</div>

<!--end wrapper-->





<!-- Bootstrap bundle JS -->

<script src="<?= base_url() ?>admin_assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->

<script src="<?= base_url() ?>admin_assets/plugins/simplebar/js/simplebar.min.js"></script>

<script src="<?= base_url() ?>admin_assets/plugins/metismenu/js/metisMenu.min.js"></script>

<script src="<?= base_url() ?>admin_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

<script src="<?= base_url() ?>admin_assets/js/pace.min.js"></script>
<script src="<?= base_url() ?>admin_assets/plugins/select2/js/select2.min.js"></script>
  <script src="<?= base_url() ?>admin_assets/js/form-select2.js"></script>


  <script src="<?= base_url() ?>assets/js/sweetalert2.min.js"></script>

<!--app-->

<script src="<?= base_url() ?>admin_assets/js/app.js"></script>
<script src="<?= base_url() ?>admin_assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>admin_assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= base_url() ?>admin_assets/js/table-datatable.js"></script>







<!--custom-->



<script src="<?= base_url() ?>admin_assets/js/executive_custom.js"></script>

<style>

    #forms {

    }

    .error {

        display: none ;

        color:red !important;

    }

    #forms.show-errors input:not(:valid) + .error {

        display: inline-block !important;

        margin-left: 10px !important;

    }

</style>

<script>

<?php

$message = $this->session->flashdata('response_message');

if ($message != '') {

    unset($_SESSION['response_message']);

    ?>

        window.notify('<?= $message['type'] ?>', '<?= $message['message'] ?>');

<?php } ?>

</script>









</body>



</html>