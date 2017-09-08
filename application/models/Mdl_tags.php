<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_tags extends CI_Model{

		public function get_all($num,$offset){

			$this->db->where('id_artikel_tag and tag_is_trash="1"');
			$this->db->order_by('id_artikel_tag','desc');
			$query = $this->db->get('tb_artikel_tags',$num,$offset);
			return $query->result();
		}

		public function get_all_count(){

			$this->db->where('id_artikel_tag and tag_is_trash="1"');
			$this->db->order_by('id_artikel_tag','desc');
			$query = $this->db->get('tb_artikel_tags');
			return $query->num_rows();
		}

		public function insert()	{

			$data = array(

					'tag_name'=>$_POST['text_tagname'],
					'tag_status'=>$_POST['text_status'],
					'tag_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->insert('tb_artikel_tags',$data);
		}

		public function update() {


				$data = array(

					'id_artikel_tag'=>$_POST['text_idtag'],
					'tag_name'=>$_POST['text_tagname'],
					'tag_status'=>$_POST['text_status'],
					'tag_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->update('tb_artikel_tags',$data,array('id_artikel_tag'=>$_POST['text_idtag']));
		}

		public function delete($id_tag){

			$data = array(

				'tag_is_trash'=>0
			);
	
			return $this->db->update('tb_artikel_tags',$data,array('id_artikel_tag'=>$id_tag));
		}

		public function search($num,$offset,$search_data){

			$this->db->where('id_artikel_tag and tag_is_trash="1"');
			$this->db->order_by('id_artikel_tag','desc');
			if(!empty($search_data)){
				$this->db->like('tag_name',$search_data);
			}
			$query = $this->db->get('tb_artikel_tags',$num,$offset);
			return $query->result();
		}

		public function search_count($search_data){

			$this->db->where('id_artikel_tag and tag_is_trash="1"');
			$this->db->order_by('id_artikel_tag','desc');
			if(!empty($search_data)){
				$this->db->like('tag_name',$search_data);
			}
			$query = $this->db->get('tb_artikel_tags');
			return $query->num_rows();
		}
	}