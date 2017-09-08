<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_kategori extends CI_Model	{

		public function get_all($num, $offset)	{

			$this->db->select('*');
			$this->db->where('id_kategori and kategori_is_trash="1"');
			$this->db->order_by('id_kategori','desc');
			$query = $this->db->get('tb_kategori',$num, $offset);
			return $query->result();
		}

		public function get_all_count(){

			$this->db->where('id_kategori and kategori_is_trash="1"');
			$this->db->order_by('id_kategori','desc');
			$query = $this->db->get('tb_kategori');
			return $query->num_rows();
		}

		public function insert()	{

			$data = array(

					'kategori'=>$_POST['text_kategori'],
					'kategori_slug'=>str_replace(array(" ",
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
												"*"),
												"-", $_POST['text_kategori']),
					'kategori_status'=>$_POST['text_status'],
					'kategori_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->insert('tb_kategori',$data);
		}

		public function update()	{

			$data = array(

					'id_kategori'=>$_POST['text_idkategori'],
					'kategori'=>$_POST['text_kategori'],
					'kategori_slug'=>str_replace(array(" ",
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
												"*"),
												"-",
												$_POST['text_kategori']),
					'kategori_status'=>$_POST['text_status'],
					'kategori_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->update('tb_kategori',$data,array('id_kategori'=>$_POST['text_idkategori']));
		}

		public function delete($id_kategori){

			$data = array(

					'kategori_is_trash'=>0
				);

			return $this->db->update('tb_kategori',$data,array('id_kategori'=>$id_kategori));

		}

		public function search($num,$offset,$search_data)	{

			$this->db->select('*');
			$this->db->where('id_kategori and kategori_is_trash="1"');
			$this->db->order_by('id_kategori','desc');
			if(!empty($search_data)){
				$this->db->like('kategori',$search_data);
			}
			$query = $this->db->get('tb_kategori',$num, $offset);
			return $query->result();
		}

		public function search_count(){

			$this->db->where('id_kategori and kategori_is_trash="1"');
			$this->db->order_by('id_kategori','desc');
			if(!empty($search_data)){
				$this->db->like('kategori',$search_data);
			}
			$query = $this->db->get('tb_kategori');
			return $query->num_rows();
		}
	}