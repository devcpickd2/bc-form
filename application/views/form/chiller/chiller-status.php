<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Suhu Chiller</h1>
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('chiller-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Suhu Chiller
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Chiller -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $datetime = (new DateTime($chiller->date))->format('d-m-Y'); ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">PEMERIKSAAN SUHU CHILLER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $datetime; ?></td>
                            <td><b>Pukul:</b> <?= date('H:i', strtotime($chiller->waktu)); ?></td>
                            <td colspan="4"></td>
                        </tr>
                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Hasil Pemeriksaan</td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="3">Chiller</th>
                            <th colspan="4">Suhu (°C)</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><b>Chiller No. 1</b></td>
                            <td colspan="4"><?= $chiller->chiller_1; ?> °C</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><b>Chiller No. 2</b></td>
                            <td colspan="4"><?= $chiller->chiller_2; ?> °C</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><b>Chiller No. 3</b></td>
                            <td colspan="4"><?= $chiller->chiller_3; ?> °C</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><b>Chiller No. 4</b></td>
                            <td colspan="4"><?= $chiller->chiller_4; ?> °C</td>
                        </tr>
                        <tr class="bg-light">
                            <td><b>Catatan</b></td>
                            <td colspan="6"><?= !empty($chiller->catatan) ? $chiller->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $chiller->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= !empty($chiller->nama_produksi) ? $chiller->nama_produksi : 'Belum dikoreksi'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi Supervisor -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <form method="post" action="<?= base_url('chiller/status/'.$chiller->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1', $chiller->status_spv == 1); ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2', $chiller->status_spv == 2); ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('status_spv') ? 'd-block' : '' ?>">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $chiller->catatan_spv; ?></textarea>
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
                        <a href="<?= base_url('chiller/verifikasi'); ?>" class="btn btn-danger">
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

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
