<?php
 
$mainmenu = $this->mainmenu->buildMenu($session_data['utype'],1);
 
$prof_inf = $this->messages->getUserInf($session_data['id']);
$data['title'] = "Home";
$data['mainmenu'] = $mainmenu;
$data['profinf'] = $prof_inf;
$data['userinf'] = $session_data;
if (isset($msg)) {
    $data['msg'] = $this->messages->getMessage($msg);
}
$this->load->view('layout/header1', $data);
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/morris.js/morris.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>100</h3>
                        <p>Daily Sales</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 23px">%</sup></h3>
                        <p>GRN</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Reports</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                <!-- TO DO List -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">To Do List</h3>
                        <div class="box-tools pull-right">
                            <ul class="pagination pagination-sm inline">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                        <ul class="todo-list">
                            <li>
                                <!-- drag handle -->
                                <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <!-- checkbox -->
                                <input type="checkbox" value="">
                                <!-- todo text -->
                                <span class="text">Design a nice theme</span>
                                <!-- Emphasis label -->
                                <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                <!-- General tools such as edit or delete-->
                                <div class="tools">
                                    <i class="fa fa-edit"></i>
                                    <i class="fa fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <input type="checkbox" value="">
                                <span class="text">Make the theme responsive</span>
                                <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                                <div class="tools">
                                    <i class="fa fa-edit"></i>
                                    <i class="fa fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <input type="checkbox" value="">
                                <span class="text">Let theme shine like a star</span>
                                <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                                <div class="tools">
                                    <i class="fa fa-edit"></i>
                                    <i class="fa fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <input type="checkbox" value="">
                                <span class="text">Let theme shine like a star</span>
                                <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                                <div class="tools">
                                    <i class="fa fa-edit"></i>
                                    <i class="fa fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <input type="checkbox" value="">
                                <span class="text">Check your messages and notifications</span>
                                <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                                <div class="tools">
                                    <i class="fa fa-edit"></i>
                                    <i class="fa fa-trash-o"></i>
                                </div>
                            </li>
                            <li>
                                <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <input type="checkbox" value="">
                                <span class="text">Let theme shine like a star</span>
                                <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                                <div class="tools">
                                    <i class="fa fa-edit"></i>
                                    <i class="fa fa-trash-o"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                    </div>
                </div>
            </section>
        </div>

        <div class="row">
            <div class="col-md-5">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                  <!--span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span-->
                    <span class="info-box-icon"><img src="<?php echo base_url(); ?>templates/dist/img/store.png" width="75%"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Store A</span>
                        <span class="info-box-number">5,200</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
                        <span class="progress-description">
                            50% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                  <!--span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span-->
                    <span class="info-box-icon"><img src="<?php echo base_url(); ?>templates/dist/img/store.png" width="75%"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Store B</span>
                        <span class="info-box-number">92,050</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
                        <span class="progress-description">
                            20% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-red">
                  <!--span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span-->
                    <span class="info-box-icon"><img src="<?php echo base_url(); ?>templates/dist/img/store.png" width="75%"></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Store C</span>
                        <span class="info-box-number">114,381</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.box -->
            </div>

            <section class="col-lg-7 connectedSortable">
                <!-- solid sales graph -->
                <div class="box box-solid bg-teal-gradient">
                    <div class="box-header">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Sales Graph</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart" id="line-chart" style="height: 250px;"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-border">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">
                                <div class="knob-label">Mail-Orders</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">
                                <div class="knob-label">Online</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">
                                <div class="knob-label">In-Store</div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
            </section>
        </div>
    </section>
    <!-- /.content -->
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Stock Summery '
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 10
            }
        },
        series: [{
                name: 'Brand',
                data: <?php echo $brandinf; ?>
            }]
    });
// Set up the chart
    var chart2 = new Highcharts.Chart({
        chart: {
            renderTo: 'container2',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Income Summary '
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
                data: <?php echo $date; ?>
            }]
    });
</script>
<!--Inner Container End -->
<?php
$this->load->view('layout/footer1');
?>
