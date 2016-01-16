<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Association extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('association_Model', 'associationManager');

    }

    public function index()
    {
        return $this->associationManager->all();
    }

    public function update($id)
    {
        //récupération de la photo

        $monAssociation['libelleAssociation'] = $this->input->post('libelleAssociation');
        $monAssociation['urlPhotoAssociation']= //A GERER
        $monAssociation['urlSiteAssociation']= $this->input->post('urlSiteAssociation');
        $monAssociation['afficherAssociation']= FALSE;
    }

    public function activate($id)
    {
        
    }


}