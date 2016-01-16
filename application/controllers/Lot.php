<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lot extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('lot_Model', 'lotManager');
    }

    public function index()
    {
        return $this->lotManager->all();
    }

    public function store()
    {
        $monLot["urlLot"] =$this->input->post('urlLot');
        $monLot["positionLot"]= $this->input->post('positionLot');
        if ($this->lotManager->save($monLot))
        {
            return true;
        }
        return false;
    }

    public function update($id)
    {
        $monLot = $this->lotManager->find($id, 'idLot');
        $monLot["urlLot"] =$this->input->post('urlLot');
        $monLot["positionLot"]= $this->input->post('positionLot');
        if ($this->lotManager->update($monLot, $id, 'idLot'))
        {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        if ($this->lotManager->delete($id,'idLot'))
        {
            return true;
        }
        return false;
    }


}