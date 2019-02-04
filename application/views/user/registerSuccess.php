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
                        <h1> Registration Success   </h1>
                        <div id="fx-help-overlay"></div>
                    </div>
                    <div id="fx-main">
                        <ul id="accordion">
                            <li id="address" class="accordion activePanel">
                                <div id="fx-address-section" class="accordionContent ishp_address_information" style="display: block;">
                                    <div class="fxlay-full-section">
                                        <h3 class="fx-title">   Thank you for registering with us. Please login using your e-mail address and password next time your login  </h3>
                                        <div id="fx-address-section">
                                            <div class="fxmod-general-errors" id="fx-address-general-errors"></div>
                                            <div class="fxmod-general-errors" id="fx-addr-general-errors"></div>

                                            <!--  <form id="fx-addr-form">   -->
                                            <div class="fxlay-left-section" >
                                                <div class="fxlay-hideable-section fxis-visible" id="fx-from-hideable-addr-section">


                                                    <div style="clear:both; text-align:right; margin-right:4px; margin-top: 12px">
                                                        <?php echo form_button('mysubmit', '&nbsp;', 'id="btn-home" class=fx-button onclick=mfunc()'); ?>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="fxlay-right-section" >



                                            </div>
                                            <div style="clear:both; text-align:right; margin-right:4px;">

                                            </div>

                                        </div>
                                    </div></div>
                            </li>
                        </ul>
                        <div id="thankyou-container">
                        </div>                    </div></div>
                <div id="ishpOutage"></div>
            </div>


            <div class="fx_clearfix" id="fx-global-footer">

                <!-- END ROW 2: FOOTER NAVIGATION -->
            </div>
       
    </body>
</html>


