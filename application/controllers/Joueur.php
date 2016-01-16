<?php

class Joueur extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('joueur_model', 'joueurManager');
		$this->load->dbutil();
        $this->load->library('csvimport');
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
		$data['joueurs'] = $this->joueurManager->all('idJoueur');
		//$this->template->load('layouts/admin', 'joueur/ajouter', $data);
	}

	//public
	public function joueurs()
	{
		$data = [];
		$data['title'] = 'Liste des joueurs';
		$data['joueurs'] = $this->joueurManager->all('idJoueur');
		//$this->template->load('layouts/admin', 'joueur/ajouter', $data);
	}	

	public function supprimer($id)
	{
		if($this->joueurManager->delete($id, 'idJoueur'))
		{
			redirect('joueur/lister');
		}
	}

	public function export()
	{
		// chargement du helper CSV
		$this->load->helper('csv');
		$query = $this->db->query("SELECT pseudo FROM joueur");

		query_to_csv($query, TRUE, 'mon_fichier_'.time().'.csv');
	}

	public function import()
	{
		$data['error'] = '';
		$config['upload_path'] = './assets/uploads/csv/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);
         // If upload failed, display error
        if (!$this->upload->do_upload()) 
        {
       		 $data['error'] = $this->upload->display_errors();
       		 var_dump($data['error']);
        }
        else 
        {
            $file_data = $this->upload->data();
            $file_path =  './assets/uploads/csv/'.$file_data['file_name'];
            var_dump());
 		}
 		if (array_map('str_getcsv', file($file_path))) 
 		{	
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'firstname'=>$row['firstname'],
                        'lastname'=>$row['lastname'],
                        'phone'=>$row['phone'],
                        'email'=>$row['email'],
                    );
                    $this->joueurManager->store($insert_data);
        }
        else
        {
        	echo 'Erreur lors de l\'ouverture du fichier csv';
        }
	}
}