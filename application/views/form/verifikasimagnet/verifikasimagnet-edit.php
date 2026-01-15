<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Verifikasi Magnet Trap</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('verifikasimagnet') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Magnet Trap
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('verifikasimagnet/edit/' . $verifikasimagnet->uuid); ?>" enctype="multipart/form-data">

                <!-- Tanggal & Shift -->
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>" value="<?= set_value('date', $verifikasimagnet->date); ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>" name="shift">
                            <option value="1" <?= $verifikasimagnet->shift == 1 ? 'selected' : '' ?>>1</option>
                            <option value="2" <?= $verifikasimagnet->shift == 2 ? 'selected' : '' ?>>2</option>
                            <option value="3" <?= $verifikasimagnet->shift == 3 ? 'selected' : '' ?>>3</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift') ?></div>
                    </div>
                </div>

                <!-- Produk & Kode Produksi -->
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_produk', $verifikasimagnet->nama_produk); ?>">
                        <div class="invalid-feedback"><?= form_error('nama_produk') ?></div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Kode Produksi</label>
                        <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_produksi', $verifikasimagnet->kode_produksi); ?>">
                        <div class="invalid-feedback"><?= form_error('kode_produksi') ?></div>
                    </div>
                </div>

                <!-- Jumlah & Bukti Temuan -->
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Jumlah Temuan</label>
                        <input type="number" name="jumlah_temuan" class="form-control <?= form_error('jumlah_temuan') ? 'is-invalid' : '' ?>" value="<?= set_value('jumlah_temuan', $verifikasimagnet->jumlah_temuan); ?>">
                        <div class="invalid-feedback"><?= form_error('jumlah_temuan') ?></div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Bukti Temuan</label>
                        <input type="file" name="bukti_temuan" class="form-control <?= form_error('bukti_temuan') ? 'is-invalid' : '' ?>">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                        <?php if (!empty($verifikasimagnet->bukti_temuan)): ?>
                            <p>
                                <a href="<?= base_url('uploads/bukti_temuan/' . $verifikasimagnet->bukti_temuan) ?>" target="_blank" class="text-primary">
                                    <i class="fa fa-image"></i> Lihat Bukti Lama
                                </a>
                            </p>
                        <?php endif; ?>
                        <div class="invalid-feedback"><?= form_error('bukti_temuan') ?></div>
                    </div>
                </div>

                <!-- Keterangan & Catatan -->
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control <?= form_error('keterangan') ? 'is-invalid' : '' ?>" name="keterangan"><?= set_value('keterangan', $verifikasimagnet->keterangan); ?></textarea>
                        <div class="invalid-feedback"><?= form_error('keterangan') ?></div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control <?= form_error('catatan') ? 'is-invalid' : '' ?>" name="catatan"><?= set_value('catatan', $verifikasimagnet->catatan); ?></textarea>
                        <div class="invalid-feedback"><?= form_error('catatan') ?></div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('verifikasimagnet') ?>" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>
