<?php

class Atelier extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('atelier_model', 'atelierManager');
	}
	public function ajouter()
	{
		$data['title'] = 'Ajouter un atelier';
		$this->template->load('layouts/admin', 'atelier/ajouter', $data);
	}

	public function store()
	{
		$data['libelle'] = $this->input->post('libelle');
		$data['description'] = $this->input->post('description');
		$data['afficher'] = $this->input->post('afficher');

		if($this->atelierManager->save($data))
		{
			redirect('atelier/lister');
		}
	}
	//pour l'admin
	public function lister()
	{
		$data = [];
		$data['title'] = 'List des ateliers';
		$data['ateliers'] = $this->ateliersManager->all();
		$this->template->load('layouts/admin', 'atelier/lister', $data);
	}

	//public
	public function ateliers()
	{
		$data = [];
		$data['title'] = 'List des ateliers';
		$data['ateliers'] = $this->ateliersManager->all();
		$this->template->load('layouts/admin', 'atelier/ateliers', $data);
	}

	public function supprimer($id)
	{
		if($this->atelierManager->delete($id))
		{
			redirect('atelier/lister');
		}
	}
}