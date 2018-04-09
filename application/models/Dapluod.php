<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dapluod extends CI_Model {
		public function upload()
	{
		$config['upload_path'] = './upload/Gambar';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']  = '2048';
		$config['remove_space']  = TRUE;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('input_gambar')){
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert($upload)
	{
		$data = array(
			'id' => '',
			'gambar' => $upload['file']['file_name']
		);

		$this->db->insert('up', $data);
	}
}