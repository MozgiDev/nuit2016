<?php

class Joueur extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('joueur_model', 'joueurManager');
	}
	public function ajouter()
	{
		$data['title'] = 'Ajouter un joueur';
		$this->template->load('layouts/admin', 'joueur/ajouter', $data);
	}

	public function store()
	{
		$data['pseudo'] = $this->input->post('pseudo');
		$data['mail'] = $this->input->post('mail');
		$data['table'] = $this->input->post('table');
		$data['position'] = $this->input->post('position');
		$data['jeton'] = $this->input->post('jeton');
		$data['preinscription'] = $this->input->post('preinscription');
		$data['inscription'] = $this->input->post('inscription');

		if($this->joueurManager->save($data))
		{
			redirect('joueur/lister');
		}
	}
	//pour l'admin
	public function lister()
	{
		$data = [];
		$data['title'] = 'Liste des joueurs';
		$data['joueurs'] = $this->joueurManager->all();
		$this->template->load('layouts/admin', 'joueur/ajouter', $data);
	}

	//public
	public function joueurs()
	{
		$data = [];
		$data['title'] = 'Liste des joueurs';
		$data['joueurs'] = $this->joueurManager->all();
		$this->template->load('layouts/admin', 'joueur/ajouter', $data);
	}

	public function supprimer($id)
	{
		if($this->joueurManager->delete($id))
		{
			redirect('joueur/lister');
		}
	}
}