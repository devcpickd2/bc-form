<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Checklist Inventaris Peralatan QC Bread Crumb</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('inventaris') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Checklist Inventaris Peralatan QC Bread Crumb
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('inventaris/tambah'); ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?>" value="<?= date("Y-m-d") ?>">
                        <div class="invalid-feedback <?= form_error('date') ? 'd-block' : '' ?>"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option disabled selected>Pilih Shift</option>
                            <option value="1" <?= set_select('shift', 1) ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', 2) ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', 3) ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('shift') ? 'd-block' : '' ?>"><?= form_error('shift') ?></div>
                    </div>
                </div>
                <hr>

                <div class="form-area" id="form-inventaris-wrapper">
                    <label class="form-label font-weight-bold">Checklist Alat</label>
                    <div class="inventaris-group border p-3 mb-3 rounded bg-light" data-index="0">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Nama Alat</label>
                                <select class="form-control select2-alat" name="nama_alat[]" style="width: 100%;">
                                    <option value="Adaptor Timbangan Mettler Toledo">Adaptor Timbangan Mettler Toledo</option>
                                    <option value="Timbangan Mettler Toledo">Timbangan Mettler Toledo</option>
                                    <option value="Anak Timbang 10 kg">Anak Timbang 10 kg</option>
                                    <option value="Moisture Analyzer Mettler Toledo">Moisture Analyzer Mettler Toledo</option>
                                    <option value="Stabilizer">Stabilizer</option>
                                    <option value="Bolpoin">Bolpoin</option>
                                    <option value="Spidol">Spidol</option>
                                    <option value="Gunting">Gunting</option>
                                    <option value="Penggaris Logam">Penggaris Logam</option>
                                    <option value="Buku Estafet QC">Buku Estafet QC</option>
                                    <option value="Buku Instruksi Kerja">Buku Instruksi Kerja</option>
                                    <option value="Buku Memo">Buku Memo</option>
                                    <option value="Dispenser Lakban 1 Inch">Dispenser Lakban 1 Inch</option>
                                    <option value="Meja QC">Meja QC</option>
                                    <option value="Papan Jalan">Papan Jalan</option>
                                    <option value="Sarung Tangan Hijau">Sarung Tangan Hijau</option>
                                    <option value="Spray Alkohol">Spray Alkohol</option>
                                    <option value="Test Piece (Fe 1.5;Non Fe 3.0;SUS 2.5)">Test Piece (Fe 1.5;Non Fe 3.0;SUS 2.5)</option>
                                    <option value="Thermometer (Preparasi)">Thermometer (Preparasi)</option>
                                    <option value="Thermometer (Cooking/Packing)">Thermometer (Cooking/Packing)</option>
                                    <option value="Thermometer Ruang">Thermometer Ruang</option>
                                    <option value="Gelas Ukur 1 L">Gelas Ukur 1 L</option>
                                    <option value="Kalkulator">Kalkulator</option>
                                    <option value="Plastik Clipper (laporan)">Plastik Clipper (laporan)</option>
                                    <option value="Stopwatch">Stopwatch</option>
                                    <option value="Carry Box">Carry Box</option>
                                    <option value="Toolbox Hitam">Toolbox Hitam</option>
                                    <option value="Pinset">Pinset</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah[]" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan[]" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label><strong>Kondisi Awal Shift</strong></label>
                            <div class="row kondisi-wrapper">
                                <div class="col-6">
                                    <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Tidak Tersedia" class="form-check-input"><label class="form-check-label">Tidak Tersedia</label></div>
                                    <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Baik" class="form-check-input"><label class="form-check-label">Baik</label></div>
                                    <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Rusak" class="form-check-input"><label class="form-check-label">Rusak</label></div>
                                    <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Hilang" class="form-check-input"><label class="form-check-label">Hilang</label></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Bersih" class="form-check-input"><label class="form-check-label">Bersih</label></div>
                                    <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Kotor" class="form-check-input"><label class="form-check-label">Kotor</label></div>
                                    <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Habis" class="form-check-input"><label class="form-check-label">Habis</label></div>
                                    <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Baik Bersih Masih" class="form-check-input"><label class="form-check-label">Baik Bersih Masih</label></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-sm-3 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-2" id="add-inventaris">+ Tambah Alat</button>
                <hr>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url('inventaris') ?>" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
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
</style>

<script>
    $(document).ready(function () {
        let index = 1;

        $('#add-inventaris').click(function () {
            const newGroup = $('.inventaris-group').first().clone();
            newGroup.attr('data-index', index);

        // Reset input
            newGroup.find('input[type="text"], input[type="number"]').val('');
            newGroup.find('input[type="radio"]').prop('checked', false);

        // Reset select native (tanpa Select2)
            newGroup.find('select').val('');

        // Update name radio button berdasarkan index
            newGroup.find('input[type="radio"]').each(function () {
                const baseName = $(this).attr('name').split('[')[0];
                $(this).attr('name', baseName + '[' + index + ']');
            });

            $('#form-inventaris-wrapper').append(newGroup);
            index++;
        });

        $(document).on('click', '.btn-remove', function () {
            if ($('.inventaris-group').length > 1) {
                $(this).closest('.inventaris-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });
    });
</script>
