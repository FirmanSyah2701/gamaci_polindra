<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
    
    class Login extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('admin/m_login');
        }

        public function index(){         
            $this->load->view('v_login');
        }

        public function aksi_login(){
			$nim      = $this->input->post('nim');
            $password = $this->input->post('password');
            $where    = array(
                'nim'      => $nim,
                'password' => md5($password)  
            );

			$result = $this->m_login->getAkunMhs($nim, $password);
			if($result){
                foreach($result as $row){
                    $sess_data = array(
                        'nim'      => $row->nim,
                        'nama'     => $row->nama,
					    'LoggedIn' => TRUE
                    );
                    
					$this->session->set_userdata($sess_data);
                }
            }
            redirect('mahasiswa');
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect('login');
        }
    }
 ?>