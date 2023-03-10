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
                    <?php
                    $categories = array(
                        "Allowance-Outstation",
                        "Allowance-Accomodation",
                        "Travel-Meal",
                        "Travel-Transport/Flight",
                        "Travel-Hotel",
                        "Toll",
                        "Parking",
                        "Petrol/Mileage",
                        "Handphone Bill",
                        "Postage",
                        "Printing & Stationaries",
                        "Staff Welfare-Dining",
                        "Staff Welfare-Biscuits",
                        "Entertainment",
                        "Office Consumable (disposable)",
                        "Car Service",
                        "Upkeep-Office Equip",
                        "Upkeep-Office/Building",
                        "Cash Purchase-for sell",
                        "Cash Purchase-for tech repair",
                        "Others",
                    );
                    ?>
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
                                                <th>Category</th>
                                                <th>Expense Type</th>
                                                <th>Expense Date</th>
                                                <th>Expense Amount</th>
                                                <th>Remark</th>
                                                <th>Expense Voucher Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $value){ ?>
                                            <tr>

                                                <td><?php
                                                $index = intval($value['category']);
                                                echo $categories[$index - 1];
                                                ?></td>
                                                <td><?php echo $value['expense_type']; ?></td>
                                                <td><?php echo $value['expense_date']; ?></td>
                                                <td><?php echo $value['expense_amount']; ?></td>
                                                <td><?php echo $value['remark']; ?></td>
                                                <td><?php echo $value['expense_voucher_number']; ?></td>
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
                                    <h5 class="modal-title">Manage Expenses</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="<?php echo base_url(session('role'));?>/expenses/save" method="post"
                                    id="manageForm">
                                    <div class="modal-body">
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="category">Category</label>
                                            <div class="col-sm-10 ">
                                                <select class="form-select" name="category" id="category">
                                                    <option value="1">Allowance-Outstation</option>
                                                    <option value="2">Allowance-Accomodation
                                                    </option>
                                                    <option value="3">Travel-Meal</option>
                                                    <option value="4">Travel-Transport/Flight
                                                    </option>
                                                    <option value="5">Travel-Hotel</option>
                                                    <option value="6">Toll</option>
                                                    <option value="7">Parking</option>
                                                    <option value="8">Petrol/Mileage</option>
                                                    <option value="9">Handphone Bill</option>
                                                    <option value="10">Postage</option>
                                                    <option value="11">Printing & Stationaries
                                                    </option>
                                                    <option value="12">Staff Welfare-Dining</option>
                                                    <option value="13">Staff Welfare-Biscuits
                                                    </option>
                                                    <option value="14">Entertainment</option>
                                                    <option value="15">Office Consumable
                                                        (disposable)</option>
                                                    <option value="16">Car Service</option>
                                                    <option value="17">Upkeep-Office Equip</option>
                                                    <option value="18">Upkeep-Office/Building
                                                    </option>
                                                    <option value="19">Cash Purchase-for sell
                                                    </option>
                                                    <option value="20">Cash Purchase-for tech
                                                        repair</option>
                                                    <option value="21">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="expense_type">Expense
                                                Type</label>
                                            <div class="col-sm-10 ">
                                                <input type="text" name="expense_type" id="expense_type"
                                                    class="form-control">
                                                <input type="hidden" name="id" id="edit_id">
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="expense_date">Expense
                                                Date</label>
                                            <div class="col-sm-10 ">
                                                <input type="date" name="expense_date" id="expense_date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="expense_amount">Expense
                                                Amount</label>
                                            <div class="col-sm-10 ">
                                                <input type="text" name="expense_amount" id="expense_amount"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="remark">Remark</label>
                                            <div class="col-sm-10 ">
                                                <textarea name="remark" id="remark" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label" for="expense_voucher_number">Expense
                                                Voucher Number</label>
                                            <div class="col-sm-10 ">
                                                <input type="text" name="expense_voucher_number"
                                                    id="expense_voucher_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <label class="col-sm-2 col-form-label"
                                                for="expense_attchment">Attachment</label>
                                            <div class="col-sm-10 ">
                                                <input class="form-control" type="file" name="attachment"
                                                    accept="All files/*">
                                                <p name="old_attachment" id="old_attachment"></p>
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
                    </div>

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
            url: '<?php echo base_url(session('role'));?>/expenses/edit-view/' + input,
            dataType: 'json',
            data: {},
            beforeSend: function() {
                $('#preloader').css('display', 'block');
            },
            success: function(responce) {
                if (responce.error) {
                    // $.notify(responce.message, "warn",{arrowSize: 20});
                } else {
                    var fileName = responce.message.attachment;
                    if (fileName != null) {
                        var n = fileName.lastIndexOf("/");
                        fileName = fileName.substr(n + 1);
                    }


                    $('#edit_id').val(responce.message.id);
                    $('#expense_type').val(responce.message
                        .expense_type);
                    $('#expense_date').val(responce.message.expense_date);
                    $(
                        '#expense_amount').val(responce.message.expense_amount);
                    $('#remark').val(
                        responce.message.remark);
                    $('#expense_voucher_number').val(responce.message
                        .expense_voucher_number);
                    $('#category option[value=' + responce.message.category + ']').prop('selected', true);
                    $('#old_attachment').html(fileName);
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
                url: '<?php echo base_url(session('role'));?>/expenses/delete/' + input,
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
    </script>
</body>

</html>