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
                                <div class="card-body">
                                    <a href="<?= base_url(session('role') . '/quotes/add') ?>"
                                        class="btn btn-primary mb-3">Add Quotes</a> &nbsp;
                                    <a href="<?= base_url(session('role') . '/quotes') ?>"
                                        class="btn btn-light mb-3">Refresh</a>
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="datatable-buttons"
                                                class="table table-striped table-bordered dt-responsive"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault">
                                                        </th>
                                                        <th>Quotation Date</th>
                                                        <th>MSP Quote Number</th>
                                                        <th>Subject</th>
                                                        <th>Quote Owner</th>
                                                        <th>Account Name</th>
                                                        <th>Grand Total</th>
                                                        <th>Quote Number</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($quotes as $row) : ?>
                                                    <tr>
                                                        <td hidden><?= $row['id']?></td>
                                                        <td><input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault"></td>
                                                        <td class='quotation_clickable'>???</td>
                                                        <td class='quotation_clickable'>???</td>
                                                        <td class='quotation_clickable'><?= $row['subject'] ?></td>
                                                        <td class='quotation_clickable'>???</td>
                                                        <td class='quotation_clickable'><?= $row['account_name'] ?></td>
                                                        <td class='quotation_clickable'>???</td>
                                                        <td class='quotation_clickable'>???</td>
                                                        <td>
                                                            <a href="<?= base_url(session('role') . '/quotes/edit/' . $row['id']) ?>"
                                                                class="btn btn-primary btn-sm" title="Update quotes">
                                                                <i class='fas fa-edit'></i>
                                                            </a>
                                                            <a href="<?= base_url(session('role') . '/quotes/delete/' . $row['id']) ?>"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Do you want to delete?');">
                                                                <i class="fas fa-trash-alt" title="Delete Account"></i>
                                                            </a>
                                                            <a href="<?= base_url(session('role') . '/quotepdf/' . $row['id']) ?>"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fas fa-download" title="Download"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- container-fluid -->

            </div>
            <!-- End Page-content -->

            <?= $this->include('layouts/footer') ?>
            <?= $this->include('dialog/quotation') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?= $this->include('layouts/script') ?>
</body>

</html>