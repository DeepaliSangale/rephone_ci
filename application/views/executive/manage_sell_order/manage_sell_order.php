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
                  
                </div>
                <div class="col-md-4 col-6">
                  
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle  dataTable" id="example2">                   
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Order ID</th>
                            <th>User Name</th>
                            <th>Mobile No.</th>
                            <th>Model Name</th>
                            <th>Selling Price</th>
                            <th>Order status</th>
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        if (!empty($order)) {
                            foreach ($order as $key => $row) {
                                ?>
                                <?php if($row['order_status']==1){
                                        $status = 'Order Placed';
                                        $desc = 'Create a Lead';
                                    }elseif($row['order_status']==2){
                                        $status = 'Order Confirmed';
                                        $desc = 'Lead Created';
                                    }elseif($row['order_status']==3){
                                        $status = 'Canceled';
                                        $desc = 'Order Canceled';
                                    }elseif($row['order_status']==4){
                                        $status = 'Completed';
                                        $desc = 'Order Completed';
                                    }elseif($row['order_status']==5){
                                        $status = 'Pickup In Progress';
                                        $desc = 'Pickup In Progress';
                                    } ?>
                                <?php    
                                $product_data =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' =>$row['product_id']])->from('mst_product')->get()->row();
                                $model_data = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $product_data->p_m_id])->from('mst_model')->get()->row();
                                $variant_data =  $this->db->select("*")->where(['variant_id' => $product_data->p_variant_id],['active' => 1])->from('mst_variant')->get()->row(); ?>
                                <tr class='main_block' main_id="<?= $row['id'] ?>">
                                    <td><?= $key + 1 ?></td>
                                    <td class="">
                                        <h6 class="mb-0 product-title">#<?= $row['order_id'] ?></h6>     
                                    </td>
                                    <td>
                                        <h6 class="mb-0 product-title"><?= $row['user_name'] ?></h6>                                        
                                    </td>
                                  
                                    <td>
                                       <h6 class="mb-0 product-title"><a href="tel:91<?= $row['user_phone'] ?>"><?= $row['user_phone'] ?></a></h6> 
                                    </td>
                                    <td>
                                      <h6 class="mb-0 product-title"> <?= $model_data->m_name; ?> (<?= $variant_data->variant_name; ?>)</h6>
                                    </td>
                                    <td>
                                       <?php $sell_amt =  $row['sell_amt'] - $row['pickup_charge']; ?>
                                       <h6 class="mb-0 product-title"><?= $sell_amt ?></h6> 
                                    </td>
                                    <td>
                                     
                                       <h6 class="mb-0 product-title"><?= $status ?></h6> 
                                    </td>
                                  
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <!--<a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>-->
                                            <a href="<?= base_url('executive/order_form/' . $row['id']) ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="views"><i class="bi bi-eye-fill"></i></a>
                                            <!--<a href="javascript:;" class="text-danger delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"  action='delete_order'><i class="bi bi-trash-fill"></i></a>-->
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
         
        </div>
    </div>
</main>