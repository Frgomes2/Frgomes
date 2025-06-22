<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menus_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tb_menus';
        $this->prefixo = 'men_';
        $this->modulo = 'menus';
        $this->pk = 'id';
    }

    public function listAllVinculos($filtered = null, $limit = null, $inicio = null) {

        if ($filtered != null) {
            foreach ($filtered as $key => $filter) {
                if ($key === "order") {
                    foreach ($filtered['order'] as $k => $ordem) {
                        $this->db->order_by($k, $ordem);
                    }
                } else {
                    $this->db->where($filter);
                }
            }
        }

        if ($inicio) {
            $this->db->limit($limit, $inicio);
        } elseif ($limit) {
            $this->db->limit($limit);
        }

        $this->db->join("tb_modulos", "men_modulo = mod_id","inner");
        $this->db->join("tb_systemas", "men_sistema = sys_id","inner");
        return $this->db->order_by($this->prefixo . $this->pk, "DESC")->get($this->table)->result();
    }

    public function getSystema($menu) {
        return $this->db
            ->where('men_id', $menu)
            ->get($this->table)->row();
    }

}
