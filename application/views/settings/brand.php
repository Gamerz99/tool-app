<?php
$mainmenu = $this->mainmenu->buildMenu($session_data['id'], 2);
$prof_inf = $this->messages->getUserInf($session_data['id']);
$data['title'] = "BRAND";
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
            <h3>
                Brand
            </h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Brand</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body ">
                                <a href="<?php echo base_url(); ?>index.php/settings/add_brand"  type="button" class="btn btn-success pull-right ">
                                    Add New Brand
                                </a>
                            </div>
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-striped dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Brand Name </th>
                                        <th> Created </th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(!empty($brands)){
                                        foreach ($brands as $brand) { ?>
                                            <tr>
                                                <td> <?php echo $brand['id'] ?></td>
                                                <td> <?php echo $brand['name'] ?></td>
                                                <td> <?php echo $brand['created_at'] ?></td>
                                                <td class="center">
                                                    <?php echo form_open('settings/delete_brand', 'id="frm1' . $brand['id'] . '"'); ?>
                                                    <span class="btn-group">
                                                        <a href="<?php echo base_url(); ?>index.php/settings/add_brand/<?php echo $brand['id'] ?>"
                                                           class="btn btn-block btn-success">   <i
                                                                class="fa fa-pencil"></i></a>
                                                    </span>
                                                    <span class="btn-group">
                                                        <?php
                                                        echo form_hidden('id', $brand['id']);
                                                        echo '<a href="#" class="btn btn-block btn-danger" onclick="confirm_delete(' . $brand['id'] . ')" > <i class="fa fa-close"></i> </a>';
                                                        ?>
                                                    </span>
                                                    <?php echo form_close(); ?>
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




