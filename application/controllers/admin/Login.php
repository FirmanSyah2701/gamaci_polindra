<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
				$this->load->model('admin/m_login');
				$this->load->model('admin/m_admin');		
		}

		public function index(){
			$data['title'] = 'Halaman Login Admin';		
			$this->load->view('admin/login',$data);
		}

		public function aksi_login(){
			$nim       = $this->input->post('nim');
			$password  = $this->input->post('password');
			$where     = array(
				'nim'      => $nim,
				'password' => md5($password)
			);
			$result = $this->m_login->getAkun($nim, $password);
			if($result){
				foreach($result as $row){
					$data_session = array(
						'id_admin' => $row->id_admin,
						'nim'      => $row->nim,
						'nama'     => $row->nama,
						'level'    => $row->level,
						'LoggedIn' => TRUE
					);
					$this->session->set_userdata($data_session);
				}
				redirect('admin/dashboard');
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('admin/login', 'refresh');
		}
	}
 ?>