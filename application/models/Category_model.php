<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function create_category($data) {
		return $this->db->insert('categories', $data);
	}

	public function get_all_categories() {
		$this->db->order_by('cat_name');

		$query = $this->db->get('categories');
		return $query->result();
	}

	public function hapusdata($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('categories');
	}

	public function edit_data($where,$table)
	{		
	return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}