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
        $this->template->load('layouts/admin', 'lot/index.php');
    }
}