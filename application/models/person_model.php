<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Person_model extends CI_Model 
{

	public function __construct() 
	{
		$this->load->database();
	}

	public function get_all() 
	{
		try 
		{
			$this->db->select('id, firstname, lastname');
			$query = $this->db->get('persons');

			return $query->result_array();
		} 
		catch (Exception $e) 
		{
			log_message('error', 'model/person_model/get_all, Exception, ' . $e->getMessage());
			return FALSE;
		}
	}

	public function get($id = FALSE) 
	{
		try 
		{
			if ($id !== FALSE) 
			{
				$query = $this->db->get_where('persons', array('id' => $id));
				return $query->row_array();
			} 
			else 
			{
				return FALSE;
			}
		} 
		catch (Exception $e) 
		{
			log_message('error', 'model/person_model/get, Exception, ' . $e->getMessage());
			return FALSE;
		}
	}

	public function insert($firstname, $lastname, $email, $sex, $city, $state, $comments, $hobby_cycling, $hobby_frisbee, $hobby_skiing) 
	{
		try 
		{
			$this->db->insert('persons', array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'email' => $email,
				'sex' => $sex,
				'city' => $city,
				'state' => $state,
				'comments' => $comments,
				'hobby_cycling' => $hobby_cycling,
				'hobby_frisbee' => $hobby_frisbee,
				'hobby_skiing' => $hobby_skiing
			));
			
			if ($this->db->affected_rows() == 1)
				return $this->db->insert_id();
			else
			{
				log_message('error', "model/person_model/insert, affected rows == ".$this->db->affected_rows()." expected 1");
				return FALSE;
			}
		} 
		catch (Exception $e) 
		{
			log_message('error', "model/person_model/insert, Exception, " . $e->getMessage());
			return FALSE;
		}
	}

	public function update($id, $firstname, $lastname, $email, $sex, $city, $state, $comments, $hobby_cycling, $hobby_frisbee, $hobby_skiing) 
	{
		try 
		{
			$this->db->where('id', $id)->update('persons', array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'email' => $email,
				'sex' => $sex,
				'city' => $city,
				'state' => $state,
				'comments' => $comments,
				'hobby_cycling' => $hobby_cycling,
				'hobby_frisbee' => $hobby_frisbee,
				'hobby_skiing' => $hobby_skiing
			));

			return $id;
		} 
		catch (Exception $e) 
		{
			log_message('error', "model/person_model/update, Exception, " . $e->getMessage());
			return FALSE;
		}
	}
}