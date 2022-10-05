<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form id="forms" method="post" action="<?= base_url('admin/submit_pincode') ?>">
                        <input type="hidden" name="pincode_id" value="<?= (isset($pincode)) ? $pincode->pincode_id : '' ?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Pincode</label>
                            <input type="text" class="form-control inputs" pattern="^[1-9][0-9]{5}$" placeholder="Pincode" 
                                   name="pincode_code" required value="<?= (isset($pincode)) ? $pincode->pincode_code : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary px-5 radius-30" onclick="go_back()">Back</button>
                            <input type="submit" class="btn btn-primary px-5 radius-30" id="btnSubmit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--end row-->
</main>