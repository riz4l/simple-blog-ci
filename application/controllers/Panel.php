<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Panel extends CI_Controller	{

		public function __Construct(){

			parent::__construct();

				$this->load->model('Mdl_login');
		}

		public function index()	{

			$this->show();
		}

		public function show()	{

			$this->load->view('login');
		}

		public function login(){

			$config = array(

					array(
							'field'=>'username',
							'label'=>'Username',
							'rules'=>'required'
						),
					array(
							'field'=>'password',
							'label'=>'Password',
							'rules'=>'required'
						)
				);

			$this->form_validation->set_message($config);
			$this->form_validation->set_rules($config);

			if($this->form_validation->run()==FALSE){

				$this->load->view('login');
			}else{

				extract($_POST);

				$id_users = $this->Mdl_login->check_login($username,$password);

				if(!$id_users){

					$this->session->set_flashdata('login_gagal',TRUE);
					redirect('panel');
				}else{

					$config = $this->Mdl_login->user_info($id_users);
					$data = array(
								'login_user'=> TRUE,
								'id_users'=>$id_users,
								'username'=>$config['username'],
								'nama'=>$config['nama'],
								'foto'=>$config['foto'],
								'last_login'=>$config['last_login']
						);

					$this->session->set_userdata($data);
					redirect('dashboard');
				}
			}
		}

		public function logout(){

			$this->Mdl_login->check_logout($this->session->userdata('id_users'));
			$this->session->sess_destroy();
			redirect('panel');
		}

	}