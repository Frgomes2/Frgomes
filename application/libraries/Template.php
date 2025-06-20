<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Template {

    var $template_data = array();

    function set($name, $value) {
        $this->template_data[$name] = $value;
    }

    function loadsimples($template = '', $view = '', $view_data = array(), $return = FALSE) {
        $this->CI = & get_instance();
        $this->set('contents', $this->CI->load->view($template . '/' . $view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }


    function load($template = '', $modulo = '', $view = '', $view_data = array(), $return = FALSE) {

        $this->CI = & get_instance();
        $this->set('contents', $this->CI->load->view($template  . '/' . $modulo . '/' . $view, $view_data, TRUE));

        $destination = 'application/views/'.$template.'.php';
        if (!file_exists($destination)) {
            $template = 'plataforma';
        }

        return $this->CI->load->view($template, $this->template_data, $return);
    }

}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */