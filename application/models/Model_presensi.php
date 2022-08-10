<?php 

class Model_presensi extends CI_Model{
    private $table = 'tb_presensi';

    function getData($column = "*"){
        $this->db->select($column);
        $data = $this->db->get('tb_karyawan')->result_array();


        foreach($data as $key => $value){
            $hadir = [];
            $kode_id = $data[$key]['kode_id'];
            
            $sql = "SELECT tanggal, id_presensi, DAY(tanggal) AS tgl FROM tb_presensi WHERE kode_id_karyawan='$kode_id'";

            $kehadiran = $this->db->query($sql)->result_array();
            
           
            foreach($kehadiran as $h => $value){
                array_push($hadir, $kehadiran[$h]['tgl']);
            }
            $data[$key]['tgl_hadir'] = $hadir;
        }
        // $data['hadir'] = $hadir;

        // echo '<pre>';print_r($data);echo '</pre>';die();

        return $data;
        
    }
    function getPresensi(){
        $this->db->select('kode_id_karyawan, tanggal');
        //$this->db->where()
        return $this->db->get($this->table);
    }

    function getKehadiran($kode_id_karyawan){
        $this->db->where('kode_id_karyawan', $kode_id_karyawan);
        return $this->db->get('tb_presensi')->num_rows();
    }
    function getTanggal($kode_id_karyawan){
        $this->db->distinct();
        $this->db->select('tanggal');
        $this->db->where('kode_id_karyawan', $kode_id_karyawan);
        $this->db->distinct();
        return $this->db->get('tb_presensi')->result();
    }
    
    function insertData($data){
        $this->db->insert($this->table, $data);
    }

    function getAbsensi()
    {
        $sql = $this->db->query("SELECT kode_id_karyawan, nama, jabatan, tanggal, jam_masuk, jam_keluar, status_kehadiran FROM tb_presensi INNER JOIN tb_karyawan ON kode_id = kode_id_karyawan ORDER BY tanggal ASC");

        $hasil = $sql->result();

        return $hasil;
    }
    // function getData(){
    //     $query = $this->db->query('SELECT k.id_karyawan, k.nama, k.jabatan, p.tanggal, p.kode_id_karyawan FROM tb_presensi p INNER JOIN tb_karyawan k ON p.kode_id_karyawan = k.kode_id');
    //     return $query;
    // }    
    
}