<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                    </div>
                    <div class="col">
                    <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informasi karyawan</h6>
                </div>
                <div class="card-body">
                    <p>Nama karyawan: <?= $this->session->userdata('nama_karyawan') ?></p>
                    <p>Kode karyawan: <?= $this->session->userdata('kode_karyawan') ?></p>
                    <p>Jabatan: <?= $this->session->userdata('jabatan') ?></p>
                </div>
              </div>
        </div>
    </div>

</div>
<?php if($this->session->flashdata('alert') == TRUE):?>
    <script>
        Swal.fire({title: 'ERROR',text: '<?= $this->session->flashdata('alert') ?>',icon: 'error',confirmButtonText: 'OK'})
    </script>
<?php endif ?>
<!-- /.container-fluid -->
