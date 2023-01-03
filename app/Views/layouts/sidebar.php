<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?= base_url(session('role') . '/dashboard') ?>" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <!--
                        <span class="badge rounded-pill bg-success float-end">3</span>
                        -->
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/account') ?>" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Accounts</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/contact') ?>" class=" waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Contacts</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/quote') ?>" class=" waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Quote</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/lead') ?>" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Leads</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/task') ?>" class=" waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Tasks</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/leave') ?>" class=" waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Leave Application</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/expenses') ?>" class=" waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Expenses</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/meeting') ?>" class=" waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Meeting</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/project') ?>" class=" waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Project</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(session('role') . '/purchases') ?>" class=" waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Purchases</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url(session('role') . '/product') ?>" class=" waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(session('role') . '/Orders') ?>" class=" waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Product Orders</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(session('role') . '/TDO') ?>" class=" waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>TDO</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(session('role') . '/deal') ?>" class=" waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Deal</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(session('role') . '/invoice') ?>" class=" waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Invoice</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(session('role') . '/activitylog') ?>" class=" waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Activity Logs</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(session('role') . '/staffs') ?>" class=" waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Staffs</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-database-2-line"></i>
                        <span>Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url(session('role') . '/master/prefix') ?>">Prefix</a></li>
                        <li><a href="<?= base_url(session('role') . '/master/leadsource') ?>">Lead Source</a></li>
                        <li><a href="<?= base_url(session('role') . '/master/leadstatus') ?>">Lead Status</a></li>
                        <li><a href="<?= base_url(session('role') . '/master/industry') ?>">Industry</a></li>
                        <li><a href="<?= base_url(session('role') . '/master/customertype') ?>">Customer Type</a></li>
                        <li><a href="<?= base_url(session('role') . '/master/actionrequired') ?>">Action Required</a>
                        </li>
                        <li><a href="<?= base_url(session('role') . '/master/productcategory') ?>">Product
                                Categories</a></li>
                        <li><a href="<?= base_url(session('role') . '/master/brand') ?>">Brands</a></li>
                        <li><a href="<?= base_url(session('role') . '/master/rating') ?>">Rating</a></li>
                        <li><a href="<?= base_url(session('role') . '/master/paymentterm') ?>">Payment Term</a></li>
                    </ul>
                </li>


                <!--
                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Account</span>
                    </a>
                </li>

                <li>
                    <a href="apps-chat.html" class=" waves-effect">
                        <i class="ri-chat-1-line"></i>
                        <span>Contact</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-store-2-line"></i>
                        <span>Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products.html">Products</a></li>
                        <li><a href="ecommerce-product-detail.html">Product Detail</a></li>
                        <li><a href="ecommerce-orders.html">Orders</a></li>
                        <li><a href="ecommerce-customers.html">Customers</a></li>
                        <li><a href="ecommerce-cart.html">Cart</a></li>
                        <li><a href="ecommerce-checkout.html">Checkout</a></li>
                        <li><a href="ecommerce-shops.html">Shops</a></li>
                        <li><a href="ecommerce-add-product.html">Add Product</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">Inbox</a></li>
                        <li><a href="email-read.html">Read Email</a></li>
                    </ul>
                </li>

                <li>
                    <a href="apps-kanban-board.html" class=" waves-effect">
                        <i class="ri-artboard-2-line"></i>
                        <span>Kanban Board</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a target="_self" href="layouts-light-sidebar.html">Light Sidebar</a></li>
                                <li><a target="_self" href="layouts-compact-sidebar.html">Compact Sidebar</a>
                                </li>
                                <li><a target="_self" href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                <li><a target="_self" href="layouts-boxed.html">Boxed Width</a></li>
                                <li><a target="_self" href="layouts-preloader.html">Preloader</a></li>
                                <li><a target="_self" href="layouts-colored-sidebar.html">Colored Sidebar</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a target="_self" href="layouts-horizontal.html">Horizontal</a></li>
                                <li><a target="_self" href="layouts-hori-topbar-light.html">Topbar light</a>
                                </li>
                                <li><a target="_self" href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                <li><a target="_self" href="layouts-hori-preloader.html">Preloader</a></li>
                                <li><a target="_self" href="layouts-hori-colored-header.html">Colored Header</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a target="_self" href="auth-login.html">Login</a></li>
                        <li><a target="_self" href="auth-register.html">Register</a></li>
                        <li><a target="_self" href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a target="_self" href="auth-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a target="_self" href="pages-maintenance.html">Maintenance</a></li>
                        <li><a target="_self" href="pages-comingsoon.html">Coming Soon</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-faqs.html">FAQs</a></li>
                        <li><a href="pages-pricing.html">Pricing</a></li>
                        <li><a target="_self" href="pages-404.html">Error 404</a></li>
                        <li><a target="_self" href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-images.html">Images</a></li>
                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                        <li><a href="ui-roundslider.html">Round Slider</a></li>
                        <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-sweet-alert.html">Sweetalert 2</a></li>
                        <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-video.html">Video</a></li>
                        <li><a href="ui-general.html">General</a></li>
                        <li><a href="ui-rating.html">Rating</a></li>
                        <li><a href="ui-notifications.html">Notifications</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ri-eraser-fill"></i>
                        <span class="badge rounded-pill bg-danger float-end">6</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html">Elements</a></li>
                        <li><a href="form-validation.html">Validation</a></li>
                        <li><a href="form-advanced.html">Advanced Plugins</a></li>
                        <li><a href="form-editors.html">Editors</a></li>
                        <li><a href="form-uploads.html">File Upload</a></li>
                        <li><a href="form-xeditable.html">X-editable</a></li>
                        <li><a href="form-wizard.html">Wizard</a></li>
                        <li><a href="form-mask.html">Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Tables</a></li>
                        <li><a href="tables-responsive.html">Responsive Table</a></li>
                        <li><a href="tables-editable.html">Editable Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.html">Apex Charts</a></li>
                        <li><a href="charts-chartjs.html">Chartjs</a></li>
                        <li><a href="charts-flot.html">Flot</a></li>
                        <li><a href="charts-knob.html">Jquery Knob</a></li>
                        <li><a href="charts-sparkline.html">Sparkline</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-brush-line"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-remix.html">Remix Icons</a></li>
                        <li><a href="icons-materialdesign.html">Material Design</a></li>
                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html">Font awesome 5</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-map-pin-line"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html">Google Maps</a></li>
                        <li><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!--
<div class="vertical-menu" style="margin-top: -4.5%;">
    <div data-simplebar class="h-100">
        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="https://tse3.mm.bing.net/th?id=OIP.2mOnyDDiSOsxkH1OUQl4agHaHa&pid=Api&P=0" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                
                <div class="user-info mb-3">
                    <h5 class="mt-3 font-size-16 text-white">Admin</h5>
                    <span class="font-size-13 text-white-50">Administrator</span>
                </div>

                <a href="<?= base_url('/logout') ?>">
                    <i class="fa fa-power-off"></i>
                </a>
                
            </div>
        </div>

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?php echo base_url('dashboard'); ?>" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('booking_list'); ?>" class="waves-effect">
                    <i class="dripicons-list"></i>
                        <span>Bookings</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-document-edit"></i>
                        <span>History</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?php echo base_url('booking_history'); ?>">Booking History</a></li>
                        <li><a href="<?php echo base_url('cleaner_history'); ?>">Cleaner History</a></li>
                        <li><a href="<?php echo base_url('technician_history'); ?>">Technician History</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="<?php echo base_url('staff_list'); ?>" class="waves-effect">
                    <i class="dripicons-user-group"></i>
                        <span>Staffs</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url('property_list'); ?>" class="waves-effect">
                    <i class="dripicons-location"></i>
                        <span>Properties</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url('unit_list'); ?>" class="waves-effect">
                    <i class="dripicons-store"></i>
                        <span>Units</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url('room_list'); ?>" class="waves-effect">
                    <i class="dripicons-view-thumb"></i>
                        <span>Rooms</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
-->