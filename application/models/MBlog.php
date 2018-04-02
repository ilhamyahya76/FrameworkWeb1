<?php
class MBlog extends CI_Model {

	public function get_konten()
	{
		$query = $this->db->get('konten');
		return $query->result();
	}
	public function get_konten_id($id)
	{
		$query = $this->db->query('select * from konten where id ='.$id);
		return $query->result();
	}
}
?>