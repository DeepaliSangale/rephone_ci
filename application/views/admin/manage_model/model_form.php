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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_model') ?>">
                        <input type="hidden" name="m_id" value="<?= (isset($model)) ? $model->m_id : '' ?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Select Brand</label>
                            <select class="form-select mb-3 single-select" name="m_brand_id">
                                <?php
                                foreach ($brands as $key => $row) {
                                    ?>
                                    <option value="<?= $row['brand_id'] ?>" <?= (isset($model) && $model->m_brand_id == $row['brand_id']) ? 'selected' : '' ?>><?= $row['brand_name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Model Name</label>
                            <input type="text" class="form-control inputs" placeholder="Model Name" 
                                   name="m_name" required value="<?= (isset($model)) ? $model->m_name : '' ?>">
                            <span class="error"></span>
                        </div>
                       
                        <div class="mb-3 col-md-6">
                            <label>Model Image(192*192 png) <span style="color:red"> </span></label>
                            <input type="file" class="form-control inputs" name="m_image" accept=".jpg,.png,.jpeg,.svg">  
                            <span class='error'></span>
                            <?php if (isset($model) && $model->m_image != '') { ?>
                                <img width="300" height="300" src="<?= base_url() . 'assets/uploads/model/' . $model->m_image ?>">
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