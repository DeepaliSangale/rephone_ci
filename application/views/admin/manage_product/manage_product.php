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
                    <a href="<?= base_url('admin/product_form/') ?>">
                        <button type="button" class="btn btn-outline-primary radius-30">Add Product</button>
                    </a>
                </div>
                <div class="col-md-3 col-6 me-auto mb-3">
                <form action="<?php echo base_url('admin/manage_product') ?>" method="post">  
                    <select class="mb-3 single-select" name="brand_id" required onchange="this.form.submit()">
                        <option value="">--Select Screen Type--</option>
                        <option value="All" selected>All</option>
                        <?php foreach($brands as $val){ ?>
                           <option value="<?= $val['brand_id'] ?>" <?php if(@$_REQUEST['brand_id']==$val['brand_id']){ echo 'selected';} ?>><?= $val['brand_name']; ?></option>
                        <?php } ?>
                        
                    </select>
                </form>
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
                            <th>Brand Name</th>
                            <th>Model</th>
                            <th>Variant</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        if (!empty($Products)) {
                            foreach ($Products as $key => $row) {
                                ?>
                                <tr class='main_block' main_id="<?= $row['p_id'] ?>">
                                    <td><?= $key + 1 ?></td>                                         
                                    <td class="">
                                    <?= $this->cm->get_single_column('mst_brand', array('brand_id' => $row['brand_id']), 'brand_name') ?>                                      
                                    </td>
                                    <td class="">
                                        <?= $this->cm->get_single_column('mst_model', array('m_id' => $row['p_m_id']), 'm_name') ?>                                       
                                    </td>
                                    <td class="">
                                        <?= $this->cm->get_single_column('mst_variant', array('variant_id' => $row['p_variant_id']), 'variant_name') ?>                                       
                                    </td>
                                    <td class="">
                                        <?=  $row['p_price'] ?>                                       
                                    </td>
                                    <td>
                                        <?php if ($row['active'] == 1) { ?>
                                            <a href="javascript:void(0);" >
                                                <span class="badge rounded-pill bg-success commoon_active"  action='active_product' active='0'>Active</span>
                                            </a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0);" >
                                                <span class="badge rounded-pill bg-danger commoon_active"  action='active_product' active='1'>Deactive</span>
                                            </a>  <?php } ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="<?= base_url('admin/product_view/' . $row['p_id']) ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                            <a href="<?= base_url('admin/product_form/' . $row['p_id']) ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"  action='delete_product'><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr><td colspan="6" align="center">Sorry no records available! </td></tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?= $pagination ?>
        </div>
    </div>
</main>

