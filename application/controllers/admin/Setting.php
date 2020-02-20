<?php if(! defined('BASEPATH')) exit('No direct script access allowed ');
    class Setting extends CI_Controller{
        function __construct(){
            parent::__construct();
			if(!$this->session->userdata('LoggedIn')){
				redirect('admin/login');			
			}else{
				$this->load->model("admin/m_admin");
				$this->load->model("admin/m_mhs");
				$this->load->model("admin/m_pengurus");
				$this->load->model("admin/m_jabatan");
			}
        }

        public function index(){
            
        }

        public function akunAdmin(){
			$data['menu'] = 'Setting';
			$data['akun'] = $this->m_admin->getAll();
			$data['title'] = 'Admin - Setting';	
			$data['cont'] = 'admin/akun/akun';
			$this->load->view('admin/template',$data);
		}

		public function addAkunAdmin(){
			$admin = $this->m_admin;
			$data = array(				
				'id_admin' 	=> $this->input->post('id_admin'),
				'nim'      		=>$this->input->post('nim'),
				'password' 	=> $this->input->post(md5('password'))
			);
			$admin->save($data);
			$this->session->set_flashdata('pesan','Data Berhasil ditambahkan');
			redirect('admin/setting/akun');
		}

		public function editAkunAdmin(){	
			$admin = $this->m_admin;
				$data = array(				
					'nim'      		=>$this->input->post('nim'),
					'password' 	=> $this->input->post(md5('password'))
				);
			$id['id_admin'] = $this->input->post('id_admin');
			$admin->edit($id, $data);		
			$this->session->set_flashdata('pesan','Data berhasil diperbaharui');
			redirect('admin/setting/akun');
		}

		public function deleteAkunAdmin($id){
			$admin = $this->m_admin;
			$row = $pengurus->getById($id);
            if($row){
				$admin->delete($id);
				$this->session->set_flashdata('pesan','Data berhasil Hapus');
			redirect('admin/setting/akun');
			}
		}

		public function akunUser(){
			$data['menu']      = 'Setting';
			$data['user']      = $this->m_admin->getAkunMhs();
			$data['mahasiswa'] = $this->m_admin->get('tb_mhs');
			$data['title']     = 'Admin - Setting';	
			$data['cont']      = 'admin/user/user';
			$this->load->view('admin/template',$data);
		}

		public function addAkunUser(){
			$data = array(			
				'id_akun_mhs' => $_POST['id_akun_mhs'],
				'nim'         => $_POST['nim'],
				'password'    => md5($_POST['password'])
				);
			$this->m_admin->add('tb_akun_mhs',$data);
			$this->session->set_flashdata('pesan','Data Berhasil ditambahkan');
			redirect('admin/setting/user');
		}

		public function editAkunUser(){
			$data = array(
			'nim' 	    => $this->input->post('nim'),
			'password'	=> $this->input->post('password')
			);
			$id['id_akun_mhs'] = $_POST['id_akun_mhs'];
			$this->m_admin->edit($id,'tb_akun_mhs',$data);
			$this->session->set_flashdata('pesan','Data Berhasil diubah');
			redirect('admin/setting/user');
		}

		public function deleteAkunUser($id){
			$this->db->delete('tb_akun_mhs',array('id_akun_mhs'=> $id));
			$this->session->set_flashdata('pesan','Data Berhasil dihapus');
			redirect('admin/setting/user');	
		}

		public function sosmed(){
			$data['sosmed'] = $this->m_admin->get('tb_sosmed');
			$data['menu'] 	= 'Setting';
			$data['title']  = 'Admin - Setting';
			$data['cont']   = 'admin/sosmed/sosmed';
			$this->load->view('admin/template', $data);
		}

		public function addSosmed(){
			$data = array(
				'id_sosmed'   => $_POST['id_sosmed'],
				'nama_sosmed' => $_POST['nama_sosmed'],
				'link'        => $_POST['link']
			);
			$this->m_admin->add($id_sosmed, 'tb_sosmed', $data);
			$this->session->set_flashdata('pesan','Data berhasil diperbaharui');
			redirect('admin/setting/sosmed');
		}

		public function sosmedDb(){
			$data = array(
				'nama_sosmed' => $_POST['nama_sosmed'],
				'link'        => $_POST['link']
			);
			$id_sosmed['id_sosmed'] = $_POST['id_sosmed'];
			$this->m_admin->edit($id_sosmed, 'tb_sosmed', $data);
			$this->session->set_flashdata('pesan','Data berhasil diperbaharui');
			redirect('admin/setting/sosmed');
		}
    }
?>
