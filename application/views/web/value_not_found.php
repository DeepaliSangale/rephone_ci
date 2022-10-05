<main class="main page-404">
        <div class="container">
            <div class="row shadow align-items-center text-center">
                <div class="col-lg-6 m-auto">
                  
                    <h2 class="mb-30 hover-up mt-40">We’re Sorry</h2>
                        <p class="text-danger">Your device seems to have very little value due to its condition</p>                   
                        <a onclick="history.back()" class="btn btn-default submit-auto-width font-xs hover-up">Back</a>
                  
                </div>
                <div class="col-lg-5">
                        <div class="single-header mb-30">
                            <div class="product-list mb-50 radius14">
                            <div class="product-cart-wrap">
                                <div class="">
                                <img src="<?php echo base_url() ?>assets/uploads/model/<?= $model_data->m_image ?>" alt="<?= $model_data->m_name ?>" height="178" width="178">                           
                                </div>
                                <div class="mt-40">
                                    <h2 class="font-20-14"><?= $model_data->m_name; ?> (<?= $variant_data->variant_name; ?>)</h2>
                                    <p>Selling price :</p>     
                                    <a href="<?php echo base_url() ?>" class="btn btn-default submit-auto-width font-xs hover-up">Sell Another Device</a>     
                                </div>                                                                       
                                </div>
                               
                            </div>
                            
                            <!--single product-->                         
                        </div>


                        </div>
                           
                   </div>
            </div>
        </div>
    </main>