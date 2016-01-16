<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    var $template_data = array();

    function set($name, $value) {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE) {
        $this->CI = & get_instance();
        if (isset($_POST['js']) == false) {//vérif de la présence de js = non
            $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
            return $this->CI->load->view($template, $this->template_data, $return);
        }
        if ($_POST['js'] == true) {
            return $this->CI->load->view($view, $view_data);
        }
    }

}
/* End of file template.php */
/* Location: ./system/application/libraries/template.php */
