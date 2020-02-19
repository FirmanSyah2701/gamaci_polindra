<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class M_candidate extends CI_Model{
        public $_table = "tb_candidate";

        public $id_candidate;
        public $nim;
        public $mhs;
        public $file;
        public $alasan;
        public $visi_misi;
        
        /*public function rules(){
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
        */

        public function getAll(){
            $mhs = $this->m_mahasiswa;
            $this->db->select('*');
            $dataTb = array(
                'tb_mhs'            => $mhs->_table,
                'tb_candidate'   => $this->_table
            );
            $this->db->from($dataTb);
            $this->db->where('tb_mhs.nim'. $mhs->nim. ' = tb_candidate.nim'. $this->nim);
            return $this->db->get()->result();
        }

        public function getById($id){
            return $this->db->get_where($this->_table, ['id_candidate' => $id])->row();
        }

        public function save($data){
            $this->db->insert($this->_table, $data);
        }

        public function update($id, $data){
            $this->where($id);
            $this->db->update($this->_table, $data);
        }

        public function delete($id){
            $this->db->delete($this->_table, array('id_candidate' => $id));
        }

        public function download($id_candidate){
			$query = $this->db->get_where($this->_table, array('id_candidate'=>$id_candidate));
			return $query->row_array();
		}
	}
?>