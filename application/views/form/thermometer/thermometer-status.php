<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Peneraan Thermometer</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('thermometer-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Peneraan Thermometer
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <?php 
                    $datetime = new DateTime($thermometer->date);
                    $formattedDate = $datetime->format('d-m-Y');
                    $result = json_decode($thermometer->peneraan_hasil, true);
                    if (!is_array($result)) $result = [];
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">PENERAAN THERMOMETER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $formattedDate; ?></td>
                            <td colspan="5"></td>
                        </tr>
                        <tr>
                            <td><b>Kode Thermometer</b></td>
                            <td colspan="6"><?= $thermometer->kode_thermo; ?></td>
                        </tr>
                        <tr>
                            <td><b>Area</b></td>
                            <td colspan="6"><?= $thermometer->area; ?></td>
                        </tr>
                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Daftar Hasil Pemeriksaan</td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th>No</th>
                            <th colspan="2">Waktu</th>
                            <th colspan="2">Standar Suhu (°C)</th>
                            <th colspan="2">Hasil</th>
                        </tr>
                        <?php $no = 1; foreach ($result as $row): ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td colspan="2"><?= htmlspecialchars($row['pukul']) ?></td>
                            <td colspan="2"><?= htmlspecialchars($row['standar']) ?></td>
                            <td colspan="2"><?= htmlspecialchars($row['hasil']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td><b>Tindakan Perbaikan</b></td>
                            <td colspan="6"><?= !empty($thermometer->tindakan_perbaikan) ? $thermometer->tindakan_perbaikan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td colspan="6"><?= !empty($thermometer->keterangan) ? $thermometer->keterangan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $thermometer->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= $thermometer->nama_produksi; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- FORM VERIFIKASI -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('thermometer/status/'.$thermometer->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $thermometer->status_spv == 1 ? 'selected' : ''; ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $thermometer->status_spv == 2 ? 'selected' : ''; ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : ''; ?>">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : ''; ?>" name="catatan_spv"><?= $thermometer->catatan_spv; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan_spv')) ? 'd-block' : ''; ?>">
                            <?= form_error('catatan_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('thermometer/verifikasi')?>" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- STYLE -->
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
