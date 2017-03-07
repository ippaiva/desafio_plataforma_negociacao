<?php
# Dados
$id               = isset($negociacao[0]->cod_mercadoria_pk) ? $negociacao[0]->cod_mercadoria_pk : "";
$id_tp_mercadoria = isset($negociacao[0]->id_tipo_mercadoria_fk) ? $negociacao[0]->id_tipo_mercadoria_fk : "";
$mercadoria       = isset($negociacao[0]->nome_mercadoria) ? $negociacao[0]->nome_mercadoria : "";
$qtde             = isset($negociacao[0]->qtde) ? $negociacao[0]->qtde : "";
$preco            = isset($negociacao[0]->preco) ? number_format($negociacao[0]->preco, 2, ',', '.') : "0,00";
$id_tp_negociacao = isset($negociacao[0]->id_tipo_negociacao_fk) ? $negociacao[0]->id_tipo_negociacao_fk : "";
?>
<div class="container">

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Edi&ccedil;&atilde;o de Mercadoria</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url('./') ?>"><i class="fa fa-bar-chart" aria-hidden="true"></i> Gerenciador</a>
                </li>
                <li class="active">Editar Mercadoria</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-width">

                        <form role="form" name="frm_edit_mercadoria" id="frm_edit_mercadoria">

                            <div class="box-header with-border">
                                <span class="text-danger">*</span> Campo com preenchimento obrigatório
                            </div>

                            <div class="box-body">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="id_tipo_mercadoria">Tipo de Mercadoria<span class="text-danger">*</span></label>
                                            <select class="form-control" name="id_tipo_mercadoria" id="id_tipo_mercadoria" required="true" autofocus="true">
                                                <option value="">Selecione</option>
                                                <?php
                                                    if (is_array($tp_mercadoria) && !empty($tp_mercadoria)):
                                                        foreach ($tp_mercadoria as $value):
                                                            $sel = $id_tp_mercadoria == $value->id_tipo_mercadoria_pk ? "selected='selected'" : "";
                                                            echo "<option value='$value->id_tipo_mercadoria_pk' $sel>$value->tipo_mercadoria</option>";
                                                        endforeach;
                                                    endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                        <div class="form-group">
                                            <label for="nome_mercadoria">Mercadoria<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nome_mercadoria" name="nome_mercadoria" placeholder="Mercadoria" maxlength="150" value="<?=$mercadoria?>" required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label for="qtde">Quantidade<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="qtde" name="qtde" placeholder="0" maxlength="3" value="<?=$qtde?>" required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label for="preco">Pre&ccedil;o<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-addon">R$</div>
                                                <input type="text" class="form-control vl_money" name="preco" id="preco" placeholder="0,00" value="<?=$preco?>" maxlength="10" required="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="id_tipo_negociacao">Tipo de Negocia&ccedil;&atilde;o<span class="text-danger">*</span></label>
                                            <select class="form-control" name="id_tipo_negociacao" id="id_tipo_negociacao" required="true">
                                                <option value="">Selecione</option>
                                                <?php
                                                    if (is_array($tp_negociacao) && !empty($tp_negociacao)):
                                                        foreach ($tp_negociacao as $value):
                                                            $sel = $id_tp_negociacao == $value->id_tipo_negociacao_pk ? "selected='selected'" : "";
                                                            echo "<option value='$value->id_tipo_negociacao_pk' $sel>$value->tipo_negociacao</option>";
                                                        endforeach;
                                                    endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="box-footer text-center">
                                <input type="hidden" id="id_mercadoria" name="id_mercadoria" value="<?=$id?>">
                                <button type="submit" id="btn_edit_mercadoria" name="btn_edit_mercadoria" class="btn btn-success">Editar</button>
                                <button type="reset" id="btn_back" name="btn_back" class="btn btn-primary">Voltar</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </section>

    </div>

</div>