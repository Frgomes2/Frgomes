<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rpg_observacoes_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'rpg_observacoes';
        $this->prefixo  = 'obs_';
        $this->modulo   = 'rpg';
        $this->pk       = 'id';
    }

	public function getByPersonagem($pk_personagem) {
		return $this->db->where($this->prefixo . 'pk_personagem', $pk_personagem)->get($this->table)->result();
	}
}
