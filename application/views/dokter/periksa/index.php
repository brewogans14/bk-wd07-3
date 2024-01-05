<?= $this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    List Daftar Riwayat Periksa
                </h3><br>
                <!-- <a href="<?= base_url('admin/obat/add') ?>" class="btn btn-primary btn-xs">+ Obat</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Periksa</th>
                            <th>Catatan</th>
                            <th>Biaya Periksa</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $periksa = $this->db->query("SELECT * FROM periksa")->result();
                        foreach ($periksa as $p) {
                            foreach ($pasien as $row) :
                                if ($users->id == $row->id_dokter) {
                                    if ($row->id_pasien == $p->id_daftar_poli) {
                                        $i = 1;
                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->tgl_periksa ?></td>
                                            <td><?= $row->catatan ?></td>
                                            <td><?= $row->biaya_periksa ?></td>
                                            <td>
                                                <a href="<?= base_url('dokter/periksa/riwayat/') . $row->id_pasien ?>" class="btn btn-xs btn-success"><i class="fa fa-search"></i></a>
                                            </td>
                                        </tr>
                        <?php
                                    }
                                }
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>