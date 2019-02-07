<?php
$mainmenu = $this->mainmenu->buildMenu($session_data['id'], 2);
$prof_inf = $this->messages->getUserInf($session_data['id']);
$data['title'] = "JOB TITLE";
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
                Job Title
            </h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Job Title</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body ">
                                <a href="<?php echo base_url(); ?>index.php/settings/add_job_title"  type="button" class="btn btn-success pull-right ">
                                    Add New Job Title
                                </a>
                            </div>
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-striped dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Title Name </th>
                                        <th> Created </th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(!empty($titles)){
                                        foreach ($titles as $title) { ?>
                                            <tr>
                                                <td> <?php echo $title['id'] ?></td>
                                                <td> <?php echo $title['name'] ?></td>
                                                <td> <?php echo $title['created_at'] ?></td>
                                                <td width="150px" class="center">
                                                    <?php echo form_open('settings/delete_job_title', 'id="frm1' . $title['id'] . '"'); ?>
                                                    <span class="btn-group">
                                                        <a href="<?php echo base_url(); ?>index.php/settings/add_job_title/<?php echo $title['id'] ?>"
                                                           class="btn btn-block btn-success">   <i
                                                                class="fa fa-pencil"></i></a>
                                                    </span>
                                                    <span class="btn-group">
                                                        <?php
                                                        echo form_hidden('id', $title['id']);
                                                        echo '<a href="#" class="btn btn-block btn-danger" onclick="confirm_delete(' . $title['id'] . ')" > <i class="fa fa-close"></i> </a>';
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




