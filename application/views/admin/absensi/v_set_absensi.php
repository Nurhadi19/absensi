<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Setting Jam Absensi
        </div>
        <div class="card-body">
            <form action="<?= base_url('absensi/actionUpdate') ?>" method="POST">
                <div class="form-group">
                    <label for="jam_masuk">Jam masuk</label>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="time" class="form-control" name="jam_masuk_awal" id="jam_masuk" value="<?= $absensi->jam_masuk_awal ?>">
                        </div>
                        <div class="col-md-2 text-center">
                            <p>sampai</p>
                        </div>
                        <div class="col-md-5">
                            <input type="time" class="form-control" name="jam_masuk_akhir" id="jam_masuk" value="<?= $absensi->jam_masuk_akhir ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jam_pulang">Jam pulang</label>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="time" class="form-control" name="jam_pulang_awal" id="jam_pulang" value="<?= $absensi->jam_pulang_awal ?>">
                        </div>
                        <div class="col-md-2 text-center">
                            <p>sampai</p>
                        </div>
                        <div class="col-md-5">
                            <input type="time" class="form-control" name="jam_pulang_akhir" id="jam_pulang" value="<?= $absensi->jam_pulang_akhir ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary" name="add"><i class="fa fa-save"></i> simpan</button>
            </form>
        </div>
    </div>

</div>
