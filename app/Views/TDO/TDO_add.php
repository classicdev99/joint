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
                                <form action="<?= base_url(session('role') . '/TDO/add_submit') ?>" method="POST">

                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/TDO') ?>" class="btn btn-secondary mb-3" onclick="return confirm('Cancel create TDO?');">Cancel</a>
                                        </div>



                                        <div class="row mb-5">
                                            <h6 class="mb-3">TDO Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">TDO Owner</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="tdo_owner" id="tdo_owner">
                                                        <option disabled selected>-None-</option>
                                                        <option value="1">Owner 1</option>
                                                        <option value="2">Owner 2</option>
                                                        <option value="3">Owner 3</option>
                                                        <option value="4">Owner 4</option>
                                                    </select>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">TDO Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="tdo_name" id="tdo_name">
                                                        <option value="None" hidden>-None-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Current PIC Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" id="pic_name" name="pic_name">
                                                        <option hidden>-None-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">TDO Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="date" class="form-control" id="tdo_date" name="tdo_date">
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <label class="col-form-label">Company Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="company_name" name="company_name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label"> Purpose</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="purpose" name="purpose">
                                                    <div class="input-group-prepend">

                                                        <div class="input-group-text h-100"><i class="fa fa-users"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Company Updated</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="company_updated" id="company_updated">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Unloading Address</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="unloading_address" id="unloading_address">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <label class="col-form-label">Deals</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="deals" name="deals">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Cases</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cases" name="cases">

                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-6">
                                                <label class="col-form-label">TDO Status</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="tdo_status" id="tdo_status">

                                                </div>
                                            </div>
                                            <h6 class="mt-3">Description Information</h6>

                                            <div class="col-md-12">
                                                <label class="col-form-label"> Item Description</label>
                                                <div class="input-group">
                                                    <textarea name="item_description" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <h6 class="mt-3">System Info</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Category</label>
                                                <div class="input-group">
                                                    <input type="text" name="category" id="category" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Zoho Form Id</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="zoho_form_id" name="zoho_form_id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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