<?php
class M_gallery extends CI_Model {
	public $id_galeri;
	public $deskripsi;
	public $gambar;

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('galeri');

		return $this->db->get();
	}

	public function getGalerry($id)
	{
		$this->db->where('id_galeri', $id);
		$this->db->select('*');
		$this->db->from('galeri');

		return $this->db->get();
	}

	public function addGallery($data)
	{
		$this->db->insert('galeri', $data);
	}

	public function edit($data, $condition){
		$this->db->where($condition);
		$this->db->update('galeri', $data);
	}

	public function delete($id){
		$this->db->where('id_galeri', $id);
		$this->db->delete('galeri');	
	}

	public function read()
	{
		$sql = "select * from galeri order by id_galeri";
		$query = $this->db->query($sql);
		return $query->result();
	}
}