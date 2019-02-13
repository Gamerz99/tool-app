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
                Tool Report
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Tool Report</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
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
                                        <th> Qty </th>
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
        var brand = $('#brand').val();

        $('#example4').DataTable().destroy();
        $('#example4').DataTable({
            "ajax": "<?php echo base_url(); ?>index.php/api/tool_api/tool_report/" + brand,
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
            "ajax": "<?php echo base_url(); ?>index.php/api/tool_api/tool_report",
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



