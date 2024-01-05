<div class="col-sm-12">
    <br><br>
    <u>
        <h5 class="mb-3">Pendaftaran</h5>
    </u>
    <form class="form-horizontal" method="POST" action="<?= base_url('home/pasien_proccess/' . $id_poli); ?>">
        <div id="scrollformcarddaftar">
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Jadwal</label>
                <div class="col-md-5">
                    <select class="form-control" name="jadwal" id="jadwal" required>
                        <?php
                        if ($dokter != null) {
                        ?>
                            <option value="">Select One</option>
                            <?php
                            foreach ($dokter as $row) :
                                $jadwal = $this->db->get_where('jadwal_periksa', ['id_dokter' => $row->id])->result();
                                foreach ($jadwal as $jwl) :
                            ?>
                                    <option value="<?= $jwl->id ?>"><?= $row->nama ?> - <?= $jwl->hari ?> / <?= $jwl->jam_mulai ?> - <?= $jwl->jam_selesai ?></option>
                            <?php
                                endforeach;

                            endforeach;
                        } else {
                            ?>
                            <option value="">Tidak ada dokter yang bertugas.</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Poli/Klinik</label>
                <div class="col-md-5" style="margin-top: 10px">
                    <select class="form-control" name="poli" id="poli" disabled>
                        <option value="">Select One</option>
                        <?php
                        foreach ($poli as $row) :
                        ?>
                            <option <?php if ($row->id == $id_poli) echo 'selected'; ?> value="<?= $row->id ?>"><?= $row->nama_poli ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">NIK</label>
                <div class="col-md-5">
                    <input type="text" id="nik" required name="nik" class="form-control" maxlength="16" inputmode="numeric" onfocus="javascript:this.removeAttribute('readonly');" autocomplete="off" tabindex="1">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Nama</label>
                <div class="col-md-5">
                    <input type="text" id="nama" required name="nama" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Alamat</label>
                <div class="col-md-5">
                    <input type="text" id="alamat" required name="alamat" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">No Hp</label>
                <div class="col-md-5">
                    <input type="text" id="no_hp" required name="no_hp" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Keluhan</label>
                <div class="col-md-5">
                    <input type="text" id="keluhan" required name="keluhan" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-7">
                    <button class="btn btn-primary btn-block">Submit</button>
                    <button type="button" onclick="history.back()" class="btn btn-danger btn-block">Kembali</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?= $this->session->flashdata('pesan');
 ?>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>