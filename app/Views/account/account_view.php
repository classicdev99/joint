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
                                        <!-- <div class="d-flex flex-row-reverse">
                                            <button type="submit" name="submitaddaccount" class="btn btn-primary mb-3">Save</button>
                                            &ensp;
                                            <a href="<?= base_url(session('role').'/account') ?>" class="btn btn-secondary mb-3" onclick="return confirm('Cancel add account?');">Cancel</a>
                                        </div> -->
                                            
                                        
                                        <div class="row mb-4">
                                            <h6 class="mb-3">Account Image</h6>
                                            <div class="col-md-12">
                                                <?php if(!empty($account['image'])) { ?>
                                                    <img src="<?= base_url($account['image']) ?>" class="rounded" alt="" height="65">
                                                <?php }else { ?>
                                                    <img src="<?= base_url('assets/images/no-camera.png') ?>" class="rounded" alt="" height="75">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Account Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Account Owner</label>
                                                <div class="input-group">
                                                    <?= $account['accountowner']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Rating</label>
                                                <div class="input-group">
                                                    <?= $account['rating']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Account Name</label>
                                                <div class="input-group">
                                                    <?= $account['accountname']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Phone</label>
                                                <div class="input-group">
                                                    <?= $account['phonenumber']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Account Site</label>
                                                <div class="input-group">
                                                    <?= $account['accountsite']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Fax</label>
                                                <div class="input-group">
                                                    <?= $account['fax']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Parent Account</label>
                                                <div class="input-group">
                                                    <?= $account['parentaccount']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Website</label>
                                                <div class="input-group">
                                                    <?= $account['website']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Account Number</label>
                                                <div class="input-group">
                                                    <?= $account['accountnumber']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Ownership</label>
                                                <div class="input-group">
                                                    <?= $account['ownership']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Industry</label>
                                                <div class="input-group">
                                                    <?= $account['industry']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Employees</label>
                                                <div class="input-group">
                                                    <?= $account['employees']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Annual Revenue</label>
                                                <div class="input-group">
                                                    <?= $account['annualrevenue']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">SIC Code</label>
                                                <div class="input-group">
                                                    <?= $account['sicccode']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Source Remark</label>
                                                <div class="input-group">
                                                    <?= $account['sourceremark']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Action Required</label>
                                                <div class="input-group">
                                                    <?= $account['actionrequired']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Territory</label>
                                                <div class="input-group">
                                                    <?= $account['territory']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Customer Type</label>
                                                <div class="input-group">
                                                    <?= $account['customertype']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Current PIC Name</label>
                                                <div class="input-group">
                                                    <?= $account['currentpic']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Payment Term</label>
                                                <div class="input-group">
                                                    <?= $account['paymentterm']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Account Email</label>
                                                <div class="input-group">
                                                    <?= $account['accountemail']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Address Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Billing Street</label>
                                                <div class="input-group">
                                                    <?= $account['billstreet']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Shipping Street</label>
                                                <div class="input-group">
                                                    <?= $account['shipstreet']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Billing City</label>
                                                <div class="input-group">
                                                    <?= $account['billcity']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Shipping City</label>
                                                <div class="input-group">
                                                    <?= $account['shipcity']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Billing State</label>
                                                <div class="input-group">
                                                    <?= $account['billstate']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Shipping State</label>
                                                <div class="input-group">
                                                    <?= $account['shipstate']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Billing Code</label>
                                                <div class="input-group">
                                                    <?= $account['billcode']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Shipping Code</label>
                                                <div class="input-group">
                                                    <?= $account['shipcode']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Billing Country</label>
                                                <div class="input-group">
                                                    <?= $account['billcountry']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Shipping Country</label>
                                                <div class="input-group">
                                                    <?= $account['shipcountry']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Description Information</h6>
                                            <div class="col-md-12">
                                                <label class="col-form-label pb-0">Description</label>
                                                <div class="input-group">
                                                    <?= $account['descinformation']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-5">
                                            <h6 class="mb-3">System Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Bee Owner</label>
                                                <div class="input-group">
                                                    <?= $account['systeminfo']; ?>
                                                </div>
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