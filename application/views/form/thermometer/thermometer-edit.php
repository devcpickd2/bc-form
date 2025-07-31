<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Peneraan Thermometer</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('thermometer')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Peneraan Thermometer</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
               <div style="font-size: 16px;">
                <strong>Keterangan:</strong><br>
                <table>
                    <tr>
                        <td style="width: 20px;">-</td>
                        <td>Tera thermometer dilakukan setiap awal produksi</td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>Thermometer ditera dengan dimasukkan sensor di es (0°)</td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>Jika ada selisih angka display suhu dengan suhu standar es, beri keterangan (+) atau (-) angka selisih (faktor koreksi)</td>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>Jika faktor koreksi < 0,5 °C, thermometer perlu diperbaiki</td>
                    </tr>
                </table>
            </div>
            <hr>
            <form class="user" method="post" action="<?= base_url('thermometer/edit/'.$thermometer->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $thermometer->date; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('date') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option value="1" <?= set_select('shift', '1'); ?> <?= $thermometer->shift == 1?'selected':'';?>>1</option>
                            <option value="2" <?= set_select('shift', '2'); ?> <?= $thermometer->shift == 2?'selected':'';?>>2</option>
                            <option value="3" <?= set_select('shift', '3'); ?> <?= $thermometer->shift == 3?'selected':'';?>>3</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kode Thermometer</label>
                        <input type="text" name="kode_thermo" class="form-control <?= form_error('kode_thermo') ? 'invalid' : '' ?> " value="<?= $thermometer->kode_thermo; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kode_thermo')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kode_thermo') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Model</label>
                        <input type="text" name="model" class="form-control <?= form_error('model') ? 'invalid' : '' ?> " value="<?= $thermometer->model; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('model')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('model') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Area</label>
                        <input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?> " value="<?= $thermometer->area; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('area')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('area') ?>
                        </div>
                    </div> 
                </div>
                <hr>
                <div class="form-area" id="form-thermometer-wrapper">
                    <label class="form-label font-weight-bold">Hasil Pemeriksaan</label>
                    <?php
                    $thermometer_data = json_decode($thermometer->peneraan_hasil, true);

                    if (!is_array($thermometer_data)) {
                        echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                        $thermometer_data = [];
                    }

                    foreach ($thermometer_data as $i => $detail): 
                        $pukul = isset($detail['pukul']) ? $detail['pukul'] : '';
                        $standar = isset($detail['standar']) ? $detail['standar'] : '';
                        $hasil = isset($detail['hasil']) ? $detail['hasil'] : '';
                        ?>
                        <div class="thermometer-group border p-3 mb-3 rounded bg-light" data-index="<?= $i ?>">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>Pukul</label>
                                    <input type="time" name="pukul[]" class="form-control" value="<?= $pukul ?>">
                                </div>
                                <div class="col-sm-3">
                                    <label>Standar Suhu (°C)</label>
                                    <select name="standar[]" class="form-control">
                                        <option value="0" <?= ($standar == '0') ? 'selected' : '' ?>>0°C</option>
                                        <option value="100" <?= ($standar == '100') ? 'selected' : '' ?>>100°C</option>
                                        <?php if ($standar != '0' && $standar != '100'): ?>
                                            <option value="<?= $standar ?>" selected><?= $standar ?>°C</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Hasil</label>
                                    <input type="text" name="hasil[]" class="form-control" value="<?= $hasil ?>">
                                </div>
                                <div class="col-sm-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="btn btn-primary mt-2" id="add-thermometer">+ Tambah Pemeriksaan</button>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Tindakan Perbaikan</label>
                        <textarea class="form-control" name="tindakan_perbaikan"><?= $thermometer->tindakan_perbaikan; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('tindakan_perbaikan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('tindakan_perbaikan') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan"><?= $thermometer->keterangan; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('keterangan') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('thermometer')?>" class="btn btn-md btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<style type="text/css">
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>
<script>
    $(document).ready(function () {
    let index = $('.thermometer-group').length;  // Mulai dengan indeks sesuai jumlah grup yang ada

    $('#add-thermometer').click(function () {
        const newGroup = $('.thermometer-group').first().clone(); // Clone grup pertama
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
        $('#form-thermometer-wrapper').append(newGroup);

        index++;  // Tingkatkan indeks untuk grup berikutnya
    });

    // Hapus grup thermometer yang sudah ada
    $(document).on('click', '.btn-remove', function () {
        if ($('.thermometer-group').length > 1) {
            $(this).closest('.thermometer-group').remove();
            // Update index setelah grup dihapus
            index = $('.thermometer-group').length;
        } else {
            alert("Minimal satu baris harus ada.");
        }
    });
});

</script>