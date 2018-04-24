<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
		$this->load->model('category_model');

		$data['categories'] = $this->category_model->get_all_categories();

		$this->load->view('cat_view', $data);
	}

	public function create()
	{
		$this->load->model('category_model');

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

                $this->form_validation->set_rules('cat_name', 'Nama Kategori', 'required|is_unique[categories.cat_name]');
                $this->form_validation->set_rules('cat_description', 'Deskripsi Kategori', 'required', array(
				'required' 		=> 'Isi %s donk, males amat.'
				));

         if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('cat_create');
                } else {

		$post_data = array(
	    	    'id' => '',
	    	   	'cat_name' 		  => $this->input->post('cat_name'),
	    	    'cat_description' => $this->input->post('cat_description'),
	    	    'date_created' => ''
	    	);

	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->category_model->create_category($post_data);
		        $this->load->view('cat_create', $post_data);
	    	}
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>