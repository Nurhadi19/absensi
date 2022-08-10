<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
        $data = [
            'jam_absensi' => $this->db->select('jam_masuk_awal, jam_masuk_akhir')->get('tb_absensi')->row() 
        ];
		$this->load->view('login', $data);
	}
    
    public function actionLogin()
    {
        $kode_karyawan = $this->input->post('kode_karyawan');
        $password = $this->input->post('password');
        $cek_karyawan = $this->db->get_where('tb_karyawan', ['kode_id' => "$kode_karyawan"]);

        if($cek_karyawan->num_rows() > 0){
            $hasil = $cek_karyawan->row();
            if(password_verify($password, $hasil->password)){
                // membuat session
                $this->session->set_userdata('kode_karyawan', $kode_karyawan);
                $this->session->set_userdata('nama_karyawan', $hasil->nama);
                $this->session->set_userdata('jabatan', $hasil->jabatan);
                $this->session->set_userdata('is_login', TRUE);
                // redirect ke admin
                if($hasil->jabatan == 'Admin'){
                    redirect(base_url('dashboard'));
                } else {
                    redirect(base_url('user_dashboard'));
                }
            }else{
                $this->session->set_flashdata('alert','Password salah !');
                redirect(base_url('login'));
            }
        } else {
            $this->session->set_flashdata('alert','Kode karyawan tidak ditemukan !');
            redirect(base_url('login'));
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
