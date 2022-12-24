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
                                                <table id="task-list" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Booking Code</th>
                                                            <th>Created At</th>
                                                            <th>Technician Name</td>
                                                            <th>Task Status</th>
                                                            <th>Task</td>
                                                            <th>Pictures</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if($tasks):
                                                                $i=0;
                                                                foreach($tasks as $task):
                                                        ?>
                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td><?php echo $task['code']; ?></td>
                                                            <td><?= $task['task_created_at'] ?></td>
                                                            <td><?= $task['name'] ?></td>
                                                            
                                                            <?php
                                                                switch($task['task_status']) {
                                                                    case 0:
                                                                        $status = "In Progress";
                                                                        $textType = "warning";
                                                                        break;
                                                                    case 1:
                                                                        $status = "Completed";
                                                                        $textType = "success";
                                                                        break;
                                                                    case 2:
                                                                        $status = "Cancelled";
                                                                        $textType = "danger";
                                                                        break;
                                                                }
                                                            ?>
                                                            <td>
                                                                <p class="invisible-p" id="task-status-invisible-<?= $task['task_id'] ?>"><?= $status ?></p>
                                                                
                                                                <span class="text-<?= $textType ?>" style="text-align: center;" id="task-status-<?= $task['task_id'] ?>">
                                                                    <?= $status ?>
                                                                </span>
                                                            </td>
                                                            
                                                            <td style="white-space: pre-line; width: 30%;"><?= $task['task'] ?></td>
                                                            
                                                            <td>
                                                                <?php
                                                                    $pictures = $task['task_picture'] == "" ? [] : explode(",", $task['task_picture']);
                                                                    
                                                                    if (COUNT($pictures) == 0) {
                                                                        echo "n/a";
                                                                    } else {
                                                                        $c = 0;
                                                                        foreach($pictures as $p) {
                                                                            $c++;
                                                                    ?>
                                                                            <a href="<?= base_url('/uploads/mobile_app/images/task/'.$p) ?>" target="_blank">View</a>
                                                                    <?php
                                                                            if ($c % 3 == 0) {
                                                                                echo "<br>";
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </td>
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
