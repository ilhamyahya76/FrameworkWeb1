<?php
class MBlog extends CI_Model {

	public function get_konten()
	{
		$query = $this->db->get('konten');
		return $query->result();
	}

	public function get_konten_id($id)
	{
		$query = $this->db->query('select * from konten as k join categories as c on k.cat_id=c.id where k.id ='.$id);
		return $query->result();
	}

	public function get_kategori($category)
	{
		$query = $this->db->query('select * from konten as k join categories as c on k.cat_id=c.id where k.cat_id ='.$category);
		return $query->result();
	}
}
?>