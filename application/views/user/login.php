<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Acqua | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" href="<?php echo base_url(); ?>templates/dist/img/fevicon.png">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/dist/css/AdminLTE.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <script type="text/javascript" >
        $(document).ready(function () {
            jQuery.validator.addMethod("lettersonly", function (value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Please enter only letters without space.");
            // validate contact form on keyup and submit
            $("#form1").validate({
                errorElement: "p",
                //set the rules for the fields
                rules: {
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                //set messages to appear inline
                messages: {
                    email: " Plese Enter Email ",
                    password: " Please Enter Password "
                },
                errorPlacement: function (error, element) {
                    error.appendTo(element.parent());
                }
            });
        });
    </script>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="<?php echo base_url(); ?>templates/dist/img/aqua.png" width="60%">
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Enter your Email and password to log in</p>
                <?php echo form_open('user/validatelogin', 'id=form1'); ?>
                <div class="form-group has-feedback"> 
                    <?php echo form_input('email', '', 'class="form-control mws-login-username mws-textinput required" placeholder="Email" '); ?>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <?php echo form_input('password', '', 'class="form-control" placeholder="Password" '); ?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?php echo form_close(); ?>
                <a href="<?php echo base_url(); ?>index.php/user/forgetpassword">Get a new password.</a><br>
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="<?php echo base_url(); ?>layout/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url(); ?>layout/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>layout/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
        </script>
    </body>
</html>