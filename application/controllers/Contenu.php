<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenu extends CI_Controller
{

    public function index()
    {
        $this->template->load('layouts/admin', 'lots/index');
    }
}