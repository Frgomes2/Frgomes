<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Configuracoes_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'tb_systemas';
        $this->prefixo  = 'sys_';
        $this->modulo   = 'configuracoes';
        $this->pk       = 'id';
    }

    public function listSystemas(){
        
        return $this->db->where("sys_status", 1)->order_by("sys_ordem", "ASC" )->get($this->table)->result();
        
    }
        
    public function listModulos( $sistema ){
        
        return $this->db->where("mod_sistema", $sistema )->where("mod_status", 1)->order_by("mod_order", "ASC" )->get("tb_modulos")->result();
        
    }
    
    public function listModulosAll( $sistema ){
        
        return $this->db->where("mod_sistema", $sistema )->order_by("mod_order", "ASC" )->get("tb_modulos")->result();
        
    }
    
    public function listMenus( $modulo , $pai ){
        
        return $this->db->where( "men_pai" , $pai )->where( "men_modulo", $modulo )->where("men_status", 1)->order_by("men_order", "ASC" )->get("tb_menus")->result();        
        
    }
    
    public function listMenusAll( $modulo , $pai ){
        
        return $this->db->where( "men_pai" , $pai )->where( "men_modulo", $modulo )->order_by("men_order", "ASC" )->get("tb_menus")->result();        
        
    }
    
    public function nextOrdem(){       
        
        $x    = $this->db->select("max(	sys_ordem) as ultimo")->where( "sys_ordem != '99'" )->get($this->table)->row();
        return $x->ultimo + 1;
    }
    
    
}