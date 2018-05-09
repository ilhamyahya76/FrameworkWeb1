<?php
class MBlog extends CI_Model {

	public function get_konten($limit, $start)
	{
		$this->db->limit($limit, $start);
        $query = $this->db->get("konten");

		if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
	}

	public function get_konten2() {
		$query = $this->db->get('konten');
		return $query->result();
	}

	public function get_total() 
    {
        // Dapatkan jumlah total artikel
        return $this->db->count_all("konten");
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