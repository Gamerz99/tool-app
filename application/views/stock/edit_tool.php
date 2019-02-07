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
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Tool
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Edit Tool</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">please edit your tool</h3>
            </div>
            <div class="box-body">
                <?php echo form_open('stock/save_edit_tool', 'id="form1" data-parsley-validate class=""'); ?>

                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table invoice-table table-striped" id="myTable">
                            <thead>
                            <tr>
                                <th width="8%">ID</th>
                                <th width="15%">Tool Name</th>
                                <th width="10%">Brand</th>
                                <th width="30%">Description</th>
                                <th width="10%">Qty</th>
                                <th width="10%">Barcode</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $item['id'] ?></td>
                                    <td><?php echo $tool[$item['tool']] ?></td>
                                    <td><?php echo $brand[$item['tool']] ?></td>
                                    <td><?php echo $description[$item['tool']] ?></td>
                                    <td><?php echo $item['qty'] ?></td>
                                    <td><?php echo form_input('barcode', $item['barcode'], 'class="form-control"'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php echo form_hidden('id', $item['id']); ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary btn" type="reset">Reset</button>
                <button type="submit" value="Validate!" class="btn btn-success pull-right">Submit</button>
            </div>
            <?php echo form_close(); ?>
        </div>

    </section>
</div>

<?php
$this->load->view('layout/footer2');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>layout/js/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        jQuery.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Please enter only letters without space.");
        $("#form1").validate({
            errorElement: "p",
            rules: {
                barcode: {
                    required: true,
                }
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            }
        });
    });
</script>