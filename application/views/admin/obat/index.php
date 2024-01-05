<?= $this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    List Daftar Obat
                </h3><br>
                <a href="<?= base_url('admin/obat/add') ?>" class="btn btn-primary btn-xs">+ Obat</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Obat</th>
                            <th>Kemasan</th>
                            <th>Harga</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $obat = $this->db->get('obat')->result();
                        $i = 1;
                        foreach ($obat as $row) :
                        ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row->nama_obat; ?></td>
                                <td><?= $row->kemasan; ?></td>
                                <td>Rp. <?= number_format($row->harga, 0, '.', '.'); ?></td>
                                <td>
                                    <a href="<?= base_url('admin/obat/update/') . $row->id ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('admin/obat/delete/') . $row->id ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>