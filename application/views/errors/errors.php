<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html><head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="" name="description">
    <meta content="" name="author">
    <!-- BEGIN PLUGIN CSS -->
    <link href="<?=base_url()?>public/lib/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?=base_url()?>public/lib/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>public/lib/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=base_url()?>public/lib/plugins/animate.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>public/lib/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css">
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="<?=base_url()?>public/lib/webarch/css/webarch.css" rel="stylesheet" type="text/css">
    <!-- END CORE CSS FRAMEWORK -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>
<div class="error-wrapper container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10">
            <div class="error-container">
                <div class="error-main">
                    <br>
                    <br>
                    <?=$message?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTAINER -->
<script src="<?=base_url()?>public/lib/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src="<?=base_url()?>public/lib/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/lib/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/lib/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/lib/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/lib/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/lib/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/lib/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/lib/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="<?=base_url()?>public/lib/webarch/js/webarch.js" type="text/javascript"></script>
<script src="<?=base_url()?>public/lib/js/chat.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
</body></html>