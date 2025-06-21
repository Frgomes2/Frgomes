<?php
namespace Services;
class BaseService{

    protected $CI;
    protected $controller; // Adiciona a propriedade controller
    public function __construct($controller) {
        $this->CI =& get_instance();
        $this->controller = $controller; // Armazena o controller recebido
        $this->globalLoadingVariables();
    }

    public function is_ajax(){
        if (!is_ajax()) {
            redirect(BASE_URL);
            return false;
        }
    }
}
