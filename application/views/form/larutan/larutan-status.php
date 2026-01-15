<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</h1>
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('larutan'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Pembuatan Larutan
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $datetime = (new DateTime($larutan->date))->format('d-m-Y'); ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="text-center font-weight-bold">PEMBUATAN LARUTAN CLEANING DAN SANITASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Tanggal:</strong></td>
                            <td colspan="3"><?= $datetime; ?></td>
                            <td><strong>Shift:</strong></td>
                            <td colspan="4"><?= $larutan->shift; ?></td>
                        </tr>
                        <tr class="bg-light text-center">
                            <th>Nama Bahan</th>
                            <th>Kadar</th>
                            <th>Kimia (ml)</th>
                            <th>Air (ml)</th>
                            <th>Volume</th>
                            <th>Kebutuhan</th>
                            <th>Keterangan</th>
                            <th colspan="2">Tindakan & Verifikasi</th>
                        </tr>
                        <?php 
                        $bahan_data = json_decode($larutan->nama_bahan, true);
                        if ($bahan_data && is_array($bahan_data)) :
                            foreach ($bahan_data as $row): ?>
                                <tr class="text-center">
                                    <td><?= $row['bahan'] ?? '-' ?></td>
                                    <td><?= $row['kadar'] ?? '-' ?></td>
                                    <td><?= $row['bahan_kimia'] ?? '-' ?></td>
                                    <td><?= $row['air_bersih'] ?? '-' ?></td>
                                    <td><?= $row['volume_akhir'] ?? '-' ?></td>
                                    <td><?= $row['kebutuhan'] ?? '-' ?></td>
                                    <td><?= $row['keterangan'] ?? '-' ?></td>
                                    <td colspan="2">
                                        <?= !empty($row['tindakan']) ? '<strong>T:</strong> ' . $row['tindakan'] . '<br>' : '' ?>
                                        <?= !empty($row['verifikasi']) ? '<strong>V:</strong> ' . $row['verifikasi'] : '' ?>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr>
                                <td colspan="9" class="text-center text-danger">Data bahan tidak tersedia</td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td><strong>Catatan</strong></td>
                            <td colspan="8"><?= !empty($larutan->catatan) ? $larutan->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td><strong>QC</strong></td>
                            <td colspan="8"><?= $larutan->username; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Produksi</strong></td>
                            <td colspan="8"><?= $larutan->nama_produksi; ?></td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <form method="post" action="<?= base_url('larutan/status/' . $larutan->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1', $larutan->status_spv == 1); ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2', $larutan->status_spv == 2); ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('status_spv') ? 'd-block' : ''; ?>">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $larutan->catatan_spv; ?></textarea>
                        <div class="invalid-feedback <?= form_error('catatan_spv') ? 'd-block' : ''; ?>">
                            <?= form_error('catatan_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-md mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('larutan/verifikasi') ?>" class="btn btn-danger btn-md">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- CSS -->
<style>
    .breadcrumb {
        background-color: #2E86C1;
        padding: 10px 16px;
        border-radius: 0.35rem;
    }

    .breadcrumb a {
        color: #fff;
        font-weight: 500;
    }

    .table {
        width: 100%;
        font-size: 15px;
    }

    .table td, .table th {
        padding: 10px 12px;
        vertical-align: middle;
        word-break: break-word;
    }

    @media (max-width: 768px) {
        .table td, .table th {
            font-size: 14px;
            padding: 8px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
