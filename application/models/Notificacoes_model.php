<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notificacoes_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'tb_notificacoes';
        $this->prefixo  = 'not_';
        $this->modulo   = 'notificacoes';
        $this->pk       = 'id';
    }
    
     public function listAllPaginator( $filtered = null, $limit = null, $inicio = null ){
       
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
        
        $this->db->join("tb_usuarios", "usu_id = not_quem", "left");
        return $this->db->order_by( $this->prefixo.$this->pk , "DESC")->get($this->table)->result();
    }
    
     public function listNotificationsNEWS( $id ){
        
        return $this->db               
                ->where("not_status", "0")
                ->where("not_para", $id )                
                ->order_by("not_datacad" , "DESC")
                ->get($this->table)
                ->result();        
    }
    
    
    public function listNotifications( $id ){
        
        return $this->db   
                ->join("tb_usuarios", "usu_id = not_quem", "left")
                ->where("not_para", $id )
                ->limit(5)
                ->order_by("not_datacad" , "DESC")
                ->get($this->table)
                ->result();        
    }
    
    
}