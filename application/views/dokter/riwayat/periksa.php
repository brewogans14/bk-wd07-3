<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <h3 class="profile-username text-center"><?= $pasien->no_antrian ?></h3>

                <p class="text-muted text-center"><?= $pasien->nama ?></p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Alamat</b> <a class="pull-right"><?= $pasien->alamat ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>No KTP</b> <a class="pull-right"><?= $pasien->no_ktp ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>No HP</b> <a class="pull-right"><?= $pasien->no_hp ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>No RM</b> <a class="pull-right"><?= $pasien->no_rm ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#periksa" data-toggle="tab">Periksa</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="periksa">
                    <form role="form" method="POST" action="<?= base_url('dokter/riwayat/periksa/') . $pasien->id_pasien ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="poli">Poli</label>
                                <input type="text" readonly value="<?= $poli_dokter->nama_poli ?>" class="form-control" name="poli" id="poli" placeholder="">
                                <input type="hidden" name="id_daftar_poli" value="<?= $pasien->id_pasien ?>">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_periksa">Tanggal Periksa</label>
                                <input type="datetime-local" value="<?= date("Y-m-d H:i:s") ?>" class="form-control" name="tanggal_periksa" id="tanggal_periksa">
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <input type="text" class="form-control" name="catatan" id="catatan">
                            </div>
                            <div class="form-group">
                                <label for="catatan">Obat</label>
                                <select id="obat" class="form-control select2" multiple="multiple" name="obat[]" data-placeholder="Pilih Obat" style="width: 100%;">
                                    <?php
                                    $obat = $this->db->get('obat')->result();
                                    foreach ($obat as $row) :
                                    ?>
                                        <option data-id="<?= $row->id ?>" value="<?= $row->harga ?>"><?= $row->nama_obat ?> <?= $row->kemasan ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catatan" id="total">Total Biaya : Rp. 0</label>
                                <input type="hidden" name="total" value="" id="totalnya">
                                <input type="hidden" name="id_obat" value="" id="id_obat">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>