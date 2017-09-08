<?php

	defined('BASEPATH') or exit('no direct script access allowed');

	class Pagemanagement extends CI_Controller	{

		public function __Construct(){

			parent::__Construct();

				$this->load->model('Mdl_page');
		}

		Public function index(){

			$this->show();
		}

		public function show(){

			if($this->session->userdata('login_user')){

				$config['base_url'] = base_url().'Pagemanagement/show/';
				$config['total_rows'] = $this->Mdl_page->get_all_count();
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
				$user_data['query'] = $this->Mdl_page->get_all($config['per_page'],$this->uri->segment(3));

				$this->load->view('backend/header');
				$this->load->view('backend/page/data',$user_data);
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}
		}

		public function add()	{

			if($this->session->userdata('login_user')){

				$this->load->view('backend/header');
				$this->load->view('backend/page/add');
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}

		public function add_function(){

			if($this->session->userdata('login_user')){

				$config = array(

						array(
								'field'=>'text_judul',
								'label'=>'Page Title',
								'rules'=>'required'
							),
						array(
								'field'=>'text_konten',
								'label'=>'Page Content',
								'rules'=>'required'
							)

					);

				$this->form_validation->set_message($config,'%s Tidak boleh kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					$this->add();
				}else{

					$execute = $this->Mdl_page->insert();

					if($execute){

						$this->session->set_flashdata('tambah_sukses',TRUE);
						redirect('Pagemanagement/add');
					}else{
						echo "error";
					}

				}

			}else{
				redirect('panel');
			}
		}

		public function edit(){

			if($this->session->userdata('login_user')){

				$page_id = $this->uri->segment(3);
				$query = $this->db->get_where('tb_page',array('id_page'=>$page_id));
				$row = $query->row_array();
				
				$user_data['id_page'] = $row['id_page'];
				$user_data['page_judul'] = $row['page_judul'];
				$user_data['page_konten'] = $row['page_konten'];
				$user_data['page_keyword'] = $row['page_keyword'];
				$user_data['page_description'] = $row['page_description'];
				$user_data['page_status'] = $row['page_status'];
				$user_data['page_is_trash'] = $row['page_is_trash'];

				$this->load->view('backend/header');
				$this->load->view('backend/page/edit',$user_data);
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}
		}

		public function edit_function(){

			if($this->session->userdata('login_user')){

				$config = array(
						array(
								'field'=>'text_judul',
								'label'=>'Page Title',
								'rules'=>'required',
							),
						array(
								'field'=>'text_konten',
								'label'=>'Page file_put_contents(filename, data)',
								'rules'=>'required',
							)
					);

				$this->form_validation->set_message($config,'%s Tidak Boleh Kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					redirect('Pagemanagement/edit/'.$_POST['text_idpage']);
				}else{

					$execute = $this->Mdl_page->update();
					
					if($execute){

						$this->session->set_flashdata('update_sukses',TRUE);
						redirect('Pagemanagement/edit/'.$_POST['text_idpage']);
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

				$this->Mdl_page->delete($this->uri->segment(3));
				$this->session->set_flashdata('delete_sukses',TRUE);
				redirect('Pagemanagement');
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
					$user_data['search_data'] = $this->session->set_userdata('sess_search');
				}

				$config['base_url'] = base_url().'Pagemanagement/search/';
				$config['total_rows'] = $this->Mdl_page->search_count($user_data['search_data']);
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
				$config['uri_segment'] = 3;

				$this->pagination->initialize($config);

				$user_data['offset'] = $this->uri->segment(3);
				$user_data['query'] = $this->Mdl_page->search($config['per_page'],$this->uri->segment(3),$user_data['search_data']);

				$this->load->view('backend/header');
				$this->load->view('backend/page/search',$user_data);
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}
		}
	}