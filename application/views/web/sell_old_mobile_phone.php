<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
             
                <div class="breadcrumb">
                    <a href="<?php echo base_url() ?>" rel="nofollow">Home</a>
                    <span></span> <b class="c-black"> Sell Mobile Phone </b>
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container custom">
                <div class="row mb-50 shadow p-3 bg-body radius14">
                    <div class="col-lg-6">
                       <h3>Sell your Mobile Phone for Instant Cash</h3>
                         <ul class="flex-horizontal-center mt-30 font16 d-none d-lg-flex">
                           <li class="p-1"><img src="assets/site_img/right-checkmark.svg" class="right-chk"><span>Maximum Value</span></li>
                           <li class="p-1"><img src="assets/site_img/right-checkmark.svg" class="right-chk"><span>Safe & Hassle-free</span></li>
                            <li class="p-1"><img src="assets/site_img/right-checkmark.svg" class="right-chk"><span>Doorstep Pickup</span></li>
                        </ul>
                        <div class="search-form mt-30">
                              <form>
                                  <input type="text" id="search_model" placeholder="Search your mobile phone to sell" class="border-radius-10 search_model">
                                  <button type="submit"> <i class="fi-rs-search"></i> </button>
                              </form>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <p class="mt-30 linev"><span> Or choose a brand </span></p>
                           </div>
                        </div>
                        
                   </div>
                   <div class="col-lg-2">
                      <img src="assets/site_img/7191857_preview.png" alt="mobile rephone">
                   </div>    
                   <section class="featured section-padding mt-10">
                            <div class="row">
                          
                                <?php foreach($brands as $val){ ?>
                                <div class="col-lg-2 col-md-4 col-12 col-sm-6">
                                 <a href="<?= base_url() ?>sell-mobile-phone/<?= $val['brand_url']; ?>">
                                    <div class="wow fadeIn animated hover-up animated animated animated shadow-sm border-radius-10">
                                        <img src="<?php echo base_url() ?>assets/uploads/brand/<?= $val['brand_image'] ?>" alt="<?= $val['brand_name'] ?>">
                                    </div>
                                 </a>
                                </div>
                                <?php } ?>
                            
                            </div>
                    </section>               
                </div>
                
            </div>
            </section>
       
               <!-----selling phone quick and easy-------------->
         <section class="featured section-padding mt-50">
            <div class="container">
                <h3 class="section-title mb-20">How Its Work?</h3>
               <div class="row">
                 <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                     <div class="banner-features wow fadeIn animated hover-up animated quick-easy">
                        <img src="assets/site_img/w1.png" alt="" class="rounded mx-auto d-block">
                            <p><span class="crcle">1</span></p>
                        <h4 class="bg-2">Select Phone</h4>
                        <p>Select The Device Select Your Brand And Model No Of Phone To Sell.</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                     <div class="banner-features wow fadeIn animated hover-up animated quick-easy">
                        <img src="assets/site_img/w2.png" alt="" class="rounded mx-auto d-block">
                            <p><span class="crcle">2</span></p>
                        <h4 class="bg-2">Evaluate Phone</h4>
                        <p>Select Mobile Overall Condition, Accessories & Warranty To Get Exact Price For Your Used Phone</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                     <div class="banner-features wow fadeIn animated hover-up animated quick-easy">
                        <img src="assets/site_img/w4.png" alt="" class="rounded mx-auto d-block">
                        <p><span class="crcle">3</span></p>
                        <h4 class="bg-2">Fast Pickup</h4>
                        <p>Our Pickup Executive Will Dopickup From Your Convenien Place Within 24 Hours</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                     <div class="banner-features wow fadeIn animated hover-up animated quick-easy">
                        <img src="assets/site_img/w5.png" alt="" class="rounded mx-auto d-block">
                        <p><span class="crcle">4</span></p>
                        <h4 class="bg-2">Instant Cash</h4>
                        <p>Instant Cash Or Online Payments Will Made Immediately</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
            
    <!--model barand review-->
    <?php $this->load->view('web/model_brand_review'); ?>

      
    
      </main>
