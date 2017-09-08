<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_login extends CI_Model	{

		public function check_login($username,$password){

			$password_md5 = md5($password);
			$query = "select id_users from tb_users where username='$username' and password='$password_md5' and user_is_trash='1'";
			$result = $this->db->query($query,array($username,$password_md5));

			if($result->num_rows()==1){

				 return $result->row(0)->id_users;
			}else{
				return false;
			}
		}

		public function user_info($id_users){

			$query = $this->db->query("select * from tb_users where id_users='$id_users' and user_is_trash='1'");
			$data_query = $query->row_array();
			return  $data_query = array(
										'id_users'=>$data_query['id_users'],
										'username'=>$data_query['username'],
										'nama'=>$data_query['nama'],
										'last_login'=>$data_query['last_login']
				);
		}

		public function check_logout($id_users){

			$tanggal = date('y-m-d H:i:s');
			$this->db->query("update tb_users set last_login='$tanggal' where id_users=$id_users");

		}
	} 