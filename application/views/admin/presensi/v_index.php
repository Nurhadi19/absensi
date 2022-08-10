<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Presensi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('presensi/add') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus mr-2"></i>Absen Manual</a>
            <a href="<?= base_url('presensi/excel')?>" class="btn btn-sm btn-success"><i class="far fa-file-excel mr-2"></i>Rekap Absen Excel</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align: center;">Nama Karyawan</th>
                        <th rowspan="2">jabatan</th>
                        <th colspan="<?= date('t') ?>" style="text-align: center;">Tanggal</th>
                        <th rowspan="2">Total Kehadiran</th>
                        <th rowspan="2">Status</th>
                    </tr>
                    <tr>
                        <?php for ($i=1; $i <= date('t') ; $i++): ?>
                        <th style="text-align:center;width:5px;"><?= $i ?></th>
                        <?php endfor ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // echo '<pre>';print_r($karyawan);echo '</pre>';die(); 
                    ?>
                <?php foreach($karyawan as $data): ?>
                    <tr>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['jabatan'] ?></td>
                        <?php 
                            for($j = 1; $j <= date('t'); $j++){
                                if(in_array($j, $data['tgl_hadir'])){
                                    echo "<td><i class='fas fa-check' style='color:green'></i></td>";
                                }else{
                                    echo "<td>-</td>";
                                }
                            }
                        ?>
                        <td><?= count($data['tgl_hadir']) ?></td>
                        <td>Hadir</td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div>
<?php if($this->session->flashdata('alert') == TRUE):
    $result = $this->session->flashdata('alert');
?>
<script>
    Swal.fire({title: '<?= $result['title'] ?>',text: '<?= $result['message'] ?>',icon: '<?= $result['icon'] ?>',confirmButtonText: 'OK'})
</script>
<?php endif ?>
