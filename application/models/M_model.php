<?php
	class M_model extends CI_Model{
		function get_data($tb, $perpage,$offset){
			return $this->db->get($tb,$perpage,$offset)->result();
		}
		function cari($berdasarkan,$yangdicari){
			$this->db->from('siswa');
			switch($berdasarkan){
				case "";
				$this->db->like('nis',$yangdicari);
				$this->db->or_like('nama',$yangdicari);
				$this->db->or_like('tempat_lahir',$yangdicari);
				$this->db->or_like('jk',$yangdicari);
				break;

				default:
				$this->db->like($berdasarkan,$yangdicari);
			}
		}
	}
?>