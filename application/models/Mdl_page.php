<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_page extends CI_Model{

		public function get_all($num, $offset){

			$this->db->where('id_page and page_is_trash="1"');
			$this->db->order_by('id_page','desc');
			$query = $this->db->get('tb_page',$num, $offset);
			return $query->result();
		}

		public function get_all_count(){

			$this->db->where('id_page and page_is_trash="1"');
			$this->db->order_by('id_page','desc');
			$query = $this->db->get('tb_page');
			return $query->num_rows();
		}

		public function insert(){

			$data = array(
					'page_judul'=>$_POST['text_judul'],
					'page_konten'=>$_POST['text_konten'],
					'page_slug'=>str_replace(array(" ",
												"\'", 
												"\"", 
												"&quot;", 
												";",
												",", 
												"-", 
												"!",
												"#",
												"(",
												")",
												"&",
												"*"), '-', $_POST['text_judul']),
					'page_keyword'=>$_POST['text_keyword'],
					'page_description'=>$_POST['text_description'],
					'page_status'=>$_POST['text_status'],
					'page_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->insert('tb_page',$data);
		}

		public function update(){

			$data = array(
					'id_page'=>$_POST['text_idpage'],
					'page_judul'=>$_POST['text_judul'],
					'page_konten'=>$_POST['text_konten'],
					'page_slug'=>str_replace(array(" ",
												"\'", 
												"\"", 
												"&quot;", 
												";",
												",", 
												"-", 
												"!",
												"#",
												"(",
												")",
												"&",
												"*"), '-', $_POST['text_judul']),
					'page_keyword'=>$_POST['text_keyword'],
					'page_description'=>$_POST['text_description'],
					'page_status'=>$_POST['text_status'],
					'page_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->update('tb_page',$data,array('id_page'=>$_POST['text_idpage']));
		}

		public function delete($id_page){

			$config = array(

					'page_is_trash'=>0
				);

			return $this->db->update('tb_page',$config,array('id_page'=>$id_page));
		}

		public function search($num,$offset,$search_data){

			$this->db->where('id_page and page_is_trash="1"');
			$this->db->order_by('id_page','desc');
			if(!empty($search_data)){
				$this->db->like('page_judul',$search_data);
			}
			$query = $this->db->get('tb_page',$num, $offset,$search_data);
			return $query->result();
		}

		public function search_count($search_data){

			$this->db->where('id_page and page_is_trash="1"');
			$this->db->order_by('id_page','desc');
			if(!empty($search_data)){
				$this->db->like('page_judul',$search_data);
			}
			$query = $this->db->get('tb_page');
			return $query->num_rows();	
		}
	}