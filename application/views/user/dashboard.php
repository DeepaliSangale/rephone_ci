    

       <!------------------------------------ Add Bnak Details----------------------------------------------------->  
       <div class="offcanvas offcanvas-end offcanvasRight-addbank" tabindex="-1"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?= base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body">
            <div class="row">
               <div class="container">
                  <h3 class="mb-10">Add Bank Details</h3>
                  <form id="bankForm">
                     <div class="form-group">
                        <label>Account no.</label>
                        <input type="number" id="ac_no" name="ac_no" class="form-control"  required="required" autocomplete="off" value="">
                     </div>
                     <div class="form-group">
                        <label>Confrim Account no.</label>
                        <input type="number" id="acct_no" name="acct_no" class="form-control"  required="required" autocomplete="off" value="">
                     </div>
                     <div class="form-group">
                        <label>Beneficiary Name</label>
                        <input type="text" name="benef_name" class="form-control"  required="required">
                     </div>
                     <div class="form-group">
                        <label>IFSC Code</label>
                        <input type="text" name="bank_ifsc_code" id="bank_ifsc_code" class="form-control" required="required" style="text-transform: uppercase;" onchange="getBankbyifsc();">
                     </div>
                     <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name" class="form-control"  required="required" readonly>
                     </div>
                     <div class="form-group">
                     <div class="chek-form">
                           <div class="custome-checkbox">
                              <input class="form-check-input" type="checkbox" name="terms_chk_b" id="termCheckbox123"  required="required" checked>
                              <label class="form-check-label" for="termCheckbox123"><span>I hereby declare that the details are true.</span></label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                      <small class="terms_chk_b_error text-danger mb-10"></small>
                     </div>
                     <div class="form-group">
                        <div class="d-grid gap-2">
                           <button type="submit" class="btn btn-primary">Add Account</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!------------------------// Add Bnak Details------------------------------------------------------------------->

      <!------------------------------------ Add UPI Details----------------------------------------------------->  
      <div class="offcanvas offcanvas-end offcanvasRight-addupi" tabindex="-1"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?= base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body">
            <div class="row">
               <div class="container">
                  <h3 class="mb-10">Add Exsiting UPI ID</h3>
                  <form id="upiForm">
                     <div class="form-group">
                        <label>Enter Your UPI ID</label>
                        <input type="text" name="upi_id" class="form-control"  required="required" autocomplete="off" value="">
                     </div>
                     <p class="mb-30">UPI ID is in the format of mobile@bank or username@bank.
                        Find your UPI ID: Open UPI app > Tap Settings</p>
                    <P class="text-center mt-30"><i class="fi-rs-lock mr-5"></i> Your account is encrypted and 100% safe with us.</P>
                     <div class="form-group mt-15">
                        <div class="d-grid gap-2">
                           <button type="submit" class="btn btn-primary loader-btn">Add UPI</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!------------------------// Add UPI Details------------------------------------------------------------------->


      
      <!------------------------------------ Add Address Details----------------------------------------------------->  
      <div class="offcanvas offcanvas-end offcanvasRight-addaddress"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?= base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body">
            <div class="row">
               <div class="container">
                  <form id="SvdAddForm">
                     <div class="form-group">
                        <div class="input-group mb-3">
                           <span class="input-group-text" id="basic-addon1"><i class="fi-rs-search mr-5"></i></span>
                           <input type="text" id="autocomplete" class="form-control" placeholder="Search your location.." aria-label="Username" aria-describedby="basic-addon1">
                           <input type="hidden" id="mainAddress" />
                           <input type="hidden" name="state" id="state" />
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group mb-3" onclick="getLocation();">
                           <span class="input-group-text" id="basic-addon1"><img src="<?= base_url() ?>assets/site_img/curr_loc.png" alt="location" height="25" width="25"></span>
                           <label class="curr_loc">Use my current location</label>
                           <span id="latngdemo"></span>
                         </div>
                      </div>
                      <div class="form-group">
                        <label>Enter flat no / office / floor</label>
                        <input type="text" name="flat_office_floor" class="form-control"  required="required">
                     </div> 
                     <div class="form-group">
                        <label>Landmark(optional)</label>
                        <input type="text" name="landmark"  class="form-control">
                     </div>                      
                     <div class="form-group">
                        <label>Pincode</label>
                        <input type="number" id="postalcode" name="pincode" class="form-control" required="required" onkeypress="if(this.value.length==6) return false;" onchange="get_pincode_bycity();">
                     </div> 
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" id="city" name="city" class="form-control" required="required" readonly>
                     </div> 
                     <div class="">
                        <label>Save As</label><br>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="address_type" id="inlineRadio1" value="Home" onclick="check_address_exist(this.value)">
                           <label class="form-check-label c-black font16" for="inlineRadio1">Home</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="address_type" id="inlineRadio2" value="Office" onclick="check_address_exist(this.value)">
                           <label class="form-check-label c-black font16" for="inlineRadio2">Office</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="address_type" id="inlineRadio3" value="Other" checked>
                           <label class="form-check-label c-black font16" for="inlineRadio3">Other</label>
                         </div>
                     </div>
                     <div class="form-group mt-15">
                        <div class="d-grid gap-2">
                           <button type="submit" class="btn btn-primary loader-btn">Add Address</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!------------------------// Add Address Details------------------------------------------------------------------->



       <!------------------------------------ Edit Address Details----------------------------------------------------->  
       <div class="offcanvas offcanvas-end offcanvasRight-editAddress"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?= base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body" id="offcanvas-body">
            <div class="row">
               <div class="container">
     
               </div>
            </div>
         </div>
      </div>
      <!------------------------// Edit Address Details------------------------------------------------------------------->

      <main class="main">
         <section class="pt-40 pb-40">
            <div class="page-header profile-grid">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6 mt-20">
                      <h1 class="profile-name">  <?= $this->user_profile->user_name ?></h1>
                      <div class="row">
                         <div class="col-lg-6">
                            <span class="color-white font16"> <?= $this->user_profile->user_phone ?></span>
                            <span class="color-white font16 float-end"> <?= $this->user_profile->user_email ?></span>
                         </div>
                      </div>
                    
                     </div>
                     <div class="col-md-6 mt-20">
                        <button class="btn btn-outline-primary btn-sm float-end" data-bs-toggle="offcanvas" data-bs-target=".offcanvasRight-editprofile">Edit Profile</button>
                   </div>
                  </div>
                  
               </div>
             </div>
            <div class="container profilediv">
               <div class="row">
                  <div class="col-lg-12 m-auto shadow-lg pb-50">
                     <div class="row mt-30">
                        <div class="col-md-3">
                           <div class="dashboard-menu d-none d-lg-block d-md-block">
                              <ul class="nav flex-column" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="saved-payments-tab" data-bs-toggle="tab" href="#saved-payments" role="tab" aria-controls="saved-payments" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Saved Payments</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>Saved Address</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url() ?>web/logout"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-9">
                           <div class="tab-content dashboard-content">
                              <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                 <div class="card">
                                    <div class="card-header">
                                       <h5 class="mb-0">Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                       <?php if(!empty($order_details)){ ?>
                                          <h4 class="gen-color font14">Sell</h4>
                                       <!--------Orders-->
                                       <?php foreach($order_details as $val){ ?>
                                       <?php $product_data =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' => $val['product_id']])->from('mst_product')->get()->row(); ?>
                                       <?php $model_data = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $product_data->p_m_id])->from('mst_model')->get()->row(); ?>
                                       <?php $variant_data =  $this->db->select("*")->where(['variant_id' => $product_data->p_variant_id],['active' => 1])->from('mst_variant')->get()->row(); ?>
                                       <?php if($val['order_status']==1){
                                                   $status = 'Order Placed';
                                                   $desc = 'Create a Lead';
                                                   $color = 'gen-color';
                                             }elseif($val['order_status']==2){
                                                   $status = 'Order Confirmed';
                                                   $desc = 'Lead Created';
                                                   $color = 'gen-color';
                                             }elseif($val['order_status']==3){
                                                   $status = 'Pickup Canceled';
                                                   $desc = 'Order Canceled';
                                                   $color = 'gen-color';
                                             }elseif($val['order_status']==4){
                                                   $status = 'Completed';
                                                   $desc = 'Order Completed';
                                                   $color = 'gen-color';
                                             }elseif($val['order_status']==5){
                                                   $status = 'Pickup In Progress';
                                                   $desc = 'Pickup In Progress';
                                                   $color = 'gen-color';
                                             } 
                                             if($val['order_status']==1 && empty($val['payment_id'])){
                                                  $status ='Payment Method Pending';
                                                  $color = 'c-red';
                                             }
                                             ?>
                                       
                                       <div class="row mt-10">
                                          <div class="col-lg-6 col-md-7 col-sm-6">
                                          <?php $order_date = date('Y',strtotime($val['order_add_date'])) ?>
                                             <p class="text-mute font-size-15 mt-15">Date: <?= $val['pickup_date'] ?>' <?= $order_date ?></p>
                                             <h3 class="font16"><?= $model_data->m_name; ?> (<?= $variant_data->variant_name; ?>)</h3>
                                             <h3 class="font16 mt-4">Status : <span class="<?php echo $color ?>"><?= $status ?></span></h3>
                                             <p class="text-mute mt-4">Sell Amount : ₹<?= $val['sell_amt'] - $val['pickup_charge'] ?></p>
                                          </div>
                                          <div class="col-lg-6 col-md-5 col-sm-6">
                                             <p class="text-mute fw-600">Order No : <span class="c-black">#<?= $val['order_id'] ?></span></p>
                                             <figure class="">
                                                <img src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" height="100" width="100">
                                             </figure>
                                             <div class="row">
                                                <div class="col-6">
                                                <a href="<?= base_url()?>dashboard/order_details/<?= $val['order_id'] ?>"><span class="get-exact-green rounded mx-auto">See Details</span></a>
                                                </div>
                                                <?php if(empty($val['payment_id'])){ ?>
                                                <div class="col-6">
                                               
                                                   <a href="<?= base_url()?>web/payment/<?= $val['order_id'] ?>"><span class="get-exact-red rounded mx-auto"> Add Payment</span></a>
                                                </div>
                                                <?php } ?>
                                             </div>
                                          </div>
                                       </div> <hr>
                                       <!--------//Orders-->
                                       <?php } ?>
                                      
                                       <?php } ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="saved-payments" role="tabpanel" aria-labelledby="saved-payments-tab">
                                 <div class="card">
                                    <div class="card-header">
                                       <h5 class="mb-0">Saved Payments</h5>
                                    </div>
                                    <div class="card-body">
                                       <!-----Saved Paymets-->
                                       <div class="row">
                                          <div class="col-lg-9 col-sm-3 col-6 m-auto">
                                             <h4 class="gen-color font14">Bank Transfer</h4>
                                          </div>
                                          <div class="col-sm-3 col-6 m-auto">
                                             <button class="btn btn-outline-primary btn-small float-end" type="button" data-bs-toggle="offcanvas" data-bs-target=".offcanvasRight-addbank">Add +</button>
                                          </div>
                                       </div>
                                       <div class="row mt-4">
                                       <?php if(!empty($user_banks)) { ?>
                                          <?php foreach($user_banks as $bank){ ?>
                                             <div class="col-lg-6">
                                                <div class="card mb-3 mb-lg-0">
                                                   <div class="card-header">
                                                      <h5 class="mb-0"><?= $bank['bank_name'] ?></h5>
                                                   </div>
                                                   <div class="card-body">
                                                      <span> <?= getTruncatedCCNumber($bank['acct_no']); ?> <a onclick="delete_bank_account(<?= $bank['id'] ?>)" class="float-end"><i class="fi-rs-trash mr-5 text-muted"></i></a></span>   
                                                   </div>
                                                </div>
                                             </div>
                                          <?php } ?>
                                          <?php } ?>
                                          
                                       </div>
                                       <!-----///Saved Paymets-->
                                       <!-----UPI Paymets-->
                                       <div class="row mt-4">
                                          <div class="col-lg-9 col-sm-3 col-6 m-auto">
                                             <h4 class="gen-color font14">UPI</h4>
                                          </div>
                                          <?php if(empty($user_upi->upi_id)){ ?>
                                          <div class="col-sm-3 col-6 m-auto">
                                             <button class="btn btn-outline-primary btn-small float-end" type="button"  data-bs-toggle="offcanvas" data-bs-target=".offcanvasRight-addupi">Add +</button>
                                          </div>
                                          <?php } ?>
                                       </div>
                                       <div class="row mt-4">
                                          <?php if(!empty($user_upi->upi_id)){ ?>
                                          <div class="col-lg-6">
                                             <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                   <h5 class="mb-0">UPI</h5>
                                                </div>
                                                <div class="card-body">
                                                   <span> <?= getTruncatedCCNumber($user_upi->upi_id); ?> <a onclick="delete_upi_id(<?= $user_upi->id ?>)" class="float-end"><i class="fi-rs-trash mr-5 text-muted"></i></a></span>   
                                                </div>
                                             </div>
                                          </div>
                                        <?php } ?>
                                          <!-----///UPI Paymets-->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                 <div class="card">
                                    <div class="card-header">
                                       <h5 class="mb-0">Saved Address</h5>
                                    </div>
                                    <div class="card-body">
                                       <!-----Saved address-->
                                       <div class="row">
                                          <div class="col-lg-9 col-sm-3 col-6 m-auto">
                                             <h4 class="gen-color font14">Address</h4>
                                          </div>
                                          <div class="col-sm-3 col-6 m-auto">
                                             <button class="btn btn-outline-primary btn-small float-end" type="button" data-bs-toggle="offcanvas" data-bs-target=".offcanvasRight-addaddress">Add +</button>
                                          </div>
                                       </div>
                                       <?php if(!empty($user_address)){ ?>
                                       <div class="row mt-4">
                                          <?php foreach($user_address as $val){ ?>
                                          <div class="col-lg-6">
                                             <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                   <h5 class="mb-0"><?= $val['address_type'] ?></h5>
                                                </div>
                                                <div class="card-body">
                                                   <p class="c-black"><?= $val['city'] ?>,<?= $val['state'] ?></p>
                                                   <?php if(empty($val['landmark'])){
                                                       $landmark = '';
                                                   }else{
                                                       $landmark = ','.$val['landmark'].'';
                                                   } ?>
                                                   <p class="c-black mb-3"><?= $val['flat_office_floor'] ?><?= $landmark ?> <?= $val['state'] ?>, <?= $val['pincode'] ?></p>
                                                   <a onclick="edit_details_address(<?= $val['id']; ?>)" class="text-decoration-underline fonfont16-14 gen-color"> Edit <i class="fi-rs-edit mr-5"></i></a>
                                                   <a onclick="delete_address(<?= $val['id']; ?>)" class="text-decoration-underline fonfont16-14 gen-color offset-md-2"> Delete <i class="fi-rs-trash mr-5"></i></a>
                                                </div>
                                             </div>
                                          </div>
                                          <?php } ?>
                                         
                                       <?php } ?>
                                       <!-----///Saved Address-->
                            
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>


