<link href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/js/form-select2.js"></script>
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">
        <div class="mb-3">
                            <button type="button" class="btn btn-primary px-5 radius-30" onclick="go_back()">Back</button>
                           
                        </div>
            <div class="card">
                <div class="card-body">
                    <form id="forms" method="post" action="<?= base_url('admin/submit_product') ?>">
                        <input type="hidden" name="p_id" value="<?= (isset($product)) ? $product->p_id : '' ?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Select Brand</label>
                            <select class="form-select mb-3 single-select" name="brand_id" id="sel_brand" required>
                             <option value="">--Select--</option>
                                <?php
                                foreach ($brands as $key => $row) {
                                    ?>
                                   <option value="<?= $row['brand_id'] ?>" <?= (isset($product) && $product->brand_id == $row['brand_id']) ? 'selected' : '' ?>><?= $row['brand_name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Select Model</label>
                            <select class="form-select mb-3 single-select" name="p_m_id" id="sel_model" required>
                            <option value="">--Select--</option>
                            <?php $p_name = $this->ccm->get_single_row('mst_model', array('m_id' => $product->p_m_id)); ?>
                               <option value="<?= $product->p_m_id; ?>" selected><?=  $p_name->m_name ?></option>
                            
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Select variants</label>
                            <select class="form-select mb-3 single-select" name="p_variant_id">
                                <?php
                                foreach ($variants as $key => $row) {
                                    ?>
                                    <option value="<?= $row['variant_id'] ?>" <?= (isset($product) && $product->p_variant_id == $row['variant_id']) ? 'selected' : '' ?>><?= $row['variant_name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Product Max Price</label>
                            <input type="number" class="form-control inputs" placeholder="Product Max Price" 
                                   name="p_price" required value="<?= (isset($product)) ? $product->p_price : '' ?>">
                            <span class="error"></span>
                        </div> 
                        <h2>Tell Us Device Question</h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="col-sm-8 text-center">Question</th>
                                        <th class="col-sm-2 text-center">% Value</th>
                                        <th class="col-sm-2 text-center">Rs Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($tellus as $row) {
                                        $cond = 0;
                                        if (isset($product)) {
                                            $tellus = $this->cm->get_single_row('mst_tell_us_question', array('prod_id' => $product->p_id, 'tuq_id' => $row['id']));
                                            if ($tellus != '') {
                                                $cond = 1;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="mb-3 col-md-8">
                                                            <label class="form-label"><?= $row['qsn_name'] ?></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="p_tellus_id[]" value="<?= $row['id'] ?>">
                                                        <input type="number" class="form-control change_percent_value"
                                                               name="p_tellus_percent_value[]" autocomplete="off" value="<?= ($tellus->tu_type == 1) ? $tellus->tu_value : '' ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control change_rs_value"
                                                               name="p_tellus_rs_value[]" autocomplete="off" value="<?= ($tellus->tu_type == 2) ? $tellus->tu_value : '' ?>">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        if ($cond == 0) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="mb-3 col-md-8">
                                                        <label class="form-label"><?= $row['qsn_name'] ?></label>
                                                    </div> 
                                                </td>
                                                <td>
                                                    <input type="hidden" name="p_tellus_id[]" value="<?= $row['id'] ?>">
                                                    <input type="number" class="form-control change_percent_value"
                                                           name="p_tellus_percent_value[]" autocomplete="off">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control change_rs_value"
                                                           name="p_tellus_rs_value[]" autocomplete="off">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>     
                        <h2>Screen Condition Defects Question</h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="col-sm-8 text-center">Question</th>
                                        <th class="col-sm-2 text-center">% Value</th>
                                        <th class="col-sm-2 text-center">Rs Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($screen_defect as $row) {
                                        $cond = 0;
                                        if (isset($product)) {
                                            $screend = $this->cm->get_single_row('mst_screen_question', array('prod_id' => $product->p_id, 'sq_id' => $row['id']));
                                            if ($screend != '') {
                                                $cond = 1;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="mb-3 col-md-8">
                                                            <label class="form-label"><?= $row['qsn_name'] ?></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="p_screen_defect_id[]" value="<?= $row['id'] ?>">
                                                        <input type="number" class="form-control change_percent_value"
                                                               name="p_screen_defect_percent_value[]" autocomplete="off" value="<?= ($screend->sq_type == 1) ? $screend->sq_value : '' ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control change_rs_value"
                                                               name="p_screen_defect_rs_value[]" autocomplete="off" value="<?= ($screend->sq_type == 2) ? $screend->sq_value : '' ?>">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        if ($cond == 0) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="mb-3 col-md-8">
                                                        <label class="form-label"><?= $row['qsn_name'] ?></label>
                                                    </div> 
                                                </td>
                                                <td>
                                                    <input type="hidden" name="p_screen_defect_id[]" value="<?= $row['id'] ?>">
                                                    <input type="number" class="form-control change_percent_value"
                                                           name="p_screen_defect_percent_value[]" autocomplete="off">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control change_rs_value"
                                                           name="p_screen_defect_rs_value[]" autocomplete="off">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>     

                        <h2>Body Defects Question</h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="col-sm-8 text-center">Question</th>
                                        <th class="col-sm-2 text-center">% Value</th>
                                        <th class="col-sm-2 text-center">Rs Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($body_defect as $row) {
                                        $cond = 0;
                                        if (isset($product)) {
                                            $body = $this->cm->get_single_row('mst_body_defects_question', array('prod_id' => $product->p_id, 'bd_id' => $row['id']));
                                            if ($body != '') {
                                                $cond = 1;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="mb-3 col-md-8">
                                                            <label class="form-label"><?= $row['qsn_name'] ?></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="p_body_defects_id[]" value="<?= $row['id'] ?>">
                                                        <input type="number" class="form-control change_percent_value"
                                                               name="p_body_defects_percent_value[]" autocomplete="off" value="<?= ($body->bd_type == 1) ? $body->bd_value : '' ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control change_rs_value"
                                                               name="p_body_defects_rs_value[]" autocomplete="off" value="<?= ($body->bd_type == 2) ? $body->bd_value : '' ?>">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        if ($cond == 0) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="mb-3 col-md-8">
                                                        <label class="form-label"><?= $row['qsn_name'] ?></label>
                                                    </div> 
                                                </td>
                                                <td>
                                                    <input type="hidden" name="p_body_defects_id[]" value="<?= $row['id'] ?>">
                                                    <input type="number" class="form-control change_percent_value"
                                                           name="p_body_defects_percent_value[]" autocomplete="off">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control change_rs_value"
                                                           name="p_body_defects_rs_value[]" autocomplete="off">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>     

                        <h2>Functional Problem Question</h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="col-sm-8 text-center">Question</th>
                                        <th class="col-sm-2 text-center">% Value</th>
                                        <th class="col-sm-2 text-center">Rs Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($questions as $row) {
                                        $cond = 0;
                                        if (isset($product)) {
                                            $que = $this->cm->get_single_row('mst_product_question', array('pq_p_id' => $product->p_id, 'pq_q_id' => $row['q_id']));
                                            if ($que != '') {
                                                $cond = 1;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="mb-3 col-md-8">
                                                            <label class="form-label"><?= $row['q_title'] ?></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="p_question_id[]" value="<?= $row['q_id'] ?>">
                                                        <input type="number" class="form-control change_percent_value"
                                                               name="p_question_percent_value[]" autocomplete="off" value="<?= ($que->pq_type == 1) ? $que->pq_value : '' ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control change_rs_value"
                                                               name="p_question_rs_value[]" autocomplete="off" value="<?= ($que->pq_type == 2) ? $que->pq_value : '' ?>">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        if ($cond == 0) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="mb-3 col-md-8">
                                                        <label class="form-label"><?= $row['q_title'] ?></label>
                                                    </div> 
                                                </td>
                                                <td>
                                                    <input type="hidden" name="p_question_id[]" value="<?= $row['q_id'] ?>">
                                                    <input type="number" class="form-control change_percent_value"
                                                           name="p_question_percent_value[]" autocomplete="off">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control change_rs_value"
                                                           name="p_question_rs_value[]" autocomplete="off">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <h2>Accessories(Do you have following?)</h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="col-sm-8 text-center">Accessories</th>
                                        <th class="col-sm-2 text-center">% Value</th>
                                        <th class="col-sm-2 text-center">Rs Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($accessories as $row) {
                                        $cond = 0;
                                        if (isset($product)) {
                                            $acc = $this->cm->get_single_row('mst_product_accessories', array('pa_p_id' => $product->p_id, 'pa_a_id' => $row['a_id']));
                                            if ($acc != '') {
                                                $cond = 1;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="mb-3 col-md-8">
                                                            <label class="form-label"><?= $row['a_title'] ?></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="p_accessories_id[]" value="<?= $row['a_id'] ?>">
                                                        <input type="number" class="form-control change_percent_value"
                                                               name="p_accessories_percent_value[]" autocomplete="off" value="<?= ($acc->pa_type == 1) ? $acc->pa_value : '' ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control change_rs_value"
                                                               name="p_accessories_rs_value[]" autocomplete="off" value="<?= ($acc->pa_type == 2) ? $acc->pa_value : '' ?>">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        if ($cond == 0) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="mb-3 col-md-8">
                                                        <label class="form-label"><?= $row['a_title'] ?></label>
                                                    </div> 
                                                </td>
                                                <td>
                                                    <input type="hidden" name="p_accessories_id[]" value="<?= $row['a_id'] ?>">
                                                    <input type="number" class="form-control change_percent_value"
                                                           name="p_accessories_percent_value[]" autocomplete="off">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control change_rs_value"
                                                           name="p_accessories_rs_value[]" autocomplete="off">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <h2>Age</h2>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="col-sm-8 text-center">Age</th>
                                        <th class="col-sm-2 text-center">% Value</th>
                                        <th class="col-sm-2 text-center">Rs Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($ages as $row) {
                                        $cond = 0;
                                        if (isset($product)) {
                                            $page = $this->cm->get_single_row('mst_product_age', array('page_p_id' => $product->p_id, 'page_age_id' => $row['age_id']));
                                            if ($page != '') {
                                                $cond = 1;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="mb-3 col-md-8">
                                                            <label class="form-label"><?= $row['age_title'] ?></label>
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="p_age_id[]" value="<?= $row['age_id'] ?>">
                                                        <input type="number" class="form-control change_percent_value"
                                                               name="p_age_percent_value[]" autocomplete="off" value="<?= ($page->page_type == 1) ? $page->page_value : '' ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control change_rs_value"
                                                               name="p_age_rs_value[]" autocomplete="off" value="<?= ($page->page_type == 2) ? $page->page_value : '' ?>">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        if ($cond == 0) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="mb-3 col-md-8">
                                                        <label class="form-label"><?= $row['age_title'] ?></label>
                                                    </div> 
                                                </td>
                                                <td>
                                                    <input type="hidden" name="p_age_id[]" value="<?= $row['age_id'] ?>">
                                                    <input type="number" class="form-control change_percent_value"
                                                           name="p_age_percent_value[]" autocomplete="off">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control change_rs_value"
                                                           name="p_age_rs_value[]" autocomplete="off">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary px-5 radius-30" onclick="go_back()">Back</button>
                           
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--end row-->
</main>
<script>
    $(document).ready(function (e) {
        $(".change_percent_value").change(function (e) {
            $(this).parents('tr').find('.change_rs_value').val('');
        })
        $(".change_rs_value").change(function (e) {
            $(this).parents('tr').find('.change_percent_value').val('');
        })
    })
</script>