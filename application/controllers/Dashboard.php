<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Dashboard extends CI_Controller{

		public function __Construct()	{

			parent ::__Construct();

				$this->load->model('Mdl_login');
		}

		public function index() {

			if($this->session->userdata('login_user')){
			
				$this->show();
			
			}else{
				redirect('panel');
			}

		}

		public function show()	{

			if($this->session->userdata('login_user')){

				$user_data['data'] = $this->Mdl_login->user_info($this->session->userdata('id_users'));
				
				$this->load->view('backend/header');
				$this->load->view('backend/dashboard',$user_data);
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}

	}