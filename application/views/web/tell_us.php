<input type="hidden" id="product_id" value="<?= $product_data->p_id ?>">
 <!-- main start here----------------------------->
 <main class="main" id="mainWindow">
         <section class="mt-30 mb-50">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8">
                     <!-----Queastion Yes No Window------------------------------------>   
                     <div class="row custome-radio product-grid-3 border border-radius-10" id="QuestionWindow">
                        <h1 class="text-center mt-30">Tell us a few things about your device!</h1>
                        <?php $i=1; foreach($tellus_qsn as $val){ ?>
                        <div class="row">
                            <div class="col-lg-12 mt-30">
                                <h5 class="font16-14"><?= $i++ ?>.<?= $val['qsn_name'] ?></h5>
                                <p class="p-10 text-muted"><?= $val['qsn_desc'] ?></p>
                                <br>
                                <div class="quesn-wrap font16 ml-10 radi-btn" >
                                    <input type="radio" class="btn-check cb" name="btnradio<?= $val['id'] ?>" data-name="<?= $val['yes_checked_value'] ?>" data-id="<?= $val['id'] ?>" value="Yes" id="btnradio_yes_<?= $val['id'] ?>">
                                    <label class="form-check-label lbl-radi hover-up" for="btnradio_yes_<?= $val['id'] ?>">Yes</label>
                                    <input type="radio" class="btn-check cb" name="btnradio<?= $val['id'] ?>" data-name="<?= $val['no_checked_value'] ?>" data-id="<?= $val['id'] ?>" value="No" id="btnradio_no_<?= $val['id'] ?>">
                                    <label class="form-check-label lbl-radi hover-up" for="btnradio_no_<?= $val['id'] ?>">No</label>
                                </div>
                            </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                           <div class="col-lg-4"> </div>
                           <div class="col-lg-4">
                              <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="validate_qsn_form(<?= $val['id'] ?>);">Continue <i class="fi-rs-arrow-right"></i></span>
                           </div>
                           <div class="col-lg-4"></div>
                        </div>
                     </div>
                     <!----//Queastion Yes No Window----------------------------------->  
                     
                      <!----Screen Condition-----------------------------------> 
                      <div class="row product-grid-3 border border-radius-10" id="ScreenCondWindow" style="display:none;">
                        <h1 class="text-center mt-30">Tell us more about your device's screen defects</h1>
                        <?php if(!empty($sc_qsn_dps)){ ?>
                        <p class="mt-30 c-black">Dead Pixels/Spots on Screen</p>
                        <p class="text-muted">Check your device's screen for visible spots</p>
                        <?php } ?>
                        <div class="row box-scond">
                        <?php foreach($sc_qsn_dps as $val){ ?>                      
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <div class="product-cart-wrap mb-10 mt-30">
                                 <div class="product-img-action-wrap q-scond">
                                 <label class="form-check-label  hover-up" for="btnradio_scond_<?php echo $val['id'] ?>">
                                    <input type="radio"  class="k-checkbox1 dpsradio" data-id="<?= $val['id'] ?>" name="dps1" data-name="<?= $val['qsn_name'] ?>" id="btnradio_scond_<?php echo $val['id'] ?>">
                                    <img src="<?= base_url() ?>assets/uploads/screen_cond/<?= $val['image'] ?>" alt="<?= $val['qsn_name'] ?>" class="d-block rounded mx-auto">
                                 <p class="fonttell bg-gray1 border-radius-10 p-10 text-center"><?php echo $val['qsn_name'] ?></p>
                                 </label>
                                 </div>
                              </div>
                           </div>
                         <?php } ?>
                        </div>
                        <?php if(!empty($sc_qsn_vls)){ ?>
                        <p class="mt-30 c-black">Visible Lines on Screen</p>
                        <p class="text-muted">Check your device's screen for visible lines</p>
                        <?php } ?>
                        <div class="row box-scond2">
                        <?php foreach($sc_qsn_vls as $val){ ?>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                           <div class="product-cart-wrap mb-10 mt-30">
                              <div class="product-img-action-wrap q-scond">
                                <label class="form-check-label  hover-up" for="btnradio_scond_<?php echo $val['id'] ?>">
                                 <input type="radio"  class="k-checkbox1 vlsradio" data-id="<?= $val['id'] ?>" name="vls2" data-name="<?= $val['qsn_name'] ?>" id="btnradio_scond_<?php echo $val['id'] ?>">
                                 <img src="<?= base_url() ?>assets/uploads/screen_cond/<?= $val['image'] ?>" alt="<?= $val['qsn_name'] ?>" class="d-block rounded mx-auto">
                                <p class="fonttell bg-gray1 border-radius-10 p-10 text-center"><?php echo $val['qsn_name'] ?></p>
                              </label>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                        </div>
                        <?php if(!empty($sc_qsn_spc)){ ?>
                        <p class="mt-30 c-black">Screen Physical Condition</p>
                        <p class="text-muted">Check physical condition of Display Screen</p>
                        <?php } ?>
                        <div class="row box-scond3">
                           <?php foreach($sc_qsn_spc as $val){ ?>
                              <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <div class="product-cart-wrap mb-10 mt-30">
                                 <div class="product-img-action-wrap q-scond">
                                 <label class="form-check-label  hover-up" for="btnradio_scond_<?php echo $val['id'] ?>">
                                    <input type="radio"  class="k-checkbox1 spcradio" data-id="<?= $val['id'] ?>" name="spc3" data-name="<?= $val['qsn_name'] ?>" id="btnradio_scond_<?php echo $val['id'] ?>">
                                    <img src="<?= base_url() ?>assets/uploads/screen_cond/<?= $val['image'] ?>" alt="<?= $val['qsn_name'] ?>" class="d-block rounded mx-auto">
                                 <p class="fonttell bg-gray1 border-radius-10 p-10 text-center"><?php echo $val['qsn_name'] ?></p>
                                 </label>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                        </div>
                        <div class="row">
                           <div class="col-3 d-none d-lg-block"></div>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">  <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="tellus_back();"><i class="fi-rs-arrow-left"></i>Back </span></div>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="body_problem();">Continue <i class="fi-rs-arrow-right"></i></span>
                           </div>
                        </div>
                     </div>
                     <!----//Screen Condition-----------------------------------------------> 

                      <!----Body Defects-----------------------------------> 
                      <div class="row product-grid-3 border border-radius-10" id="BodyCondWindow" style="display:none;">
                        <h1 class="text-center mt-30">Tell us more about your device's body defects</h1>

                        <?php if(!empty($bd_qsn_sopb)){ ?>
                           <p class="mt-30 c-black">Scratches on Phone Body</p>
                           <p class="text-muted">Check for scratches on phone body</p>
                        <?php } ?>

                        <div class="row box-body">
                        <?php foreach($bd_qsn_sopb as $val){ ?>                      
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <div class="product-cart-wrap mb-10 mt-30">
                                 <div class="product-img-action-wrap q-scond">
                                 <label class="form-check-label  hover-up" for="btnradio_body_<?php echo $val['id'] ?>">
                                    <input type="radio"  class="k-checkbox1 sopbradio" data-id="<?= $val['id'] ?>" name="sopb" data-name="<?= $val['qsn_name'] ?>" id="btnradio_body_<?php echo $val['id'] ?>">
                                    <img src="<?= base_url() ?>assets/uploads/body_defects/<?= $val['image'] ?>" alt="<?= $val['qsn_name'] ?>" class="d-block rounded mx-auto">
                                 <p class="fonttell bg-gray1 border-radius-10 p-10 text-center"><?php echo $val['qsn_name'] ?></p>
                                 </label>
                                 </div>
                              </div>
                           </div>
                         <?php } ?>
                        </div>
                           
                        <?php if(!empty($bd_qsn_dopb)){ ?>
                        <p class="mt-30 c-black">Dents on Phone Body</p>
                        <p class="text-muted">Check your dents on phone body</p>
                        <?php } ?>
                        <div class="row box-body2">
                        <?php foreach($bd_qsn_dopb as $val){ ?>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                           <div class="product-cart-wrap mb-10 mt-30">
                              <div class="product-img-action-wrap q-scond">
                                <label class="form-check-label  hover-up" for="btnradio_body_<?php echo $val['id'] ?>">
                                 <input type="radio"  class="k-checkbox1 dopbradio" data-id="<?= $val['id'] ?>" name="dopb" data-name="<?= $val['qsn_name'] ?>" id="btnradio_body_<?php echo $val['id'] ?>">
                                 <img src="<?= base_url() ?>assets/uploads/body_defects/<?= $val['image'] ?>" alt="<?= $val['qsn_name'] ?>" class="d-block rounded mx-auto">
                                <p class="fonttell bg-gray1 border-radius-10 p-10 text-center"><?php echo $val['qsn_name'] ?></p>
                              </label>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                        </div>

                        <?php if(!empty($bd_qsn_psbpc)){ ?>
                        <p class="mt-30 c-black">Phone Side/Back Panel Condition</p>
                        <p class="text-muted">Check your device's side & back panels</p>
                        <?php } ?>
                        <div class="row box-body3">
                           <?php foreach($bd_qsn_psbpc as $val){ ?>
                              <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <div class="product-cart-wrap mb-10 mt-30">
                                 <div class="product-img-action-wrap q-scond">
                                 <label class="form-check-label  hover-up" for="btnradio_body_<?php echo $val['id'] ?>">
                                    <input type="radio"  class="k-checkbox1 psbpcradio" data-id="<?= $val['id'] ?>" name="psbpc" data-name="<?= $val['qsn_name'] ?>" id="btnradio_body_<?php echo $val['id'] ?>">
                                    <img src="<?= base_url() ?>assets/uploads/body_defects/<?= $val['image'] ?>" alt="<?= $val['qsn_name'] ?>" class="d-block rounded mx-auto">
                                 <p class="fonttell bg-gray1 border-radius-10 p-10 text-center"><?php echo $val['qsn_name'] ?></p>
                                 </label>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                        </div>

                        <?php if(!empty($bd_qsn_bplc)){ ?>
                        <p class="mt-30 c-black">Bent Phone or Loose Screen</p>
                        <p class="text-muted">Check if your phone is bent or display screen is loose</p>
                        <?php } ?>
                        <div class="row box-body4">
                           <?php foreach($bd_qsn_bplc as $val){ ?>
                              <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <div class="product-cart-wrap mb-10 mt-30">
                                 <div class="product-img-action-wrap q-scond">
                                 <label class="form-check-label  hover-up" for="btnradio_body_<?php echo $val['id'] ?>">
                                    <input type="radio"  class="k-checkbox1 bplcradio" data-id="<?= $val['id'] ?>" name="bplc" data-name="<?= $val['qsn_name'] ?>" id="btnradio_body_<?php echo $val['id'] ?>">
                                    <img src="<?= base_url() ?>assets/uploads/body_defects/<?= $val['image'] ?>" alt="<?= $val['qsn_name'] ?>" class="d-block rounded mx-auto">
                                 <p class="fonttell bg-gray1 border-radius-10 p-10 text-center"><?php echo $val['qsn_name'] ?></p>
                                 </label>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                        </div>
                        <div class="row">
                           <div class="col-3 d-none d-lg-block"></div>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">  <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="body_back();"><i class="fi-rs-arrow-left"></i>Back </span></div>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="functional_problem();">Continue <i class="fi-rs-arrow-right"></i></span>
                           </div>
                        </div>
                     </div>
                     <!----//Body Defects Condition-----------------------------------------------> 

                     <!----Functional or Physical Problems-----------------------------------> 
                     <div class="row product-grid-3 border border-radius-10" id="TellWindow" style="display:none;">
                        <h1 class="text-center mt-30">Functional or Physical Problems</h1>
                        <?php foreach($mst_qsn as $val){ ?>
                        <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                           <div class="product-cart-wrap mb-10 mt-30" id="myDIV<?= $val['q_id'] ?>" onclick="setcheckVal(<?= $val['q_id'] ?>)">
                              <div class="product-img-action-wrap">
                                 <input type="checkbox"  class="k-checkbox1" id="my-checkbox<?= $val['q_id'] ?>" name="fun_prob_check" data-name="<?= $val['q_title'] ?>">
                                 <img src="<?= base_url() ?>assets/uploads/question/<?= $val['q_image'] ?>" alt="<?= $val['q_title'] ?>" class="d-block rounded mx-auto">
                              </div>
                              <p class="fonttell bg-gray1 p-10 text-center" id="p<?= $val['q_id'] ?>"><span><?= $val['q_title'] ?></span></p>
                           </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                           <div class="col-3 d-none d-lg-block"></div>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">  <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="tellus_back();"><i class="fi-rs-arrow-left"></i>Back </span></div>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="doyou_have();">Continue <i class="fi-rs-arrow-right"></i></span>
                           </div>
                        </div>
                     </div>
                     <!----//Functional or Physical Problems-----------------------------------------------> 
                       
                     <!--------------------Do You Have following----------------------------------------------->
                     <div class="row product-grid-3 border " id="DoHaveWindow" style="display:none;">
                        <h1 class="text-center mt-30">Do you have the following?</h1>
                        <?php if(!empty($p_accessories)){ ?>
                           <?php foreach($p_accessories as $val){ ?>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <div class="product-cart-wrap mb-10 mt-30" id="myDIVdo<?= $val['a_id'] ?>" onclick="setDoYouHaveVal(<?= $val['a_id'] ?>)">
                                 <div class="product-img-action-wrap">
                                    <input type="checkbox"  class="k-checkbox1" id="do-you<?= $val['a_id'] ?>" name="do_u_have[]" data-name="<?= $val['a_title'] ?>" title="1" value="<?= $val['a_id'] ?>">
                                    <img src="<?php echo base_url() ?>assets/uploads/accessories/<?= $val['a_image'] ?>" alt="<?= $val['a_title']; ?>" class="d-block rounded mx-auto">
                                 </div>
                                 <p class="fonttell-do bg-gray1 p-10 text-center" id="dohavep<?= $val['a_id'] ?>"><span><?= $val['a_title']; ?></span></p>
                              </div>
                           </div>
                           <?php } ?>
                        <?php } ?>                       
                        <div class="row">
                           <div class="col-3 d-none d-lg-block"></div>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">  <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="doyou_back();"><i class="fi-rs-arrow-left"></i>Back </span></div>
                           <div class="col-lg-3 col-md-3 col-6 col-sm-4">
                              <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="takeOrder();">Continue <i class="fi-rs-arrow-right"></i></span>
                           </div>
                        </div>
                     </div>
                     <!--------------------//end Do You Have following-------------------------------------------->
                        
                     <!----Product Age-----------------------------------> 
                           <div class="row product-grid-3 border border-radius-10" id="AgeWindow" style="display:none;">
                              <h1 class="text-center mt-30 mb-40">What is your mobile age?</h1>
                              <div class="row">
                                 <div class="col-lg-12 col-md-12 col-12 col-sm-4 mt-10">
                                    <div class="custome-radio font16 ml-10 radi-btn" >
                                       <?php if(!empty($p_age)){ ?>
                                          <?php foreach($p_age as $val){ ?>
                                          <input type="radio" class="btn-check cb-age" name="mobile_age" data-id="<?php echo $val['age_id'] ?>" data-name="<?php echo $val['age_title'] ?>" value="Yes" id="btnradio_age_<?php echo $val['age_id'] ?>">
                                          <label class="form-check-label lbl-radi hover-up" for="btnradio_age_<?php echo $val['age_id'] ?>"><?php echo $val['age_title'] ?></label>
                                          <?php } ?>
                                          <?php } ?>
                                         
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-3 d-none d-lg-block"></div>
                                 <div class="col-lg-3 col-md-3 col-6 col-sm-4 mt-40">  <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="doyou_age_back();"><i class="fi-rs-arrow-left"></i>Back </span></div>
                                 <div class="col-lg-3 col-md-3 col-6 col-sm-4 mt-40">
                                    <span  class="get-exact-green text-center hover-up mb-10 d-block rounded mx-auto" onclick="validate_mobile_age()">Continue <i class="fi-rs-arrow-right"></i></span>
                                 </div>
                              </div>
                           </div>
                     <!----//Mobile Age---------------------------------> 

                  </div>
                  <!--//lg-8-->
                  <div class="col-lg-4 product-sidebar sticky-sidebar">
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
                     <!-- Device Evaluation-->
                     <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey">
                        <div class="widget-header position-relative mb-20 pb-10">
                           <h5 class="widget-title mb-5">Device Evaluation</h5>
                           <div class="bt-1 border-color-1"></div>
                        </div>
                        <!------Device Details-------------->
                        <div class="single-post clearfix dv-eval">
                           <p>Device Details</p>
                           <ul class="font12 list-dev-que" id="list-dev-que">
                           </ul>
                        </div>

                         <!--- Screen Condition----------->
                        <div class="single-post clearfix dv-eval" id="ul-scond" style="display:none;">
                           <p>Screen Condition</p>
                           <ul class="font12 list-screen-dps" id="list-screen-dps">
                           </ul>
                           <ul class="font12 list-screen-vls" id="list-screen-vls">
                           </ul>
                           <ul class="font12 list-screen-spc" id="list-screen-spc">
                           </ul>
                        </div>

                         <!--- Body Condition----------->
                         <div class="single-post clearfix dv-eval" id="ul-body" style="display:none;">
                           <p>Phone's Overall Condition</p>
                           <ul class="font12 list-body-sopb" id="list-body-sopb">
                           </ul>
                           <ul class="font12 list-body-dopb" id="list-body-dopb">
                           </ul>
                           <ul class="font12 list-body-psbpc" id="list-body-psbpc">
                           </ul>
                           <ul class="font12 list-body-bplc" id="list-body-bplc">
                           </ul>
                        </div>

                        <!---funtional problem-->
                        <div class="single-post clearfix dv-eval">
                           <p>Functional Condition</p>
                           <ul class="font12" id="list-dev-det">
                           </ul>
                        </div>

                        <!--- do you have----------->
                        <div class="single-post clearfix dv-eval">
                           <p>Do You have Following</p>
                           <ul class="font12" id="list-do-have">
                           </ul>
                        </div>

                        <!--- Product Age----------->
                        <div class="single-post clearfix dv-eval" id="p-age" style="display:none;">
                           <p>Mobile Age</p>
                           <ul class="font12 list-prod-age" id="list-prod-age">
                           </ul>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
         <form  style="display:none;">
            <input type="hidden" name="p_id" value="<?= $product_data->p_id ?>">
               <p>tellus</p>
               <ul class="calc_tell_us" id="calc_tell_us">
            </ul>
            <p>Screen Condition</p>
               <ul class="calc_screen_dps" id="calc_screen_dps">                  
            </ul>
            <ul class="calc_screen_vls" id="calc_screen_vls">
            </ul>
            <ul class="calc_screen_spc" id="calc_screen_spc">
            </ul>
            <p>Body Defects</p>
               <ul class="calc_body_sopb" id="calc_screen_sopb">
               </ul>
               <ul class="calc_body_dopb" id="calc_body_dopb">
               </ul>
               <ul class="calc_body_psbp" id="calc_body_psbp">
               </ul>
               <ul class="calc_body_bplc" id="calc_body_bplc">
               </ul>
            <p>fpp</p>
               <ul class="calc_fpp" id="calc_fpp">
            </ul>
            <p>doyou-have following</p>
               <ul class="calc_dohave" id="calc_dohave">
            </ul>
               <p>mobile age</p>
               <ul class="calc_age" id="calc_age">
            </ul>
         </form>

        <form id="dvcRptForm" method="post" action="<?php echo base_url() ?>web/save_device_report" style="display:none;">
               <!---device report form----->
               <ul class="dv_report">
                        </ul>
                        <ul class="dv_report_dps">
                        </ul>
                        <ul class="dv_report_vls">
                        </ul>
                        <ul class="dv_report_spc">
                        </ul>
                     <!--body defect form-->
                        <ul class="dv_report_sopb">
                        </ul>
                        <ul class="dv_report_dopb">
                        </ul>
                        <ul class="dv_report_psbpc">
                        </ul>
                        <ul class="dv_report_bplc">
                        </ul>
            <!---///device report form----->
        </form>
        
      <script>
         
         function ScreenCondWindow(){
            scroll_screen();
              document.getElementById("QuestionWindow").style.display = "none";
              document.getElementById("ScreenCondWindow").style.display = "flex";
              document.getElementById("ul-scond").style.display = "block";
              document.getElementById("BodyCondWindow").style.display = "none";
              document.getElementById("ul-body").style.display = "none";
          }
          function BodyWindow(){
              scroll_screen();
              document.getElementById("TellWindow").style.display = "none";
              document.getElementById("QuestionWindow").style.display = "none"; //tell us
              document.getElementById("BodyCondWindow").style.display = "flex";
              document.getElementById("ul-body").style.display = "block";
              
          }
          function body_problem(){
                                 <?php if(!empty($sc_qsn_dps)){ ?>
                                   if($('input[name="dps1"]:checked').length === 0) {
                                   
                                       Swal.fire({
                                             position: 'top',
                                             icon: 'error',
                                             title: '<h4>Please make selection for Dead Pixels/Spots on Screen</h4>',
                                             showConfirmButton: false,
                                             timer: 1500
                                             })
                                          return false;                                  
                                    }
                                    <?php } ?>
                                    <?php if(!empty($sc_qsn_vls)){ ?>
                                    if($('input[name="vls2"]:checked').length === 0) {
                                    Swal.fire({
                                          position: 'top',
                                          icon: 'error',
                                          title: '<h4>Please make selection for visible lines on screen</h4>',
                                          showConfirmButton: false,
                                          timer: 1500
                                          })
                                       return false;
                                    }
                                    <?php } ?>
                                    <?php if(!empty($sc_qsn_spc)){ ?>
                                    if($('input[name="spc3"]:checked').length === 0) {
                                    Swal.fire({
                                          position: 'top',
                                          icon: 'error',
                                          title: '<h4>Please make selection for Screen Physical Condition</h4>',
                                          showConfirmButton: false,
                                          timer: 1500
                                          })
                                       return false;
                                    }
                                    <?php } ?>
                              var valuebodychk = $("input:radio[name=btnradio3]:checked").val();
                              var valuechk = $("input:radio[name=btnradio2]:checked").val();
                              
                              if(valuebodychk=='Yes'){
                                     scroll_screen();
                                    document.getElementById("BodyCondWindow").style.display = "flex";
                                    document.getElementById("ul-body").style.display = "block";
                                    document.getElementById("ScreenCondWindow").style.display = "none";
                                    document.getElementById("TellWindow").style.display = "none";
                                    
                                   
                              }
                              
                              if(valuebodychk=='Yes' && valuechk=='Yes'){
                                     scroll_screen();
                                    document.getElementById("BodyCondWindow").style.display = "block";
                                    document.getElementById("ul-body").style.display = "block";
                                    document.getElementById("ScreenCondWindow").style.display = "none";
                                  
                                   
                              }
                              if(valuebodychk=='No' && valuechk=='Yes'){
                                    clear_bodyWindow();
                                    scroll_screen();
                                    document.getElementById("ScreenCondWindow").style.display = "none";
                                    document.getElementById("TellWindow").style.display = "flex";                                   
                                   
                              }
                              if(valuebodychk=='Yes' && valuechk=='No'){
                                     scroll_screen();
                                    document.getElementById("BodyCondWindow").style.display = "flex";
                                    document.getElementById("ul-body").style.display = "block";
                                    document.getElementById("ScreenCondWindow").style.display = "none";
                                    document.getElementById("ul-scond").style.display = "none";
                                    clear_screen_defectwindow();
                                    
                              }
                              
                           }

         function functional_problem(){
              document.getElementById("QuestionWindow").style.display = "none";  
             
              var valuechk = $("input:radio[name=btnradio2]:checked").val();
              var valuebodychk = $("input:radio[name=btnradio3]:checked").val();
                           if(valuechk=='No' && valuebodychk=='No'){
                              scroll_screen();
                              document.getElementById("TellWindow").style.display = "flex";
                           }
                           if(valuechk=='Yes' && valuebodychk=='Yes'){
                              scroll_screen();
                              document.getElementById("ScreenCondWindow").style.display = "flex";
                              document.getElementById("ul-scond").style.display = "block";
                              document.getElementById("BodyCondWindow").style.display = "flex";
                              document.getElementById("ul-body").style.display = "block";
                              document.getElementById("TellWindow").style.display = "none";
                           }
                          if(valuechk=='No' && valuebodychk=='Yes'){
                              scroll_screen();
                              document.getElementById("ScreenCondWindow").style.display = "flex";
                              document.getElementById("ul-scond").style.display = "block";
                           }
                          
                           if(valuechk=='No' && valuebodychk=='Yes'){
                              clear_screen_defectwindow();
                              scroll_screen();
                              document.getElementById("BodyCondWindow").style.display = "flex";
                              document.getElementById("ul-body").style.display = "block";
                             
                           }
                           if(valuechk=='Yes' && valuebodychk=='No'){
                              document.getElementById("ScreenCondWindow").style.display = "none";
                              document.getElementById("ul-scond").style.display = "none";                             
                              clear_bodyWindow();
                           }

                           
                           if(valuechk=='Yes'){     
                                                      
                              <?php if(!empty($sc_qsn_dps)){ ?>
                                   if($('input[name="dps1"]:checked').length === 0) {
                                   
                                       Swal.fire({
                                             position: 'top',
                                             icon: 'error',
                                             title: '<h4>Please make selection for Dead Pixels/Spots on Screen</h4>',
                                             showConfirmButton: false,
                                             timer: 1500
                                             })
                                          return false;                                  
                                    }
                                    <?php } ?>
                                    <?php if(!empty($sc_qsn_vls)){ ?>
                                    if($('input[name="vls2"]:checked').length === 0) {
                                    Swal.fire({
                                          position: 'top',
                                          icon: 'error',
                                          title: '<h4>Please make selection for visible lines on screen</h4>',
                                          showConfirmButton: false,
                                          timer: 1500
                                          })
                                       return false;
                                    }
                                    <?php } ?>
                                    <?php if(!empty($sc_qsn_spc)){ ?>
                                    if($('input[name="spc3"]:checked').length === 0) {
                                    Swal.fire({
                                          position: 'top',
                                          icon: 'error',
                                          title: '<h4>Please make selection for Screen Physical Condition</h4>',
                                          showConfirmButton: false,
                                          timer: 1500
                                          })
                                       return false;
                                    }
                                    <?php } ?>
                                    else{
                                       if(valuebodychk=='Yes'){
                                          document.getElementById("ScreenCondWindow").style.display = "none";
                                          BodyWindow();
                                       }else{
                                          scroll_screen();
                                         document.getElementById("TellWindow").style.display = "flex";
                                         document.getElementById("ScreenCondWindow").style.display = "none";
                                       }
                                    }
                           }
                           //body window
                           if(valuebodychk=='Yes'){
                              <?php if(!empty($bd_qsn_sopb)){ ?>
                              if($('input[name="sopb"]:checked').length === 0) {
                                    Swal.fire({
                                          position: 'top',
                                          icon: 'error',
                                          title: '<h4>Please select condition for Scratches on Phone Body</h4>',
                                          showConfirmButton: false,
                                          timer: 1500
                                          })
                                       return false;
                                    }
                                 <?php } ?>
                                 <?php if(!empty($bd_qsn_dopb)){ ?>
                                    if($('input[name="dopb"]:checked').length === 0) {
                                    Swal.fire({
                                          position: 'top',
                                          icon: 'error',
                                          title: '<h4>Please select condition for Dents on Phone Body</h4>',
                                          showConfirmButton: false,
                                          timer: 1500
                                          })
                                       return false;
                                    }
                                    <?php } ?>
                                    <?php if(!empty($bd_qsn_psbpc)){ ?>
                                    if($('input[name="psbpc"]:checked').length === 0) {
                                    Swal.fire({
                                          position: 'top',
                                          icon: 'error',
                                          title: '<h4>Please make selection for Phone Side/Back Panel Condition</h4>',
                                          showConfirmButton: false,
                                          timer: 1500
                                          })
                                       return false;
                                    }
                                    <?php } ?>
                                    <?php if(!empty($bd_qsn_bplc)){ ?>
                                    if($('input[name="bplc"]:checked').length === 0) {
                                    Swal.fire({
                                          position: 'top',
                                          icon: 'error',
                                          title: '<h4>Please make selection for Bent Phone or Loose Screen</h4>',
                                          showConfirmButton: false,
                                          timer: 1500
                                          })
                                       return false;
                                    }
                                    <?php } ?>
                                    if($('input[name="sopb"]:checked') && $('input[name="dopb"]:checked') && $('input[name="bplc"]:checked') && $('input[name="bplc"]:checked')){
                                        document.getElementById("TellWindow").style.display = "flex";
                                       document.getElementById("BodyCondWindow").style.display = "none";
                                    }
                                  

                           }
                        
                        
          }
          
          function scroll_screen(){
            window.scroll({
            top: 80, 
            behavior: 'smooth'});
          }
          function doyou_have(){
              scroll_screen();
              document.getElementById("DoHaveWindow").style.display = "flex";
              document.getElementById("TellWindow").style.display = "none";
          }
          function doyou_back(){
              scroll_screen();
              document.getElementById("DoHaveWindow").style.display = "none";
              document.getElementById("TellWindow").style.display = "flex";
          }
          function tellus_back(){
              scroll_screen();
              document.getElementById("QuestionWindow").style.display = "flex";
              document.getElementById("ScreenCondWindow").style.display = "none";
              document.getElementById("TellWindow").style.display = "none";
          }

          function body_back(){
              scroll_screen();
              document.getElementById("QuestionWindow").style.display = "flex";
              document.getElementById("BodyCondWindow").style.display = "none";
              document.getElementById("ScreenCondWindow").style.display = "none";
          }

          function doyou_age_back(){
               scroll_screen();
               document.getElementById("AgeWindow").style.display = "none";
               document.getElementById("DoHaveWindow").style.display = "flex";
          }

          function order_clack_window(){
           
               $.ajax({
                        url: base_url+'web/check_session',
                        type: 'post',
                        dataType: 'json',
                        data: '',
                        success:function(response){
                           if(response.login=='1'){
                              document.getElementById("mainWindow").style.display = "none";
                              document.getElementById("mainCalcWindow").style.display = "block";
                              flat_percent_value_calculation();
                              uncheckedChk();
                            
                                    var frm = $('#dvcRptForm');
                                    $.ajax({
                                       type: frm.attr('method'),
                                       url: frm.attr('action'),
                                       data: frm.serialize(),
                                       success: function (data) {
                                             console.log('Submission was successful.');
                                       },
                                       error: function (data) {
                                             console.log('An error occurred.');
                                             
                                       },
                                    });
                                
                           }else if(response.login=='0'){
                              $(".offcanvasRight-login").offcanvas("show");
                           }
                           
                        }
                        
                  });
            
          }
         
         
    //-------------screen Condition------------------------------------
            $(document).ready(function(){
               $('input:radio[name=dps1]').change(function(){
               
                  var $this = $(this);
                  $this.closest('.box-scond').find('div.highlight-scond').removeClass('highlight-scond');
                  $this.closest('.q-scond').addClass('highlight-scond');
               });
            });

            $(document).ready(function(){
               $('input:radio[name=vls2]').change(function(){
             
                  var $this = $(this);
                  $this.closest('.box-scond2').find('div.highlight-scond').removeClass('highlight-scond');
                  $this.closest('.q-scond').addClass('highlight-scond');
               });
            });

            $(document).ready(function(){
               $('input:radio[name=spc3]').change(function(){
             
                  var $this = $(this);
                  $this.closest('.box-scond3').find('div.highlight-scond').removeClass('highlight-scond');
                  $this.closest('.q-scond').addClass('highlight-scond');
               });
            });

        
            $('.dpsradio').click(function() {
                        $('ul.list-screen-dps').html("");
                        $('ul.calc_screen_dps').html("");
                        $('ul.dv_report_dps').html("");
                           if($(this).is(":checked")){
                           document.getElementById("list-screen-dps").innerHTML = '<li>'+$(this).data('name')+'</li>';
                           $('ul.dv_report_dps').append('<li><input type="text" name="screen_condition[]"  value="'+ $(this).data('name') +'"></li>')
                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_screen_condition',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),product_id:product_id},
                            success:function(response){
                               if(response.pq_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_screen_dps').append('<li class="screen_dps_type_'+calc_type+'">'+response.pq_value+'</li>')
                             // $('ul.calc_screen_cond').append('<li><input type="text" name="calc_age[]" class="age_type_'+calc_type+'" value="'+response.age_value+'"</li>')
                            }
                          });
                        }
                  });
                  $('.vlsradio').click(function() {
                        $('ul.list-screen-vls').html("");
                        $('ul.calc_screen_vls').html("");
                        $('ul.dv_report_vls').html("");
                           if($(this).is(":checked")){
                           document.getElementById("list-screen-vls").innerHTML = '<li>'+$(this).data('name')+'</li>';
                           $('ul.dv_report_vls').append('<li><input type="text" name="screen_condition[]"  value="'+ $(this).data('name') +'"></li>')
                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_screen_condition',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),product_id:product_id},
                            success:function(response){
                               if(response.pq_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_screen_vls').append('<li class="screen_vls_type_'+calc_type+'">'+response.pq_value+'</li>')
                             // $('ul.calc_screen_cond').append('<li><input type="text" name="calc_age[]" class="age_type_'+calc_type+'" value="'+response.age_value+'"</li>')
                            }
                          });
                        }
                  });

                  $('.spcradio').click(function() {
                        $('ul.list-screen-spc').html("");
                        $('ul.calc_screen_spc').html("");
                        $('ul.dv_report_spc').html("");
                           if($(this).is(":checked")){
                           document.getElementById("list-screen-spc").innerHTML = '<li>'+$(this).data('name')+'</li>';
                           $('ul.dv_report_spc').append('<li><input type="text" name="screen_condition[]"  value="'+ $(this).data('name') +'"></li>')

                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_screen_condition',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),product_id:product_id},

                            success:function(response){
                               if(response.pq_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_screen_spc').append('<li class="screen_spc_type_'+calc_type+'">'+response.pq_value+'</li>')
                             
                            }
                          });
                        }
                  });
 //-------------End screen Condition------------------------------------

//-------------Body defects------------------------------------
$(document).ready(function(){
               $('input:radio[name=sopb]').change(function(){
               
                  var $this = $(this);
                  $this.closest('.box-body').find('div.highlight-scond').removeClass('highlight-scond');
                  $this.closest('.q-scond').addClass('highlight-scond');
               });
            });

            $(document).ready(function(){
               $('input:radio[name=dopb]').change(function(){
             
                  var $this = $(this);
                  $this.closest('.box-body2').find('div.highlight-scond').removeClass('highlight-scond');
                  $this.closest('.q-scond').addClass('highlight-scond');
               });
            });

            $(document).ready(function(){
               $('input:radio[name=psbpc]').change(function(){
             
                  var $this = $(this);
                  $this.closest('.box-body3').find('div.highlight-scond').removeClass('highlight-scond');
                  $this.closest('.q-scond').addClass('highlight-scond');
               });
            });

            $(document).ready(function(){
               $('input:radio[name=bplc]').change(function(){
             
                  var $this = $(this);
                  $this.closest('.box-body4').find('div.highlight-scond').removeClass('highlight-scond');
                  $this.closest('.q-scond').addClass('highlight-scond');
               });
            });

        
                  $('.sopbradio').click(function() {
                  
                        $('ul.list-body-sopb').html("");
                        $('ul.calc_body_sopb').html("");
                        $('ul.dv_report_sopb').html("");
                           if($(this).is(":checked")){
                           document.getElementById("list-body-sopb").innerHTML = '<li>'+$(this).data('name')+'</li>';
                           $('ul.dv_report_sopb').append('<li><input type="text" name="body_condition[]"  value="'+ $(this).data('name') +'"></li>')
                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_body_defects',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),product_id:product_id},
                            success:function(response){
                               if(response.pq_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_body_sopb').append('<li class="body_sopb_'+calc_type+'">'+response.pq_value+'</li>')
                             // $('ul.calc_screen_cond').append('<li><input type="text" name="calc_age[]" class="age_type_'+calc_type+'" value="'+response.age_value+'"</li>')
                            }
                          });
                        }
                  });
                  $('.dopbradio').click(function() {
                        $('ul.list-body-dopb').html("");
                        $('ul.calc_body_dopb').html("");
                        $('ul.dv_report_dopb').html("");
                           if($(this).is(":checked")){
                           document.getElementById("list-body-dopb").innerHTML = '<li>'+$(this).data('name')+'</li>';
                           $('ul.dv_report_dopb').append('<li><input type="text" name="body_condition[]"  value="'+ $(this).data('name') +'"></li>')
                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_body_defects',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),product_id:product_id},
                            success:function(response){
                               if(response.pq_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_body_dopb').append('<li class="body_dopb_'+calc_type+'">'+response.pq_value+'</li>')
                             // $('ul.calc_screen_cond').append('<li><input type="text" name="calc_age[]" class="age_type_'+calc_type+'" value="'+response.age_value+'"</li>')
                            }
                          });
                        }
                  });

                  $('.psbpcradio').click(function() {
                        $('ul.list-body-psbpc').html("");
                        $('ul.calc_body_psbpc').html("");
                        $('ul.dv_report_psbpc').html("");
                           if($(this).is(":checked")){
                           document.getElementById("list-body-psbpc").innerHTML = '<li>'+$(this).data('name')+'</li>';
                           $('ul.dv_report_psbpc').append('<li><input type="text" name="body_condition[]"  value="'+ $(this).data('name') +'"></li>')
                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_body_defects',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),product_id:product_id},
                            success:function(response){
                               if(response.pq_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_body_psbpc').append('<li class="body_psbpc_'+calc_type+'">'+response.pq_value+'</li>')
                             // $('ul.calc_screen_cond').append('<li><input type="text" name="calc_age[]" class="age_type_'+calc_type+'" value="'+response.age_value+'"</li>')
                            }
                          });
                        }
                  });

                  $('.bplcradio').click(function() {
                        $('ul.list-body-bplc').html("");
                        $('ul.calc_body_bplc').html("");
                        $('ul.dv_report_bplc').html("");
                           if($(this).is(":checked")){
                           document.getElementById("list-body-bplc").innerHTML = '<li>'+$(this).data('name')+'</li>';
                           $('ul.dv_report_bplc').append('<li><input type="text" name="body_condition[]"  value="'+ $(this).data('name') +'"></li>')
                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_body_defects',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),product_id:product_id},
                            success:function(response){
                               if(response.pq_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_body_bplc').append('<li class="body_bplc_'+calc_type+'">'+response.pq_value+'</li>')
                             // $('ul.calc_screen_cond').append('<li><input type="text" name="calc_age[]" class="age_type_'+calc_type+'" value="'+response.age_value+'"</li>')
                            }
                          });
                        }
                  });

 //-------------End Body defects------------------------------------


          //functional physical problem
          function setcheckVal(id){
                let toggleButton = document.getElementById("my-checkbox"+id);
                if (toggleButton.checked == true) {
                  toggleButton.checked = false;
                   document.getElementById("myDIV"+id).style.borderColor = "#8080800f";
                   document.getElementById("p"+id).style.color = "black";
                   document.getElementById("p"+id).style.backgroundColor = "#8080800f";
                   document.getElementById("my-checkbox"+id).value = "0";
                  
                   $("#my-checkbox"+id).each(function(){
                       if($(this).is(":checked")){
                           }
                           document.getElementById("func"+id).remove();
                           document.getElementById("calcfpp"+id).remove();
                           document.getElementById("dvcrep_func"+id).remove();
                      });
                  
                } else {
                   toggleButton.checked = true;
                   document.getElementById("myDIV"+id).style.borderColor = "#ff6565";
                   document.getElementById("p"+id).style.color = "white";
                   document.getElementById("p"+id).style.backgroundColor = "#ff6565";
                   document.getElementById("my-checkbox"+id).value = "1";
                   
                     $("#my-checkbox"+id).each(function(){
                       
                       if($(this).is(":checked")){
                           $('ul#list-dev-det').append('<li id="func'+id+'">'+$(this).data('name')+'</li>');
                           $('ul.dv_report').append('<li><input type="text" id="dvcrep_func'+id+'" name="functional_problem[]"  value="'+ $(this).data('name') +'"></li>');
                             //functional or physical problem calculation
                             var product_id = $('#product_id').val();
                              $.ajax({
                                 url: base_url+'web/get_value_fpp',
                                 type: 'post',
                                 dataType: 'json',
                                 data: {id:id,product_id:product_id},
                                 success:function(response){
                                    if(response.fpp_type=='1'){
                                       var calc_type = 'percent';
                                    }else{
                                       var calc_type = 'flat';
                                    }
                                    $('ul.calc_fpp').append('<li id="calcfpp'+id+'" class="fpp_type_'+calc_type+'">'+response.fpp_value+'</li>')
                                   // $('ul.calc_fpp').append('<li><input type="text" name="calc_fpp[]" class="fpp_type_'+calc_type+'" value="'+response.fpp_value+'"</li>')
                                 }
                              });
                           }

                      });
                    
                     
                     

                     
               }
          }
         
          function setDoYouHaveVal(id){
                let toggleButton = document.getElementById("do-you"+id);
                if (toggleButton.checked == true) {
                  toggleButton.checked = false;
                   document.getElementById("myDIVdo"+id).style.borderColor = "#8080800f";
                   document.getElementById("dohavep"+id).style.color = "black";
                   document.getElementById("dohavep"+id).style.backgroundColor = "#8080800f";
                   document.getElementById("do-you"+id).value = "0";
                   $("#do-you"+id).each(function(){
                       if($(this).is(":checked")){
                           }
                           document.getElementById("lidou"+id).remove();
                           document.getElementById("dvcrep_doh"+id).remove();
                         
                           uncheckedChk();
                      });

                } else {
                  toggleButton.checked = true;
                   document.getElementById("myDIVdo"+id).style.borderColor = "#2e6739";
                   document.getElementById("dohavep"+id).style.color = "white";
                   document.getElementById("dohavep"+id).style.backgroundColor = "#2e6739";
                   document.getElementById("do-you"+id).value = "1";
                   $("#do-you"+id).each(function(){
                       if($(this).is(":checked")){
                           $('ul#list-do-have').append('<li id="lidou'+id+'">'+$(this).data('name')+'</li>')
                           $('ul.dv_report').append('<li><input type="text" id="dvcrep_doh'+id+'" name="do_you_have[]"  value="'+ $(this).data('name') +'"></li>');
                           }
                           uncheckedChk();
                      });
                   
               }
          }
              
        
                //Function to identify all the unchecked checkbox with title=1 acesssories
                  function uncheckedChk(){
                  var not_checked = []
                  var product_id = $('#product_id').val();
                  $("input[type='checkbox'][name='do_u_have[]'][title='1']:checked").each(function(){
                            document.getElementById("calc_dohave").innerHTML= "";
                      });

                  $("input[type='checkbox'][name='do_u_have[]'][title='1']:not(:checked)").each(function (){
                     not_checked.push($(this).val());
                  });
                  
                  //dou have acessoires calculation
                              $.ajax({
                                 url: base_url+'web/get_value_douahve',
                                 type: 'post',
                                 dataType: 'json',
                                 data: {id:not_checked,product_id:product_id},
                                 success:function(response){
                                    $.each(response, function(i, item) {
                                       if(item['pa_type']=='1'){
                                          var calc_type = 'percent';
                                       }else{
                                          var calc_type = 'flat';
                                       }
                                       $('ul.calc_dohave').append('<li id="calc-douhave" class="dou_type_'+calc_type+'">'+item['pa_value']+'</li>');
                                       //$('ul.calc_dohave').append('<li><input type="text" name="calc_doyou[]" class="dou_type_'+calc_type+'" value="'+item['pa_value']+'"</li>')
                                       });
                                  
                                 }
                              });
                  }
          
         // tell us question yes no radio first screen
               $('.cb').click(function() {
                        $('ul.list-dev-que').html("");
                        $('ul.calc_tell_us').html("");
                        $('ul.dv_report').html("");
                        $(".cb").each(function(){
                           if($(this).is(":checked")){
                           $('ul.list-dev-que').append('<li>'+$(this).data('name')+'</li>')
                           $('ul.dv_report').append('<li><input type="text" name="device_details[]"  value="'+ $(this).data('name') +'"></li>')
                           //calculation tell us
                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_tellus',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),value_type:this.value,product_id:product_id},
                            success:function(response){
                               if(response.tellus_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_tell_us').append('<li class="tellus_type_'+calc_type+'">'+response.tellus_value+'</li>')                             
                            }
                          });



                        }
                        });
                  });

        
           
               //product age radio
                $('.cb-age').click(function() {
                        $('ul.list-prod-age').html("");
                        $('ul.calc_age').html("");
                           if($(this).is(":checked")){
                           document.getElementById("list-prod-age").innerHTML = '<li>'+$(this).data('name')+'</li>';
                           $('ul.dv_report').append('<li><input type="text" name="mobile_age[]"  value="'+ $(this).data('name') +'"></li>')
                           var product_id = $('#product_id').val();
                           $.ajax({
                            url: base_url+'web/get_value_age',
                            type: 'post',
                            dataType: 'json',
                            data: {id:$(this).data('id'),product_id:product_id},
                            success:function(response){
                               if(response.age_type=='1'){
                                  var calc_type = 'percent';
                               }else{
                                  var calc_type = 'flat';
                               }
                              $('ul.calc_age').append('<li class="age_type_'+calc_type+'">'+response.age_value+'</li>')
                             // $('ul.calc_age').append('<li><input type="text" name="calc_age[]" class="age_type_'+calc_type+'" value="'+response.age_value+'"</li>')
                            }
                          });
                        }
                  });

                  //do yu have next btn action
               function takeOrder(){
                  uncheckedChk();
                  if ($('#do-you4').is(":checked"))
                        {
                           document.getElementById("AgeWindow").style.display = "flex";
                           document.getElementById("DoHaveWindow").style.display = "none";
                           document.getElementById("p-age").style.display = "block";
                          
                        }else{
                          
                           document.getElementById("p-age").style.display = "none";
                           $("input:radio[name=mobile_age]").prop('checked', false);
                           $('ul.list-prod-age').html("");
                           order_clack_window(); 
                           
                        }
                        
               }
               function flat_percent_value_calculation(){
                           var prod_price = <?php echo $product_data->p_price; ?>;
                           var sum_tellus_flat=0;
                           var sum_fpp_flat=0;
                           var sum_dou_type_flat=0;
                           var sum_age_type_flat =0;
                           
                           //screen type flat
                           var sum_screen_dps_type_flat = 0;
                           var sum_screen_vls_type_flat = 0;
                           var sum_screen_spc_type_flat = 0;
                          
                           //body type flat
                           var sum_body_sopb_flat = 0;
                           var sum_body_dopb_flat = 0;
                           var sum_body_psbpc_flat = 0;
                           var sum_body_bplc_flat = 0;

                           $('.tellus_type_flat').each(function(){
                              sum_tellus_flat+=parseFloat($(this).html());
                           })

                           $('.screen_dps_type_flat').each(function(){
                              sum_screen_dps_type_flat+=parseFloat($(this).html());
                           })
                           $('.screen_vls_type_flat').each(function(){
                              sum_screen_vls_type_flat+=parseFloat($(this).html());
                           })
                           $('.screen_spc_type_flat').each(function(){
                              sum_screen_spc_type_flat+=parseFloat($(this).html());
                           })

                           $('.body_sopb_flat').each(function(){
                              sum_body_sopb_flat+=parseFloat($(this).html());
                           })
                           $('.body_dopb_flat').each(function(){
                              sum_body_dopb_flat+=parseFloat($(this).html());
                           })
                           $('.body_psbpc_flat').each(function(){
                              sum_body_psbpc_flat+=parseFloat($(this).html());
                           })                           
                           $('.body_bplc_flat').each(function(){
                              sum_body_bplc_flat+=parseFloat($(this).html());
                           })
                           
                           $('.fpp_type_flat').each(function(){
                              sum_fpp_flat+=parseFloat($(this).html());
                           })
                           $('.dou_type_flat').each(function(){
                              sum_dou_type_flat+=parseFloat($(this).html());
                           })
                           $('.age_type_flat').each(function(){
                              sum_age_type_flat+=parseFloat($(this).html());
                           })

                           var sum_flat = sum_tellus_flat + sum_fpp_flat + sum_dou_type_flat + sum_age_type_flat + sum_screen_dps_type_flat + sum_screen_vls_type_flat + sum_screen_spc_type_flat + sum_body_sopb_flat + sum_body_dopb_flat + sum_body_psbpc_flat + sum_body_bplc_flat;

                           var sum_tellus_percent=0;
                           var sum_fpp_percent=0;
                           var sum_dou_type_percent=0;
                           var sum_age_type_percent =0;

                           var sum_screen_dps_type_percent = 0;
                           var sum_screen_vls_type_percent = 0;
                           var sum_screen_spc_type_percent = 0;

                             //body type percent
                           var sum_body_sopb_percent = 0;
                           var sum_body_dopb_percent = 0;
                           var sum_body_psbpc_percent = 0;
                           var sum_body_bplc_percent = 0;

                           $('.tellus_type_percent').each(function(){
                              sum_tellus_percent+=parseFloat($(this).html());
                           })
                           $('.screen_dps_type_percent').each(function(){
                              sum_screen_dps_type_percent+=parseFloat($(this).html());
                           })
                           $('.screen_vls_type_percent').each(function(){
                              sum_screen_vls_type_percent+=parseFloat($(this).html());
                           })
                           $('.screen_spc_type_percent').each(function(){
                              sum_screen_spc_type_percent+=parseFloat($(this).html());
                           })

                           $('.body_sopb_percent').each(function(){
                              sum_body_sopb_percent+=parseFloat($(this).html());
                           })
                           $('.body_dopb_percent').each(function(){
                              sum_body_dopb_percent+=parseFloat($(this).html());
                           })
                           $('.body_psbpc_percent').each(function(){
                              sum_body_psbpc_percent+=parseFloat($(this).html());
                           })
                           $('.body_bplc_percent').each(function(){
                              sum_body_bplc_percent+=parseFloat($(this).html());
                           })

                           $('.fpp_type_percent').each(function(){
                              sum_fpp_percent+=parseFloat($(this).html());
                           })
                           $('.dou_type_percent').each(function(){
                              sum_dou_type_percent+=parseFloat($(this).html());
                           })
                           $('.age_type_percent').each(function(){
                              sum_age_type_percent+=parseFloat($(this).html());
                           })
                           var sum_percent = sum_tellus_percent + sum_fpp_percent + sum_dou_type_percent + sum_age_type_percent + sum_screen_dps_type_percent + sum_screen_vls_type_percent + sum_screen_spc_type_percent + sum_body_sopb_percent + sum_body_dopb_percent + sum_body_psbpc_percent + sum_body_bplc_percent;

                           var PercentDecrease = prod_price-(sum_percent/100*prod_price);
                         
                           var tot_val = PercentDecrease - sum_flat;
                          
                           if(tot_val<0){
                              document.getElementById("mainCalcWindow").style.display = "none";
                              location.replace(base_url+'value-not-calculate/<?php echo $product_data->p_url; ?>')
                              return false;
                           }
                          
                           $(".base_price").html(Math.round(tot_val));                           
                           $("#bse_price").val(Math.round(tot_val));                        
                           $(".subtot").html(Math.round(tot_val) - <?= $pickup_charges->pickup_charge ?>);

                           
               }
              
               

               function validate_qsn_form(id){
                  if(document.querySelectorAll('input[name="btnradio'+id+'"]:checked').length === 0){
                       Swal.fire({
                           position: 'top',
                           icon: 'error',
                           title: '<h4>Please answer all Questions!</h4>',
                           showConfirmButton: false,
                           timer: 1500
                           }); 
                           scroll_screen();
                        return false;
                     }else{
                           var valuechk = $("input:radio[name=btnradio2]:checked").val();
                           var valuBodychk = $("input:radio[name=btnradio3]:checked").val();
                           
                           if(valuechk=='Yes'){
                              ScreenCondWindow();
                            
                           } 
                           if(valuechk=='No'){
                            
                              clear_screen_defectwindow();
                              
                           } 
                           if(valuBodychk=='Yes'){
                              BodyWindow();
                             
                           } 
                           if(valuechk=='No' && valuBodychk=='Yes'){
                              BodyWindow();
                              
                           }
                           if(valuechk=='No' && valuBodychk=='No'){
                             functional_problem();
                             clear_screen_defectwindow(); 
                             clear_bodyWindow();                           
                            
                           }  
                        
                           if(valuechk=='Yes' && valuBodychk=='Yes'){
                             ScreenCondWindow();
                            
                           }                   
                          
                          
                           if(valuechk=='Yes' && valuBodychk=='No'){
                             ScreenCondWindow();
                             clear_bodyWindow();
                           }                        
                       
                          

                        
                                     
                        
                     }

                     
               }

               function clear_screen_defectwindow(){
                              $('ul.list-screen-dps').html("");
                              $('ul.calc_screen_dps').html("");
                              $('ul.list-screen-vls').html("");
                              $('ul.calc_screen_vls').html("");
                              $('ul.list-screen-spc').html("");
                              $('ul.calc_screen_spc').html("");
                              $("input:radio[name=dps1]").prop('checked', false);
                              $("input:radio[name=vls2]").prop('checked', false);
                              $("input:radio[name=spc3]").prop('checked', false);

                              $('.box-scond,.box-scond2,.box-scond3').find('div.highlight-scond').removeClass('highlight-scond');
                              document.getElementById("ul-scond").style.display = "none";
                              document.getElementById("ScreenCondWindow").style.display = "none";
                        }

               function clear_bodyWindow(){
                  $('ul.list-body-sopb').html("");
                              $('ul.calc_body_sopb').html("");
                              $('ul.list-body-dopb').html("");
                              $('ul.calc_body_dopb').html("");
                              $('ul.list-body-psbpc').html("");
                              $('ul.calc_body_psbpc').html("");
                              $('ul.list-body-bplc').html("");
                              $('ul.calc_body_bplc').html("");
                              $("input:radio[name=sopb]").prop('checked', false);
                              $("input:radio[name=dopb]").prop('checked', false);
                              $("input:radio[name=psbpc]").prop('checked', false);
                              $("input:radio[name=bplc]").prop('checked', false);

                              $('.box-body,.box-body2,.box-body3,.box-body4').find('div.highlight-scond').removeClass('highlight-scond');
                              document.getElementById("ul-body").style.display = "none";
                              document.getElementById("BodyCondWindow").style.display = "none";
               }

               function validate_mobile_age(){
                  if($('input[name="mobile_age"]:checked').length === 0) {
                     Swal.fire({
                           position: 'top',
                           icon: 'error',
                           title: '<h4>Please select mobile age!</h4>',
                           showConfirmButton: false,
                           timer: 1500
                           })
                        return false;
                     }else{
                        order_clack_window();
                        
                     }
               }

         
      </script>



<!-- Order Calculation start here----------------------------->
<main class="main" id="mainCalcWindow" style="display:none;">
         <section class="mt-30 mb-50">
            <div class="container">
               <div class="row">
                  <div class="col-lg-7">
                  <div class="row border border-radius-10">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-20">
                           <figure class="">
                              <img src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" alt="<?= $model_data->m_name ?>" height="178" width="178">
                           </figure>
                          
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mt-20">
                           <h1 class="font27-18 font-semi-bold"><?= $model_data->m_name; ?> (<?= $variant_data->variant_name; ?>)</h1>
                           <small class="font16-14">Selling Price:</small>
                           <p class="font27-18 font-semi-bold gen-color mt-3">₹<span class="base_price"></span></p>
                           <p class="mt-10 text-muted">The value is based on the condition of the product mentioned by you.</p>
                          <!--  <h6><span class="badge bg-secondary hover-up mt-3 mb-10 font12">See Device Report >></span></h6>-->
                        </div>
                        
                     </div>
                  </div>
                  <!--//lg-8-->
                  <div class="col-lg-4 product-sidebar sticky-sidebar  border-radius-10">
                        <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center mb-4"><h4>Price Summary</h4></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <form method="post" action="<?= base_url() ?>web/checkout">
                                        <tr>
                                            <td>
                                                <h5>Base Price</h5>
                                            </td>
                                            <td>₹<span class="base_price"></span></td>
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
                                            <th> <h5>Total Amount</h5></th>
                                            <td colspan="2" class="product-subtotal">₹<span class="font-xl text-brand fw-900 subtot"></span></td>
                                        </tr>
                                        <input type="hidden" name="p_id" value="<?= $product_data->p_id ?>">
                                        <input type="hidden" id="bse_price" name="base_price" value="">
                                        <input type="hidden" name="pickup_charge" value="<?= $pickup_charges->pickup_charge ?>">
                                        <tr>
                                            <td colspan="3">
                                               <button class="get-exact-green text-center hover-up mt-10 d-block rounded mx-auto" type="submit">Sell Now <i class="fi-rs-arrow-right ml-5"></i></button>
                                             </td>
                                        </tr>
                                          </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
               </div>
            </div>
         </section>
      </main>
      
     