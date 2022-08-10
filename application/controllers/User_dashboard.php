<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_dashboard extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_login') == FALSE){
            $this->session->set_flashdata('alert','Anda Belum login, silahkan login terlebih dahulu !');
            redirect(base_url('login'));
        }
    }
	public function index()
	{
        $this->load->view('user/v_header');
		$this->load->view('user/v_dashboard');
        $this->load->view('user/v_footer');
	}
}
