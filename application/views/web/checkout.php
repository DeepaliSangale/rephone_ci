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





<!-- Order Calculation start here----------------------------->
<main class="main" id="mainCalcWindow">
   <section class="mt-30 mb-50">
      <div class="container">
         <h1>You are almost done!</h1>
         <div class="row">
            <div class="col-lg-7">
               <div class="row border border-radius-10">
                  <div class="col-lg-12 col-md-6 col-sm-6 mt-20">
                     <form id="checkoutForm">
                        <input type="hidden" name="product_id" value="<?= $product_data->p_id ?>">
                        <input type="hidden" name="pickup_charge" value="<?= $pickup_charges->pickup_charge ?>">
                        <input type="hidden" name="sell_amt" value="<?= $tot_amt ?>">
                        <!------------------------------------ Add Address Details-----------------------------------------------------> 
                        <?php if(empty($user_address)) { ?>
                        <h4><span class="badge bg-secondary  mb-10">1</span> Address</h4>
                        <div class="row">
                           <div class="col-lg-4">
                              <button class="btn btn-outline-primary btn-small mr-20" type="button" data-bs-toggle="offcanvas" data-bs-target=".offcanvasRight-addaddress">Add New address +</button>
                           </div>
                        </div>
                       
                        <?php }else{ ?>
                        <div class="row" id="complete_addr" style="display:none;">
                           <div class="col-9">
                              <h4><span class="badge bg-success  mb-10"><i class="fi-rs-check"></i></span> Address</h4>
                              <p class="txt_addr" id="txt_addr"></p>
                           </div>
                           <div class="col-3">
                              <button type="button" class="btn btn-outline-primary btn-small float-end" onclick="dispAddrwindow();"> Edit </button>
                           </div>
                        </div>
                        <div class="row mt-4" id="adr-screen">
                           <h4><span class="badge bg-secondary  mb-10">1</span> Address</h4>
                           <div class="row">
                           <div class="col-lg-4">
                              <button class="btn btn-outline-primary btn-small mr-20" type="button" data-bs-toggle="offcanvas" data-bs-target=".offcanvasRight-addaddress">Add New address +</button>
                           </div>
                        </div>
                           <?php foreach($user_address as $val){ ?>
                           <?php if(empty($val['landmark'])){
                              $landmark = '';
                              }else{
                              $landmark = ','.$val['landmark'].'';
                              } ?>
                           <div class="col-lg-12">
                              <div class="card mb-3 mb-lg-0">
                                 <div class="card-header">
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input addr-radio" type="radio" name="address_type_order" id="inlineRadioad"  data-name="<?= $val['flat_office_floor'] ?><?= $landmark ?> <?= $val['state'] ?>, <?= $val['pincode'] ?>" value="<?= $val['flat_office_floor'] ?><?= $landmark ?> <?= $val['state'] ?>, <?= $val['pincode'] ?>">
                                       <label class="form-check-label c-black font18" for="inlineRadioad"><?= $val['address_type'] ?></label>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <p class="c-black"><?= $val['city'] ?>,<?= $val['state'] ?></p>
                                    <p class="c-black mb-3"><?= $val['flat_office_floor'] ?><?= $landmark ?> <?= $val['state'] ?>, <?= $val['pincode'] ?></p>
                                    <a onclick="edit_details_address(<?= $val['id']; ?>)" class="text-decoration-underline fonfont16-14 gen-color"> Edit <i class="fi-rs-edit mr-5"></i></a>
                                    <a onclick="delete_address(<?= $val['id']; ?>)" class="text-decoration-underline fonfont16-14 gen-color offset-md-2"> Delete <i class="fi-rs-trash mr-5"></i></a>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                           <?php if(!empty($user_address)) { ?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <button class="btn btn-outline-primary btn-small float-end" type="button" onclick="ValidateAddress()">Continue <i class="fi-rs-arrow-right ml-5"></i></button>
                              </div>
                           </div>
                           <?php } ?>
                        </div>
                        <?php } ?>
                  </div>
                  <!------------------------// Add Address Details------------------------------------------------------------------->

                  <!------------------------------------ Pickup Slot Details-----------------------------------------------------> 
                  <div class="row" id="complete_slot" style="display:none;">
                           <div class="col-9 mt-10">
                              <h4><span class="badge bg-success  mb-10"><i class="fi-rs-check"></i></span> Pickup Slot</h4>
                              <span class="txt_day" id="txt_day"></span>-<span id="txt_time" class="txt_time"></span>
                           </div>
                           <div class="col-3 mt-10">
                              <button type="button" class="btn btn-outline-primary btn-small float-end" onclick="dispSlotwindow();"> Edit </button>
                           </div>
                  </div>
                  <div class="row mt-4" id="pickup-screen" style="display:none;">
                    <h4><span class="badge bg-secondary  mb-10">2</span> Pickup Slot</h4>
                    <div class="row box">
                        <?php 
                           $date = date('Y-m-d', strtotime('+2 day')); //tomorrow date
                           $weekOfdays = array();
                           $begin = new DateTime($date);
                           $end = new DateTime($date);
                           $end = $end->add(new DateInterval('P8D'));
                           $interval = new DateInterval('P1D');
                           $daterange = new DatePeriod($begin, $interval ,$end);
                           
                        ?>

                       <p class="font-semi-bold c-black">Please select your preferable pickup date.</p>
                       <?php foreach($daterange as $dt){ ?>
                       <div class="col-lg-3 col-6">
                           <label class="date-avl shadow-sm  mb-10 mt-30 date-list" id="myDiv1">
                              <div class="product-img-action-wrap text-center">
                                 <input type="radio"  class="k-checkbox1 day-radio" id="my-checkbox1" data-name="<?= $dt->format('l, M d'); ?>" name="pickup_date" value="<?= $dt->format('l, M d'); ?>">
                                 <h2><?= $dt->format('d') ?></h2>
                              </div>
                              <p class="bg-gray1 text-center"><span class="font-semi-bold"><?= $dt->format('l') ?></span></p>
                           </label>
                        </div>
                        <?php } ?>
                    </div>
                        <div class="row box2">
                           <p class="font-semi-bold c-black">Your availability on that day</p>
                           <?php foreach($time_slot as $val) { ?>
                           <div class="col-lg-3 col-6">
                              <label class="time-avl time-list">
                                 <input type="radio" class="k-checkbox1 time-radio" name="time_avil" data-name="<?= $val['time_slot'] ?>" value="<?= $val['time_slot'] ?>">
                                 <span class="font-semi-bold"><?= $val['time_slot'] ?></span>
                              </label>
                           </div>
                           <?php } ?>
                           
                       </div>

                    <div class="row">
                        <div class="col-lg-12">                            
                            <button class="btn btn-outline-primary btn-small float-end" type="button" onclick="ValidatePicDate()">Continue <i class="fi-rs-arrow-right ml-5"></i></button>
                        </div>
                    </div>
                 </div>
               
               <!------------------------// Pickup Slot------------------------------------------------------------------->

                <!------------------------------------ PaymentMode-----------------------------------------------------> 
                <div class="row" id="complete_pay" style="display:none;">
                           <div class="col-9 mt-10">
                              <h4><span class="badge bg-success  mb-10"><i class="fi-rs-check"></i></span> Payment</h4>
                              <span class="txt_mode" id="txt_mode"></span>
                           </div>
                           <div class="col-3 mt-10">
                              <button type="button" class="btn btn-outline-primary btn-small float-end" onclick="disppaywindow();"> Edit </button>
                           </div>
                  </div>
                
                  <div class="row mt-4" id="payment-screen" style="display:none;">
                    <h4><span class="badge bg-secondary  mb-10">3</span> Payment</h4>
                                    
                    
                    <div class="row">
                       <p class="font-semi-bold c-black">Please select your payment mode.</p>
                       <?php if(!empty($payment_mode)){ ?>
                       <?php foreach($payment_mode as $val){ ?>
                       <div class="col-lg-12 col-12 ml-10">
                              <div class="form-check mt-10">
                                 <input class="form-check-input pay-radio" type="radio" data-id="<?= $val['id'] ?>" name="payment_mode" id="Radi<?= $val['id'] ?>" 
                                    data-name="<?= $val['bank_name'] ?>-<?= getTruncatedCCNumber($val['acct_no']); ?>" value="ibt">
                                 <label class="form-check-label font-semi-bold" for="Radi<?= $val['id'] ?>">
                                      <i class="fi-rs-bank mr-5"></i> <span class="font18"> <?= $val['bank_name'] ?></span>
                                 </label>
                                 <div class="row">
                                    <div class="col-9">
                                    <p><?= getTruncatedCCNumber($val['acct_no']); ?></p>
                                    </div>
                                    <div class="col-3">
                                           <h6 class="float-end">₹<?php echo $tot_amt ?></h6>
                                    </div>
                              </div> 
                              </div>
                        </div>
                        <?php } } ?> 
                        <!-- instant bank transfer----->
                      
                        <div class="col-lg-12 col-12 ml-10">
                              <div class="form-check mt-10">
                                 <input class="form-check-input pay-radio" type="radio" name="payment_mode" id="Radi-ins1" data-name="Instant Bank Transfer" value="ibt">
                                 <label class="form-check-label font-semi-bold" for="Radi-ins1">
                                      <i class="fi-rs-bank mr-5"></i> <span class="font18"> Instant Bank Transfer</span>
                                 </label>
                              </div>
                              <div class="row">
                                    <div class="col-9">
                                            <p  class="font12">Fill new bank account detail</p>
                                    </div>
                                    <div class="col-3">
                                           <h6 class="float-end">₹<?php echo $tot_amt ?></h6>
                                    </div>
                              </div> 
                           </div>
                         
                        <?php if(!empty($user_upi)){ ?>
                        <div class="col-lg-12 col-12 ml-10">
                              <div class="form-check mt-10">
                                 <input class="form-check-input pay-radio" type="radio" name="payment_mode" data-id="<?= $user_upi->id ?>" id="exampleRadios2" data-name="UPI" value="upip">
                                 <label class="form-check-label font-semi-bold" for="exampleRadios2">
                                 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAACAElEQVQ4jb3TP2hTURTH8e95SW3SRhElxYJIFQvF4tbFQYmhSQVxUnAUV/9UWivS6hBLEQcnh0yVDlYnQZwKDlL/QCdXNwXrILQNYk1M2nfePQ5pYklfUrv0wIN3373nw+/AfbDbVXrJQO197+MLfclcKtHqvNdq02aImc+74ixZANP1fCkaGW/VI602iy/IWMAb81noLWQzq2tBwZz50ah/rDjxYXnHCZ0yZAoWcGrM+zxmztqBhGrbaLOeliBuA1Qh4xWui7Pazs1ELtu1I7D0jG7z6TcVTOEIlWTK1afsVNHQlE3BoMI5U5Fqwupzp+0b9ZTCjbCUTUHne0ObMVM4SZHU+r+UvgRj/wVaDs8CG2wETWHEFiGophSxa4mHp5PbgqsHGDDlYCOGwhcXr182ga8RMd0WdAFbxkXhuX+I27E+8ATgU9S59K/xjz+3B1WGGrEZ7WYi3oeLRMB4X3Ht6d+5+ZXG3i1/SuEJ+6wkK6a01bC8f5hHHcdryeYqifJFRhfKYWGijR+syKAFdcwm/R6mO3oETxDkdXn/nssMv10Lw0JHNle9LijBK+t6Ot15VDaSzZZdcInhuaZYOKiWQVHz7eqteH8EAUHyFXfmCrl5DUOa1tJ9epfuyZ/lu5wHiE2eXYw9SE/tCNlc30eI/xjnRG3dMZUaaHV+V+ovt24AXBRTq8AAAAAASUVORK5CYII="/>
                                 <span class="font18"> UPI </span>
                                 </label>
                              </div>
                              <div class="row">
                                    <div class="col-9">
                                    <p><?= getTruncatedCCNumber($user_upi->upi_id); ?></p> 
                                    </div>
                                    <div class="col-3">
                                           <h6 class="float-end">₹<?php echo $tot_amt ?></h6>
                                    </div>
                              </div> 
                        </div>
                        <?php } ?>   
                        <input type="hidden" name="payment_id" id="payment_id" value="">
                          
                        <!-------------upi id------------------>
                        <?php if(empty($user_upi)){ ?>
                           <div class="col-lg-12 col-12 ml-10">
                              <div class="form-check mt-10">
                                 <input class="form-check-input pay-radio" type="radio" name="payment_mode" id="Radi-upi1" data-name="Upi" value="upip">
                                 <label class="form-check-label font-semi-bold" for="Radi-upi1">
                                      <i class="fi-rs-bank mr-5"></i> <span class="font18"> Upi</span>
                                 </label>
                              </div>
                              <div class="row">
                                    <div class="col-9">
                                            <p  class="font11">A registered UPI ID required</p>
                                    </div>
                                    <div class="col-3">
                                           <h6 class="float-end">₹<?php echo $tot_amt ?></h6>
                                    </div>
                              </div> 
                           </div>
                        <?php } ?>
                              <!-------------Cash on Pickup------------------>
                              <div class="col-lg-12 col-12 ml-10">
                              <div class="form-check mt-10">
                                 <input class="form-check-input pay-radio" type="radio" name="payment_mode" id="Radi-cod1" data-name="Cash on delivery" value="COD">
                                 <label class="form-check-label font-semi-bold" for="Radi-cod1">
                                      <i class="fi-rs-bank mr-5"></i> <span class="font18"> COD</span>
                                 </label>
                              </div>
                              <div class="row">
                                    <div class="col-9">
                                            <p  class="font12">Cash on delivery</p>
                                    </div>
                                    <div class="col-3">
                                           <h6 class="float-end">₹<?php echo $tot_amt ?></h6>
                                    </div>
                              </div> 
                           </div>

                    </div>
                 </div>
                    <div class="row" id="confrim_btn" style="display:none;">
                        <div class="col-lg-12 mb-10 mt-10">                            
                            <button class="btn btn-outline-primary btn-small float-end" type="button" onclick="confrim_order()">Confrim Order <i class="fi-rs-arrow-right ml-5"></i></button>
                        </div>
                    </div>
               
               <!------------------------// Payment Mode------------------------------------------------------------------->
               </form>
            </div>
         </div>
         <!--//lg-7-->
         <div class="col-lg-4 product-sidebar sticky-sidebar">
            <div class="widget-category1 border-radius-10">
               <div class="single-post clearfix">
                  <div class="image">
                     <img src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" alt="<?= $model_data->m_name ?>">
                  </div>
                  <div class="content pt-30">
                     <h5><?= $model_data->m_name; ?> (<?= $variant_data->variant_name; ?>)</h5>
                  </div>
               </div>
            </div>
            <div class="table-responsive order_table">
               <table class="table">
                  <thead>
                     <tr>
                        <th colspan="3" class="text-center mb-4">
                           <h4>Price Summary</h4>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <h5>Base Price</h5>
                        </td>
                        <td>₹<span class="base_price"><?= @$_POST['base_price'] ?></span></td>
                     </tr>
                     <tr>
                        <td>
                           <h5>Pickup Charges</h5>
                        </td>
                        <?php if($pickup_charges->pickup_charge=='0.00'){
                           $charges = 'Free';
                           }else{
                           $charges = '₹'.$pickup_charges->pickup_charge;
                           } ?>
                        <td><span class="pickup_charge"><?= $charges; ?></span></td>
                     </tr>
                     <tr>
                        <th>
                           <h5>Total Amount</h5>
                        </th>
                        <td colspan="2" class="product-subtotal">₹<span class="font-xl text-brand fw-900 subtot"><?= $tot_amt ?></span></td>
                     </tr>
                     <tr>
                        <td colspan="3">
                           <span class="get-exact text-center mt-10 d-block rounded mx-auto" id="co" onclick="confrim_order();">Sell Now <i class="fi-rs-arrow-right ml-5"></i></span>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      </div>
      </div>
   </section>
</main>
<script>
   function ValidateAddress(){
           if($('input[name="address_type_order"]:checked').length === 0) {
           Swal.fire({
                   position: 'top',
                   icon: 'error',
                   title: '<h4>Please select address</h4>',
                   showConfirmButton: false,
                   timer: 1500
                   })
               return false;
           }else{
               document.getElementById("adr-screen").style.display = "none";
               document.getElementById("complete_addr").style.display = "flex";
               document.getElementById("pickup-screen").style.display = "flex";
           }
   
       }
   function ValidatePicDate(){
           if($('input[name="pickup_date"]:checked').length === 0) {
           Swal.fire({
                   position: 'top',
                   icon: 'error',
                   title: '<h4>Please select pickup date</h4>',
                   showConfirmButton: false,
                   timer: 1500
                   })
               return false;
           }else if($('input[name="time_avil"]:checked').length === 0){
            Swal.fire({
                   position: 'top',
                   icon: 'error',
                   title: '<h4>Please select time slot</h4>',
                   showConfirmButton: false,
                   timer: 1500
                   })
               return false;
           }else{
                 document.getElementById("pickup-screen").style.display = "none";
                 document.getElementById("complete_slot").style.display = "contents";
                 document.getElementById("payment-screen").style.display = "flex";
           }
   
       }
   
       function confrim_order(){
         <?php if(empty($user_address)){
             $pickup_address = '0';
          }else{
            $pickup_address = '1';
          } ?>
         var pickup_address = <?php echo  $pickup_address; ?>;
         if(pickup_address==0){
            Swal.fire({
                   position: 'top',
                   icon: 'error',
                   title: '<h4>Please Add Pickup Address</h4>',
                   showConfirmButton: false,
                   timer: 1500
                   })
               return false;
         }else if($('input[name="pickup_date"]:checked').length === 0) {
           Swal.fire({
                   position: 'top',
                   icon: 'error',
                   title: '<h4>Please select pickup date</h4>',
                   showConfirmButton: false,
                   timer: 1500
                   })
               return false;
           }else if($('input[name="time_avil"]:checked').length === 0){
            Swal.fire({
                   position: 'top',
                   icon: 'error',
                   title: '<h4>Please select time slot</h4>',
                   showConfirmButton: false,
                   timer: 1500
                   })
               return false;
           }
         if($('input[name="payment_mode"]:checked').length === 0) {
           Swal.fire({
                   position: 'top',
                   icon: 'error',
                   title: '<h4>Please select payment mode</h4>',
                   showConfirmButton: false,
                   timer: 1500
                   })
               return false;
           }else{
                $('#co').removeClass('get-exact');
                $('#co').addClass('get-exact-green');
               //document.getElementById("checkoutForm").submit();
               var form = $('#checkoutForm');
               var formData = new FormData(form[0]);
               $.ajax({
                        url: base_url+'dashboard/create_order',
                        type: 'post',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success:function(res){
                          if(res.status =='OK'){
                             location.replace(base_url+'web/thank_you')
                          }
                        }
                  });
               
           }        
       }

       $('.pay-radio').click(function() {
                   $('.txt_mode').html("");
                      if($(this).is(":checked")){
                      document.getElementById("txt_mode").innerHTML =  $(this).data('name');
                      document.getElementById("complete_pay").style.display = "contents";
                      document.getElementById("payment-screen").style.display = "none";
                      document.getElementById("confrim_btn").style.display = "flex";
                      $('#co').removeClass('get-exact');
                      $('#co').addClass('get-exact-green');      
                      $('#payment_id').val($(this).data('id'));   
                                 
                   }
                  
             }); 
   

      $('.addr-radio').click(function() {
                   $('.txt_addr').html("");
                      if($(this).is(":checked")){
                      document.getElementById("txt_addr").innerHTML = $(this).data('name');
                      document.getElementById("complete_addr").style.display = "flex";
                      document.getElementById("adr-screen").style.display = "none";
                      document.getElementById("pickup-screen").style.display = "flex";
                   }
             }); 
   
   
             function dispAddrwindow(){
               document.getElementById("adr-screen").style.display = "flex";
               document.getElementById("complete_addr").style.display = "none";

               document.getElementById("payment-screen").style.display = "none";
               document.getElementById("pickup-screen").style.display = "none";


             }


             $('.day-radio').click(function() {
                   $('.txt_day').html("");
                      if($(this).is(":checked")){
                      document.getElementById("txt_day").innerHTML = $(this).data('name');
                     
                   }
             });
             
             $('.time-radio').click(function() {
                   $('.txt_time').html("");
                      if($(this).is(":checked")){
                        if($('input[name="pickup_date"]:checked').length === 0) {
                           Swal.fire({
                                    position: 'top',
                                    icon: 'error',
                                    title: '<h4>Please select pickup date</h4>',
                                    showConfirmButton: false,
                                    timer: 1500
                                    })
                                 return false;
                     }else
                      document.getElementById("txt_time").innerHTML = $(this).data('name');
                      document.getElementById("complete_slot").style.display = "contents";
                      document.getElementById("pickup-screen").style.display = "none";
                      document.getElementById("payment-screen").style.display = "flex";
                   }
             });

             function dispSlotwindow(){
               document.getElementById("pickup-screen").style.display = "flex";
               document.getElementById("complete_slot").style.display = "none";
             }

             function disppaywindow(){
               document.getElementById("payment-screen").style.display = "flex";
               document.getElementById("complete_pay").style.display = "none";
             }



        $(document).ready(function(){
            $('input:radio[name=pickup_date]').change(function(){
                var $this = $(this);
                $this.closest('.box').find('label.highlight').removeClass('highlight');
                $this.closest('.date-list').addClass('highlight');
            });
        });      
        
        $(document).ready(function(){
            $('input:radio[name=time_avil]').change(function(){
                var $this = $(this);
                $this.closest('.box2').find('label.highlight2').removeClass('highlight2');
                $this.closest('.time-list').addClass('highlight2');
            });
        });      
    
   
</script>