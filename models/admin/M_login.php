<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class M_login extends CI_Model{
		function cekAdmin($table, $where){
			return $this->db->get_where($table, $where);
		}

		public function getAkunMhs($nim, $password){
			$this->db->select('*');
			$this->db->from('tb_akun_mhs');
			$this->db->join('tb_mhs','tb_mhs.nim=tb_akun_mhs.nim','inner');
			$this->db->where('tb_akun_mhs.nim', $nim);
			$this->db->where('password', MD5($password));
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 1){
				return $query->result();				
			} else {
				return false;
			}
		}
		
		public function getAkun($nim, $password){
			$this->db->select('*');
			$this->db->from('tb_admin');
			$this->db->join('tb_mhs','tb_mhs.nim=tb_admin.nim','inner');
			$this->db->where('tb_admin.nim', $nim);
			$this->db->where('password', MD5($password));
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 1){
				return $query->result();				
			} else {
				return false;
			}
			
		}
	}
 ?>