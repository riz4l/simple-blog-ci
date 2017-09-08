<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Img_upload extends CI_Controller	{

		public function __Construct(){

			parent::__Construct();

				$this->load->model('Mdl_imgupload');
				$this->load->model('Mdl_uploadfile');
		}

		public function index()	{


			$this->show();
		}

		public function show()	{	

			if($this->session->userdata('login_user')){

			$config['base_url'] = base_url().'Img_upload/show/';
			$config['total_rows'] = $this->Mdl_imgupload->get_all_count();
			$config['per_page'] = 10;
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
			$user_data['query'] = $this->Mdl_imgupload->get_all($config['per_page'],$this->uri->segment(3));
			$this->load->view('backend/header');
			$this->load->view('backend/imageupload/data',$user_data);
			$this->load->view('backend/footer');
			
			}else{
				redirect('panel');
			}
		}

		public function add()	{

			if($this->session->userdata('login_user')){

				$this->load->view('backend/header');
				$this->load->view('backend/imageupload/add');
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}

		public function add_function(){

			if($this->session->userdata('login_user')){

				$config = array(

						array(
						'field'=>'text_status',
						'label'=>'Status',
						'rules'=>'required'
						)
					);

				$this->form_validation->set_message($config,'%s Tidak Boleh Kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->add();
	
				}else{

					$data_image  = $this->Mdl_uploadfile->upload_image('file_image');
					$execute = $this->Mdl_imgupload->insert($data_image['upload_data']['file_name']);

					if($execute){

						$this->session->set_flashdata('tambah_sukses',TRUE);
						redirect('Img_upload/add');
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

				$image_id = $this->uri->segment(3);
				$query = $this->db->get_where('tb_artikel_image',array('id_artikel_image'=>$image_id));
				$row = $query->row_array();
				$user_data['id_artikel_image'] = $row['id_artikel_image'];
				$user_data['image'] = $row['image'];
				$user_data['image_is_trash'] = $row['image_is_trash'];
				$user_data['image_status'] = $row['image_status'];

				$this->load->view('backend/header');
				$this->load->view('backend/imageupload/edit',$user_data);
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}

		public function edit_function(){

				if($this->session->userdata('login_user')){

				$config = array(

						array(
						'field'=>'text_status',
						'label'=>'Status',
						'rules'=>'required'
						)
					);

				$this->form_validation->set_message($config,'%s Tidak Boleh Kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					redirect('img_upload/edit/'.$_POST['text_idimage']);
	
				}else{

					$data_image  = $this->Mdl_uploadfile->upload_image('file_image');
					$execute = $this->Mdl_imgupload->update($data_image['upload_data']['file_name']);

					if($execute){

						$this->session->set_flashdata('edit_sukses',TRUE);
						redirect('Img_upload/edit/'.$_POST['text_idimage']);
					}else{
						echo 'error';
					}
				}
			}else{
				redirect('panel');
			}
		}

		public function delete(){

			if($this->session->userdata('login_user')){

				$this->Mdl_imgupload->delete($this->uri->segment(3));
				$this->session->set_flashdata('delete_sukses',TRUE);
				redirect('img_upload');

			}else{
				redirect('panel');
			}
		}

		public function search()	{	

			if($this->session->userdata('login_user')){

			if(isset($_POST['btn_search'])){
				$user_data['search_data'] = $this->input->post('keyword');
				$this->session->set_userdata('sess_search',$user_data);
			}else{
				$user_data['search_data'] = $this->session->userdata('sess_search');
			}
			$config['base_url'] = base_url().'Img_upload/search/';
			$config['total_rows'] = $this->Mdl_imgupload->search_count($user_data['search_data']);
			$config['per_page'] = 10;
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
			$user_data['query'] = $this->Mdl_imgupload->search($config['per_page'],$this->uri->segment(3),$user_data['search_data']);
			$this->load->view('backend/header');
			$this->load->view('backend/imageupload/search',$user_data);
			$this->load->view('backend/footer');
			
			}else{
				redirect('panel');
			}
		}
	}