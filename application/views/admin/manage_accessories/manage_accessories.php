<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-header py-3">
            <div class="row align-items-center m-0">
                <div class="col-md-4 col-12 me-auto mb-md-0 mb-3">
                    <a href="<?= base_url('admin/accessories_form/') ?>">
                        <button type="button" class="btn btn-outline-primary radius-30">Add Accessories</button>
                    </a>
                </div>
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
                            <th>Accessories</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        if (!empty($Accessoriess)) {
                            foreach ($Accessoriess as $key => $row) {
                                ?>
                                <tr class='main_block' main_id="<?= $row['a_id'] ?>">
                                    <td><?= $key + 1 ?></td>
                                    <td class="">
                                        <h6 class="mb-0 product-title"><?= $row['a_title'] ?></h6>                                        
                                    </td>
                                    <td class="">
                                        <img style="width:100px;height:100px" src="<?= ($row['a_image'] == '') ? base_url('assets/uploads/accessories/noimage.png')  : base_url('assets/uploads/accessories/') . $row['a_image'] ?>" >                                        
                                    </td>
                                    <td>
                                        <?php if ($row['active'] == 1) { ?>
                                            <a href="javascript:void(0);" >
                                                <span class="badge rounded-pill bg-success commoon_active"  action='active_accessories' active='0'>Active</span>
                                            </a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0);" >
                                                <span class="badge rounded-pill bg-danger commoon_active"  action='active_accessories' active='1'>Deactive</span>
                                            </a>  <?php } ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <!--<a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>-->
                                            <a href="<?= base_url('admin/accessories_form/' . $row['a_id']) ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"  action='delete_accessories'><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr><td colspan="5" align="center">Sorry no records available! </td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?= $pagination ?>
        </div>
    </div>
</main>

