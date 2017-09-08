<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Tags extends CI_Controller{

		public function __Construct(){

			parent::__Construct();

				$this->load->model('Mdl_tags');
		}

		public function index(){

			$this->show();

		}

		public function show(){

			if($this->session->userdata('login_user')){

				$config['base_url'] = base_url().'tags/show/';
				$config['total_rows'] = $this->Mdl_tags->get_all_count();
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
				$user_data['query'] = $this->Mdl_tags->get_all($config['per_page'],$this->uri->segment(3));

				$this->load->view('backend/header');
				$this->load->view('backend/tag/data',$user_data);
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}

		}

		public function add(){

			if($this->session->userdata('login_user')){

				$this->load->view('backend/header');
				$this->load->view('backend/tag/add');
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}

		public function add_function(){

			if($this->session->userdata('login_user')){

				$config = array(
						array(
								'field'=>'text_tagname',
								'label'=>'Tag Name',
								'rules'=>'required|trim'
							)
					);

				$this->form_validation->set_message($config,'%s Tidak Boleh Kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->add();
				
				}else{

					$execute = $this->Mdl_tags->insert();

					if($execute){

						$this->session->set_flashdata('tambah_sukses',TRUE);
						redirect('tags/add');
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

				$tag_id = $this->uri->segment(3);
				$query = $this->db->get_where('tb_artikel_tags',array('id_artikel_tag'=>$tag_id));
				$row = $query->row_array();

				$user_data['id_artikel_tag'] = $row['id_artikel_tag'];
				$user_data['tag_name'] = $row['tag_name'];
				$user_data['tag_status'] = $row['tag_status'];
				$user_data['tag_is_trash'] = $row['tag_is_trash'];

				$this->load->view('backend/header');
				$this->load->view('backend/tag/edit',$user_data);
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}
		}

		public function edit_function(){

			if($this->session->userdata('login_user')){

				$config = array(
						array(
								'field'=>'text_tagname',
								'label'=>'Tag Name',
								'rules'=>'required|trim'
							)
					);

				$this->form_validation->set_message($config,'%s Tidak Boleh Kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					redirect('tags/edit/'.$_POST['text_idtag']);
				}else{

					$execute = $this->Mdl_tags->update();

					if($execute){

						$this->session->set_flashdata('update_sukses',TRUE);
						redirect('tags/edit/'.$_POST['text_idtag']);
					}else{
						echo 'error';
					}
				}
			}else{
				redirect('panel');
			}
		}

		public function delete(){

			$this->Mdl_tags->delete($this->uri->segment(3));
			$this->session->set_flashdata('delete_sukses',TRUE);
			redirect('tags');
		}

		public function search(){

			if($this->session->userdata('login_user')){

				if(isset($_POST['btn_search'])){
					$user_data['search_data'] = $this->input->post('keyword');
					$this->session->set_userdata('sess_search',$user_data['search_data']);
				}else{
					$user_data['search_data'] = $this->sesion->userdata('sess_search');
				}
				$config['base_url'] = base_url().'tags/search/';
				$config['total_rows'] = $this->Mdl_tags->search_count($user_data['search_data']);
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
				$user_data['query'] = $this->Mdl_tags->search($config['per_page'],$this->uri->segment(3),$user_data['search_data']);

				$this->load->view('backend/header');
				$this->load->view('backend/tag/search',$user_data);
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}
	}