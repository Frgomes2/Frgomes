<?php
namespace Services\Rpg;
require_once APPPATH . 'libraries/services/BaseService.php';
use Services\BaseService;

class RpgBaseService extends BaseService{
    protected $CI;
    public function __construct(){
        $this->CI =& get_instance();
    }
}
