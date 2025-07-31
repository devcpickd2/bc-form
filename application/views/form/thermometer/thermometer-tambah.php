<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Peneraan Thermometer</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('thermometer')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Peneraan Thermometer</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
                <form class="user" method="post" action="<?= base_url('thermometer/tambah');?>" enctype="multipart/form-data">
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
                    <div class="form-group row">
                     <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kode Thermometer</label>
                        <input type="text" name="kode_thermo" class="form-control <?= form_error('kode_thermo') ? 'invalid' : '' ?> " value="<?= set_value('kode_thermo'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kode_thermo')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kode_thermo') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Model</label>
                        <input type="text" name="model" class="form-control <?= form_error('model') ? 'invalid' : '' ?> " value="<?= set_value('model'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('model')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('model') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Area</label>
                        <input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?> " value="<?= set_value('area'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('area')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('area') ?>
                        </div> 
                    </div> 
                </div>
                <hr>
                <div class="form-area" id="form-thermometer-wrapper">
                    <label class="form-label font-weight-bold">Hasil Pemeriksaan</label>
                    <div class="thermometer-group border p-3 mb-3 rounded bg-light" data-index="0">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Pukul</label>
                                <input type="time" name="pukul[]" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Standar Suhu (°C)</label>
                                <select name="standar[]" class="form-control">
                                    <option value="0">0°C</option>
                                    <option value="100">100°C</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Hasil</label>
                                <input type="text" name="hasil[]" class="form-control">
                            </div>
                            <div class="col-sm-3 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-2" id="add-thermometer">+ Tambah Pemeriksaan</button>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Tindakan Perbaikan</label>
                        <textarea class="form-control" name="tindakan_perbaikan"></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('tindakan_perbaikan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('tindakan_perbaikan') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
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
        let index = 1;

        $('#add-thermometer').click(function () {
            const newGroup = $('.thermometer-group').first().clone();
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

            $('#form-thermometer-wrapper').append(newGroup);
            index++;
        });

        $(document).on('click', '.btn-remove', function () {
            if ($('.thermometer-group').length > 1) {
                $(this).closest('.thermometer-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });
    });
</script>