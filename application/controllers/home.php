<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('person_model');
	}

	public function index($id = FALSE)
	{
		$data['person'] = '{}';
		if ($id !== FALSE) 
		{ 
			$data['person'] = json_encode($this->person_model->get($id), JSON_HEX_TAG);
		}
		
		$data['persons'] = json_encode($this->person_model->get_all(), JSON_HEX_TAG);
		$this->load->view('home', $data);
	}

	public function upsert()
	{
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id', 'Id', 'is_natural_no_zero');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|max_length[50]');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|max_length[100]');
		$this->form_validation->set_rules('sex', 'Sex', 'required|alpha|exact_length[1]');
		$this->form_validation->set_rules('city', 'City', 'required|max_length[50]');
		$this->form_validation->set_rules('state', 'State', 'required|alpha|exact_length[2]');
		$this->form_validation->set_rules('comments', 'Comments', 'required');
		$this->form_validation->set_rules('hobby_cycling', 'Hobby Cycling', 'required|less_than[2]|greater_than[-1]');
		$this->form_validation->set_rules('hobby_frisbee', 'Hobby Frisbee', 'required|less_than[2]|greater_than[-1]');
		$this->form_validation->set_rules('hobby_skiing', 'Hobby Skiing', 'required|less_than[2]|greater_than[-1]');
		
		if ($this->form_validation->run() == TRUE)
		{
			if ($this->input->post('id') && $this->input->post('id') != null)
			{
				$id = $this->person_model->update(
					$this->input->post('id'),
					$this->input->post('firstname'),
					$this->input->post('lastname'),
					$this->input->post('email'),
					$this->input->post('sex'),
					$this->input->post('city'),
					$this->input->post('state'),
					$this->input->post('comments'),
					$this->input->post('hobby_cycling'),
					$this->input->post('hobby_frisbee'),
					$this->input->post('hobby_skiing')
				);

				if ($id === FALSE) 
				{
					$data['errors'] = ["Problem editing person."];
				}
				else 
				{
					$data['person'] = $this->person_model->get($id);
				}
			}
			else
			{
				$id = $this->person_model->insert(
					$this->input->post('firstname'),
					$this->input->post('lastname'),
					$this->input->post('email'),
					$this->input->post('sex'),
					$this->input->post('city'),
					$this->input->post('state'),
					$this->input->post('comments'),
					$this->input->post('hobby_cycling'),
					$this->input->post('hobby_frisbee'),
					$this->input->post('hobby_skiing')
				);
				if ($id === FALSE) 
				{
					$data['errors'] = ["Problem creating person."];
				}
			}
		}
		else 
		{
			$data['errors'] = explode("\n", str_replace(array("<p>", "</p>"), "", rtrim(validation_errors())));
		}
		
		$data['persons'] = $this->person_model->get_all();

		ob_clean();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}
}