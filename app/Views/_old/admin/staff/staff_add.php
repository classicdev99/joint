<!doctype html>
<html lang="en">

    <head>
        <?= $this->include('admin/layouts/title-meta') ?>
        <?= $this->include('admin/layouts/css') ?>
    </head>
    
    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?= $this->include('admin/layouts/sidebar') ?>
       

        <!-- ========== Left Sidebar Start ========== -->
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
                                            
                                            <?php if(session()->getFlashdata('msg')):?>
                                            <div class="alert alert-warning">
                                            <?= session()->getFlashdata('msg') ?>
                                            </div>
                                            <?php endif;?>
                                           
                                            <form action="<?php echo base_url('admin/staff_add_back');?>" method="post">
                                                <div class="row">
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
                                                        <input class="form-control" type="text" name="name" placeholder="Enter Name" required>
                                                    </div>
                                                   
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                                                        <input class="form-control" type="email" name="email" placeholder="Enter Email" required>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Phone No</label>
                                                        <input class="form-control" type="text" name="phone_no" placeholder="Enter Phone Number" required>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Role</label>
                                                        <select name="role" class="form-control" required>
                                                            <option hidden>-- Please Select --</option>
                                                            <option value="0">Admin</option>
                                                            <option value="1">Staff</option>
                                                            <option value="2">Cleaner</option>
                                                            <option value="3">Technician</option> 
                                                        </select>                                              
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Password</label>
                                                        <input class="form-control" type="text" name="password" placeholder="Enter Password" required>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Add</button>
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
