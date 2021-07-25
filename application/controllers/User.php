<?php 
	class User extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('user_model');
			$this->load->helper('url');
		}

		public function index(){
			$this->load->view('register');
		}

		public function register(){
			if($this->input->post('submit')){
				$data['name'] = $this->input->post('name');
				$data['email'] = $this->input->post('email');
				$data['password'] = $this->input->post('password');
				$categories = $this->input->post('categories');

				$user_id = $this->user_model->registerUser($data);
				foreach ($categories as $key => $category) {
					$this->user_model->addUserCategory($user_id,$category);
				}
		
			}
			redirect('user');
		}
	}


?>
