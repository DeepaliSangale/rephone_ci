<main class="page-content">  
<div class="mb-3">
    <button type="button" class="btn btn-primary px-5 radius-30" onclick="go_back()">Back</button>    
</div>

    <div class="card">
                <div class="card-header py-3"> 
                  <div class="row g-3 align-items-center">
                    <div class="col-12 col-lg-4 col-md-6 me-auto">
                      <h5 class="mb-1"><?php echo  date('d/m/Y',strtotime($request_price->add_date)); ?></h5>
                     
                    </div>
                     <!--<div class="col-12 col-lg-3 col-6 col-md-3">
                      <select class="form-select">
                        <option>Change Status</option>
                        <option>Awaiting Payment</option>
                        <option>Confirmed</option>
                        <option>Shipped</option>
                        <option>Delivered</option>
                      </select>
                    </div>
                    <div class="col-12 col-lg-3 col-6 col-md-3">
                       <button type="button" class="btn btn-primary">Save</button>
                       <button type="button" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> Print</button>
                    </div>--->
                  </div>
                 </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
                       <div class="col">
                         <div class="card border shadow-none radius-10">
                           <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                              <div class="icon-box bg-light-primary border-0">
                                <i class="bi bi-person text-primary"></i>
                              </div>
                              <div class="info">
                                 <h6 class="mb-2">Conatct Information</h6>
                                 <p class="mb-1"><?php echo $request_price->name; ?></p>
                                 <p class="mb-1"><a href="mailto:<?php echo $request_price->email; ?>"><?php echo $request_price->email; ?></a></p>
                                 <p class="mb-1"><a href="tel:<?php echo $request_price->mobile_number; ?>"><?php echo $request_price->mobile_number; ?></a></p>
                                 <p class="mb-1"><strong>Address</strong> :<?php echo $request_price->address; ?></p>
                                 <p class="mb-1"><strong>City</strong> :<?php echo $request_price->city; ?></p>
                                 <p class="mb-1"><strong>Pincode</strong> :<?php echo $request_price->pincode; ?></p>

                              </div>
                           </div>
                           </div>
                         </div>
                       </div>
                       <div class="col">
                        <div class="card border shadow-none radius-10">
                          <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                              <div class="icon-box bg-light-success border-0">
                                <i class="bi bi-phone text-success"></i>
                              </div>
                              <div class="info">
                                 <h6 class="mb-2">Device info</h6>
                                 <p class="mb-1"><strong>Model</strong> :<?php echo $request_price->model; ?></p>
                                 <p class="mb-1"><strong>Brand</strong> : <?php echo $request_price->brand; ?></p>
                                 <p class="mb-1"><strong>Internal Storage</strong> : <?php echo $request_price->internal_storage; ?> GB</p>
                                 <p class="mb-1"><strong>RAM</strong> : <?php echo $request_price->ram; ?> GB</p>
                                 <p class="mb-1"><strong>Condition</strong> : <?php echo $request_price->condition; ?></p>
                                 <p class="mb-1"><strong>Warranty </strong> : <?php echo $request_price->warranty ; ?></p>
                                 <p class="mb-1"><strong>Accessories </strong> : <?php echo $request_price->accessories ; ?></p>
                                 <p class="mb-1"><strong>Other Details </strong> : <?php echo $request_price->other_details ; ?></p>
                              </div>
                           </div>
                           </div>
                          </div>
                       </div>

                       <div class="col">
                        <div class="card border shadow-none radius-10">
                          <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                             
                              <div class="info">
                                 <h6 class="mb-2">Image</h6>
                                 <?php if (isset($request_price) && $request_price->image != '') { ?>
                                   <img width="300" height="300" src="<?= base_url() . 'assets/uploads/req_price/' . $request_price->image ?>">
                                <?php } ?>
                              </div>
                           </div>
                           </div>
                          </div>
                       </div>
                     
                  </div><!--end row-->

      

                </div>
              </div>
</main>