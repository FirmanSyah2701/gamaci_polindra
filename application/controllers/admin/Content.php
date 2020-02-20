<?php if(! defined('BASEPATH')) exit('No direct script access allowed ');
    class Content extends CI_Controller {
        function __construct(){
            parent::__construct();
			if(!$this->session->userdata('LoggedIn')){
				redirect('admin/login');			
			}else {
				$this->load->model("admin/m_admin");
				$this->load->model("admin/m_pengurus");
				$this->load->model("admin/m_mahasiswa");
				$this->load->model("admin/m_jabatan");
				$this->load->model('admin/m_gallery');
			}
        }

        public function gallery(){
            $data['menu']     = 'Content';
            $data['gallery'] = $this->m_admin->getGallery();
            $data['title']    = 'Admin - Content';	
			$data['cont']     = 'admin/galeri/galeri';
			$this->load->view('admin/template',$data);
        }
        public function addGallery(){
            $config = array(
                'upload_path'   => './assets/img/galeri',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size'      => 5000
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $data = $this->upload->data();
            $nmfile = $data['file_name'];
            $data = array(
                'foto'       => $nmfile,
                'judul'      => $_POST['judul'],
                'deskripsi'  => $_POST['deskripsi'],
                'tanggal'    => $_POST['tanggal'],
                'id_admin'   => $_POST['id_admin']
            );
            $this->m_admin->add('tb_gallery', $data);
            $this->session->set_flashdata('pesan','Data Berhasil ditambahkan');
            redirect('admin/content/gallery');
        }
        public function editGallery(){
            $config = array(
                'upload_path'   => './assets/img/galeri/',
                'allowed_types' => 'jpg|png|jpeg',
                'max_size'      => 5000
                );
            $this->load->library('upload', $config);		
            if ( ! $this->upload->do_upload('foto')){
                $data = array(
                'judul' => $_POST['judul'],							
                'deskripsi' => $_POST['deskripsi']
                );		
            }else{
                $data = $this->upload->data();
                $nmfile = $data['file_name'];			
                $data = array(				
                    'foto' => $nmfile,
                    'judul' => $_POST['judul'],
                    'deskripsi' => $_POST['deskripsi']
                );
                $nm=$this->uri->segment(4);
                unlink('assets/img/galeri/'.$nm);
            }				
            $id['id_gallery'] = $_POST['id_gallery'];		
            $this->m_admin->edit($id, 'tb_gallery', $data);		
            $this->session->set_flashdata('pesan','Data berhasil diperbaharui');
            redirect('admin/content/gallery');
        }
        public function deleteGallery($id){		
			$this->db->delete('tb_gallery',array('id_gallery'=> $id));
			$nm=$this->uri->segment(5);
			unlink('assets/img/galeri/'.$nm);
			$this->session->set_flashdata('pesan','Data berhasil Hapus');
			redirect('admin/content/gallery');
		}
    
        public function berita(){
			$data['berita'] = $this->m_admin->getBerita();
			$data['menu'] 	= 'Content';
			$data['title'] = 'Admin - Content';
			$data['cont'] = 'admin/berita/berita';
			$this->load->view('admin/template', $data);
		}

		public function addBerita(){	
			$data['berita'] = $this->m_admin->getBerita();	
			$data['menu'] 	= 'Content';
			$data['title'] = 'Admin - Content';
			$data['cont'] = 'admin/berita/add_berita';
			$this->load->view('admin/template', $data);
		}

		public function addBeritaDb(){
			$config = array(
					'upload_path' => './assets/img/berita/',
					'allowed_types' => 'jpg|png',
					'max_size'=> 5000
					);
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$data = $this->upload->data();
			$nmfile = $data['file_name'];

			$data = array(
				'foto'     => $nmfile,
				'judul'    => $_POST['judul'],
				'berita'   => $_POST['berita'],
				'tanggal'  => $_POST['tanggal'],
				'slug'     => slug($_POST['judul']),
				'id_admin' => $_POST['id_admin']
				);

			$this->m_admin->add('tb_berita',$data);
			$this->session->set_flashdata('pesan','Data Berhasil ditambahkan');
			redirect('admin/content/berita');
		}

		public function editBerita($id){
			$data['berita'] = $this->m_admin->ambil_id('id_berita',$id,'tb_berita');
			$data['menu'] 	= 'Content';
			$data['title']  = 'Admin - Content';
			$data['cont']   = 'admin/berita/edit_berita';
			$this->load->view('admin/template', $data);
		}

		public function editBeritaDb(){
			$config = array(
					'upload_path' => './assets/img/berita',
					'allowed_types' => 'jpg|png',
					'max_size'=> 5000
					);
			$this->load->library('upload', $config);		
			if ( ! $this->upload->do_upload('foto')){
				$data = array(				
					'judul'    => $_POST['judul'],
					'tanggal'  => $_POST['tanggal'],
					'berita'   => $_POST['berita'],
					'slug'     => slug($_POST['judul']),
					'id_admin' => $_POST['penulis']		
				);
			}else{
				$data = $this->upload->data();
				$nmfile = $data['file_name'];			
				$data = array(
					'foto'     => $nmfile,
					'judul'    => $_POST['judul'],				
					'tanggal'  => $_POST['tanggal'],
					'berita'   => $_POST['berita'],
					'slug'     => slug($_POST['judul']),
					'id_admin' => $_POST['penulis']
				);
				$nm=$this->uri->segment(4);
				unlink('assets/img/berita/'.$nm);
			}		
			$id['id_berita'] = $_POST['id'];
			$this->m_admin->edit($id, 'tb_berita', $data);
			$this->session->set_flashdata('pesan','Data berhasil diperbaharui');
			redirect('admin/content/berita');
		}

		public function deleteBerita($id){
			$this->db->delete('berita',array('id_berita'=> $id));
			$nm=$this->uri->segment(5);
			unlink('assets/img/berita/'.$nm);	
			$this->session->set_flashdata('pesan','Data berhasil Hapus');
			redirect('admin/content/berita');
		}

		public function struktur(){
			$data['struktur'] = $this->m_admin->get('tb_struktur');
			$data['menu'] 	  = 'Content';
			$data['title']    = 'Admin - Content';
			$data['cont']     = 'admin/struktur/struktur';
			$this->load->view('admin/template', $data);
		}

		public function addStruktur(){
			$config = array(
				'upload_path'   => './assets/img/berita/',
				'allowed_types' => 'jpg|png',
				'max_size'      => 5000
				);
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$data = $this->upload->data();
			$nmfile = $data['file_name'];

			$data = array(
				'foto'     => $nmfile,
				'angkatan' => $_POST['angkatan'],
				'tanggal'  => $_POST['tanggal']
				);
			$this->m_admin->add('tb_struktur',$data);
			$this->session->set_flashdata('pesan','Data Berhasil ditambahkan');
			redirect('admin/content/struktur');
		}

		public function editStruktur(){
            $config = array(
                'upload_path'   => './assets/img/galeri/',
                'allowed_types' => 'jpg|png|jpeg',
                'max_size'      => 5000
                );
            $this->load->library('upload', $config);		
            if ( ! $this->upload->do_upload('foto')){
                $data = array(
				'foto'     => $_POST['foto'],
                'angkatan' => $_POST['angkatan'],							
                'tanggal'  => $_POST['tanggal']
                );		
            }else{
                $data = $this->upload->data();
                $nmfile = $data['file_name'];			
                $data = array(				
                    'foto'     => $nmfile,
                    'angkatan' => $_POST['angkatan'],							
					'tanggal'  => $_POST['tanggal']
                );
                $nm=$this->uri->segment(4);
                unlink('assets/img/struktur/'.$nm);
            }				
            $id['id_struktur'] = $_POST['id_struktur'];		
            $this->m_admin->edit($id, 'tb_struktur', $data);		
            $this->session->set_flashdata('pesan','Data berhasil diperbaharui');
            redirect('admin/content/gallery');
        }
    }
?>