<!doctype html>
<html lang="en">

    <head>
         
        
        <meta charset="utf-8" />
        <title>Bookings</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


        
        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  
        <style>
       .hidden{
           margin:5%;
        }
        @media only screen and (max-width: 600px) {
            form{
            padding-top:15%;
            padding-bottom:5%;
            margin-left:3%;
            margin-right:3%;
        }
      }
    </style>
    </head>

    
    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?php 
        include('layouts/sidebar.php')
        ?>
       

        <!-- ========== Left Sidebar Start ========== -->
        <?php 
        include('layouts/sidebar.php')
        ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content" style="padding: 0;">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title">
                                     <h4>Hotel Locations</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Bookings</a></li>
                                             <li class="breadcrumb-item active">Add Booking</li>
                                         </ol>
                                 </div>
                             </div>
                             
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    


                    <div class="container-fluid">

                        <div class="page-content-wrapper">

                        


                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <h4 class="header-title">Add Booking</h4>
                                            <?php if(session()->getFlashdata('msg')):?>
                                            <div class="alert alert-warning">
                                            <?= session()->getFlashdata('msg') ?>
                                            </div>
                                            <?php endif;?>
                                            <form action="<?php echo base_url('admin_post_booking');?>" method="post">
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Hotel Location</label>
                                                <select  class="form-control" id="hotel_location_id" name="hotel_location_id" onchange="run()">
                                                <option value="0">Select</option>
                                                <?php if($hotels): ?>
                                                <?php foreach($hotels as $hotel): ?>
                                                   
                                                <option value="<?php echo $hotel['id']; ?>"><?php echo $hotel['hotel']; ?></option>
                                                <?php endforeach; ?>
                                                 <?php endif; ?>
                                                </select>                                                    
                                             </div>
                                                
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Building Name</label>
                                                <select  class="form-control" name="building_id" id="building" onchange="run2()">
                                                <option value="0">Select</option>
                                               
                                                </select>                                                     
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Checkin</label>
                                                <input class="form-control" type="datetime-local" name="checkin" value=""  id="" required>
                                                </div>
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Checkout</label>
                                                <input class="form-control"  type="datetime-local" name="checkin" value="" id="control" required>                                               
                                               </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Customer Name</label>
                                                <input class="form-control" type="text" name="customer_name" placeholder="Customer Name" required>
                                                </div>
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Customer Email</label>
                                                <input class="form-control"  type="email" name="email" placeholder="Customer Email" required>                                               
                                               </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Customer Phone</label>
                                                <input class="form-control" type="text" name="phone_no" placeholder="Customer Phone" required>
                                                </div>
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Total Persons</label>
                                                <input class="form-control"  type="number" name="persons" placeholder="Total Persons" required>                                               
                                               </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Source</label>
                                                <input class="form-control" type="text" name="source" placeholder="Source" required>
                                                </div>
                                            </div>
                                            <input type="hidden" id="room_id" name="room_id">
                                            <div id="hidden" style="display:none">
                                             <b>Available Rooms</b>
                                            <table class="table" style="border:1px solid black"><thead><tr style="background-color:black;color:white"><th scope="col">Room Number</th><th scope="col">Floor Number</th><th scope="col">Select</th><th scope="col">Price</th></tr></thead><tbody id="hidden2"></tbody></table>
                                            </div>
                                            <button class="btn btn-primary" type="submit">
                                                Add
                                            </button>
                                            </form>
                                                <script>
                                                function run() {
                                                    var id = document.getElementById("hotel_location_id").value;
                                                    $.ajax({
                                                    url: 'getbuildingsinbooking/'+id,
                                                    type: 'get',
                                                    dataType: 'json',
                                                    success: function(response){
                                                        var html='';
                                                        for (let i = 0; i < response.length; i++) {
                                                        var x = response[i]['building_name'];
                                                        var y = response[i]['id'];
                                                        console.log(x);
                                                         html+='<option value="'+y+'">'+x+'</option><br>';
                                                        }
                                                         document.getElementById('building').innerHTML+= html;
                                                    }
                                                    });
                                                    }


                                                    function run2() {
                                                    document.getElementById('hidden').style.display = "block";
                                                    var id = document.getElementById("building").value;
                                                   
                                                    $.ajax({
                                                    url: 'getroomsinbooking/'+id,
                                                    type: 'get',
                                                    dataType: 'json',
                                                    success: function(response){
                                                        console.log(response);
                                                        var html='';
                                                        for (let i = 0; i < response.length; i++) {
                                                        var x = response[i]['room_no'];
                                                        var y = response[i]['id'];
                                                        var z = response[i]['status'];
                                                        var floor_no = response[i]['floor_no'];
                                                        var price = response[i]['price'];
                                                        console.log(x);
                                                            html+='<tr style="background-color:#f7bfbe"><td scope="row">'+x+'</td><td scope="row">'+floor_no+'</td><td><input id="radio-1" onclick="myFunction(event)" value="'+y+'" name="radio_value" id="radio_value" type="radio" style="height:30px;width:30px"></td><td>'+price+'</td></tr>';
                                                        }
                                                         document.getElementById('hidden2').innerHTML+= html;
                                                    }
                                                    });
                                                    }
                                                    function myFunction(event) {
                                                        document.getElementById("room_id").value = event.target.value;
                                                        }
                                                </script>
            
                                           
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
            
                            

                        </div>
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

              
                
        <?php 
        include('layouts/footer.php')
        ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

         <!-- Required datatable js -->
         <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
         <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
         <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
         <script src="assets/libs/jszip/jszip.min.js"></script>
         <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
         <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
         <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
         <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
         <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
         <!-- Responsive examples -->
         <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
         <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

          <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>   
 

        <script src="assets/js/app.js"></script>

    </body>
</html>
