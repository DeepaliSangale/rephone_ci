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
      

        <?php if($_SESSION['ex_staff_type']==1){ ?>
            <li class="<?= ($current_page == "Sell Order") ? 'mm-active' : '' ?>">
                 <a href="<?= base_url('executive/manage_sell_order') ?>">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-cart-alt"></i>
                   </div>
                   <div class="menu-title">Order</div>
              </a>
           </li>
           <li class="<?= ($current_page == "Review") ? 'mm-active' : '' ?>">
            <a href="<?= base_url('executive/manage_review') ?>">
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