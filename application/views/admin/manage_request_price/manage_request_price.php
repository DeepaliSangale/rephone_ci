<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-header py-3">
            <div class="row align-items-center m-0">
                <!--<div class="col-md-4 col-12 me-auto mb-md-0 mb-3">
                    <a href="<?= base_url('admin/request_form/') ?>">
                        <button type="button" class="btn btn-outline-primary radius-30">Add Review</button>
                    </a>
                </div>-->
                <div class="col-md-4 col-6">
                    <form>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="search" name="search_val" value="<?= (isset($_GET['search_val'])) ? $_GET['search_val'] : '' ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-striped">                   
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Mobile</th>                         
                            <th>Model</th>
                            <th>Brand</th>
                            <th>Ram</th>
                            <th>Storage</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        if (!empty($request_price)) {
                            foreach ($request_price as $key => $row) {
                                ?>
                                <tr class='main_block' main_id="<?= $row['id'] ?>">
                                    <td><?= $key + 1 ?></td>
                                    <td class="">
                                        <h6 class="mb-0 product-title"><?= $row['name'] ?></h6>                                        
                                    </td>
                                    <td class="">
                                        <h6 class="mb-0 product-title"><a href="tel:<?= $row['mobile_number'] ?>"><?= $row['mobile_number'] ?></a></h6>                                        
                                    </td>
                                    <td class="">
                                        <h6 class="mb-0 product-title"><?= $row['model'] ?></h6>                                        
                                    </td>
                                    <td class="">
                                        <h6 class="mb-0 product-title"><?= $row['brand'] ?></h6>                                        
                                    </td>
                                    <td class="">
                                        <h6 class="mb-0 product-title"><?= $row['ram'] ?> GB</h6>                                        
                                    </td>
                                    <td class="">
                                        <h6 class="mb-0 product-title"><?= $row['internal_storage'] ?> GB</h6>                                        
                                    </td>
                                    <!--<td class="">
                                        <img style="width:100px;height:100px" src="<?= ($row['c_photo'] == '') ? base_url('assets/uploads/model/noimage.png')  : base_url('assets/uploads/review/') . $row['c_photo'] ?>" >                                        
                                    </td>-->
                                  
                                    <td>
                                        <?php if ($row['active'] == 1) { ?>
                                            <a href="javascript:void(0);" >
                                                <span class="badge rounded-pill bg-success commoon_active"  action='active_review' active='0'>Active</span>
                                            </a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0);" >
                                                <span class="badge rounded-pill bg-danger commoon_active"  action='active_review' active='1'>Deactive</span>
                                            </a>  <?php } ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="<?= base_url('admin/request_price_form_view/' . $row['id']) ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <!--<a href="<?= base_url('admin/request_price_form/' . $row['id']) ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>-->
                                            <a href="javascript:;" class="text-danger delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"  action='delete_request_price'><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr><td colspan="3" align="center">Sorry no records available! </td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?= $pagination ?>
        </div>
    </div>
</main>

