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
                                <form action="<?= base_url(session('role') . '/product/add_submit') ?>" method="POST">

                                    <div class="card-body">
                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/product') ?>" class="btn btn-secondary mb-3" onclick="return confirm('Cancel create product?');">Cancel</a>
                                        </div>



                                        <div class="row mb-5">
                                            <h6 class="mb-3">Product Information</h6>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Owner</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="product_owner" id="product_owner">
                                                        <option disabled selected>-None-</option>
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
                                                <label class="col-form-label">Product Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="product_name" id="product_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Code</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" id="product_code" name="product_code" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">TDO Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>

                                                    <select class="form-select" name="TDO_name" id="TDO_name">
                                                        <option value="None" hidden>-None-</option>
                                                        <option value="tdo name 1">tdo name 1</option>
                                                        <option value="tdo name 2">tdo name 2</option>
                                                        <option value="tdo name 3">tdo name 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Procut Active</label>
                                                <div class="input-group">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="product_active" name="product_active">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <label class="col-form-label">Manufacturer</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>

                                                    <select class="form-select" name="manufacturer" id="manufacturer">
                                                        <option value="None" hidden>-None-</option>
                                                        <option value="manufacturer 1">manufacturer 1</option>
                                                        <option value="manufacturer 2">manufacturer 2</option>
                                                        <option value="manufacturer 3">manufacturer 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Category</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="product_category" id="product_category">
                                                        <option value="None" hidden>-None-</option>
                                                        <option value="product Category 1">product Category 1</option>
                                                        <option value="product Category 2">product Category 2</option>
                                                        <option value="product Category 3">product Category 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Sales Start Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="date" id="sales_start" name="sales_start" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Sales End Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="date" id="sales_end" name="sales_end" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Support Start Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="date" id="support_start" name="support_start" class="form-control">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Support End Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="date" id="support_end" name="support_end" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Item Group</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <select class="form-select" name="product_item_group" id="product_item_group">
                                                        <option value="None" hidden>-None-</option>
                                                        <option value="product item 1">product item 1</option>
                                                        <option value="product item 2">product item 2</option>
                                                        <option value="product item 3">product item 3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <h6 class="mt-5">Price Information</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Unit Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" id="unit_price" name="unit_price" class="form-control">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Tax</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" id="tax" name="tax" class="form-control">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Commission Rate</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input class="form-control" type="text" value="" id="commission_rate" name="commission_rate">


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Taxable</label>
                                                <div class="input-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="taxable" name="taxable">

                                                    </div>

                                                </div>
                                            </div>
                                            <h6 class="mt-5">Stock Information</h6>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Delivery Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" id="delivery_date" name="delivery_date">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Quantity Ordered</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="qty_order" name="qty_order">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label"> Usage Unit</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="usage_unit" id="usage_unit">
                                                        <option value="None" hidden>-None-</option>
                                                        <option value="usage unit 1">usage unit 1</option>
                                                        <option value="usage unit 2">usage unit 2</option>
                                                        <option value="usage unit 3">usage unit 3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Reorder Level</label>
                                                <div class="input-group">
                                                    <input type="text" name="reorder_level" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Quantity in Stock</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="qty_stock">

                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <label class="col-form-label">Quantity in Demand</label>
                                                <div class="input-group">
                                                    <!-- <div class="input-group-prepend bg-danger" style="width:3px;"></div> -->
                                                    <!-- <div class="form-check form-switch"> -->
                                                    <input class="form-control" type="text" id="" name="quantity_demand">
                                                    <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                                                    <!-- </div> -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Handler</label>
                                                <div class="input-group">
                                                    <!-- <div class="form-check form-switch"> -->
                                                    <input class="form-control" type="text" name="handler">
                                                    <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                                                    <!-- </div> -->
                                                </div>
                                            </div>

                                            <h6 class="mt-5">Description Information</h6>

                                            <div class="col-md-12">
                                                <label class="col-form-label">Description</label>
                                                <div class="input-group">
                                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
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