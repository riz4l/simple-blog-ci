<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_user extends CI_Model{

		public function get_all($num,$offset){

			$this->db->where('id_users and user_is_trash="1"');
			$this->db->order_by('id_users','desc');
			$query = $this->db->get('tb_users',$num,$offset);
			return $query->result();

		}


		public function get_all_count(){

			$this->db->where('id_users and user_is_trash="1"');
			$this->db->order_by('id_users','desc');
			$query = $this->db->get('tb_users');
			return $query->num_rows();
		}


		public function insert(){

			$data = array(
					'nama'=>$_POST['text_nama'],
					'username'=>$_POST['text_username'],
					'password'=>md5($_POST['text_password']),
					'user_is_trash'=>$_POST['text_istrash']
				);

			return $this->db->insert('tb_users',$data);
		}

		public function update(){

			if($_POST['text_password']==""){
				$data = array(
					'nama'=>$_POST['text_nama'],
					'username'=>$_POST['text_username'],
					'user_is_trash'=>$_POST['text_istrash']
				);
			}else{
			$data = array(
					'nama'=>$_POST['text_nama'],
					'username'=>$_POST['text_username'],
					'password'=>md5($_POST['text_password']),
					'user_is_trash'=>$_POST['text_istrash']
				);
			}

			return $this->db->update('tb_users',$data,array('id_users'=>$_POST['text_idusers']));
		}

		public function delete($id_users){

			$config = array(
					'user_is_trash'=>'0'
				);

			return $this->db->update('tb_users',$config,array('id_users'=>$id_users));
		}


	}