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

	public function category($category)
	{
		$this->load->model('MBlog');
		$data['detail'] = $this->MBlog->get_kategori($category);
		$this->load->view('bb',$data);
	}

	public function tambah()
	{
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get_all_categories();
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

                $this->form_validation->set_rules('title', 'Judul', 'required', array('required'=>'Isi %s'));
                $this->form_validation->set_rules('author', 'Author', 'required', array(
				'required' 		=> 'Isi %s donk, males amat.'
				));
                $this->form_validation->set_rules('artikel', 'Artikel', 'required|min_length[8]', array(
				'required' 		=> 'Isi %s donk, males amat.'
				));
                $this->form_validation->set_rules('arpen', 'Artikel Pendek', 'required');
                $this->form_validation->set_rules('input_gambar', 'Gambar', 'required');
                $this->form_validation->set_rules('sumber', 'Sumber', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('v_upload',$data);
                }
                else
                {
                        $this->load->view('zz');
                }
		
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
	}

	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->dapluod->hapusdata($id);
		redirect('blog');
	}

	public function edit($id){
		$this->load->model('category_model');
		$where = array('id' => $id);
		$data['user'] = $this->dapluod->edit_data($where,'konten')->result();
		$data['categories'] = $this->category_model->get_all_categories();
		$this->load->view('v_edit',$data);
	}

	public function update(){
	
	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');

                $this->form_validation->set_rules('title', 'Judul', 'required');
                $this->form_validation->set_rules('author', 'Author', 'required');
                $this->form_validation->set_rules('artikel', 'Artikel', 'required');
                $this->form_validation->set_rules('arpen', 'Artikel Pendek', 'required');
                $this->form_validation->set_rules('input_gambar', 'Gambar', 'required');
                $this->form_validation->set_rules('sumber', 'Sumber', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('v_edit');
                }
    $this->load->model('dapluod');
	$id = $this->input->post('id');
	$title = $this->input->post('title');
	$artikel = $this->input->post('artikel');
	$arpen = $this->input->post('arpen');
	$image = $this->input->post('image');
	$tgl = $this->input->post('tgl');
	$author = $this->input->post('author');
	$cat_id = $this->input->post('cat_id');
 
	$data = array(
		'title' => $title,
		'artikel' => $artikel,
		'artikel_pendek' => $arpen,
		'image' => $image,
		'tgl_posting' => $tgl,
		'author' => $author,
		'sumber' => $sumber,
		'cat_id' => $cat_id
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