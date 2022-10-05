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
                    <form id="forms" method="post" action="<?= base_url('admin/submit_store') ?>">
                        <input type="hidden" name="id" value="<?= (isset($store)) ? $store->id : '' ?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Store City</label>
                            <select class="single-select"  name="city_id" required>
                                <option value="">--City--</option>
                                <?php foreach($city as $val){ ?>
                                    <option value="<?= $val['city_id'] ?>" <?= (isset($store) && $store->city_id == $val['city_id']) ? 'selected' : '' ?>><?= $val['city_name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Store Pincode</label>
                            <select class="single-select"  name="pincode_id" required>
                                <option value="">--Pincode--</option>
                                <?php foreach($pincode as $val){ ?>
                                    <option value="<?= $val['pincode_id'] ?>" <?= (isset($store) && $store->pincode_id == $val['pincode_id']) ? 'selected' : '' ?>><?= $val['pincode_code'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Store Name</label>
                            <input type="text" class="form-control inputs" placeholder="Store Name" 
                                   name="s_name" required value="<?= (isset($store)) ? $store->s_name : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Store Phone</label>
                            <input type="number" class="form-control inputs" placeholder="Store Phone Number" 
                                   name="s_phone" required value="<?= (isset($store)) ? $store->s_phone : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Store Email ID</label>
                            <input type="email" class="form-control inputs" placeholder="Store Email ID" 
                                   name="s_email" required value="<?= (isset($store)) ? $store->s_email : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Google Map Link</label>
                            <input type="url" class="form-control inputs" placeholder="Store Direction" 
                                   name="map_link" required value="<?= (isset($store)) ? $store->map_link : '' ?>">
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Store Address</label>
                            <textarea  class="form-control inputs" placeholder="Store Address" 
                                   name="s_address" required><?= (isset($store)) ? $store->s_address : '' ?></textarea>
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