<!doctype html>
<html lang="en">

    <head>
        <?= $this->include('layouts/title-meta') ?>
        <?= $this->include('layouts/css') ?>
    </head>
    
    <body data-sidebar="dark">
        <!-- Begin page -->
        <div id="layout-wrapper">
            <?= $this->include('layouts/topbar') ?>
            <!-- ========== Left Sidebar Start ========== -->
            <?= $this->include('layouts/sidebar') ?>
            
            <!-- Left Sidebar End -->
    
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content" id="result">
                <div class="page-content">
                    <?= $this->include('layouts/page-title') ?>
                    
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="<?= base_url(session('role').'/master/addactionrequired') ?>" class="btn btn-primary mb-3">Add Action Required</a>

                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 3%;">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            </th>
                                                            <th>Name</th>
                                                            <th>Active</th>
                                                            <th>Created Time</th>
                                                            <th>Created By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if(isset($actionrequired)) {
                                                            foreach ($actionrequired as $actionreq) 
                                                            { ?>
                                                                <tr>
                                                                    <td><input class="form-check-input" type="checkbox" value="<?= $actionreq['id']; ?>" id="flexCheckDefault"></td>
                                                                    <td><?= $actionreq['name']; ?></td>
                                                                    <td>
                                                                        <?php 
                                                                        if($actionreq['active'] == 1) { ?>
                                                                            <button type="button" class="btn btn-success">Active</button>
                                                                        <?php
                                                                        } else { ?>
                                                                            <button type="button" class="btn btn-danger">Inactive</button>
                                                                        <?php
                                                                        } ?>
                                                                    </td>
                                                                    <td><?= date("d-m-Y", strtotime($actionreq['created_at'])); ?></td>
                                                                    <td><?= $actionreq['created_at']; ?></td>
                                                                    <td>
                                                                        <!-- <a href="<?= base_url(session('role').'/actionrequired/edit/'.$actionreq['id']) ?>" class="btn btn-primary btn-sm" title="Update Action Required">
                                                                            <i class='fas fa-edit'></i>
                                                                        </a>
                                                                        <a href="<?= base_url(session('role').'/actionrequired/delete/'.$actionreq['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?');" title="Delete Action Required">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </a> -->
                                                                        <a href="" class="btn btn-primary btn-sm" title="Update Action Required">
                                                                            <i class='fas fa-edit'></i>
                                                                        </a>
                                                                        <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?');" title="Delete Action Required">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                    
                </div>
                <!-- End Page-content -->
    
                <?= $this->include('layouts/footer') ?>
                
            </div>
            <!-- end main content-->
    
        </div>
        <!-- END layout-wrapper -->
    
        <?= $this->include('layouts/script') ?>
    </body>
</html>