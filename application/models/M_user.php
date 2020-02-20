<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	class M_User extends CI_Model{
		function cekPengurus($nim, $password){
			$this->db->where('nim', $nim);
			$this->db->where('password', $password);
			return $this->db->get('tb_pengurus');
		}

		public function getAkun(){
			$this->db->select('*');
			$this->db->from('tb_akun_mhs, tb_mhs');
			$this->db->where('tb_akun_mhs.nim = tb_mhs.nim');
			return $this->db->get();
		}
		function cekMahasiswa($tb, $where){
			$this->db->get_where($tb, $where);
		}

		public function detail($primary ,$id, $db){
			$this->db->where($primary, $id);
			return $this->db->get($db);
		}
	}
 ?>