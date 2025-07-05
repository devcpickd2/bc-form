<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Checklist Inventaris Peralatan QC Bread Crumb</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('inventaris') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Checklist Inventaris Peralatan QC Bread Crumb
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('inventaris/edit/'.$inventaris->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?>" value="<?= $inventaris->date; ?>">
                        <div class="invalid-feedback <?= form_error('date') ? 'd-block' : '' ?>"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option value="1" <?= set_select('shift', '1'); ?> <?= $inventaris->shift == 1?'selected':'';?>>1</option>
                            <option value="2" <?= set_select('shift', '2'); ?> <?= $inventaris->shift == 2?'selected':'';?>>2</option>
                            <option value="3" <?= set_select('shift', '3'); ?> <?= $inventaris->shift == 3?'selected':'';?>>3</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('shift') ? 'd-block' : '' ?>"><?= form_error('shift') ?></div>
                    </div>
                </div>
                <hr>

                <div class="form-area" id="form-inventaris-wrapper">
                    <label class="form-label font-weight-bold">Checklist Alat</label>
                    <?php
                    $inventaris_data = json_decode($inventaris->peralatan, true);

                    if (!is_array($inventaris_data)) {
                        echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                        $inventaris_data = [];
                    }

                    foreach ($inventaris_data as $i => $detail): 
                        $nama_alat = isset($detail['nama_alat']) ? $detail['nama_alat'] : '';
                        $jumlah = isset($detail['jumlah']) ? $detail['jumlah'] : '';
                        $keterangan = isset($detail['keterangan']) ? $detail['keterangan'] : '';
                        $awal = isset($detail['kondisi_awal']) ? $detail['kondisi_awal'] : 'Ok';
                        ?>
                        <div class="inventaris-group border p-3 mb-3 rounded bg-light" data-index="<?= $i ?>">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>Nama Alat</label>
                                    <select class="form-control" name="nama_alat[<?= $i ?>]">
                                        <option value="Adaptor Timbangan Mettler Toledo" <?= $nama_alat == 'Adaptor Timbangan Mettler Toledo' ? 'selected' : '' ?>>Adaptor Timbangan Mettler Toledo</option>
                                        <option value="Timbangan Mettler Toledo" <?= $nama_alat == 'Timbangan Mettler Toledo' ? 'selected' : '' ?>>Timbangan Mettler Toledo</option>
                                        <option value="Anak Timbang 10 kg" <?= $nama_alat == 'Anak Timbang 10 kg' ? 'selected' : '' ?>>Anak Timbang 10 kg</option>
                                        <option value="Moisture Analyzer Mettler Toledo" <?= $nama_alat == 'Moisture Analyzer Mettler Toledo' ? 'selected' : '' ?>>Moisture Analyzer Mettler Toledo</option>
                                        <option value="Stabilizer" <?= $nama_alat == 'Stabilizer' ? 'selected' : '' ?>>Stabilizer</option>
                                        <option value="Bolpoin" <?= $nama_alat == 'Bolpoin' ? 'selected' : '' ?>>Bolpoin</option>
                                        <option value="Spidol" <?= $nama_alat == 'Spidol' ? 'selected' : '' ?>>Spidol</option>
                                        <option value="Gunting" <?= $nama_alat == 'Gunting' ? 'selected' : '' ?>>Gunting</option>
                                        <option value="Penggaris Logam" <?= $nama_alat == 'Penggaris Logam' ? 'selected' : '' ?>>Penggaris Logam</option>
                                        <option value="Buku Estafet QC" <?= $nama_alat == 'Buku Estafet QC' ? 'selected' : '' ?>>Buku Estafet QC</option>
                                        <option value="Buku Instruksi Kerja" <?= $nama_alat == 'Buku Instruksi Kerja' ? 'selected' : '' ?>>Buku Instruksi Kerja</option>
                                        <option value="Buku Memo" <?= $nama_alat == 'Buku Memo' ? 'selected' : '' ?>>Buku Memo</option>
                                        <option value="Dispenser Lakban 1 Inch" <?= $nama_alat == 'Dispenser Lakban 1 Inch' ? 'selected' : '' ?>>Dispenser Lakban 1 Inch</option>
                                        <option value="Meja QC" <?= $nama_alat == 'Meja QC' ? 'selected' : '' ?>>Meja QC</option>
                                        <option value="Papan Jalan" <?= $nama_alat == 'Papan Jalan' ? 'selected' : '' ?>>Papan Jalan</option>
                                        <option value="Sarung Tangan Hijau" <?= $nama_alat == 'Sarung Tangan Hijau' ? 'selected' : '' ?>>Sarung Tangan Hijau</option>
                                        <option value="Spray Alkohol" <?= $nama_alat == 'Spray Alkohol' ? 'selected' : '' ?>>Spray Alkohol</option>
                                        <option value="Test Piece (Fe 1.5;Non Fe 3.0;SUS 2.5)" <?= $nama_alat == 'Test Piece (Fe 1.5;Non Fe 3.0;SUS 2.5)' ? 'selected' : '' ?>>Test Piece (Fe 1.5;Non Fe 3.0;SUS 2.5)</option>
                                        <option value="Thermometer (Preparasi)" <?= $nama_alat == 'Thermometer (Preparasi)' ? 'selected' : '' ?>>Thermometer (Preparasi)</option>
                                        <option value="Thermometer (Cooking/Packing)" <?= $nama_alat == 'Thermometer (Cooking/Packing)' ? 'selected' : '' ?>>Thermometer (Cooking/Packing)</option>
                                        <option value="Thermometer Ruang" <?= $nama_alat == 'Thermometer Ruang' ? 'selected' : '' ?>>Thermometer Ruang</option>
                                        <option value="Gelas Ukur 1 L" <?= $nama_alat == 'Gelas Ukur 1 L' ? 'selected' : '' ?>>Gelas Ukur 1 L</option>
                                        <option value="Kalkulator" <?= $nama_alat == 'Kalkulator' ? 'selected' : '' ?>>Kalkulator</option>
                                        <option value="Plastik Clipper (laporan)" <?= $nama_alat == 'Plastik Clipper (laporan)' ? 'selected' : '' ?>>Plastik Clipper (laporan)</option>
                                        <option value="Stopwatch" <?= $nama_alat == 'Stopwatch' ? 'selected' : '' ?>>Stopwatch</option>
                                        <option value="Carry Box" <?= $nama_alat == 'Carry Box' ? 'selected' : '' ?>>Carry Box</option>
                                        <option value="Toolbox Hitam" <?= $nama_alat == 'Toolbox Hitam' ? 'selected' : '' ?>>Toolbox Hitam</option>
                                        <option value="Pinset" <?= $nama_alat == 'Pinset' ? 'selected' : '' ?>>Pinset</option>
                                    </select>
                                </div> 
                                <div class="col-sm-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah[]" class="form-control" value="<?= $jumlah ?>">
                                </div>
                                <div class="col-sm-3">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan[]" class="form-control" value="<?= $keterangan ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label><strong>Kondisi Awal Shift</strong></label>
                                <div class="row kondisi-wrapper">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input type="radio" name="kondisi_awal[<?= $i ?>]" id="tidak_tersedia_<?= $i ?>" value="Tidak Tersedia" class="form-check-input" <?= $awal === 'Tidak Tersedia' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="tidak_tersedia_<?= $i ?>">Tidak Tersedia</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="kondisi_awal[<?= $i ?>]" id="baik_<?= $i ?>" value="Baik" class="form-check-input" <?= $awal === 'Baik' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="baik_<?= $i ?>">Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="kondisi_awal[<?= $i ?>]" id="rusak_<?= $i ?>" value="Rusak" class="form-check-input" <?= $awal === 'Rusak' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="rusak_<?= $i ?>">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="kondisi_awal[<?= $i ?>]" id="hilang_<?= $i ?>" value="Hilang" class="form-check-input" <?= $awal === 'Hilang' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="hilang_<?= $i ?>">Hilang</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input type="radio" name="kondisi_awal[<?= $i ?>]" id="bersih_<?= $i ?>" value="Bersih" class="form-check-input" <?= $awal === 'Bersih' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="bersih_<?= $i ?>">Bersih</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="kondisi_awal[<?= $i ?>]" id="kotor_<?= $i ?>" value="Kotor" class="form-check-input" <?= $awal === 'Kotor' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="kotor_<?= $i ?>">Kotor</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="kondisi_awal[<?= $i ?>]" id="habis_<?= $i ?>" value="Habis" class="form-check-input" <?= $awal === 'Habis' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="habis_<?= $i ?>">Habis</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="kondisi_awal[<?= $i ?>]" id="baik_bersih_<?= $i ?>" value="Baik Bersih Masih" class="form-check-input" <?= $awal === 'Baik Bersih Masih' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="baik_bersih_<?= $i ?>">Baik Bersih Masih</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-sm-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
    let index = $('.inventaris-group').length;  // Mulai dengan indeks sesuai jumlah grup yang ada

    $('#add-inventaris').click(function () {
        const newGroup = $('.inventaris-group').first().clone(); // Clone grup pertama
        newGroup.attr('data-index', index);  // Set data-index dengan index baru

        // Reset input fields (jumlah, keterangan, kondisi_awal)
        newGroup.find('input[type="text"], input[type="number"]').val('');  // Reset jumlah dan keterangan
        newGroup.find('input[type="radio"]').prop('checked', false);  // Reset kondisi_awal (tidak ada yang tercentang)

        // Reset select (nama alat)
        newGroup.find('select').val(''); // Set select ke nilai kosong

        // Update name dan id untuk radio buttons, select, dan inputs sesuai index
        newGroup.find('input[type="radio"]').each(function () {
            const baseName = $(this).attr('name').split('[')[0];  // Ambil bagian sebelum [
            $(this).attr('name', baseName + '[' + index + ']');  // Update name radio button

            const newId = $(this).attr('id').split('_')[0] + '_' + index;  // Update ID
            $(this).attr('id', newId);
            $(this).next('label').attr('for', newId);  // Update for label
        });

        // Update select name sesuai index
        newGroup.find('select').each(function() {
            const baseName = $(this).attr('name').split('[')[0];
            $(this).attr('name', baseName + '[' + index + ']');
        });

        // Tambahkan grup baru ke dalam form
        $('#form-inventaris-wrapper').append(newGroup);

        index++;  // Tingkatkan indeks untuk grup berikutnya
    });

    // Hapus grup inventaris yang sudah ada
    $(document).on('click', '.btn-remove', function () {
        if ($('.inventaris-group').length > 1) {
            $(this).closest('.inventaris-group').remove();
            // Update index setelah grup dihapus
            index = $('.inventaris-group').length;
        } else {
            alert("Minimal satu baris harus ada.");
        }
    });
});

</script>
