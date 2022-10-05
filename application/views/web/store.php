
 <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
               <h1 class="mb-15">Our Exclusive Stores</h1>
                <div class="breadcrumb">
                    <a href="<?php echo base_url() ?>" rel="nofollow">Home</a>
                    <span></span> <b class="c-black"> Our Stores </b>
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
           <div class="container custom">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-header mb-30">
                            <h2 class="font22 text-brand">Find Our Exclusive Stores</h2>
                        </div>
                           
                   </div>
                    <div class="col-lg-4 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget widget_search mb-50">
                                <div class="search-form">
                                    <form>
                                        <input type="text" placeholder="Enter your city" class="search_model_city" value="<?= (isset($_GET['city_id'])) ? $_GET['city_id'] : '' ?>">
                                        <button type="submit"> <i class="fi-rs-search"></i> </button>
                                    </form>                                    
                                </div>
                            </div>
                                                    
                        </div>
                    </div>
                </div>
                <?php if(!empty($store)){ ?>
              <!---stores--->
              <div class="row">
                <?php foreach($store as $val){ ?>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h4 class="mb-15 text-brand"><?= $val['s_name'] ?></h4>
                        <?= $val['s_address'] ?><br>
                        <abbr title="Phone">Phone:</abbr> <a href="tel:91<?= $val['s_phone'] ?>"><?= $val['s_phone'] ?></a><br>
                        <abbr title="Email">Email: </abbr><a href="mailto:<?= $val['s_email'] ?>"><?= $val['s_email'] ?></a><br>
                        <a href="<?= $val['map_link'] ?>" target="_BLANK" class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-10"></i>View map</a>
                    </div>
                <?php } ?>
                </div>
              <!---//stores--->
            <?php } ?>
            </div>
    </section>
</main>