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
                                                        <th>Current Sales</th>
                                                        <th>KPI</th>
                                                        <th>New KPI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($staffs as $row) : ?>
                                                    <tr>
                                                        <td><input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckDefault"></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td><?= $row['sales'] ?></td>
                                                        <td id="<?= 'kpi_'.$row['id']?>">
                                                            <?= $row['kpi'] ?>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" min="0" step="1"
                                                                pattern="[0-9]+" id="<?= 'newkpi_'.$row['id']?>">
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);"
                                                                onclick="onNewKPI('<?php echo $row['id']; ?>')"
                                                                class="btn btn-primary btn-sm" title="Update KPI">
                                                                <i class='fas fa-edit'></i>
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

    <script type="text/javascript">
    function onNewKPI(input) {
        kpi = $('#newkpi_' + input).val();

        kpi = Math.floor(kpi);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(session('role'));?>/kpi/newkpi/' + input,
            dataType: 'json',
            data: {
                kpi: kpi,
            },
            success: function(responce) {
                if (responce.error) {
                    // $.notify(responce.message, "warn",{arrowSize: 20});
                } else {
                    Swal.fire(
                        'Good job!',
                        'Updated successfully!',
                        'success'
                    )
                    $('#kpi_' + input).html(responce.message.kpi);
                    $('#newkpi_' + input).val("");
                }
            },
        });
    }
    </script>
</body>

</html>