<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Lookz Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="<?php echo base_url('/skin/css/bootstrap.css')?>" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="<?php echo base_url('/skin/css/style.css')?>" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url('/skin/css/motors.css')?>" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--webfont-->

    <script type="text/javascript" src="<?php echo base_url('/skin/js/jquery-1.11.1.min.js')?>"></script>
    <!-- start menu -->
    <link href="<?php echo base_url('/skin/css/megamenu.css')?>" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="<?php echo base_url('/skin/js/megamenu.js')?>"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
</head>
<body>
<div class="wrap">
    <div class="container">
        <div class="header_top">
            <div class="col-sm-9 h_menu4">
                <ul class="megamenu skyblue">
                    <li class="active grid"><a class="color8" href="index.html">New</a></li>
                    <?php foreach($topCategory as $k=>$v){?>
                        <li><a class="color1" href="#"><?php echo $v['catname']?></a><div class="megapanel">
                                <div class="row">
                                    <div class="col1">
                                        <div class="h_nav">
                                            <ul>
                                                <?php foreach($showCategory[$v['catid']] as $kk=>$vv){?>
                                                    <li><a href="<?php echo site_url("sell_list/index/catid_".$vv['catid'])?>"><?php echo $vv['catname']?></a></li>
                                                <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php }?>
                    <li><a class="color4" href="404.html">Accessories</a></li>
                    <li><a class="color6" href="contact.html">Conact</a></li>
                </ul>
            </div>
            <div class="col-sm-3 header-top-right">
                <div class="drop_buttons">
                    <select class="drop-down ">
                        <option value="1">Dollar</option>
                        <option value="2">Euro</option>
                    </select>
                    <select class="drop-down drop-down-in">
                        <option value="1">English</option>
                        <option value="2">French</option>
                        <option value="3">German</option>
                    </select>
                    <div class="clearfix"></div>
                </div>
                <div class="register-info">
                    <ul>
                        <li><a href="login.html">Login</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>