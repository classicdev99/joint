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
                                <form action="<?= base_url(session('role') . '/quotes/edit_submit/' . $record['id']) ?>"
                                    method="POST">
                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/quotes') ?>"
                                                class="btn btn-secondary mb-3"
                                                onclick="return confirm('Cancel edit quotes?');">Cancel</a>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Quote Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Subject</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;">
                                                    </div>
                                                    <input value="<?= $record['subject'] ?>" type="text"
                                                        class="form-control" name="subject">
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

                                            <div class="col-md-6">
                                                <label class="col-form-label">Account Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;">
                                                    </div>
                                                    <select name="account_name" class="form-select" id="account_name">
                                                        <option hidden>-Select Account-</option>
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
                                                        <option
                                                            <?= ($value['id'] == $record['payment_term'] ? 'selected="selected"' : '') ?>
                                                            value="<?=$value['id'];?>"><?=$value['name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Contact Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;">
                                                    </div>
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

                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Delivery Term</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="delivery_term">
                                                        <option value="1"
                                                            <?= (1 == $record['delivery_term'] ? 'selected="selected"' : '') ?>>
                                                            delivery term one</option>
                                                        <option value="2"
                                                            <?= (2 == $record['delivery_term'] ? 'selected="selected"' : '') ?>>
                                                            delivery term two</option>
                                                    </select>
                                                </div>
                                            </div> -->

                                            <div class="col-md-6">
                                                <label class="col-form-label">Deal Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;">
                                                    </div>
                                                    <input value="<?= $record['deal_name'] ?>" type="text"
                                                        class="form-control" name="deal_name">
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
                                            <!-- <div class="col-md-6">
                                                <label class="col-form-label">Validity</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="validity">
                                                        <option value="validity one"
                                                            <?= ('validity one' == $record['validity'] ? 'selected="selected"' : '') ?>>
                                                            validity one</option>
                                                        <option value="validity two"
                                                            <?= ('validity two' == $record['validity'] ? 'selected="selected"' : '') ?>>
                                                            validity two</option>
                                                    </select>
                                                </div>
                                            </div> -->

                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Custom Quotation Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;">
                                                    </div>
                                                    <input value="<?= $record['cutom_quote_date'] ?>" type="date"
                                                        class="form-control" name="cutom_quote_date">
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
                                                            <?php $i = 1; foreach ($quote_items as $row) : ?>
                                                            <tr id=<?="addr".$i?>>
                                                                <td><?= $i ?></td>
                                                                <td>
                                                                    <textarea cols="30" rows="1" class="form-control"
                                                                        name=<?="productName".$i?>
                                                                        placeholder="description"><?= $row['product_name'] ?></textarea>
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0"
                                                                        class="invoice-table-input form-control"
                                                                        name=<?="listPrice".$i?>
                                                                        value="<?= $row['list_price'] ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0"
                                                                        class="invoice-table-input form-control"
                                                                        name=<?="quantity".$i?>
                                                                        value="<?= $row['quantity'] ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0"
                                                                        class="invoice-table-input form-control"
                                                                        name=<?="amount".$i?>
                                                                        value="<?= $row['amount'] ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0"
                                                                        class="invoice-table-input form-control"
                                                                        name=<?="discount".$i?>
                                                                        value="<?= $row['discount'] ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0"
                                                                        class="invoice-table-input form-control"
                                                                        name=<?="total".$i?>
                                                                        value="<?= $row['total'] ?>">
                                                                </td>
                                                                <td>
                                                                    <a href="<?php
                                                                    if ($row['product_id'])
                                                                        echo base_url(session('role') . '/product/edit/' . $row['product_id']);
                                                                    else
                                                                        echo base_url(session('role') . '/product');
                                                                    ?>" class="btn btn-primary btn-sm"
                                                                        title="Update quotes">
                                                                        <i class='fas fa-edit'></i>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0"
                                                                        class="invoice-table-input form-control"
                                                                        name=<?="productId".$i?>
                                                                        value="<?= $row['product_id'] ?>" hidden>
                                                                </td>
                                                            </tr>
                                                            <?php $i ++; endforeach; ?>
                                                            <tr id=<?="addr".$i?>>
                                                                <td><?=$i?></td>
                                                                <td>
                                                                    <textarea cols="30" rows="1" class="form-control"
                                                                        name="productName" .<?=$i?>
                                                                        placeholder="description"></textarea>
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0" value="0"
                                                                        class="invoice-table-input form-control"
                                                                        name="listPrice1" id="listPrice" .<?=$i?>>
                                                                </td>
                                                                <td>
                                                                    <input type=" number" min="0" value="0"
                                                                        class="invoice-table-input form-control"
                                                                        name="quantity" .<?=$i?>>
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0" value="0"
                                                                        class="invoice-table-input form-control"
                                                                        name="amount" .<?=$i?>>
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0" value="0"
                                                                        class="invoice-table-input form-control"
                                                                        name="discount" .<?=$i?>>
                                                                </td>
                                                                <td>
                                                                    <input type="number" value="0"
                                                                        class="invoice-table-input form-control"
                                                                        name="total" .<?=$i?>>
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
                                                    <!-- <div class="col-md-2">
                                                        <label class="col-form-label">Currency</label>
                                                        <div class="input-group">
                                                            <select name="currency_name" id="currency_name"
                                                                class="form-select">
                                                                <option value="0">MYR</option>
                                                                <option value="1">USD</option>
                                                            </select>
                                                        </div>
                                                        <label class="col-form-label">Value in MYR</label>
                                                        <input type="number" value="1" min="0.00"
                                                            class="invoice-table-input form-control"
                                                            name="currency_value" id="currency_value">
                                                    </div> -->
                                                    <div class="invoice-fields">
                                                        <div class="form-group">
                                                            <label>Sub Total</label>
                                                            <input type="text" id="sum_sub_total" name="sum_sub_total"
                                                                class="form-control"
                                                                value="<?= $record['sum_sub_total'] ?>" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Discount</label>
                                                            <input type="text" id="sum_discount" name="sum_discount"
                                                                class="form-control"
                                                                value="<?= $record['sum_discount'] ?>" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Tax</label>
                                                            <input type="text" id="sum_tax" name="sum_tax"
                                                                class="form-control"
                                                                value="<?= $record['sum_tax'] ?>" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Adjustment</label>
                                                            <input type="text" id="sum_adjustment" name="sum_adjustment"
                                                                class="form-control"
                                                                value="<?= $record['sum_adjustment'] ?>" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Grand Total</label>
                                                            <input type="text" id="sum_grand_total"
                                                                name="sum_grand_total" class="form-control"
                                                                value="<?= $record['sum_grand_total'] ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h6 class="my-3">Internal Comment</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Defect Comment (for repair use
                                                    only)</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['defect_comment'] ?>" type="text"
                                                        class="form-control" name="defect_comment" id="defect_comment">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Internal Comment (for repair use
                                                    only)</label>
                                                <div class="input-group">
                                                    <input value="<?= $record['internal_comment'] ?>" type="text"
                                                        class="form-control" name="internal_comment"
                                                        id="internal_comment">
                                                </div>

                                            </div>
                                            <h6 class="my-3">Term and
                                                Conditions</h6>

                                            <div class="col-md-8">
                                                <label class="col-form-label">Term and Conditions</label>
                                                <div class="input-group">
                                                    <textarea name="term_condition" id="term_condition" cols="30"
                                                        rows="4"
                                                        class="form-control"><?= $record['term_condition'] ?></textarea>
                                                </div>
                                            </div>
                                            <h6 class="my-3">Description Information</h6>

                                            <div class="col-md-8">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea name="description" id="description" cols="30" rows="2"
                                                        class="form-control"><?= $record['description'] ?></textarea>
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
    <?= $this->include('script/quote_account') ?>
</body>

</html>