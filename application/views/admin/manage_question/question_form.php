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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_question') ?>">
                        <input type="hidden" name="q_id" value="<?= (isset($question)) ? $question->q_id : '' ?>">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Question Title</label>
                                <input type="text" class="form-control inputs" placeholder="Question Title" 
                                       name="q_title" required value="<?= (isset($question)) ? $question->q_title : '' ?>">
                                <span class="error"></span>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Question Icon <span style="color:red"> </span></label>
                                <input type="file" class="form-control inputs" name="q_image" accept=".jpg,.png,.jpeg,.svg">  
                                <span class='error'></span>
                                <?php if (isset($question) && $question->q_image != '') { ?>
                                    <img width="300" height="300" src="<?= base_url() . 'assets/uploads/question/' . $question->q_image ?>">
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