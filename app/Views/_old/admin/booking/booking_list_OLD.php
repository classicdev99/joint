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
                                            
                                            <!--
                                            <a href="<?= base_url('booking_add') ?>" class="btn btn-primary mb-3" role="button" aria-pressed="true">Add New Booking</a>
                                            -->

                                            <!-- Assign Cleaner Modal (ACM) -->
                                            <div class="modal fade" id="acm" tabindex="-1" aria-labelledby="acm" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title">Assign Cleaner (Booking Code: <span id="acm-code"></span>)</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <form method="post" action="<?= base_url('admin/assign_task') ?>"> <!-- same as previous -->
                                                    <div class="modal-body">
                                                        <input id="acm-booking_id" name="booking_id" value="" hidden>
                                                        <input id="acm-unit_id" name="unit_id" value="" hidden>
                                                        <input name="role" value="2" hidden>
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Cleaner</label>
                                                                <select class="form-control" name="staff_id" id="acm-cleaner_id">
                                                                    <option hidden>--Select--</option>
                                                                    <?php
                                                                        foreach($cleaners as $c) {
                                                                    ?>
                                                                            <option value="<?= $c['staff_id'] ?>"><?= $c['name'] ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Cleaner's Task</label>
                                                                <textarea class="form-control" name="task" rows="5" id="acm-task"></textarea>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" *onclick="assignCleanerTaskSubmit();">Submit</button>
                                                      </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            <!-- Assign Technician Modal (ATM) -->
                                            <div class="modal fade" id="atm" tabindex="-1" aria-labelledby="atm" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title">Assign Technician (Booking Code: <span id="atm-code"></span>)</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <form method="post" action="<?= base_url('admin/assign_task') ?>"> <!-- same as previous -->
                                                    <div class="modal-body">
                                                        <input id="atm-booking_id" name="booking_id" value="" hidden>
                                                        <input id="atm-unit_id" name="unit_id" value="" hidden>
                                                        <input name="role" value="3" hidden>
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Technician</label>
                                                                <select class="form-control" name="staff_id" id="atm-technician_id">
                                                                    <option hidden>--Select--</option>
                                                                    <?php
                                                                        foreach($technicians as $t) {
                                                                    ?>
                                                                            <option value="<?= $t['staff_id'] ?>"><?= $t['name'] ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Technician's Task</label>
                                                                <textarea class="form-control" name="task" rows="5" id="atm-task"></textarea>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" *onclick="assignTechnicianTaskSubmit();">Submit</button>
                                                      </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            <!-- Change Unit Modal (CUM) -->
                                            <div class="modal fade" id="cum" tabindex="-1" aria-labelledby="cum" aria-hidden="true">
                                              <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title">Change Unit (Booking Code: <span id="cum-code"></span>)</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <form method="post" action="<?= base_url('admin/change_unit') ?>"> <!-- same as previous -->
                                                    <div class="modal-body">
                                                        <input id="cum-booking_id" name="booking_id" value="" hidden>
                                                        <input id="cum-previous_unit" name="previous_unit" value="" hidden>
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Unit</label>
                                                                <select class="form-control" name="unit_id" id="cum-unit_id">
                                                                    <option hidden>--Select--</option>
                                                                    <?php
                                                                        foreach($units as $u) {
                                                                            $property_name = ", ";
                                                                            if ($u['property_id'] == "0") {
                                                                                $property_name = "";
                                                                            } else {
                                                                                $property_name .= $db->query("SELECT * FROM properties WHERE property_id = '$u[property_id]'")->getResultArray()[0]['name'];
                                                                            }
                                                                            
                                                                            $room_type = ", ";
                                                                            if ($u['room_id'] == "0") {
                                                                                $room_type = "";
                                                                            } else {
                                                                                $room_type .= $db->query("SELECT * FROM rooms WHERE room_id = '$u[room_id]'")->getResultArray()[0]['room_type'];
                                                                            }
                                                                    ?>
                                                                            <option value="<?= $u['unit_id'] ?>"><?= $u['external_id'].", ".$u['name'].$room_type.$property_name ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Assign A Cleaner to Clean Up the Current Unit</label>
                                                                <select class="form-control" name="staff_id" id="cum-cleaner_id" required>
                                                                    <option hidden>--Select--</option>
                                                                    <option value="0">n/a</option>
                                                                    <?php
                                                                        foreach($cleaners as $c) {
                                                                    ?>
                                                                            <option value="<?= $c['staff_id'] ?>"><?= $c['name'] ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Cleaner's Task</label>
                                                                <textarea class="form-control" name="task" rows="5" id="cum-task">Changed unit, cleanup needed.</textarea>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                      </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            <!-- Check Out Modal (COM) -->
                                            <div class="modal fade" id="com" tabindex="-1" aria-labelledby="cum" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title">Checkout Now (Booking Code: <span id="com-code"></span>)</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <form method="post" action="<?= base_url('admin/check_out') ?>"> <!-- same as previous -->
                                                    <div class="modal-body">
                                                        <input id="com-booking_id" name="booking_id" value="" hidden>
                                                        <input id="com-previous_unit" name="unit_id" value="" hidden>
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Assign A Cleaner to Clean Up the Unit</label>
                                                                <select class="form-control" name="staff_id" id="com-cleaner_id" required>
                                                                    <option hidden>--Select--</option>
                                                                    <option value="0">n/a</option>
                                                                    <?php
                                                                        foreach($cleaners as $c) {
                                                                    ?>
                                                                            <option value="<?= $c['staff_id'] ?>"><?= $c['name'] ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-12 mb-3">
                                                                <label class="form-label">Cleaner's Task</label>
                                                                <textarea class="form-control" name="task" rows="5" id="com-task">Checked out, cleanup needed.</textarea>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Confirm checkout this booking ?');">Submit & Checkout</button>
                                                      </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                            <script>
                                                function changeUnit(code, booking_id, previous_unit) {
                                                    $('#cum-code').text(code);
                                                    $('#cum-booking_id').val(booking_id);
                                                    $('#cum-previous_unit').val(previous_unit);
                                                }
                                                
                                                function checkOut(code, booking_id, unit_id) {
                                                    $('#com-code').text(code);
                                                    $('#com-booking_id').val(booking_id);
                                                    $('#com-previous_unit').val(unit_id);
                                                }
                                            
                                                function assignCleanerTask(code, booking_id, unit_id) {
                                                    $('#acm-code').text(code);
                                                    $('#acm-booking_id').val(booking_id);
                                                    $('#acm-unit_id').val(unit_id);
                                                }
                                                
                                                function assignTechnicianTask(code, booking_id, unit_id) {
                                                    $('#atm-code').text(code);
                                                    $('#atm-booking_id').val(booking_id);
                                                    $('#atm-unit_id').val(unit_id);
                                                }
                                            </script>

                                            <div class="wrapper">
                                                <table id="booking-list" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Action</th>
                                                            <th>Cleaner Task</th>
                                                            <th>Technician Task</th>
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
                                                            <!--
                                                            <th>Room Price</th>
                                                            <th>Cleaning Fee</th>
                                                            <th>Extra Guest Fee</th>
                                                            <th>Platform Fee</th>
                                                            <th>Source</th>
                                                            <th>Remarks</th>
                                                            -->
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
                                                            <td style="padding-top: 4px;">
                                                                <div class="dropdown mt-3 mt-sm-0">
                                                                    <a class="btn btn-secondary btn-sm mb-1 w-100" href="#" id="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #7d85eb;">Action</a>
                        
                                                                    <div class="dropdown-menu" aria-labelledby="">
                                    
                                                                        <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#acm" href="#" onclick="assignCleanerTask('<?= $booking['code'] ?>', '<?= $booking['booking_id'] ?>', '<?= $booking['unit_id'] ?>');">Assign Cleaner</a>
                                                                        
                                                                        <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#atm" href="#" onclick="assignTechnicianTask('<?= $booking['code'] ?>', '<?= $booking['booking_id'] ?>', '<?= $booking['unit_id'] ?>');">Assign Technician</a>
                                                                        
                                                                        <a class="dropdown-item text-danger" href="#" onclick="updateBookingStatus('2', '<?= $booking['booking_id'] ?>');">Cancel Booking</a>
                                                                        
                                                                        <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cum" href="#" onclick="changeUnit('<?= $booking['code'] ?>', '<?= $booking['booking_id'] ?>', '<?= $booking['unit_id'] ?>');">Change Unit</a>
                                                                        
                                                                        <a class="dropdown-item text-success" href="#" data-bs-toggle="modal" data-bs-target="#com" href="#" onclick="checkOut('<?= $booking['code'] ?>', '<?= $booking['booking_id'] ?>', '<?= $booking['unit_id'] ?>');">
                                                                            Checkout Now
                                                                        </a>
        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            
                                                            
                                                            <td style="padding-top: 4px;">
                                                                <?php
                                                                    $tasks = $db->query("SELECT *, tasks.created_at as task_created_at, tasks.picture as task_picture FROM tasks LEFT JOIN staffs ON staffs.staff_id = tasks.staff_id WHERE tasks.booking_id = '$booking[booking_id]' AND tasks.role = 2 ORDER BY tasks.task_id ASC")->getResultArray();
                                                                    
                                                                    if (COUNT($tasks) == 0) {
                                                                        echo "n/a";
                                                                    } else {
                                                                        foreach($tasks as $task) {
                                                                            $text_color = $task['status'] == "0" ? "text-warning" : "text-success";
                                                                            $pictures = $task['task_picture'] == "" ? [] : explode(",", $task['task_picture']);
                                                                ?>
                                                                            <div class="row">
                                                                                <span>
                                                                                    <button class="btn btn-<?= $task['status'] == "0" ? "warning" : "success" ?> btn-sm mb-1 w-100"
                                                                                        data-bs-toggle="modal" data-bs-target="#vct-<?= $task['task_id'] ?>">
                                                                                        <i class="fa fa-<?= $task['status'] == "0" ? "spinner" : "check" ?>"></i>
                                                                                        <?= $task['name'] ?? ""; ?>
                                                                                    </button>
                                                                                    <div class="modal fade" id="vct-<?= $task['task_id'] ?>" tabindex="-1" aria-labelledby="vct-<?= $task['task_id'] ?>" aria-hidden="true">
                                                                                      <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                          <div class="modal-header">
                                                                                            <h5 class="modal-title">Cleaner Task (Booking Code: <span><?= $booking['code'] ?></span>)</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                          </div>
                                                                                          <form method="post" action="<?= base_url('admin/task_edit_back') ?>"> <!-- same as previous -->
                                                                                            <div class="modal-body">
                                                                                                <input name="task_id" value="<?= $task['task_id'] ?>" hidden>
                                                                                                <input name="role" value="<?= $task['role'] ?>" hidden>
                                                                                                <div class="row">
                                                                                                    <div class="col-6 mb-3">
                                                                                                        <label class="form-label">Date</label>
                                                                                                        <input type="text" class="form-control" value="<?= $task['task_created_at'] ?>" disabled>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-6 mb-3">
                                                                                                        <label class="form-label">Task Status</label>
                                                                                                        <select class="form-control" name="status" value="<?= $task['status'] ?>">
                                                                                                            <option hidden>--Select--</option>
                                                                                                            <option value="0" <?= $task['status'] == "0" ? 'selected' : '' ?>>In Progress</option>
                                                                                                            <option value="1" <?= $task['status'] == "1" ? 'selected' : '' ?>>Completed</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <label class="form-label">Pictures</label>
                                                                                                        <?php
                                                                                                            if (COUNT($pictures) == 0) {
                                                                                                                echo "n/a";
                                                                                                            } else {
                                                                                                                foreach($pictures as $p) {
                                                                                                        ?>
                                                                                                                    <a href="<?= base_url(''.$p) ?>">View</a>
                                                                                                        <?php
                                                                                                                }
                                                                                                            }
                                                                                                        ?>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <label class="form-label">Cleaner</label>
                                                                                                        <select class="form-control" name="staff_id" value="<?= $task['staff_id'] ?>">
                                                                                                            <option hidden>--Select--</option>
                                                                                                            <?php
                                                                                                                foreach($cleaners as $c) {
                                                                                                            ?>
                                                                                                                    <option value="<?= $c['staff_id'] ?>" <?= $c['staff_id'] == $task['staff_id'] ? 'selected' : '' ?>>
                                                                                                                        <?= $c['name'] ?>
                                                                                                                    </option>
                                                                                                            <?php
                                                                                                                }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <label class="form-label">Cleaner's Task</label>
                                                                                                        <?php
                                                                                                            if ($task['is_changed_room'] == "1" || ($task['unit_id'] != $booking['unit_id'])) {
                                                                                                                $query1 = $db->query("SELECT * FROM units WHERE unit_id = '$task[unit_id]'")->getResultArray();
                                                                                                                $query2 = $db->query("SELECT * FROM units WHERE unit_id = '$booking[unit_id]'")->getResultArray();
                                                                                                                
                                                                                                                $previous_unit = COUNT($query1) > 0 ? $query1[0]['external_id'] : '';
                                                                                                                $after_unit = COUNT($query2) > 0 ? $query2[0]['external_id'] : '';
                                                                                                        ?>
                                                                                                                <p class="text-danger">
                                                                                                                    Note: This task is for previous unit only (<?= $previous_unit ?>), before changed unit to <?= $after_unit ?>.
                                                                                                                </p>
                                                                                                        <?php
                                                                                                            }
                                                                                                        ?>
                                                                                                        <textarea class="form-control" name="task" rows="5"><?= $task['task'] ?></textarea>
                                                                                                    </div>

                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                <?php
                                                                                                    if ($task['status'] == "0") {
                                                                                                ?>
                                                                                                        <a href="<?= base_url('admin/task_delete/'.$task['role'].'/'.$task['task_id']) ?>" class="btn btn-danger" onclick="return confirm('Delete this task from the system?');">Delete</a>
                                                                                                        
                                                                                                <?php
                                                                                                    }
                                                                                                ?>
                                                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                                                              </div>
                                                                                          </form>
                                                                                        </div>
                                                                                      </div>
                                                                                    </div>
                                                                                </span>
                                                                            </div>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td style="padding-top: 4px;">
                                                                <?php
                                                                    $tasks = $db->query("SELECT *, tasks.created_at as task_created_at, tasks.picture as task_picture FROM tasks LEFT JOIN staffs ON staffs.staff_id = tasks.staff_id WHERE tasks.booking_id = '$booking[booking_id]' AND tasks.role = 3 ORDER BY tasks.task_id ASC")->getResultArray();
                                                                    
                                                                    if (COUNT($tasks) == 0) {
                                                                        echo "n/a";
                                                                    } else {
                                                                        foreach($tasks as $task) {
                                                                            $text_color = $task['status'] == "0" ? "text-warning" : "text-success";
                                                                            $pictures = $task['task_picture'] == "" ? [] : explode(",", $task['task_picture']);
                                                                ?>
                                                                            <div class="row">
                                                                                <span>
                                                                                    <button class="btn btn-<?= $task['status'] == "0" ? "warning" : "success" ?> btn-sm mb-1 w-100"
                                                                                        data-bs-toggle="modal" data-bs-target="#vtt-<?= $task['task_id'] ?>">
                                                                                        <i class="fa fa-<?= $task['status'] == "0" ? "spinner" : "check" ?>"></i>
                                                                                        <?= $task['name'] ?? ""; ?>
                                                                                    </button>
                                                                                    <div class="modal fade" id="vtt-<?= $task['task_id'] ?>" tabindex="-1" aria-labelledby="vtt-<?= $task['task_id'] ?>" aria-hidden="true">
                                                                                      <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                          <div class="modal-header">
                                                                                            <h5 class="modal-title">Technician Task (Booking Code: <span><?= $booking['code'] ?></span>)</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                          </div>
                                                                                          <form method="post" action="<?= base_url('admin/task_edit_back') ?>"> <!-- same as previous -->
                                                                                            <div class="modal-body">
                                                                                                <input name="task_id" value="<?= $task['task_id'] ?>" hidden>
                                                                                                <input name="role" value="<?= $task['role'] ?>" hidden>
                                                                                                <div class="row">
                                                                                                    <div class="col-6 mb-3">
                                                                                                        <label class="form-label">Date</label>
                                                                                                        <input type="text" class="form-control" value="<?= $task['task_created_at'] ?>" disabled>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-6 mb-3">
                                                                                                        <label class="form-label">Task Status</label>
                                                                                                        <select class="form-control" name="status" value="<?= $task['status'] ?>">
                                                                                                            <option hidden>--Select--</option>
                                                                                                            <option value="0" <?= $task['status'] == "0" ? 'selected' : '' ?>>In Progress</option>
                                                                                                            <option value="1" <?= $task['status'] == "1" ? 'selected' : '' ?>>Completed</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <label class="form-label">Pictures</label>
                                                                                                        <?php
                                                                                                            if (COUNT($pictures) == 0) {
                                                                                                                echo "n/a";
                                                                                                            } else {
                                                                                                                foreach($pictures as $p) {
                                                                                                        ?>
                                                                                                                    <a href="<?= base_url('/uploads/mobile_app/images/task/'.$p) ?>">View</a>
                                                                                                        <?php
                                                                                                                }
                                                                                                            }
                                                                                                        ?>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <label class="form-label">Technician</label>
                                                                                                        <select class="form-control" name="staff_id" value="<?= $task['staff_id'] ?>">
                                                                                                            <option hidden>--Select--</option>
                                                                                                            <?php
                                                                                                                foreach($technicians as $t) {
                                                                                                            ?>
                                                                                                                    <option value="<?= $t['staff_id'] ?>" <?= $t['staff_id'] == $task['staff_id'] ? 'selected' : '' ?>>
                                                                                                                        <?= $t['name'] ?>
                                                                                                                    </option>
                                                                                                            <?php
                                                                                                                }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <label class="form-label">Cleaner's Task</label>
                                                                                                        <textarea class="form-control" name="task" rows="5"><?= $task['task'] ?></textarea>
                                                                                                    </div>

                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                <?php
                                                                                                    if ($task['status'] == "0") {
                                                                                                ?>
                                                                                                        <a href="<?= base_url('admin/task_delete/'.$task['role'].'/'.$task['task_id']) ?>" class="btn btn-danger" onclick="return confirm('Delete this task from the system?');">Delete</a>
                                                                                                        
                                                                                                <?php
                                                                                                    }
                                                                                                ?>
                                                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                                                              </div>
                                                                                          </form>
                                                                                        </div>
                                                                                      </div>
                                                                                    </div>
                                                                                </span>
                                                                            </div>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </td>
                                                            
                                                            <!--
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
                                                                    <a class="btn btn-light w-100" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="booking-status-dropdown-<?= $booking['booking_id'] ?>">
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
                                                            <td><?php echo $booking['name'] ?? "n/a"; ?></td>
                                                            
                                                            <td><?php echo $booking['persons']; ?></td>
                                                            <td><?php echo $booking['customer_email']; ?></td>
                                                            <!--
                                                            <td><?php echo $booking['room_price'] ?? ""; ?></td>
                                                            <td><?php echo $booking['cleaning_fee'] ?? ""; ?></td>
                                                            <td><?php echo $booking['extra_guest_fee'] ?? ""; ?></td>
                                                            <td><?php echo $booking['platform_fee'] ?? ""; ?></td>
                                                            <td><?php echo $booking['source']; ?></td>
                                                            <td style="text-align: justify;"><?php echo $booking['remarks']; ?></td>
                                                            -->
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
                        { width: 125, targets: 2},
                        { width: 125, targets: 3},
                        { width: 150, targets: 6},
                        { width: 150, targets: 7},
                        { width: 150, targets: 11},
                        { width: 150, targets: 12},
                        /*
                        { width: 500, targets: 20},
                        */
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
