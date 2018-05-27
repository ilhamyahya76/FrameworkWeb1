<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
				
		$this->load->library('form_validation');
		$this->load->model('dapluod');
	}

	// Register user
	public function create_user()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        		$this->form_validation->set_rules('nama', 'Nama', 'required');
        		$this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');


         if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('register_user');
                } else {

                $enc_password = md5($this->input->post('password'));
				$post_data = array(
	    	    'id'          => '',
	    	   	'nama' 		  => $this->input->post('nama'),
	    	    'email' 	  => $this->input->post('email'),
	    	    'username'    => $this->input->post('username'),
	    	    'password'    => $enc_password
	    	);

	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->dapluod->create_user($post_data);
		        $this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');
		        $this->load->view('register_user', $post_data);
	    	}
	    }
	}

	// Log in user
	public function login(){

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('login');
		} else {
			
	// Get username
	$username = $this->input->post('username');
	// Get & encrypt password
	$password = md5($this->input->post('password'));

	// Login user
	$user_id = $this->dapluod->login($username, $password);

	if($user_id){
		// Buat session
		$user_data = array(
			'user_id' => $user_id,
			'username' => $username,
			'logged_in' => true
		);

		$this->session->set_userdata($user_data);

		// Set message
		$this->session->set_flashdata('user_loggedin', 'Anda sudah login');

		redirect('blog');
	} else {
		// Set message
		$this->session->set_flashdata('login_failed', 'Login invalid');

		redirect('login');
	}		
		}
	}

	// Log user out
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

		redirect('user/login');
	}

}