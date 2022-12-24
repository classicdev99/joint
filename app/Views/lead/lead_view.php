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
                                            <button type="submit" name="submitaddlead" class="btn btn-primary mb-3">Save</button>
                                            &ensp;
                                            <a href="<?= base_url(session('role').'/lead') ?>" class="btn btn-secondary mb-3" onclick="return confirm('Cancel update lead?');">Cancel</a>
                                        </div> -->
                                            
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Lead Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Lead Owner</label>
                                                <div class="input-group">
                                                    <?= $lead['leadowner']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Lead Status</label>
                                                <div class="input-group">
                                                    <?= $lead['leadstatus']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Prefix</label>
                                                <div class="input-group">
                                                    <?= $lead['prefix']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Lead Source</label>
                                                <div class="input-group">
                                                    <?= $lead['leadsource']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Last Name</label>
                                                <div class="input-group">
                                                    <?= $lead['lastname']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Source Remark</label>
                                                <div class="input-group">
                                                    <?= $lead['sourceremark']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Title</label>
                                                <div class="input-group">
                                                    <?= $lead['title']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Industry</label>
                                                <div class="input-group">
                                                    <?= $lead['industry']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Company</label>
                                                <div class="input-group">
                                                    <?= $lead['company']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Phone</label>
                                                <div class="input-group">
                                                    <?= $lead['phone']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Mobile</label>
                                                <div class="input-group">
                                                    <?= $lead['mobile']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Fax</label>
                                                <div class="input-group">
                                                    <?= $lead['fax']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Email</label>
                                                <div class="input-group">
                                                    <?= $lead['email']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Website</label>
                                                <div class="input-group">
                                                    <?= $lead['website']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Secondary Email</label>
                                                <div class="input-group">
                                                    <?= $lead['secondaryemail']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0"></label>
                                                <div class="form-check">
                                                <!-- <input name="" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" > -->
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Email Opt Out
                                                </label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Customer Type</label>
                                                <div class="input-group">
                                                    <?= $lead['customertype']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Enquiry By</label>
                                                <div class="input-group">
                                                    <?= $lead['enquiryby']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Action Required</label>
                                                <div class="input-group">
                                                    <?= $lead['actionrequired']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Current PIC Name</label>
                                                <div class="input-group">
                                                    <?= $lead['currentpic']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Categorized Product</label>
                                                <div class="input-group">
                                                    <?= $lead['categorizedproduct']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Brands</label>
                                                <div class="input-group">
                                                    <?= $lead['brands']; ?>
                                                </div>
                                            </div>
                                            
                                        </div>        
                                    
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Address Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Country</label>
                                                <div class="input-group">
                                                    <?= $lead['country']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Street</label>
                                                <div class="input-group">
                                                    <?= $lead['street']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">State</label>
                                                <div class="input-group">
                                                    <?= $lead['state']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">City</label>
                                                <div class="input-group">
                                                    <?= $lead['city']; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6"></div>
                                            
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Zip Code</label>
                                                <div class="input-group">
                                                    <?= $lead['code']; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Description Information</h6>
                                            <div class="col-md-12">
                                                <label class="col-form-label pb-0">Description</label>
                                                <div class="input-group">
                                                    <?= $lead['descinformation']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-5">
                                            <h6 class="mb-3">System Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label pb-0">Bee Owner</label>
                                                <div class="input-group">
                                                    <?= $lead['systeminfo']; ?>
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