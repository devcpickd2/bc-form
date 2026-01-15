<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Laporan Sensori Finish Good</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('sensori'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Sensori Finish Good
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $tanggal = (new DateTime($sensori->date))->format('d-m-Y'); ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">LAPORAN SENSORI FINISH GOOD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal</b></td>
                            <td colspan="5"><?= $tanggal; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Nama Produk</b></td>
                            <td colspan="5"><?= $sensori->nama_produk; ?></td>
                        </tr>

                        <?php $sensori_produk = json_decode($sensori->produk, true) ?: []; ?>
                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Sensori Produk</td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="2">Kode Produksi / BB</th>
                            <th>Warna</th>
                            <th>Tekstur</th>
                            <th>Rasa</th>
                            <th>Aroma</th>
                            <th>Kenampakan</th>
                        </tr>
                        <?php foreach ($sensori_produk as $row): ?>
                            <tr class="text-center">
                                <td colspan="2"><?= htmlspecialchars($row['kode_produksi']) . ' / ' . htmlspecialchars($row['best_before']); ?></td>
                                <td><?= ($row['warna'] == 'Ok') ? '✔' : (($row['warna'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['warna'])) ?></td>
                                <td><?= ($row['tekstur'] == 'Ok') ? '✔' : (($row['tekstur'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['tekstur'])) ?></td>
                                <td><?= ($row['rasa'] == 'Ok') ? '✔' : (($row['rasa'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['rasa'])) ?></td>
                                <td><?= ($row['aroma'] == 'Ok') ? '✔' : (($row['aroma'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['aroma'])) ?></td>
                                <td><?= ($row['kenampakan'] == 'Ok') ? '✔' : (($row['kenampakan'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['kenampakan'])) ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td colspan="2"><b>Catatan</b></td>
                            <td colspan="5"><?= !empty($sensori->catatan) ? $sensori->catatan : 'Tidak ada'; ?></td>
                        </tr>

                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= htmlspecialchars($sensori->username); ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= $sensori->nama_produksi; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('sensori/status/' . $sensori->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1', $sensori->status_spv == 1); ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2', $sensori->status_spv == 2); ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('status_spv') ? 'd-block' : ''; ?>">
                            <?= form_error('status_spv'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $sensori->catatan_spv; ?></textarea>
                        <div class="invalid-feedback <?= form_error('catatan_spv') ? 'd-block' : ''; ?>">
                            <?= form_error('catatan_spv'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('sensori/verifikasi'); ?>" class="btn btn-danger">
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
        white-space: normal !important;
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
