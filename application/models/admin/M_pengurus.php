<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
	
	class M_pengurus extends CI_Model{
        public $table1 = "tb_pengurus";

        public $id_pengurus;
        public $mhs;
        public $nim;
        public $jabatan;
        public $kd_jabatan;
        public function getAll(){
            $mhs = $this->m_mahasiswa;
            $jbt = $this->m_jabatan;
            $data = array(
                'tb_mhs'      => $mhs->_table,
                'tb_pengurus' => $this->table1,
                'tb_jabatan'  => $jbt->table
            );
            $this->db->select('*');
			$this->db->from($data);
			$this->db->where('tb_mhs.nim'. $mhs->nim. ' = tb_pengurus.nim'. $this->nim);
			$this->db->where('tb_pengurus.kd_jabatan'. $this->kd_jabatan. ' = tb_jabatan.kd_jabatan'.$jbt->kd_jabatan);
			return $this->db->get();
            return $query->result();
        }

        public function getById($id){
            return $this->db->get_where($this->_table, ['id_pengurus' => $id])->row();
        }

        public function save($data){
            $this->db->insert($this->_table, $data);
        }
        
        public function update($id, $data){
            $this->db->where($id);
            $this->db->update($this->_table, $data);
        }

        public function delete($id){
            $this->db->delete($this->_table, array('id_pengurus' => $id));
        }
	}
?>