<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class M_mahasiswa extends CI_Model{
        public $_table = "tb_mhs";

        public $nim;
        public $nama;
        public $jurusan;
        public $kelas;
        public $alamat;
        public $angkatan;
        
        public function rules(){
            return [ 
                ['field' => 'nim',
                 'label' => 'Nim',
                 'rules' => 'required'],

                 ['field' => 'nama',
                 'label' => 'Nama',
                 'rules' => 'required'],
                 
                 ['field' => 'jurusan',
                 'label' => 'Jurusan',
                 'rules' => 'required'],

                 ['field' => 'kelas',
                 'label' => 'Kelas',
                 'rules' => 'required'],

                 ['field' => 'alamat',
                 'label' => 'Alamat',
                 'rules' => 'required'],

                 ['field' => 'angkatan',
                 'label' => 'Angkatan',
                 'rules' => 'required']
            ];
        }

        public function getAll(){
            return $this->db->get($this->_table)->result();
        }

        public function getById($id){
            return $this->db->get_where($this->_table, array('nim' => $id))->row();
        }

        public function save($data){
            $this->db->insert($this->_table, $data);
        }
        
        public function update($nim, $data){
            $this->db->where($nim);
            $this->db->update($this->_table, $data);
        }

        public function delete($nim){
            $this->db->delete($this->_table, array('nim' => $nim));
        }
        
	}
?>