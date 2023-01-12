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
                                <form action="<?= base_url(session('role') . '/quote/add_submit') ?>" method="POST">
                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/quotes') ?>"
                                                class="btn btn-secondary mb-3"
                                                onclick="return confirm('Cancel create quotes?');">Cancel</a>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Quote Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Subject</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="subject">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Current PIC Name</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="pic_name">
                                                        <?php
                                                        foreach ($staffs as $staff) {
                                                        ?>
                                                        <option value="<?= $staff['name'] ?>">
                                                            <?= $staff['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="account_name">
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
                                                <label class="col-form-label">Payment Term</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="payment_term">
                                                        <?php foreach($paymentterms as $key => $value) { ?>
                                                        <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

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
                                                <label class="col-form-label">Delivery Term</label>
                                                <div class="input-group">
                                                    <input type="number" name="delivery_term" class="form-control">
                                                    <!-- <select class="form-select" name="delivery_term">
                                                        <option value="1">delivery term one</option>
                                                        <option value="2">delivery term two</option>
                                                    </select> -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Deal Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="deal_name">
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <label class="col-form-label">Validity</label>
                                                <div class="input-group">
                                                    <input type="number" name="validity" class="form-control">
                                                    <!-- <select class="form-select" name="validity">
                                                        <option value="validity one">validity one</option>
                                                        <option value="validity two">validity two</option>
                                                    </select> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Custom Quotation Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="date" class="form-control" name="cutom_quote_date"
                                                        id="cutom_quote_date">
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
                                                        <a onclick="showProducts()" class="btn btn-primary cst-btn">+
                                                            Add Products</a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-form-label">Currency</label>
                                                        <div class="input-group">
                                                            <select name="currency_name" id="currency_name"
                                                                class="form-select">
                                                                <option value="0">MYR</option>
                                                                <option value="1">USD</option>
                                                            </select>
                                                        </div>
                                                        <label class="col-form-label">Value in MYR</label>
                                                        <input type="number" value="1" min="0.00" readonly
                                                            class="invoice-table-input form-control"
                                                            name="currency_value" id="currency_value">
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
                                                            <input type="text" id="sum_grand_total"
                                                                name="sum_grand_total" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <h6 class="my-3">Internal Comment</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Defect Comment (for repair use
                                                    only)</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="defect_comment"
                                                        id="defect_comment">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Internal Comment (for repair use
                                                    only)</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="internal_comment"
                                                        id="internal_comment">
                                                </div>
                                            </div>
                                            <h6 class="my-3">Term and
                                                Conditions</h6>

                                            <div class="col-md-8">
                                                <label class="col-form-label">Term and Conditions</label>
                                                <div class="input-group">
                                                    <textarea name="term_condition" id="term_condition" cols="30"
                                                        rows="4" class="form-control">-All the quoted on-site serving jobs are exluded PCR/Swab Test, Optional Charges @RM300/headcount
                                                  </textarea>
                                                </div>
                                            </div>
                                            <h6 class="my-3">Description Information</h6>

                                            <div class="col-md-8">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea name="description" id="description" cols="30" rows="2"
                                                        class="form-control"></textarea>
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

        </div>
        <?= $this->include('dialog/products') ?>
        <?= $this->include('layouts/footer') ?>

    </div>
    <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <?= $this->include('layouts/script') ?>
    <script type="text/javascript">
    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear() + "-" + (month) + "-" + (day);

    $('#cutom_quote_date').val(today);
    </script>
</body>



</html>