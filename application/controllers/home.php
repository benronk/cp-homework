<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('person_model');
	}

	public function index($id = FALSE)
	{
		if ($id == FALSE) { 
			$data['person'] = '{}';
			$this->load->view('home', $data);
		}
		else
		{
			$data['person'] = json_encode($this->person_model->get_person($id));
			$data['persons'] = json_encode($this->person_model->get_all_persons());
			$this->load->view('home', $data);
		}
	}
}
