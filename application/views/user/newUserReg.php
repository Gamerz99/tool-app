<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>MHEL Web Portal</title>
        <meta content="IE=10" http-equiv="X-UA-Compatible">
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="/images/c/s1/fx-favicon.ico" type="image/x-icon" rel="shortcut icon">
        <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/ishp/ie.css" /><![endif]-->
        <!--[if lte IE 7]><link rel="stylesheet" type="text/css" href="/css/t1/ie-min.css" /><![endif]-->
        <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="/css/t1/ie6-min.css" /><![endif]-->
        <?php echo link_tag('css/global-wrapper-min.css'); ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>

        <?php echo link_tag('css/style.css'); ?>
        <script type="text/javascript" >
            $(document).ready(function() {

                jQuery.validator.addMethod("lettersonly", function(value, element) {
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
                        companyName: {
                            required : true
                        },
                        contactName : {
                            required : true
                        },
                        adress : {
                            required : true
                        },
                        city : {
                            required : true
                        },
                        phone : {
                            required : true
                        },
                        password : {
                            required : true
                        } ,
                        password1 : {
                            equalTo: "#password"
                        }

                    },
                    //set messages to appear inline
                    messages: {
                        email:  " Plese Enter Email " ,
                        companyName: " Please Enter Company Name ",
                        contactName:  " Plese Enter Contact Name " ,
                        adress : " Please Enter Address ",
                        city :  " Plese Enter City " ,
                        phone  : " Please Enter  Phone ",
                        email:  " Plese Enter Email " ,
                        password : " Please Enter Password ",
                        password1 : " Password Not same "
                    },

                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent());
                    }

                });


                $("#type").change(function() {
                    var e = document.getElementById('type');
                    e = e.options[e.selectedIndex].value;
                    $('#custom').empty();
                    $('#custom2').empty();
                    if(e == 2){
                        $res = "" ;
                        $res = "<label class='fx-input-text' for='fx-to-name'>  Company Name <span style='color: #990000'>* </span>  :\n\
            </label> <input type='text' class='fx-input-text' value='' name='companyName'>";
                        $('#custom').empty();
                        $('#custom').append($res);

                        $res2 = "" ;
                        $res2 = "<label class='fx-input-text' for='fx-to-name'>   Account  Number   :\n\
            </label> <input type='text' class='fx-input-text' value='' name='account'>";
                        $('#custom2').empty();
                        $('#custom2').append($res2);
                    }
                   
                });
            });

            function mfunc(){
                window.location.assign("<?php echo base_url(); ?>")
            }

        </script>
    </head>
    <body id="fx-respond" class=" fx-transitions">

     
            <header>
                <div class="fx_clearfix" id="fx-global-header">
                    <a title="FedEx Home" class="descriptor" id="main-logo" href="<?php echo base_url(); ?>">
                        <img alt="FedEx Home" src="<?php echo base_url(); ?>img/logo-header-fedex-express.png" height="60px">
                       <!-- <img src="//www.fedex.com/images/ascend/shared/headers/nxgen/express_logo.gif" alt="FedEx Home" /> -->
                    </a>
                </div><!-- LAYOUT: CLOSE HEADER -->
            </header>
            <div id="content" style="margin-top: 0px;">
                <div class="overlayBlackout overlayHidden" id="overlay146" style="background-color: rgb(0, 0, 0); opacity: 0;"></div>
                <div class="overlayBlackout overlayHidden" id="overlay199" style="background-color: rgb(0, 0, 0); opacity: 0.4;"></div>

                <div class="fxlt_mainContent ishp_shipping_app" id="ishpMain">
                    <div class="clearfix ishp_app_nav" id="fx-appNav">
                        <h1>  New User Registration </h1>

                        <div id="fx-help-overlay"></div>
                    </div>
                    <div id="fx-main">
                        <ul id="accordion">
                            <li id="address" class="accordion activePanel">
                                <div id="fx-address-section" class="accordionContent ishp_address_information" style="display: block;">
                                    <div class="fxlay-full-section">
                                        <h3 class="fx-title">   Please fill the information below to provide you with personalized service   </h3>
                                        <div id="fx-address-section">
                                            <div class="fxmod-general-errors" id="fx-address-general-errors"></div>
                                            <div class="fxmod-general-errors" id="fx-addr-general-errors"></div>
                                            <?php echo form_open('user/saveNewUser', 'id=form1'); ?>
                                            <!--  <form id="fx-addr-form">   -->
                                            <div class="fxlay-left-section" >
                                                <div class="fxlay-hideable-section fxis-visible" id="fx-from-hideable-addr-section">
                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">  I am a   <span style="color: #990000">*  :</span></label>
                                                        <?php
                                                        $options = array(
                                                            '' => 'Select',
                                                            '1' => 'Personal User',
                                                            '2' => 'Business User',
                                                        );
                                                        echo form_dropdown('type', $options, '', 'class="fx-select" id="type"');
                                                        ?>

                                                    </div>

                                                    <div class="fxlay-field-container">
                                                        <div id="custom">
                                                        </div>
                                                    </div>
                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name"> Contact Name  <span style="color: #990000">* </span>  :</label>
                                                        <?php echo form_input('contactName', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>
                                                    
                                                      <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name"> ICPC Number :</label>
                                                        <?php echo form_input('icpc', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>

                                                    <div class="fxlay-field-container">
                                                        <div id="custom2">
                                                        </div>
                                                    </div>


                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">  Address <span style="color: #990000">* </span> :  </label>
                                                        <?php echo form_input('adress', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>

                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">   </label>
                                                        <?php echo form_input('adress2', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>

                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name"> Postal Code   </label>
                                                        <?php echo form_input('postal_code', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>
                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">   City  <span style="color: #990000">* </span>  :</label>
                                                        <?php echo form_input('city', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>

                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">   Phone <span style="color: #990000">* </span>  :</label>
                                                        <?php echo form_input('phone', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>

                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">    Notify me for any Promotions/ Special offers :</label>
                                                        <?php echo form_checkbox('offer', '1', TRUE);
                                                        ?>
                                                    </div>

                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">    Email  <span style="color: #990000">* </span> :</label>
                                                        <?php echo form_input('email', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>

                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">  Password   <span style="color: #990000">* </span>   :</label>
                                                        <?php echo form_password('password', '', 'class="fx-input-text" id="password" ');
                                                        ?>
                                                    </div>
                                                    <div class="fxlay-field-container">
                                                        <label class="fx-input-text" for="fx-to-name">  Confirm Password    :</label>
                                                        <?php echo form_password('password1', '', 'class="fx-input-text" ');
                                                        ?>
                                                    </div>

                                                    <div style="clear:both; text-align:right; margin-right:4px; ">
                                                        <?php echo form_submit('mysubmit', 'Submit', 'class=fx-button'); ?>
                                                    </div>



                                                    <div style="clear:both; text-align:right; margin-right:4px; margin-top: 12px">
                                                        <?php echo form_button('mysubmit', '&nbsp;', 'id="btn-home" class=fx-button onclick=mfunc()'); ?>
                                                    </div>


                                                </div></div>
                                            <div class="fxlay-right-section" >
                                            </div>
                                            <div style="clear:both; text-align:right; margin-right:4px;">
                                            </div>
                                            <?php echo form_close(); ?>
                                                    </div>
                                                </div></div>
                                        </li>
                                    </ul>
                                    <div id="thankyou-container">
                                    </div>
                                </div>

                            </div>
                            <div id="ishpOutage"></div>
                        </div>


                        <div class="fx_clearfix" id="fx-global-footer">
                       
                <!-- END ROW 2: FOOTER NAVIGATION -->
            </div>
     
    </body>
</html>


