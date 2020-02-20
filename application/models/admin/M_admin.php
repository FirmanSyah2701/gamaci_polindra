<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');	
	class M_admin extends CI_Model{
		public function add($db, $data){
			$this->db->insert($db, $data);
		}
		public function get($db){
			return $this->db->get($db);			
		}
		public function getPengurus(){
			$this->db->select('*');
			$this->db->from('tb_mhs, tb_pengurus, tb_jabatan');
			$this->db->where('tb_mhs.nim = tb_pengurus.nim');
			$this->db->where('tb_pengurus.kd_jabatan = tb_jabatan.kd_jabatan');
			return $this->db->get();
		}
		public function getAkunAdmin(){
			$this->db->select('*');
			$this->db->from('tb_admin, tb_pengurus, tb_jabatan');
			$this->db->where('tb_admin.nim = tb_pengurus.nim');
			$this->db->where('tb_pengurus.kd_jabatan = tb_jabatan.kd_jabatan');
			$this->db->join('tb_mhs','tb_mhs.nim=tb_pengurus.nim','inner');
			return $this->db->get();
		}
		public function getAkunMhs(){
			$this->db->select('*');
			$this->db->from('tb_akun_mhs, tb_mhs');
			$this->db->where('tb_akun_mhs.nim = tb_mhs.nim');
			return $this->db->get();
		}
		public function getCandidate($nim){
			$this->db->select('*');
			$this->db->from('tb_candidate');
			$this->db->join('tb_mhs','tb_mhs.nim=tb_candidate.nim','inner');
			$this->db->where('tb_candidate.nim', $nim);
			return $this->db->get();
		}
		public function getAllCandidate(){
			$this->db->select('*');
			$this->db->from('tb_candidate');
			$this->db->join('tb_mhs','tb_mhs.nim=tb_candidate.nim','inner');
			return $this->db->get();
		}
		public function ambil_id($primary ,$id, $db){
			$this->db->where($primary, $id);
			return $this->db->get($db);
		}
		public function ambil_data($primary, $db){
			$this->db->order_by($primary,'DESC');
			$this->db->limit('3');
			$query = $this->db->get($db);
			if ($query->num_rows()>0) {
				return $query->result();
			}else{
				return false;
			}
		}
		public function edit($id, $db ,$data){
			$this->db->where($id);
			$this->db->update($db ,$data);
		}
		//ambil data terbaru & batasi 3
		public function get_data($primary,$db){
			$this->db->order_by($primary,'DESC');
			$this->db->limit('3');
			$query = $this->db->get($db);
			if ($query->num_rows()>0) {
				return $query->result();
			}else{
				return false;
			}
		}
		function getGallery(){
			$this->db->select('*');
			$this->db->from('tb_gallery, tb_admin');
			$this->db->where('tb_gallery.id_admin = tb_admin.id_admin');
			$this->db->join('tb_mhs','tb_mhs.nim=tb_admin.nim','inner');
			return $this->db->get();
		}
		function getBerita(){
			$this->db->select('*');
			$this->db->from('tb_berita, tb_admin');
			$this->db->where('tb_berita.id_admin = tb_admin.id_admin');
			$this->db->join('tb_mhs','tb_mhs.nim=tb_admin.nim','inner');
			return $this->db->get();
		}
		// Ambil data berdasarkan Id
		function ambil_id_new($db, $id){
			$this->db->select('*');
			$this->db->from($db);
			$this->db->where('username', $id);
			$query = $this->db->get();
			return $query->row();
		}
		public function download($id_candidate){
			$query = $this->db->get_where('tb_candidate', array('id_candidate'=>$id_candidate));
			return $query->row_array();
		}
		public function detail($primary ,$id, $db){
			$this->db->where($primary, $id);
			return $this->db->get($db);
		}
	}
?>