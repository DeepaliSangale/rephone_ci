
      <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
               <h1 class="mb-15">Sell Old <?= $model_data->m_name; ?></h1>
                <div class="breadcrumb">
                    <a href="<?php echo base_url() ?>" rel="nofollow">Home</a>
                    <span></span> Sell Old <?= $brand_name ?> Mobile Phone
                    <span></span> Sell Old <?= $brand_name ?>
                    <span></span> <b class="c-black"> <?= $model_data->m_name; ?> </b>
                </div>
            </div>
        </div>
        <section class="mb-50">
            <div class="container custom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-header mb-30">
                            <div class="product-list mb-50 shadow p-3 bg-body radius14">
                            <div class="product-cart-wrap">
                                <div class="product-img-action-wrap-var">
                                    <img class="default-img" src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" alt="<?= $model_data->m_name; ?>">                                 
                                </div>
                                <div class="product-content-wrap mt-40">
                                    <h2 class="font-20-14"><?= $model_data->m_name ?></h2>
                                    <div class="product-price">
                                        <span class="font16">4680</span>+ already sold on Rephone
                                       
                                    </div>
                                    <p class="mt-30 linev"><span>choose a variant </span></p>
                                    <?php if(!empty($variant_data)){ ?>
                                    <div class="row">
                                    <?php foreach($variant_data as $val){ ?>
                                       <div class="col-lg-3 vari-btn m-2 hover-up">
                                        <a href="<?php echo base_url() ?>sell-mobile-phone-variant/<?= $val['p_url'] ?>"><span class="vari-text"><?= $val['variant_name']; ?> </span></a>
                                       </div>
                                    <?php } ?>
                                      
                                    </div>
                                    <?php } ?>
                                   
                                </div>
                            </div>
                            <!--single product-->
                         
                        </div>


                        </div>
                           
                   </div>
                    
                </div>
            </div>
            </section>
       



         <!----Brands we Deal------------------------------>
   <section class="section-padding">
            <div class="container wow fadeIn animated">
               <h3 class="section-title mb-20"><span>Brands</span> We Deal</h3>
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
         <!-------------Top model section------------------------------>
         <section class="section-padding">
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
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                            <div class="hero-card-icon icon-left-2 hover-up ">
                                <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="assets/imgs/page/avatar-1.jpg" alt="">
                            </div>
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                    J. Bezos
                                </h5>
                                <p class="font-sm text-grey-5">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                            <div class="hero-card-icon icon-left-2 hover-up ">
                                <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="assets/imgs/page/avatar-3.jpg" alt="">
                            </div>
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                    B.Gates
                                </h5>
                                <p class="font-sm text-grey-5">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                            <div class="hero-card-icon icon-left-2 hover-up ">
                                <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="assets/imgs/page/avatar-2.jpg" alt="">
                            </div>
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                    B. Meyers
                                </h5>
                                <p class="font-sm text-grey-5">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                            <div class="hero-card-icon icon-left-2 hover-up ">
                                <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="assets/imgs/page/avatar-4.jpg" alt="">
                            </div>
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                    J. Bezos
                                </h5>
                                <p class="font-sm text-grey-5">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                            <div class="hero-card-icon icon-left-2 hover-up ">
                                <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="assets/imgs/page/avatar-5.jpg" alt="">
                            </div>
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                    B.Gates
                                </h5>
                                <p class="font-sm text-grey-5">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                            <div class="hero-card-icon icon-left-2 hover-up ">
                                <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="assets/imgs/page/avatar-1.jpg" alt="">
                            </div>
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                    B. Meyers
                                </h5>
                                <p class="font-sm text-grey-5">Adobe Jsc</p>
                                <p class="text-grey-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt voluptatum dicta reprehenderit accusamus voluptatibus voluptas."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-12 text-center">
                        <p class="wow fadeIn animated">
                            <a class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg">View More</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
         <section class="mb-50">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="banner-bg wow fadeIn animated" style="background-image: url('assets/imgs/banner/banner-8.jpg')">
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