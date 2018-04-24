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
}