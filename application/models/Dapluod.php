<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dapluod extends CI_Model {
	public function upload()
	{
		$config['upload_path'] = './upload/Gambar';
		$config['allowed_types'] = '*';
		$config['remove_space']  = TRUE;
		$config['overwrite']			= TRUE;
		
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
			'sumber' => $this->input->post('sumber'),
			'cat_id' => $this->input->post('cat_id')
		);

		$this->db->insert('konten', $data);
	}

	public function hapusdata($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('konten');
	}

	public function hapusdatauser($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user');
	}

	public function edit_data($where,$table)
	{		
	return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function edit_datauser($where,$table)
	{		
	return $this->db->get_where($table,$where);
	}

	public function update_datauser($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function create_user($data) {
		return $this->db->insert('user', $data);
	}

	public function login($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');


        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function insert_level($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'id_level' => 2
		);

		$this->db->insert('user_level', $data);
	}

	public function get_user($username)
	{
		$this->db->select('id');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get()->result();
	}

	public function get_datauser()
	{
		$query = $this->db->get('user');
		return $query->result();
	}
}