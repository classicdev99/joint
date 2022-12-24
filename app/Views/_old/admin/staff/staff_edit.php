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
                                           
                                            <form action="<?php echo base_url('admin/staff_edit_back/'.$staff['staff_id']);?>" method="post">
                                                <div class="row">
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
                                                        <input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?= $staff['name'] ?>" required>
                                                    </div>
                                                   
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                                                        <input class="form-control" type="name" name="email" placeholder="Enter Email" value="<?= $staff['email'] ?>" required>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Phone No</label>
                                                        <input class="form-control" type="text" name="phone_no" placeholder="Enter Phone Number" value="<?= $staff['phone_no'] ?>" required>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Role</label>
                                                        <select name="role" class="form-control" value="<?= $staff['role'] ?>" required>
                                                            <option hidden>-- Please Select --</option>
                                                            <option value="0" <?= $staff['role'] == 0 ? 'selected' : '' ?>>Admin</option>
                                                            <option value="1" <?= $staff['role'] == 1 ? 'selected' : '' ?>>Staff</option>
                                                            <option value="2" <?= $staff['role'] == 2 ? 'selected' : '' ?>>Cleaner</option>
                                                            <option value="3" <?= $staff['role'] == 3 ? 'selected' : '' ?>>Technician</option> 
                                                        </select>                                              
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Password</label>
                                                        <input class="form-control" type="text" name="password" placeholder="Enter Password" value="<?= $staff['password'] ?>" required>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Save</button>
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
