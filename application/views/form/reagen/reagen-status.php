<div class="container-fluid">
    <!-- Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold text-center">Detail Verifikasi Penggunaan Reagen Klorin</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'].'?search='.urlencode($this->input->get('search')) : base_url('reagen'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Reagen Klorin
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $tanggal = (new DateTime($reagen->date))->format('d-m-Y');
                $best_before = (new DateTime($reagen->best_before))->format('d-m-Y');
                $tgl_buka = (new DateTime($reagen->tgl_buka_botol))->format('d-m-Y');
                ?>
                <table class="table table-bordered">
                    <thead class="text-center bg-light font-weight-bold">
                        <tr>
                            <th colspan="7">VERIFIKASI PENGGUNAAN REAGEN KLORIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td colspan="6"><?= $tanggal; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Larutan</strong></td>
                            <td colspan="6"><?= $reagen->nama_larutan; ?></td>
                        </tr>
                        <tr>
                            <td><strong>No. Lot</strong></td>
                            <td colspan="6"><?= $reagen->no_lot; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Best Before</strong></td>
                            <td colspan="6"><?= $best_before; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Buka Botol</strong></td>
                            <td colspan="6"><?= $tgl_buka; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Volume Penggunaan</strong></td>
                            <td colspan="6"><?= $reagen->volume_penggunaan; ?> mL</td>
                        </tr>
                        <tr>
                            <td><strong>Volume Akhir</strong></td>
                            <td colspan="6"><?= $reagen->volume_akhir; ?> mL</td>
                        </tr>
                        <tr>
                            <td><strong>Catatan</strong></td>
                            <td colspan="6"><?= !empty($reagen->catatan) ? $reagen->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td><strong>QC</strong></td>
                            <td colspan="6"><?= $reagen->username; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Verifikasi Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('reagen/status/'.$reagen->uuid);?>">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Status Supervisor</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= $reagen->status_spv == 1 ? 'selected' : ''; ?>>Verified</option>
                            <option value="2" <?= $reagen->status_spv == 2 ? 'selected' : ''; ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('status_spv') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $reagen->catatan_spv; ?></textarea>
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
                        <a href="<?= base_url('reagen/verifikasi') ?>" class="btn btn-danger btn-md">
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
        border-radius: 0.25rem;
    }

    .breadcrumb a {
        color: #fff;
        font-weight: 500;
    }

    .table {
        width: 100%;
        font-size: 15px;
    }

    .table th, .table td {
        padding: 10px 14px;
        border: 1px solid #dee2e6;
        vertical-align: top;
        white-space: normal;
    }

    .table thead th {
        background-color: #f8f9fa;
    }

    .invalid-feedback {
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .table th, .table td {
            font-size: 14px;
            padding: 8px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
