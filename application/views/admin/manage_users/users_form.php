<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
              <div class="col-12 col-lg-8">
                <div class="card shadow-sm border-0">
                  <div class="card-body">
                    
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">USER INFORMATION</h6>
                        </div>
                        <div class="card-body">
                          <form class="row g-3">
                             <div class="col-6">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" value="<?= $user->user_name; ?>">
                             </div>
                             <div class="col-6">
                              <label class="form-label">Email address</label>
                              <input type="text" class="form-control" value="<?= $user->user_email; ?>">
                            </div>
                              <div class="col-6">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" value="<?= $user->user_phone; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Alt. Mobile Number</label>
                                <input type="text" class="form-control" value="<?= $user->alt_no; ?>">
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="card shadow-none border">
                        <div class="card-header">
                          <h6 class="mb-0">CONTACT INFORMATION</h6>
                        </div>
                        <?php if(!empty($user_address)){ ?>
                        <?php foreach($user_address as $val){ ?>
                            <?php if(empty($val['landmark'])){
                                $landmark = '';
                            }else{
                                $landmark = ','.$val['landmark'].'';
                            } ?>
                        <div class="card-body">
                          <form class="row g-3">
                            <div class="col-6">
                              <label class="form-label"><b><?= $val['address_type'] ?>-</b>Address</label>
                              <textarea  class="form-control"><?= $val['city'] ?>,<?= $val['state'] ?> <?= $val['flat_office_floor'] ?><?= $landmark ?> <?= $val['state'] ?>, <?= $val['pincode'] ?> </textarea>
                             </div>
                             <div class="col-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" value="<?= $val['city'] ?>">
                             </div>
                            
                              <div class="col-3">
                                <label class="form-label">Pin Code</label>
                                <input type="text" class="form-control" value="<?= $val['pincode'] ?>">
                            </div>                            
                          </form>
                        </div>
                        <?php } ?>
                        <?php } ?>
                      </div>
                      <div class="text-start">
                        <button type="button" class="btn btn-primary px-4" onclick="go_back();">Back</button>
                      </div>
                  </div>
                </div>
              </div>
     
                </div>
              </div>
            </div>
    <!--end row-->
</main>