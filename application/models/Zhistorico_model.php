<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Zhistorico_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'z_historico';
        $this->prefixo  = 'his_';
        $this->modulo   = 'historico';
        $this->pk       = 'id';
    }    
    
    
    public function save( $modulo , $acao , $detalhe){
        
        $dados = [];
        
        $dados['his_user']      = @$this->session->userdata("FR_UID") ;        
        $dados['his_nome']      = @$this->session->userdata("FR_USER");
        $dados['his_modulo']    = $modulo;
        $dados['his_acao']      = $acao;
        $dados['his_detalhe']   = $detalhe;
        
        $this->insert($dados);
             
    }   
}