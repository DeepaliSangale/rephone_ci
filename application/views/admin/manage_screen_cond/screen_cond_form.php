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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_screen_cond_form') ?>">
                        <input type="hidden" name="id" value="<?= (isset($question)) ? $question->id : '' ?>">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Select Screen Type</label>
                            <select class="form-select mb-3 single-select" name="type" required>
                              <option value="">--Select--</option>
                              <option value="dps1" <?php if(@$question->type=='dps1'){ echo 'selected'; } ?>>Dead Pixels/Spots on Screen</option>
                              <option value="vls2" <?php if(@$question->type=='vls2'){ echo 'selected'; } ?>>Visible Lines on Screen</option>
                              <option value="spc3" <?php if(@$question->type=='spc3'){ echo 'selected'; } ?>>Screen Physical Condition</option>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Question Title</label>
                            <input type="text" class="form-control inputs" placeholder="Question Title" 
                                   name="qsn_name" required value="<?= (isset($question)) ? $question->qsn_name : '' ?>">
                            <span class="error"></span>
                        </div>
                       
   
                        <div class="mb-3 col-md-6">
                            <label>Image(49 × 57 px png) <span style="color:red"> </span></label>
                            <input type="file" class="form-control inputs" name="image" accept=".jpg,.png,.jpeg">  
                            <span class='error'></span>
                            <?php if (isset($question) && $question->image != '') { ?>
                                <img width="100" height="100" src="<?= base_url() . 'assets/uploads/screen_cond/' . $question->image ?>">
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