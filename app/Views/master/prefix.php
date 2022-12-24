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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p>
                                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Add Prefix
                                            </a>
                                        </p>
                                        <div class="collapse mb-5" id="collapseExample">
                                            <form action="<?= base_url(session('role').'/master/add/prefix') ?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                            <input name="name" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Description</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                            <input name="description" type="text" class="form-control">
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="d-flex flex-row-reverse mt-2">
                                                    <button type="submit" name="" class="btn btn-primary mb-3">Save</button>
                                                </div>
                                            </form>
                                        </div>

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
                                                        if(isset($prefixes)) {
                                                            foreach ($prefixes as $prefix) 
                                                            { ?>
                                                                <tr>
                                                                    <td><input class="form-check-input" type="checkbox" value="<?= $prefix['id']; ?>" id="flexCheckDefault"></td>
                                                                    <td><?= $prefix['name']; ?></td>
                                                                    <td>
                                                                        <?php 
                                                                        if($prefix['active'] == 1) { ?>
                                                                            <button type="button" class="btn btn-success">Active</button>
                                                                        <?php
                                                                        } else { ?>
                                                                            <button type="button" class="btn btn-danger">Inactive</button>
                                                                        <?php
                                                                        } ?>
                                                                    </td>
                                                                    <td><?= date("d-m-Y", strtotime($prefix['created_at'])); ?></td>
                                                                    <td><?= $prefix['created_at']; ?></td>
                                                                    <td>
                                                                        <!-- <a href="<?= base_url(session('role').'/prefix/edit/'.$prefix['id']) ?>" class="btn btn-primary btn-sm" title="Update prefix">
                                                                            <i class='fas fa-edit'></i>
                                                                        </a>
                                                                        <a href="<?= base_url(session('role').'/prefix/delete/'.$prefix['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?');" title="Delete prefix">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </a> -->
                                                                        <a href=" class="btn btn-primary btn-sm" title="Update prefix">
                                                                            <i class='fas fa-edit'></i>
                                                                        </a>
                                                                        <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?');" title="Delete prefix">
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