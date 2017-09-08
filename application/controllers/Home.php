<?php
defined('BASEPATH') or exit('no direct script access allowed');

	class Home extends CI_Controller{

		public function __Construct(){

			parent::__Construct();

				$this->load->model('Mdl_front');

		}

		public function index()	{

			$this->show();
		}

		public function show()	{

			$user_data['link_home'] = 'class="active"';

			$config['base_url'] = base_url().'home/show/';
			$config['total_rows'] = $this->Mdl_front->get_artikel_home_count();
			$config['per_page'] = 4;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['full_tag_open'] = '<div align="center"><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_link'] = '&rarr;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&larr;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['uri_segment'] = 3;

			$this->pagination->initialize($config);

			$user_data['offset'] = $this->uri->segment(3);
			$user_data['query_count'] = $this->Mdl_front->get_artikel_home_count();
			$user_data['query'] = $this->Mdl_front->get_artikel_home($config['per_page'],$this->uri->segment(3));

			$this->load->view('frontend/header',$user_data);
			$this->load->view('frontend/home',$user_data);
			$this->load->view('frontend/footer');
		}
	}