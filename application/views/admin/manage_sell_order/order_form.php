                            <?php    
                                $product_data =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' =>$order->product_id])->from('mst_product')->get()->row();
                                $model_data = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $product_data->p_m_id])->from('mst_model')->get()->row();
                                $variant_data =  $this->db->select("*")->where(['variant_id' => $product_data->p_variant_id],['active' => 1])->from('mst_variant')->get()->row(); 
                                $exc_data =  $this->db->select("*")->where(['staff_id' => $order->executive_id])->from('mst_staff')->get()->row(); 
                               
                                $tot = $order->sell_amt - $order->pickup_charge;
                                $order_add_date = date('l, F d, Y, h:iA',strtotime($order->order_add_date));

                                ?>
                                <?php if($order->order_status==1){
                                    $status = 'Order Placed';
                                    $desc = 'Create a Lead';
                                }elseif($order->order_status==2){
                                    $status = 'Order Confirmed';
                                    $desc = 'Lead Created';
                                }elseif($order->order_status==3){
                                    $status = 'Canceled';
                                    $desc = 'Order Canceled';
                                }elseif($order->order_status==4){
                                    $status = 'Order Completed';
                                    $desc = 'Order Completed';
                                }elseif($order->order_status==5){
                                    $status = 'Pickup In Progress';
                                    $desc = 'Pickup In Progress';
                                } ?>
            <main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li> 
                  </ol>
                </nav>
              </div>
             
            </div>
            <!--end breadcrumb-->
            <form id="forms" method="post" action="<?= base_url('admin/submit_order') ?>">
              <div class="card">
                <div class="card-header py-3"> 
                  <div class="row g-3 align-items-center">
                    <div class="col-12 col-lg-3 col-md-6 me-auto">                      
                      <h5 class="mb-1"><?=  $order_add_date ?></h5>
                      <p class="mb-0">Order ID : #<?= $order->order_id ?></p>
                    </div>
                    
                     <input type="hidden" name="id" value="<?= (isset($order)) ? $order->id : '' ?>">
                     <?php if($_SESSION['staff_type']==0){ ?>
                    <div class="col-12 col-lg-2 col-6 col-md-3">
                      <select class="form-select" id="ch_pincode" name="pincode_id" required>
                        <option value="">--Pincode--</option>
                        <?php foreach($pincode as $val){ ?>
                            <option value="<?= $val['pincode_id'] ?>" <?php if($order->pincode_id==$val['pincode_id']){ echo 'selected';} ?>><?= $val['pincode_code'] ?></option>
                        <?php } ?>
                     
                      </select>
                    </div>

                    <div class="col-12 col-lg-2 col-6 col-md-3">
                      <select class="form-select" id="get_execu" name="executive_id" required>
                        <option value="">--Executive--</option>
                         <?php if(!empty($order->executive_id)){ ?>
                        <option value="<?= $order->executive_id ?>" selected><?= $exc_data->staff_fullname; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <?php } ?>

                  <?php if(!empty($order->executive_id)){ ?>
                    <div class="col-12 col-lg-2 col-6 col-md-3">
                      <select class="form-select" name="order_status" required>
                        <option value="">--Change Status--</option>
                        <?php if($order->order_status==3){ ?>
                          <option value="3" <?php if($order->order_status=='3'){ echo 'selected';} ?>>Cancel</option>
                       <?php }else{ ?>
                        <!--<option value="1" <?php if($order->order_status=='1'){ echo 'selected';} ?>>Order Placed</option>
                        <option value="2" <?php if($order->order_status=='2'){ echo 'selected';} ?>>Order Confirmed</option>-->
                        <option value="3" <?php if($order->order_status=='3'){ echo 'selected';} ?>>Cancel</option>
                        <option value="5" <?php if($order->order_status=='5'){ echo 'selected';} ?>>Pickup In Progress</option>
                        <option value="4" <?php if($order->order_status=='4'){ echo 'selected';} ?>>Order Completed</option>
                       <?php } ?>
                      </select>
                    </div>
                  <?php } ?>
                    <div class="col-12 col-lg-2 col-6 col-md-3">
                       <button type="submit" class="btn btn-primary">Save</button>
                       <!--<button type="button" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> Print</button>-->
                    </div>
                  </div>
                 </div>
                 </form>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
                       <div class="col">
                         <div class="card border shadow-none radius-10">
                           <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                              <div class="icon-box bg-light-primary border-0">
                                <i class="bi bi-person text-primary"></i>
                              </div>
                              <div class="info">
                                 <h6 class="mb-2">Customer</h6>
                                 <p class="mb-1"><?= $order->user_name ?></p>
                                 <p class="mb-1"><?= $order->user_email ?></p>
                                 <p class="mb-1">+91-<?= $order->user_phone ?></p>
                              </div>
                           </div>
                           </div>
                         </div>
                       </div>
                       <div class="col">
                        <div class="card border shadow-none radius-10">
                          <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                              <div class="icon-box bg-light-success border-0">
                                <i class="bi bi-truck text-success"></i>
                              </div>
                             
                              <div class="info">
                                 <h6 class="mb-2">Order info</h6>
                                 <?php if($order->executive_id==''){
                                      $exc = 'Not Assigned';
                                 }else{
                                       $exc =  $exc_data->staff_fullname;
                                  } ?>
                                 <p class="mb-1"><strong>Assined Executive</strong> : <?= $exc ?></p>
                                 <?php if($order->payment_mode=='ibt'){ 
                                          $pm = 'Instant Bank Transfer';
                                 }elseif($order->payment_mode=='COD'){
                                          $pm = 'Cash on Delivery';
                                 }elseif($order->payment_mode=='upip'){
                                          $pm = 'UPI';
                                   }
                                 
                                  if(empty($order->payment_id)){
                                    $py_pen = 'Payment Method Pending';
                                  }else{
                                    $py_pen = '';
                                  }
                                  ?>
                                   
                                 <p class="mb-1"><strong>Pay Method</strong> : <?= $pm; ?><span class="text-danger"><?= $py_pen ?></span></p>
                                 <p class="mb-1"><strong>Status</strong> : <?= $status; ?></p>
                              </div>
                           </div>
                           </div>
                          </div>
                       </div>
                      <div class="col">
                        <div class="card border shadow-none radius-10">
                          <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                              <div class="icon-box bg-light-danger border-0">
                                <i class="bi bi-geo-alt text-danger"></i>
                              </div>
                              <div class="info">
                                <h6 class="mb-2">Deliver to</h6>
                                <?php $date = date('Y',strtotime($order->order_add_date)) ;?>
                                <p class="mb-1"><strong>Date</strong> : <?= $order->pickup_date ?>,<?= $date ?></p>
                                <p class="mb-1"><strong>Time Slot</strong> : <?= $order->time_slot ?></p>
                                <p class="mb-1"><strong>Address</strong> : <?= $order->pickup_address ?></p>
                              </div>
                            </div>
                          </div>
                         </div>
                    </div>
                  </div><!--end row-->

                  <div class="row">
                      <div class="col-12 col-lg-5">
                         <div class="card border shadow-none radius-10">
                           <div class="card-body">
                               <div class="table-responsive">
                                 <table class="table align-middle mb-0">
                                   <thead class="table-light">
                                     <tr>
                                       <th>Product</th>
                                       <th>Unit Price</th>
                                       <th>Quantity</th>
                                       <th>Total</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr>
                                       <td>
                                         <div class="orderlist">
                                          <a class="d-flex align-items-center gap-2" href="javascript:;">
                                            <div class="product-box">
                                                <img src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" alt="<?= $model_data->m_name ?>" alt="">
                                            </div>
                                            <div>
                                                <p class="mb-0 product-title"><?= $model_data->m_name; ?> (<?= $variant_data->variant_name; ?>)</p>
                                            </div>
                                           </a>
                                         </div>
                                       </td>
                                       <td>₹<?=  $tot ?></td>
                                       <td>1</td>
                                       <td>₹<?=  $tot ?></td>
                                     </tr>
                                    
                                   </tbody>
                                 </table>
                               </div>
                           </div>
                         </div>
                      </div>
                      <div class="col-12 col-lg-3">
                        <div class="card border shadow-none bg-light radius-10">
                          <div class="card-body text-center">
                            <button type="button" class="btn btn-success px-5 radius-30" data-bs-toggle="modal" data-bs-target="#dvcRptModel">User Device Report</button>
                            <hr><a href="<?= base_url('admin/edit_device_report/' . $order->id) ?>"><button type="button" class="btn btn-primary px-5 radius-30">Re-calculate Report</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="card border shadow-none bg-light radius-10">
                          <div class="card-body">
                              <div class="d-flex align-items-center">
                                 <div>
                                    <h5 class="mb-0">Order Summary</h5>
                                 </div>
                                 <div class="ms-auto">
                                   <button type="button" class="btn alert-success radius-30 px-4"><?= $status ?></button>
                                </div>
                              </div>
                                <div class="d-flex align-items-center mb-3">
                                  <div>
                                      
                                    <p class="mb-0">Sub Total</p>
                                  </div>
                                  <div class="ms-auto">
                                    <h5 class="mb-0">₹<?= $tot ?></h5>
                                </div>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                <div>
                                  <p class="mb-0">Selling Price</p>
                                </div>
                                <div class="ms-auto">
                                  <h5 class="mb-0">₹<?= $order->sell_amt ?></h5>
                              </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                  <p class="mb-0">Pickup charges</p>
                                </div>
                                <div class="ms-auto">
                                <?php if($order->pickup_charge=='0.00'){ 
                                     $pcharge = 'Free';
                                     $textc = 'text-success';
                                   }else{
                                    $pcharge = '- ₹ '.$order->pickup_charge;
                                    $textc = 'text-danger';
                                   } ?>
                                  <h5 class="mb-0 <?= $textc; ?>"><?= $pcharge ?></h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                  <p class="mb-0">Original Price</p>
                                </div>
                                <div class="ms-auto">
                                  <h5 class="mb-0">₹<?= $product_data->p_price; ?></h5>
                                </div>
                            </div>
                          
                          </div>
                        </div>
                     </div>
                     
                  </div><!--end row-->
                 
                    <div class="row">
                    <?php if($order->order_status==3){ ?>
                        <div class="col-12 col-lg-4">
                          <div class="card border shadow-none radius-10">
                              <div class="card-body">
                                  <div>
                                    <h6 class="mb-10">Cancel Reason</h6>
                                    <p class="text-danger"><?php echo $order->reason_cancel; ?></p>
                                    <p><b>Comment:</b> <?php echo $order->comment; ?>
                                 </div>
                              </div>
                            </div>
                        </div>
                      <?php } ?>   
                      <?php if(!empty($feedback->order_id)){ ?>
                        <div class="col-12 col-lg-4">
                          <div class="card border shadow-none radius-10">
                              <div class="card-body">
                                 
                                    <h6 class="mb-10">Feedback</h6>
                               
                                    <?php if($feedback->rating=='Excellent'){ ?>
                                        <div class="rating mb-0">
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                        </div>
                                      <?php }elseif($feedback->rating=='Good'){ ?>
                                      <div class="rating mb-0">
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill "></i>
                                        </div>
                                        <?php }elseif($feedback->rating=='OK'){ ?>
                                          <div class="rating mb-0">
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill"></i>
                                          <i class="bi bi-star-fill"></i>
                                        </div>
                                        <?php }elseif($feedback->rating=='Bad'){ ?>
                                          <div class="rating mb-0">
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill"></i>
                                          <i class="bi bi-star-fill"></i>
                                          <i class="bi bi-star-fill"></i>
                                        </div>
                                        <?php }elseif($feedback->rating=='Terrible'){ ?>
                                          <div class="rating mb-0">
                                          <i class="bi bi-star-fill text-warning"></i>
                                          <i class="bi bi-star-fill"></i>
                                          <i class="bi bi-star-fill"></i>
                                          <i class="bi bi-star-fill"></i>
                                          <i class="bi bi-star-fill"></i>
                                        </div>
                                      <?php } ?>
                                      <h6><?php echo $feedback->rating; ?></h6>
                                          <ul>
                                            <?php $review = json_decode($feedback->rating_list,true);
                                              foreach ($review as $val )
                                              { ?>
                                                <li><?php echo $val ?> </li>
                                            <?php } ?>
                                          </ul>
                                          <p><b>Comment:</b> <?php echo $feedback->feed_comment; ?>
                              </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                 
                
                    <div class="mb-3">
                            <button type="button" class="btn btn-primary px-5 radius-30" onclick="go_back()">Back</button>
                    </div>

                </div>
              </div>

          </main>

<?php
$json =  $this->db->select("*")->where(['order_id' => $order->order_id])->from('device_report')->get()->row();
$json1 = json_decode($json->history,true);


?>
<!---device report model------------>
                <div class="modal fade show" id="dvcRptModel" tabindex="-1" aria-modal="true" role="dialog">
											<div class="modal-dialog modal-dialog-scrollable">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Device Report</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
                              <h6>Device Details</h6>
                               <ul>
                                 <?php 
                                   foreach ($json1['device_details'] as $dt_val )
                                  { ?>
                                    <li><?php echo $dt_val ?> </li>
                                 <?php } ?>
                               </ul>
                               <h6>Screen Condition</h6>
                               <ul>
                               <?php if(!empty($json1['screen_condition'])){ ?>
                                 <?php 
                                  foreach ($json1['screen_condition'] as $sc_val )
                                  { ?>
                                    <li><?php echo $sc_val ?> </li>
                                 <?php } ?>
                                 <?php }else{ ?>
                                    <li>No Spot On screen </li>
                                    <li>No Line On display </li>
                                    <li>No scratches on screen </li>
                                  <?php } ?>
                               </ul>
                               <h6>Body Defects</h6>
                               <ul>
                               <?php if(!empty($json1['body_condition'])){ ?>
                                 <?php 
                                  foreach ($json1['body_condition'] as $bd_val )
                                  { ?>
                                    <li><?php echo $bd_val ?> </li>
                                 <?php } ?>
                                 <?php }else{ ?>
                                    <li>No any defects phone body </li>
                                   
                                  <?php } ?>
                               </ul>
                               <h6>Functional Problem</h6>
                               <ul>
                               <?php if(!empty($json1['functional_problem'])){ ?>
                                 <?php 
                                 foreach ($json1['functional_problem'] as $fp_val )
                                  { ?>
                                     <li><?php echo $fp_val ?> </li>
                                 <?php } ?>
                                 <?php }else{ ?>
                                    <li>Front Camera Working </li>
                                    <li>Back Camera Working </li>
                                    <li>Volume Button Working </li>
                                    <li>Finger Touch  Working</li>
                                    <li>WiFi Working</li>
                                    <li>Battery Working Fine</li>
                                    <li>Speaker Working</li>
                                    <li>Power Button Working</li>
                                    <li>Charging Port Working</li>
                                    <li>Face Sensor Working</li>
                                    <li>Silent Button Working</li>
                                    <li>Camera Glass Working</li>
                                    <li>Bluetooth Working</li>
                                    <li>Vibrator Working</li>
                                    <li>Microphone Working</li>
                                  <?php } ?>
                               </ul>
                               <h6>Do you have the following?</h6>
                               <ul>
                               <?php if(!empty($json1['do_you_have'])){ ?>
                                 <?php 
                                 foreach ($json1['do_you_have'] as $do_val )
                                  { ?>
                                     <li><?php echo $do_val ?> Available </li>
                                 <?php } ?>
                                 <?php }else{ ?>
                                    <li>Original Charger of Device Not Available </li>
                                    <li>Original Earphones Not Available </li>
                                    <li>Box with same IMEI Not Available </li>
                                    <li>Bill with same IMEI Not Available </li>
                                  <?php } ?>
                               </ul>
                               <h6>Mobile Age</h6>                             
                               <ul>
                               <?php if(!empty($json1['mobile_age'])){ ?>
                                  <?php foreach ($json1['mobile_age'] as $ma_val ){ ?>
                                      <li><?php echo $ma_val ?> </li>
                                      <?php } ?>
                                  <?php }else{ ?>
                                    <li>No Mobile Age </li>
                                  <?php } ?>
                                
                               </ul>
                               
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
						    </div>