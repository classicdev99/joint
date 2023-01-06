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
                                            <h6 class="mb-3">Account Image</h6>
                                            <div class="col-md-12">
                                                <input type="hidden" name="createdby" value="<?php echo $createdby; ?>">
                                                <input class="form-control" type="file" name="image"
                                                    accept="image/png, image/jpeg">
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Account Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Account Owner</label>
                                                <div class="input-group">
                                                    <select name="accountowner" class="form-select">
                                                        <option hidden>-None-</option>
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

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input name="accountname" type="text" class="form-control">
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
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
                                                <label class="col-form-label">Phone</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input name="phonenumber" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Account Site</label>
                                                <div class="input-group">
                                                    <input name="accountsite" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Fax</label>
                                                <div class="input-group">
                                                    <input name="fax" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Parent Account</label>
                                                <div class="input-group">
                                                    <input name="parentaccount" type="text" class="form-control">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-users"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Website</label>
                                                <div class="input-group">
                                                    <input name="website" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Account Number</label>
                                                <div class="input-group">
                                                    <input name="accountnumber" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Ownership</label>
                                                <div class="input-group">
                                                    <select name="ownership" class="form-select">
                                                        <option hidden>-None-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Industry</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
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
                                                <label class="col-form-label">Employees</label>
                                                <div class="input-group">
                                                    <input name="employees" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Annual Revenue</label>
                                                <div class="input-group">
                                                    <input name="annualrevenue" type="text" class="form-control"
                                                        placeholder="MYR">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-info"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">SIC Code</label>
                                                <div class="input-group">
                                                    <input name="sicccode" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Source Remark</label>
                                                <div class="input-group">
                                                    <input name="sourceremark" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Action Required</label>
                                                <div class="input-group">
                                                    <select name="actionrequired" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php 
                                                        foreach($actionRequireds as $actionRequired)
                                                        { ?>
                                                        <option value="<?php echo $actionRequired['id'];?>">
                                                            <?php echo $actionRequired['name'];?></option>
                                                        <?php 
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Territory</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="territory" class="form-select">
                                                        <option hidden>-None-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Customer Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
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
                                                <label class="col-form-label">Current PIC Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="currentpic" class="form-select">
                                                        <option hidden>-None-</option>
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
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Account Email</label>
                                                <div class="input-group">
                                                    <input name="accountemail" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Address Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Street</label>
                                                <div class="input-group">
                                                    <input name="billstreet" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Street</label>
                                                <div class="input-group">
                                                    <input name="shipstreet" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing City</label>
                                                <div class="input-group">
                                                    <input name="billcity" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping City</label>
                                                <div class="input-group">
                                                    <input name="shipcity" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing State</label>
                                                <div class="input-group">
                                                    <input name="billstate" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping State</label>
                                                <div class="input-group">
                                                    <input name="shipstate" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Code</label>
                                                <div class="input-group">
                                                    <input name="billcode" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Code</label>
                                                <div class="input-group">
                                                    <input name="shipcode" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Country</label>
                                                <div class="input-group">
                                                    <input name="billcountry" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Country</label>
                                                <div class="input-group">
                                                    <input name="shipcountry" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Description Information</h6>
                                            <div class="col-md-12">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea name="descinformation" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">System Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Bee Owner</label>
                                                <div class="input-group">
                                                    <select name="systeminfo" class="form-select">
                                                        <option hidden>-None-</option>
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
    <!-- <script>
        var data = [];
        var idxs = [];
        var Select = $('#selcont');
        var txtid = $('#contactsId');
        var name = $('#contacts');
        Select.on('change', function(e) {
            var optionSelected = $("option:selected", this);
            var selectId = this.value;
            var selectText = optionSelected.text();
            if (selectId != "-1") {
                if (selectId != "")
                    AddData(selectId, selectText);
            }
        });

        function AddData(id, name) {
            data.push({
                "id": id,
                "text": name
            });
            idxs.push(id);
            $('#cont-' + id).remove();
            $('#contacts').append('<span class="cross" id="txt-' + id + '" onclick="removeData(' + id + ')">' + name + '</span>');
            txtid.val(idxs.join(','));
        }

        function removeData(id) {
            var txt = '';
            idxs = removeItemAll(idxs, id);
            var i = 0;
            while (i < data.length) {
                if (data[i].id === id) {
                    txt = data[i].text;
                    data.splice(i, 1);
                } else {
                    ++i;
                }
            }
            Select.append('<option id="cont-' + id + '" value="' + id + '">' + txt + '</option>');
            $('#txt-' + id).remove();
            txtid.val(idxs.join(','));
        }

        function removeItemAll(arr, value) {
            var i = 0;
            while (i < arr.length) {
                if (arr[i] == value) {
                    arr.splice(i, 1);
                } else {
                    ++i;
                }
            }
            return arr;
        }
    </script> -->
</body>

</html>