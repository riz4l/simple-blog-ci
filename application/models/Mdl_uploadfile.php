<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_uploadfile extends CI_Model{

		public function upload($image)	{

			$config['upload_path'] = './upload/artikel/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1600';
			$config['max_height'] = '1200';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$this->upload->initialize($config);

			if(! $this->upload->do_upload($image)){

				return $error = array('error' => $this->upload->display_errors());

			}else{

				return $data = array('upload_data' => $this->upload->data());
			}
		}

		public function upload_iklan($image){

			$config['upload_path'] = './upload/iklan/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1600';
			$config['max_height'] = '1200';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$this->upload->initialize($config);	

			if(!$this->upload->do_upload($image)){

				return $error = array('error'=>$this->upload->display_errors());
		
			}else{

				return $data = array('upload_data' =>$this->upload->data());
			}
		}

		public function upload_image($image){

			$config['upload_path'] = './upload/img_upload/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1600';
			$config['max_height'] = '1200';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$this->upload->initialize($config);

			if(!$this->upload->do_upload($image)){

				return $error = array('error'=>$this->upload->display_errors());
			}else{
				return $data = array('upload_data'=>$this->upload->data());
			}
		}
	}