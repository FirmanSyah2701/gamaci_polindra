<?php if(! defined('BASEPATH')) exit('No direct script access allowed ');
    class Pengurus extends CI_Controller{  
        function __construct(){
            parent::__construct();
            $this->load->model("M_user");
        }

        public function index(){
            $data['title'] = 'Halaman Login Pengurus';			
			$this->load->view('pengurus/login',$data);
		}

		public function aksi_login(){
			$nim      = $this->input->post('nim');
			$password = $this->input->post('password');

			$cek = $this->M_user->cekPengurus($nim, md5($password));
			if ($cek->num_rows() == 1) {
				foreach($cek->result() as $data){
					$sess_data['nim']      = $data->nim;
					$sess_data['nama']     = $data->nama;					
                    $sess_data['jabatan']  = $data->jabatan;
                    $sess_data['angkatan'] = $data->angkatan;
                    $sess_data['jurusan']  = $data->jurusan;
					$this->session->set_userdata($sess_data);
                }
                $this->load->view('pengurus/home');
			}

			else{
				$this->session->set_flashdata('Pesan','Login Gagal');
				redirect('pengurus/login');
			}
        }
    }
?>