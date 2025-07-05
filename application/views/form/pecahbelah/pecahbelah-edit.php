<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Benda Mudah Pecah<</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('pecahbelah') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Benda Mudah Pecah
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('pecahbelah/edit/'.$pecahbelah->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?>" value="<?= $pecahbelah->date; ?>">
                        <div class="invalid-feedback <?= form_error('date') ? 'd-block' : '' ?>"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option value="1" <?= set_select('shift', '1'); ?> <?= $pecahbelah->shift == 1?'selected':'';?>>1</option>
                            <option value="2" <?= set_select('shift', '2'); ?> <?= $pecahbelah->shift == 2?'selected':'';?>>2</option>
                            <option value="3" <?= set_select('shift', '3'); ?> <?= $pecahbelah->shift == 3?'selected':'';?>>3</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('shift') ? 'd-block' : '' ?>"><?= form_error('shift') ?></div>
                    </div>
                </div>
                <hr>

                <div class="form-area" id="form-pecahbelah-wrapper">
                    <label class="form-label font-weight-bold">Checklist Alat</label>
                    <?php
                    $pecahbelah_data = json_decode($pecahbelah->benda_pecah, true);

                    if (!is_array($pecahbelah_data)) {
                        echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                        $pecahbelah_data = [];
                    }

                    foreach ($pecahbelah_data as $i => $detail): 
                        $nama_barang = isset($detail['nama_barang']) ? $detail['nama_barang'] : '';
                        $area = isset($detail['area']) ? $detail['area'] : '';
                        $pemilik = isset($detail['pemilik']) ? $detail['pemilik'] : '';
                        $jumlah = isset($detail['jumlah']) ? $detail['jumlah'] : '';
                        $keterangan = isset($detail['keterangan']) ? $detail['keterangan'] : '';
                        $awal = isset($detail['kondisi_awal']) ? $detail['kondisi_awal'] : 'Ok';
                        ?>
                        <div class="pecahbelah-group border p-3 mb-4 rounded bg-light" data-index="<?= $i ?>">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>Nama Alat</label>
                                    <select class="form-control" name="nama_barang[]">
                                        <?php
                                        $alat_list = [
                                            "Lampu + Cover", "Akrilik Showcase", "Akrilik Freezer", "Akrilik Pada Pintu",
                                            "Akrilik Jendela", "Akrilik pada pintu & jendela", "Akrilik Penutup Blower",
                                            "Akrilik Sheeting Moulding", "Akrilik Timer Oven", "Akrilik Box Lakban",
                                            "Akrilik Panel", "Penutup Mesin Cutting", "Penutup Mesin Sieving",
                                            "Box Preparasi", "Box Tepung Besar", "Box Tepung Kecil", "Penutup Box Tepung Kecil",
                                            "Box Water Chiller", "Box Reject dan Waste", "Box Metal Detector",
                                            "Box Pencucian", "Botol Semprot", "Baking Cart", "Tempat minyak goreng",
                                            "Jam Dinding", "Display Suhu", "Fly Catcher", "Tempat telepon akrilik",
                                            "Cermin", "Dispenser handsanitizer", "Tempat Sampah", "Helm Code Red",
                                            "Lampu Alarm", "Test Piece", "Kacamata"
                                        ];
                                        foreach ($alat_list as $alat) {
                                            $selected = $nama_barang == $alat ? 'selected' : '';
                                            echo "<option value=\"$alat\" $selected>$alat</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Area</label>
                                    <select class="form-control" name="area[]">
                                        <?php
                                        $area_list = [
                                            "Ruang Buffer", "Ruang Pengayakan", "Chiller 2", "Ruang Preparasi", "Ruang Mixing",
                                            "Ruang Fermentasi", "Ruang Baking", "Ruang Cleaning", "Ruang Cutting", "Ruang Grinding",
                                            "Ruang Aging", "Ruang Packing", "Office QC", "Office Produksi", "Ruang RM", "Lift",
                                            "Anteroom", "Loker"
                                        ];
                                        foreach ($area_list as $areas) {
                                            $selected = $area == $areas ? 'selected' : '';
                                            echo "<option value=\"$areas\" $selected>$areas</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Pemilik</label>
                                    <select class="form-control" name="pemilik[]">
                                        <option value="Produksi" <?= $pemilik == 'Produksi' ? 'selected' : '' ?>>Produksi</option>
                                        <option value="QC" <?= $pemilik == 'QC' ? 'selected' : '' ?>>QC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row kondisi-wrapper">
                                <div class="col-sm-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah[]" class="form-control" value="<?= $jumlah ?>">
                                </div>
                                <div class="col-sm-3">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan[]" class="form-control" value="<?= $keterangan ?>">
                                </div>
                                <div class="col-3">
                                    <label>Kondisi Awal</label>
                                    <div class="form-check">
                                        <input type="radio" name="kondisi_awal[<?= $i ?>]" id="ok_<?= $i ?>" value="Ok" class="form-check-input" <?= $awal === 'Ok' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="ok_<?= $i ?>">Ok</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="kondisi_awal[<?= $i ?>]" id="tidak_ok_<?= $i ?>" value="Tidak Ok" class="form-check-input" <?= $awal === 'Tidak Ok' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="tidak_ok_<?= $i ?>">Tidak Ok</label>
                                    </div>
                                </div>
                                <div class="col-sm-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="btn btn-primary mt-2" id="add-pecahbelah">+ Tambah Benda</button>
                <hr>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url('pecahbelah') ?>" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
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
    let index = $('.pecahbelah-group').length;  // Mulai dengan indeks sesuai jumlah grup yang ada

    $('#add-pecahbelah').click(function () {
        const newGroup = $('.pecahbelah-group').first().clone(); // Clone grup pertama
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
        $('#form-pecahbelah-wrapper').append(newGroup);

        index++;  // Tingkatkan indeks untuk grup berikutnya
    });

    // Hapus grup pecahbelah yang sudah ada
    $(document).on('click', '.btn-remove', function () {
        if ($('.pecahbelah-group').length > 1) {
            $(this).closest('.pecahbelah-group').remove();
            // Update index setelah grup dihapus
            index = $('.pecahbelah-group').length;
        } else {
            alert("Minimal satu baris harus ada.");
        }
    });
});

</script>
