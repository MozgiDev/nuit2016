<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showLogo()
    {
        return $this->logo_Model->find(1);
    }

    public function updateLogo()
    {
        //configuration de la librairie d'upload
        $config['upload_path'] = './assets/images/uploaded';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '40000';

        //on charge la librairie ensuite
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload("unLogo")) {
            $error = array('error' => $this->upload->display_errors());
            return false;
        }

        //stockage dans la BD
        $monLogo["urlLogo"] = $this->upload->data('full_path');
        if (!$this->logo_Model->update($monLogo, 1, "idLogo"))
        {
            return false;
        };
        return true;
    }
}