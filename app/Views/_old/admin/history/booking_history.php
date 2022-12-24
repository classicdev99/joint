<!doctype html>
<html lang="en">

    <head>
        <?= $this->include('admin/layouts/title-meta') ?>
        <?= $this->include('admin/layouts/css') ?>

        <style>
            .wrapper { overflow-x: nowrap;}
            .wrapper table { white-space: break-word;}
            .dataTables_scrollBody {height: 60vh;}
            .sorting {
                width: 100%;
            }
            .invisible-p {font-size: 0.01px; color: transparent; padding: 0; margin: 0;}
        </style>
    </head>
 
    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?= $this->include('admin/layouts/sidebar') ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content" style="padding: 0;">

                    <?= $this->include('admin/layouts/page-title') ?>
                    <?php $db = \Config\Database::connect(); ?>

                    <div class="container-fluid">
                        <div class="page-content-wrapper">
                            <div class="row" style="background-color:white;">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body" style="">
                                            <h4 class="header-title"><?= $title ?></h4>
                                            
                                            <br>
                                            
                                            <?php if(session()->getFlashdata('msg')):?>
                                            <div class="alert alert-warning">
                                            <?= session()->getFlashdata('msg') ?>
                                            </div>
                                            <?php endif;?>

                                            <div class="wrapper">
                                                <table id="booking-list" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <!--
                                                            <th>Action</th>
                                                            <th>Cleaner</th>
                                                            <th>Technician</th>
                                                            -->
                                                            <th>Code</th>
                                                            <th>Status</th>
                                                            <th>Customer</th>
                                                            <th>Phone</th>
                                                            <th>Checkin</th>
                                                            <th>Checkout</th>
                                                            <th>Unit Name</th>
                                                            <th>Room Type</th>
                                                            <th>Property Name</th>
                                                            <th>Pax</th>
                                                            <th>Email</th>
                                                            <th>Room Price</th>
                                                            <th>Cleaning Fee</th>
                                                            <th>Extra Guest Fee</th>
                                                            <th>Platform Fee</th>
                                                            <th>Source</th>
                                                            <th>Remarks</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if($bookings):
                                                                $i=0;
                                                                foreach($bookings as $booking):
                                                        ?>
                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <!--
                                                            <td style="padding-top: 4px;">
                                                                <div class="dropdown mt-3 mt-sm-0">
                                                                    <a class="btn btn-secondary" href="#" id="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                        
                                                                    <div class="dropdown-menu" aria-labelledby="">
                                                                        <a class="dropdown-item" href="<?php echo base_url('change_room/'.$booking['booking_id']);?>">Change Room</a>
                                                                        <a class="dropdown-item" href="#" onclick="if (confirm('Checkout this booking ?')) {updateBookingStatus('1', '<?= $booking['booking_id'] ?>');}">
                                                                            <span class="text-success">Checkout Now</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="#" onclick="updateBookingStatus('2', '<?= $booking['booking_id'] ?>');">
                                                                            <span class="text-danger">Cancel Booking</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="padding-top: 4px;">
                                                                <?php
                                                                    $cleaner = "--Select--";
                                                                    foreach($cleaners as $c) {
                                                                        if ($c['staff_id'] == $booking['cleaner_id']) {
                                                                            $cleaner = $c['name'];
                                                                        }
                                                                    }
                                                                ?>
                                                                <p class="invisible-p" id="d-menu-cleaner-invisible-<?= $booking['booking_id'] ?>"><?= $cleaner ?></p>
                                                                
                                                                <div class="dropdown">
                                                                    <a class="btn btn-light w-100" href="#" id="d-menu-cleaner-<?= $booking['booking_id'] ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $cleaner ?></a>
                        
                                                                    <div class="dropdown-menu" aria-labelledby="d-menu-cleaner-<?= $booking['booking_id'] ?>">
                                                                        <a class="dropdown-item" href="#" onclick="assignCleaner('', '--Select--', '<?= $booking['booking_id'] ?>');">--Select--</a>
                                                                        <?php
                                                                            foreach($cleaners as $c) {
                                                                        ?>
                                                                                <a class="dropdown-item" href="#" onclick="assignCleaner('<?= $c['staff_id'] ?>', '<?= $c['name'] ?>', '<?= $booking['booking_id'] ?>');"><?= $c['name'] ?></a>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                
                                                                <input id="cleaner-task-<?= $booking['booking_id'] ?>" name="cleaner_task" class="form-control" placeholder="Enter Task" onchange="updateCleanerTask(this.value, '<?= $booking['booking_id'] ?>');"  value="<?= $booking['cleaner_task'] ?>" <?= $booking['cleaner_id'] == "0" ? "hidden" : "" ?>>
                                                            </td>
                                                            <td style="padding-top: 4px;">
                                                                <?php
                                                                    $technician = "--Select--";
                                                                    foreach($technicians as $t) {
                                                                        if ($t['staff_id'] == $booking['maintenancer_id']) {
                                                                            $technician = $t['name'];
                                                                        }
                                                                    }
                                                                ?>
                                                                <p class="invisible-p" id="d-menu-technician-invisible-<?= $booking['booking_id'] ?>"><?= $technician ?></p>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-light w-100" href="#" id="d-menu-technician-<?= $booking['booking_id'] ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $technician ?></a>
                        
                                                                    <div class="dropdown-menu" aria-labelledby="d-menu-technician-<?= $booking['booking_id'] ?>">
                                                                        <a class="dropdown-item" href="#" onclick="assignTechnician('', '--Select--', '<?= $booking['booking_id'] ?>');">--Select--</a>
                                                                        <?php
                                                                            foreach($technicians as $t) {
                                                                        ?>
                                                                                <a class="dropdown-item" href="#" onclick="assignTechnician('<?= $t['staff_id'] ?>', '<?= $t['name'] ?>', '<?= $booking['booking_id'] ?>');"><?= $t['name'] ?></a>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                
                                                                <input id="technician-task-<?= $booking['booking_id'] ?>" name="maintenancer_task" class="form-control" placeholder="Enter Task" onchange="updateTechnicianTask(this.value, '<?= $booking['booking_id'] ?>');" value="<?= $booking['maintenancer_task'] ?>" <?= $booking['maintenancer_id'] == "0" ? "hidden" : "" ?>>
                                                            </td>
                                                            -->
                                                            
                                                            <td><?php echo $booking['code']; ?></td>
                                                            
                                                            <?php
                                                                switch($booking['status']) {
                                                                    case 0:
                                                                        $status = "Unfulfilled";
                                                                        $textType = "warning";
                                                                        break;
                                                                    case 1:
                                                                        $status = "Fulfilled";
                                                                        $textType = "success";
                                                                        break;
                                                                    case 2:
                                                                        $status = "Cancelled";
                                                                        $textType = "danger";
                                                                        break;
                                                                }
                                                            ?>

                                                            <td style="padding-top: 4px;">
                                                                <p class="invisible-p" id="booking-status-invisible-<?= $booking['booking_id'] ?>"><?= $status ?></p>
                                                                
                                                                <div class="dropdown">
                                                                    <a class="btn btn-light w-100" href="#" *data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="booking-status-dropdown-<?= $booking['booking_id'] ?>">
                                                                        <span class="text-<?= $textType ?>" style="text-align: center;" id="booking-status-<?= $booking['booking_id'] ?>">
                                                                            <?= $status ?>
                                                                        </span>
                                                                    </a>
                            
                                                                    <div class="dropdown-menu" aria-labelledby="booking-status-dropdown-<?= $booking['booking_id'] ?>">
                                                                        <a class="dropdown-item" href="#" onclick="updateBookingStatus('0', '<?= $booking['booking_id'] ?>');"><span class="text-warning">Unfulfilled</span></a>
                                                                        <a class="dropdown-item" href="#" onclick="updateBookingStatus('1', '<?= $booking['booking_id'] ?>');"><span class="text-success">Fulfilled</span></a>
                                                                        <a class="dropdown-item" href="#" onclick="updateBookingStatus('2', '<?= $booking['booking_id'] ?>');"><span class="text-danger">Cancelled</span></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            <!--
                                                            <td><?php echo $booking['building_name'] ?? ""; ?></td>
                                                            <td><?php echo $booking['room_no'] ?? ""; ?> / <?php echo $booking['floor_no'] ?? ""; ?></td>
                                                            -->
                                                            
                                                            <td><?php echo $booking['customer_name']; ?></td>
                                                            <td><?php echo $booking['customer_phone']; ?></td>
                                                            <td><?php echo $booking['checkin']; ?></td>
                                                            <td><?php echo $booking['checkout']; ?></td>
                                                            
                                                            <?php
                                                                $unit_name = "n/a";
                                                                $room_type = "n/a";
                                                            
                                                                if ($booking['unit_id'] != "0") {
                                                                    $query3 = $db->query("SELECT * FROM units WHERE unit_id = '$booking[unit_id]'")->getResultArray();
                                                                    if (COUNT($query3) > 0) {
                                                                        $unit_name = $query3[0]['name'];
                                                                        
                                                                        $room_id = $query3[0]['room_id'];
                                                                        if ($room_id != "0") {
                                                                            $query4 = $db->query("SELECT * FROM rooms WHERE room_id = '$room_id'")->getResultArray();
                                                                            if (COUNT($query4) > 0) {
                                                                                $room_type = $query4[0]['room_type'];
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                            <td><?= $unit_name ?></td>
                                                            <td><?= $room_type ?></td>
                                                            <td><?php echo $booking['name']; ?></td>
                                                            
                                                            <td><?php echo $booking['persons']; ?></td>
                                                            <td><?php echo $booking['customer_email']; ?></td>
                                                            <td><?php echo $booking['room_price'] ?? ""; ?></td>
                                                            <td><?php echo $booking['cleaning_fee'] ?? ""; ?></td>
                                                            <td><?php echo $booking['extra_guest_fee'] ?? ""; ?></td>
                                                            <td><?php echo $booking['platform_fee'] ?? ""; ?></td>
                                                            <td><?php echo $booking['source']; ?></td>
                                                            <td style="text-align: justify;"><?php echo $booking['remarks']; ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                         <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                <?= $this->include('admin/layouts/footer') ?>
                
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <?= $this->include('admin/layouts/script') ?>
        
        <script>
            $(document).ready(function () {
                
                $('#booking-list').DataTable({
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,
                    columnDefs: [
                        { width: 150, targets: 3},
                        { width: 150, targets: 4},
                        { width: 150, targets: 8},
                        { width: 150, targets: 9},
                        { width: 500, targets: 17},
                    ],
                    fixedColumns: true
                });
            });
            
            function assignCleaner(staff_id, staff_name, booking_id) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/assign_cleaner') ?>",
                    data: {
                        staff_id: staff_id,
                        booking_id: booking_id
                    },
                    success: function(response) {
                        if (response == "success") {
                            if (staff_id == "") {
                                $('#cleaner-task-' + booking_id).val("").change();
                                $('#cleaner-task-' + booking_id).attr("hidden",true);
                                util.sweetAlert('success', 'Successfully removed cleaner from booking.');
                            } else {
                                $('#cleaner-task-' + booking_id).removeAttr("hidden");
                                util.sweetAlert('success', 'Successfully assigned a cleaner to booking.');
                            }

                            document.getElementById('d-menu-cleaner-invisible-' + booking_id).innerHTML = staff_name;
                            document.getElementById('d-menu-cleaner-' + booking_id).innerHTML = staff_name;
                        } else {
                            util.sweetAlert('error', 'Failed to assign cleaner.');
                        }
                    }
                });
            }
            
            function assignTechnician(staff_id, staff_name, booking_id) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/assign_technician') ?>",
                    data: {
                        staff_id: staff_id,
                        booking_id: booking_id
                    },
                    success: function(response) {
                        if (response == "success") {
                            if (staff_id == "") {
                                $('#technician-task-' + booking_id).val("").change();
                                $('#technician-task-' + booking_id).attr("hidden",true);
                                util.sweetAlert('success', 'Successfully removed technician from booking.');
                            } else {
                                $('#technician-task-' + booking_id).removeAttr("hidden");
                                util.sweetAlert('success', 'Successfully assigned a technician to booking.');
                            }
                                                                                                
                            document.getElementById('d-menu-technician-invisible-' + booking_id).innerHTML = staff_name;
                            document.getElementById('d-menu-technician-' + booking_id).innerHTML = staff_name;
                        } else {
                            util.sweetAlert('error', 'Failed to assign technician.');
                        }
                    }
                });
            }
            
            function updateCleanerTask(task, booking_id) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/update_cleaner_task') ?>",
                    data: {
                        task: task,
                        booking_id: booking_id
                    },
                    success: function(response) {
                        if (response == "failed") {
                            util.sweetAlert('error', 'Failed to assign task to cleaner.');
                        }
                    }
                });                                        
            }
            
            function updateTechnicianTask(task, booking_id) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/update_technician_task') ?>",
                    data: {
                        task: task,
                        booking_id: booking_id
                    },
                    success: function(response) {
                        if (response == "failed") {
                            util.sweetAlert('error', 'Failed to assign task to technician.');
                        }
                    }
                });                                        
            }
            
            function updateBookingStatus(status, booking_id) {
                var isConfirmed = true;
                
                if (status == '2') {
                    if (confirm('Cancel this booking order ?') === false) {
                        isConfirmed = false;
                    }
                }
                
                if (isConfirmed == true) {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('admin/update_booking_status') ?>",
                        data: {
                            status: status,
                            booking_id: booking_id
                        },
                        success: function(response) {
                            if (response == "success") {
                                var textType = "";
                                var innerHTML = "";
                                
                                switch(status) {
                                    case '0':
                                        innerHTML = "Unfulfilled";
                                        textType = "warning";
                                        break;
                                    case '1':
                                        innerHTML = "Fulfilled";
                                        textType = "success";
                                        break;
                                    case '2':
                                        innerHTML = "Cancelled";
                                        textType = "danger";
                                        break;
                                }

                                document.getElementById("booking-status-" + booking_id).className = "text-" + textType;
                                document.getElementById("booking-status-invisible-" + booking_id).innerHTML = innerHTML;
                                document.getElementById("booking-status-" + booking_id).innerHTML = innerHTML;
                                
                                util.sweetAlert('success', 'Successfully updated status for this booking.');
                            } else {
                                util.sweetAlert('error', 'Failed to update status for this booking.');
                            }
                        }
                    }); 
                }
            }
        </script>
    </body>
</html>
