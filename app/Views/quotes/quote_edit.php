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
                                <form action="<?= base_url(session('role') . '/quotes/edit_submit/' . $record['id']) ?>" method="POST">
                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/quotes') ?>" class="btn btn-secondary mb-3" onclick="return confirm('Cancel create quotes?');">Cancel</a>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Quote Information</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Quote Owner</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="quote_name">
                                                        <option value="1" <?= (1 == $record['quote_name'] ? 'selected="selected"' : '') ?>>quote owner one</option>
                                                        <option value="2" <?= (2 == $record['quote_name'] ? 'selected="selected"' : '') ?>>quote owner two</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <label class="col-form-label">Subject</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input value="<?= $record['subject'] ?>" type="text" class="form-control" name="subject">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Current PIC Name</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="pic_name">
                                                        <option value="1" <?= (1 == $record['pic_name'] ? 'selected="selected"' : '') ?>>current pic name one
                                                        </option>
                                                        <option value="2" <?= (2 == $record['pic_name'] ? 'selected="selected"' : '') ?>>current pic name two
                                                        </option>
                                                    </select>
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
                                                            <option value="<?= $acc['accountname'] ?>"><?= $acc['accountname'] ?></option>
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
                                                        <option <?= ($value['id'] == $record['payment_term'] ? 'selected="selected"' : '') ?> value="<?=$value['id'];?>"><?=$value['name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input value="<?= $record['contact_name'] ?>" type="text" class="form-control" name="contact_name">
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
                                                            <option value="<?= $contact['lastName'] ?>"><?= $contact['lastName'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Delivery Term</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="delivery_term">
                                                        <option value="1" <?= (1 == $record['delivery_term'] ? 'selected="selected"' : '') ?>>delivery term one</option>
                                                        <option value="2" <?= (2 == $record['delivery_term'] ? 'selected="selected"' : '') ?>>delivery term two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Deal Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input value="<?= $record['deal_name'] ?>" type="text" class="form-control" name="deal_name">
                                                </div>
                                            </div>

                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Validity</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="validity">
                                                        <option value="validity one" <?= ('validity one' == $record['validity'] ? 'selected="selected"' : '') ?>>validity one</option>
                                                        <option value="validity two" <?= ('validity two' == $record['validity'] ? 'selected="selected"' : '') ?>>validity two</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Custom Quotation Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input value="<?= $record['cutom_quote_date'] ?>" type="date" class="form-control" name="cutom_quote_date">
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
                                                                    <textarea name="description" id="description" cols="30" rows="1" class="form-control" name="productName" placeholder="description"></textarea>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="invoice-table-input form-control" name="listPrice">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="invoice-table-input form-control" name="quantity">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="invoice-table-input form-control" name="amount">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="0" class="invoice-table-input form-control" name="discount">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="0" class="invoice-table-input form-control" name="tax">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="invoice-table-input form-control" name="total">
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

                                            <h6 class="my-3">Internal Comment</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Defect Comment</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['defect_comment'] ?>" type="text" class="form-control" name="defect_comment" id="defect_comment">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Internal Comment</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['internal_comment'] ?>" type="text" class="form-control" name="internal_comment" id="internal_comment">
                                                </div>

                                            </div>
                                            <h6 class="my-3">Term and
                                                Conditions</h6>

                                            <div class="col-md-8">
                                                <label class="col-form-label">Term and Conditions</label>
                                                <div class="input-group">
                                                    <textarea name="term_condition" id="term_condition" cols="30" rows="4" class="form-control"><?= $record['term_condition'] ?></textarea>
                                                </div>
                                            </div>
                                            <h6 class="my-3">Description Information</h6>

                                            <div class="col-md-8">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea name="description" id="description" cols="30" rows="2" class="form-control"><?= $record['description'] ?></textarea>
                                                </div>
                                            </div>
                                            <h6 class="my-3">Address Information</h6>
                                            <div class="col-md-6 ">
                                                <label class="col-form-label">Billing Street</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_street'] ?>" type="text" class="form-control" name="billing_street" id="billing_street">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Street</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_street'] ?>" type="text" class="form-control" name="shipping_street" id="shipping_street	">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing City</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_city'] ?>" type="text" class="form-control" id="billing_city" name="billing_city">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping City </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_city'] ?>" type="text" class="form-control" id="shipping_city" name="shipping_city">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing State</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_state'] ?>" type="text" class="form-control" id="billing_state" name="billing_state">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping State</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_state'] ?>" type="text" class="form-control" name="shipping_state" id="shipping_state">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Code </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billling_code'] ?>" type="text" class="form-control" name="billling_code" id="billling_code">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Code</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_code'] ?>" type="text" class="form-control" name="shipping_code" id="shipping_code">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Billing Country</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['billing_country'] ?>" type="text" class="form-control" name="billing_country" id="billing_country">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Shipping Country </label>
                                                <div class="input-group">
                                                    <input value="<?= $record['shipping_country'] ?>" type="text" class="form-control" name="shipping_country" id="shipping_country">
                                                </div>
                                            </div>
                                            <h6 class="mb-3">System info</h6>

                                            <div class="col-md-12">
                                                <label class="col-form-label">Bee Owner</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['bee_owner'] ?>" type="text" class="form-control" name="bee_owner" id="bee_owner">
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
</body>

</html>