<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Emails_model extends MY_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table    = 'tb_emails_disparar';
        $this->prefixo  = 'ema_';
        $this->modulo   = 'emails';
        $this->pk       = 'id';
    }

}