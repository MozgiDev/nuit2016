<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('image_Model', 'imageManager');

    }

    public function show()
    {
        return $this->imageManager->find(1);
    }

    public function update()
    {
        //configuration de la librairie d'upload
        $config['upload_path'] = './assets/images/uploaded';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '40000';

        //on charge la librairie ensuite
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload("uneImage")) {
            $error = array('error' => $this->upload->display_errors());
            return false;
        }

        //stockage dans la BD
        $monImage["urlImage"] = $this->upload->data('full_path');
        if (!$this->imageManager->update($monImage, 1, "idImage"))
        {
            return false;
        };
        return true;
    }
}