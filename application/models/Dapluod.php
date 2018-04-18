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
			'title' => $this->input->post('title'),
			'artikel' => $this->input->post('artikel'),
			'artikel_pendek' => $this->input->post('arpen'),
			'image' => $upload['file']['file_name'],
			'tgl_posting' => date("Y-m-d H:i:s"),
			'author' => $this->input->post('author'),
			'sumber' => $this->input->post('sumber')
		);

		$this->db->insert('konten', $data);
	}

	public function hapusdata($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('konten');
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