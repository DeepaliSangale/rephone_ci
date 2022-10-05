<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?= base_url() ?>admin_assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rephone</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <?php if($_SESSION['staff_type']==0){ ?>
        <li class="<?= ($current_page == "Dashboard") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('admin') ?>">
                <div class="parent-icon">
                    <i class="fadeIn animated bx bx-line-chart-down"></i>
                    <!--<i class="bi bi-house-door"></i>-->
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="<?= ($current_page == "Slider") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('admin/manage_slider') ?>">
                <div class="parent-icon">
                    <i class="fadeIn animated bx bx-line-chart-down"></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
        </li>
        <li class="<?= ($current_page == "Pincode" || $current_page == "Pincode") ? 'mm-active' : '' ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid"></i>
                </div>
                <div class="menu-title">Masters</div>
            </a>
            <ul>
                <li class="<?= ($current_page == "Pincode") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_pincode') ?>"><i class="bi bi-arrow-right-short"></i>Pincode</a>
                <li class="<?= ($current_page == "City") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_city') ?>"><i class="bi bi-arrow-right-short"></i>City</a>
                <li class="<?= ($current_page == "Brand") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_brand') ?>"><i class="bi bi-arrow-right-short"></i>Brand</a>
                <li class="<?= ($current_page == "Variant") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_variant') ?>"><i class="bi bi-arrow-right-short"></i>Variant</a>
                <li class="<?= ($current_page == "Model") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_model') ?>"><i class="bi bi-arrow-right-short"></i>Model</a>
                <li class="<?= ($current_page == "Tell Us Questions") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_tellus_question') ?>"><i class="bi bi-arrow-right-short"></i>Tell Us Ques.</a>
                <li class="<?= ($current_page == "Screen Condition") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_screen_cond') ?>"><i class="bi bi-arrow-right-short"></i>Screen Condition Ques.</a>
                <li class="<?= ($current_page == "Body Defects") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_body_defects') ?>"><i class="bi bi-arrow-right-short"></i>Body defects Ques.</a>
                <li class="<?= ($current_page == "Questions") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_question') ?>"><i class="bi bi-arrow-right-short"></i>Functional  Ques.</a>
                <li class="<?= ($current_page == "Accessories") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_accessories') ?>"><i class="bi bi-arrow-right-short"></i>Accessories</a>
                <li class="<?= ($current_page == "Age") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_age') ?>"><i class="bi bi-arrow-right-short"></i>Age</a>
                <li class="<?= ($current_page == "Pickup Charge") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_pickup_charge') ?>"><i class="bi bi-arrow-right-short"></i>Pickup Charge</a>
                </li>
            </ul>
        </li>

        <li class="<?= ($current_page == "Product") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('admin/manage_product') ?>">
                <div class="parent-icon"><i class="bi bi-bag-check"></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
        </li>

        <li class="<?= ($current_page == "Executive") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('admin/manage_executive') ?>">
                <div class="parent-icon"><i class="bi bi-person-circle"></i>
                </div>
                <div class="menu-title">Executive</div>
            </a>
        </li>
        <li class="<?= ($current_page == "Users") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('admin/manage_users') ?>">
                <div class="parent-icon"><i class="bi bi-person-circle"></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>
        <li class="<?= ($current_page == "Sell Order") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('admin/manage_sell_order') ?>">
                <div class="parent-icon"><i class="fadeIn animated bx bx-cart-alt"></i>
                </div>
                <div class="menu-title">Order</div>
            </a>
        </li>
        <li class="<?= ($current_page == "Request Price") ? 'mm-active' : '' ?>">
                 <a href="<?= base_url('admin/manage_request_price') ?>">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-cart-alt"></i>
                   </div>
                   <div class="menu-title">Request Price Enq.</div>
              </a>
        </li>
        <li class="<?= ($current_page == "Stores") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('admin/manage_store') ?>">
                <div class="parent-icon"><i class="bi bi-credit-card-2-front"></i>
                </div>
                <div class="menu-title">Stores</div>
            </a>
        </li>
        <li class="<?= ($current_page == "About" || $current_page == "About") ? 'mm-active' : '' ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe"></i>
                </div>
                <div class="menu-title">Front Web</div>
            </a>
            <ul>
                <li class="<?= ($current_page == "About") ? 'mm-active' : '' ?>"> <a href="<?= base_url('admin/manage_about') ?>"><i class="bi bi-arrow-right-short"></i>About</a>
                </li>
            </ul>
        </li>
        <li class="<?= ($current_page == "Review") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('admin/manage_review') ?>">
                <div class="parent-icon"><i class="fadeIn animated bx bx-message-rounded-detail"></i>
                </div>
                <div class="menu-title">Client Review</div>
            </a>
        </li>
        <li class="">
            <a href="javascript:void(0);" class="signout">
                <div class="parent-icon">
                    <i class="fadeIn animated bx bx-log-out"></i>
                </div>
                <div class="menu-title">Sign Out</div>
            </a>
        </li>
        <?php } ?>

    </ul>

    <!--end navigation-->
</aside>
<!--end sidebar -->