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
                                <form
                                    action="<?= base_url(session('role') . '/contact/edit_submit/' . $record['id']) ?>"
                                    method="POST">
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
                                                        <option value="<?= $acc["id"] ?>"><?= $acc['accountname'] ?>
                                                        </option>
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
                                                        <option
                                                            <?=$record['leadSource']==$leadsource["id"]?'selected':''?>
                                                            value="<?= $leadsource['id'] ?>"><?= $leadsource['name'] ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!--<option value="lead Source one">lead Source one</option>-->
                                                        <!--<option value="lead Source two">lead Source two</option>-->
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
                                                        <option <?=$record['leadSource']==$prefix["id"]?'selected':''?>
                                                            value="<?= $prefix['id'] ?>"><?= $prefix['name'] ?></option>
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
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" value="<?= $record['lastName'] ?>"
                                                        class="form-control" name="lastName">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Department</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="department" id="department"
                                                        value="<?= $record['title'] ?>">
                                                        <option value=" Purchasing">Purchasing</option>
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
                                                        id="officephone" value="<?= $record['officephone'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" value="<?= $record['email'] ?>"
                                                        class="form-control" name="email">
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
                                                    <input type="tel" class="form-control" name="mobile" id="mobile"
                                                        value="<?= $record['mobile'] ?>">
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
                                                    <input type="text" class="form-control" name="phone" id="phone"
                                                        value="<?= $record['phone'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Categories Product</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="categoriesProduct">
                                                        <?php
                                                        foreach ($productcategoryes as $productcategory) {
                                                        ?>
                                                        <option
                                                            <?=$record['categoriesProduct']==$productcategory["id"]?'selected':''?>
                                                            value="<?= $productcategory['id'] ?>">
                                                            <?= $productcategory['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!--<option value="categories product one">categories product one</option>-->
                                                        <!--<option value="categories product two">categories product two</option>-->
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
                                </form>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- container-fluid -->

            </div>
            <!-- End Page-content -->
            <script type="text/javascript">
            function getInfo(e) {
                var a = $('#AccountId option:selected').text();
                $('#AccountName').val(a);

            }
            </script>
            <?= $this->include('layouts/footer') ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?= $this->include('layouts/script') ?>
    <?= $this->include('script/contact_phone') ?>
</body>

</html>