<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('sanitasi')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Sanitasi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('sanitasi/tambah');?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option disabled selected>Pilih Shift</option>
                                <option value="1" <?= set_select('shift', 1); ?>>Shift 1</option>
                                <option value="2" <?= set_select('shift', 2); ?>>Shift 2</option>
                                <option value="3" <?= set_select('shift', 3); ?>>Shift 3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div> 
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Pukul</label>
                            <input type="time" name="waktu" class="form-control <?= form_error('waktu') ? 'invalid' : '' ?> " value="<?php echo date("H:i") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('waktu')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('waktu') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-area" id="form-sanitasi-wrapper">
                        <label class="form-label font-weight-bold">Hasil Pemeriksaan</label>
                        <div class="sanitasi-group border p-3 mb-3 rounded bg-light" data-index="0">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>Area</label>
                                    <select name="sub_area[]" class="form-control">
                                        <option value="Foot Basin">Foot Basin</option>
                                        <option value="Hand Basin">Hand Basin</option>
                                        <option value="Air Cuci Tangan">Air Cuci Tangan</option>
                                        <option value="Air Cleaning">Air Cleaning</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Standar (ppm)</label>
                                    <select name="standar[]" class="form-control">
                                        <option value="50">50</option>
                                        <option value="200">200</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Aktual</label>
                                    <input type="text" name="aktual[]" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Upload Gambar</label>
                                    <input type="file" name="gambar[]" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>Suhu Air</label>
                                    <input type="text" name="suhu_air[]" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>keterangan</label>
                                    <input type="text" name="keterangan[]" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>tindakan</label>
                                    <input type="text" name="tindakan[]" class="form-control">
                                </div>
                                <div class="col-sm-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mt-2" id="add-sanitasi">+ Tambah Area</button>
                    <hr>
                    <div class="form-group row">
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
                            <a href="<?= base_url('sanitasi')?>" class="btn btn-md btn-danger">
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

        $('#add-sanitasi').click(function () {
            const newGroup = $('.sanitasi-group').first().clone();
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

            $('#form-sanitasi-wrapper').append(newGroup);
            index++;
        });

        $(document).on('click', '.btn-remove', function () {
            if ($('.sanitasi-group').length > 1) {
                $(this).closest('.sanitasi-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });
    });
</script>