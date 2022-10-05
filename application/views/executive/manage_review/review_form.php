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
                    <form id="forms" method="post" action="<?= base_url('executive/submit_review') ?>">
                        <input type="hidden" name="id" value="<?= (isset($review)) ? $review->id : '' ?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Customer Name</label>
                            <input type="text" class="form-control inputs" placeholder="Customer Name" 
                                   name="c_name" required value="<?= (isset($review)) ? $review->c_name : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Comments</label>
                            <textarea type="text" class="form-control inputs" placeholder="Customer Comments" 
                                   name="c_comment" required><?= (isset($review)) ? $review->c_comment : '' ?></textarea>
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Cutomer Photo(564 × 702 jpg) <span style="color:red"> </span></label>
                            <input type="file" class="form-control inputs" name="c_photo" accept=".jpg,.png,.jpeg">  
                            <span class='error'></span>
                            <?php if (isset($review) && $review->c_photo != '') { ?>
                                <img width="300" height="300" src="<?= base_url() . 'assets/uploads/review/' . $review->c_photo ?>">
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