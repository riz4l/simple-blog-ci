<?php
	defined('BASEPATH') or exit('no direct script access allowed');

	class Page_error extends CI_Controller{

		public function index(){

			$this->output->set_status_header('404');
			$this->load->view('frontend/error_page');
		}
	}
