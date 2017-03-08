<?php
# Dados
$id            = isset($negociacao[0]->cod_mercadoria_pk) ? $negociacao[0]->cod_mercadoria_pk : "";
$tp_mercadoria = isset($negociacao[0]->tipo_mercadoria) ? $negociacao[0]->tipo_mercadoria : "";
$mercadoria    = isset($negociacao[0]->nome_mercadoria) ? $negociacao[0]->nome_mercadoria : "";
$qtde          = isset($negociacao[0]->qtde) ? $negociacao[0]->qtde : "";
$preco         = isset($negociacao[0]->preco) ? number_format($negociacao[0]->preco, 2, ',', '.') : "0,00";
$tp_negociacao = isset($negociacao[0]->tipo_negociacao) ? $negociacao[0]->tipo_negociacao : "";
?>
<div class="container">

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Visualiza&ccedil;&atilde;o de Mercadoria</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url('./') ?>"><i class="fa fa-bar-chart" aria-hidden="true"></i> Gerenciador</a>
                </li>
                <li class="active">Visualizar Mercadoria</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-width-ver">

                        <div class="box-body">

                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><strong>C&oacute;d. Mercadoria</strong></div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?=$id?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><strong>Tipo de Mercadoria</strong></div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?=$tp_mercadoria?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><strong>Mercadoria</strong></div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?=$mercadoria?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><strong>Quantidade</strong></div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?=$qtde?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><strong>Pre&ccedil;o</strong></div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">R$ <?=$preco?></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><strong>Tipo de Negocia&ccedil;&atilde;o</strong></div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?=$tp_negociacao?></div>
                            </div>

                        </div>

                        <div class="box-footer text-center">
                            <button type="reset" id="btn_back" name="btn_back" class="btn btn-primary">Voltar</button>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>

</div>