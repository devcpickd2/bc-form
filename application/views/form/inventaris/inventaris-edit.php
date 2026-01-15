<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Checklist Inventaris Peralatan QC Bread Crumb</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('inventaris') ?>"><i class="fas fa-arrow-left"></i> Kembali</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('inventaris/edit/' . $inventaris->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?>" value="<?= htmlspecialchars($inventaris->date) ?>">
                        <div class="invalid-feedback <?= form_error('date') ? 'd-block' : '' ?>"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option disabled>Pilih Shift</option>
                            <option value="1" <?= $inventaris->shift == 1 ? 'selected' : '' ?>>Shift 1</option>
                            <option value="2" <?= $inventaris->shift == 2 ? 'selected' : '' ?>>Shift 2</option>
                            <option value="3" <?= $inventaris->shift == 3 ? 'selected' : '' ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('shift') ? 'd-block' : '' ?>"><?= form_error('shift') ?></div>
                    </div>
                </div>

                <hr>
                <label class="font-weight-bold">Checklist Alat</label>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th style="width: 30%">Nama Alat</th>
                                <th style="width: 10%">Jumlah</th>
                                <th style="width: 20%">Kondisi Awal</th>
                                <th style="width: 20%">Kondisi Akhir</th>
                                <th style="width: 20%">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $opsi_kondisi = ['Tidak Tersedia', 'Baik', 'Rusak', 'Hilang', 'Bersih', 'Kotor', 'Habis', 'Baik Bersih Masih'];
                            $peralatan = json_decode($inventaris->peralatan);

                            foreach ($peralatan as $index => $item): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($item->nama_alat) ?>
                                        <input type="hidden" name="nama_alat[]" value="<?= htmlspecialchars($item->nama_alat) ?>">
                                    </td>
                                    <td class="text-center">
                                        <?= htmlspecialchars($item->jumlah) ?>
                                        <input type="hidden" name="jumlah[]" value="<?= htmlspecialchars($item->jumlah) ?>">
                                    </td>
                                    <td>
                                        <select name="kondisi_awal[<?= $index ?>]" class="form-control form-control-sm">
                                            <option value="" disabled>Pilih Kondisi</option>
                                            <?php foreach ($opsi_kondisi as $val): ?>
                                                <option value="<?= $val ?>" <?= $item->kondisi_awal == $val ? 'selected' : '' ?>><?= $val ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="kondisi_akhir[<?= $index ?>]" class="form-control form-control-sm">
                                            <option value="" disabled>Pilih Kondisi</option>
                                            <?php foreach ($opsi_kondisi as $val): ?>
                                                <option value="<?= $val ?>" <?= $item->kondisi_akhir == $val ? 'selected' : '' ?>><?= $val ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" class="form-control form-control-sm" value="<?= htmlspecialchars($item->keterangan) ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    <a href="<?= base_url('inventaris') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>
