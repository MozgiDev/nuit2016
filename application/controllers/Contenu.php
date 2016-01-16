<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lot extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('contenu_Model', 'contenuManager');
    }
    public function show()
    {
        return $this->contenuManager->find(1, 'idContenu');
    }

    public function edit()
    {
        return $this->contenuManager->find(1, 'idContenu');
    }

    public function update()
    {
        $monContenu["TitreContenu"] = $this->input->post('TitreContenu');
        $monContenu["TexteContenu"] = $this->input->post('TexteContenu');
        if ($this->contenuManager->update($monContenu,1))
        {
            return TRUE;
        }
        return FALSE;
    }


}