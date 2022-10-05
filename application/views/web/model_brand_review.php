
          <!----Brands we Deal desktop------------------------------>
          <section class="section-padding d-none d-lg-block">
            <div class="container wow fadeIn animated">
               <h3 class="section-title mb-20"><span>Top</span> Brands</h3>
               <div class="carausel-6-columns-cover position-relative">
                  <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                  <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-3">
                     <?php if(!empty($this->home_brands)){ ?>
                     <?php foreach($this->home_brands as $val){ ?>
                        <div class="product-cart-wrap small hover-up">
                           <div class="product-img-action-wrap">
                              <div class="product-img product-img-zoom">
                                 <a href="<?php echo base_url() ?>sell-mobile-phone/<?= $val['brand_url'] ?>">
                                 <img class="default-img" src="<?php echo base_url() ?>assets/uploads/brand/<?= $val['brand_image'] ?>" alt="<?= $val['brand_name'] ?>">
                                 </a>
                                 <span class="small c-black" style="font-size:19px;padding:2px;"><?= $val['brand_name']; ?></span> 
                              </div>
                              
                           </div>
                        </div>
                     <?php } ?>
                     <?php } ?>
                     <!--End product-cart-wrap-2-->
              
                  </div>
               </div>
            </div>
         </section>
         <!----///Brands we Deal------------------------------>

         
          <!----Brands we Deal mobile------------------------------>
            <section class="section-padding d-block d-lg-none">
              <div class="container">
              <h3 class="section-title mb-20"><span>Top</span> Brands</h3>
                      <div class="row">
                      <?php if(!empty($this->home_brands)){ ?>
                          <?php foreach($this->home_brands as $val){ ?>
                          <div class="col-6">
                           <a href="<?php echo base_url() ?>sell-mobile-phone/<?= $val['brand_url'] ?>">
                              <div class="banner-features1 wow fadeIn animated hover-up">
                                  <img src="<?php echo base_url() ?>assets/uploads/brand/<?= $val['brand_image'] ?>" alt="<?= $val['brand_name'] ?>" class="d-block rounded mx-auto">
                                  <span class="small c-black" style="font-size: 19px;"><?= $val['brand_name']; ?></span>
                              </div>
                           </a>
                       </div>
                   <?php } ?>
                   <?php } ?>
                   
                </div>
            </div>
         </section>
         <!----///Brands we Deal------------------------------>

         <!-------------Top model section------------------------------>
         <section class="section-padding d-none d-lg-block">
            <div class="container wow fadeIn animated">
               <h3 class="section-title mb-20"><span>Top</span> Models</h3>
               <div class="carausel-6-columns-cover position-relative">
                  <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                  <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                  <?php if(!empty($this->home_models)){ ?>
                     <?php foreach($this->home_models as $val){ ?>
                     <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                           <div class="product-img product-img-zoom">
                              <a href="<?php echo base_url() ?>sell-mobile-phone-used/<?= $val['m_url'] ?>">
                              <img class="default-img" src="<?php echo base_url() ?>assets/uploads/model/<?= $val['m_image'] ?>" alt="<?= $val['m_name']; ?>">
                              </a>
                              <span class="small c-black" style="font-size: 16px;"><?= $val['m_name']; ?></span>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                     <?php } ?>
                     <!--End product-cart-wrap-2-->
                  </div>
               </div>
            </div>
         </section>
         <!----///Top model section------------------------------>


          
          <!----Top Model mobile------------------------------>
          <section class="section-padding d-block d-lg-none">
              <div class="container">
              <h3 class="section-title mb-20"><span>Top</span> Models</h3>
                      <div class="row">
                      <?php if(!empty($this->home_models)){ ?>
                     <?php foreach($this->home_models as $val){ ?>
                          <div class="col-6">
                           <a href="<?php echo base_url() ?>sell-mobile-phone-used/<?= $val['m_url'] ?>">
                              <div class="banner-features1 wow fadeIn animated hover-up">
                                  <img src="<?php echo base_url() ?>assets/uploads/model/<?= $val['m_image'] ?>" alt="<?= $val['m_name'] ?>" class="d-block rounded mx-auto">
                                  <span class="small c-black" style="font-size: 15px;"><?= $val['m_name']; ?></span>
                              </div>
                           </a>
                       </div>
                   <?php } ?>
                   <?php } ?>
                   
                </div>
            </div>
         </section>
         <!----///Brands we Deal------------------------------>
                
        <!----Happy Customer------------------------------>
        <section id="testimonials" class="section-padding">
            <div class="container pt-25">
               <div class="row mb-50">
                  <div class="col-lg-12 col-md-12 text-center">
                     <h6 class="mt-0 mb-10 text-uppercase  text-brand font-sm wow fadeIn animated">some facts</h6>
                     <h2 class="mb-15 text-grey-1 wow fadeIn animated">Take a look what<br> our clients say about us</h2>
                  </div>
               </div>
               <div class="row align-items-center">
                  <?php if(!empty($review)){ ?>
                     <?php foreach($review as $val){ ?>
                  <div class="col-md-6 col-lg-4">
                     <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                        <div class="hero-card-icon icon-left-2 hover-up ">
                           <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="<?php echo base_url() ?>assets/uploads/review/<?= $val['c_photo'] ?>" alt="client Review">
                        </div>
                        <div class="pl-30">
                           <h5 class="mb-5 fw-500">
                             <?= $val['c_name'] ?>
                           </h5>
                           <p class="font-sm text-grey-5">Rephone</p>
                           <p class="text-grey-3">  <?= $val['c_comment'] ?></p>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <?php } ?>
                  
              
               </div>
               <!--<div class="row mt-30">
                  <div class="col-12 text-center">
                     <p class="wow fadeIn animated">
                        <a class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg">View More</a>
                     </p>
                  </div>
               </div>-->
            </div>
         </section>