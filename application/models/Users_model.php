<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends MY_model {

    public function __construct() {
        parent::__construct();
        $this->table    = 'tb_usuarios';
        $this->prefixo  = 'usu_';
        $this->modulo   = 'usuarios';
        $this->pk       = 'id';
    }

     public function listAll(){
        return $this->db->order_by( $this->prefixo."nome" , "ASC")->get($this->table)->result();
    }

    public function listAllPaginator( $filtered = null, $limit = null, $inicio = null ){

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

        if ( $inicio ){
            $this->db->limit( $limit , $inicio );
        }elseif ( $limit ){
            $this->db->limit($limit);
        }

        /* Joins */
        $this->db->join( "tb_status"            , "usu_status = sta_id"   , "left");
        $this->db->join( "tb_grupo_permissoes"  , "usu_grupo  = per_id"   , "left");


        return $this->db->order_by( $this->prefixo.$this->pk , "DESC")->get($this->table)->result();
    }

     public function listAllPaginatorOrder( $filtered = null, $limit = null, $inicio = null ){

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

        /* Joins */
        $this->db->join( "tb_status"            , "usu_status = sta_id"   , "left");
        $this->db->join( "tb_grupo_permissoes"  , "usu_grupo  = per_id"   , "left");

        return $this->db->order_by( $this->prefixo."nome" , "ASC")->get($this->table)->result();
    }

    public function listAllGroup( $ids ){

        if(is_array($ids)){
            $this->db->where( "usu_grupo in (".implode(',', $ids).") " );
        }else{
            $this->db->where( "usu_grupo" , $ids );
        }
        return $this->db->where("usu_status", 1)->order_by( $this->prefixo."nome" , "ASC")->get($this->table)->result();
    }
     public function listAllUser( $id ){
        return $this->db->where("usu_status", 1)->where( "usu_id" , $id )->order_by( $this->prefixo."nome" , "ASC")->get($this->table)->result();

    }

    public function listEquipe($id){

        $this->db->join( "tb_equipes" , "usu_id = equ_responsavel"   , "left");
        $this->db->join( "tb_grupo_permissoes" , "usu_grupo = per_id"   , "left");
        return $this->db->where("usu_id",$id)->get("tb_usuarios")->result();
    }

    public function listGrupo($id){
        $this->db->join( "tb_grupo_permissoes" , "usu_grupo = per_id"   , "left");
        return $this->db->where("usu_id",$id)->get("tb_usuarios")->result();
    }

    public function login($user, $password) {

        return $this->db
                        ->where($this->prefixo . "email", $user)
                        ->where($this->prefixo . "password", $password)
                        ->where($this->prefixo . "status", 1)
                        ->get($this->table)
                        ->row();
    }

    public function get_by_email($email) {
        $this->db->join( "tb_equipes" , "usu_id = equ_responsavel"   , "left");
        $this->db->join( "tb_grupo_permissoes" , "usu_grupo = per_id"   , "left");

        return $this->db
                        ->where($this->prefixo . "email", $email)
                        ->where($this->prefixo . "status", 1)
                        ->limit(1)
                        ->get($this->table)
                        ->row();
    }

    public function get_by_token($token) {

        return $this->db
                        ->where($this->prefixo . "token", $token)
                        ->where($this->prefixo . "status", 1)
                        ->limit(1)
                        ->get($this->table)
                        ->row();
    }

    public function listUsuariosGrupo($filtered = null, $limit = null, $inicio = null ) {

        if ($filtered != null) {
            foreach ($filtered as $filter) {
                $this->db->where($filter);
            }
        }

        if ($inicio) {
            $this->db->limit($limit, $inicio);
        } elseif ($limit) {
            $this->db->limit($limit);
        }


        /* JOINS */

        return $this->db
                        ->order_by($this->prefixo . 'nome', "ASC")
                        ->get($this->table)->result();
    }

    public function user_crm($id_crm) {

        return $this->db
                        ->where($this->prefixo . "crm", $id_crm)
                        ->limit(1)
                        ->get($this->table)
                        ->row();
    }

    public function listEQFS($fam_id){
        $eqf = $this->db->where('fam_' . $this->pk, $fam_id)->order_by('fam_' . "id", "DESC")->get('dfm_familia')->row();
        $pk_usuarios = explode(',', $eqf->fam_eqf );
        $users = [];

        if($pk_usuarios){
            foreach ($pk_usuarios as $pk) {
                $users[] = $this->db->where( $this->prefixo.$this->pk , $pk )->get($this->table)->row();
            }
        }

        return  $users;

    }
    public function listCOMPRADORES($fam_id){
        $eqf = $this->db->where('fam_' . $this->pk, $fam_id)->order_by('fam_' . "id", "DESC")->get('dfm_familia')->row();
        $pk_usuarios = explode(',', $eqf->fam_usuarios );
        $users = [];

        if($pk_usuarios){
            foreach ($pk_usuarios as $pk) {
                $users[] = $this->db->where( $this->prefixo.$this->pk , $pk )->get($this->table)->row();
            }
        }

        return  $users;

    }

    public function checkEquipe($id,$equipe){
        $this->db->join("tb_equipes" , "usu_id = equ_responsavel"   , "left");
        $this->db->join("tb_grupo_permissoes" , "usu_grupo = per_id"   , "left");
        return $this->db->where("usu_id",$id)->where("equ_id",$equipe)->get("tb_usuarios")->row();
    }

    public function getByLogin($user) {

        return $this->db
            ->where($this->prefixo . "usuario", $user)
            ->get($this->table)
            ->row();
    }
}
