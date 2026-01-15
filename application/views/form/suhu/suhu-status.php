<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Suhu Ruang</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('suhu'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Suhu Ruang
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Pemeriksaan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <?php 
                        $datetime = (new DateTime($suhu->date))->format('d-m-Y');
                        ?>
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">PEMERIKSAAN SUHU RUANG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $datetime; ?></td>
                            <td><b>Shift:</b> <?= $suhu->shift; ?></td>
                            <td colspan="4"><b>Pukul:</b> <?= date('H:i', strtotime($suhu->pukul)); ?></td>
                        </tr>
                        <tr class="bg-light">
                            <td colspan="7" class="text-center font-weight-bold">Hasil Pemeriksaan</td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th>Lokasi</th>
                            <th colspan="3">Suhu (°C)</th>
                            <th colspan="3">RH (%)</th>
                        </tr>

                        <?php $lokasi_data = json_decode($suhu->lokasi, true); ?>
                        <?php foreach ($lokasi_data as $row): ?>
                            <tr>
                                <td><?= $row['nama_lokasi'] ?></td>
                                <td colspan="3"><?= $row['suhu'] ?></td>
                                <td colspan="3"><?= !empty($row['rh']) ? $row['rh'] : '-' ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td><b>Catatan</b></td>
                            <td colspan="6"><?= !empty($suhu->catatan) ? $suhu->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $suhu->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= $suhu->nama_produksi ?? 'Belum dikoreksi'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('suhu/status/'.$suhu->uuid); ?>">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1', $suhu->status_spv == 1); ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2', $suhu->status_spv == 2); ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : ''; ?>">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $suhu->catatan_spv; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan_spv')) ? 'd-block' : ''; ?>">
                            <?= form_error('catatan_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success btn-md mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('suhu/verifikasi') ?>" class="btn btn-danger btn-md">
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
        padding: 10px 16px;
        border-radius: 4px;
    }

    .breadcrumb .breadcrumb-item a {
        color: white;
        font-weight: 500;
    }

    .breadcrumb .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    .table {
        width: 100%;
        font-size: 15px;
    }

    .table th,
    .table td {
        padding: 10px;
        vertical-align: middle;
        word-break: break-word;
    }

    .form-label {
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .table th,
        .table td {
            font-size: 14px;
            padding: 8px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
