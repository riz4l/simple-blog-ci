<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Iklan extends CI_Controller{

		public function __Construct(){

			parent::__Construct();

				$this->load->model('Mdl_iklan');
				$this->load->model('Mdl_uploadfile');
		}

		public function index()	{

			$this->show();

		}

		public function show(){

			if($this->session->userdata('login_user')){

				$config['base_url'] = base_url().'iklan/show/';
				$config['total_rows'] = $this->Mdl_iklan->get_all_count();
				$config['per_page'] = '5';
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$config['full_tag_open'] = '<div align="right"><ul class="pagination">';
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
				$user_data['query'] = $this->Mdl_iklan->get_all($config['per_page'],$this->uri->segment(3));

				$this->load->view('backend/header');
				$this->load->view('backend/iklan/data',$user_data);
				$this->load->view('backend/footer');

			}else{
				
				redirect('panel');
			}

		}

		public function add(){

			if($this->session->userdata('login_user')){

				$user_data['posisi'] = $this->Mdl_iklan->get_posisi();
				$this->load->view('backend/header');
				$this->load->view('backend/iklan/add',$user_data);
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}
		}

		public function add_function(){

			if($this->session->userdata('login_user')){

				$config = array(
						array(
								'field'=>'text_title',
								'label'=>'Nama Iklan',
								'rules'=>'required'
							),
						array(
								'field'=>'text_posisi',
								'label'=>'Posisi',
								'rules'=>'required'
							)
					);

				$this->form_validation->set_message($config,'%s Tidak Boleh Kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					$this->add();

				}else{

					$data_image = $this->Mdl_uploadfile->upload_iklan('img_iklan');
					$execute = $this->Mdl_iklan->insert($data_image['upload_data']['file_name']);

					if($execute){

						$this->session->set_flashdata('tambah_sukses',TRUE);
						redirect('iklan/add');
					}else{
						echo 'error';
					}

				}


			}else{
				redirect('panel');
			}
		}

		public function edit(){

			if($this->session->userdata('login_user')){

				$iklan_id = $this->uri->segment(3);

				$query = $this->db->get_where('tb_iklan',array('id_iklan'=>$iklan_id));
				$row = $query->row_array();

				$user_data['id_iklan'] = $row['id_iklan'];
				$user_data['iklan_title'] = $row['iklan_title'];
				$user_data['id_posisi'] = $row['id_posisi'];
				$user_data['posisi'] = $this->Mdl_iklan->get_posisi();
				$user_data['image'] = $row['image'];
				$user_data['url'] = $row['url'];
				$user_data['iklan_publish'] = $row['iklan_publish'];
				$user_data['iklan_endpublish'] = $row['iklan_endpublish'];
				$user_data['iklan_status'] = $row['iklan_status'];
				$user_data['iklan_is_trash'] = $row['iklan_is_trash'];

				$this->load->view('backend/header');
				$this->load->view('backend/iklan/edit',$user_data);
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}			
		}

		public function edit_function()	{

			if($this->session->userdata('login_user'))	{

				$config = array(
						array(
								'field'=>'text_title',
								'label'=>'Iklan Title',
								'rules'=>'required'
							),
						array(
								'field'=>'text_posisi',
								'label'=>'Iklan Posisi',
								'rules'=>'required'
							)
					);

				$this->form_validation->set_message($config,'%s Tidak Boleh Kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					redirect('iklan/edit/'.$_POST['text_idiklan']);
				}else{

					$data_image = $this->Mdl_uploadfile->upload_iklan('img_iklan');
					$execute = $this->Mdl_iklan->update($data_image['upload_data']['file_name']);

					if($execute){

						$this->session->set_flashdata('update_sukses',TRUE);
						redirect('iklan/edit/'.$_POST['text_idiklan']);
					}else{
						echo 'error';
					}

				}
			}else{
				redirect('panel');
			}
		}

		public function delete()	{

			if($this->session->userdata('login_user')){

				$this->Mdl_iklan->delete($this->uri->segment(3));
				$this->session->set_flashdata('delete_sukses',TRUE);
				redirect('iklan');

			}else{
				redirect('panel');
			}
		}

		public function search(){

			if($this->session->userdata('login_user')){

				if(isset($_POST['btn_search'])){
					$user_data['search_data'] = $this->input->post('keyword');
					$this->session->set_userdata('sess_search',$user_data['search_data']);
				}else{
					$user_data['search_data'] = $this->session->userdata('sess_search');
				}

				$config['base_url'] = base_url().'iklan/search/';
				$config['total_rows'] = $this->Mdl_iklan->search_count($user_data['search_data']);
				$config['per_page'] = '5';
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$config['full_tag_open'] = '<div align="right"><ul class="pagination">';
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
				$user_data['query'] = $this->Mdl_iklan->search($config['per_page'],$this->uri->segment(3),$user_data['search_data']);

				$this->load->view('backend/header');
				$this->load->view('backend/iklan/search',$user_data);
				$this->load->view('backend/footer');
			}else{
				redirect('panel');

			}
		}
	}