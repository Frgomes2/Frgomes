<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceLoader {
    protected $controller;
    protected $services = []; // Armazena os serviços carregados

    public function __construct($controller) {
        $this->controller = $controller;
        $this->loadBaseService(); // Carrega BaseService primeiro
        $this->loadServices(); // Carrega os outros serviços

    }

    /**
     * Carrega o BaseService globalmente antes de carregar os serviços específicos.
     */
    private function loadBaseService() {
        $baseServicePath = APPPATH . 'libraries/services/BaseService.php';

        if (file_exists($baseServicePath)) {
            require_once $baseServicePath;

            if (class_exists('Services\BaseService')) {
                $this->services['baseService'] = new \Services\BaseService($this->controller);
            }
        }
    }


    /**
     * Carrega dinamicamente os serviços do módulo e os armazena no array services.
     */
    private function loadServices() {
        $servicePath = APPPATH . 'libraries/services/' . $this->controller->sys_area . '/' . $this->controller->sys_module . '/';

        if (!is_dir($servicePath)) {
            return;
        }

        $serviceFiles = glob($servicePath . '*.php');

        foreach ($serviceFiles as $file) {
            require_once $file;

            // Extrai o nome da classe sem a extensão
            $className = basename($file, '.php');
            $fullClassName = "Services\\{$this->controller->sys_area}\\{$this->controller->sys_module}\\$className";

            if (class_exists($fullClassName) && $className !== 'BaseService') {
                $this->services[lcfirst($className)] = new $fullClassName($this->controller);
            }
        }
    }

    /**
     * Método mágico para acessar os serviços carregados dinamicamente.
     */
    public function __get($name) {
        return $this->services[$name] ?? null;
    }
}
