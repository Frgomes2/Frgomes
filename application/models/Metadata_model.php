<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Metadata_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'tb_metadata';
        $this->prefixo  = 'meta_';
        $this->modulo   = 'metadata';
        $this->pk       = 'id';
    }
    
    public function listOfField( $modulo , $campo,$filtered = null ){
        if ($filtered != null) {
            foreach ($filtered as $filter) {
                $this->db->where($filter);
            }
        }

        return $this->db->where( $this->prefixo."modulo" , $modulo )->where( $this->prefixo."campo" , $campo )->order_by( $this->prefixo."texto", "ASC" )->get($this->table)->result();
        
    }    
    public function listOfFieldValue( $modulo , $campo, $value ){
        
        return $this->db
                ->where( $this->prefixo."modulo" , $modulo )
                ->where( $this->prefixo."campo" , $campo )
                ->where( $this->prefixo."value" , $value )
                ->order_by( $this->prefixo."texto", "ASC" )
                ->get($this->table)->result();
        
    }

    public function checkIs($campo, $value){
        $x =  $this->db->where($this->prefixo . "campo", $campo)->where($this->prefixo . "value", $value)->get($this->table)->row();
        if (@$x->meta_id > 0)
            return true;

        return false;
    }
    
    
}