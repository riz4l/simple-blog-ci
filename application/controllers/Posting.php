<?php
	defined('BASEPATH') or exit ('no direct script access allowed');

	class Posting extends CI_Controller{

		public function __Construct(){

			parent::__Construct();

				$this->load->model('Mdl_posting');
				$this->load->model('Mdl_uploadfile');
		}

		public function index()	{

			$this->show();
		}

		public function show(){

			if($this->session->userdata('login_user')){

			$user_data['kategori'] = $this->Mdl_posting->get_kategori();
			$user_data['tag'] = $this->Mdl_posting->get_tag();

			$this->load->view('backend/header');
			$this->load->view('backend/posting/add',$user_data);
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
								'label'=>'Title',
								'rules'=>'required'
							),
						array(
								'field'=>'text_konten',
								'label'=>'Konten',
								'rules'=>'required'
							),
						array(
								'field'=>'text_kategori',
								'label'=>'Kategori',
								'rules'=>'required'
							)
					);

				$this->form_validation->set_message($config,'%s Tidak Boleh Kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					redirect('posting');
				}else{

					$data_image = $this->Mdl_uploadfile->upload('img_artikel');

					$execute = $this->Mdl_posting->insert($data_image['upload_data']['file_name']);

					$get_artikel = $this->Mdl_posting->get_artikel_like($_POST['text_title']);

					foreach ($_POST['text_tags'] as $tags) {
						
						$this->Mdl_posting->insert_tags($get_artikel[0]->id_artikel,$tags);
					}

					if($execute){

						$this->session->set_flashdata('tambah_sukses',TRUE);
						redirect('posting');
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

				$artikel_id = $this->uri->segment(3);

				$query = $this->db->get_where('tb_artikel',array('id_artikel'=>$artikel_id));
				$row = $query->row_array();

				$user_data['id_artikel'] = $row['id_artikel'];
				$user_data['artikel_judul'] = $row['artikel_judul'];
				$user_data['artikel_konten'] = $row['artikel_konten'];
				$user_data['artikel_image'] = $row['artikel_image'];
				$user_data['id_kategori'] = $row['id_kategori'];
				$user_data['kategori'] = $this->Mdl_posting->get_kategori();
				$user_data['artikel_keyword'] = $row['artikel_keyword'];
				$user_data['artikel_description'] = $row['artikel_description'];
				$user_data['artikel_publishdate'] = $row['artikel_publishdate'];
				$user_data['artikel_status'] = $row['artikel_status'];
				$user_data['artikel_id_users'] = $row['artikel_id_users'];
				$user_data['artikel_is_featured'] = $row['artikel_is_featured'];
				$user_data['artikel_is_trash'] = $row['artikel_is_trash'];

				$this->load->view('backend/header');
				$this->load->view('backend/posting/edit',$user_data);
				$this->load->view('backend/footer');

			}else{
				redirect('panel');
			}
		}

		public function edit_function(){

			if($this->session->userdata('login_user')){

				$config = array(

						array(
								'field'=>'text_title',
								'label'=>'Title',
								'rules'=>'required'
							),
						array(
								'field'=>'text_konten',
								'label'=>'Konten',
								'rules'=>'required'
							),
						array(
								'field'=>'text_kategori',
								'label'=>'Kategori',
								'rules'=>'required'
							)
					);

				$this->form_validation->set_message($config,'%s Tidak boleh kosong');
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){

					$this->session->set_flashdata('warning',TRUE);
					redirect('posting/edit/'.$_POST['text_idartikel']);
				
				}else{

					$data_image = $this->Mdl_uploadfile->upload('img_artikel');
					$execute = $this->Mdl_posting->update($data_image['upload_data']['file_name']);

					$id_artikel=$_POST['text_idartikel'];
					$this->db->query("delete from tb_tags where id_artikel = '$id_artikel'");
					foreach ($_POST['text_tags'] as $tags) {
						
						$this->Mdl_posting->insert_tags($id_artikel,$tags);
					}

					if($execute){

						$this->session->set_flashdata('update_sukses',TRUE);
						redirect('posting/edit/'.$_POST['text_idartikel']);
					}else{
						echo 'error';
					}
				}

			}else{
				redirect('panel');
			}
		}
		
	}