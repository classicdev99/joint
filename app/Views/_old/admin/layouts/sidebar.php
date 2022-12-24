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

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?php echo base_url('dashboard');?>" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('booking_list');?>" class="waves-effect">
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
                        <li><a href="<?php echo base_url('booking_history');?>">Booking History</a></li>
                        <li><a href="<?php echo base_url('cleaner_history');?>">Cleaner History</a></li>
                        <li><a href="<?php echo base_url('technician_history');?>">Technician History</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="<?php echo base_url('staff_list');?>" class="waves-effect">
                    <i class="dripicons-user-group"></i>
                        <span>Staffs</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url('property_list');?>" class="waves-effect">
                    <i class="dripicons-location"></i>
                        <span>Properties</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url('unit_list');?>" class="waves-effect">
                    <i class="dripicons-store"></i>
                        <span>Units</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url('room_list');?>" class="waves-effect">
                    <i class="dripicons-view-thumb"></i>
                        <span>Rooms</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>