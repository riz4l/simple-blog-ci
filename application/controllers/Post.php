<?php
defined('BASEPATH') or exit('no direct script access allowed');

	class Post extends CI_Controller	{

		public function __Construct()	{

			parent::__Construct();

			$this->load->model('Mdl_front');

		}

		public function index(){

			$this->detail();
		}

		public function detail(){

			$artikel_id = $this->uri->segment(3);
			$query = $this->db->join('tb_kategori','tb_artikel.id_kategori = tb_kategori.id_kategori');
			$query = $this->db->join('tb_users','tb_artikel.artikel_id_users = tb_users.id_users');
			$query = $this->db->get_where('tb_artikel',array('id_artikel'=>$artikel_id));
			$row = $query->row_array();

			$user_data['id_artikel'] = $row['id_artikel'];
			$user_data['artikel_judul'] = $row['artikel_judul'];
			$user_data['artikel_slug'] = $row['artikel_slug'];
			$user_data['artikel_konten'] = $row['artikel_konten'];
			$user_data['id_kategori'] = $row['id_kategori'];
			$user_data['kategori'] = $row['kategori'];
			$user_data['kategori_slug'] = $row['kategori_slug'];
			$user_data['artikel_keyword'] = $row['artikel_keyword'];
			$user_data['artikel_description'] = $row['artikel_description'];
			$user_data['artikel_image'] = $row['artikel_image'];
			$user_data['artikel_publishdate'] = $row['artikel_publishdate'];
			$user_data['artikel_id_users'] = $row['artikel_id_users'];
			$user_data['nama'] = $row['nama'];

			$this->Mdl_front->update_count_artikel($this->uri->segment(3));

			$user_data['query'] =  $this->Mdl_front->get_artikel_terkait($artikel_id);

			$this->load->view('frontend/header',$user_data);
			$this->load->view('frontend/detail',$user_data);
			$this->load->view('frontend/footer');

		}

		public function category()	{


			$kategori_id = $this->uri->segment(3);

			$query = $this->db->get_where('tb_kategori',array('id_kategori'=>$kategori_id));
			$row = $query->row_array();

			$user_data['id_kategori'] = $row['id_kategori'];
			$user_data['kategori'] = $row['kategori'];
			$user_data['kategori_slug'] = $row['kategori_slug'];

			// </close get kategori>

			$config['base_url'] = base_url().'post/category/';
			$config['total_rows'] = $this->Mdl_front->get_artikel_category_count();
			$config['per_page'] = 2;
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
			$config['uri_segment'] = 5;

			$this->pagination->initialize($config);
			$user_data['query_count'] = $this->Mdl_front->get_artikel_category_count();
			$user_data['offset'] = $this->uri->segment(5);
			$user_data['query'] = $this->Mdl_front->get_artikel_category($config['per_page'],$this->uri->segment(5));

			$this->load->view('frontend/header',$user_data);
			$this->load->view('frontend/category',$user_data);
			$this->load->view('frontend/footer');
		}


		public function search(){

			if(isset($_POST['btn_search'])){
				$user_data['search_data'] = $this->input->post('keyword');
				$this->session->set_userdata('sess_search',$user_data['search_data']);
			}else{
				$user_data['search_data'] = $this->session->userdata('sess_search');
			}
			$config['base_url'] = base_url().'post/search/';
			$config['total_rows'] = $this->Mdl_front->get_artikel_search_count($user_data['search_data']);
			$config['per_page'] = 3;
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
			$user_data['search_count'] = $this->Mdl_front->get_artikel_search_count($user_data['search_data']);
			$user_data['query'] = $this->Mdl_front->get_artikel_search($config['per_page'],$this->uri->segment(3),$user_data['search_data']);

			$this->load->view('frontend/header',$user_data);
			$this->load->view('frontend/search',$user_data);
			$this->load->view('frontend/footer');
		}

	}