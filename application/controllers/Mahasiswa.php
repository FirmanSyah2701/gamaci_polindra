<?php if(! defined('BASEPATH')) exit('No direct script access allowed ');
    class Mahasiswa extends CI_Controller{  
        function __construct(){
			parent::__construct();
			$isLogin = $this->session->userdata('LoggedIn');
			if($isLogin){
				$this->load->model("admin/m_admin");
			}else{
				redirect('login');
			}
		}

		public function index(){
			$data['menu']      = 'Form';
			$data['title']     = 'Halaman Mahasiswa';	
			$data['mahasiswa'] = $this->m_admin->getAkunMhs();	
			$data['cont']      = 'mahasiswa/dashboard';
			$this->load->view('mahasiswa/template',$data);
		}

		public function daftar(){
			$data['menu']      = 'Form';
			$data['title']     = 'Halaman Daftar Calon Ketua';	
			$data['mahasiswa'] = $this->m_admin->getAkunMhs();	
			if($this->m_admin->getCandidate($this->session->userdata('nim'))->num_rows() > 0){
				$data['calon']     = $this->m_admin->getCandidate($this->session->userdata('nim'));
				$data['cont']  = 'mahasiswa/showDaftar';
			} else{
				$data['cont']  = 'mahasiswa/daftar';
			}
			
			$this->load->view('mahasiswa/template',$data);
		}

		public function isiDaftar(){
			$config = array(
				'upload_path'   => './assets/data_calon/',
				'allowed_types' => 'pdf',
				'max_size'      => 5000
				);
			$this->load->library('upload', $config);
			$this->upload->do_upload('file');
			$data = $this->upload->data();
			$nmfile = $data['file_name'];
			$data = array(
				'file'       => $nmfile,
                'nim'        => $_POST['nim'],
                'alasan'     => $_POST['alasan'],
                'visi_misi'  => $_POST['visi_misi']
            );
            $this->m_admin->add('tb_candidate', $data);
            $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
            redirect('mahasiswa/daftar');
		}
		
		public function logout(){
            $this->session->sess_destroy();
            redirect('mahasiswa/login');
        }
    }
?>