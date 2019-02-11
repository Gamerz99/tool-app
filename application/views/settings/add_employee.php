<?php
$mainmenu = $this->mainmenu->buildMenu($session_data['id'], 2);
$prof_inf = $this->messages->getUserInf($session_data['id']);
$data['title'] = "EMPLOYEE";
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
            Add Employee
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Add Employee</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">please add your employee</h3>
            </div>
            <div class="box-body">
                <?php echo form_open('settings/save_employee', 'id="form1" data-parsley-validate class=""'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <label for="first-name"> Name <span class="required">*</span>
                        </label>
                        <?php
                        echo form_hidden('id', $employee['id']);
                        echo form_input('name', $employee['name'], 'class="form-control"'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="first-name"> Job Title</span>
                        </label>
                        <?php
                        echo form_dropdown('job_title', $title, $employee['job_title'], 'class="form-control col-md-7 col-xs-12"');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="first-name"> Phone
                        </label>
                        <?php
                        echo form_input('phone', $employee['phone'], 'class="form-control"'); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="first-name"> Email
                        </label>
                        <?php
                        echo form_input('email', $employee['email'], 'class="form-control"'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="first-name"> Password
                        </label>
                        <?php
                        echo form_password('password', $employee['password'], 'class="form-control"'); ?>
                    </div>
                </div>
                <br>
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
                title: {
                    required: true,
                },
                phone: {
                    required: true,
                    number: true,
                    minlength:10,
                    maxlength:10
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true
                }
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            }
        });
    });

</script>