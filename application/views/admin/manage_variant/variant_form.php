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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_variant') ?>">
                        <input type="hidden" name="variant_id" value="<?= (isset($variant)) ? $variant->variant_id : '' ?>">
                        <div class="row">
                        <div class="mb-3 col-md-3">
                            <label class="form-label">RAM</label>
                            <input type="number" class="form-control inputs" placeholder="Add RAM" 
                                   name="ram" value="<?= (isset($variant)) ? $variant->ram : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">ROM</label>
                            <input type="number" class="form-control inputs" placeholder="Add ROM" 
                                   name="rom" required value="<?= (isset($variant)) ? $variant->rom : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control inputs" required>
                                <option value="">--Select--</option>
                                <option value="GB" <?php if(@$variant->type=='GB'){ echo 'selected'; } ?>>GB</option>
                                <option value="TB" <?php if(@$variant->type=='TB'){ echo 'selected'; } ?>>TB</option>
                            </select>
                            <span class="error"></span>
                        </div>
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