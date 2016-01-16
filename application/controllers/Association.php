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


    public function store()
    {
        $monAssociation['libelleAssociation'] = $this->input->post('libelleAssociation');
        $monAssociation['urlPhotoAssociation']= //A GERER
        $monAssociation['urlSiteAssociation']= $this->input->post('urlSiteAssociation');
        $monAssociation['afficherAssociation']= FALSE;
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
        $monAssociation = $this->associationManager->find($id, 'idAssociation');
        if ($monAssociation['afficherAssociation']==0)
        {
            $monAssociation['afficherAssociation']=1;
        }
        else{
            $monAssociation['afficherAssociation']=0;
        }
        if ($this->photoManager->update($monAssociation, $id, 'idAssociation'))
        {
            return TRUE;
        }
        return FALSE;

    }


}