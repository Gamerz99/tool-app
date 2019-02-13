<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> <?php echo $title; ?> </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" href="<?php echo base_url(); ?>templates/dist/img/fevicon.png">
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/dist/css/AdminLTE.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/dist/css/skins/_all-skins.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>layout/cus.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>layout/datatables/datatables.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo base_url(); ?>" class="logo">
                <span class="logo-mini">TOOL</span>
                <img class="logo-top" src="<?php echo base_url(); ?>layout/dist/img/aqua.png">
            </a>
            <nav class="navbar navbar-static-top">
                <?php if (isset($msg)) { ?>
                    <div>
                        <?php echo $msg; ?>
                    </div>
                <?php }?>
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php if($userinf['image']){?>
                                    <img src="<?php echo base_url(); ?>profile/thumb/<?php echo $userinf['image']?>" class="user-image" alt="User Image">
                                <?php } else {?>
                                    <img src="<?php echo base_url(); ?>profile/thumb/default.jpg" class="user-image" alt="User Image">
                                <?php } ?>
                                <span class="hidden-xs"><?php echo $userinf['username']?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <?php if($userinf['image']){?>
                                        <img src="<?php echo base_url(); ?>profile/thumb/<?php echo $userinf['image']?>" class="img-circle" alt="User Image">
                                    <?php } else {?>
                                        <img src="<?php echo base_url(); ?>profile/thumb/default.jpg" class="img-circle" alt="User Image">
                                    <?php } ?>
                                    <p>
                                        Schindler Management Ltd
                                        <small>Since 1874</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <?php if($userinf['image']){?>
                            <img src="<?php echo base_url(); ?>profile/thumb/<?php echo $userinf['image']?>" class="img-circle" alt="User Image">
                        <?php } else {?>
                            <img src="<?php echo base_url(); ?>profile/thumb/default.jpg" class="img-circle" alt="User Image">
                        <?php } ?>
                    </div>
                    <div class="pull-left info">
                        <p> <?php echo $userinf['username']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                </form>
                <?php echo $mainmenu; ?>
            </section>
        </aside>