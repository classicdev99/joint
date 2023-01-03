<!doctype html>
<html lang="en">

<head>
    <?= $this->include('layouts/title-meta') ?>
    <?= $this->include('layouts/css') ?>
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <style>
    .myTable input {
        width: 100px;
    }

    .invoice-table th {
        text-align: center;
    }

    .invoice-fields-container {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
        flex-wrap: wrap;
    }

    .form-control:disabled {
        background: #f6f6f6 !important;
    }

    .invoice-fields .form-group label {
        display: inline-block;
        width: 240px;
    }

    .invoice-fields .form-group {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin: 15px 0px;
    }

    a.btn.cst-btn.btn-primary {
        background: #9cd6ff8f;
        color: #0d6efd;
        line-height: 23px;
    }

    @media (max-width: 420px) {
        .invoice-fields .form-group label {
            display: block;
            width: 100%;
        }

        .invoice-fields .form-group {
            display: block;
        }

        .invoice-fields {
            width: 100%;
        }

    }

    @media (max-width: 991px) {
        .table-responsive .invoice-table th {
            font-size: 12px;
        }
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
                                <form action="<?= base_url(session('role') . '/Orders/edit_submit/' . $record['id']) ?>"
                                    method="POST">
                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/Orders') ?>"
                                                class="btn btn-secondary mb-3"
                                                onclick="return confirm('Cancel create Orders?');">Cancel</a>
                                        </div>
                                        <div class="row mb-5">
                                            <h6 class="mb-3">Product Order Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Orders Owner</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="order_owner" id="order_owner">
                                                        <option disabled selected>-None-</option>
                                                        <option
                                                            <?= (1 == $record['order_owner'] ? 'selected="selected"' : '') ?>
                                                            value="1">Owner 1</option>
                                                        <option
                                                            <?= (2 == $record['order_owner'] ? 'selected="selected"' : '') ?>
                                                            value="2">Owner 2</option>
                                                        <option
                                                            <?= (3 == $record['order_owner'] ? 'selected="selected"' : '') ?>
                                                            value="3">Owner 3</option>
                                                        <option
                                                            <?= (4 == $record['order_owner'] ? 'selected="selected"' : '') ?>
                                                            value="4">Owner 4</option>
                                                    </select>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Subject</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input value="<?= $record['subject'] ?>" type="text"
                                                        class="form-control" name="subject" id="subject">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Purchase Order</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input value="<?= $record['purchase_owner'] ?>" type="text"
                                                        id="purchase_owner" name="purchase_owner" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Deal Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>

                                                    <input value="<?= $record['deal'] ?>" type="text"
                                                        class="form-control" name="deal">
                                                </div>
                                            </div>


                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>

                                                    <input value="<?= $record['account_name'] ?>" type="text" class="form-control" name="account_name">
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="account_name" class="form-select">
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
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Quote Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>

                                                    <input value="<?= $record['quote_name'] ?>" type="text"
                                                        class="form-control" name="quote_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Current PIC Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="pic_name" id="" class="form-select">
                                                        <option
                                                            <?= ('PIC 1' == $record['pic_name'] ? 'selected="selected"' : '') ?>
                                                            value="PIC 1">PIC 1</option>
                                                        <option
                                                            <?= ('PIC 2' == $record['pic_name'] ? 'selected="selected"' : '') ?>
                                                            value="PIC 2">PIC 2</option>
                                                        <option
                                                            <?= ('PIC 3' == $record['pic_name'] ? 'selected="selected"' : '') ?>
                                                            value="PIC 3">PIC 3</option>
                                                        <option
                                                            <?= ('PIC 4' == $record['pic_name'] ? 'selected="selected"' : '') ?>
                                                            value="PIC 4">PIC 4</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Quote No</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>

                                                    <input value="<?= $record['quote_no'] ?>" type="text"
                                                        class="form-control" name="quote_no">
                                                </div>
                                            </div>
                                            <div class="col-md-6 offset-md-6">
                                                <label class="col-form-label">Status</label>
                                                <div class="input-group">
                                                    <select name="status" id="" class="form-select">
                                                        <option
                                                            <?= ('Completed' == $record['status'] ? 'selected="selected"' : '') ?>
                                                            value="Completed">Completed</option>
                                                        <option
                                                            <?= ('Uncompleted' == $record['status'] ? 'selected="selected"' : '') ?>
                                                            value="Uncompleted">Uncompleted</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-5">
                                                <h6 class="mb-3">Invoiced Items</h6>

                                                <div class="table-responsive">
                                                    <table class="invoice-table">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Product Name</th>
                                                                <th>List Price (MYR)</th>
                                                                <th>Quantity</th>
                                                                <th>Amount (MYR)</th>
                                                                <th>Discount (MYR)</th>
                                                                <th>Tax (MYR)</th>
                                                                <th>Total (MYR)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>
                                                                    <textarea name="description" id="description"
                                                                        cols="30" rows="1" class="form-control"
                                                                        name="productName"
                                                                        placeholder="description"></textarea>
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="invoice-table-input form-control"
                                                                        name="listPrice">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="invoice-table-input form-control"
                                                                        name="quantity">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="invoice-table-input form-control"
                                                                        name="amount">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="0"
                                                                        class="invoice-table-input form-control"
                                                                        name="discount">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="0"
                                                                        class="invoice-table-input form-control"
                                                                        name="tax">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="invoice-table-input form-control"
                                                                        name="total">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="invoice-fields-container">
                                                    <div class="btn-area">
                                                        <a href="#" class="btn btn-primary cst-btn">+ Add Row</a>
                                                    </div>
                                                    <div class="invoice-fields">
                                                        <div class="form-group">
                                                            <label>Sub Total (MYR)</label>
                                                            <input type="text" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Discount (MYR)</label>
                                                            <input type="text" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Tax (MYR)</label>
                                                            <input type="text" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Adjustment (MYR)</label>
                                                            <input type="text" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Grand Total (MYR)</label>
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h6 class="my-3">Address Information</h6>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['contact_name'] ?>" type="text" class="form-control" name="contact_name">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="contact_name" class="form-select">
                                                        <option hidden>-None-</option>
                                                        <?php
                                                        foreach ($contacts as $contact) {
                                                        ?>
                                                        <option value="<?= $contact['lastName'] ?>">
                                                            <?= $contact['lastName'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Contact</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_contact'] ?>" type="text"
                                                        name="shipping_contact" id="" class="form-control">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text h-100"><i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <label class="col-form-label">Billing Street</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_street'] ?>" type="text"
                                                        class="form-control" name="billing_street" id="billing_street">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Street</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_street'] ?>" type="text"
                                                        class="form-control" name="shipping_street"
                                                        id="shipping_street	">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing City</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_city'] ?>" type="text"
                                                        class="form-control" id="billing_city" name="billing_city">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping City </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_city'] ?>" type="text"
                                                        class="form-control" id="shipping_city" name="shipping_city">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing State</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_state'] ?>" type="text"
                                                        class="form-control" id="billing_state" name="billing_state">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping State</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_state'] ?>" type="text"
                                                        class="form-control" name="shipping_state" id="shipping_state">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Code </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_code'] ?>" type="text"
                                                        class="form-control" name="billing_code" id="billing_code">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Code</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_code'] ?>" type="text"
                                                        class="form-control" name="shipping_code" id="shipping_code">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Country</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_country'] ?>" type="text"
                                                        class="form-control" name="billing_country"
                                                        id="billing_country">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Country </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_country'] ?>" type="text"
                                                        class="form-control" name="shipping_country"
                                                        id="shipping_country">
                                                </div>
                                            </div>
                                            <h6 class="my-3">Additional Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Delivery Terms </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['delivery_term'] ?>" type="text"
                                                        class="form-control" name="delivery_term" id="delivery_term">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Transporter </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['transporter'] ?>" type="text"
                                                        class="form-control" name="transporter" id="transporter">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Payment Terms </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['payment_terms'] ?>" type="text"
                                                        class="form-control" name="payment_terms" id="payment_terms">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Delivery ETA </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['delivery_ETA'] ?>" type="date"
                                                        class="form-control" name="delivery_ETA" id="delivery_ETA">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Prepration For Customer Site </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['custome_site_preprationsv'] ?>"
                                                        type="text" class="form-control"
                                                        name="custome_site_preprationsv" id="custome_site_preprationsv">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Delivery ETA Remark </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['delivery_remark'] ?>" type="text"
                                                        class="form-control" name="delivery_remark"
                                                        id="delivery_remark">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">SE Remark </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['se_remark'] ?>" type="text"
                                                        class="form-control" name="se_remark" id="se_remark">
                                                </div>
                                            </div>
                                            <h6 class="my-3">Technical-Installation</h6>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Installation Assigned to </label>
                                                    <div class="input-group">
                                                        <select name="assign_to" id="" class="form-control">
                                                            <option
                                                                <?= ('Option 1' == $record['assign_to'] ? 'selected="selected"' : '') ?>
                                                                value="Option 1">Option 1</option>
                                                            <option
                                                                <?= ('Option 2' == $record['assign_to'] ? 'selected="selected"' : '') ?>
                                                                value="Option 2">Option 2</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-12	">
                                                    <label class="col-form-label">Date Of Installation </label>
                                                    <div class="input-group">
                                                        <input value="<?= $record['install_date'] ?>" type="date"
                                                            class="form-control" name="install_date" id="install_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Installation Stage </label>
                                                    <div class="input-group">
                                                        <select name="install_stage" id="" class="form-control">
                                                            <option
                                                                <?= ('Option 1' == $record['install_stage'] ? 'selected="selected"' : '') ?>
                                                                value="Option 1">Option 1</option>
                                                            <option
                                                                <?= ('Option 2' == $record['install_stage'] ? 'selected="selected"' : '') ?>
                                                                value="Option 2">Option 2</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <label class="col-form-label">Installation texh Mgr Comment </label>
                                                    <div class="input-group">
                                                        <input value="<?= $record['install_tech'] ?>" type="text"
                                                            class="form-control" name="install_tech" id="install_tech">
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="my-3">Technical-Callibration</h6>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Callbration Assigned to </label>
                                                    <div class="input-group">
                                                        <select name="callibration_assign" id="callibration_assign"
                                                            class="form-control">
                                                            <option
                                                                <?= ('Option 1' == $record['callibration_assign'] ? 'selected="selected"' : '') ?>
                                                                value="Option 1">Option 1</option>
                                                            <option
                                                                <?= ('Option 2' == $record['callibration_assign'] ? 'selected="selected"' : '') ?>
                                                                value="Option 2">Option 2</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-12	">
                                                    <label class="col-form-label">Date Of Callbration </label>
                                                    <div class="input-group">
                                                        <input value="<?= $record['callibration_date'] ?>" type="date"
                                                            class="form-control" name="callibration_date"
                                                            id="callibration_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Callbration Stage </label>
                                                    <div class="input-group">
                                                        <select name="callibration_stage" id="callibration_stage"
                                                            class="form-control">
                                                            <option
                                                                <?= ('Option 1' == $record['callibration_stage'] ? 'selected="selected"' : '') ?>
                                                                value="Option 1">Option 1</option>
                                                            <option
                                                                <?= ('Option 2' == $record['callibration_stage'] ? 'selected="selected"' : '') ?>
                                                                value="Option 2">Option 2</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 ">
                                                    <label class="col-form-label">Callbration texh Mgr Comment </label>
                                                    <div class="input-group">
                                                        <input value="<?= $record['callibration_tech'] ?>" type="text"
                                                            class="form-control" name="callibration_tech"
                                                            id="callibration_tech">
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="my-3">Technical-Training</h6>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Traing Assigned to </label>
                                                    <div class="input-group">
                                                        <select name="training_asigned" id="" class="form-control">
                                                            <option
                                                                <?= ('Option 1' == $record['training_asigned'] ? 'selected="selected"' : '') ?>
                                                                value="Option 1">Option 1</option>
                                                            <option
                                                                <?= ('Option 2' == $record['training_asigned'] ? 'selected="selected"' : '') ?>
                                                                value="Option 2">Option 2</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-12	">
                                                    <label class="col-form-label">Date Of Training </label>
                                                    <div class="input-group">
                                                        <input value="<?= $record['training_date'] ?>" type="date"
                                                            class="form-control" name="install_date" id="training_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Training Stage </label>
                                                    <div class="input-group">
                                                        <select name="traing_tech" id="" class="form-control">
                                                            <option
                                                                <?= ('Option 1' == $record['traing_tech'] ? 'selected="selected"' : '') ?>
                                                                value="Option 1">Option 1</option>
                                                            <option
                                                                <?= ('Option 2' == $record['traing_tech'] ? 'selected="selected"' : '') ?>
                                                                value="Option 2">Option 2</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <label class="col-form-label">Training texh Mgr Comment </label>
                                                    <div class="input-group">
                                                        <input value="<?= $record['install_tech'] ?>" type="text"
                                                            class="form-control" name="install_tech" id="install_tech">
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="my-3">Summary of Buy Off Meeting</h6>

                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Date Of Meeting </label>
                                                    <div class="input-group">
                                                        <input value="<?= $record['meeting_date'] ?>" type="date"
                                                            class="form-control" name="meeting_date" id="meeting_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <label class="col-form-label">Comment From Customer </label>
                                                    <div class="input-group">
                                                        <input value="<?= $record['comment'] ?>" type="text"
                                                            class="form-control" name="comment" id="comment">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Submit By </label>
                                                    <div class="input-group">
                                                        <select name="submit_by" id="submit_by" class="form-control">
                                                            <option
                                                                <?= ('Option 1' == $record['submit_by'] ? 'selected="selected"' : '') ?>
                                                                value="Option 1">Option 1</option>
                                                            <option
                                                                <?= ('Option 2' == $record['submit_by'] ? 'selected="selected"' : '') ?>
                                                                value="Option 2">Option 2</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="col-form-label">Review By </label>
                                                    <div class="input-group">
                                                        <select name="review_by" id="review_by" class="form-control">
                                                            <option
                                                                <?= ('Option 1' == $record['review_by'] ? 'selected="selected"' : '') ?>
                                                                value="Option 1">Option 1</option>
                                                            <option
                                                                <?= ('Option 2' == $record['review_by'] ? 'selected="selected"' : '') ?>
                                                                value="Option 2">Option 2</option>
                                                        </select>
                                                    </div>
                                                </div>



                                            </div>
                                            <h6 class="my-3">Terms and Conditions</h6>

                                            <div class="col-md-8">
                                                <label class="col-form-label">Terms and conditions </label>
                                                <div class="input-group">
                                                    <textarea name="terms_conditions" id="" cols="30" rows=""
                                                        class="form-control"><?= $record['terms_conditions'] ?></textarea>

                                                </div>
                                            </div>
                                            <h6 class="my-3">Description Information</h6>
                                            <div class="col-md-8">
                                                <label class="col-form-label">Description </label>
                                                <div class="input-group">
                                                    <textarea name="description" id="" cols="30" rows=""
                                                        class="form-control"><?= $record['description'] ?></textarea>
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