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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_tellus_form') ?>">
                        <input type="hidden" name="id" value="<?= (isset($question)) ? $question->id : '' ?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Question Title</label>
                            <input type="text" class="form-control inputs" placeholder="Question Title" 
                                   name="qsn_name" required value="<?= (isset($question)) ? $question->qsn_name : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Question Instruction</label>
                            <textarea type="text" class="form-control inputs" placeholder="Question Instruction" 
                                   name="qsn_desc" required><?= (isset($question)) ? $question->qsn_desc : '' ?></textarea>
                            <span class="error"></span>
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Yes Short Description</label>
                            <input type="text" class="form-control inputs" placeholder="Yes Short Description" 
                                   name="yes_checked_value" required value="<?= (isset($question)) ? $question->yes_checked_value : '' ?>">
                            <span class="error"></span>
                        </div>
                       
                        <div class="mb-3 col-md-6">
                            <label class="form-label">No Short Description</label>
                            <input type="text" class="form-control inputs" placeholder="No Short Description" 
                                   name="no_checked_value" required value="<?= (isset($question)) ? $question->no_checked_value : '' ?>">
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