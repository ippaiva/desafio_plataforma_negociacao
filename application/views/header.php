<?php echo doctype('html5'); ?>

<html>

    <head>
        <title>:: Plataforma de Negociação de Mercadorias :: <?= isset($titulo) ? $titulo . " ::" : '' ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="googlebot" content="noindex, nofollow">

        <!-- Logo Icon -->
        <?= link_tag('assets/imgs/logo-vertical.png', 'shortcut icon', 'image/png') ?>

        <!-- Jquery -->
        <script src="<?= base_url('scripts/lib/jquery-1.11.0.min.js') ?>"></script>

        <!-- Jquery Form -->
        <script src="<?= base_url('scripts/lib/jquery.form.js') ?>"></script>

        <!-- Jquery Mask -->
        <script src="<?= base_url('scripts/plugins/mask/jquery.mask.js') ?>"></script>

        <!-- Bootstrap -->
        <script src="<?= base_url('scripts/js/bootstrap.min.js') ?>"></script>
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap-theme.min.css') ?>">
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

        <!-- Bootstrap Validator -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('scripts/plugins/bootstrap_validator/css/bootstrapValidator.min.css') ?>">
        <script src="<?= base_url('scripts/plugins/bootstrap_validator/js/bootstrapValidator.js') ?>"></script>
        <script src="<?= base_url('scripts/plugins/bootstrap_validator/js/language/pt_BR.js') ?>"></script>

        <!-- BootBox -->
        <script src="<?= base_url('scripts/lib/bootbox.min.js') ?>"></script>

        <!-- Plugin Select2 -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('scripts/plugins/select2/select2-bootstrap.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('scripts/plugins/select2/select2.css') ?>">
        <script src="<?= base_url('scripts/plugins/select2/select2.js') ?>"></script>
        <script src="<?= base_url('scripts/plugins/select2/select2_locale_pt-BR.js') ?>"></script>

        <!-- Plugin Datepicker -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('scripts/plugins/bootstrap_datepicker/css/datepicker.css') ?>">
        <script src="<?= base_url('scripts/plugins/bootstrap_datepicker/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= base_url('scripts/plugins/bootstrap_datepicker/js/locales/bootstrap-datepicker.pt-BR.js') ?>"></script>

        <!-- Plugin Flex Grid -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('scripts/plugins/flexigrid/css/flexigrid.css') ?>">
        <script src="<?= base_url('scripts/plugins/flexigrid/js/flexigrid.js') ?>"></script>

        <!-- Plugin Upload File -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('scripts/plugins/upload_file/css/uploadfile.css') ?>">
        <script type="text/javascript" src="<?= base_url('scripts/plugins/upload_file/js/jquery.uploadfile.js') ?>"></script>

        <!-- Plugin Wysiwyg -->
        <script type="text/javascript" src="<?= base_url('scripts/plugins/wysiwyg/js/nicEdit.js') ?>"></script>

        <!-- Plugin Excellent Export -->
        <script type="text/javascript" src="<?= base_url('scripts/plugins/excellent_export/excellentexport.js') ?>"></script>

        <!-- Bootstrap Typeahead - Autocomplete -->
        <script type="text/javascript" src="<?= base_url('scripts/plugins/bootstrap_typeahead/bootstrap3-typeahead.min.js') ?>"></script>

        <!-- Icons -->
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">

        <!-- Javascript principal -->
        <script src="<?= base_url('scripts/js/script_admin.js') ?>"></script>

        <!-- Css principal-->
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/estilo_admin.css') ?>">

    </head>

    <body>

        <div class="container-fluid">

            <div class="row header_admin">
                <div id="img_logo">
                    <?php echo anchor(base_url(), img(array('src' => 'assets/imgs/logo_arquivopublico.png', 'alt' => 'Logo Arquivo', 'title' => 'Arquivo P&uacute;blico do Estado de S&atilde;o Paulo', 'class' => 'imagem_logo'))); ?>
                </div>
                <?php if ($this->session->userdata('usuario_siau')): ?>
                    <div style="float: right; margin-top: 20px; margin-right: 10px; color: #F2F2F2; font-weight: 700; font-size: 14px;">
                        <?php
                        echo "Bem-vindo " . $this->session->userdata('usuario_siau') . " &nbsp;|&nbsp; " . anchor('main/logoff', '<button title=\'Desconectar do Gerenciador\' class=\'btn btn-sm btn-danger\' style=\'font-weight: bold;\'>Sair</button>');
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row" id="content_main">
            </div>