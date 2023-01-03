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
                                    <a href="<?= base_url(session('role') . '/staffs/add') ?>"
                                        class="btn btn-primary mb-3">Add Staff</a> &nbsp;
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault">
                                                        </th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($staffs as $row) : ?>
                                                    <tr>
                                                        <td><input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault"></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td><?= $row['phone_no'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row['role'] == 0)
                                                                echo "Admin";
                                                            if ($row['role'] == 1)
                                                                echo 'Staff';
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url(session('role') . '/staffs/edit/' . $row['id']) ?>"
                                                                class="btn btn-primary btn-sm" title="Update Invoice">
                                                                <i class='fas fa-edit'></i>
                                                            </a>
                                                            <a href="<?= base_url(session('role') . '/staffs/delete/' . $row['id']) ?>"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Do you want to delete?');">
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