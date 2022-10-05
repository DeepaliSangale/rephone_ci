
<!-- main start here----------------------------->
      <main class="main">
         <div class="mobile-search-1 search-mobile-bar mobile-header-border d-block d-lg-none">
            <form action="#">
               <input type="text" placeholder="Search your Brands or Model" class="search_model">
               <button type="submit"><i class="fi-rs-search"></i></button>
            </form>
         </div>

         <section class="home-slider position-relative mb-10">
             
                <!-- <div class="row container  d-none d-lg-block">
                      <div class="col-lg-5 sellformslider">                     
                        <h4 class="mt-20 darkblue">If your model is not listed please click!</h4>
                        <div class="mt-10">
                          <a href="<?php echo base_url() ?>request-price"><span class="get-exact-red">Request a Price </span></a>
                     </div>-->                        

                          
                 <!-- <nav>
                     <div class="nav nav-tabs sellph-tab" id="nav-tab" role="tablist">
                        <button class="nav-link active ml-14" id="sell-phone-tab" data-bs-toggle="tab" data-bs-target="#sell-phone" type="button" role="tab" aria-controls="sell-phone" aria-selected="true">Sell Phone
                        </button>
                        <button class="nav-link" id="buy-phone-tab" data-bs-toggle="tab" data-bs-target="#buy-phone" type="button" role="tab" aria-controls="buy-phone" aria-selected="false">Buy Phone</button>
                     </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade show active" id="sell-phone" role="tabpanel" aria-labelledby="sell-phone-tab">
                        <div class="shadow-sm p-3 bg-white mtm26 brdr">
                           <form method="post" action="<?php echo base_url() ?>web/choose_variant_model/">
                              <div class="form-group">
                                 <select class="form-select form-select-lg p-12 mb-3 font16" name="">
                                    <option>Mobile Phone</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <select class="form-select form-select-lg p-12 mb-3 font16" name="brand_id" id="sel_brand" required>
                                    <option value="">Select Brand</option>
                                    <?php if(!empty($this->home_brands)){ ?>
                                     <?php foreach($this->home_brands as $val){ ?>
                                       <option value="<?= $val['brand_id'] ?>"><?= $val['brand_name'] ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <select class="form-select form-select-lg p-12 mb-3 font16" name="model_id" id="sel_model" required>
                                    <option value="">Select Model</option>
                                  
                                 </select>
                              </div>
                              <div class="form-group">
                                 <div class="d-grid gap-2 gap2btn">
                                    <button type="submit" class="btn btn-primary">Sell Now</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="buy-phone" role="tabpanel" aria-labelledby="buy-phone-tab">
                       //buy phone
                        <div class="shadow-sm p-3 bg-white mtm26 brdr">
                           <form method="post">
                              <div class="form-group">
                                 <select class="form-select form-select-lg p-12 mb-3 font16" name="">
                                    <option>Mobile Phone</option>
                                    <option>Laptop</option>
                                    <option>Tablet</option>
                                    <option>Desktop</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <select class="form-select form-select-lg p-12 mb-3 font16" name="">
                                    <option selected>Select Brand</option>
                                    <option>Apple</option>
                                    <option>Samsung</option>
                                    <option>Vivo</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <select class="form-select form-select-lg p-12 mb-3 font16" name="">
                                    <option selected>Select Model</option>
                                    <option>Apple iPhone 6S</option>
                                    <option>Samsung M31</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <div class="d-grid gap-2 gap2btn">
                                    <button type="submit" class="btn btn-primary">Buy Now</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        //buy phone
                     </div>
                  </div>
               </div>
            </div>-->
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
               <?php if(!empty($slider)){ ?>             
               <?php foreach($slider as $val){ ?>
                
               <div class="single-hero-slider single-animation-wrap bg-orange-10" style="background-color:<?= $val['back_color'] ?>">
                  <div class="row slider-animated-1 p-3">
                 
                     <div class="col-md-12">
                        <div class="row">
                           <div class="col-md-7">
                              <h2 class="animated fw-900 text-brand mt-40"><?= $val['slider_title'] ?></h2>
                              <h4 class="animated mt-20"><?= $val['four_word'] ?></h4>
                              <?php if ($val['slider_id'] == 1) {    ?>                        
                                 <div class="row">
                                    <div class="col-lg-5">
                                       <div class="text-center mt-50">
                                          <a href="<?php echo base_url() ?>sell-old-mobile-phone"><span class="get-exact-sell">Sell Now</span></a>
                                       </div>
                                    </div>
                                 </div>
                            <?php }elseif($val['slider_id'] == 2){ ?>                                              
                              <div class="row">
                                 <div class="col-lg-7">                     
                                    <h4 class="mt-50 darkblue">If your model is not listed please click!</h4>
                                    <div class="mt-10">
                                       <a href="<?php echo base_url() ?>request-price"><span class="get-exact-red">Request a Price </span></a>
                                    </div>
                                 </div>
                              </div>
                            <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <div class="single-slider-img single-slider-img-1">
                                 <img class="animated" src="<?php echo base_url() ?>admin_assets/uploads/slider/<?= $val['slider_image'] ?>" alt="rephone slider">
                              </div>
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
              
               <?php } ?>
               <?php } ?>
           
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
         </section>
         
                         
         <section class="banners mb-20 mt-50">
            <div class="container">
            <h3 class="section-title mb-20"><span>Service </span>We Provide</h3>
                <div class="row">
               
                   <div class="col-lg-6 col-md-6" onclick="sell_now();">
                   <a href="<?php echo base_url() ?>sell-old-mobile-phone">
                     <div class="mt-3 p-3  text-white text-center rounded hover-up" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;background: linear-gradient(17deg, #0dcaf0, #0dcaf026);">
                     <img src="<?php echo base_url() ?>assets/site_img/sell_old_mobile.png" class="hover-up" alt="sell phone" height="100">
                     <img src="<?php echo base_url() ?>assets/site_img/sell-phone.png" alt="sell phone" height="80">
                           <h4>USED MOBILE TO US INSTANTLY!</h4> 
                           <br><a href="<?php echo base_url() ?>sell-old-mobile-phone" class="btn hover-up">Sell Now <i class="fi-rs-arrow-right"></i></a>                    
                        </div>  
                     </a>            
                     </div>
                  
                  
                    <div class="col-lg-6 col-md-6" onclick="comming_soon();">
                    <a href="<?php echo base_url() ?>web/comming_soon">
                    <div class="mt-3 p-3 text-center text-white rounded hover-up" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;background: linear-gradient(52deg, #8bc33f, #00000012);">
                    <img src="<?php echo base_url() ?>assets/site_img/sell_old_mobile.png" class="hover-up" alt="buy phone" height="100">
                    <img src="<?php echo base_url() ?>assets/site_img/buy-phone.png" alt="buy phone" height="80">
                  
                        <h4>REFURBISHED & PRE-OWNED</h4> 
                     
                        <br><a href="<?php echo base_url() ?>web/comming_soon" class="btn hover-up">Buy Now <i class="fi-rs-arrow-right"></i></a>
                        
                     </div>
                   </a>
                    </div>
                </div>
                </div>
                
            </div>
        </section>
     
         <!---Sell for  Cash------------------------------------------------->
         <!--<section class="featured section-padding mt-50">
            <div class="container">
                <h3 class="section-title mb-20"><span>Service </span>We Provide</h3>
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                     <a href="<?php echo base_url() ?>sell-old-mobile-phone">
                        <div class="banner-features wow fadeIn animated hover-up animated animated animated" >
                            <img src="<?php echo base_url() ?>assets/site_img/sell-phone.png" alt="sell phone" height="100">
                            <h4 class="c-black">Sell Phone</h4>
                        </div>
                     </a>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                       <a href="<?php echo base_url() ?>web/comming_soon">
                        <div class="banner-features wow fadeIn animated hover-up animated animated animated" >
                            <img src="<?php echo base_url() ?>assets/site_img/buy-phone.png" alt="buy phone" height="100">
                            <h4 class="c-black">Buy Phone</h4>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>-->
         <!---//Sell for  Cash------------------------------------------------->

         <!-----selling phone quick and easy-------------->
         <section class="featured section-padding mt-50">
            <div class="container">
               <h3 class="section-title mb-20"><span>Selling Phone </span>Quick And Easy</h3>
               <div class="row">
                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                     <div class="banner-features wow fadeIn animated hover-up animated quick-easy shadow-step">
                        <img src="<?php echo base_url() ?>assets/site_img/w1.png" alt="" class="rounded mx-auto d-block">
                        <p><span class="crcle">1</span></p>
                        <h4 class="bg-2">Select Phone</h4>
                        <p>Select The Device Select Your Brand And Model No Of Phone To Sell.</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                     <div class="banner-features wow fadeIn animated hover-up animated quick-easy shadow-step">
                        <img src="<?php echo base_url() ?>assets/site_img/w2.png" alt="" class="rounded mx-auto d-block">
                        <p><span class="crcle">2</span></p>
                        <h4 class="bg-2">Evaluate Phone</h4>
                        <p>Select Mobile Overall Condition, Accessories & Warranty To Get Exact Price For Your Used Phone</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                     <div class="banner-features wow fadeIn animated hover-up animated quick-easy shadow-step">
                        <img src="<?php echo base_url() ?>assets/site_img/w4.png" alt="" class="rounded mx-auto d-block">
                        <p><span class="crcle">3</span></p>
                        <h4 class="bg-2">Fast Pickup</h4>
                        <p>Our Pickup Executive Will Dopickup From Your Convenien Place Within 24 Hours</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                     <div class="banner-features wow fadeIn animated hover-up animated quick-easy shadow-step">
                        <img src="<?php echo base_url() ?>assets/site_img/w5.png" alt="" class="rounded mx-auto d-block">
                        <p><span class="crcle">4</span></p>
                        <h4 class="bg-2">Instant Cash</h4>
                        <p>Instant Cash Or Online Payments Will Made Immediately</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <section class="featured section-padding mt-50 bkg-light">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                        <div class="section-header">
                           <h3 class="section-title mb-50"><span>Why Choose</span> Us</h3>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container pad-top-5em">
                  <div class="row why">
                     <div class="col-xs-12 col-sm-4 col-lg-4 mb-20">
                        <img src="<?php echo base_url() ?>assets/site_img/price.png" alt="price">
                        <h5>Amazing Prices</h5>
                        <p>Buying or selling, with our best prices</p>
                     </div>
                     <div class="col-xs-12 col-sm-4 col-lg-4 mb-20">
                        <img src="<?php echo base_url() ?>assets/site_img/fast.png" alt="Fast Service">
                        <h5>Quick &amp; Fast Service</h5>
                        <p>Get mobile in a click at your home/office</p>
                     </div>
                     <div class="col-xs-12 col-sm-4 col-lg-4 mb-20">
                        <img src="<?php echo base_url() ?>assets/site_img/security.png" alt="security">
                        <h5>Safety Guaranteed</h5>
                        <p>We are the safest hands for your device security</p>
                     </div>
                  </div>
               </div>
         </section>

            <!--model barand review-->
            <?php $this->load->view('web/model_brand_review'); ?>


         <section class="mb-50">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="banner-bg wow fadeIn animated" style="background-image: url('<?php echo base_url() ?>assets/imgs/banner/banner-8.jpg')">
                        <div class="banner-content">
                           <h5 class="text-grey-4 mb-15">Shop Today’s Deals</h5>
                           <h2 class="fw-600">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

     
      </main>
<script>
      function sell_now(){
            location.replace(base_url +'sell-old-mobile-phone');
         }
         function comming_soon(){
            location.replace(base_url +'web/comming_soon');
         }

      </script>