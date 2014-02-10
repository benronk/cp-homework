<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Person_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_persons()
	{
		$query = $this->db->get('persons');
		return $query->result_array();
	}

	public function get_person($id = FALSE)
	{
		if (!$id === FALSE)
		{
			$query = $this->db->get_where('persons', array('id' => $id));
			return $query->row_array();
		}
		else
		{
			return;
		}
	}

	public function upsert_person($data)
	{

	}
}