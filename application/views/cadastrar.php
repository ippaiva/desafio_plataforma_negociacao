<div class="container">

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Cadastro de Mercadoria</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url('./') ?>"><i class="fa fa-bar-chart" aria-hidden="true"></i> Gerenciador</a>
                </li>
                <li class="active">Cadastrar Mercadoria</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-width">

                        <form role="form" name="frm_cad_mercadoria" id="frm_cad_mercadoria">

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
                                                            echo "<option value='$value->id_tipo_mercadoria_pk'>$value->tipo_mercadoria</option>";
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
                                            <input type="text" class="form-control" id="nome_mercadoria" name="nome_mercadoria" placeholder="Mercadoria" maxlength="150" value="" required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label for="qtde">Quantidade<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="qtde" name="qtde" placeholder="0" maxlength="3" value="" required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <label for="preco">Pre&ccedil;o<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-addon">R$</div>
                                                <input type="text" class="form-control vl_money" name="preco" id="preco" placeholder="0,00" value="" maxlength="10" required="true">
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
                                                            echo "<option value='$value->id_tipo_negociacao_pk'>$value->tipo_negociacao</option>";
                                                        endforeach;
                                                    endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="box-footer text-center">
                                <button type="submit" id="btn_cad_mercadoria" name="btn_cad_mercadoria" class="btn btn-success">Cadastrar</button>
                                <button type="reset" id="limpar" name="limpar" class="btn btn-primary">Limpar</button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </section>

    </div>

</div>