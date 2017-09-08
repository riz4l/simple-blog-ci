<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_imgupload extends CI_Model	{	

		public function get_all($num,$offset)	{

			$this->db->where('id_artikel_image and image_is_trash="1"');
			$this->db->order_by('id_artikel_image','desc');
			$query = $this->db->get('tb_artikel_image',$num,$offset);
			return $query->result();
		}

		public function get_all_count()	{

			$this->db->where('id_artikel_image and image_is_trash="1"');
			$this->db->order_by('id_artikel_image','desc');
			$query = $this->db->get('tb_artikel_image');
			return $query->num_rows();
		}

		public function insert($image_file)	{

			if($image_file==NULL){
				$image_upload = 'no_image.png';
			}else{
				$image_upload = $image_file;
			}

			$data = array(
					'image'=>$image_upload,
					'image_is_trash'=>1,
					'image_status'=>$_POST['text_status']
				);

			return $this->db->insert('tb_artikel_image',$data);
		}

		public function update($image_file){

			$query = $this->db->get('tb_artikel_image');
			$row = $query->row_array();

			if($image_file==NULL){
				$image_upload = $row['image'];
			}else{
				$image_upload = $image_file;
			}

			$data = array(
					'id_artikel_image'=>$_POST['text_idimage'],
					'image'=>$image_upload,
					'image_is_trash'=>$_POST['text_istrash'],
					'image_status'=>$_POST['text_status']
				);

			return $this->db->update('tb_artikel_image',$data,array('id_artikel_image'=>$_POST['text_idimage']));
		}

		public function delete($id_image){

			$data = array(

					'image_is_trash'=>0
				);
			return $this->db->update('tb_artikel_image',$data,array('id_artikel_image'=>$id_image));
		}


		public function search($num,$offset,$search_data)	{

			$this->db->where('id_artikel_image and image_is_trash="1"');
			$this->db->order_by('id_artikel_image','desc');
			if(!empty($search_data)){
				$this->db->like('image',$search_data);
			}
			$query = $this->db->get('tb_artikel_image',$num,$offset);
			return $query->result();
		}

		public function search_count($search_data)	{

			$this->db->where('id_artikel_image and image_is_trash="1"');
			$this->db->order_by('id_artikel_image','desc');
			if(!empty($search_data)){
				$this->db->like('image',$search_data);
			}
			$query = $this->db->get('tb_artikel_image');
			return $query->num_rows();
		}
	}