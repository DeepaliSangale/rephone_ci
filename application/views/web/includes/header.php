<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Rephone - Sell Old &amp; Used Mobile Phones Online in India For Instant Cash</title>
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta property="og:title" content="">
      <meta property="og:type" content="">
      <meta property="og:url" content="">
      <meta property="og:image" content="">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="assets/site_img/logo/fav.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Template CSS -->
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/main.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/sweetalert2.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/sweetalert2.min.css">
      
      <script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.6.0.min.js"></script>
      
      <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
      <script src="https://maps.google.com/maps/api/js?key=AIzaSyA0ioS_5vgoZis5x37-WSbcidwRfKo3Azs&libraries=places&callback=initAutocomplete" type="text/javascript"></script>
      
      <script>var base_url = "<?php echo base_url() ?>";</script>

      <?php
        $l_pincodes = $this->cm->get_all_selected_by_condition('mst_pincode');
      ?>
   </head>
   <body>
      <!------------------ Login Window----------------------------------------------------->  
      <div class="offcanvas offcanvas-end offcanvasRight-login"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?php echo base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body">
            <div class="row">
               <div class="container">
                  <div class="col-lg-12">
                     <img src="<?php echo base_url() ?>assets/site_img/login vector.svg" class="rounded mx-auto d-block login1">
                  </div>
                  <h3 class="mb-10">Welcome to Rephone!</h3>
                  <form id="loginForm">
                     <label>Please enter your phone number</label>
                     <div class="form-group">
                        <input type="number" name="user_phone" class="form-control" placeholder="Mobile Number" required="required" pattern="[1-9]{1}[0-9]{9}" onkeypress="if(this.value.length==10) return false;" autocomplete="off">
                     </div>
                     <div class="login_footer form-group">
                        <div class="chek-form">
                           <div class="custome-checkbox">
                              <input class="form-check-input" type="checkbox" name="terms_chk" id="termCheckbox12"  required="required" checked>
                              <label class="form-check-label" for="termCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                           </div>
                        </div>
                        <a href="#"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                     </div>
                     <div class="form-group">
                      <small class="terms_chk_error text-danger mb-10"></small>
                     </div>
                     <div class="form-group">
                        <div class="d-grid gap-2">
                           <button type="submit" class="btn btn-primary loader-btn">CONTINUE</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!------------------------//Login ------------------------------------------------------------------->

       <!------------------------------------ Registration Window----------------------------------------------------->  
       <div class="offcanvas offcanvas-end offcanvasRight-reg"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?php echo base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body">
            <div class="row">
               <div class="container">
               <div class="col-lg-12">
                     <img src="<?php echo base_url() ?>assets/site_img/login vector.svg" class="rounded mx-auto d-block login1">
                  </div>
                  <h3 class="mb-10">Sign Up</h3>
                  <form id="regForm">
                     <label>Please enter your personal details. Worry not , they are safe with us</label>
                     <div class="form-group">
                        <input type="text" name="user_name" class="form-control" placeholder="Enter Your Name" required="required" autocomplete="off">
                     </div>
                     <div class="form-group">
                        <input type="email" name="user_email" class="form-control" placeholder="Enter Your Email" required="required" autocomplete="off">
                     </div>
                     <div class="form-group">
                        <input type="text" name="user_phone" id="u_phone" class="form-control" placeholder="Enter Your Mobile" required="required" pattern="[1-9]{1}[0-9]{9}" onkeypress="if(this.value.length==10) return false;" autocomplete="off">
                     </div>
                     <div class="form-group">
                        <div class="d-grid gap-2">
                           <button type="submit" class="btn btn-primary loader-btn">CONTINUE</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!------------------------//Regisration ------------------------------------------------------------------->

       <!------------------------------------ OTP Window----------------------------------------------------->  
       <div class="offcanvas offcanvas-end offcanvasRight-otp" tabindex="-1"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?php echo base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body">
            <div class="row">
               <div class="container">
                  <div class="col-lg-12">
                     <img src="<?php echo base_url() ?>assets/site_img/login vector.svg" class="rounded mx-auto d-block login1">
                  </div>
                  <h3 class="mb-10">Enter Otp</h3>
                  <form id="otpVerForm">
                     <label>We’ve sent an OTP on <span id="otpmob"></span></label>
                     <div class="form-group">
                        <input type="number" name="otp" class="form-control" placeholder="Enter OTP" required="required" autocomplete="off">
                     </div>
                     <div class="form-group">
                        <label class="text-decoration-underline font16" onclick="ResendOtp();">Resend OTP</label>
                     </div>
                     <input type="hidden" name="user_name" id="un">
                     <input type="hidden" name="user_phone" id="up">
                     <input type="hidden" name="user_email" id="ue">
                     <div class="form-group">
                        <div class="d-grid gap-2">
                          <button type="submit" class="btn btn-primary loader-btn">VERIFY OTP</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!------------------------//End OTP ------------------------------------------------------------------->
        <?php if(!empty($_SESSION['user_id'])){ ?>
         <!------------------------------------ Edit Profile----------------------------------------------------->  
         <div class="offcanvas offcanvas-end offcanvasRight-editprofile" tabindex="-1"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?= base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body">
            <div class="row">
               <div class="container">
                  <h3 class="mb-10">Edit Profile</h3>
                  <form id="updateProfileForm">
                     <label>Please enter your personal details. Worry not , they are safe with us.</label>
                     <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="user_name" class="form-control" placeholder="Enter Your Name" required="required" autocomplete="off" value="<?= @$this->user_profile->user_name ?>">
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="user_email" class="form-control" placeholder="Enter Your Email" required="required" autocomplete="off" value="<?= @$this->user_profile->user_email ?>">
                     </div>
                     <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="number" id="user_phone"  class="form-control" placeholder="Enter Your Mobile" required="required" pattern="[1-9]{1}[0-9]{9}" onkeypress="if(this.value.length==10) return false;" readonly value="<?= @$this->user_profile->user_phone ?>">
                     </div>
                     <div class="form-group">
                        <label>Alt. Mobile Number</label>
                        <input type="number" id="alt_no" name="alt_no" class="form-control" placeholder="Enter Your Mobile" required="required" pattern="[1-9]{1}[0-9]{9}" onkeypress="if(this.value.length==10) return false;" autocomplete="off" value="<?= @$this->user_profile->alt_no ?>">
                     </div>
                     <div class="form-group">
                        <div class="d-grid gap-2">
                           <button type="submit" class="btn btn-primary loader-btn">UPDATE</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!------------------------//Edit Profile ------------------------------------------------------------------->
      <?php } ?>

         <!------------------------------------ Cart Window----------------------------------------------------->  
         <div class="offcanvas offcanvas-end offcanvasRight-cart"  aria-labelledby="offcanvasRightLabel">
         <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
               <img src="<?php echo base_url() ?>assets/site_img/back.svg" data-bs-dismiss="offcanvas" class="close-style search-close mobile-menu-close close-style-wrap close-style-position-inherit">
            </h5>
         </div>
         <div class="offcanvas-body">
            <div class="row">
               <div class="container">
              
                  
                  <ul>
                     <?php if(!empty($this->pending_order)){ ?>
                     <?php foreach($this->pending_order as $val){                    
                        ?>
                        <?php $product_data =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' => $val['product_id']])->from('mst_product')->get()->row(); ?>
                     <?php $model_data = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $product_data->p_m_id])->from('mst_model')->get()->row(); ?>
                     <?php $variant_data =  $this->db->select("*")->where(['variant_id' => $product_data->p_variant_id],['active' => 1])->from('mst_variant')->get()->row(); ?>
                     <li>
                        <div class="shopping-cart-img">
                              <a href="<?= base_url()?>dashboard/order_details/<?= $val['order_id'] ?>"><img alt="<?= $model_data->m_name; ?>" src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" height="80" width="80"></a>
                        </div>
                        <div class="shopping-cart-title">
                              <h6><a href="<?= base_url()?>dashboard/order_details/<?= $val['order_id'] ?>"><?= $model_data->m_name; ?>(<?= $variant_data->variant_name; ?>)</a></h6>
                              <h4><span>1 × </span><?= $val['sell_amt'] ?></h4>
                        </div>
                        
                     </li>
                     <?php } ?>
                     <?php } ?>
                  
                  </ul>
                  <div class="shopping-cart-footer">
                     <!--<div class="shopping-cart-total">
                        <h4>Total <span>$4000.00</span></h4>
                     </div>-->
                     <div class="shopping-cart-button">
                        <?php if(!empty($this->pending_order)){ ?>
                        <a href="<?= base_url()?>dashboard/" class="get-exact-sell">View orders</a>
                        <?php }else{ ?>
                           <div class="col-lg-12">
                              <img src="<?php echo base_url() ?>assets/site_img/cart.svg" class="rounded mx-auto d-block login1">
                          </div>
                           <h4 class="text-center">Your Cart is Empty!</h4>
                           <div class="text-center">
                             <a href="<?= base_url() ?>sell-old-mobile-phone" class="mt-30 get-exact-sell">Sell Now</a>
                          </div>
                           <?php } ?>
                        
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <!------------------------//Cart window ------------------------------------------------------------------->

   <!-- 
Front-End Design
Ui Design
-->


<header>
  <!-- contact content -->
  <div class="header-content-top">
    <div class="content">
      <span><i class="fas fa-phone-square-alt"></i> (+91)787-565-8209</span>
      <span><i class="fas fa-envelope-square"></i>pastechdigital@gmail.com</span>
    </div>
  </div>
  <!-- / contact content -->

  <div class="contnr d-none d-lg-flex">
    <!-- logo -->
    <strong class="logo"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/site_img/logo/rephone-logo.png" alt="logo" height="80"></a></strong>
  
         <nav class="nav-content">
            <!-- nav -->
            <ul class="nav-content-list">       
            <li class="nav-content-item account-login">
               <label class="open-menu-pincode" for="open-menu-pincode">
                  <input class="input-menu" id="open-menu-pincode" type="checkbox" name="menu" />                                       
                     <i class="fas fa-map-marker color-white"></i><span class="login-text default_pincode color-white"><strong><?= (isset($_SESSION['default_pincode'])) ? $_SESSION['default_pincode'] : 'Select Your Pincode' ?></strong></span> <span class="item-arrow"></span>
                     <!-- submenu -->               
                     <ul class="login-list">
                              <?php foreach ($l_pincodes as $key => $row) { ?>
                                 <li class="login-list-item media-body"><span><?= $row['pincode_code'] ?></span></li>
                              <?php } ?>                                            
               
                  </label>
                  </ul>           
            </li>      
            </ul>
         </nav>
         
          <!--search -->
            <select class="form-select brand_dynamic" style="width:10%;height:40px;">
                  <option value="">All Brands</option>
                  <?php foreach($this->home_brands as $val){ ?>
                  <option value="<?php echo base_url() ?>sell-mobile-phone/<?= $val['brand_url'] ?>"><?= $val['brand_name'] ?></option>
                  <?php } ?>                                   
               </select>   
            <label class="open-search" for="open-search">
               <i class="fas fa-search"></i>
                     <input class="input-open-search" id="open-search" type="checkbox" name="menu" />
                     <div class="search">
                     <button class="button-search"><i class="fas fa-search"></i></button>
                     <input type="text" placeholder="Search your Brands or Model" class="input-search search_model"/>
                     </div>
            </label>
    <!-- // search -->
    <nav class="nav-content">
      <!-- nav -->
      <ul class="nav-content-list">
        <li class="nav-content-item account-login" <?php if(empty($_SESSION['user_id'])){ echo 'onclick="funLogin();" aria-controls="offcanvasRight"';} ?>>
          <label class="open-menu-login-account" for="open-menu-login-account">
            <input class="input-menu" id="open-menu-login-account" type="checkbox" name="menu" />                                       
               <i class="fas fa-user-circle color-white"></i><span class="login-text color-white"><?php if(!empty($_SESSION['user_id'])){ echo 'Hello, '.$_SESSION['user_name']; }else{ echo 'Hello, Sign in'; } ?> <strong style="line-height: normal;"><?php if(!empty($_SESSION['user_id'])){ echo ''; }else{ echo 'Create Account'; } ?></strong></span> <span class="item-arrow"></span>
                                    
               <!-- submenu -->
               <?php if(!empty($_SESSION['user_id'])){ ?>
                  <ul class="login-list">
                  <a href="<?= base_url() ?>dashboard#orders" target="_BLANK"><li class="login-list-item">Orders</li></a>
                  <a href="<?= base_url() ?>dashboard#saved-payments" target="_BLANK"><li class="login-list-item">Saved Payments</li></a>
                  <a href="<?= base_url() ?>dashboard#address" target="_BLANK"><li class="login-list-item">Saved Address</li></a>
                  <a href="<?= base_url() ?>web/logout"><li class="login-list-item">Logout</li></a>
           
              </label>
            </ul>
            <?php } ?>
        </li>
      
        <li class="nav-content-item"><a class="nav-content-link font16 color-white" data-bs-toggle="offcanvas" data-bs-target=".offcanvasRight-cart" aria-controls="offcanvasRight"><i class="fas fa-shopping-cart"></i>
     
                  cart(<?php if(empty($this->pending_order)){ ?><span>0</span><?php }else{ echo count($this->pending_order); }?>)</span></a></li>
     
      </ul>
    </nav>
  </div>
</header>



      
      <header class="header-style-3 header-height-2">
         <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
           <!-- <div class="container">-->   
               <div class="row">                 
                  <div class="col-lg-12"> 
                            <div class="header-action-icon d-block d-lg-none">
                                <div class="burger-icon">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                         </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            <!--</div>--container-->
         </div>
         <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
               <div class="header-wrap header-space-between position-relative  main-nav">
                  <div class="logo logo-width-1 d-block d-lg-none">
                     <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/site_img/logo/rephone-logo.png" alt="logo"></a>
                  </div>
                  <div class="header-nav d-none d-lg-flex">
                     <div class="main-menu main-menu-hover main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                           <ul>
                              <li>
                                 <a class="active" href="<?php echo base_url() ?>">Home</a>
                              </li>
                              <li>
                                 <a class="" href="<?php echo base_url() ?>sell-old-mobile-phone">Sell Phone <i class="fi-rs-angle-down"></i></a>
                                 <ul class="sub-menu">
                                    <li>
                                       <a href="<?php echo base_url() ?>">
                                          <h5>Top Brands</h5>
                                       </a>
                                    </li>
                                    <hr>
                                    <?php if(!empty($this->home_brands)){ ?>
                                     <?php foreach($this->home_brands as $val){ ?>
                                      <li><a href="<?php echo base_url() ?>sell-mobile-phone/<?= $val['brand_url'] ?>"><?= $val['brand_name'] ?></a></li>
                                    <?php } ?>
                                    <?php } ?>
                                 </ul>
                              </li>
                              <li>
                                 <a class="" href="<?php echo base_url() ?>web/comming_soon">Buy Phone <i class="fi-rs-angle-down"></i></a>
                                 <ul class="sub-menu">
                                    <li>
                                       <a href="<?php echo base_url() ?>">
                                          <h5>More In Buy Phone</h5>
                                       </a>
                                    </li>
                                    <hr>
                                    <li><a href="<?php echo base_url() ?>web/comming_soon">Refurbished Phones</a></li>
                                 </ul>
                              </li>
                              <li>
                                 <a class="" href="<?php echo base_url() ?>web/store">Rephone Store <i class="fi-rs-angle-down"></i></a>
                                 <ul class="sub-menu">
                                    <li>
                                       <a href="#">
                                          <h5>More in Rephone Stores</h5>
                                       </a>
                                    </li>
                                    <hr>
                                    <?php if(!empty($this->store_city)){ ?>
                                     <?php foreach($this->store_city as $val){ ?>
                                       <li><a href="<?= base_url() ?>web/store/<?= $val['city_name'] ?>"><?= $val['city_name'] ?></a></li>
                                      <?php } ?>
                                    <?php } ?>
                                 </ul>
                              </li>
                              <li>
                                 <a href="<?php echo base_url() ?>about-us">About Us</a>
                              </li>
                              <li>
                                 <a href="<?= base_url() ?>contact-us">Contact</a>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="header-action-right d-block d-lg-none">
                     <div class="header-action-2">
                        <div class="header-action-icon-2 d-block d-lg-none">
                           <div class="burger-icon burger-icon-white">
                              <span class="burger-icon-top"></span>
                              <span class="burger-icon-mid"></span>
                              <span class="burger-icon-bottom"></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <!-------------mobile header------------------>
      <div class="mobile-header-active mobile-header-wrapper-style">
         <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
               <div class="mobile-header-logo">
                  <i class="fi-rs-marker"></i>
                  <select class="media-body-mobile" style="width:80%">
                     <option><span class="default_pincode"><?= (isset($_SESSION['default_pincode'])) ? $_SESSION['default_pincode'] : 'Pincode' ?> </span></option>
                     <?php foreach ($l_pincodes as $key => $row) { ?>
                     <option><span><?= $row['pincode_code'] ?></span></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                  <button class="close-style search-close">
                  <i class="icon-top"></i>
                  <i class="icon-bottom"></i>
                  </button>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-3 col-lg-4">
                  <div class="header-info mt-30 pl-15">
                     <?php if(!empty($_SESSION['user_id'])){ ?>
                        <div class="row">
                        <div class="login-profile color-white pt-10">
                           <div class="col-lg-6">
                              <span class="font17 mt-4"><?= $_SESSION['user_name'] ?></span>
                              <p class="font16"><?= $_SESSION['user_phone'] ?></p>
                              <p class="font16"><?= $_SESSION['user_email'] ?></p>
                           </div>
                           <div class="col-lg-6">
                              <span class="font16 text-decoration-underline" data-bs-toggle="offcanvas" data-bs-target=".offcanvasRight-editprofile" aria-controls="offcanvasRight">Edit</span>
                           </div>
                        </div>
                     </div>
                     <?php }else{ ?>
                     <ul>
                        <li><span>Hello..!</span><small>please login/signup</small></li>
                        <li><button class="btn btn-sm" onclick="funLogin();" aria-controls="offcanvasRight"> Log in</button></li>
                     </ul>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <div class="border mt-30"></div>
            <div class="mobile-header-content-area">
               <div class="mobile-menu-wrap mobile-header-border">
                  <!-- mobile menu start -->
                  <nav>
                     <ul class="mobile-menu">
                        <li>
                           <a class="active" href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <li class="menu-item-has-children">
                           <span class="menu-expand"></span><a class="" href="<?php echo base_url() ?>sell-old-mobile-phone">Sell Phone </a>
                           <ul class="dropdown">
                              <li>
                                 <a href="<?php echo base_url() ?>">
                                    <h5>Top Brands</h5>
                                 </a>
                              </li>
                              <hr>
                                <?php if(!empty($this->home_brands)){ ?>
                                     <?php foreach($this->home_brands as $val){ ?>
                              <li><a href="<?php echo base_url() ?>sell-mobile-phone/<?= $val['brand_url'] ?>"><?= $val['brand_name'] ?></a></li>
                              <?php } ?>
                              <?php } ?>
                           </ul>
                        </li>
                        <?php if(!empty($_SESSION['user_id'])){ ?>
                        <li class="menu-item-has-children">
                           <span class="menu-expand"></span><a class="" href="#">Setting </a>
                           <ul class="dropdown">
                              <li><a href="<?= base_url() ?>dashboard#address" target="_BLANK">Manage Address</a></li>
                              <li><a href="<?= base_url() ?>dashboard#saved-payments" target="_BLANK">Manage Payments</a></li>
                           </ul>
                        </li>
                        <?php } ?>
                        <li class="menu-item-has-children">
                           <span class="menu-expand"></span><a href="<?php echo base_url() ?>web/comming_soon">Buy Phone</a>
                           <ul class="dropdown">
                              <li>
                                 <a href="<?php echo base_url() ?>web/comming_soon">
                                    <h5>More In Buy Phone</h5>
                                 </a>
                              </li>
                              <hr>
                              <li><a href="<?php echo base_url() ?>web/comming_soon">Refurbished Phones</a></li>
                           </ul>
                        </li>
                        <li class="menu-item-has-children">
                           <span class="menu-expand"></span><a class="<?php echo base_url() ?>web/store" href="<?php echo base_url() ?>">Rephone Store </a>
                           <ul class="dropdown">
                              <li>
                                 <a href="#">
                                    <h5>More in Rephone Stores</h5>
                                 </a>
                              </li>
                              <hr>
                              <?php if(!empty($this->store_city)){ ?>
                                     <?php foreach($this->store_city as $val){ ?>
                              <li><a href="<?= base_url() ?>web/store/<?= $val['city_name'] ?>"><?= $val['city_name'] ?></a></li>
                              <?php } ?>
                              <?php } ?>
                           </ul>
                        </li>
                        <li>
                           <a href="<?php echo base_url() ?>about-us">About Us</a>
                        </li>
                        <li>
                           <a href="<?= base_url() ?>contact-us">Contact</a>
                        </li>
                     </ul>
                  </nav>
                  <!-- mobile menu end -->
               </div>
               <div class="mobile-header-info-wrap mobile-header-border">
                  <div class="single-mobile-header-info mt-30">
                     <a  href="<?= base_url() ?>contact-us"> Our location </a>
                  </div>
               
                  <div class="single-mobile-header-info">
                     <a href="#">(+01) - 2345 - 6789 </a>
                  </div>
               </div>
               <div class="mobile-social-icon">
                  <h5 class="mb-15 text-grey-4">Follow Us</h5>
                  <a href="#"><img src="<?php echo base_url() ?>assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                  <a href="#"><img src="<?php echo base_url() ?>assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                  <a href="#"><img src="<?php echo base_url() ?>assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                  <a href="#"><img src="<?php echo base_url() ?>assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                  <a href="#"><img src="<?php echo base_url() ?>assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
               </div>
            </div>
         </div>
      </div>


      <script>
         function funLogin(){
            
            $.ajax({
                        url: base_url+'web/check_session',
                        type: 'post',
                        dataType: 'json',
                        data: '',
                        success:function(response){
                           if(response.login=='1'){
                              location.replace(base_url + "dashboard")
                                
                           }else if(response.login=='0'){
                              $(".offcanvasRight-login").offcanvas("show");
                           }
                           
                        }
                        
                  });

            
         }

    $(function(){
      // bind change event to select
      $('.brand_dynamic').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
      </script>