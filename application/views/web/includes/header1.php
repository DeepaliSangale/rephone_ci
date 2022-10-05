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

      
      <header class="header-area header-style-3 header-height-2">
         <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
           <!-- <div class="container">-->
               <div class="row">
                  <div class="col-lg-7">
                     <div class="header-wrap">
                        <div class="logo logo-width-1" style="background-color: white;border:1px solid;border-radius: 4px;">
                           <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/site_img/logo/rephone-logo.png" alt="logo"></a>
                        </div>
                        <div class="header-right">
                           <div class="search-style-2">
                              <form>
                              <select class="select-active brand_dynamic">
                                    <option value="">All Brands</option>
                                    <?php foreach($this->home_brands as $val){ ?>
                                    <option value="<?php echo base_url() ?>sell-mobile-phone/<?= $val['brand_url'] ?>"><?= $val['brand_name'] ?></option>
                                    <?php } ?>
                                   
                                </select>
                                 <input type="text" placeholder="Search your Brands or Model" class="search_model">
                               
                               
                              </form>
                             
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5">
                     <div class="row">
                        <div class="col-lg-7 mt-15">
                              <div class="header-nav d-none d-lg-flex">
                                 <div class="main-menu  main-menu-padding-1 main-menu-lh-4 d-none d-lg-block mt-5 font16 fw-600">
                                    <nav class="pinclass">
                                       <ul>
                                          <li>
                                             <span><i class="fi-rs-marker font16 color-white marker-desk mr-10"></i></span><span class="default_pincode mr-5 color-white"><?= (isset($_SESSION['default_pincode'])) ? $_SESSION['default_pincode'] : 'Select your pincode' ?> </span> <i class="fi-rs-angle-down color-white"></i> 
                                             <ul class="sub-menu">
                                             <?php foreach ($l_pincodes as $key => $row) { ?>
                                                <li class="hover-up media-body"><span><?= $row['pincode_code'] ?></span></li>
                                             <?php } ?>
                                             </ul>
                                          </li>
                                       </ul>
                                    </nav>
                                 </div>
                              </div>
                              
                        </div>
                        <div class="col-lg-5 mt-15">
                           <?php if(!empty($_SESSION['user_id'])){ ?>
                              <div class="header-nav d-none d-lg-flex">
                              <div class="main-menu  main-menu-padding-1 main-menu-lh-4 d-none d-lg-block">
                                 <nav class="userclass">
                                    <ul>
                                       <li>
                                          <a class="" href="<?= base_url() ?>dashboard/"><span class="color-white"><i class="fi-rs-user mr-10 pl-5 font16 color-white marker-desk"> </i> <?= $_SESSION['user_name'] ?></span><i class="fi-rs-angle-down color-white font16"></i></a>
                                          <ul class="sub-menu">
                                             <li class="hover-up"><a href="<?= base_url() ?>dashboard#orders" target="_BLANK">Orders</a></li>
                                             <li class="hover-up"><a href="<?= base_url() ?>dashboard#saved-payments" target="_BLANK">Saved Payments</a></li>
                                             <li class="hover-up"><a href="<?= base_url() ?>dashboard#address" target="_BLANK">Saved Address</a></li>
                                             <li class="hover-up"><a href="<?= base_url() ?>web/logout">Logout</a></li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </nav>
                              </div>
                           </div>
                          <?php }else{ ?>
                           <button type="button" class="btn btn-primary p-10" onclick="funLogin();" aria-controls="offcanvasRight"><span> Sign in</span></button>
                           <?php } ?>
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
                           <span class="menu-expand"></span><a class="" href="sell_old_mobile_phone.html">Sell Phone </a>
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