<?php if(! defined('BASEPATH')) exit('No direct script access allowed ');
    class Manage extends CI_Controller{
        function __construct(){
            parent::__construct();
            if(!$this->session->userdata('LoggedIn')){
				redirect('admin/login');			
            }else{
                $this->load->library('form_validation');
                $this->load->model("admin/m_admin");
                $this->load->model("admin/m_mahasiswa");
                $this->load->model("admin/m_pengurus");
                $this->load->model("admin/m_proker");
                $this->load->model("admin/m_candidate");
                $this->load->model('admin/m_jabatan');
            }
        }

        //manage pengurus

        //manage mahasiswa

        public function mahasiswa(){
            $data['menu']      = 'Manage';
            $data['mahasiswa'] = $this->m_mahasiswa->getAll();
            $data['title']     = 'Admin - Manage';	
			$data['cont']      = 'admin/mahasiswa/mahasiswa';
			$this->load->view('admin/template',$data);
        }

        public function addMahasiswa(){
            $mhs  = $this->m_mahasiswa;
            $data = array(
                'nim'      => $this->input->post('nim'),
                'nama'     => $this->input->post('nama'),
                'jurusan'  => $this->input->post('jurusan'),
                'kelas'    => $this->input->post('kelas'),
                'alamat'   => $this->input->post('alamat'),
                'angkatan' => $this->input->post('angkatan')
            );
            $mhs->save($data); 
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
            redirect('admin/manage/mahasiswa');
        }

        public function editMahasiswa($nim){
            $mhs = $this->m_mahasiswa;
                $data = array(
                    'nama'     => $this->input->post('nama'),
                    'jurusan'  => $this->input->post('jurusan'),
                    'kelas'    => $this->input->post('kelas'),
                    'alamat'   => $this->input->post('alamat'),
                    'angkatan' => $this->input->post('angkatan')
                );
            $id['nim'] = $this->input->post('nim');
            $mhs->update($id, $data); 
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('admin/manage/mahasiswa');
        }

        public function deleteMahasiswa($id){
            $mhs = $this->m_mahasiswa;
            $row = $mhs->getById($id);
            if($row){
                $mhs->delete($id);
                $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
                redirect('admin/manage/mahasiswa');
            }
        }

        public function pengurus(){
            $data['menu']     = 'Manage';
            $data['pengurus'] = $this->m_pengurus->getAll();
            $data['title']    = 'Admin - Manage';	
			$data['cont']     = 'admin/pengurus/pengurus';
			$this->load->view('admin/template',$data);
        }

        public function addPengurus(){
            $pengurus  = $this->m_pengurus;
            $data = array(
                'id_pengurus'   => $this->input->post('id_pengurus'),
                'nim'           => $this->input->post('nim'),
                'kd_jabatan'    => $this->input->post('kd_jabatan')
            );
            $pengurus->save($data); 
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
            redirect('admin/manage/pengurus');
        }

        public function editPengurus($id_pengurus){
            $pengurus = $this->m_pengurus;
            $data['kd_jabatan'] = $this->input->post('kd_jabatan');
            $id['id_pengurus']  = $this->input->post('id_pengurus');
            $mhs->update($id, $data); 
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('admin/manage/pengurus');
        }

        public function deletePengurus($id){
            $pengurus = $this->m_pengurus;
            $row = $pengurus->getById($id);
            if($row){
                $pengurus->delete($id);
                $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
                redirect('admin/manage/pengurus');
            }
        }
        //manage proker
        public function proker(){
            $data['menu']     = 'Manage';
            $data['proker'] = $this->m_proker->getAll();
            $data['title']    = 'Admin - Manage';	
			$data['cont']     = 'admin/proker/proker';
			$this->load->view('admin/template',$data);
        }

        public function addProker(){
            $proker  = $this->m_proker;
            $data = array(
                'id_proker'   => $this->input->post('nim'),
                'nim'         => $this->input->post('nama'),
                'kd_jabatan'  => $this->input->post('kd_jabatan')
            );
            $proker->save($data); 
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
            redirect('admin/manage/proker');
        }

        public function editProker($id_proker){
            $proker = $this->m_proker;
            $data['kd_jabatan'] = $this->input->post('kd_jabatan');
            $id['id_proker']  = $this->input->post('id_proker');
            $mhs->update($id, $data); 
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect('admin/manage/proker');
        }

        public function deleteProker($id){
            $proker = $this->m_proker;
            $row = $proker->getById($id);
            if($row){
                $proker->delete($id);
                $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
                redirect('admin/manage/proker');
            }
        }

        public function calon(){
            $data['menu']     = 'Manage';
            $data['calon']    = $this->m_candidate->getAll();
            $data['title']    = 'Admin - Manage';	
			$data['cont']     = 'admin/calon/data_calon';
			$this->load->view('admin/template',$data);
        }

        public function download($id){
            $fileinfo = $this->m_candidate->download($id);
            $path = './assets/data_calon/'.$fileinfo['file'];
            force_download($path, NULL);    
        }	
        
    }
?>