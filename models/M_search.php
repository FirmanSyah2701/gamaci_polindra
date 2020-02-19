<?php
class M_search extends CI_Model{
		public function get_all(){
			return $this->db->get('berita')->result();
	}
		public function get_berita_keyword($keyword){
			$this->db->select('*');
			$this->db->from('berita');
			$this->db->like('berita', $keyword);
			$this->db->or_like('judul', $keyword);
			return $this->db->get()->result();
		}
		public function count($keyword){
			$this->db->select('*');
			$this->db->from('berita');
			$this->db->like('berita', $keyword);
			$this->db->or_like('judul', $keyword);
			return $this->db->get()->num_rows();
		}
}
?>