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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_slider') ?>">
                        <input type="hidden" name="slider_id" value="<?= (isset($slider)) ? $slider->slider_id : '' ?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Slider Title</label>
                            <input type="text" class="form-control inputs" placeholder="Slider Title" 
                                   name="slider_title" required value="<?= (isset($slider)) ? $slider->slider_title : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Slogan</label>
                            <input type="text" class="form-control inputs" placeholder="Slider Slogan" 
                                   name="four_word" required value="<?= (isset($slider)) ? $slider->four_word : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Background Color</label>
                            <input type="color" class="form-control inputs" placeholder="Slider Color" 
                                   name="back_color" required value="<?= (isset($slider)) ? $slider->back_color : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Slider Image (405 × 320px png)<span style="color:red"> </span></label>
                            <input type="file" class="form-control inputs" name="slider_image" accept=".jpg,.png,.jpeg,.svg">  
                            <span class='error'></span>
                            <?php if (isset($slider) && $slider->slider_image != '') { ?>
                                <img width="300" height="300" src="<?= base_url() . 'admin_assets/uploads/slider/' . $slider->slider_image ?>">
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