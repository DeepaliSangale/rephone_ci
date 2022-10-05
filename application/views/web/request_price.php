<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo base_url() ?>" rel="nofollow">Home</a>
                    <span></span> request a price                    
                </div>
            </div>
        </div>
        <section class="pt-30 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-3">
                            <h3>Request a Price</h3>   
                            </div>
                            <div class="col-md-8">                                                           
                                        <div class="card">
                                            <div class="card-header bg-success">
                                                <h5 id="enqhead">Device Details</h5>
                                            </div>
                                            <div class="card-body">                                              
                                                <form id="reqEnqForm">
                                                    <div class="row" id="device_info">
                                                        <div class="form-group col-md-6">
                                                            <label>Model<span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="model" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Brand <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="brand" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Internal Storage <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="internal_storage" type="number">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>RAM </label>
                                                            <input  class="form-control square" name="ram" type="number">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Condition <span class="required">*</span></label>
                                                            <select name="condition" class="form-control square" required>
                                                                <option value="">--select--</option>
                                                                <option value="Like New - Flawless">Like New - Flawless</option>
                                                                <option value="Some signs of wear and tear">Some signs of wear and tear</option>
                                                                <option value="Partially defective">Partially defective(specify in Other Details)</option>
                                                                <option value="Fully not working">Fully not working(specify in Other Details)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Age/Warranty <span class="required">*</span></label>
                                                            <select name="warranty" class="form-control square" required>
                                                                <option value="">--select--</option>
                                                                <option value="Less than 3 months old. At least 9 months valid warranty">Less than 3 months old. At least 9 months valid warranty</option>
                                                                <option value="Between 3 to 6 months old. At least 6 months valid warranty">Between 3 to 6 months old. At least 6 months valid warranty</option>
                                                                <option value="Between 6 to 11 months old. At least 1 months valid warranty">Between 6 to 11 months old. At least 1 months valid warranty</option>
                                                                <option value="More than 11 months old / No Warranty">More than 11 months old / No Warranty</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Accessories</label>
                                                            <textarea  rows="2" class="form-control square" name="accessories" placeholder="Enlist the accompanying accessories you wish to sell.  For example - charger, invoice, box."></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Picture</label>
                                                            <input class="form-control square" name="image" type="file" accept="image/*">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Other details <span class="required">*</span></label>
                                                            <textarea  placeholder="Provide details of cosmetic or functional defects, if any.  Also feel free to provide any other information that may help us evaluate  the price of your gadget more accurately." rows="2" class="form-control square" name="other_details" placeholder="Enlist the accompanying accessories you wish to sell.  For example - charger, invoice, box."></textarea>
                                                        </div>
                                                        <div class="col-md-12">                                                           
                                                            <button type="submit" class="btn btn-fill-out">Next</button>
                                                        </div>
                                                    </div>

                                                    <!--contact details----------->
                                                    <div class="row" id="contact_info" style="display:none;">
                                                        <div class="form-group col-md-6">
                                                            <label>Name<span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="name" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Email </label>
                                                            <input  class="form-control square" name="email" type="email">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Mobile Number </label>
                                                            <input class="form-control square" name="mobile_number" type="number">
                                                        </div>
                                                       
                                                        <div class="form-group col-md-6">
                                                            <label>Address </label>
                                                            <textarea  rows="2" class="form-control square" name="address"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>City </label>
                                                            <input  class="form-control square" name="city" type="text">
                                                        </div>
                                                      
                                                        <div class="form-group col-md-6">
                                                            <label>Pincode</label>
                                                            <input  class="form-control square" name="pincode" type="number">
                                                        </div>                                                    
                                                       
                                                        
                                                        <div class="col-md-12">    
                                                            <button type="button" id="previous" class="btn btn-fill-out">Previous</button>                                                                                                             
                                                            <button type="submit" class="btn ">Submit</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>

    