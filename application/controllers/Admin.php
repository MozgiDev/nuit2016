<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        
        $data['contenue'] = $this->indexContenue();
        
        
        
        $this->template->load('layouts/admin', 'lots/index',$data);
    }
    
     public function indexContenue() {
        return $this->contenu_Model->find(1, 'idContenu');
    }
    
    
}
