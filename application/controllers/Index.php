<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contenu'] = $this->indexContenue();
        $data['photos'] = $this->indexPhoto();
        $data['lots'] = $this->indexLot();
        $data['album'] = $this->indexAlbum();

        $data['association'] = $this->indexAssociation();
        $data['logo'] = $this->indexLogo();
        
        $this->template->load('layouts/template', 'web/onepage', $data);
    }

    public function indexLot() {
        return $this->lot_Model->all("idlot");
    }

    public function indexPhoto() {
        return $this->photo_Model->all("idPhoto");
    }

    public function indexContenue() {
        return $this->contenu_Model->find(1, 'idContenu');
    }

    public function indexAlbum() {
        return $this->album_Model->all("idAlbum");
    }
    public function indexAssociation()
    {
        return $this->association_Model->all("idAssociation");
    }
    
    public function indexLogo(){
        return $this->logo_Model->all("idLogo");
    }
    
}
