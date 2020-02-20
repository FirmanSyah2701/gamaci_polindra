<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class User extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model("m_user");
			$this->load->model("m_model");
			$this->load->model("admin/m_admin");
			$this->load->model("m_search");
		}

		public function index(){
			$data['berita'] = $this->m_admin->getBerita();
			$data['galeri'] = $this->m_admin->getGallery();
			$data['cont'] = 'user/home';
			$this->load->view('user/template',$data);
		}

		public function galeri($offset=0){
			$galeri = $this->db->get('tb_gallery');
			$config['total_rows'] = $galeri->num_rows();
			$config['base_url'] = base_url(). 'user/galeri';
			$config['per_page'] = 2;

			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
			// $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close']  = '</span></li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close']  = '</span></li>';

			$this->pagination->initialize($config);
			$data['offset'] = $offset;

			$data['galeri']= $this->m_model->get_data('tb_gallery',$config['per_page'],$offset);
			//$data['galeri'] = $this->m_portal->getGaleri();
			$data['cont'] = 'user/galeri';
			$this->load->view('user/template',$data);
		}

		public function detailGaleri($id){
			$data['galeri'] = $this->m_admin->detail('id_galeri',$id,'tb_galeri');
			$data['cont'] = 'user/detail_galeri';
			$this->load->view('user/template', $data);
		}

		public function mahasiswa(){
			$data['mahasiswa'] = $this->m_admin->get('tb_mhs');
			$data['cont']     = 'user/data_mhs';
			$this->load->view('user/template', $data);
		}

		public function pengurus(){
			$data['pengurus'] = $this->m_admin->getPengurus();
			$data['cont']     = 'user/pengurus';
			$this->load->view('user/template', $data);
		}

		public function berita($offset=0){
			$berita = $this->db->get('tb_berita');
			$config['total_rows'] = $berita->num_rows();
			$config['base_url'] = base_url(). 'user';
			$config['per_page'] = 2;

			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
			// $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close']  = '</span></li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close']  = '</span></li>';

			$this->pagination->initialize($config);
			$data['offset'] = $offset;

			$data['berita']= $this->m_model->get_data('tb_berita',$config['per_page'],$offset);
			//$data['berita'] = $this->m_portal->getGaleri();
			$data['cont'] = 'user/all_berita';
			$this->load->view('user/template',$data);
		}

		public function detailBerita($id){
			$data['berita'] = $this->m_admin->detail('slug',$id,'tb_berita');
			$data['cont'] = 'user/detail_berita';
			$this->load->view('user/template', $data);
		}
		/*
		public function search(){
			$src = $this->input->post('search');
			$data['search'] = $this->db->query("SELECT * FROM berita")->result();
			$data['count'] = $this->db->query("SELECT * FROM berita")->num_rows();
			$data['cont'] = 'user/search';
			$this->load->view('user/template',$data);
		}
		*/
		public function searchDb(){
			//$data['search'] = $this->m_search->get_all();
			$keyword = $this->input->post('keyword');
			$data['search'] = $this->m_search->get_berita_keyword($keyword);
			$data['count'] = $this->m_search->count($keyword);
			$data['cont'] = 'search';
			$this->load->view('user/template', $data); 
		}	
	}
 ?>