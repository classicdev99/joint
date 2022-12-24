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
                                        <a href="<?= base_url(session('role').'/lead/add') ?>" class="btn btn-primary mb-3">Add Lead</a>

                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            </th>
                                                            <th>Lead Name</th>
                                                            <th>Company</th>
                                                            <th>Customer Type</th>
                                                            <th>Lead Source</th>
                                                            <th>Lead Status</th>
                                                            <th>Categorized Product</th>
                                                            <th>Brands</th>
                                                            <th>Created Time</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                            <th>Created By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if(isset($leads)) {
                                                            foreach ($leads as $lead) 
                                                            { ?>
                                                                <tr>
                                                                    <td><input class="form-check-input" type="checkbox" value="<?= $lead['id']; ?>" id="flexCheckDefault"></td>
                                                                    <td><a href="<?= base_url(session('role').'/lead/view/'.$lead['id']) ?>"><?= $lead['title']; ?></a></td>
                                                                    <td><?= $lead['company']; ?></td>
                                                                    <td><?= $lead['customertype']; ?></td>
                                                                    <td><?= $lead['leadsource']; ?></td>
                                                                    <td><?= $lead['leadstatus']; ?></td>
                                                                    <td><?= $lead['categorizedproduct']; ?></td>
                                                                    <td><?= $lead['brands']; ?></td>
                                                                    <td><?= date("d-m-Y", strtotime($lead['created_at'])); ?></td>
                                                                    <td><?= $lead['email']; ?></td>
                                                                    <td><?= $lead['mobile']; ?></td>
                                                                    <td><?= $lead['createdby']; ?></td>
                                                                    <td>
                                                                        <a href="<?= base_url(session('role').'/lead/edit/'.$lead['id']) ?>" class="btn btn-primary btn-sm" title="Update Lead">
                                                                            <i class='fas fa-edit'></i>
                                                                        </a>
                                                                        <a href="<?= base_url(session('role').'/lead/delete/'.$lead['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?');" title="Delete Lead">
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