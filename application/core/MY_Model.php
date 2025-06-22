<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_model extends CI_Model {

    protected $table = '';
    protected $prefixo = '';
    protected $modulo = '';
    protected $pk = 'id';

    public function insert($dado) {
        $this->db->insert($this->table, $dado);
        return $this->db->insert_id();
    }

    public function update($dado, $ids,$filtered = false) {

        if($filtered){
            foreach ($ids as $key => $filter) {
                if ($key === "order") {
                    foreach ($ids['order'] as $k => $ordem) {
                        $this->db->order_by($k, $ordem);
                    }
                } else {
                    $this->db->where($filter);
                }
            }

            return $this->db->update($this->table, $dado);
        }else{
            if (is_array($ids))
                $condition = $ids;
            else
                $condition = array($this->prefixo . "id" => $ids);

            return $this->db->update($this->table, $dado, $condition);

        }


    }

    public function delete($ids) {

        if (is_array($ids))
            $condition = $ids;
        else
            $condition = array($this->prefixo . "id" => $ids);

        return $this->db->delete($this->table, $condition);
    }

    public function listAll() {
        return $this->db->order_by($this->prefixo . $this->pk, "DESC")->get($this->table)->result();
    }

    public function count($filtered = null) {

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

        $x = $this->db->select("count(*) as total")->get($this->table)->row();
        return $x->total;
    }

    public function listAllPaginator($filtered = null, $limit = null, $inicio = null) {

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

        return $this->db->order_by($this->prefixo . $this->pk, "DESC")->get($this->table)->result();
    }

    public function getbyId($id) {

        return $this->db->where($this->prefixo . $this->pk, $id)->get($this->table)->row();
    }

    public function isCheck($campo, $valor, $id = null) {

        if ($id)
            $this->db->where($this->prefixo . $this->pk . " <> ", $id);

        return $this->db->where($campo, $valor)->get($this->table)->row();
    }

    public function increment($campo, $ids) {

        if (is_array($ids))
            $condition = $ids;
        else
            $condition = array($this->prefixo . "id" => $ids);

        $this->db->where($condition);
        $this->db->set($campo, $campo . '+1', false);
    }

    public function soma($coluna, $filtered = null) {

        $where = '';
        if ($filtered != null) {
            $where = 'WHERE ';
            foreach ($filtered as $filter) {
                $where .= $filter;
            }
        }

        $this->db->select(" $this->table.*, (SELECT SUM($coluna) FROM  $this->table $where) as total");
        return $this->db->order_by($this->prefixo . $this->pk, "DESC")->get($this->table)->row();
    }

    public function sum($campo, $filtered = []) {

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
        $this->db->select("sum( ".$campo.") as total");
        return $this->db->get($this->table)->row();
    }

    public function getbyCampo($campo, $value) {

        return $this->db->where($this->prefixo . $campo, $value)->get($this->table)->row();
    }

    public function truncate() {

        return $this->db->truncate($this->table);
    }

    public function query($string, $return = true){
        /* Query */
        $query = $this->db->query($string);

        if($return){
            $query = $query->result();

            /* Return */
            if($query){
                return $query;
            }else{
                return false;
            }
        }
    }

    public function insert_update($dado,$ids = null) {
      if($ids){
          if (is_array($ids))
              $condition = $ids;
          else
              $condition = array($this->prefixo . "id" => $ids);
              $this->db->update($this->table, $dado, $condition);
              return $ids;
      }else{
          $this->db->insert($this->table, $dado);
          return $this->db->insert_id();
      }
    }
}
