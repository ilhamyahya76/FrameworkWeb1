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
	
	public function __construct()
  	{
        parent::__construct();
 
        // load Pagination library
        $this->load->library('pagination');
         
        // load URL helper
        $this->load->helper('url');
        $this->load->model('MBlog');
        $this->load->model('dapluod');
    }

	public function index()
	{
		if ($this->session->userdata('level') == 1) {
			$data['level'] = true;
		} else {
			$data['level'] = false;
		}
		$params = array();
        $limit_per_page = 1;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->MBlog->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->MBlog->get_konten($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'blog/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
         
        $this->load->view('zz', $params);	
	}

	public function custom()
    {
     
        // init params
        $params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->MBlog->get_total();
     
        if ($total_records > 0)
        {
            // get current page records
            $params["results"] = $this->MBlog->get_konten($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] = base_url() . 'blog/custom';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<span class="curlink">';
            $config['cur_tag_close'] = '</span>';
 
            $config['num_tag_open'] = '<span class="numlink">';
            $config['num_tag_close'] = '</span>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
     
        $this->load->view('zz', $params);
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
		if ($this->session->userdata('level') != 1) {
			$this->session->set_flashdata('not_admin', 'Anda tidak diizinkan');
			redirect('blog');
		}
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
		if ($this->session->userdata('level') != 1) {
			$this->session->set_flashdata('not_admin', 'Anda tidak diizinkan');
			redirect('blog');
		}
		$id = $this->uri->segment(3);
		$this->dapluod->hapusdata($id);
		redirect('blog');
	}

	public function hapus_user($id)
	{
		if ($this->session->userdata('level') != 1) {
			$this->session->set_flashdata('not_admin', 'Anda tidak diizinkan');
			redirect('blog');
		}
		$id = $this->uri->segment(3);
		$this->dapluod->hapusdatauser($id);
		redirect('blog');
	}

	public function edit($id){
		if ($this->session->userdata('level') != 1) {
			$this->session->set_flashdata('not_admin', 'Anda tidak diizinkan');
			redirect('blog');
		}
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

	public function edit_user($id){
		if ($this->session->userdata('level') != 1) {
			$this->session->set_flashdata('not_admin', 'Anda tidak diizinkan');
			redirect('blog');
		}
		$this->load->model('category_model');
		$where = array('id' => $id);
		$data['users'] = $this->dapluod->edit_datauser($where,'user')->result();
		$data['categories'] = $this->category_model->get_all_categories();
		$this->load->view('v_edit_user',$data);
	}

	public function update_user(){
	
	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');

                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('v_edit_user');
                }
    $this->load->model('dapluod');
	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$email = $this->input->post('email');
	$username = $this->input->post('username');
	$password = $this->input->post('password');
 	
	if($password == ''){
		$data = array(
		'nama' => $nama,
		'email' => $email,
		'username' => $username
		);
	} else {
		$data = array(
		'nama' => $nama,
		'email' => $email,
		'username' => $username,
		'password' => $password
	);
	}
 
	$where = array(
		'id' => $id
	);
 
	$this->dapluod->update_datauser($where,$data,'user');
	redirect('blog');
	}

	public function table_user()
	{
		$data2['user'] = $this->dapluod->get_datauser();
		$this->load->view('table_user', $data2);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */