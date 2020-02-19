<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class M_account extends CI_Model{
		function cek($username, $password){
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			return $this->db->get('admins');
		}
	}
 ?>