<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class Dashboard extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$isLogin = $this->session->userdata('LoggedIn');
			if($isLogin){
				$this->load->model("admin/m_admin");			
			} else {
				redirect('admin/login','refresh');
			}
		}

		public function index(){
			$data['j_pengurus']  = $this->db->from("tb_pengurus")->get()->num_rows();
			$data['j_mahasiswa'] = $this->db->from("tb_mhs")->get()->num_rows();
			$data['j_berita']    = $this->db->from("tb_berita")->get()->num_rows();
			$data['j_gallery']   = $this->db->from("tb_gallery")->get()->num_rows();
			$data['berita']      = $this->m_admin->get_data('id_berita','tb_berita');
			$data['menu'] 	     = 'Dashboard';
			$data['title']       = 'Admin - Dashboard';	
			$data['cont']        = 'admin/dashboard';
			$this->load->view('admin/template',$data);
		}
		
	}
 ?>