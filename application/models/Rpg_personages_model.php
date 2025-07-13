<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rpg_personages_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'rpg_personagens';
        $this->prefixo  = 'per_';
        $this->modulo   = 'rpg';
        $this->pk       = 'id';
    }
}
