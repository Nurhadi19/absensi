<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Presensi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_login') == FALSE){
            $this->session->set_flashdata('alert','Anda Belum login, silahkan login terlebih dahulu !');
            redirect(base_url('login'));
        }
        $this->load->model('model_presensi');
    }

	public function index()
	{
        $data = [
            'karyawan' => $this->model_presensi->getData('kode_id, nama, jabatan')
            // 'presensi' => $this->model_presensi->getPresensi()->result()
        ];

        // echo '<pre>';print_r($data);echo '</pre>';die();
        
        $this->load->view('admin/v_header');
		$this->load->view('admin/presensi/v_index', $data);
        $this->load->view('admin/v_footer');
	}

    public function add()
    {
        $data = [
            'karyawan' => $this->model_presensi->getData('kode_id, nama')->result()
        ];
        $this->load->view('admin/v_header');
        $this->load->view('admin/presensi/v_add', $data);
        $this->load->view('admin/v_footer');
    }

    public function actionAdd()
    {
        $kode_karyawan = $this->input->post('kode_id_karyawan');
        $tanggal = $this->input->post('tanggal');
        $jam_masuk = $this->input->post('jam_masuk');
        $jam_keluar = $this->input->post('jam_keluar');
        $data = [
            'kode_id_karyawan' => $kode_karyawan,
            'tanggal' => $tanggal,
            'jam_masuk' => $jam_masuk,
            'jam_keluar' => $jam_keluar,
            'status_kehadiran' => 'absen manual',
            'status_absensi' => 2
        ];
        $this->model_presensi->insertData($data);

        $this->session->set_flashdata('alert', ['title' => 'Success', 'message' => 'sukses melakukan absensi', 'icon' => 'success']);

        redirect(base_url().'presensi');
    }

    public function excel()
    {
        $data =  $this->model_presensi->getAbsensi();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Kode Karyawan')
                    ->setCellValue('C1', 'Nama Karyawan')
                    ->setCellValue('D1', 'Jabatan')
                    ->setCellValue('E1', 'Tanggal')
                    ->setCellValue('F1', 'Jam Masuk')
                    ->setCellValue('G1', 'Jam Keluar')
                    ->setCellValue('H1', 'Status Kehadiran');
        
        $kolom = 2;
        $nomor = 1;

        // echo '<pre>';print_r($data);echo '</pre>';die();

        foreach($data as $karyawan){
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $kolom, $nomor)
            ->setCellValue('B' . $kolom, $karyawan->kode_id_karyawan)
            ->setCellValue('C' . $kolom, $karyawan->nama)
            ->setCellValue('D' . $kolom, $karyawan->jabatan)
            ->setCellValue('E' . $kolom, $karyawan->tanggal)
            ->setCellValue('F' . $kolom, $karyawan->jam_masuk)
            ->setCellValue('G' . $kolom, $karyawan->jam_keluar)
            ->setCellValue('H' . $kolom, $karyawan->status_kehadiran);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);
        
        $date = date('d-m-Y');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Absensi"'.$date.'".xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
            
        

    //   echo '<pre>'; print_r($data); echo '</pre>';die;
    }
}
