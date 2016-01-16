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
        $data['image'] = $this->showImage();
        $data['photos'] = $this->indexPhoto();
        $data['lots'] = $this->indexLot();
        $data['albums'] = $this->indexAlbum();
        $data['logo'] = $this->showLogo();
        $this->template->load('layouts/admin', 'web/admin',$data);
    }

     public function indexContenue() {
        return $this->contenu_Model->find(1, 'idContenu');
    }

    public function indexAssociation() {
        
        
        $data['association'] = $this->indexAssociationAll();
        
       $this->template->load('layouts/admin', 'association/index', $data);
   }

   public function deleteAssociation(){
       $id = $this->uri->segment(3);
       //var_dump($id);
       $this->association_Model->delete($id,'idAssociation');
       $this->indexAssociation();
   }


   public function indexAssociationAll()
    {
        return $this->association_Model->all("idAssociation");
    }
    

   public function indexJoueurs()
   {
      $this->template->load('layouts/admin', 'joueurs/index');
   }

    public function indexLot()
    {
        return $this->lot_Model->all('idLot');
    }

  public function indexAteliers() {
     $this->template->load('layouts/admin', 'ateliers/index');
  }
    //IMAGE
    public function showImage()
    {
        return $this->image_Model->find(1, 'idImage');
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
        
        
        if (!$this->upload->do_upload("monImage")) {
            $error = array('error' => $this->upload->display_errors());
            return false;
        }
        var_dump($this->upload->data);

        //stockage dans la BD
        $monImage["urlIMAGE"] = $this->upload->data('full_path');
        if (!$this->image_Model->update($monImage, 1, "idImage"))
        {
            return false;
        };
        return true;
    }
    public function activateImage($id)
    {
        $maPhoto = $this->image_Model->find($id, 'idImage');
        if ($maPhoto['afficherImage']==0)
        {
            $maPhoto['afficherImage']=1;
        }
        else{
            $maPhoto['afficherImage']=0;
        }
        $this->image_Model->update($maPhoto, $id, 'idPhoto');
        $this->index();

    }

    //CONTENU


    public function updateContenu()
    {
        if (!empty($this->input->post('TitreContenu'))) {
            $monContenu["TitreContenu"] = $this->input->post('TitreContenu');

            $monContenu["TexteContenu"] = $this->input->post('editor1');
            $this->contenu_Model->update($monContenu, 1, 'idContenu');
        }
        $this->index();
    }

    //PHOTOS
    public function indexPhoto()
    {
        return $this->photo_Model->all('idPhoto');
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
            $this->index();
        }

        //stockage dans la BD
        $maphoto["libellePhoto"] = $this->upload->data('file_name');
        $maphoto["urlPhoto"] = $this->upload->data('full_path');
        $this->photo_Model->save($maphoto);
        $this->index();

    }

    public function deletePhoto($id)
    {
        $maPhoto = $this->photo_Model->find($id);
        if (!unlink($maPhoto->urlPhoto))
        {
            return false;
        }
        //suppression de la ligne dans la BD
        $this->photo_Model->delete($maPhoto->id) ;
        $this->index();
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

    public function showLogo()
    {
        return $this->logo_Model->find(1, 'idLogo');
    }
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

    //LOT
    public function storeLot()
    {
        $monLot["urlLot"] =$this->input->post('urlLot');
        $monLot["positionLot"]= $this->input->post('positionLot');
        if ($this->lotManager->save($monLot))
        {
            return true;
        }
        return false;
    }

    public function updateLot($id)
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

    public function deleteLot($id)
    {
        if ($this->lotManager->delete($id,'idLot'))
        {
            return true;
        }
        return false;
    }

    //ALBUM
    public function indexAlbum() {
        return $this->album_Model->all("idAlbum");
    }


}
