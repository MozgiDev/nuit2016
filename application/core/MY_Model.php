<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {
	public function save($data = [])
	{	
		if(! empty($data))
		{
			return (bool) $this->db->set($data)
						 ->set(['created_at' => 'NOW()'],null, FALSE)
						 ->set(['updated_at' => 'NOW()'],null,  FALSE)
						 ->insert($this->table);
		}
		return false;
	}


	public function all($champ = "id", $orderBy = "desc")
	{
		$this->db->from($this->table);
		$this->db->order_by($champ, $orderBy);
		$query = $this->db->get();
		return $query->result();
	}

//a tester 
	public function find($valeur, $champs = 'id')
	{
		 return $this->db->get_where($this->table,  [$champs => $valeur])->row();	
	}
	
	
	public function delete($where)
	{
		return (bool) $this->db->delete($this->table, ['id' => $where]);
	}


	public function update($data = [], $where)
	{

			return (bool) $this->db->set($data)
								   ->set(['modified_at' => 'NOW()'])
								   ->where(['id' => $where])
								   ->update($this->table);
	}
	
	

	public function count($champ = array(), $valeur = null) // Si $champ est un array, la variable $valeur sera ignorée par la méthode where()
	{
		return (int) $this->db->where($champ, $valeur)
			->from($this->table)
			->count_all_results();
	}
	









}

/* End of file MY_Model.php */
/* Location: /application/libraries/MY_Model.php */