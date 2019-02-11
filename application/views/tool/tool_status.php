<?php
$mainmenu = $this->mainmenu->buildMenu($session_data['id'], 11);
$prof_inf = $this->messages->getUserInf($session_data['id']);
$data['title'] = "TOOL";
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
                Tool Status
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Tool Status</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="col-md-12 table-responsive">
                                <table id="example2" class="table table-bordered table-striped dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Tool name </th>
                                        <th> Brand </th>
                                        <th> Description </th>
                                        <th> Barcode </th>
                                        <th> Reserved By </th>
                                        <th> Status </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(!empty($stocks)){
                                        foreach ($stocks as $stock) { ?>
                                            <tr>
                                                <td> <?php echo $stock['id'] ?></td>
                                                <td> <?php echo $name[$stock['tool']] ?></td>
                                                <td> <?php echo $brand[$brandid[$stock['tool']]] ?></td>
                                                <td> <?php echo $description[$stock['tool']] ?></td>
                                                <td> <?php echo $stock['barcode'] ?></td>
                                                <td> <?php
                                                    $reserved = "--";
                                                    if($stock['stat']==3){
                                                        $assign = $this->assign_model->where(array('tool'=>$stock['tool']))->get();
                                                        $reserved = $employee[$assign['employee']];
                                                    }
                                                    echo $reserved
                                                    ?></td>
                                                <td width="150px" class="center">
                                                    <?php
                                                    $status = "In Stock";
                                                    $btn = "<small class='btn btn-success' style='width: 100px'> $status </small>";
                                                    if($stock['stat'] == 3 ){
                                                        $assign = $this->assign_model->where(array('tool'=>$stock['tool']))->get();
                                                        $status = "Reserved";
                                                        $btn = "<small class='btn btn-danger' style='width: 100px'> $status </small>";
                                                    }
                                                    echo $btn
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } ?>
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




