<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $this->template->load('layouts/admin', 'lots/index');
    }

    //IMAGE
    public function showImage()
    {
        return $this->image_Model->find(1);
    }

    public function updateImage()
    {
        //configuration de la librairie d'upload
        $config['upload_path'] = './assets/img/uploaded';
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
        if (!$this->image_Model->update($monImage, 1, "idImage"))
        {
            return false;
        };
        return true;
    }

    //CONTENU
    public function showContenu()
    {
        return $this->contenuManager->find(1, 'idContenu');
    }


    public function updateContenu()
    {
        $monContenu["TitreContenu"] = $this->input->post('TitreContenu');
        $monContenu["TexteContenu"] = $this->input->post('TexteContenu');
        if ($this->contenu_Model->update($monContenu,1))
        {
            return TRUE;
        }
        return FALSE;
    }

    //PHOTOS
    public function indexPhoto()
    {
        return $this->photo_Model->all();
    }


    public function storePhoto()
    {
        //configuration de la librairie d'upload
        $config['upload_path'] = './assets/img/uploaded';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '40000';

        //on charge la librairie ensuite
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload("unePhoto")) {
            $error = array('error' => $this->upload->display_errors());
            return false;
        }

        //stockage dans la BD
        $maphoto["libellePhoto"] = $this->upload->data('file_name');
        $maphoto["urlPhoto"] = $this->upload->data('full_path');
        if (!$this->photo_Model->save($maphoto))
        {
            return false;
        };
        return true;
    }

    public function deletePhoto($id)
    {
        $maPhoto = $this->photo_Model->find($id);
        if (!unlink($maPhoto->urlPhoto))
        {
            return false;
        }
        //suppression de la ligne dans la BD
        if (!$this->photo_Model->delete($maPhoto->id)) {
            return false;
        }
        return true;
    }

    public function activatePhoto($id)
    {
        $maPhoto = $this->photo_Model->find($id, 'idPhoto');
        if ($maPhoto['afficherPhoto']==0)
        {
            $maPhoto['afficherPhoto']=1;
        }
        else{
            $maPhoto['afficherPhoto']=0;
        }
        if ($this->photo_Model->update($maPhoto, $id, 'idPhoto'))
        {
            return TRUE;
        }
        return FALSE;

    }

    //LOGO
    public function updateLogo()
    {
        //configuration de la librairie d'upload
        $config['upload_path'] = './assets/img/uploaded';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '40000';

        //on charge la librairie ensuite
        $this->load->library('upload');
        $this->upload->initialize($config);

        //et on upload
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
