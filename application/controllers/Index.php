<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{
    var $cLot;
    var $cPhoto;
    var $cContenu;
    /*
     * var cLogo = new logo();
     * var cImage = new image();
     * var cAlbum = new Album();
     *
     */

    public function __construct()
{
    parent::__construct();
    $this->cLot = new Lot();
    $this->cPhoto = new Photo();
    $this->cContenu = new Contenu();
    /*
     * $cLogo = new logo();
     * $cImage = new image();
     * $cAlbum = new Album();
     *
     */
}
    public function index()
{
    $data['contenu'] = $this->cContenu->show();
    $data['lots'] = $this->cLot->index();
    $data['photos'] = $this->cPhoto->index();
    //$data[album] = $cAlbum->index();
    $this->template->load('layouts/public', 'web/onepage', $data);

}
}