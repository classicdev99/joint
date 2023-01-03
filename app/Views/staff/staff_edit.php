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
                                <form action="<?= base_url(session('role') . '/staffs/edit_submit/'. $record['id']) ?>"
                                    method="POST">
                                    <div class="card-body">

                                        <div class="d-flex flex-row-reverse">
                                            <input type="submit" value="Save" class="btn btn-primary mb-3">
                                            &ensp;
                                            <a href="<?= base_url(session('role') . '/staffs') ?>"
                                                class="btn btn-secondary mb-3"
                                                onclick="return confirm('Cancel adding staff?');">Cancel</a>
                                        </div>

                                        <div class="row mb-5">
                                            <h6 class="mb-3">Staff Information</h6>
                                            <?php if(isset($validation)):?>
                                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                            <?php endif;?>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="name"
                                                        value="<?= $record['name']?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="email"
                                                        value="<?= $record['email']?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Password Confirm</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="password" class="form-control" name="confirm">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Phone Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-danger" style="width:3px;"></div>
                                                    <input type="text" class="form-control" name="phone"
                                                        value="<?= $record['phone_no']?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Role</label>
                                                <div class="input-group">
                                                    <select class="form-select" name="role">
                                                        <option
                                                            <?= (0 == $record['role'] ? 'selected="selected"' : '') ?>
                                                            value="0">Admin</option>
                                                        <option
                                                            <?= (1 == $record['role'] ? 'selected="selected"' : '') ?>
                                                            value="1">Staff</option>
                                                    </select>
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