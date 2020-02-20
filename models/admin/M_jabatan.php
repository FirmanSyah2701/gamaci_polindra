<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class M_jabatan extends CI_Model{
        public $table = "tb_jabatan";

        public $kd_jabatan;
        public $nama_jabatan;

        public function getAll(){
            return $this->db->get($this->$table)->result();
        }

        public function getById($id){
            return $this->db->get_where($this->_table, ['kd_jabatan' => $id])->row();
        }
	}
?>