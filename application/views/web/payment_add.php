<?php $tot_amt =  $order_details->sell_amt - $order_details->pickup_charge; ?>


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
                  <form id="bankFormOrder">
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
                  <form id="upiFormOrder">
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
                    
                        <!------------------------------------ Add Address Details-----------------------------------------------------> 
                   
                        <div class="row" id="complete_addr" style="display:flex;">
                           <div class="col-6">
                              <h5><span class="badge bg-success  mb-10"><i class="fi-rs-check"></i></span> Address</h5>
                              <p class="txt_addr" id="txt_addr"><?= $order_details->pickup_address ?></p>
                           </div>
                           <div class="col-6">
                              <span class="get-exact rounded mx-auto float-end"> Edit </span>
                           </div>
                        </div>
                     
                      <!------------------------------------ Pickup Slot Details-----------------------------------------------------> 
                    <div class="row" id="complete_slot" style="display:flex;">
                           <div class="col-9 mt-10">
                              <h5><span class="badge bg-success  mb-10"><i class="fi-rs-check"></i></span> Pickup Date&Time</h5>
                              <span class="txt_day" id="txt_day"><?= $order_details->pickup_date ?> (<?= $order_details->time_slot ?>)</span>
                           </div>
                           <div class="col-3 mt-10">
                               <span class="get-exact rounded mx-auto float-end"> Edit </span>
                           </div>
                    </div>
                  
               
               <!------------------------// Pickup Slot------------------------------------------------------------------->   
                  </div>
                  <!------------------------// Add Address Details------------------------------------------------------------------->

                 

                <!------------------------------------ PaymentMode-----------------------------------------------------> 
                <div class="row" id="complete_pay" style="display:none;">
                           <div class="col-9 mt-10">
                              <h5><span class="badge bg-success  mb-10"><i class="fi-rs-check"></i></span> Payment</h5>
                              <span class="txt_mode" id="txt_mode"></span>
                           </div>
                           <div class="col-3 mt-10">
                              <button type="button" class="btn btn-outline-primary btn-small float-end" onclick="disppaywindow();"> Edit </button>
                           </div>
                  </div>
                
                  <div class="row mt-4" id="payment-screen" style="display:flex;">
                    <h5><span class="badge bg-secondary  mb-10">3</span> Payment</h5>
                   <form id="payMethodForm" method="post" action="<?php echo base_url() ?>dashboard/update_order_payment" >
                              <input type="hidden" name="order_id" value="<?= $order_details->order_id ?>">
                              <div class="row">
                                 <p class="font-semi-bold c-black">Please select your payment mode.</p>
                                 <?php if(!empty($payment_mode)){ ?>
                                 <?php foreach($payment_mode as $val){ ?>
                                 <div class="col-lg-12 col-12 ml-10">
                                          <div class="form-check mt-10">
                                             <input class="form-check-input pay-radio" type="radio" name="payment_mode" id="Radi<?= $val['id'] ?>" data-name="<?= $val['bank_name'] ?>-<?= getTruncatedCCNumber($val['acct_no']); ?>" value="<?= $val['id'] ?>">
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
                                    <?php if(!empty($user_upi)){ ?>
                                    <div class="col-lg-12 col-12 ml-10">
                                          <div class="form-check mt-10">
                                             <input class="form-check-input pay-radio" type="radio" name="payment_mode" id="exampleRadios2" data-name="UPI" value="UPI">
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
                                    <!-- instant bank transfer----->
                                    <?php if(empty($payment_mode)){ ?>
                                       <div class="col-lg-12 col-12 ml-10">
                                          <div class="form-check mt-10">
                                             <input class="form-check-input pay-radio" type="radio" name="payment_mode" id="Radi-ins1" data-name="Instant Bank Transfer" value="ibt" <?php if($order_details->payment_mode=='ibt'){ echo 'checked'; } ?>>
                                             <label class="form-check-label font-semi-bold" for="Radi-ins1">
                                                <i class="fi-rs-bank mr-5"></i> <span class="font18"> Instant Bank Transfer</span>
                                             </label>
                                          </div>
                                          <div class="row">
                                                <div class="col-9">
                                                      <p  class="font11">Fill new bank account detail</p>
                                                </div>
                                                <div class="col-3">
                                                      <h6 class="float-end">₹<?php echo $tot_amt ?></h6>
                                                </div>
                                          </div> 
                                       </div>
                                       <?php } ?>
                                    <!-------------upi id------------------>
                                    <?php if(empty($user_upi)){ ?>
                                       <div class="col-lg-12 col-12 ml-10">
                                          <div class="form-check mt-10">
                                             <input class="form-check-input pay-radio" type="radio" name="payment_mode" id="Radi-upi1" data-name="Upi" value="upip" <?php if($order_details->payment_mode=='upip'){ echo 'checked'; } ?> >
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
                                             <input class="form-check-input pay-radio" type="radio" name="payment_mode" id="Radi-cod1" data-name="Cash on delivery" value="COD" <?php if($order_details->payment_mode=='COD'){ echo 'checked'; } ?>>
                                             <label class="form-check-label font-semi-bold" for="Radi-cod1">
                                                <i class="fi-rs-bank mr-5"></i> <span class="font18"> COD</span>
                                             </label>
                                          </div>
                                          <div class="row">
                                                <div class="col-9">
                                                      <p  class="font11">Cash on delivery</p>
                                                </div>
                                                <div class="col-3">
                                                      <h6 class="float-end">₹<?php echo $tot_amt ?></h6>
                                                </div>
                                          </div> 
                                       </div>

                              </div>
                           </div>
           
                    <div class="row" id="confrim_btn" style="display:flex;">
                        <div class="col-lg-12 mb-10 mt-10">                            
                            <button class="btn btn-outline-primary btn-small float-end" type="button" onclick="add_payment()">Add Payment <i class="fi-rs-arrow-right ml-5"></i></button>
                        </div>
                    </div>
               
               <!------------------------// Payment Mode------------------------------------------------------------------->
               </form>
            </div>
         </div>
         <!--//lg-7-->
         <div class="col-lg-4 product-sidebar sticky-sidebar d-sm-none d-md-block">
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
                        <td>₹<span class="base_price"><?= $order_details->sell_amt ?></span></td>
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
 $(document).ready(function(){
           
       <?php if($order_details->payment_mode=='ibt'){ ?>
        $(".offcanvasRight-addbank").offcanvas('show');
       <?php }elseif ($order_details->payment_mode=='upip') { ?>
        $(".offcanvasRight-addupi").offcanvas('show');
       <?php } ?>

        });     
        
        function add_payment(){

            if($("input:radio[name='payment_mode'][value='COD']").is(":checked")) { 
                   var frm = $('#payMethodForm');
                
                     $.ajax({
                        type: frm.attr('method'),
                        url: frm.attr('action'),
                        data: frm.serialize(),
                        success: function (data1) {
                           Swal.fire({
                              title: '<h5>Payment Added Sucessfully<h5>',
                              icon: 'success',
                              allowOutsideClick: false,
                              allowEscapeKey: false,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'Get Order Details',
                              }).then((result) => {
                              if (result.isConfirmed) {
                                       
                                 window.location.replace(base_url + "dashboard/order_details/<?= $order_details->order_id ?>");
                              }
                              });
                        },
                        error: function (data1) {
                              console.log('An error occurred.');
                              
                        },
                     });   
            }else if($("input:radio[name='payment_mode'][value='ibt']").is(":checked")){
               $(".offcanvasRight-addbank").offcanvas('show');
            }else if($("input:radio[name='payment_mode'][value='upip']").is(":checked")){
               $(".offcanvasRight-addupi").offcanvas('show');
            } 

              
        }


    $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
      var form = $('#bankFormOrder');
      var formData = new FormData(form[0]);
       if(($("input[name='terms_chk_b']:checked").length)<=0) {
        $('.terms_chk_b_error').html('You have to accept I hereby declare that the details are true.');
         return false;
      }
      showLoader();
    $.ajax({
          url: base_url + 'dashboard/save_bank_details',  
          type: 'POST',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend: function() {
              console.log(formData);
          },
          success: function(returnData) {
               if(returnData.status=="OK")
               {
                  var frm = $('#payMethodForm');
                
                     $.ajax({
                        type: frm.attr('method'),
                        url: frm.attr('action'),
                        data: frm.serialize() + '&payment_id=' + returnData.payment_id,
                        success: function (data1) {
                              console.log('Submission was successful.');
                        },
                        error: function (data1) {
                              console.log('An error occurred.');
                              
                        },
                     });   
                Swal.fire({
                        title: '<h5>Payment Added Sucessfully<h5>',
                        icon: 'success',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Get Order Details',
                        }).then((result) => {
                        if (result.isConfirmed) {
                                   
                            window.location.replace(base_url + "dashboard/order_details/<?= $order_details->order_id ?>");
                        }
                        });
            
             
               }
               else if(returnData.status=="ERR")
               {
                 sweet_alert(returnData.type, returnData.message);
                  hideLoader("Add Account");
              
               }
          }
         
      });
      }//end submit handler
      });
      $.validator.addMethod("acctnos", function(value, element) {
         return $('#ac_no').val() == $('#acct_no').val()
      }, "account no and confrim account number should be same");
      
      $('#bankFormOrder').validate({
          rules: {
            
             bank_ifsc_code: {
              required: true,
             },
            
             acct_no:{
                 acctnos:true,
             }
          },
          messages: {
            bank_ifsc_code: {
              required: "Please enter IFSC code",
            },
            ac_no:{
               required: "Please enter account no",
           },
           acct_no:{
               required: "Please confrim account no",
           },
           benef_name:{
               required: "Please Enter benificiery name",
           },
           declare:{
               required: "Please accept TNC proceed",
           }
            
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      });

       

$(function () {
    $.validator.setDefaults({
      submitHandler: function () {
      var form = $('#upiFormOrder');
      var formData = new FormData(form[0]);
      showLoader();
        $.ajax({
              url: base_url + 'dashboard/save_upi_id',  
              type: 'POST',
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              dataType: 'json',
              success: function(res) {
                   if(res.status=="OK")
                   {  
                     var frm = $('#payMethodForm');
                
                     $.ajax({
                        type: frm.attr('method'),
                        url: frm.attr('action'),
                        data: frm.serialize() + '&payment_id=' + res.payment_id,
                        success: function (data1) {
                              console.log('Submission was successful.');
                        },
                        error: function (data1) {
                              console.log('An error occurred.');
                              
                        },
                     });   

                    Swal.fire({
                        title: '<h5>Payment Added Sucessfully<h5>',
                        icon: 'success',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Get Order Details',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace(base_url + "dashboard/order_details/<?= $order_details->order_id ?>");
                        }
                        });
                     hideLoader("Add UPI");
                   
                   }  
                   else if(res.status=="ERR")
                   {
                      sweet_alert(res.type, res.message);
                      hideLoader("Add UPI");
                   }
                   
              }
             
          });
          }//end submit handler
          });
          $('#upiFormOrder').validate({
              rules: {
                upi_id: {
                  required: true, 
                }
                
              },
              messages: {
                upi_id: {
                  required: "Please enter your UPI Id",
                }
              },
              errorElement: 'span',
              errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
              },
              highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
              },
              unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
              }
            });
      }); 


      $('.pay-radio').click(function() {
                 
                      if($(this).is(":checked")){
                        var pm = $(this).val();
                       
                        if(pm == 'upip'){
                           $(".offcanvasRight-addupi").offcanvas('show');
                        }else if(pm == 'ibt'){
                           $(".offcanvasRight-addbank").offcanvas('show');
                        }
                                 
                   }
                  
             }); 

</script>
