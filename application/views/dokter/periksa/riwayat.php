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
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#detil" data-toggle="tab">Detail</a></li>
                <li><a href="#obats" data-toggle="tab">Obat</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="detil">
                    <label for="nama">Nama : <?= $pasien->nama ?></label><br>
                    <label for="nama">Keluhan : <?= $pasien->keluhan ?></label><br>
                    <label for="Tanggal Periksa">Tanggal Periksa : <?= $pasien->tgl_periksa ?></label><br>
                    <label for="Catatan">Catatan : <?= $pasien->catatan ?></label><br>
                    <label for="Biaya Periksa">Biaya Periksa : <?= $pasien->biaya_periksa ?></label><br>
                </div>
                <div class="tab-pane" id="obats">
                    <?php
                    $getObat = $this->db->query("SELECT * FROM detail_periksa a LEFT JOIN obat b ON a.id_obat = b.id WHERE a.id_periksa = '$pasien->id'")->result();

                    foreach ($getObat as $row) :
                    ?>
                        <label for="nama">Nama Obat : <?= $row->nama_obat ?></label><br>
                        <label for="nama">Kemasan : <?= $row->kemasan ?></label><br>
                        <label for="Tanggal Periksa">Harga : <?= $row->harga ?></label><br><br>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>