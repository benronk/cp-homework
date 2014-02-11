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
			$data['persons'] = json_encode($this->person_model->get_all());
			$this->load->view('home', $data);
		}
		else
		{
			$data['person'] = json_encode($this->person_model->get($id));
			$data['persons'] = json_encode($this->person_model->get_all());
			$this->load->view('home', $data);
		}
	}

	public function upsert()
	{
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required');
		
		/*
		- This will be sent in via ajax
		- Validate and send in, get the id back, regardless of insert or update
		- get(id) and get_all() and return as json
		- Could include error/success messages in the returned json
		*/
		
		if ($this->form_validation->run() == TRUE)
		{
			$upsert_data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'sex' => $this->input->post('sex'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'comments' => $this->input->post('comments'),
				'hobby_cycling' => $this->input->post('hobby_cycling'),
				'hobby_frisbee' => $this->input->post('hobby_frisbee'),
				'hobby_skiing' => $this->input->post('hobby_skiing')
			);
			$is_update = false;
			if ($this->input->post('id') && $this->input->post('id') != null && is_numeric($this->input->post('id')))
			{
				//log_message('error', 'id exists and is numeric $this->input->post(\'id\'): ' . $this->input->post('id'));
				$upsert_data['id'] = $this->input->post('id');
				$is_update = true;
			}

			$id = $this->person_model->upsert($upsert_data);
			if ($is_update)
			{
				$data['person'] = $this->person_model->get($id);
			}
			else
			{
				$data['person'] = '{}';
			}
		}
		
		$data['persons'] = $this->person_model->get_all();

		ob_clean();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}
}
