<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_iklan extends CI_Model{

		public function get_all($num,$offset)	{

			$this->db->where('id_iklan and iklan_is_trash="1"');
			$this->db->join('tb_iklan_posisi','tb_iklan.id_posisi = tb_iklan_posisi.id_posisi');
			$this->db->order_by('iklan_publish','desc');
			$query = $this->db->get('tb_iklan',$num,$offset);
			return $query->result();
		}

		public function get_all_count()	{

			$this->db->where('id_iklan and iklan_is_trash="1"');
			$this->db->order_by('iklan_publish','desc');
			$query = $this->db->get('tb_iklan');
			return $query->num_rows();
		}

		public function get_posisi(){

			$this->db->where('id_posisi and posisi_is_trash="1"');
			$this->db->order_by('id_posisi','asc');
			$query = $this->db->get('tb_iklan_posisi');
			return $query->result();
		}

		public function insert($filename){

			if($filename==NULL){
				$image_iklan = "no_image.png";
			}else{
				$image_iklan = $filename;
			}
			$data = array(
					'iklan_title'=>$_POST['text_title'],
					'id_posisi'=>$_POST['text_posisi'],
					'image'=>$image_iklan,
					'url'=>$_POST['text_url'],
					'iklan_publish'=>$_POST['text_publish'],
					'iklan_endpublish'=>$_POST['text_endpublish'],
					'iklan_status'=>$_POST['text_status'],
					'iklan_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->insert('tb_iklan',$data);
		}

		public function update($filename){

			$this->db->where('id_iklan',$_POST['text_idiklan']);
			$query = $this->db->get('tb_iklan');
			$row = $query->row_array();

			if($filename==NULL){
				$image_iklan = $row['image'];
			}else{
				$image_iklan = $filename;
			}
			$data = array(
					'id_iklan'=>$_POST['text_idiklan'],
					'iklan_title'=>$_POST['text_title'],
					'id_posisi'=>$_POST['text_posisi'],
					'image'=>$image_iklan,
					'url'=>$_POST['text_url'],
					'iklan_publish'=>$_POST['text_publish'],
					'iklan_endpublish'=>$_POST['text_endpublish'],
					'iklan_status'=>$_POST['text_status'],
					'iklan_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->update('tb_iklan',$data,array('id_iklan'=>$_POST['text_idiklan']));
		}

		public function delete($id_iklan){

			$config = array(
					'iklan_is_trash'=>0
				);

			return $this->db->update('tb_iklan',$config,array('id_iklan'=>$id_iklan));
		}

		public function search($num,$offset,$search_data){

			$this->db->where('id_iklan and iklan_is_trash="1"');
			$this->db->order_by('iklan_publish','desc');
			if(!empty($search_data)){
				$this->db->like('iklan_title',$search_data);
			}
			$query = $this->db->get('tb_iklan',$num,$offset);
			return $query->result();
		}

		public function search_count($search_dat){

			$this->db->where('id_iklan and iklan_is_trash="1"');
			$this->db->order_by('iklan_publish','desc');
			if(!empty($search_data)){
				$this->db->like('iklan_title',$search_data);
			}
			$query = $this->db->get('tb_iklan');
			return $query->num_rows();
		}
	}