<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Usermanagement extends CI_Controller{

		public function __Construct(){

			parent::__Construct();

				$this->load->model('Mdl_user');
		}

		public function index(){

			$this->show();
		}

		public function show(){

			if($this->session->userdata('login_user')){

			$config['base_url'] = base_url().'usermanagement/show/';
			$config['total_rows'] = $this->Mdl_user->get_all_count();
			$config['per_page'] = '7';
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
			$config['uri_segment'] = $this->uri->segment(3);
			$this->pagination->initialize($config);
			$user_data['offset'] = $this->uri->segment(3);
			$user_data['query'] = $this->Mdl_user->get_all($config['per_page'],$this->uri->segment(3));

			$this->load->view('backend/header');
			$this->load->view('backend/user/data',$user_data);
			$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}

		public function add(){

			if($this->session->userdata('login_user')){

				$this->load->view('backend/header');
				$this->load->view('backend/user/add');
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}
		}

		public function add_function(){

			if($this->session->userdata('login_user')){

				$config = array(
							array(
									'field'=>'text_username',
									'label'=>'Username',
									'rules'=>'required'
								),
							array(
									'field'=>'text_password',
									'label'=>'Password',
									'rules'=>'required'
								)
					);

				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->add();
				}else{

					$execute = $this->Mdl_user->insert();

					if($execute){
						$this->session->set_flashdata('tambah_sukses',TRUE);
						redirect('usermanagement/add');
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

				$id_user = $this->uri->segment(3);
				$query = $this->db->get_where('tb_users',array('id_users'=>$id_user));
				$row = $query->row_array();

				$user_data['id_users'] = $row['id_users'];
				$user_data['username'] = $row['username'];
				$user_data['nama'] = $row['nama'];
				$user_data['password'] = $row['password'];
				$user_data['user_is_trash'] = $row['user_is_trash'];

				$this->load->view('backend/header');
				$this->load->view('backend/user/edit',$user_data);
				$this->load->view('backend/footer');
			}else{
				redirect('panel');
			}
		}

		public function edit_function(){

			if($this->session->userdata('login_user')){

				$config = array(
						array(
								'field'=>'text_username',
								'label'=>'Username',
								'rules'=>'required'
							)
					);

				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					redirect('usermanagement/edit/'.$_POST['text_idusers']);
				}else{

					$execute = $this->Mdl_user->update();
					if($execute){
						$this->session->set_flashdata('update_sukses',TRUE);
						redirect('usermanagement/edit/'.$_POST['text_idusers']);
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

			$this->Mdl_user->delete($this->uri->segment(3));
			$this->session->set_flashdata('delete_sukses',TRUE);
			redirect('usermanagement/show');

			}else{
				redirect('panel');
			}
		}

	}
