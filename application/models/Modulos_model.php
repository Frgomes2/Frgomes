<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Modulos_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'tb_modulos';
        $this->prefixo  = 'mod_';
        $this->modulo   = 'modulos';
        $this->pk       = 'id';
    }
    
}
