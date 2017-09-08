<?php
	defined('BASEPATH') or exit('no direct script access allowed');


	class Page extends CI_Controller	{

		public function __Construct(){

			parent::__Construct();

				$this->load->model('Mdl_front');

		}

		public function index()	{

			$this->show();

		}

		public function show(){

			$user_data['slug'] = $this->uri->segment(3);
			$user_data['query'] = $this->Mdl_front->get_page($user_data['slug']);

			$this->load->view('frontend/header');
			$this->load->view('frontend/page',$user_data);
			$this->load->view('frontend/footer');

		}

		public function sitemap(){

			
		}

	}