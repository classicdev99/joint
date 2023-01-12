<!doctype html>
<html lang="en">

<head>
    <?= $this->include('layouts/title-meta') ?>
    <?= $this->include('layouts/css') ?>
    <style>
    .cross {
        margin-right: 10px;
        margin-left: 10px;
        font-size: 150%;
        cursor: pointer;
        color: black;
        transition: all ease-in-out .5s;
    }

    .cross:hover {
        color: dodgerblue;
    }

    .sticky-top {
        height: 50px;
        position: sticky;
        top: 80px;
    }
    </style>


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
                                <form action="<?= base_url(session('role') . '/account/create'); ?>"
                                    enctype="multipart/form-data" method="POST">
                                    <div class="card-body">

                                        <div class="d-flex flex-row-reverse">
                                            <button type="submit" name="submitaddaccount"
                                                class="btn btn-primary mb-3">Save</button>
                                            <!-- <a href="<?= base_url(session('role') . '/account/add_submit') ?>" class="btn btn-primary mb-3">Save</a> -->
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/account') ?>"
                                                class="btn btn-secondary mb-3"
                                                onclick="return confirm('Cancel add account?');">Cancel</a>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Account Information</h6>
                                            <div class="col-md-6">
                                                <input type="hidden" name="createdby" value="<?php echo $createdby; ?>">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" name="accountname" class="form-control" value="">
                                                    <?php if(0){ ?>
                                                    <select name="accountname" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php
                                                        foreach ($accounts as $acc) {
                                                        ?>
                                                        <option value="<?= $acc['accountname'] ?>">
                                                            <?= $acc['accountname'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Rating</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="rating" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php 
                                                        foreach($ratings as $rating)
                                                        { ?>
                                                        <option value="<?php echo $rating['id'];?>">
                                                            <?php echo $rating['name'];?></option>
                                                        <?php 
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Phone</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input name="phonenumber" type="tel" class="form-control"
                                                        id="phonenumber">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-form-label">Secondary Phone</label>
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
                                                <label class="col-form-label">Fax</label>
                                                <div class="input-group">
                                                    <input id="fax" name="fax" type="tel" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Website</label>
                                                <div class="input-group">
                                                    <input name="website" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Industry</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;">
                                                    </div>
                                                    <select name="industry" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php 
                                                        foreach($industres as $industry)
                                                        { ?>
                                                        <option value="<?php echo $industry['id'];?>">
                                                            <?php echo $industry['name'];?></option>
                                                        <?php 
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Customer Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;">
                                                    </div>
                                                    <select name="customertype" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php 
                                                        foreach($customertypes as $customertype)
                                                        { ?>
                                                        <option value="<?php echo $customertype['id'];?>">
                                                            <?php echo $customertype['name'];?></option>
                                                        <?php 
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Payment Term</label>
                                                <div class="input-group">
                                                    <select name="paymentterm" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php 
                                                        foreach($paymentterms as $paymentterm)
                                                        { ?>
                                                        <option value="<?php echo $paymentterm['id'];?>">
                                                            <?php echo $paymentterm['name'];?></option>
                                                        <?php 
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Account/General Email</label>
                                                <div class="input-group">
                                                    <input name="accountemail" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Address Information</h6>

                                            <div class="col-md-6">
                                                <label class="form-label">Country</label>
                                                <div class="input-group">
                                                    <select id="country" name="country" class="form-control gds-cr"
                                                        country-data-region-id="region" data-language="en"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="region" class="form-label">Region</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="region" name="region"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Address-1</label>
                                                <div class="input-group">
                                                    <input name="address1" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Address-2</label>
                                                <div class="input-group">
                                                    <input name="address2" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Address-3</label>
                                                <div class="input-group">
                                                    <input name="address3" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">City</label>
                                                <div class="input-group">
                                                    <input name="city" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Street</label>
                                                <div class="input-group">
                                                    <input name="shipstreet" type="text" class="form-control">
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
    <?= $this->include('script/account_phone') ?>
    <?= $this->include('script/country') ?>
    <script>

    </script>
</body>

</html>