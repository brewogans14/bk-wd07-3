<?= $this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    List Daftar Pasien
                </h3><br>
                <!-- <a href="<?= base_url('admin/obat/add') ?>" class="btn btn-primary btn-xs">+ Obat</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No KTP</th>
                            <th>No HP</th>
                            <th>No RM</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                        foreach ($pasien as $row) :
                            if ($users->id == $row->id_dokter) {
                        ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->alamat ?></td>
                                    <td><?= $row->no_ktp ?></td>
                                    <td><?= $row->no_hp ?></td>
                                    <td><?= $row->no_rm ?></td>
                                    <td>
                                        <a href="<?= base_url('dokter/riwayat/periksa/') . $row->id_pasien ?>" class="btn btn-xs btn-success"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>