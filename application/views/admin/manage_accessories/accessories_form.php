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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_accessories') ?>">
                        <input type="hidden" name="a_id" value="<?= (isset($accessories)) ? $accessories->a_id : '' ?>">
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label class="form-label">Accessories Title</label>
                                <input type="text" class="form-control inputs" placeholder="Accessories Title" 
                                       name="a_title" required value="<?= (isset($accessories)) ? $accessories->a_title : '' ?>">
                                <span class="error"></span>
                            </div>
                            <div class="mb-3 col-md-8">
                                <label>Accessories Icon <span style="color:red"> </span></label>
                                <input type="file" class="form-control inputs" name="a_image" accept=".jpg,.png,.jpeg,.svg">  
                                <span class='error'></span>
                                <?php if (isset($accessories) && $accessories->a_image != '') { ?>
                                    <img width="300" height="300" src="<?= base_url() . 'assets/uploads/accessories/' . $accessories->a_image ?>">
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary px-5 radius-30" onclick="go_back()">Back</button>
                                <input type="submit" class="btn btn-primary px-5 radius-30" id="btnSubmit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--end row-->
</main>