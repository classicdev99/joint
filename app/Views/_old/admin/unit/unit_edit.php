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
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title"><?= $title ?></h4>
                                            
                                            <br>
                                            
                                            <?php if(session()->getFlashdata('msg')):?>
                                            <div class="alert alert-warning">
                                            <?= session()->getFlashdata('msg') ?>
                                            </div>
                                            <?php endif;?>
                                            
                                            <form action="<?php echo base_url('admin/unit_edit_back/'.$unit['unit_id']);?>" method="post">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">External Id</label>
                                                        <input class="form-control" type="text" name="external_id" placeholder="Enter External Id" id="example-text-input" value="<?= $unit['external_id'] ?>" required>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Unit Name</label>
                                                        <input class="form-control" type="text" name="name" placeholder="Enter Unit Name" id="example-text-input" value="<?= $unit['name'] ?>" required>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Unit Status</label>
                                                        <select class="form-control" name="status" required>
                                                            <option hidden>--Select--</option>
                                                            <option value="0" <?= $unit['status'] == '0' ? 'selected' : '' ?>>Inactive</option>
                                                            <option value="1" <?= $unit['status'] == '1' ? 'selected' : '' ?>>Active</option>
                                                            <option value="2" <?= $unit['status'] == '2' ? 'selected' : '' ?>>SUPERIOR TWIN</option>
                                                            <option value="3" <?= $unit['status'] == '3' ? 'selected' : '' ?>>SUPERIOR KING</option>
                                                            <option value="4" <?= $unit['status'] == '4' ? 'selected' : '' ?>>DELUXE KING</option>
                                                            <option value="5" <?= $unit['status'] == '5' ? 'selected' : '' ?>>SUPER DELUXE KING</option>
                                                            <option value="6" <?= $unit['status'] == '6' ? 'selected' : '' ?>>JUNIOR SUITE (latest)</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Property</label>
                                                        <select class="form-control" name="property_id" required>
                                                            <option hidden>--Select--</option>
                                                            <option value="0" <?= $unit['property_id'] == '0' ? 'selected' : '' ?>>n/a</option>
                                                            <?php
                                                                foreach ($properties as $property) {
                                                            ?>
                                                                    <option value="<?= $property['property_id'] ?>" <?= $unit['property_id'] == $property['property_id'] ? 'selected' : '' ?>>
                                                                        <?= $property['name'] ?>
                                                                    </option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Room Type</label>
                                                        <select class="form-control" name="room_id" required>
                                                            <option hidden>--Select--</option>
                                                            <option value="0" <?= $unit['room_id'] == '0' ? 'selected' : '' ?>>n/a</option>
                                                            <?php
                                                                foreach ($rooms as $room) {
                                                                    $db = \Config\Database::connect();
                                                                    $property_name = $db->query("SELECT * FROM properties WHERE property_id = '$room[property_id]'")->getResultArray()[0]['name'];
                                                            ?>
                                                                    <option value="<?= $room['room_id'] ?>" <?= $unit['room_id'] == $room['room_id'] ? 'selected' : '' ?>>
                                                                        <?= $room['room_type']." - ".$property_name ?>
                                                                    </option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </form>
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
    </body>
</html>
