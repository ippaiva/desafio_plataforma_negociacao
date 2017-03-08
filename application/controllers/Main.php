<?php

defined('BASEPATH') OR exit('No direct script acess allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        # Carregar modelo
        $this->load->model('Negociacao_model');
    }

    /**
     * Método principal para carregar a tela de gerenciamento
     *
     * @method index
     * @access public
     * @return void
     */
    public function index()
    {
        $this->load->view('header');
        $this->load->view('gerenciador');
        $this->load->view('footer');
    }

    /**
     * Método para cadastrar mercadoria
     *
     * @method cadastrar
     * @access public
     * @return void
     */
    public function cadastrar()
    {
        # SQL Tipo Mercadoria
        $this->db->order_by('tipo_mercadoria', 'ASC');
        $data['tp_mercadoria'] = $this->db->get('tb_tipo_mercadoria')->result();

        # SQL Tipo Negociacao
        $this->db->order_by('tipo_negociacao', 'ASC');
        $data['tp_negociacao'] = $this->db->get('tb_tipo_negociacao')->result();

        $this->load->view('header');
        $this->load->view('cadastrar', $data);
        $this->load->view('footer');
    }

    /**
     * Método de cadastro de mercadoria
     *
     * @method create
     * @access public
     * @return obj Status da ação
     */
    public function create()
    {
        $mercadoria = new stdClass();
        $retorno    = new stdClass();
        $resposta   = "";

        $mercadoria->id_tipo_mercadoria = $this->input->post('id_tipo_mercadoria');
        $mercadoria->nome_mercadoria    = $this->input->post('nome_mercadoria');
        $mercadoria->qtde               = $this->input->post('qtde');
        $mercadoria->preco              = $this->input->post('preco');
        $mercadoria->id_tipo_negociacao = $this->input->post('id_tipo_negociacao');

        if ($mercadoria->id_tipo_mercadoria != NULL && $mercadoria->nome_mercadoria != NULL && $mercadoria->qtde != NULL &&
           $mercadoria->preco != NULL && $mercadoria->id_tipo_negociacao != NULL) {
            $resposta = $this->Negociacao_model->setMercadoria($mercadoria);
        } else {
            $retorno->status = FALSE;
            $retorno->msg    = "Houve um erro ao cadastrar! Tente novamente...";
            $resposta        = $retorno;
        }

        # retornar resultado
        print json_encode($resposta);
    }

    /**
     * Método para editar mercadoria
     *
     * @method editar
     * @access public
     * @param integer $id_mercadoria Id da mercadoria
     * @return void
     */
    public function editar($id_mercadoria = null)
    {
        # SQL Tipo Mercadoria
        $this->db->order_by('tipo_mercadoria', 'ASC');
        $data['tp_mercadoria'] = $this->db->get('tb_tipo_mercadoria')->result();

        # SQL Tipo Negociacao
        $this->db->order_by('tipo_negociacao', 'ASC');
        $data['tp_negociacao'] = $this->db->get('tb_tipo_negociacao')->result();

        # Mercadoria
        $this->db->where('cod_mercadoria_pk', $id_mercadoria);
        $data['negociacao'] = $this->db->get('tb_negocicao')->result();

        $this->load->view('header');
        $this->load->view('editar', $data);
        $this->load->view('footer');
    }

    /**
     * Método de edição de mercadoria
     *
     * @method update
     * @access public
     * @return obj Status da ação
     */
    public function update()
    {
        $mercadoria = new stdClass();
        $retorno    = new stdClass();
        $resposta   = "";

        $mercadoria->id                 = $this->input->post('id_mercadoria');
        $mercadoria->id_tipo_mercadoria = $this->input->post('id_tipo_mercadoria');
        $mercadoria->nome_mercadoria    = $this->input->post('nome_mercadoria');
        $mercadoria->qtde               = $this->input->post('qtde');
        $mercadoria->preco              = $this->input->post('preco');
        $mercadoria->id_tipo_negociacao = $this->input->post('id_tipo_negociacao');

        if ($mercadoria->id != NULL &&  $mercadoria->id_tipo_mercadoria != NULL && $mercadoria->nome_mercadoria != NULL &&
            $mercadoria->qtde != NULL && $mercadoria->preco != NULL && $mercadoria->id_tipo_negociacao != NULL) {
            $resposta = $this->Negociacao_model->setMercadoria($mercadoria);
        } else {
            $retorno->status = FALSE;
            $retorno->msg    = "Houve um erro ao cadastrar! Tente novamente...";
            $resposta        = $retorno;
        }

        # retornar resultado
        print json_encode($resposta);
    }

    
    /**
     * Método para visualizar mercadoria
     *
     * @method ver
     * @access public
     * @param integer $id_mercadoria Id da mercadoria
     * @return void
     */
    public function ver($id_mercadoria = null)
    {
        # Visualizar Mercadoria
        $this->db->select('n.cod_mercadoria_pk, m.tipo_mercadoria, n.nome_mercadoria, n.qtde, n.preco, tn.tipo_negociacao');
        $this->db->from('tb_negocicao n');
        $this->db->join('tb_tipo_mercadoria m', 'n.id_tipo_mercadoria_fk = m.id_tipo_mercadoria_pk', 'inner');
        $this->db->join('tb_tipo_negociacao tn', 'n.id_tipo_negociacao_fk = tn.id_tipo_negociacao_pk', 'inner');
        $this->db->where('n.cod_mercadoria_pk', $id_mercadoria);
        $data['negociacao'] = $this->db->get()->result();

        $this->load->view('header');
        $this->load->view('visualizar', $data);
        $this->load->view('footer');
    }

    /**
     * Método responsável pela exclusão de um registro
     *
     * @method delete
     * @access public
     * @return obj Status da ação
     */
    public function delete()
    {
        $retorno       = new stdClass();
        $resposta      = "";
        $id_mercadoria = filter_input(INPUT_POST, "id");

        if ($id_mercadoria !== NULL) {
            $resposta = $this->Negociacao_model->delMercadoria($id_mercadoria);
        } else {
            $retorno->status = FALSE;
            $retorno->msg    = "Houve um erro ao Excluir! Tente novamente...";
            $resposta        = $retorno;
        }

        # retornar resultado
        print json_encode($resposta);
    }

    /**
     * Método para popular grid de gerenciamento
     *
     * @method buscarEntradadoc
     * @access public
     * @return obj Lista de entradadoc cadastrados
     */
    public function buscarNegociacao()
    {
        # Recebe dados
        $search                     = new stdClass();
        $search->draw               = $this->input->post('draw');
        $search->orderByColumnIndex = !empty($_POST['order']) && is_array($_POST['order']) ? $_POST['order'][0]['column'] : 0;
        $search->orderBy            = !empty($_POST['columns']) && is_array($_POST['columns']) ? $_POST['columns'][$search->orderByColumnIndex]['data'] : "cod_mercadoria_pk";
        $search->orderType          = !empty($_POST['order']) && is_array($_POST['order']) ? $_POST['order'][0]['dir'] : "ASC";
        $search->start              = $this->input->post('start');
        $search->length             = $this->input->post('length');
        $search->filter             = !empty($_POST['search']['value']) ? $_POST['search']['value'] : NULL;
        $search->columns            = !empty($_POST['columns']) && is_array($_POST['columns']) ? $_POST['columns'] : NULL;

        # Instanciar modelo
        $resposta = $this->Negociacao_model->getNegociacao($search);

        print json_encode($resposta);
    }

    /**
     * Método de cadastro de tipo de mercadoria
     *
     * @method createTipoMercadoria
     * @access public
     * @return obj Status da ação
     */
    public function createTipoMercadoria()
    {
        $tp_mercadoria = new stdClass();
        $retorno       = new stdClass();
        $resposta      = "";

        $tp_mercadoria->tipo_mercadoria = $this->input->post('tp_mercadoria');

        if ($tp_mercadoria->tipo_mercadoria != NULL) {
            $resposta = $this->Negociacao_model->setTipoMercadoria($tp_mercadoria);
        } else {
            $retorno->status = FALSE;
            $retorno->msg    = "Houve um erro ao cadastrar! Tente novamente...";
            $resposta        = $retorno;
        }

        # retornar resultado
        print json_encode($resposta);
    }

}
