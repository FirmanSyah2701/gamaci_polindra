<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class M_gallery extends CI_Model{
        public $_table = "tb_gallery";

        public $id_gallery;
        public $judul;
        public $foto;
        public $deskripsi;
        public $tanggal;
        public $id_admin;
        public $admin;
        public $mhs;

        public function getAll(){
            $admin  = $this->m_admin;
            $mhs = $this->m_mahasiswa;
            $data = array(
                'tb_gallery' => $this->_table,
                'tb_admin' => $admin->_table
            );
            $this->db->select('*');
            $this->db->from($data);
            $this->db->where('tb_gallery.id_admin'. $this->id_admin. ' = tb_admin.id_admin'. $admin->nim);
            $this->db->join($mhs->_table,'tb_mhs.nim'. $mhs->nim. ' = tb_admin.nim'. $admin->nim,'inner');
            return $this->db->get()->result();
        }

        public function getById($id){
            return $this->db->get_where($this->_table, ['id_gallery' => $id])->row();
        }

        public function save($data){
            $this->db->insert($this->_table, $data);
        }

        public function update($id, $data){
            $this->where($id);
            $this->db->update($this->_table, $data);
        }

        public function delete($id){
            $this->db->delete($this->_table, array('id_gallery' => $id));
        }
	}
?>