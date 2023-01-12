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
                                <form action="<?= base_url(session('role') . '/invoice/add_submit') ?>" method="POST">
                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/invoice') ?>"
                                                class="btn btn-secondary mb-3"
                                                onclick="return confirm('Cancel create invoice?');">Cancel</a>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">invoice Information</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Invoice Owner</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="invoiceOwner">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Order</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="productOrder">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Subject</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="subject">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Purchase Order</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="purchaseOrder">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Invoice Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="date" class="form-control" name="invoiceDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Excise Duty</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="exciseDuty">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Due Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="date" class="form-control" name="dueDate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Status</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="status">
                                                        <option value="tdo name one">tdo name one</option>
                                                        <option value="tdo name two">tdo name two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Sales Commision</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="salesCommision">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Quote No</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="quoteNo">
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="accountName">
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="accountName" class="form-select">
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

                                            <div class="col-md-6"></div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="contactName">
                                                        <option value="tdo name one">tdo name one</option>
                                                        <option value="tdo name two">tdo name two</option>
                                                    </select>
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select name="contactName" class="form-select">
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

                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Payment Term</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="paymentTerm">
                                                        <option value="tdo name one">tdo name one</option>
                                                        <option value="tdo name two">tdo name two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Delivery Terms</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="deliveryTerms">
                                                        <option value="tdo name one">tdo name one</option>
                                                        <option value="tdo name two">tdo name two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Current PIC Name</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="currentPicName">
                                                        <option value="tdo name one">tdo name one</option>
                                                        <option value="tdo name two">tdo name two</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Invoiced Items</h6>

                                            <div class="table-responsive">
                                                <table class="invoice-table" id="invoice_table">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Product Name</th>
                                                            <th>List Price</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Discount</th>
                                                            <th>Tax</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr id="addr1">
                                                            <td>1</td>
                                                            <td>
                                                                <textarea cols="30" rows="1" class="form-control"
                                                                    name="productName1"
                                                                    placeholder="description"></textarea>
                                                            </td>
                                                            <td>
                                                                <input type="number" min="0" value="0"
                                                                    class="invoice-table-input form-control"
                                                                    name="listPrice1" id="listPrice1">
                                                            </td>
                                                            <td>
                                                                <input type=" number" min="0" value="0"
                                                                    class="invoice-table-input form-control"
                                                                    name="quantity1">
                                                            </td>
                                                            <td>
                                                                <input type="number" min="0" value="0"
                                                                    class="invoice-table-input form-control"
                                                                    name="amount1">
                                                            </td>
                                                            <td>
                                                                <input type="number" min="0" value="0"
                                                                    class="invoice-table-input form-control"
                                                                    name="discount1">
                                                            </td>
                                                            <td>
                                                                <input type="number" min="0" value="0"
                                                                    class="invoice-table-input form-control"
                                                                    name="tax1">
                                                            </td>
                                                            <td>
                                                                <input type="number" value="0"
                                                                    class="invoice-table-input form-control"
                                                                    name="total1">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="invoice-fields-container">
                                                <div class="btn-area">
                                                    <a onclick="showProducts()" class="btn btn-primary cst-btn">+ Add
                                                        Products</a>
                                                </div>
                                                <div class="invoice-fields">
                                                    <div class="form-group">
                                                        <label>Sub Total</label>
                                                        <input type="text" id="sum_sub_total" name="sum_sub_total"
                                                            class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Discount</label>
                                                        <input type="text" id="sum_discount" name="sum_discount"
                                                            class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tax</label>
                                                        <input type="text" id="sum_tax" name="sum_tax"
                                                            class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Adjustment</label>
                                                        <input type="text" id="sum_adjustment" name="sum_adjustment"
                                                            class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Grand Total</label>
                                                        <input type="text" id="sum_grand_total" name="sum_grand_total"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Adress Information</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Street</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="billingStreet">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Site</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="shippingSite">
                                                        <option value="tdo name one">tdo name one</option>
                                                        <option value="tdo name two">tdo name two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing City</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="billingCity">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Street</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="shippingStreet">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing State</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="billingState">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping City</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="shippingCity">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Code</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="billingCode">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping State</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="shippingState">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Country</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="billingCountry">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Code</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="shippingCode">
                                                </div>
                                            </div>

                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Country</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="shippingCountry">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Terms And Condition</h6>

                                            <div class="col-md-12">
                                                <label class="col-form-label">Terms And Condition</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" name="termsAndCondition"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Description Information</h6>
                                            <div class="col-md-12">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" name="description"></textarea>
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
            <?= $this->include('dialog/products') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?= $this->include('layouts/script') ?>
</body>

</html>