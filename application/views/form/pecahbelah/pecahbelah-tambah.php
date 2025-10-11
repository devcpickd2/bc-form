<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Benda Mudah Pecah<</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('pecahbelah') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Benda Mudah Pecah
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('pecahbelah/tambah'); ?>" enctype="multipart/form-data">
                <?php
                $produksi_data = $this->session->userdata('produksi_data');
                $tanggal_sess = $produksi_data['tanggal'] ?? date('Y-m-d');
                $shift_sess = $produksi_data['shift'] ?? '';
                ?>
                <div class="form-group row">
                  <div class="col-md-4">
                    <label class="font-weight-bold">Tanggal</label>
                    <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>"
                    value="<?= set_value('date', $tanggal_sess) ?>">
                    <div class="invalid-feedback"><?= form_error('date') ?></div>
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Shift</label>
                    <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
                        <option disabled <?= empty($shift_sess) ? 'selected' : '' ?>>Pilih Shift</option>
                        <option value="1" <?= set_select('shift', '1', $shift_sess == '1') ?>>Shift 1</option>
                        <option value="2" <?= set_select('shift', '2', $shift_sess == '2') ?>>Shift 2</option>
                        <option value="3" <?= set_select('shift', '3', $shift_sess == '3') ?>>Shift 3</option>
                    </select>
                    <div class="invalid-feedback"><?= form_error('shift') ?></div>
                </div>
            </div>

            <hr>
            <h5 class="font-weight-bold mb-3">Checklist Benda Mudah Pecah</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-sm align-middle text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Benda</th>
                            <th>Area</th>
                            <th>Pemilik</th>
                            <th>Jumlah</th>
                            <th>Kondisi Awal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($benda_list as $i => $benda): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td class="text-left">
                                    <input type="hidden" name="nama_barang[]" value="<?= htmlspecialchars($benda->nama_benda) ?>">
                                    <?= htmlspecialchars($benda->nama_benda) ?>
                                </td>
                                <td class="text-left">
                                    <input type="hidden" name="pemilik[]" value="<?= htmlspecialchars($benda->pemilik) ?>">
                                    <?= htmlspecialchars($benda->pemilik) ?>
                                </td>
                                <td class="text-left">
                                    <input type="hidden" name="area[]" value="<?= htmlspecialchars($benda->area) ?>">
                                    <?= htmlspecialchars($benda->area) ?>
                                </td>
                                <td>
                                    <input type="text" name="jumlah[]" value="<?= htmlspecialchars($benda->jumlah) ?>">
                                    <!-- <?= htmlspecialchars($benda->jumlah) ?> -->
                                </td>
                                <td>
                                    <input type="checkbox" name="kondisi_awal[<?= $i ?>]" value="Ok">
                                </td>
                                <td>
                                    <input type="text" name="keterangan[]" class="form-control form-control-sm">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('pecahbelah') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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
    }
    .input-lainnya-wrapper {
        margin-top: 10px;
    }
    th, td {
        vertical-align: middle !important;
    }
    .table th {
        background-color: #3498DB;
        color: white;
    }
</style>
