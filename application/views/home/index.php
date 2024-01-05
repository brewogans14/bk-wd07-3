<div class="row" id="card-poli" style="margin-top: 10px;">
    <div class="col-sm-12">
        <h5 class="mb-3">Pilih Poli</h5>
        <div class="row" id="listpolidaily">
            <?php
            foreach ($poli as $row) :
            ?>
                <div class="polidaily col-lg-2 col-6 tile-poli" data-poli="bedah digestif" style="">
                    <a href="<?= base_url('pasien/daftar/') . $row->id ?>" class="btn btn-info waves-effect waves-info width-md btn-block btn-flat" onclick="tabpolitanggal('106','BEDAH DIGESTIF');">
                        <div class="tile-poli-body">
                            <center>
                                <img src="<?= base_url('public/img/') . $row->img ?>" style="float:none;max-width:90px;">
                            </center>
                        </div>
                        <div class="tile-poli-title">
                            <span class="tile-poli-titles" style="font-weight: bold;font-size:20px;">
                                <strong><?= $row->nama_poli ?></strong>
                            </span>
                        </div>
                    </a>
                </div>
            <?php
            endforeach;
            ?>
        </div><!-- end row -->
    </div><!-- end col -->
    <!--<div class="col-sm-2"><div class="row"><div class="col-md-12 col-12"><button type="button" class="btn btn-info btn-block mt-2 box-info-number" onclick="backpoli();"> <i class="fas fa-reply"></i> <strong>Kembali</strong></button></div></div></div>-->
</div>