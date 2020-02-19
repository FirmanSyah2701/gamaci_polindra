<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class M_proker extends CI_Model{
        public $_table = "tb_proker";

        public $id_proker;
        public $nama;
        public $tanggal;
        public $deskripsi;
        
        public function rules(){
            return [
                 ['field' => 'nama',
                 'label' => 'Nama',
                 'rules' => 'required'],
                 
                 ['field' => 'tanggal',
                 'label' => 'Tanggal',
                 'rules' => 'required'],

                 ['field' => 'deskripsi',
                 'label' => 'Deskripsi',
                 'rules' => 'required'],
            ];
        }

        public function getAll(){
            return $this->db->get($this->_table)->result();
        }

        public function getById($id){
            return $this->db->get_where($this->_table, ['id_proker' => $id])->row();
        }

        public function save($data){
            $this->db->insert($this->_table, $data);
        }

        public function update($id, $data){
            $this->where($id);
            $this->db->update($this->_table, $data);
        }

        public function delete($id){
            $this->db->delete($this->_table, array('id_proker' => $id));
        }
	}
?>