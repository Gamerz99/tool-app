<?php
$mainmenu = $this->mainmenu->buildMenu($session_data['id'], 7);
$prof_inf = $this->messages->getUserInf($session_data['id']);
$data['title'] = "STOCK";
$data['mainmenu'] = $mainmenu;
$data['profinf'] = $prof_inf;
$data['userinf'] = $session_data;
if (isset($msg)) {
    $data['msg'] = $this->messages->getMessage($msg);
}
$this->load->view('layout/header2', $data);
?>

<div class="content-wrapper" role="main">
    <div class="">
        <section class="content-header">
            <h1>
                Tool List
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Tool List</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>  Date From   </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php
                                        echo form_input('datefrom', '', 'class="form-control col-md-7 col-xs-12 pull-right" id="datefrom" autocomplete="off"  autocorrect="off" autocapitalize="off"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>  Date  To  </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php
                                        echo form_input('dateto', '', 'class="form-control col-md-7 col-xs-12 pull-right" id="dateto" autocomplete="off"  autocorrect="off" autocapitalize="off"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Brand </label>
                                    <?php
                                    echo form_dropdown('brand', $brand, '', 'class="form-control col-md-7 col-xs-12" id="brand"');
                                    ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="report-list pull-right">
                                    <?php
                                    echo form_button('reset', 'Reset', 'id="reset" class="btn btn-primary"');
                                    echo "&nbsp;";
                                    echo form_button('search', 'search', 'id="search" class="btn btn-primary pull-right"');
                                    ?>
                                </div>
                            </div>

                            <div class="col-md-12 table-responsive">
                                <table id="example4" class="table table-bordered table-striped dataTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> Tool name </th>
                                            <th> Brand </th>
                                            <th> Description </th>
                                            <th> Code </th>
                                            <th> Entered By</th>
                                            <th> Date </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
$this->load->view('layout/footer2');
?>

<script>
    $(document).ready(function () {
        load();
    });

    $("#search").click(function () {
        var datefrom = $('#datefrom').val();
        var dateto = $('#dateto').val();
        var brand = $('#brand').val();

        $('#example4').DataTable().destroy();
        $('#example4').DataTable({
            "ajax": "<?php echo base_url(); ?>index.php/api/stock_api/tool_list/" + datefrom + "/" + dateto +"/" + brand,
            "columnDefs": [
                {"width": "1%", "targets": 0}
            ],
            dom: 'Bfrtip',
            "aLengthMenu": [100],
            "order": [[0, "desc"]],
            "scrollX": true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    $("#reset").click(function () {
        $('#example4').DataTable().destroy();
        load();
    });

    function load() {
        var table = $('#example4').DataTable({
            "ajax": "<?php echo base_url(); ?>index.php/api/stock_api/tool_list",
            "columnDefs": [
                {"width": "1%", "targets": 0}
            ],
            dom: 'Bfrtip',
            "aLengthMenu": [100],
            "order": [[0, "desc"]],
            "scrollX": true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    }

</script>


