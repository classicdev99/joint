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
                                <div class="card-header">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="add();"
                                        style="float:right;">Add</a>
                                    <h4 class="card-title">List</h4>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <?php 
                                                    if(session('isAdmin')){
                                                ?>
                                                <th>Approve</th>
                                                <?php } ?>
                                                <th>Employee Name</th>
                                                <th>Leave Type</th>
                                                <th>Reason</th>
                                                <th>From Date</th>
                                                <th>Till Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $value){ ?>
                                            <tr>
                                                <?php 
                                                    if(session('isAdmin')){
                                                ?>
                                                <td><input class="form-check-input" type="checkbox" value=""
                                                        id="<?= 'leave_'.$value['id']?>"
                                                        <?php if($value['state'] == 1) echo 'checked'?>
                                                        onclick="onApprove('<?php echo $value['id']; ?>')">
                                                </td>
                                                <?php } ?>
                                                <td><?php echo $value['employee_name']; ?></td>
                                                <td><?php echo $value['leave_type']; ?></td>
                                                <td><?php echo $value['reason']; ?></td>
                                                <td><?php echo $value['from_date']; ?></td>
                                                <td><?php echo $value['till_date']; ?></td>

                                                <td>
                                                    <a href="javascript:void(0);"
                                                        onclick="edit('<?php echo $value['id']; ?>')"
                                                        class="btn btn-sm btn-primary"><i
                                                            class="ri-edit-2-fill"></i></a>
                                                    <!-- <a href="javascript:void(0);" onclick="edit('<?php echo $value['id']; ?>')" class="btn btn-sm btn-info"><i class=" ri-eye-line"></i></a> -->
                                                    <a href="javascript:void(0);"
                                                        onclick="deleted('<?php echo $value['id']; ?>')"
                                                        class="btn btn-sm btn-danger"><i
                                                            class="ri-delete-bin-5-line"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <!--  Modal content for the above example -->
                    <div class="modal bs-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Manage Leave</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="<?php echo base_url(session('role'));?>/leave/save" method="post"
                                    id="manageForm">
                                    <div class="modal-body">
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="employee_name">Employee
                                                Name</label>
                                            <div class="col-sm-10 ">
                                                <input type="text" name="employee_name" id="employee_name"
                                                    class="form-control">
                                                <input type="hidden" name="id" id="edit_id">
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="leave_type">Leave Type</label>
                                            <div class="col-sm-10 ">
                                                <select name="leave_type" id="leave_type" class="form-control">
                                                    <option value="CL">CL</option>
                                                    <option value="EL">EL</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="reason">Reason</label>
                                            <div class="col-sm-10 ">
                                                <textarea name="reason" id="reason" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="from_date ">From Date </label>
                                            <div class="col-sm-10 ">
                                                <input type="date" name="from_date" id="from_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="till_date">Till Date</label>
                                            <div class="col-sm-10 ">
                                                <input type="date" name="till_date" id="till_date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light waves-effect"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->



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
    function add() {
        document.getElementById('manageForm').reset();
        $('#edit_di').val('');
        $('.bs-example-modal-xl').modal('show');
    }
    $("#manageForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            beforeSend: function() {
                $('#preloader').css('display', 'block');
            },
            success: function(responce) {
                //console.log(responce);return false;
                if (responce.error) {
                    // $.notify(responce.message, "warn",{arrowSize: 20});
                } else {
                    Swal.fire(
                        'Good job!',
                        'Submited successfully!',
                        'success'
                    );
                    document.getElementById('manageForm').reset();
                    $('.bs-example-modal-xl').modal('hide');
                    // $.notify(responce.message, "success",{arrowSize: 20});
                    setTimeout(function() {
                        location.reload();
                    }, 1000);

                }
            },
            error: function() {
                $('#preloader').css('display', 'none');
                // $.notify("BOOM....!", "error");
            },
            complete: function() {
                $('#preloader').css('display', 'none');
            }
        });
    });

    function edit(input) {
        $.ajax({
            type: 'get',
            url: '<?php echo base_url(session('role'));?>/leave/edit-view/' + input,
            dataType: 'json',
            data: {},
            beforeSend: function() {
                $('#preloader').css('display', 'block');
            },
            success: function(responce) {
                if (responce.error) {
                    // $.notify(responce.message, "warn",{arrowSize: 20});
                } else {
                    $('#edit_id').val(responce.message.id);
                    $('#leave_type').val(responce.message.leave_type);
                    $('#reason').val(responce.message.reason);
                    $('#from_date').val(responce.message.from_date);
                    $('#till_date').val(responce.message.till_date);
                    $('#employee_name').val(responce.message.employee_name);
                    $('.bs-example-modal-xl').modal('show');
                }
            },
            error: function() {
                $('#preloader').css('display', 'none');
                // $.notify("BOOM....!", "error");
            },
            complete: function() {
                $('#preloader').css('display', 'none');
            }
        });
    }

    function deleted(input) {
        if (confirm('Do you want to delete?')) {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url(session('role'));?>/leave/delete/' + input,
                dataType: 'json',
                data: {},
                beforeSend: function() {
                    $('#preloader').css('display', 'block');
                },
                success: function(responce) {
                    if (responce.error) {
                        // $.notify(responce.message, "warn",{arrowSize: 20});
                    } else {
                        Swal.fire(
                            'Good job!',
                            'Deleted successfully!',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        // $.notify(responce.message, "success",{arrowSize: 20});
                        // window.location.reload();
                    }
                },
                error: function() {
                    $('#preloader').css('display', 'none');
                    // $.notify("BOOM....!", "error");
                },
                complete: function() {
                    $('#preloader').css('display', 'none');
                }
            });
        }
    }

    function onApprove(input) {
        state = 0;
        if ($('#leave_' + input).is(':checked')) state = 1;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(session('role'));?>/leave/approve/' + input,
            dataType: 'json',
            data: {
                state: state,
            },
            beforeSend: function() {
                $('#preloader').css('display', 'block');
            },
            success: function(responce) {
                if (responce.error) {
                    // $.notify(responce.message, "warn",{arrowSize: 20});
                } else {

                }
            },
            error: function() {
                $('#preloader').css('display', 'none');
                // $.notify("BOOM....!", "error");
            },
            complete: function() {
                $('#preloader').css('display', 'none');
            }
        });
    }
    </script>
</body>

</html>