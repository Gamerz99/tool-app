<?php
$mainmenu = $this->mainmenu->buildMenu($session_data['id'], 2);
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
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add Tool
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Add Tool</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">please add your tool</h3>
            </div>
            <div class="box-body">
                <?php echo form_open_multipart('settings/save_tool', 'id="form1" data-parsley-validate class=""'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <label for="first-name"> Name <span class="required">*</span>
                        </label>
                        <?php
                        echo form_hidden('id', $tool['id']);
                        echo form_input('name', $tool['name'], 'class="form-control"'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="first-name"> Brand</span>
                        </label>
                        <?php
                        echo form_dropdown('brand', $brand, $tool['brand'], 'class="form-control col-md-7 col-xs-12"');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="first-name"> Description
                        </label>
                        <?php
                        echo form_textarea('description', $tool['description'], 'class="form-control"'); ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="control-label" for="first-name"> Image <span class="required">*</span>
                        </label>
                        <div>
                            <input type="file" name="image" size="20" />
                        </div>
                    </div>
                </div><br>
                <div class="box-footer">
                    <button type="submit" value="Validate!" class="btn btn-success pull-right">Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>

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
                name: {
                    required: true,
                },
                brand: {
                    required: true,
                }
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            }
        });
    });

</script>