<!doctype html>
<html lang="en">

    <head>
        <?= $this->include('admin/layouts/title-meta') ?>
        <?= $this->include('admin/layouts/css') ?>
    </head>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
        
            <!-- ========== Left Sidebar Start ========== -->
            <?= $this->include('admin/layouts/sidebar') ?>
            
            <!-- Left Sidebar End -->
    
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
    
                <div class="page-content" style="padding: 0;">
    
                    <?= $this->include('admin/layouts/page-title') ?>
    
                    <div class="container-fluid">
                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title mb-4 float-sm-start">Booking Overview</h4>
                                            <div class="clearfix"></div>
                                            <div class="row align-items-center">
                                                <div class="col-xl-12">
                                                    <div>
                                                        <div *id="stacked-column-chart" id="chart" class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                                <!--
                                                <div class="col-xl-3">
                                                    <div class="dash-info-widget mt-4 mt-lg-0 py-4 px-3 rounded">
    
                                                    </div>
                                                </div>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
                                <div class="col-xl-4">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <p class="font-size-16">Bookings</p>
                                                        <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                            <span class="avatar-title rounded-circle bg-soft-primary">
                                                                    <i class="dripicons-list text-primary font-size-20"></i>
                                                                </span>
                                                        </div>
                                                        <h5 class="font-size-22"><?= $total_bookings ?></h5>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="<?= $total_bookings ?>" aria-valuemin="0" aria-valuemax="<?= $total_bookings ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <p class="font-size-16">Properties</p>
                                                        <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                            <span class="avatar-title rounded-circle bg-soft-info">
                                                                    <i class="dripicons-location text-info font-size-20"></i>
                                                                </span>
                                                        </div>
                                                        <h5 class="font-size-22"><?= $total_properties ?></h5>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="<?= $total_properties ?>" aria-valuemin="0" aria-valuemax="<?= $total_properties ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <p class="font-size-16">Cleaners</p>
                                                        <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                            <span class="avatar-title rounded-circle bg-soft-dark">
                                                                    <i class="dripicons-user-group text-dark font-size-20"></i>
                                                                </span>
                                                        </div>
                                                        <h5 class="font-size-22"><?= $total_cleaners ?></h5>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar progress-bar bg-dark" role="progressbar" style="width: 100%" aria-valuenow="<?= $total_cleaners ?>" aria-valuemin="0" aria-valuemax="<?= $total_cleaners ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <p class="font-size-16">Units</p>
                                                        <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                            <span class="avatar-title rounded-circle bg-soft-warning">
                                                                    <i class="dripicons-store text-warning font-size-20"></i>
                                                                </span>
                                                        </div>
                                                        <h5 class="font-size-22"><?= $total_units ?></h5>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="<?= $total_units ?>" aria-valuemin="0" aria-valuemax="<?= $total_units ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <p class="font-size-16">Technicians</p>
                                                        <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                            <span class="avatar-title rounded-circle bg-soft-success">
                                                                    <i class="dripicons-user text-success font-size-20"></i>
                                                                </span>
                                                        </div>
                                                        <h5 class="font-size-22"><?= $total_technicians ?></h5>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="<?= $total_technicians ?>" aria-valuemin="0" aria-valuemax="<?= $total_technicians ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <p class="font-size-16">Rooms</p>
                                                        <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                            <span class="avatar-title rounded-circle bg-soft-danger">
                                                                    <i class="dripicons-view-thumb text-danger font-size-20"></i>
                                                                </span>
                                                        </div>
                                                        <h5 class="font-size-22"><?= $total_rooms ?></h5>
                                                        <div class="progress mt-3" style="height: 4px;">
                                                            <div class="progress-bar progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="<?= $total_rooms ?>" aria-valuemin="0" aria-valuemax="<?= $total_rooms ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="card">
                                        <!-- <div class="card-body">
                                            <h4 class="header-title mb-4">Revenue Stastics</h4>
    
                                            <div class="media">
    
                                                <h4>$14,235 </h4>
    
    
                                                <div class="media-body ps-3">
    
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Today<i class="mdi mdi-chevron-down ms-1"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">Yesterday</a>
                                                            <a class="dropdown-item" href="#">Last Week</a>
                                                            <a class="dropdown-item" href="#">last Month</a>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
    
                                            <div class="mt-3">
                                                <div id="stastics-chart"></div>
                                            </div>
    
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
    
                <?= $this->include('admin/layouts/footer') ?>
                
            </div>
            <!-- end main content-->
    
        </div>
        <!-- END layout-wrapper -->
    
        <?= $this->include('admin/layouts/script') ?>
        <script>
            $(document).ready(function () {
                var options = {
                    series: [{
                      name: 'Checkins',
                      data: [<?= implode(", ", $checkins) ?>]
                    }, {
                      name: 'Checkouts',
                      data: [<?= implode(", ", $checkouts) ?>]
                    }],
                      chart: {
                      type: 'bar',
                      height: 350
                    },
                    plotOptions: {
                      bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                      },
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      show: true,
                      width: 2,
                      colors: ['transparent']
                    },
                    xaxis: {
                      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                      group: {
                        style: {
                          fontSize: '10px',
                          fontWeight: 700
                        },
                        groups: [
                          { title: '<?= date('Y') ?>', cols: 12},
                        ]
                      },
                    },
                    yaxis: {
                      title: {
                        text: 'Bookings'
                      }
                    },
                    fill: {
                      opacity: 1
                    },
                    tooltip: {
                      y: {
                        formatter: function (val) {
                          return val + " bookings"
                        }
                      }
                    }
                };
        
                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            });
        </script>
    
    </body>
</html>