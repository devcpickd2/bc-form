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
                <hr>
                <div class="form-area" id="form-thermometer-wrapper">
                    <label class="form-label font-weight-bold mb-2">Hasil Pemeriksaan</label>

                    <?php
                    $thermometer_data = json_decode($thermometer->peneraan_hasil, true);

                    if (!is_array($thermometer_data)) {
                        echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                        $thermometer_data = [];
                    }

                    foreach ($thermometer_data as $i => $detail): 
                        $kode_thermo = isset($detail['kode_thermo']) ? $detail['kode_thermo'] : '';
                        $model = isset($detail['model']) ? $detail['model'] : '';
                        $area = isset($detail['area']) ? $detail['area'] : '';
                        $pukul = isset($detail['pukul']) ? $detail['pukul'] : '';
                        $standar = isset($detail['standar']) ? $detail['standar'] : '';
                        $hasil = isset($detail['hasil']) ? $detail['hasil'] : '';
                        ?>
                        <div class="thermometer-group border p-3 mb-3 rounded bg-light" data-index="<?= $i ?>">
                            <div class="form-row d-flex flex-wrap align-items-end">

                                <div class="col-auto mb-2">
                                    <label class="small mb-1">Kode Thermometer</label>
                                    <select name="kode_thermo[]" class="form-control form-control-sm kode-thermo">
                                        <option value="" disabled selected>Pilih Kode Thermometer</option>
                                        <?php foreach($list_thermo as $lt): ?>
                                            <option 
                                            value="<?= $lt->kode_thermometer ?>"
                                            data-model="<?= htmlspecialchars($lt->model, ENT_QUOTES) ?>"
                                            data-area="<?= htmlspecialchars($lt->area, ENT_QUOTES) ?>"
                                            <?= ($kode_thermo == $lt->kode_thermometer) ? 'selected' : '' ?>
                                            >
                                            <?= $lt->kode_thermometer ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-auto mb-2">
                                <label class="small mb-1">Model</label>
                                <input type="text" name="model[]" 
                                class="form-control form-control-sm model" 
                                value="<?= $model ?>" readonly>
                            </div>

                            <div class="col-auto mb-2">
                                <label class="small mb-1">Area</label>
                                <input type="text" name="area[]" 
                                class="form-control form-control-sm area" 
                                value="<?= $area ?>">
                            </div>

                            <div class="col-auto mb-2">
                                <label class="small mb-1">Pukul</label>
                                <input type="time" name="pukul[]" class="form-control form-control-sm" value="<?= $pukul ?>">
                            </div>

                            <div class="col-auto mb-2">
                                <label class="small mb-1">Standar Suhu (°C)</label>
                                <select name="standar[]" class="form-control form-control-sm">
                                    <option value="0" <?= ($standar == '0') ? 'selected' : '' ?>>0°C</option>
                                    <option value="100" <?= ($standar == '100') ? 'selected' : '' ?>>100°C</option>
                                    <?php if ($standar != '0' && $standar != '100' && $standar != ''): ?>
                                        <option value="<?= $standar ?>" selected><?= $standar ?>°C</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="col-auto mb-2">
                                <label class="small mb-1">Hasil</label>
                                <input type="text" name="hasil[]" class="form-control form-control-sm" value="<?= $hasil ?>">
                            </div>

                            <div class="col-auto mb-2">
                                <button type="button" class="btn btn-danger btn-sm mt-3 btn-remove">Hapus</button>
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

    // =============================
    // TAMBAH BARIS
    // =============================
        $('#add-thermometer').click(function () {

            let newGroup = $('.thermometer-group').first().clone();

        // Reset semua input
            newGroup.find('input[type="text"], input[type="number"], input[type="time"]').val('');
            newGroup.find('select').val('');

        // Kosongkan auto fill
            newGroup.find('.model').val('');
            newGroup.find('.area').val('');

            $('#form-thermometer-wrapper').append(newGroup);
        });


    // =============================
    // HAPUS BARIS
    // =============================
        $(document).on('click', '.btn-remove', function () {

            if ($('.thermometer-group').length > 1) {
                $(this).closest('.thermometer-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }

        });


    // =============================
    // AUTO FILL MODEL & AREA
    // =============================
        $(document).on('change', '.kode-thermo', function () {

            let selected = $(this).find('option:selected');

            let model = selected.attr('data-model');
            let area  = selected.attr('data-area');

            let parent = $(this).closest('.thermometer-group');

            parent.find('.model').val(model ? model : '');
            parent.find('.area').val(area ? area : '');
        });

    });
</script>