<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Negociacao_model extends CI_Model
{

    # Propriedades
    public $draw;
    public $orderBy;
    public $orderType;
    public $start;
    public $length;
    public $filter;
    public $columns;
    public $recordsTotal;
    public $recordsFiltered;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Método responsável por cadastrar / editar uma mercadoria
     *
     * @method setMercadoria
     * @param obj $valores Dados para cadastro / edicao
     * @access public
     * @return obj Status de ação
     */
    public function setMercadoria($valores)
    {
        # Atribuir vars
        $retorno = new stdClass();
        $dados   = array();

        # Dados
        $dados['id_tipo_mercadoria_fk'] = $valores->id_tipo_mercadoria;
        $dados['nome_mercadoria']       = $valores->nome_mercadoria;
        $dados['qtde']                  = $valores->qtde;
        $dados['preco']                 = str_replace(',', '.', str_replace('.', '', $valores->preco));
        $dados['id_tipo_negociacao_fk'] = $valores->id_tipo_negociacao;

        if (isset($valores->id) && $valores->id != ""):
            # Atualizar
            $this->db->where('cod_mercadoria_pk', $valores->id);
            $this->db->update('tb_negocicao', $dados);

            if ($this->db->affected_rows() >= 0)
            {
                $retorno->status = TRUE;
                $retorno->msg    = "Edi&ccedil;&atilde;o realizada com Sucesso!";
            }
            else
            {
                $retorno->status = FALSE;
                $retorno->msg    = "Houve um erro ao editar! Tente novamente...";
            }
        else:
            # Grava
            $dados['dt_hr_cadastro'] = date('Y-m-d H:i');
            $this->db->insert('tb_negocicao', $dados);

            if ($this->db->affected_rows() > 0)
            {
                $retorno->status = TRUE;
                $retorno->msg    = "Cadastro realizado com Sucesso!";
            }
            else
            {
                $retorno->status = FALSE;
                $retorno->msg    = "Houve um erro ao cadastrar! Tente novamente...";
            }
        endif;

        # retornar
        return $retorno;
    }

    /**
     * Método responsável por pesquisar e buscar as negociacoes
     *
     * @method getNegociacao
     * @param obj $search Conjuntos de dados para realizar a pesquisa
     * @access public
     * @return obj Lista de negociacoes
     */
    public function getNegociacao($search)
    {
        # Atribuir valores
        $this->draw      = $search->draw;
        $this->orderBy   = $search->orderBy;
        $this->orderType = $search->orderType;
        $this->start     = $search->start;
        $this->length    = $search->length;
        $this->filter    = $search->filter;
        $this->columns   = $search->columns;
        $filter          = array();
        $where           = array();

        # Se houver busca pela grid
        if ($this->filter != NULL):
            for ($i = 0; $i < count($this->columns); $i++):
                if ($this->columns[$i]['searchable'] === "true"):
                    $column = $this->columns[$i]['data'];
                    $filter[] = "$column LIKE '%{$this->filter}%'";
                endif;
            endfor;
        endif;

        # Contar total de registros
        $this->db->select('COUNT(n.cod_mercadoria_pk) AS total');
        $this->db->from('tb_negocicao n');
        $this->db->join('tb_tipo_mercadoria m', 'n.id_tipo_mercadoria_fk = m.id_tipo_mercadoria_pk', 'inner');
        $this->db->join('tb_tipo_negociacao tn', 'n.id_tipo_negociacao_fk = tn.id_tipo_negociacao_pk', 'inner');
        if (!empty($filter)):
            $where = implode(" OR ", $filter);
            $this->db->where($where);
        endif;
        $query            = $this->db->get();
        $respRecordsTotal = $query->result();
        if (!empty($respRecordsTotal)):
            $this->recordsTotal = $respRecordsTotal[0]->total;
        else:
            $this->recordsTotal = 0;
        endif;

        # Consultar
        $this->db->select('n.cod_mercadoria_pk, m.tipo_mercadoria, n.nome_mercadoria, n.preco, tn.tipo_negociacao');
        $this->db->from('tb_negocicao n');
        $this->db->join('tb_tipo_mercadoria m', 'n.id_tipo_mercadoria_fk = m.id_tipo_mercadoria_pk', 'inner');
        $this->db->join('tb_tipo_negociacao tn', 'n.id_tipo_negociacao_fk = tn.id_tipo_negociacao_pk', 'inner');
        if (!empty($filter)):
            $where = implode(" OR ", $filter);
            $this->db->where($where);
        endif;
        $this->db->order_by($this->orderBy, $this->orderType);
        $this->db->limit($this->length, $this->start);
        $query_dados = $this->db->get();
        $resp_dados  = $query_dados->result();

        # Criar classe predefinida
        $negocios = array();
        if (!empty($resp_dados)):

            foreach ($resp_dados as $value):
                # Botao
                $codigo   = $value->cod_mercadoria_pk;
                $url_edit = base_url('./main/editar/'.$codigo);
                $url_view = base_url('./main/ver/'.$codigo);
                $acao     = "<button type='button' class='btn btn-success btn-xs btn-acao' title='Editar Mercadoria' onclick='Negociacao.redirect(\"$url_edit\")'><i class='glyphicon glyphicon-edit' aria-hidden='true'></i></button>";
                $acao    .= "<button type='button' class='btn btn-primary btn-xs btn-acao' title='Visualizar Mercadoria' onclick='Negociacao.redirect(\"$url_view\")'><i class='glyphicon glyphicon-eye-open' aria-hidden='true'></i></button>";
                $acao    .= "<button type='button' class='btn btn-danger btn-xs btn-acao' title='Excluir Mercadoria' onclick='Negociacao.del(\"$codigo\")'><i class='glyphicon glyphicon-remove' aria-hidden='true'></i></button>";

                # Preco
                $preco = isset($value->preco) && $value->preco !== "" ? "R\$ ".number_format($value->preco, 2, ',', '.') : "0,00";

                $negocio                    = new stdClass();
                $negocio->cod_mercadoria_pk = $value->cod_mercadoria_pk;
                $negocio->tipo_mercadoria   = $value->tipo_mercadoria;
                $negocio->nome_mercadoria   = $value->nome_mercadoria;
                $negocio->preco             = $preco;
                $negocio->tipo_negociacao   = $value->tipo_negociacao;
                $negocio->acao              = $acao;
                $negocios[]                 = $negocio;
            endforeach;

        endif;

        $dados['draw']            = intval($this->draw);
        $dados['recordsTotal']    = $this->recordsTotal;
        $dados['recordsFiltered'] = $this->recordsTotal;
        $dados['data']            = $negocios;

        return $dados;
    }

    /**
     * Método de exclusão de uma mercadoria
     *
     * @method delMercadoria
     * @access public
     * @param integer $id Id do registro a ser excluído
     * @return obj Status da ação
     */
    public function delMercadoria($id)
    {
        # Atribuir vars
        $retorno = new stdClass();

        # SQL
        $this->db->where('cod_mercadoria_pk', $id);
        $this->db->delete('tb_negocicao');

        if ($this->db->affected_rows() > 0)
        {
            $retorno->status = TRUE;
            $retorno->msg    = "Exclus&atilde;o realizada com Sucesso!";
        }
        else
        {
            $retorno->status = FALSE;
            $retorno->msg    = "Houve um erro ao Excluir! Tente novamente...";
        }

        # retornar
        return $retorno;
    }

}

/* End of file setor_model.php */
/* Location: ./application/models/setor_model.php */