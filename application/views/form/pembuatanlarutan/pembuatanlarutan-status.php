<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold text-center">
        Detail Pemeriksaan Pembuatan Larutan
    </h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pembuatanlarutan-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Pembuatan Larutan
                </a>
            </li>
        </ol>
    </nav>

    <!-- Informasi Larutan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                    $tanggal = (new DateTime($pembuatanlarutan->date))->format('d-m-Y');
                    $expired = (new DateTime($pembuatanlarutan->expired))->format('d-m-Y');
                    $jam = (new DateTime($pembuatanlarutan->pukul))->format('H:i');
                ?>
                <table class="table table-bordered table-style">
                    <thead class="text-center font-weight-bold">
                        <tr>
                            <th colspan="8">PEMERIKSAAN PEMBUATAN LARUTAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td colspan="2"><?= $tanggal; ?></td>
                            <td><strong>Jam</strong></td>
                            <td colspan="4"><?= $jam; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Area</strong></td>
                            <td colspan="7"><?= htmlspecialchars($pembuatanlarutan->area); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Chemical</strong></td>
                            <td colspan="7"><?= htmlspecialchars($pembuatanlarutan->nama_chemical); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Expired</strong></td>
                            <td colspan="7"><?= $expired; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Konsentrasi Larutan (ppm)</strong></td>
                            <td colspan="7"><?= htmlspecialchars($pembuatanlarutan->konsentrasi); ?></td>
                        </tr>
                        <tr class="text-center bg-light font-weight-bold">
                            <td></td>
                            <td>Larutan Beku</td>
                            <td colspan="6">Air</td>
                        </tr>
                        <tr class="text-center">
                            <td><strong>Pengenceran</strong></td>
                            <td><?= htmlspecialchars($pembuatanlarutan->larutan_beku); ?></td>
                            <td colspan="6"><?= htmlspecialchars($pembuatanlarutan->air); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Catatan</strong></td>
                            <td colspan="7"><?= !empty($pembuatanlarutan->catatan) ? htmlspecialchars($pembuatanlarutan->catatan) : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td><strong>QC</strong></td>
                            <td colspan="7"><?= htmlspecialchars($pembuatanlarutan->username); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('pembuatanlarutan/status/' . $pembuatanlarutan->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Status</label>
                        <select name="status_spv" class="form-control <?= form_error('status_spv') ? 'is-invalid' : ''; ?>">
                            <option value="1" <?= set_select('status_spv', '1', $pembuatanlarutan->status_spv == 1); ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2', $pembuatanlarutan->status_spv == 2); ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ?>">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Catatan Revisi</label>
                        <textarea name="catatan_spv" class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : ''; ?>"><?= set_value('catatan_spv', $pembuatanlarutan->catatan_spv); ?></textarea>
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
                        <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url('pembuatanlarutan/verifikasi'); ?>" class="btn btn-danger btn-md">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- CSS Tambahan -->
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

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .table-style {
        font-size: 15px;
        width: 100%;
        border-collapse: collapse;
    }

    .table-style th,
    .table-style td {
        padding: 10px 12px;
        border: 1px solid #dee2e6;
        vertical-align: middle;
        word-break: break-word;
    }

    .table-style thead th {
        background-color: #f8f9fa;
    }

    @media (max-width: 768px) {
        .table-style th, .table-style td {
            font-size: 13px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }

    .invalid-feedback {
        font-size: 0.875rem;
    }
</style>
