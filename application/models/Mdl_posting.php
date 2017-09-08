<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_posting extends CI_Model{


		public function get_all($num, $offset){

			$this->db->select('*');
			$this->db->where('id_artikel and artikel_is_trash="1"');
			$this->db->order_by('artikel_publishdate','desc');
			$this->db->join('tb_kategori','tb_artikel.id_kategori=tb_kategori.id_kategori');
			$query = $this->db->get('tb_artikel',$num, $offset);
			return $query->result();
		}

		public function get_all_count(){

			$this->db->select('*');
			$this->db->where('id_artikel and artikel_is_trash="1"');
			$this->db->order_by('artikel_publishdate','desc');
			$this->db->join('tb_kategori','tb_artikel.id_kategori=tb_kategori.id_kategori');
			$query = $this->db->get('tb_artikel');
			return $query->num_rows();
		}

		public function get_kategori(){

			$this->db->select('*');
			$this->db->where('id_kategori and kategori_is_trash="1" and kategori_status="1"');
			$this->db->order_by('id_kategori','asc');
			$query = $this->db->get('tb_kategori');
			return $query->result();
		}

		public function get_tag(){

			$this->db->select('*');
			$this->db->where('id_artikel_tag and tag_is_trash="1"');
			$this->db->order_by('id_artikel_tag','desc');
			$query = $this->db->get('tb_artikel_tags');
			return $query->result();
		}

		public function insert($filename){

			if($filename==NULL){

				$image_artikel = 'no_image.png';
			}else{
				$image_artikel = $filename;
			}

			$data = array(

					'artikel_judul'=>$_POST['text_title'],
					'artikel_slug'=>str_replace(array(" ",
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
												"*"), '-', $_POST['text_title']),
					'artikel_konten'=>$_POST['text_konten'],
					'id_kategori'=>$_POST['text_kategori'],
					'artikel_keyword'=>$_POST['text_keyword'],
					'artikel_description'=>$_POST['text_description'],
					'artikel_image'=>$image_artikel,
					'artikel_publishdate'=>$_POST['text_date'],
					'artikel_status'=>$_POST['text_status'],
					'artikel_id_users'=>$_POST['text_idusers'],
					'artikel_is_featured'=>$_POST['text_featured'],
					'artikel_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->insert('tb_artikel',$data);
		}

		public function update($filename){

			$this->db->select('*');
			$this->db->where('id_artikel',$_POST['text_idartikel']);
			$query = $this->db->get('tb_artikel');
			$query->result();
			$row = $query->row_array();

			if($filename==NULL){
				$image_artikel = $row['artikel_image'];
			}else{
				$image_artikel = $filename;
			}
			$data = array(

					'artikel_judul'=>$_POST['text_title'],
					'artikel_slug'=>str_replace(array(" ",
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
												"*"), '-', $_POST['text_title']),
					'artikel_konten'=>$_POST['text_konten'],
					'id_kategori'=>$_POST['text_kategori'],
					'artikel_keyword'=>$_POST['text_keyword'],
					'artikel_description'=>$_POST['text_description'],
					'artikel_image'=>$image_artikel,
					'artikel_publishdate'=>$_POST['text_date'],
					'artikel_status'=>$_POST['text_status'],
					'artikel_id_users'=>$_POST['text_idusers'],
					'artikel_is_featured'=>$_POST['text_featured'],
					'artikel_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->update('tb_artikel',$data,array('id_artikel'=>$_POST['text_idartikel']));
		}

		public function delete($id_artikel){

			$data = array(

					'artikel_is_trash'=>0
				);

			return $this->db->update('tb_artikel',$data,array('id_artikel'=>$id_artikel));
		}


		public function search($num, $offset, $search_data)	{

			$this->db->select('*');
			$this->db->where('id_artikel and artikel_is_trash="1"');
			$this->db->order_by('artikel_publishdate','desc');
			$this->db->join('tb_kategori','tb_artikel.id_kategori=tb_kategori.id_kategori');
			if(!empty($search_data)){
				$this->db->like('artikel_judul',$search_data);
			}
			$query = $this->db->get('tb_artikel',$num, $offset);
			return $query->result();	
		}

		public function search_count($search_data){

			$this->db->select('*');
			$this->db->where('id_artikel and artikel_is_trash="1"');
			$this->db->order_by('artikel_publishdate','desc');
			$this->db->join('tb_kategori','tb_artikel.id_kategori=tb_kategori.id_kategori');
			if(!empty($search_data)){
				$this->db->like('artikel_judul',$search_data);
			}
			$query = $this->db->get('tb_artikel');
			return $query->num_rows();	
		}

		public function get_artikel_like($artikeljudul){

			$query = $this->db->query("select * from tb_artikel where artikel_is_trash='1' and artikel_judul like '%".$artikeljudul."%'");
			return $query->result();
		}

		public function insert_tags($id_artikel,$id_artikel_tags){

			$data = array(
					'id_artikel_tags'=>$id_artikel_tags,
					'id_artikel'=>$id_artikel,
					'tags_is_trash'=>1

				);

			return $this->db->insert('tb_tags',$data);
		}

	
	}