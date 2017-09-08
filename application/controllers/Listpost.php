<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Listpost extends CI_Controller	{

		public function __Construct()	{

			parent::__Construct();

				$this->load->model('Mdl_posting');
		}	

		public function index()	{

			$this->show();
		}

		public function show()	{

			if($this->session->userdata('login_user')){

				$config['base_url'] = base_url().'listpost/show/';
				$config['total_rows'] = $this->Mdl_posting->get_all_count();
				$config['per_page'] = 6;
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

				$user_data['query'] = $this->Mdl_posting->get_all($config['per_page'],$this->uri->segment(3));

				$this->load->view('backend/header');
				$this->load->view('backend/listpost/data',$user_data);
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}

		public function delete(){

			if($this->session->userdata('login_user')){

			$this->Mdl_posting->delete($this->uri->segment(3));
			$this->session->set_flashdata('delete_sukses',TRUE);
			redirect('listpost');

			}else{
				redirect('panel');
			}

		}

		public function search()	{

			if($this->session->userdata('login_user')){

				if(isset($_POST['btn_search'])){
					$user_data['search_data'] = $this->input->post('keyword');

					$this->session->set_userdata('sess_search',$user_data['search_data']);
				}else{
					$user_data['search_data'] = $this->session->userdata('sess_search');
				}
				
				$config['base_url'] = base_url().'listpost/show/';
				$config['total_rows'] = $this->Mdl_posting->search_count($user_data['search_data']);
				$config['per_page'] = 6;
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

				$user_data['query'] = $this->Mdl_posting->search($config['per_page'],$this->uri->segment(3),$user_data['search_data']);

				$this->load->view('backend/header');
				$this->load->view('backend/listpost/search',$user_data);
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}
		}

	}