<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lot extends CI_Controller {
    public function __construct()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('lot_Model', 'lotManager');
    }

    public function index()
    {
        return $this->lotManager->all();
    }


}