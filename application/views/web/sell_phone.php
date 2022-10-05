 <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
               <h1 class="mb-15">Sell Old <?= $brand_name ?> Mobile Phone</h1>
                <div class="breadcrumb">
                    <a href="<?php echo base_url() ?>" rel="nofollow">Home</a>
                    <span></span> Sell Old <?= $brand_name ?> Mobile Phone
                    <span></span> <b class="c-black"> Sell Old <?= $brand_name ?> </b>
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container custom">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-header mb-30">
                            <h2 class="font22 text-brand">Select Product</h2>
                        </div>
                           
                   </div>
                    <div class="col-lg-4 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget widget_search mb-50">
                                <div class="search-form">
                                    <form>
                                        <input type="text" placeholder="Search your mobile phone" class="search_model">
                                        <button type="submit"> <i class="fi-rs-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                                                    
                        </div>
                    </div>
                </div>
            </div>
            </section>
               <section class="featured section-padding position-relative sellph-mar">            
                  <div class="container">
                      <div class="row">
                           <?php if(!empty($sell_phone)){ ?>
                            <?php foreach($sell_phone as $val){ ?>
                          <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-2">
                           <a href="<?php echo base_url() ?>sell-mobile-phone-used/<?= $val['m_url'] ?>">
                              <div class="banner-features1 wow fadeIn animated hover-up">
                                  <img src="<?php echo base_url() ?>assets/uploads/model/<?= $val['m_image']; ?>" alt="<?= $val['m_name']; ?>" class="d-block rounded mx-auto">
                                  <span class="small c-black"><?= $val['m_name']; ?></span>
                              </div>
                           </a>
                       </div>
                   <?php } ?>
                   <?php } ?>
                   
                </div>
            </div>
        </section>

           <!--model barand review-->
         <?php $this->load->view('web/model_brand_review'); ?>
    
      </main>