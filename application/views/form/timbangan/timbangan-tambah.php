<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Timbangan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('timbangan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Timbangan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('timbangan/tambah');?>" enctype="multipart/form-data">
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
                <div class="form-area" id="form-timbangan-wrapper">
                    <label class="form-label font-weight-bold">Hasil Pemeriksaan</label>

                    <div class="timbangan-group border p-3 mb-3 rounded bg-light" data-index="0">
                        <div class="form-group row align-items-end">
                            <div class="col-sm-2">
                                <label>Kode Timbangan</label>
                                <select name="kode_timbangan[]" class="form-control kode-timbangan">
                                    <option value="" disabled selected>Pilih Kode</option>
                                    <?php foreach($list_timbangan as $lt): ?>
                                        <option value="<?= $lt->kode_timbangan ?>"
                                            data-kapasitas="<?= $lt->kapasitas ?>"
                                            data-model="<?= $lt->model ?>"
                                            data-lokasi="<?= $lt->lokasi ?>">
                                            <?= $lt->kode_timbangan ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label>Kapasitas</label>
                                <input type="text" name="kapasitas[]" class="form-control kapasitas" readonly>
                            </div>
                            <div class="col-sm-2">
                                <label>Model</label>
                                <input type="text" name="model[]" class="form-control model" readonly>
                            </div>
                            <div class="col-sm-2">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi[]" class="form-control lokasi">
                            </div>
                            <div class="col-sm-1">
                                <label>Standar (g)</label>
                                <input type="text" name="peneraan_standar[]" class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label>Pukul</label>
                                <input type="time" name="pukul[]" class="form-control">
                            </div>
                            <div class="col-sm-1">
                                <label>Hasil</label>
                                <input type="text" name="hasil[]" class="form-control">
                            </div>
                            <div class="col-sm-1 text-center">
                                <button type="button" class="btn btn-danger btn-remove mt-4">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary mt-2" id="add-timbangan">+ Tambah Pemeriksaan</button>
                <hr>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('keterangan') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('catatan') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('timbangan')?>" class="btn btn-md btn-danger">
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

    // ✅ Tambah Baris
        $('#add-timbangan').click(function () {

            let newGroup = $('.timbangan-group').first().clone();

        // Reset semua input & select
            newGroup.find('input').val('');
            newGroup.find('select').val('');

        // Append ke wrapper
            $('#form-timbangan-wrapper').append(newGroup);
        });

    // ✅ Hapus Baris
        $(document).on('click', '.btn-remove', function () {
            if ($('.timbangan-group').length > 1) {
                $(this).closest('.timbangan-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });

    // ✅ Auto isi data dari master
        $(document).on('change', '.kode-timbangan', function () {

            let selected = $(this).find(':selected');

            let kapasitas = selected.data('kapasitas') || '';
            let model     = selected.data('model') || '';
            let lokasi    = selected.data('lokasi') || '';

            let parent = $(this).closest('.timbangan-group');

            parent.find('input[name="kapasitas[]"]').val(kapasitas);
            parent.find('input[name="model[]"]').val(model);
            parent.find('input[name="lokasi[]"]').val(lokasi);

        });

    });
</script>
