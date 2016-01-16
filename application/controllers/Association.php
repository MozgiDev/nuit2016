<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Association extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('association_Model', 'associationManager');

    }

    public function indexAssociation()
    {
        return $this->associationManager->all();
    }


    public function storeAssociation()
    {
        if (!empty($_FILES['userfile']['name']))
        {
            //configuration de la librairie d'upload
            $config['upload_path'] = './assets/img/uploaded';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '40000';

            //on charge la librairie ensuite
            $this->load->library('upload');
            $this->upload->initialize($config);

            //et on upload
            if (!$this->upload->do_upload("unePhotoAssociation"))
            {
                $error = array('error' => $this->upload->display_errors());
                return false;
            }
            $monAssociation['urlPhotoAssociation']= $this->upload->data('full_path');
        }

        $monAssociation['libelleAssociation'] = $this->input->post('libelleAssociation');
        $monAssociation['urlSiteAssociation']= $this->input->post('urlSiteAssociation');
        $monAssociation['afficherAssociation']= FALSE;
        $this->association_Model->save($monAssociation);
            return TRUE;
    }

    public function updateAssociation($id)
    {
        //récupération de la photo

        $monAssociation['libelleAssociation'] = $this->input->post('libelleAssociation');
        $monAssociation['urlPhotoAssociation']= //A GERER
        $monAssociation['urlSiteAssociation']= $this->input->post('urlSiteAssociation');
        $monAssociation['afficherAssociation']= FALSE;
    }

    public function activateAssociation($id)
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