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
                                <form action="<?= base_url(session('role') . '/contact/add_submit') ?>" method="POST">
                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/contact') ?>"
                                                class="btn btn-secondary mb-3"
                                                onclick="return confirm('Cancel create contact?');">Cancel</a>
                                        </div>
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Contact Information</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Accounts</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="AccountId" id="AccountId"
                                                        onchange="getInfo(this);">
                                                        <?php
                                                        foreach ($account as $acc) {
                                                        ?>
                                                        <option value="<?= $acc['accountname'] ?>">
                                                            <?= $acc['accountname'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><a
                                                                href="<?= base_url(session('role') . '/account/add') ?>">+<i
                                                                    class="fa fa-user"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Lead Source</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="leadSource">
                                                        <?php
                                                        foreach ($leadsources as $leadsource) {
                                                        ?>
                                                        <option value="<?= $leadsource['id'] ?>">
                                                            <?= $leadsource['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!--<option value="lead source one">lead source one</option>-->
                                                        <!--<option value="lead source two">lead source two</option>-->
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Prefix</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="prefix">
                                                        <?php
                                                        foreach ($prefixes as $prefix) {
                                                        ?>
                                                        <option value="<?= $prefix['id'] ?>"><?= $prefix['name'] ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!--<option value="prefix one">prefix one</option>-->
                                                        <!--<option value="prefix two">prefix two</option>-->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="lastName">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Department</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="department" id="department">
                                                        <option value="Purchasing">Purchasing</option>
                                                        <option value="QA/QC">QA/QC</option>
                                                        <option value="Engineering/FA">Engineering/FA</option>
                                                        <option value="Operation">Operation</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="Management">Management</option>
                                                        <option value="Lab">Lab</option>
                                                        <option value="Admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Office Phone</label>
                                                <div class="input-group">
                                                    <input type="tel" class="form-control" name="officephone"
                                                        id="officephone">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Email</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Secondary Email</label>
                                                <div class="input-group">
                                                    <div class="col-md-1">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="hassecondaryemail" name="hassecondaryemail">
                                                    </div>
                                                    <div class="col-md-11" id="secondary_email">
                                                        <input type="text" class="form-control" name="secondaryEmail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Mobile</label>
                                                <div class="input-group">
                                                    <input type="tel" class="form-control" name="mobile" id="mobile">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Secondary Mobile Phone</label>
                                                <div class="input-group">
                                                    <div class="col-md-1">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="hassecondaryphone" name="hassecondaryphone">
                                                    </div>
                                                    <div class="col-md-11" id="secondary" name="secondary">
                                                        <input name="secondaryphone" type="tel" class="form-control"
                                                            id="secondaryphone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Phone</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="phone" id="phone">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Categories Product</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="categoriesProduct">
                                                        <?php
                                                        foreach ($productcategoryes as $productcategory) {
                                                        ?>
                                                        <option value="<?= $productcategory['id'] ?>">
                                                            <?= $productcategory['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Attitude</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="attitude">
                                                        <option value="Attitude one">Attitude one</option>
                                                        <option value="Attitude two">Attitude two</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    <?= $this->include('script/contact_phone') ?>
</body>

</html>