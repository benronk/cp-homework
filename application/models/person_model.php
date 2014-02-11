<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Person_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		//$query = $this->db->get('persons');

		$this->db->select('id, firstname, lastname');
		$query = $this->db->get('persons');

		return $query->result_array();
	}

	public function get($id = FALSE)
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

	public function upsert($data)
	{
		//log_message('error', '$data[\'id\']: ' . $data['id']);
		//log_message('error', "$data['id'] != null: " . $data['id'] != null);
		//log_message('error', "is_numeric($data['id']): " . is_numeric($data['id']));
		
		if ($data['id'] != null)
		{
			if (is_numeric($data['id']))
			{
//				$this->db->where('id', $data['id'])->update('persons', array(
//					'firstname' => $data['firstname'],
//					'lastname' => $data['lastname'],
//					'email' => $data['email'],
//					'sex' => $data['sex'],
//					'city' => $data['city'],
//					'state' => $data['state'],
//					'comments' => $data['comments'],
//					'hobby_cycling' => $data['hobby_cycling'],
//					'hobby_frisbee' => $data['hobby_frisbee'],
//					'hobby_skiing' => $data['hobby_skiing']
//				));
				$this->db->where('id', $data['id'])->update('persons', $data);

				return $data['id'];
			}
		}
		else
		{
//			$this->db->insert('persons', array(
//				'firstname' => $data['firstname'],
//				'lastname' => $data['lastname'],
//				'email' => $data['email'],
//				'sex' => $data['sex'],
//				'city' => $data['city'],
//				'state' => $data['state'],
//				'comments' => $data['comments'],
//				'hobby_cycling' => $data['hobby_cycling'],
//				'hobby_frisbee' => $data['hobby_frisbee'],
//				'hobby_skiing' => $data['hobby_skiing']
//			));
			$this->db->insert('persons', $data);

			return $this->db->insert_id();
		}

		//return 1;
	}
}