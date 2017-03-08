<div class="container">

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Gerenciamento</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-bar-chart" aria-hidden="true"></i> Gerenciador</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-xs-12">

                    <div class="box">

                        <div class="box-header with-border">
                            <button id="btn_cadastro" class="btn btn-success" title="Cadastrar Nova Mercadoria">Cadastrar</button>
                        </div>

                        <div class="box-body">

                            <table id="tbl_negociacao" class="display" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>C&oacute;d. Mercadoria</th>
                                        <th>Tipo Mercadoria</th>
                                        <th>Nome</th>
                                        <th>Pre&ccedil;o</th>
                                        <th>Tipo Negocia&ccedil;&atilde;o</th>
                                        <th>A&ccedil;&atilde;o</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>C&oacute;d. Mercadoria</th>
                                        <th>Tipo Mercadoria</th>
                                        <th>Nome</th>
                                        <th>Pre&ccedil;o</th>
                                        <th>Tipo Negocia&ccedil;&atilde;o</th>
                                        <th>A&ccedil;&atilde;o</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>

</div>

<script>
    $(document).ready(function () {
        $('#tbl_negociacao').DataTable({
            "columns": [
                {data: "cod_mercadoria_pk"},
                {data: "tipo_mercadoria"},
                {data: "nome_mercadoria"},
                {data: "preco"},
                {data: "tipo_negociacao"},
                {data: "acao", searchable: false, orderable: false}
            ],
            "processing": true,
            "serverSide": true,
            "retrieve": true,
            "iDisplayLength": 50,
            "stripeClasses": ['strip_grid_none', 'strip_grid'],
            "ajax": {
                url: '<?=base_url('./main/buscarNegociacao') ?>',
                type: 'POST'
            },
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por Página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });

    });
</script>