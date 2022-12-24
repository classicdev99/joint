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
                                    <a href="<?= base_url(session('role') . '/Orders/add') ?>" class="btn btn-primary mb-3">Add Orders</a>

                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        </th>
                                                        <th>Status</th>
                                                        <th>Grand Total</th>
                                                        <th>Deal Name</th>
                                                        <th>Contact Name</th>
                                                        <th>Account Name</th>
                                                        <th>Purchase Order Owner</th>
                                                        <th>Created Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($Orders as $row) : ?>
                                                        <tr>
                                                            <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            </td>
                                                            <td><?= $row['status'] ?></td>
                                                            <td>???</td>
                                                            <td><?= $row['deal'] ?></td>
                                                            <td><?= $row['contact_name'] ?></td>
                                                            <td><?= $row['account_name'] ?></td>
                                                            <td><?= $row['purchase_owner'] ?></td>
                                                            <td><?= $row['created_at'] ?></td>
                                                            <td>
                                                                <a href="<?= base_url(session('role') . '/Orders/edit/' . $row['id']) ?>" class="btn btn-primary btn-sm" title="Update Orders">
                                                                    <i class='fas fa-edit'></i>
                                                                </a>
                                                                <a href="<?= base_url(session('role') . '/Orders/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?');">
                                                                    <i class="fas fa-trash-alt" title="Delete Account"></i>
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

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?= $this->include('layouts/script') ?>
</body>

</html>