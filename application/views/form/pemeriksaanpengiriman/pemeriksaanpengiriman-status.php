<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pemeriksaanpengiriman-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Pemeriksaan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                $datetime = new DateTime($pemeriksaanpengiriman->date);
                $datetime = $datetime->format('d-m-Y');
                $timing = new DateTime($pemeriksaanpengiriman->jam_datang);
                $timing = $timing->format('H:i');
                ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="font-weight-bold">PEMERIKSAAN PENGIRIMAN RM, SEASONING, KEMASAN DAN CHEMICAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3"><b>Tanggal</b></td>
                            <td colspan="6"><?= $datetime; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Nama Supplier</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->nama_supplier; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Nama Barang</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->nama_barang; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Jenis Mobil Pengangkut</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->jenis_mobil; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>No. Polisi</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->no_polisi; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Identitas Pengirim</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->identitas_pengantar; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="9">KONDISI MOBIL</th>
                        </tr>
                        <tr class="text-center">
                            <td><b>Segel</b></td>
                            <td><b>Kebersihan</b></td>
                            <td><b>Bocor</b></td>
                            <td><b>Hama</b></td>
                            <td colspan="5"><b>Jam Datang</b></td>
                        </tr>
                        <tr class="text-center">
                            <td><?= icon_check($pemeriksaanpengiriman->segel); ?></td>
                            <td><?= icon_check($pemeriksaanpengiriman->kebersihan); ?></td>
                            <td><?= icon_check($pemeriksaanpengiriman->bocor); ?></td>
                            <td><?= icon_check($pemeriksaanpengiriman->hama); ?></td>
                            <td colspan="5"><?= $timing; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Keterangan</b></td>
                            <td colspan="6"><?= !empty($pemeriksaanpengiriman->keterangan) ? $pemeriksaanpengiriman->keterangan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>QC</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->username; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('pemeriksaanpengiriman/status/' . $pemeriksaanpengiriman->uuid); ?>">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $pemeriksaanpengiriman->status_spv == 1 ? 'selected' : ''; ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $pemeriksaanpengiriman->status_spv == 2 ? 'selected' : ''; ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('status_spv') ? 'd-block' : ''; ?>">
                            <?= form_error('status_spv'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $pemeriksaanpengiriman->catatan_spv; ?></textarea>
                        <div class="invalid-feedback <?= form_error('catatan_spv') ? 'd-block' : ''; ?>">
                            <?= form_error('catatan_spv'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('pemeriksaanpengiriman/verifikasi') ?>" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- Style -->
<style>
    .breadcrumb {
        background-color: #2E86C1;
        padding: 10px 16px;
        border-radius: 0.25rem;
    }

    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .table {
        font-size: 15px;
        width: 100%;
    }

    .table td, .table th {
        padding: 10px 12px;
        vertical-align: middle;
        word-break: break-word;
    }

    .form-label {
        font-weight: 600;
    }
</style>

<!-- Helper untuk ikon -->
<?php
function icon_check($val) {
    return $val == 'ok' ? '✔️' : ($val == 'tidak ok' ? '❌' : '−');
}
?>
