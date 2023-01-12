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
                                                <label class="col-form-label">Contact Owner</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="contactOwner">
                                                        <option value="contact owner one">contact owner one</option>
                                                        <option value="contact owner two">contact owner two</option>
                                                    </select>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                                        <div class="input-group-text h-100"><i class="fa fa-user"></i>
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
                                                <label class="col-form-label">TDO Name</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="tdoName">
                                                        <option value="tdo one">tdo one</option>
                                                        <option value="tdo two">tdo two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Last Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" value="<?= $record['lastName'] ?>"
                                                        class="form-control" name="lastName">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Title</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['title'] ?>"
                                                        class="form-control" name="title">
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['accountName'] ?>" class="form-control" name="accountName">
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Accounts Name</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['accountName'] ?>"
                                                        class="form-control" name="AccountName" id="AccountName">
                                                    <?php if(0){ ?>
                                                    <select class="form-select" name="AccountName" id="AccountName">
                                                        <?php
                                                        foreach ($account as $acc) {
                                                        ?>
                                                        <option value="<?= $acc['accountname'] ?>">
                                                            <?= $acc['accountname'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php } ?>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Other Phone</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['otherPhone'] ?>"
                                                        class="form-control" name="otherPhone">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-users"></i>
                                                        </div>
                                                    </div>
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
                                                <label class="col-form-label">Mobile</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" value="<?= $record['mobile'] ?>"
                                                        class="form-control" name="mobile">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Phone</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['phone'] ?>"
                                                        class="form-control" name="phone">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Assistant</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['assistant'] ?>"
                                                        class="form-control" name="assistant">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Department</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['department'] ?>"
                                                        class="form-control" name="department">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Source Remark</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['sourceRemark'] ?>"
                                                        class="form-control" name="sourceRemark">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Home Phone</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['homePhone'] ?>"
                                                        class="form-control" name="homePhone">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label"></label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="emailOptOut"
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Email Opt Out
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Fax</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['fax'] ?>"
                                                        class="form-control" name="fax">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Secondary Email</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['secondaryEmail'] ?>"
                                                        class="form-control" name="secondaryEmail">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Date of Birth</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['dateofBirth'] ?>"
                                                        class="form-control" name="dateofBirth">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Secondary Mobile Phone</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['secondaryMobilePhone'] ?>"
                                                        class="form-control" name="secondaryMobilePhone">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Asst Phone</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['asstPhone'] ?>"
                                                        class="form-control" name="asstPhone">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Reporting To</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['reportingTo'] ?>"
                                                        class="form-control" name="reportingTo">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Customer Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="customerType">
                                                        <?php
                                                        foreach ($customertypes as $customertype) {
                                                        ?>
                                                        <option
                                                            <?=$record['customerType']==$customertype["id"]?'selected':''?>
                                                            value="<?= $customertype['id'] ?>">
                                                            <?= $customertype['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!--<option value="customer type one">customer type one</option>-->
                                                        <!--<option value="customer type two">customer type two</option>-->
                                                    </select>
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
                                                <label class="col-form-label">Contact Secoond Email</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['contactSecoondEmail'] ?>"
                                                        class="form-control" name="contactSecoondEmail">
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

                                            <div class="col-md-6">
                                                <label class="col-form-label">Categories</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="categories">
                                                        <option value="categories one">categories one</option>
                                                        <option value="categories two">categories two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Current PIC Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="currentPICName">
                                                        <option value="current pic name one">current pic name one
                                                        </option>
                                                        <option value="current pic name two">current pic name two
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Priority</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="priority">
                                                        <option value="high">high</option>
                                                        <option value="low">low</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Address Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Mailing Street</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['mailingStreet'] ?>"
                                                        class="form-control" name="mailingStreet">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Other Street</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['otherStreet'] ?>"
                                                        class="form-control" name="otherStreet">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Mailing City</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['mailingCity'] ?>"
                                                        class="form-control" name="mailingCity">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Other City</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['otherCity'] ?>"
                                                        class="form-control" name="otherCity">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Mailing State</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['mailingState'] ?>"
                                                        class="form-control" name="mailingState">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Other State</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['otherState'] ?>"
                                                        class="form-control" name="otherState">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Mailing Code</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['mailingCode'] ?>"
                                                        class="form-control" name="mailingCode">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Other Code</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['otherCode'] ?>"
                                                        class="form-control" name="otherCode">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Mailing Country</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['mailingCountry'] ?>"
                                                        class="form-control" name="mailingCountry">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Other Country</label>
                                                <div class="input-group">
                                                    <input type="text" value="<?= $record['otherCountry'] ?>"
                                                        class="form-control" name="otherCountry">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Description Information</h6>
                                            <div class="col-md-12">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control"
                                                        name="description"><?= $record['description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">System Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Bee Owner</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="beeOwner">
                                                        <option value="bee owner one">bee owner one</option>
                                                        <option value="bee owner two">bee owner two</option>
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
</body>

</html>