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
                                    <a href="<?= base_url(session('role') . '/account/add') ?>"
                                        class="btn btn-primary mb-3">Add Account</a>

                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault">
                                                        </th>
                                                        <th></th>
                                                        <th>Account Name</th>
                                                        <th>Billing Street</th>
                                                        <th>Industy</th>
                                                        <th>Payment Term</th>
                                                        <th>Phone</th>
                                                        <th>Territory</th>
                                                        <th>Account Owner</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($accounts)) {
                                                        $id = 0;
                                                        foreach ($accounts as $account) {
                                                            $id = $id + 1; ?>
                                                    <tr>
                                                        <td><input class="form-check-input" type="checkbox"
                                                                value="<?= $account['id']; ?>" id="flexCheckDefault">
                                                        </td>
                                                        <td><span onclick="show(<?= $id ?>)"><img
                                                                    src="/assets/icons/plus-solid.svg" width="10"
                                                                    id="bt-<?= $id ?>" /></span></td>
                                                        <td><a
                                                                href="<?= base_url(session('role') . '/account/view/' . $account['id']) ?>"><?= $account['accountname']; ?></a>
                                                        </td>
                                                        <td><?= $account['billstreet']; ?></td>
                                                        <td><?= $account['industry']; ?></td>
                                                        <td><?= $account['paymentterm']; ?></td>
                                                        <td>
                                                            <a href="https://wa.me/<?= $account['phonenumber']; ?>">
                                                                <?= $account['phonenumber']; ?>
                                                            </a>
                                                        </td>
                                                        <td><?= $account['territory']; ?></td>
                                                        <td><?= $account['accountowner']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url(session('role') . '/account/edit/' . $account['id']) ?>"
                                                                class="btn btn-primary btn-sm" title="Update Account">
                                                                <i class='fas fa-edit'></i>
                                                            </a>
                                                            <a href="<?= base_url(session('role') . '/account/delete/' . $account['id']) ?>"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Do you want to delete?');">
                                                                <i class="fas fa-trash-alt" title="Delete Account"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php if (isset($account['contact'])) { ?>
                                                    <tr id="cd-<?= $id ?>" style="display:none;">
                                                        <td colspan="8">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Contact Name</th>
                                                                    <th>Contact Email</th>
                                                                    <th>Contact Phone</th>
                                                                </tr>
                                                                <?php
                                                                            foreach (json_decode($account['contact'], true) as $con) {

                                                                            ?>
                                                                <tr>
                                                                    <td><?= $con['name'] ?></td>
                                                                    <td><?= $con['email'] ?></td>
                                                                    <td><?= $con['phone'] ?></td>
                                                                </tr>
                                                                <?php
                                                                            } ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                            }
                                                        }
                                                    } ?>
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
    <script>
    var ids = [];

    function show(id) {
        if (ids.includes(id)) {
            $('#cd-' + id).hide();
            const index = ids.indexOf(id);
            if (index > -1) { // only splice array when item is found
                ids.splice(index, 1); // 2nd parameter means remove one item only
                $('#bt-' + id).attr('src', '/assets/icons/plus-solid.svg');
            }
        } else {
            $('#cd-' + id).show();
            ids.push(id);
            $('#bt-' + id).attr('src', '/assets/icons/minus-solid.svg');
        }
    }
    </script>
</body>

</html>