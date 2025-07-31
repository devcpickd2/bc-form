<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-3 text-center text-gray-800 font-weight-bold">Pemeriksaan Benda Mudah Pecah</h1> -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pecahbelah'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Benda Mudah Pecah
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                $datetime = new DateTime($pecahbelah->date);
                $formattedDate = $datetime->format('d-m-Y');
                $breakable = json_decode($pecahbelah->benda_pecah, true);
                if (!is_array($breakable)) $breakable = [];
                ?>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th colspan="8" class="font-weight-bold">PEMERIKSAAN BENDA MUDAH PECAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $formattedDate; ?></td>
                            <td colspan="6"><b>Shift:</b> <?= $pecahbelah->shift; ?></td>
                        </tr>

                        <tr class="bg-light text-center">
                            <td colspan="8" class="font-weight-bold">Daftar Alat</td>
                        </tr>

                        <tr class="table-primary text-center">
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Area</th>
                            <th>Pemilik</th>
                            <th>Jumlah</th>
                            <th>Awal Shift</th>
                            <th>Akhir Shift</th>
                            <th>Keterangan</th>
                        </tr>

                        <?php $no = 1; foreach ($breakable as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                            <td><?= htmlspecialchars($row['area']) ?></td>
                            <td><?= htmlspecialchars($row['pemilik']) ?></td>
                            <td><?= htmlspecialchars($row['jumlah']) ?></td>
                            <td><?= htmlspecialchars($row['kondisi_awal']) ?></td>
                            <td><?= htmlspecialchars($row['kondisi_akhir']) ?></td>
                            <td><?= htmlspecialchars($row['keterangan']) ?></td>
                        </tr>
                        <?php endforeach; ?>

                        <tr class="table-primary text-center">
                            <th colspan="8">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC Awal Shift</b></td>
                            <td colspan="6"><?= htmlspecialchars($pecahbelah->username); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC Akhir Shift</b></td>
                            <td colspan="6"><?= htmlspecialchars($pecahbelah->qc_update); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Produksi</b></td>
                            <td colspan="6"><?= htmlspecialchars($pecahbelah->nama_produksi); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi SPV -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('pecahbelah/status/'.$pecahbelah->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $pecahbelah->status_spv == 1?'selected':''; ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $pecahbelah->status_spv == 2?'selected':''; ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('status_spv') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $pecahbelah->catatan_spv; ?></textarea>
                        <div class="invalid-feedback"><?= form_error('catatan_spv') ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url('pecahbelah/verifikasi') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .table {
        width: 100%;
        font-size: 15px;
        margin: 0 auto;
    }

    .table th, .table td {
        padding: 10px;
        text-align: left;
        white-space: normal !important;
    }

    .table th:first-child,
    .table td:first-child {
        text-align: center;
    }

    @media (max-width: 768px) {
        .table td, .table th {
            font-size: 14px;
        }
    }
</style>

