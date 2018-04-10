<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$this->load->model('MBlog');
		$data['konten'] = $this->MBlog->get_konten();
		$this->load->view('zz',$data);
	}

	public function detail($id)
	{
		$this->load->model('MBlog');
		$data['detail'] = $this->MBlog->get_konten_id($id);
		$this->load->view('bb',$data);
	}

	public function tambah()
	{
		$this->load->model('dapluod');
		$data = array();

		if ($this->input->post('submit')) {
			$upload = $this->dapluod->upload();

			if ($upload['result'] == 'success') {
				$this->dapluod->insert($upload);
				redirect('blog');
			}else{
				$data['message'] = $upload['error'];
			}
		}

		$this->load->view('v_upload', $data);
	}

	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->dapluod->hapusdata($id);
		redirect('blog');
	}

	public function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->dapluod->edit_data($where,'konten')->result();
		$this->load->view('v_edit',$data);
	}

	public function update(){
	$id = $this->input->post('id');
	$title = $this->input->post('title');
	$artikel = $this->input->post('artikel');
	$arpen = $this->input->post('arpen');
	$image = $this->input->post('image');
	$tgl = $this->input->post('tgl');
 
	$data = array(
		'title' => $title,
		'artikel' => $artikel,
		'artikel_pendek' => $arpen,
		'image' => $image,
		'tgl_posting' => $tgl
	);
 
	$where = array(
		'id' => $id
	);
 
	$this->dapluod->update_data($where,$data,'konten');
	redirect('blog');
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */