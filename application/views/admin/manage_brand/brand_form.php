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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_brand') ?>">
                        <input type="hidden" name="brand_id" value="<?= (isset($brand)) ? $brand->brand_id : '' ?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Brand</label>
                            <input type="text" class="form-control inputs" placeholder="Brand Name" 
                                   name="brand_name" required value="<?= (isset($brand)) ? $brand->brand_name : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Brand Image(440 × 440 px jpg) <span style="color:red"> </span></label>
                            <input type="file" class="form-control inputs" name="brand_image" accept=".jpg,.png,.jpeg,.svg">  
                            <span class='error'></span>
                            <?php if (isset($brand) && $brand->brand_image != '') { ?>
                                <img width="300" height="300" src="<?= base_url() . 'assets/uploads/brand/' . $brand->brand_image ?>">
                            <?php } ?>
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