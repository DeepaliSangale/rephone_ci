      
<main class="main">
<section class="mt-30 mb-50">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                  <img src="<?php echo base_url() ?>assets/site_img/check-mark.png" height="50" width="50">
                  <h1 class="text-center gen-color font16">Thank You!</h1>
                  <p class="text-center c-black">Your Order Placed Successfully.</p>
                  <p class="c-black">You will get a call shortly for confirmation.<p>
              </div>  
            </div>
            <div class="row">
            <div class="col-lg-4">
            </div>
              <div class="col-lg-4">
                <?php if(empty($order_details->payment_id)){ ?>
                 <div class="row mt-5">
                        <div class="col-4">
                           <a href="<?php echo base_url() ?>web/payment/<?= $order_details->order_id ?>"><span class="add-payment-btn hover-up rounded mx-auto"><i class="fi-rs-plus mr-5"></i></span></a>
                        </div>
                        <div class="col-7 p-0">
                          <h5 class="c-red font12">Add Payment Details</h5>
                          <small class="font13">Please add your payment details before pickup for easy transfer </small>
                        </div>
                  </div>
                <?php } ?>
                
                  <div class="row">
                        <h5 class="pt-20">Device Details</h5>
                        <div class="col-4">
                           <div class="image">
                              <img src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" alt="<?= $model_data->m_name; ?>" >
                           </div>
                        </div>
                        <div class="col-7">
                              <h5 class="pt-10"><?= $model_data->m_name; ?>(<?= $variant_data->variant_name; ?>)</h5>
                              <p>Sell Price:</p>
                              <span class="font-20-14">₹<?= $product_data->p_price ?></span>
                        </div>
                  </div>
              <table class="table mt-10">
                        <tbody>
                          <tr>
                            <td class="font-semi-bold">Order ID</td>
                            <td><?= $_SESSION['order_id'] ?></td>
                          </tr>
                        
                          <tr>
                            <td class="font-semi-bold">Order Status</td>
                            <td>Genrated</td>
                          </tr>
                          <tr>
                            <td class="font-semi-bold">Payment Mode</td>
                            <?php if($order_details->payment_mode=='ibt'){ 
                                       $pm = 'Instant Bank Transfer';
                                   }elseif($order_details->payment_mode=='upip'){
                                       $pm = 'UPI';
                                   }elseif($order_details->payment_mode=='COD'){
                                    $pm = 'Cash On Delivery ';
                                  }else{
                                    $pm = 'Instant Bank Transfer';
                                  }
                                     ?>
                            <td><?php echo $pm; ?> </td>
                          </tr>
                          <tr>
                            <td><a href="<?= base_url()?>dashboard/order_details/<?= $_SESSION['order_id'] ?>"><span class="get-exact-green hover-up rounded mx-auto"> Order Details </span></a></td>
                            <?php if(empty($order_details->payment_id)){ ?>
                               <td><a href="<?php echo base_url() ?>web/payment/<?= $order_details->order_id ?>"><span class="get-exact-red hover-up rounded mx-auto"><i class="fi-rs-plus mr-5"></i> Add Payment </span></a></td>
                            <?php } ?>
                           
                          </tr>
                        </tbody>
                      </table>
              </div>
              <div class="col-lg-4">
            </div>
            </div>
        <div>
</section>
<main>