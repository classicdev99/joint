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
                                            
                                            <a href="<?= base_url('room_add') ?>" class="btn btn-primary mb-3" role="button" aria-pressed="true">Add New Room</a>
                                            
                                            <div class="wrapper">
                                                <table id="room-list" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>External Id</th>
                                                            <th>Room Type</th>
                                                            <th>Property Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if($rooms):
                                                                $i = 0;
                                                                foreach($rooms as $room): 
                                                                    $i++;
                                                        ?>
                                                                    <tr>
                                                                        <td><?= $i ?></td>
                                                                        <td><?php echo $room['external_id']; ?></td>
                                                                        <td><?php echo $room['room_type']; ?></td>
                                                                        <td>
                                                                            <?php 
                                                                                if ($room['property_id'] == 0 || $room['property_id'] == "") {
                                                                                    echo "n/a";
                                                                                } else {
                                                                                    foreach($properties as $property) {
                                                                                        if ($property['property_id'] == $room['property_id']) {
                                                                                            echo $property['name'];
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('room_edit/'.$room['room_id']);?>" class="btn btn-primary">
                                                                                <i class="fa fa-edit"></i>
                                                                            </a>
                                                                            <a href="<?php echo base_url('room_delete/'.$room['room_id']);?>" onclick="return confirm('Remove this room from system ?');" class="btn btn-danger">
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
                        { width: 10%, targets: 0},
                    ],
                    fixedColumns: true
                });
            });
        </script>
    </body>
</html>
