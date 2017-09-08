<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Mdl_front extends CI_Model{

		public function get_artikel_home($num,$offset){

			$date = date('Y-m-d H:i:s');
			$this->db->where("id_artikel and artikel_is_trash='1' and artikel_status='1' and artikel_publishdate < '".$date."'");
			$this->db->order_by("artikel_publishdate","desc");
			$query = $this->db->get("tb_artikel",$num,$offset);
			return $query->result();

		}

		public function get_artikel_home_count()	{

			$this->db->where("id_artikel and artikel_is_trash='1' and artikel_status='1'");
			$this->db->order_by("artikel_publishdate","desc");
			$query = $this->db->get("tb_artikel");
			return $query->num_rows();	
		}

		public function get_artikel_category($num,$offset){

			$date = date('Y-m-d H:i:s');

			$this->db->where("id_artikel and artikel_is_trash='1' and artikel_status='1' and id_kategori='".$this->uri->segment(3)."' and artikel_publishdate < '".$date."'");
			$this->db->order_by("artikel_publishdate","desc");
			$query = $this->db->get("tb_artikel",$num,$offset);
			return $query->result();
		}

		public function get_artikel_category_count(){

			$this->db->where("id_artikel and artikel_is_trash='1' and artikel_status='1' and id_kategori='".$this->uri->segment(3)."'");
			$this->db->order_by("artikel_publishdate","desc");
			$query = $this->db->get("tb_artikel");
			return $query->num_rows();
		}

		public function get_artikel_featured(){

			$this->db->where("id_artikel and artikel_status='1' and artikel_is_trash='1' and artikel_is_featured='1'");
			$this->db->order_by('artikel_publishdate','desc');
			$query = $this->db->get('tb_artikel');
			return $query->result();
		}

		public function get_category_menu()	{

			$this->db->where('id_kategori and kategori_status="1" and kategori_is_trash="1"');
			$this->db->order_by("id_kategori",'asc');
			$query = $this->db->get('tb_kategori');
			return $query->result();
		}

		public function get_iklan_top(){

			$this->db->where("id_iklan and iklan_is_trash='1' and tb_iklan.id_posisi='1'");
			$this->db->join('tb_iklan_posisi','tb_iklan.id_posisi = tb_iklan_posisi.id_posisi');
			$this->db->order_by('iklan_publish','desc');
			$this->db->limit(1);
			$query = $this->db->get('tb_iklan');
			return $query->result();
		}

		public function get_iklan_top_count(){

			$this->db->where("id_iklan and iklan_is_trash='1' and tb_iklan.id_posisi='1'");
			$this->db->join('tb_iklan_posisi','tb_iklan.id_posisi = tb_iklan_posisi.id_posisi');
			$this->db->order_by('iklan_publish','desc');
			$this->db->limit(1);
			$query = $this->db->get('tb_iklan');
			return $query->num_rows();
		}

		public function get_iklan_bottom(){

			$this->db->where("id_iklan and iklan_is_trash='1' and tb_iklan.id_posisi='2'");
			$this->db->join('tb_iklan_posisi','tb_iklan.id_posisi = tb_iklan_posisi.id_posisi');
			$this->db->order_by('iklan_publish','desc');
			$this->db->limit(1);
			$query = $this->db->get('tb_iklan');
			return $query->result();
		}

		public function get_iklan_bottom_count(){

			$this->db->where("id_iklan and iklan_is_trash='1' and tb_iklan.id_posisi='2'");
			$this->db->join('tb_iklan_posisi','tb_iklan.id_posisi = tb_iklan_posisi.id_posisi');
			$this->db->order_by('iklan_publish','desc');
			$this->db->limit(1);
			$query = $this->db->get('tb_iklan');
			return $query->num_rows();
		}

		public function get_page_menu(){
			
			$this->db->where("id_page and page_status='1' and page_is_trash='1'");
			$this->db->order_by('id_page','asc');
			$query = $this->db->get('tb_page');
			return $query->result();
		}

		public function get_page($page_slug)	{

			$this->db->where("id_page and page_status='1' and page_is_trash='1' and page_slug='$page_slug'");
			$this->db->order_by('id_page','asc');
			$query = $this->db->get('tb_page');
			return $query->result();
		}


		public function get_artikel_search($num,$offset,$search_data){

			$this->db->where("id_artikel and artikel_is_trash='1' and artikel_status='1'");
			$this->db->order_by("artikel_publishdate","desc");
			if(!empty($search_data)){
				$this->db->like('artikel_judul',$search_data);
			}
			$query = $this->db->get("tb_artikel",$num,$offset);
			return $query->result();

		}

		public function get_artikel_search_count($search_data)	{

			$this->db->where("id_artikel and artikel_is_trash='1' and artikel_status='1'");
			$this->db->order_by("artikel_publishdate","desc");
			if(!empty($search_data)){
				$this->db->like('artikel_judul',$search_data);
			}
			$query = $this->db->get("tb_artikel");
			return $query->num_rows();	
		}

		public function get_slider(){
			$this->db->select('*');
			$this->db->where("id_artikel and artikel_is_trash='1' and artikel_status='1'");
			$this->db->limit(4);
			$query = $this->db->get("tb_artikel");
     		return $query->result_array();
		}


		public function update_count_artikel($id_artikel){

			$this->db->set('artikel_count','artikel_count+1',False);
			$this->db->where('id_artikel',$id_artikel);
			$this->db->update('tb_artikel');
		}

		public function get_artikel_populer(){

			$date = date('Y-m-d : H:i:s');
			$this->db->select('*');	
			$this->db->where("id_artikel and artikel_is_trash='1' and artikel_status='1'");
			$this->db->order_by("artikel_count","desc");
			$this->db->limit(7);
			$query = $this->db->get('tb_artikel');
			return $query->result();
		}

		public function get_artikel_terkait($id){

			$query = $this->db->query("select distinct 
												tb_artikel.id_artikel, 
												tb_artikel.artikel_image, 
												tb_artikel.artikel_slug,
												tb_artikel.artikel_judul 
				from tb_tags inner join tb_artikel on tb_tags.id_artikel = tb_artikel.id_artikel
				where tb_tags.id_artikel_tags in ((select tb_artikel_tags.id_artikel_tag from tb_tags left join tb_artikel_tags on 
				tb_tags.id_artikel_tags = tb_artikel_tags.id_artikel_tag where id_artikel='".$id."'))
				and tb_artikel.artikel_status='1' and tb_artikel.artikel_is_trash='1'
			");
			return $query->result();
		}


	}