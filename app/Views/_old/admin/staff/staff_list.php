<!doctype html>
<html lang="en">

    <head>
        <?= $this->include('admin/layouts/title-meta') ?>
        <?= $this->include('admin/layouts/css') ?>
    </head>
    
    <style>
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content/Box */
        .modal-content {
          background-color: #fefefe;
          margin: 15% auto; /* 15% from the top and centered */
          padding: 20px;
          border: 1px solid #888;
          width: 80%; /* Could be more or less, depending on screen size */
        }
        
        /* The Close Button */
        .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: black;
          text-decoration: none;
          cursor: pointer;
        } 
    </style>
    
    
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
                                                
                                            <a href="<?= base_url('staff_add') ?>" class="btn btn-primary mb-3" role="button" aria-pressed="true">Add New Staff</a>
       
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone No.</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if($staffs): ?>
                                                    <?php foreach($staffs as $s): ?>
                                                        <tr>
                                                            <td><?php echo $s['staff_id']; ?></td>
                                                            <td><?php echo $s['name']; ?></td>
                                                            <td><?php echo $s['email']; ?></td>
                                                            <td><?php echo $s['phone_no']; ?> </td>
                                                            <td>
                                                                <?php 
                                                                    switch($s['role']) {
                                                                        case 0:
                                                                            echo "Admin";
                                                                            break;
                                                                        case 1:
                                                                            echo "Staff";
                                                                            break;
                                                                        case 2:
                                                                            echo "Cleaner";
                                                                            break;
                                                                        case 3:
                                                                            echo "Technician";
                                                                            break;
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url('staff_edit/'.$s['staff_id']) ?>" class="btn btn-primary" role="button" aria-pressed="true">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="<?= base_url('staff_delete/'.$s['staff_id']) ?>" class="btn btn-danger" role="button" aria-pressed="true" onclick="return confirm('Remove this data from system ?');">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                 <?php endif; ?>
                                                </tbody>
                                            </table>
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
