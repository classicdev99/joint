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
                                        <div class="card-body">
                                            <h4 class="header-title"><?= $title ?></h4>
                                            
                                            <br>
                                            
                                            <?php if(session()->getFlashdata('msg')):?>
                                            <div class="alert alert-warning">
                                            <?= session()->getFlashdata('msg') ?>
                                            </div>
                                            <?php endif;?>
                                            
                                            <a href="<?= base_url('unit_add') ?>" class="btn btn-primary mb-3" role="button" aria-pressed="true">Add New Unit</a>
                                            
                                            <div class="wrapper">
                                                <table id="unit-list" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>External Id</th>
                                                            <th>Unit Name</th>
                                                            <th style="width: 15%;">Unit Status</th>
                                                            <th style="width: 20%;">Property Name</th>
                                                            <th style="width: 20%;">Room Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if($units):
                                                                $i = 0;
                                                                foreach($units as $unit): 
                                                                    $i++;
                                                        ?>
                                                                    <tr>
                                                                        <td><?= $i ?></td>
                                                                        <td><?php echo $unit['external_id']; ?></td>
                                                                        <td><?php echo $unit['name']; ?></td>
                                                                        <td>
                                                                            <?php 
                                                                                $status = "n/a";
                                                                                
                                                                                switch($unit['status']) {
                                                                                    case "0":
                                                                                        $status = "Inactive";
                                                                                        break;
                                                                                    case "1":
                                                                                        $status = "Active";
                                                                                        break;
                                                                                    case "2":
                                                                                        $status = "SUPERIOR TWIN";
                                                                                        break;
                                                                                    case "3":
                                                                                        $status = "SUPERIOR KING";
                                                                                        break;
                                                                                    case "4":
                                                                                        $status = "DELUXE KING";
                                                                                        break;
                                                                                    case "5":
                                                                                        $status = "SUPER DELUXE KING";
                                                                                        break;
                                                                                    case "6":
                                                                                        $status = "JUNIOR SUITE (latest)";
                                                                                        break;
                                                                                }
                                                                                
                                                                                echo $status;
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php 
                                                                                if ($unit['property_id'] == 0 || $unit['property_id'] == "") {
                                                                                    echo "n/a";
                                                                                } else {
                                                                                    foreach($properties as $property) {
                                                                                        if ($property['property_id'] == $unit['property_id']) {
                                                                                            echo $property['name'];
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php 
                                                                                if ($unit['room_id'] == 0 || $unit['room_id'] == "") {
                                                                                    echo "n/a";
                                                                                } else {
                                                                                    foreach($rooms as $room) {
                                                                                        if ($room['room_id'] == $unit['room_id']) {
                                                                                            echo $room['room_type'];
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('unit_edit/'.$unit['unit_id']);?>" class="btn btn-primary">
                                                                                <i class="fa fa-edit"></i>
                                                                            </a>
                                                                            <a href="<?php echo base_url('unit_delete/'.$unit['unit_id']);?>" onclick="return confirm('Remove this unit from system ?');" class="btn btn-danger">
                                                                                <i class="fa fa-trash"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                        <?php 
                                                                endforeach;
                                                            endif; 
                                                        ?>
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
                $('#unit-list').DataTable({
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,
                    columnDefs: [
                        { width: 125, targets: 2},
                        { width: 125, targets: 3},
                        { width: 150, targets: 6},
                        { width: 150, targets: 7},
                        { width: 500, targets: 18},
                    ],
                    fixedColumns: true
                });
            });
        </script>
    </body>
</html>
