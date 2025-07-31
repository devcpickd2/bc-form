<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Stalling</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('produksi')?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Verifikasi Proses Produksi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('produksi/stalling/'.$produksi->uuid);?>">
                <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                <label class="form-label font-weight-bold">Kode Produksi : <?= $produksi->kode_produksi;?></label>
                <hr>

                <div class="form-group row">
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <?php
                        $tanggal_stall = (!empty($produksi->date_stall) && $produksi->date_stall !== '0000-00-00')
                        ? $produksi->date_stall
                        : date('Y-m-d');
                        ?>
                        <input type="date" name="date_stall" 
                        class="form-control <?= form_error('date_stall') ? 'invalid' : '' ?>" 
                        value="<?= $tanggal_stall ?>">
                        <div class="invalid-feedback <?= !empty(form_error('date_stall')) ? 'd-block' : '' ; ?>">
                            <?= form_error('date_stall') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift_pack') ? 'invalid' : '' ?>" name="shift_pack">
                            <option value="1" <?= set_select('shift_pack', '1'); ?> <?= $produksi->shift_pack == 1?'selected':'';?>>1</option>
                            <option value="2" <?= set_select('shift_pack', '2'); ?> <?= $produksi->shift_pack == 2?'selected':'';?>>2</option>
                            <option value="3" <?= set_select('shift_pack', '3'); ?> <?= $produksi->shift_pack == 3?'selected':'';?>>3</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('shift_pack')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('shift_pack') ?>
                        </div>
                    </div>

                </div>

                <hr>
                <label class="form-label font-weight-bold">STALLING</label>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Jam Mulai</label>
                        <input type="time" name="stall_jam_mulai" class="form-control <?= form_error('stall_jam_mulai') ? 'invalid' : '' ?>" value="<?= $produksi->fermen_jam_selesai; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('stall_jam_mulai')) ? 'd-block' : '' ; ?>">
                            <?= form_error('stall_jam_mulai') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Jam Berhenti</label>
                        <input type="time" name="stall_jam_berhenti" class="form-control <?= form_error('stall_jam_berhenti') ? 'invalid' : '' ?>" value="<?= $produksi->stall_jam_berhenti; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('stall_jam_berhenti')) ? 'd-block' : '' ; ?>">
                            <?= form_error('stall_jam_berhenti') ?>
                        </div>
                    </div>
                   <!--  <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Lama Aging (9 - 12 jam)</label>
                        <input type="text" name="stall_aging" class="form-control <?= form_error('stall_aging') ? 'invalid' : '' ?>" value="<?= $produksi->stall_aging; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('stall_aging')) ? 'd-block' : '' ; ?>">
                            <?= form_error('stall_aging') ?>
                        </div>
                    </div> -->
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Kadar Air 32-34 (%)</label>
                        <input type="text" name="stall_kadar_air" class="form-control <?= form_error('stall_kadar_air') ? 'invalid' : '' ?>" value="<?= $produksi->stall_kadar_air; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('stall_kadar_air')) ? 'd-block' : '' ; ?>">
                            <?= form_error('stall_kadar_air') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('produksi')?>" class="btn btn-md btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<style type="text/css">
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>
