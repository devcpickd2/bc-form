<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Verifikasi Residu Klorin</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('residu'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Residu Klorin
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $datetime = (new DateTime($residu->date))->format('d-m-Y'); ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">VERIFIKASI RESIDU KLORIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Tanggal</b></td>
                            <td colspan="6"><?= $datetime; ?></td>
                        </tr>
                        <tr>
                            <td><b>Area</b></td>
                            <td colspan="6"><?= $residu->area; ?></td>
                        </tr>
                        <tr>
                            <td><b>Titik Sampling</b></td>
                            <td colspan="6"><?= $residu->titik_sampling; ?></td>
                        </tr>
                        <tr>
                            <td><b>Standar</b></td>
                            <td colspan="6"><?= $residu->standar; ?> PPM</td>
                        </tr>
                        <tr>
                            <td><b>Hasil Pemeriksaan</b></td>
                            <td colspan="6"><?= $residu->hasil_pemeriksaan; ?> PPM</td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td colspan="6"><?= $residu->keterangan; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tindakan Koreksi</b></td>
                            <td colspan="6"><?= $residu->tindakan; ?></td>
                        </tr>
                        <tr>
                            <td><b>Verifikasi</b></td>
                            <td colspan="6"><?= $residu->verifikasi; ?></td>
                        </tr>
                        <tr>
                            <td><b>Catatan</b></td>
                            <td colspan="6"><?= !empty($residu->catatan) ? $residu->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $residu->username; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Verifikasi Form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="post" action="<?= base_url('residu/status/'.$residu->uuid);?>">
            <div class="form-group row">
                <div class="col-md-6">
                    <label class="font-weight-bold">Status Supervisor</label>
                    <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                        <option value="1" <?= $residu->status_spv == 1 ? 'selected' : ''; ?>>Verified</option>
                        <option value="2" <?= $residu->status_spv == 2 ? 'selected' : ''; ?>>Revision</option>
                    </select>
                    <div class="invalid-feedback"><?= form_error('status_spv') ?></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label class="font-weight-bold">Catatan Revisi</label>
                    <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $residu->catatan_spv; ?></textarea>
                    <div class="invalid-feedback <?= !empty(form_error('catatan_spv')) ? 'd-block' : '' ?>">
                        <?= form_error('catatan_spv') ?>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-success btn-md mr-2">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('residu/verifikasi') ?>" class="btn btn-danger btn-md">
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
