Negociacao = {

    /*!
     * @description Chamada dos principais métodos
     **/
    main: function () {

        // Botao voltar
        $('#btn_back').click(function(){
            Negociacao.redirect('../../');
        });

        // Botao cadastro
        $('#btn_cadastro').click(function(){
            Negociacao.redirect('./main/cadastrar');
        });
        
        // Cadastrar Tipo Mercadoria
        $('#btn_tp_mercadoria').click(function(){
           $("#modal_tp_mercadoria").modal('show');
        });

        // Mascara
        Negociacao.onlyNumber('qtde');
        $(".vl_money").maskMoney({
            thousands : '.',
            decimal   : ','
        });

        // Cadastrar Tipo de Mercadoria
        $('#frm_cad_tp_mercadoria').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                tp_mercadoria: {
                    validators: {
                        notEmpty: {
                            message: '&Eacute; obrigat&oacute;rio o preenchimento do campo <strong>TIPO DE MERCADORIA</strong>'
                        },
                        stringLength: {
                            min: 2,
                            max: 50,
                            message: 'O campo <strong>TIPO DE MERCADORIA</strong> deve ter entre <strong>2</strong> e <strong>150</strong> caracteres'
                        }
                    }
                },
            }
        }).on('success.form.bv', function (e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            var frm = $form.serialize();
            var url = "/desafio_plataforma_negociacao/main/createTipoMercadoria";

            // Use Ajax to submit form data
            $.post(url, frm, function (data) {
                if (data.status === true) {
                    Negociacao.modalMsg("MENSAGEM", data.msg);
                    $("#modal_tp_mercadoria").modal('hide');
                    // Inserir no select
                    var option = "<option value='"+data.dados.id+"'>"+data.dados.tipo+"</option>"
                    $("#id_tipo_mercadoria").append(option);
                } else {
                    Negociacao.modalMsg("Aten&ccedil;&atilde;o", data.msg);
                }

                $('#btn_tp_mercadoria').removeAttr('disabled');
            }, 'json');

        });

        // Mercadoria Cadastrar
        $('#frm_cad_mercadoria').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                id_tipo_mercadoria: {
		    validators: {
			notEmpty: {
			    message: '&Eacute; obrigat&oacute;rio selecionar uma op&ccedil;&atilde;o do campo <strong>TIPO DE MERCADORIA</strong>'
			}
		    }
		},
                nome_mercadoria: {
                    validators: {
                        notEmpty: {
                            message: '&Eacute; obrigat&oacute;rio o preenchimento do campo <strong>MERCADORIA</strong>'
                        },
                        stringLength: {
                            min: 2,
                            max: 150,
                            message: 'O campo <strong>MERCADORIA</strong> deve ter entre <strong>2</strong> e <strong>150</strong> caracteres'
                        }
                    }
                },
                qtde: {
                    validators: {
                        notEmpty: {
                            message: '&Eacute; obrigat&oacute;rio o preenchimento do campo <strong>QUANTIDADE</strong>'
                        }
                    }
                },
                preco: {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: '&Eacute; obrigat&oacute;rio o preenchimento do campo <strong>PRE&Ccedil;O</strong>'
                        }
                    }
                },
                id_tipo_negociacao: {
		    validators: {
			notEmpty: {
			    message: '&Eacute; obrigat&oacute;rio selecionar uma op&ccedil;&atilde;o do campo <strong>TIPO DE NEGOCIA&Ccedil;&Atilde;O</strong>'
			}
		    }
		}
            }
        }).on('success.form.bv', function (e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            var frm = $form.serialize();
            var url = "./create";

            // Use Ajax to submit form data
            $.post(url, frm, function (data) {
                if (data.status === true) {
                    Negociacao.modalMsg("MENSAGEM", data.msg, false, '../');
                } else {
                    Negociacao.modalMsg("Aten&ccedil;&atilde;o", data.msg);
                }

                $('#btn_cad_mercadoria').removeAttr('disabled');
            }, 'json');

        });

        // Mercadoria Editar
        $('#frm_edit_mercadoria').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                id_tipo_mercadoria: {
		    validators: {
			notEmpty: {
			    message: '&Eacute; obrigat&oacute;rio selecionar uma op&ccedil;&atilde;o do campo <strong>TIPO DE MERCADORIA</strong>'
			}
		    }
		},
                nome_mercadoria: {
                    validators: {
                        notEmpty: {
                            message: '&Eacute; obrigat&oacute;rio o preenchimento do campo <strong>MERCADORIA</strong>'
                        },
                        stringLength: {
                            min: 2,
                            max: 150,
                            message: 'O campo <strong>MERCADORIA</strong> deve ter entre <strong>2</strong> e <strong>150</strong> caracteres'
                        }
                    }
                },
                qtde: {
                    validators: {
                        notEmpty: {
                            message: '&Eacute; obrigat&oacute;rio o preenchimento do campo <strong>QUANTIDADE</strong>'
                        }
                    }
                },
                preco: {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: '&Eacute; obrigat&oacute;rio o preenchimento do campo <strong>PRE&Ccedil;O</strong>'
                        }
                    }
                },
                id_tipo_negociacao: {
		    validators: {
			notEmpty: {
			    message: '&Eacute; obrigat&oacute;rio selecionar uma op&ccedil;&atilde;o do campo <strong>TIPO DE NEGOCIA&Ccedil;&Atilde;O</strong>'
			}
		    }
		}
            }
        }).on('success.form.bv', function (e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            var frm = $form.serialize();
            var url = "../update";

            // Use Ajax to submit form data
            $.post(url, frm, function (data) {
                if (data.status === true) {
                    Negociacao.modalMsg("MENSAGEM", data.msg, false, '../../');
                } else {
                    Negociacao.modalMsg("Aten&ccedil;&atilde;o", data.msg);
                }

                $('#btn_edit_mercadoria').removeAttr('disabled');
            }, 'json');

        });

    },

    /*!
     * @description Método para abrir modal de mensagem
     **/
    modalMsg: function (title, msg, focus, redirect) {

	$("#title_modal").html(title);
	$("#mensagem_modal").html(msg);
	$("#msg_modal").modal('show');

	if (focus) {
	    $("#msg_modal").on('hidden.bs.modal', function (e) {
		Negociacao.setFocus(focus);
		e.preventDefault();
	    });
	}

	if (redirect) {
	    $("#msg_modal").on('hidden.bs.modal', function (e) {
		Negociacao.redirect(redirect);
		e.preventDefault();
	    });
	}

    },

    /*!
     * @description Método para exclusao de um registro
     **/
    del: function(id) {
        bootbox.dialog({
            message: "<i class='fa fa-exclamation-triangle'></i> Deseja realmente <strong>Excluir</strong> essa Mercadoria?",
            title: "ATEN&Ccedil;&Atilde;O",
            buttons: {
                success: {
                    label: "Cancelar",
                    className: "btn-primary"
                },
                danger: {
                    label: "Excluir",
                    className: "btn-danger",
                    callback: function() {
                        // Excluir registro
                        $.post('./main/delete', {
                            id: id
                        },function(data){
                            if (data.status === true) {
                                Negociacao.modalMsg("MENSAGEM", data.msg, false, false);
                                // Reload grid
                                $('#tbl_negociacao').DataTable().ajax.reload();
                            } else {
                                Negociacao.modalMsg("ATEN&Ccedil;&Atilde;O", data.msg, false, false);
                            }
                        }, 'json');
                    }
                }
            }
        });
    },

    /*!
     * @description Método colocar focus em um campo
     **/
    setFocus: function (id_field) {
	$("#" + id_field).focus();
    },

    /*!
     * @description Método redirecionamento de link
     **/
    redirect: function (link) {
        window.location.href = link;
    },

    /*!
     * @description Método abrir janela
     **/
    openWindow: function (link, target) {
	window.open(link, target);
    },

    /*!
     * @description Metodo para permitir o input de apenas numeros
     **/
    onlyNumber: function (nameField) {
	$("input[name=" + nameField + "]").keydown(function (e) {
	    if (e.shiftKey)
		e.preventDefault();
	    if (!((e.keyCode == 46) || (e.keyCode == 8) || (e.keyCode == 9)     // DEL, Backspace e Tab
		    || ((e.keyCode >= 35) && (e.keyCode <= 40))  // HOME, END, Setas
		    || ((e.keyCode >= 96) && (e.keyCode <= 105)) // Númerod Pad
		    || ((e.keyCode >= 48) && (e.keyCode <= 57))))
		e.preventDefault(); // Números
	});
    }

};

$(document).ready(function () {
    Negociacao.main();
});