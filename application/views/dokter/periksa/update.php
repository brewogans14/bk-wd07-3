<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Data Obat</h3>
            </div>
            <form role="form" action="<?= base_url('admin/obat/update/') . $obat->id ?>" method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control" id="nama_obat" value="<?= $obat->nama_obat ?>" name="nama_obat" placeholder="Nama Obat">
                        <?= form_error('nama_obat','<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kemasan">Kemasan</label>
                        <input type="text" class="form-control" id="kemasan" value="<?= $obat->kemasan ?>" name="kemasan" placeholder="Kemasan">
                        <?= form_error('kemasan','<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga (Rp.)</label>
                        <input type="number" class="form-control" id="harga" value="<?= $obat->harga ?>" name="harga" placeholder="Harga">
                        <?= form_error('harga','<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button onclick="history.back()" type="button" class="btn btn-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>