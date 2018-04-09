<?php 
 
class Deupload extends CI_Controller{
 
	public function tambah()
	{
		$this->load->model('dapluod');
		$data = array();

		if ($this->input->post('submit')) {
			$upload = $this->dapluod->upload();

			if ($upload['result'] == 'success') {
				$this->dapluod->insert($upload);
				redirect('Deupload/tambah');
			}else{
				$data['message'] = $upload['error'];
			}
		}

		$this->load->view('v_upload', $data);
	}
	
}