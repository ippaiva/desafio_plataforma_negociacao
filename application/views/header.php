<?php echo doctype('html5'); ?>

<html>

    <head>
        <title>:: Plataforma de Negociação de Mercadorias :: <?=isset($titulo) ? $titulo." ::" : ''?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="robots" content="noindex, nofollow">
        <meta name="googlebot" content="noindex, nofollow">

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?=base_url('scripts/lib/bootstrap/css/bootstrap.min.css')?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?=base_url('scripts/plugins/datatables/dataTables.bootstrap.css')?>">
        
        <!-- JavaScripts -->
        <!-- jQuery 2.2.3 -->
        <script src="<?=base_url('scripts/plugins/jquery/jquery-2.2.3.min.js')?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?=base_url('scripts/lib/bootstrap/js/bootstrap.min.js')?>"></script>
        
        <!-- Bootstrap Validator -->
        <link rel="stylesheet" type="text/css" href="<?=base_url('scripts/plugins/bootstrap_validator/css/bootstrapValidator.min.css')?>">
        <script src="<?=base_url('scripts/plugins/bootstrap_validator/js/bootstrapValidator.min.js')?>"></script>
        <script src="<?=base_url('scripts/plugins/bootstrap_validator/js/language/pt_BR.js')?>"></script>
        
        <!-- CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

        <!-- JS -->
        <script src="<?= base_url('scripts/js/script.js') ?>"></script>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    
    <body>
