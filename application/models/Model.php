<?php
	class Model extends CI_Model {
		public $nim
		public $nama
		public $alamat

		public function get_last_ten_entries(){
			$query = $this->db->get('konten');
			return $query->result();
		}
		/*public function insert_entry(){
			$this->nama = $_POST['nama'];
			$this->nim = $_POST['nim'];
			$this->alamat = $_POST['alamat'];

			$this->db->insert('entries', $this);
		}
		public function update_entry(){
			$this->nama = $_POST['title'];
			$this->nim = $_POST['nim'];
			$this->alamat = $_POST['alamat'];

			$this->db->update('entries', $this, array('id' => $_POST['id']));
		}*/
	}
?>