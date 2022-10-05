<!------------------------------------ Order Cancel Details----------------------------------------------------->  
<div class="offcanvas offcanvas-end offcanvasRight-ocancel" tabindex="-1"  aria-labelledby="offcanvasRightLabel">
<div class="offcanvas-header">
    <h4 class="offcanvas-title" id="offcanvasLabel">Reason for cancellation</h4>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
        
         <div class="offcanvas-body">
         <h5>Please tell us the reason</h5>
            <div class="row">
               <div class="container">
                  <form id="ocancelForm">
                        <?php foreach($cancel_reason as $val){ ?>
                        <div class="form-check mt-10">
                           <input class="form-check-input" type="radio" value="<?= $val['reason'] ?>" name="reason_cancel" id="re<?= $val['id'] ?>" style="height: 20px;padding: 10px;width: 20px;">
                           <label class="form-check-label" for="re<?= $val['id'] ?>" style="padding-left: 10px;font-size: 16px;margin-top: -26px;font-weight: 600;">

                           <?= $val['reason'] ?>
                           </label>
                        </div>
                      <?php } ?>
                      <div class="form-group mt-10">
                        <textarea name="comment" id="comment" placeholder="Tell us what we missed!"></textarea>
                      </div>
                     <div class="form-group">
                        <div class="d-grid gap-2">
                           <button type="button" onclick="CancelOrder(<?= $order_details->id ?>);" class="btn btn-primary">CONFRIM</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!------------------------// cancel------------------------------------------------------------------->

<?php if($order_details->order_status=='3' && empty($feedback->order_id)){ ?>
<!------------------------------------ Feedback System----------------------------------------------------->  
<div class="offcanvas offcanvas-end offcanvasRight-feedback show"  aria-labelledby="offcanvasRightLabel">
<div class="offcanvas-header">
    <h4 class="offcanvas-title" id="offcanvasLabel">How would you rate our service?</h4>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
        
         <div class="offcanvas-body">
        
            <div class="row">
               <div class="container">
                  <form id="feedbackForm">
                    <input type="hidden" name="order_id" value="<?php echo $order_details->order_id ?>">                
                  <div class="rating">
                        <!--elements are in reversed order, to allow "previous sibling selectors" in CSS-->
                        <input type="radio" name="rating" value="Excellent" id="5" checked onclick="excWindow();"><label for="5">☆</label>
                        <input type="radio" name="rating" value="Good" id="4" onclick="goodWindow();"><label for="4">☆</label>
                        <input type="radio" name="rating" value="OK" id="3" onclick="okWindow();"><label for="3">☆</label>
                        <input type="radio" name="rating" value="Bad" id="2" onclick="badWindow();"><label for="2">☆</label>
                        <input type="radio" name="rating" value="Terrible" id="1" onclick="terriWindow();"><label for="1">☆</label>
                  </div>
                  <!---5 Exellent-->
                     <div class="row" id="exceWindow">
                        <div class="col-lg-12 mt-15">
                           <h5>Excellent</h5>
                           <h5 class="mt-20 mb-20">What could be better? </h5>
                           <?php foreach($excqsn as $val){ ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="ex<?= $val['id']; ?>" value="<?= $val['qsn']; ?>">
                                 <label class="form-check-label" for="ex<?= $val['id']; ?>"><span><?= $val['qsn']; ?></span></label>
                           </div>
                           <?php } ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="choth5" value="Other">
                                 <label class="form-check-label" for="choth5"><span>Other</span></label>
                           </div>
                        </div>
                     </div>

                     <!---4 Good-->
                     <div class="row" id="goodWindow" style="display:none;">
                        <div class="col-lg-12 mt-15">
                           <h5>Good</h5>
                           <h5 class="mt-20 mb-20">What could be better? </h5>
                           <?php foreach($goodqsn as $val){ ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="goo<?= $val['id']; ?>" value="<?= $val['qsn']; ?>">
                                 <label class="form-check-label" for="goo<?= $val['id']; ?>"><span><?= $val['qsn']; ?></span></label>
                           </div>
                           <?php } ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="choth4" value="Other">
                                 <label class="form-check-label" for="choth4"><span>Other</span></label>
                           </div>
                        </div>
                     </div>

                      <!---3 OK-->
                      <div class="row" id="okWindow" style="display:none;">
                        <div class="col-lg-12 mt-15">
                           <h5>OK</h5>
                           <h5 class="mt-20 mb-20">What could be better? </h5>
                           <?php foreach($okqsn as $val){ ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="ok<?= $val['id']; ?>" value="<?= $val['qsn']; ?>">
                                 <label class="form-check-label" for="ok<?= $val['id']; ?>"><span><?= $val['qsn']; ?></span></label>
                           </div>
                           <?php } ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="choth3" value="Other">
                                 <label class="form-check-label" for="choth3"><span>Other</span></label>
                           </div>
                        </div>
                     </div>

                      <!---4 Bad-->
                      <div class="row" id="badWindow" style="display:none;">
                        <div class="col-lg-12 mt-15">
                           <h5>Bad</h5>
                           <h5 class="mt-20 mb-20">What could be better? </h5>
                           <?php foreach($badqsn as $val){ ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="bad<?= $val['id']; ?>" value="<?= $val['qsn']; ?>">
                                 <label class="form-check-label" for="bad<?= $val['id']; ?>"><span><?= $val['qsn']; ?></span></label>
                           </div>
                           <?php } ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="choth2" value="Other">
                                 <label class="form-check-label" for="choth2"><span>Other</span></label>
                           </div>
                        </div>
                     </div>

                      <!---3 Terrible-->
                      <div class="row" id="terrWindow" style="display:none;">
                        <div class="col-lg-12 mt-15">
                           <h5>Terrible</h5>
                           <h5 class="mt-20 mb-20">What could be better? </h5>
                           <?php foreach($terriqsn as $val){ ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="terr<?= $val['id']; ?>" value="<?= $val['qsn']; ?>">
                                 <label class="form-check-label" for="terr<?= $val['id']; ?>"><span><?= $val['qsn']; ?></span></label>
                           </div>
                           <?php } ?>
                           <div class="custome-checkbox font16 mt-15">
                                 <input class="form-check-input" type="checkbox" name="qsn_feedback[]" id="choth1" value="Other">
                                 <label class="form-check-label" for="choth1"><span>Other</span></label>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-12 mt-15">
                           <h5>How likely will you recommend us ?</h5>
                        <div class="custom-radios mt-15">
                                 <div>
                                    <input type="radio" id="color-1" name="recommended" value="1">
                                    <label for="color-1">
                                       <span>
                                        1
                                       </span>
                                    </label>
                                 </div>
                                 
                                 <div>
                                    <input type="radio" id="color-2" name="recommended" value="2">
                                    <label for="color-2">
                                       <span>
                                       2
                                       </span>
                                    </label>
                                 </div>
                                 
                                 <div>
                                    <input type="radio" id="color-3" name="recommended" value="3">
                                    <label for="color-3">
                                       <span>
                                      3
                                       </span>
                                    </label>
                                 </div>

                                 <div>
                                    <input type="radio" id="color-4" name="recommended" value="4">
                                    <label for="color-4">
                                       <span>
                                     4
                                       </span>
                                    </label>
                                 </div>

                                 <div>
                                    <input type="radio" id="color-5" name="recommended" value="5" checked>
                                    <label for="color-5">
                                       <span>
                                     5
                                       </span>
                                    </label>
                                 </div>

                              </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-12 mt-15">
                           <h5>Leave a comment</h5>
                           <textarea name="feed_comment"></textarea>
                        </div>
                       </div>

                     <div class="form-group mt-10">
                        <div class="d-grid gap-2">
                           <button type="button" onclick="add_feedback();" class="btn btn-primary">SUBMIT FEEDBACK</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   <!------------------------// feedback------------------------------------------------------------------->
   <?php } ?>

<main class="main">
   <section class="mt-30 mb-50">
      <div class="container">
      <?php if(empty($order_details->payment_id || $order_details->payment_mode=='upip')){ ?>
      <div class="row">
              <div class="col-md-6 col-lg-5">
                <?php if($order_details->payment_mode=='ibt'){ ?>
                 <div class="row">
                        <div class="col-4">
                           <a href="<?php echo base_url() ?>web/payment/<?= $order_details->order_id ?>"><span class="add-payment-btn hover-up rounded mx-auto"><i class="fi-rs-plus mr-5"></i></span></a>
                        </div>
                        <div class="col-7 p-0">
                          <h5 class="c-red font12">Add Payment Details</h5>
                          <small class="font13">Please add your payment details before pickup for easy transfer </small>
                        </div>
                  </div>
                <?php } ?>
            
            </div>
      </div>
      <?php } ?>
            <div class="row">
                <div class="col-lg-7 border border-radius-10 p-10 mb-10">
                      <!--------Orders-->
                      <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-6">
                                <h4 class="gen-color font14 mb-10">Sell</h4>
                                <h3 class="font16 mb-10"><?= $model_data->m_name; ?> (<?= $variant_data->variant_name; ?>)</h3>
                                <span class="text-muted mt-4 font16">Sell Amount : </span><span class="gen-color font16">₹<?= $order_details->sell_amt - $order_details->pickup_charge ?></span>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6">
                                <span class="text-muted fw-600">Order No : </span><span class="c-black">#<?= $order_details->order_id; ?></span>
                                <figure class="">
                                <img src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" class="offset-md-5" height="100" width="100">
                                </figure>
                            </div>
                        </div>
                    <!--------//Orders-->
                    <p class="text-muted">Door Step Pickup</p>
                    <?php if($order_details->order_status==1 || $order_details->order_status==2){ ?>
                    <p>Field Expert will be assinged on your request soon.As soon as the agent on his way to you, you can track him.</p>
                    <?php }else{ ?>
                     <?php } ?>
                    <div class="row mt-40">
                        <div class="col-lg-12">
                             <!-- progressbar -->
                             <?php if($order_details->order_status==1){
                                    $status = 'Order placed'; //when customer place a successful order
                                    $desc = 'Create a Lead';
                                }elseif($order_details->order_status==2){
                                    $status = 'Order confirmed'; //when admin assign an pickup executive
                                    $desc = 'Lead Created';
                                }elseif($order_details->order_status==3){
                                    $status = 'Canceled';
                                    $desc = 'Lead Create Failed';
                                }elseif($order_details->order_status==4){
                                    $status = 'Completed';
                                    $desc = 'Order Completed';
                                }elseif($order_details->order_status==5){
                                    $status = 'Pickup In Progress';
                                    $desc = 'Pickup In Progress';
                                } ?>
                           <h4 class="font14 mb-10">Status : <span class="gen-color"><?= $desc ?> </span></h4>
                            <form id="msform">
                               
                                <ul id="progressbar">
                                    <li class="active">Order placed</li>

                                    <?php if($order_details->order_status==3){ ?>
                                     <li class="active">Canceled</li>
                                    <?php }elseif($order_details->order_status==5){ ?>
                                     <li class="active">Pickup In Progress</li>
                                    <?php }elseif($order_details->order_status==4){ ?>
                                     <li class="active">Completed</li>
                                    <?php }elseif($order_details->order_status==2){ ?>
                                     <li class="active">Order Confirmed</li>
                                    <?php }else{ ?>
                                        <li class="active">Order Processing</li>
                                    <?php } ?>

                                </ul>
                            </form>
                        </div>
                     </div>

                     <div class="row mt-40">
                        <div class="col-lg-6">
                           <h4 class="font14 mb-10">Arrival time of executive</h4>
                           <?php $order_date = date('Y',strtotime($order_details->order_add_date)) ?>
                           <p><?= $order_details->pickup_date ?>,<?= $order_date ?>(<?= $order_details->time_slot ?>)</p>
                           <h4 class="font14 mb-10">Address:</h4>
                           <p><?= $order_details->pickup_address ?></p>
                        </div>
                        <div class="col-lg-6 mt-10">
                        <?php if($order_details->order_status!=3){ ?>
                          <button type="button" class="btn btn-danger float-end btndanger" onclick="CancelResaon();">Cancel</button>
                        <?php } ?>
                        <?php if($order_details->order_status=='3' && empty($feedback->order_id)){ ?>
                          <button type="button" class="btn btn-default float-end" onclick="feedback();">Give Feedback</button>
                        <?php } ?>
                        </div>
                     </div>

            </div>
         <!--//lg-7-->

         <div class="col-lg-4 product-sidebar sticky-sidebar">
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
                        <td>₹<span class="base_price"><?= $order_details->sell_amt ?></span></td>
                     </tr>
                     <tr>
                        <td>
                           <h5>Pickup Charges</h5>
                        </td>
                        <?php if($order_details->pickup_charge=='0.00'){
                           $charges = 'Free';
                           }else{
                           $charges = '₹'.$order_details->pickup_charge;
                           } ?>
                        <td><span class="pickup_charge"><?= $charges; ?></span></td>
                     </tr>
                     <tr>
                        <th>
                           <h5>Total Amount</h5>
                        </th>
                        <td colspan="2" class="product-subtotal">₹<span class="font-xl text-brand fw-900 subtot"><?= $order_details->sell_amt - $order_details->pickup_charge ?></span></td>
                     </tr>
                  
                  </tbody>
               </table>
            </div>

            <div class="table-responsive order_table">
               <table class="table">
                  <thead>
                     <tr>
                        <th colspan="3" class="text-center mb-4">
                           <h4>Order Details</h4>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <h5>Device</h5>
                        </td>
                        <td><?= $model_data->m_name; ?> (<?= $variant_data->variant_name; ?>)</td>
                     </tr>
                     <tr>
                        <td>
                           <h5>Address</h5>
                        </td>
                        <td><?= $order_details->pickup_address ?></td>
                     </tr>
                     <tr>
                        <td>
                           <h5>Schedule Time</h5>
                        </td>
                       
                        <td><?= $order_details->pickup_date ?>,<?= $order_date ?>(<?= $order_details->time_slot ?>)</td>
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




<main class="main">
<div class="container">
   
</div>
</main>

<style>
/*custom font*/

/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 30px;
}

/*headings*/
.fs-title {
    font-size: 18px;
    color: #212529;
    margin-bottom: 10px;
 
    font-weight: bold;
}

.fs-subtitle {
    font-weight: normal;
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
}

#progressbar li {
    list-style-type: none;
    color: #006738;
    font-size: 14px;
    width: 33.33%;
    float: left;
    position: relative;
}

#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 24px;
    height: 24px;
    line-height: 26px;
    display: block;
    font-size: 12px;
    color: #333;
    background: white;
    border-radius: 25px;
    margin: 0 auto 10px auto;
}

/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: white;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1; /*put it behind the numbers*/
}

#progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none;
}

/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #006738;
    color: white;
}


/* Not relevant to this form */
.dme_link {
    margin-top: 30px;
    text-align: center;
}
.dme_link a {
    background: #FFF;
    font-weight: bold;
    color: #ee0979;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 5px 25px;
    font-size: 12px;
}

.dme_link a:hover, .dme_link a:focus {
    background: #C5C5F1;
    text-decoration: none;
}

</style>