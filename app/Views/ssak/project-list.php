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
                <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="add();"  style="float:right;">Add</a>
                <h4 class="card-title">List</h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Project Owner</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Project Overview</th>
                            <th>Status</th>
                            <th>Project Group</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $value){ ?>
                        <tr>
                            <td><?php echo $value['project_name']; ?></td>
                            <td><?php echo $value['project_owner']; ?></td>
                            <td><?php echo $value['start_date']; ?></td>
                            <td><?php echo $value['end_date']; ?></td>
                            <td><?php echo $value['project_overview']; ?></td>
                            <td><?php echo $value['status']; ?></td>
                            <td><?php echo $value['project_proup']; ?></td>
                            <td>
                                <a href="javascript:void(0);" onclick="edit('<?php echo $value['id']; ?>')" class="btn btn-sm btn-primary"><i class="ri-edit-2-fill"></i></a>
                                <!-- <a href="javascript:void(0);" onclick="edit('<?php echo $value['id']; ?>')" class="btn btn-sm btn-info"><i class=" ri-eye-line"></i></a> -->
                                <a href="javascript:void(0);" onclick="deleted('<?php echo $value['id']; ?>')" class="btn btn-sm btn-danger"><i class="ri-delete-bin-5-line"></i></a>
                                <a href="<?= base_url(session('role') . '/project/task/'.$value['id']) ?>" class="btn btn-sm btn-info"><i class="ri-file-list-fill"></i></a>
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
<div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Manage Purchases</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url(session('role'));?>/project/save" method="post" id="manageForm">
            <div class="modal-body">
                
                    <div class="row m-2">
                        <label class="col-sm-2 col-form-label" for="project_name">Project Name</label>
                        <div class="col-sm-10 ">
                        <input type="text" name="project_name" id="project_name" class="form-control">
                        <input type="hidden" name="id" id="edit_id" >
                        </div>
                    </div>
                    <div class="row m-2">
                        <label class="col-sm-2 col-form-label" for="project_owner">Project Owner</label>
                        <div class="col-sm-10 ">
                        <input type="text" name="project_owner" id="project_owner" class="form-control">
                        </div>
                    </div>
                    <div class="row m-2">
                        <label class="col-sm-2 col-form-label" for="start_date">Start Date</label>
                        <div class="col-sm-10 ">
                        <input type="date" name="start_date" id="start_date" class="form-control">
                        </div>
                    </div>
                    <div class="row m-2">
                        <label class="col-sm-2 col-form-label" for="end_date">End Date</label>
                        <div class="col-sm-10 ">
                        <input type="date" name="end_date" id="end_date" class="form-control">
                        </div>
                    </div>

                    <div class="row m-2">
                        <label class="col-sm-2 col-form-label" for="project_overview">Project Overview</label>
                        <div class="col-sm-10 ">
                        <textarea name="project_overview" id="project_overview" class="form-control"></textarea>
                        </div>
                    </div>
                   
                    <div class="row m-2">
                        <label class="col-sm-2 col-form-label" for="status">Status</label>
                        <div class="col-sm-10 ">
                            <select name="status" id="statuss" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="Inprogress">Inprogress</option>
                                <option value="Active">Active</option>
                                <option value="Close">Close</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <label class="col-sm-2 col-form-label" for="project_proup">Project Group</label>
                        <div class="col-sm-10 ">
                        <input type="text" name="project_proup" id="project_proup" class="form-control">
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
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
        function add()
        {   
            document.getElementById('manageForm').reset();
            $('#edit_di').val('');
            $('.bs-example-modal-xl').modal('show');
        }
        $("#manageForm").submit(function(event) {
          event.preventDefault();
          $.ajax({
                   type: $(this).attr('method'), 
                   url: $(this).attr('action'),
                   dataType:'json',
                   cache: false,
                   contentType: false,
                   processData: false,
                   data: new FormData(this),
                   beforeSend:function()
                   {
                     $('#preloader').css('display','block');
                   },
                   success:function(responce)
                   {
                    //console.log(responce);return false;
                     if(responce.error)
                     {
                        // $.notify(responce.message, "warn",{arrowSize: 20});
                     }else
                     {
                        Swal.fire(
                                  'Good job!',
                                  'Submited successfully!',
                                  'success'
                                );
                        document.getElementById('manageForm').reset();
                        $('.bs-example-modal-xl').modal('hide');
                        // $.notify(responce.message, "success",{arrowSize: 20});
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                        
                     }  
                   },
                   error:function()
                   {
                     $('#preloader').css('display','none');
                     // $.notify("BOOM....!", "error");
                   },
                   complete:function()
                   {
                     $('#preloader').css('display','none');
                   }
               });
        });
        
        function edit(input)
        {
            $.ajax({
                  type:'get', 
                  url: '<?php echo base_url(session('role'));?>/project/edit-view/'+input,
                  dataType:'json',
                  data: {}, 
                  beforeSend:function()
                  {
                    $('#preloader').css('display','block');
                  },
                  success:function(responce)
                  {
                    if(responce.error)
                    {
                      // $.notify(responce.message, "warn",{arrowSize: 20});
                    }else
                    {
                      $('#edit_id').val(responce.message.id);
                      $('#project_name').val(responce.message.project_name);
                      $('#project_owner').val(responce.message.project_owner);
                      $('#start_date').val(responce.message.start_date);
                      $('#end_date').val(responce.message.end_date);
                      $('#project_overview').val(responce.message.project_overview);
                      $('#statuss').val(responce.message.status);
                      $('#project_proup').val(responce.message.project_proup);
                      $('.bs-example-modal-xl').modal('show');
                    }  
                  },
                  error:function()
                  {
                    $('#preloader').css('display','none');
                    // $.notify("BOOM....!", "error");
                  },
                  complete:function()
                  {
                    $('#preloader').css('display','none');
                  }
            });
        }
          
        function deleted(input)
        {
            if(confirm('Do you want to delete?')){
            $.ajax({
                    type:'get', 
                    url: '<?php echo base_url(session('role'));?>/project/delete/'+input,
                    dataType:'json',
                    data: {}, 
                    beforeSend:function()
                    {
                      $('#preloader').css('display','block');
                    },
                    success:function(responce)
                    {
                      if(responce.error)
                      {
                        // $.notify(responce.message, "warn",{arrowSize: 20});
                      }else
                      {
                        Swal.fire(
                                  'Good job!',
                                  'Deleted successfully!',
                                  'success'
                                )
                         setTimeout(function(){
                            location.reload();
                        }, 1000);
                        // $.notify(responce.message, "success",{arrowSize: 20});
                        // window.location.reload();
                      }  
                    },
                    error:function()
                    {
                      $('#preloader').css('display','none');
                      // $.notify("BOOM....!", "error");
                    },
                    complete:function()
                    {
                      $('#preloader').css('display','none');
                    }
            });  
            }   
        }
    </script>
</body>

</html>
