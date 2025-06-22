<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Grupopermissoes_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'tb_grupo_permissoes';
        $this->prefixo  = 'per_';
        $this->modulo   = 'permissoes';
        $this->pk       = 'id';
    }
    
    public function listPermissoes( $status ){
        
        return $this->db
                ->where( $this->prefixo."status", $status )
                ->order_by( $this->prefixo.'titulo' , "ASC")
                ->get($this->table)
                ->result();
    }

    public function listAll(){        
        return $this->db->order_by( $this->prefixo.'titulo' , "ASC")->get($this->table)->result();
    }
    
        
    public function listAllPaginator( $filtered = null, $limit = null, $inicio = null  ){       
        if($filtered != null){
            foreach($filtered as $filter ){
                $this->db->where( $filter );
            }
        }
        
        if ( $inicio ){
            $this->db->limit( $limit , $inicio );
        }elseif ( $limit ){
            $this->db->limit($limit);            
        }
        
        $this->db->select("tb_grupo_permissoes.*, (select count(*) from tb_usuarios where usu_grupo = per_id) as total");
        
        return $this->db->order_by( $this->prefixo.$this->pk , "DESC" )->get($this->table)->result();
        
    }
 
}
