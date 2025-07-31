<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Sanitasi</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('sanitasi-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Sanitasi
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $datetime = (new DateTime($sanitasi->date))->format('d-m-Y'); ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">PEMERIKSAAN SANITASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $datetime; ?></td>
                            <td colspan="5"><b>Shift:</b> <?= $sanitasi->shift; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Pukul:</b></td>
                            <td colspan="5"><?= date('H:i', strtotime($sanitasi->waktu)); ?></td>
                        </tr>
                        <tr class="text-center bg-light">
                            <th>Area</th>
                            <th>Standar (ppm)</th>
                            <th>Aktual</th>
                            <th>Bukti</th>
                            <th>Suhu Air</th>
                            <th>Keterangan</th>
                            <th>Tindakan</th>
                        </tr>
                        <?php
                        $result = json_decode($sanitasi->area, true) ?? [];
                        foreach ($result as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['sub_area']) ?></td>
                                <td><?= htmlspecialchars($row['standar']) ?></td>
                                <td><?= htmlspecialchars($row['aktual']) ?></td>
                                <td class="text-center">
                                    <?php if (!empty($row['gambar'])): ?>
                                        <img src="<?= base_url('uploads/sanitasi/' . $row['gambar']) ?>" alt="Bukti" style="width: 100px; height: auto;">
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($row['suhu_air']) ?></td>
                                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                <td><?= htmlspecialchars($row['tindakan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="bg-light">
                            <td><b>Catatan</b></td>
                            <td colspan="6"><?= !empty($sanitasi->catatan) ? $sanitasi->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $sanitasi->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= !empty($sanitasi->nama_produksi) ? $sanitasi->nama_produksi : 'Belum dikoreksi'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <form method="post" action="<?= base_url('sanitasi/status/'.$sanitasi->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1', $sanitasi->status_spv == 1); ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2', $sanitasi->status_spv == 2); ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('status_spv') ? 'd-block' : '' ?>">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $sanitasi->catatan_spv; ?></textarea>
                        <div class="invalid-feedback <?= form_error('catatan_spv') ? 'd-block' : '' ?>">
                            <?= form_error('catatan_spv') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <div class="col">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('sanitasi/verifikasi'); ?>" class="btn btn-danger">
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
        padding: 8px 16px;
        border-radius: 0.25rem;
    }

    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .breadcrumb .breadcrumb-item a:hover {
        text-decoration: underline;
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

    .invalid-feedback {
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .table td, .table th {
            font-size: 14px;
            padding: 8px;
        }

        .table img {
            width: 80px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
