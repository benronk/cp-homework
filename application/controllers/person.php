<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Person extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('person_model');
	}
	
	public function get_all()
	{
		echo json_encode($this->person_model->get_all());
	}

	public function get($id = 1)
	{
		echo json_encode($this->person_model->get($id));
	}

	public function upsert($data)
	{
		
	}
}