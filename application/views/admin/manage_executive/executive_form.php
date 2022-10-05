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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_executive') ?>">
                        <input type="hidden" name="e_id" value="<?= (isset($executive)) ? $executive->staff_id : '' ?>">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Executive Full Name</label>
                                <input type="text" class="form-control inputs" placeholder="Executive Name" 
                                       name="e_fullname" required value="<?= (isset($executive)) ? $executive->staff_fullname : '' ?>">
                                <span class="error"></span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Executive Username</label>
                                <input type="text" class="form-control inputs" placeholder="Executive Username" 
                                       name="e_username" required value="<?= (isset($executive)) ? $executive->staff_username : '' ?>">
                                <span class="error"></span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Executive Password</label>
                                <input type="password" class="form-control inputs" placeholder="Executive Password" 
                                       name="e_password" required value="<?= (isset($executive)) ? $executive->staff_password : '' ?>">
                                <span class="error"></span>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Executive Address</label>
                                <textarea type="text" class="form-control inputs" placeholder="Executive Address" 
                                          name="e_address"><?= (isset($executive)) ? $executive->staff_address : '' ?></textarea>
                                <span class="error"></span>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Select pincodes</label>
                                <?php
                                $code = array();
                                if (isset($executive)) {
                                    $code = $this->cm->get_all_selected_by_condition2('mst_executive_pincode', array('ep_e_id' => $executive->staff_id));
                                    $code = array_column($code, 'ep_pincode_id');
                                }
                                ?>
                                <select class="form-select mb-3 multiple-select" name="e_pincodes_id[]" multiple="multiple">
                                    <?php
                                    foreach ($pincodes as $key => $row) {
                                        ?>
                                        <option value="<?= $row['pincode_id'] ?>" <?= ( in_array($row['pincode_id'], $code)) ? 'selected' : '' ?>><?= $row['pincode_code'] ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error"></span>
                            </div>
                            <!--                            <div class="mb-3 col-md-6">
                                                            <label>Executive Image <span style="color:red"> </span></label>
                                                            <input type="file" class="form-control inputs" name="e_image" accept=".jpg,.png,.jpeg,.svg">  
                                                            <span class='error'></span>
                            <?php if (isset($executive) && $executive->e_image != '') { ?>
                                                                        <img width="300" height="300" src="<?= base_url() . 'assets/uploads/executive/' . $executive->e_image ?>">
                            <?php } ?>
                                                        </div>-->
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary px-5 radius-30" onclick="go_back()">Back</button>
                                <input type="submit" class="btn btn-primary px-5 radius-30" id="btnSubmit" value="Submit">
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end row-->
</main>