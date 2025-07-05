<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Loading Produk</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('loading')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Loading Produk</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('loading/tambah');?>" enctype="multipart/form-data">
                   <div style="display: flex; gap: 20px;">
                    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 30%; text-align: left; font-family: Arial, sans-serif; font-size: 14px;">
                        <thead style="background-color: #f2f2f2;">
                            <tr>
                                <th colspan="2" style="padding: 5px; background-color: #ADD8E6; color: gray;">Keterangan Pemeriksaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Noda (karat, cat, tinta)</td>
                            </tr>
                            <tr>
                                <td>2. Bekas oli di lantai, di dinding</td>
                            </tr>
                            <tr>
                                <td>3. Pallet rusak/pecah</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                        <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('date') ?>
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option disabled selected>Pilih Shift</option>
                            <option value="1" <?= set_select('shift', 1); ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', 2); ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', 3); ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">No. Polisi Mobil</label>
                        <input type="text" name="no_pol" class="form-control <?= form_error('no_pol') ? 'invalid' : '' ?> " value="<?= set_value('no_pol'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('no_pol')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('no_pol') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Start Loading</label>
                        <input type="time" name="start_loading" class="form-control <?= form_error('start_loading') ? 'invalid' : '' ?> " value="<?php echo date("H:i") ?>">
                        <div class="invalid-feedback <?= !empty(form_error('start_loading')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('start_loading') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Finish Loading</label>
                        <input type="time" name="finish_loading" class="form-control <?= form_error('finish_loading') ? 'invalid' : '' ?> " value="<?php echo date("H:i") ?>">
                        <div class="invalid-feedback <?= !empty(form_error('finish_loading')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('finish_loading') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Nama Sopir</label>
                        <input type="text" name="nama_supir" class="form-control <?= form_error('nama_supir') ? 'invalid' : '' ?> " value="<?= set_value('nama_supir'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('nama_supir')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('nama_supir') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Ekspedisi</label>
                        <input type="text" name="ekspedisi" class="form-control <?= form_error('ekspedisi') ? 'invalid' : '' ?> " value="<?= set_value('ekspedisi'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('ekspedisi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('ekspedisi') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tujuan</label>
                        <input type="text" name="tujuan" class="form-control <?= form_error('tujuan') ? 'invalid' : '' ?> " value="<?= set_value('tujuan'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tujuan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('tujuan') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">No. Segel</label>
                        <input type="text" name="no_segel" class="form-control <?= form_error('no_segel') ? 'invalid' : '' ?> " value="<?= set_value('no_segel'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('no_segel')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('no_segel') ?>
                        </div>
                    </div> 
                </div>
                <hr>

                <div id="form-rm" class="form-area">
                    <label class="form-label font-weight-bold">Kondisi Mobil</label>

                    <?php
                    $kondisi_mobil_list = [
                        'Bersih',
                        'Bocor',
                        'Bebas dari Hama',
                        'Tidak Berdebu',
                        'Tidak ada Sampah',
                        'Kering',
                        'Basah',
                        'Tidak Berbau',
                        'Tidak ada produk Non Halal',
                        'Tidak ada Aktivitas Binatang'
                    ];

                    $keterangan_options = ['Ok', 'Tidak', '1', '2', '3'];
                    ?>

                    <?php foreach ($kondisi_mobil_list as $index => $kondisi): ?>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="form-label font-weight-bold">Kondisi</label>
                                <input type="text" name="list_kondisi[]" class="form-control" value="<?= $kondisi ?>" readonly>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label font-weight-bold d-block">Keterangan</label>
                                <?php foreach ($keterangan_options as $opt): ?>
                                    <?php
                                    $id = 'kondisi-' . $index . '-' . strtolower($opt);
                                    $value = $opt; 
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" 
                                        type="checkbox" 
                                        name="kondisi_mobil_keterangan[]" 
                                        value="<?= $value ?>" 
                                        id="<?= $id ?>">
                                        <label class="form-check-label" for="<?= $id ?>"><?= $opt ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-area" id="form-loading-wrapper">
                    <label class="form-label font-weight-bold">LOADING</label>
                    <div class="loading-group border p-3 mb-3 rounded bg-light">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk[]" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Kondisi Produk</label>
                                <input type="text" name="kondisi_produk[]" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Kondisi Kemasan</label>
                                <input type="text" name="kondisi_kemasan[]" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Kode Produksi</label>
                                <input type="text" name="kode_produksi[]" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Expired</label>
                                <input type="date" name="expired[]" class="form-control" value="<?php echo date("Y-m-d") ?>">
                            </div>
                            <div class="col-sm-3">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan[]" class="form-control">
                            </div>
                            <div class="col-sm-3 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-2" id="add-loading">+ Tambah Produk</button>
                <br>
                <hr>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('loading')?>" class="btn btn-md btn-danger">
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
    document.addEventListener('DOMContentLoaded', function () {
        const formGroups = document.querySelectorAll('#form-rm .form-group');

        formGroups.forEach((group, index) => {
            const checkboxes = group.querySelectorAll('.form-check-input');

            checkboxes.forEach(cb => {
                cb.addEventListener('change', function () {
                    const currentValue = cb.value.split(':')[1];

                    const isBersihAtauTidak = (val) => val === 'Ok' || val === 'Tidak';
                    const isAngka = (val) => ['1', '2', '3'].includes(val);

                    const bersihTidakCheckboxes = Array.from(checkboxes).filter(cb => isBersihAtauTidak(cb.value.split(':')[1]));
                    const angkaCheckboxes = Array.from(checkboxes).filter(cb => isAngka(cb.value.split(':')[1]));

                    if (isBersihAtauTidak(currentValue)) {
                        if (cb.checked) {
                            angkaCheckboxes.forEach(box => {
                                box.checked = false;
                                box.disabled = true;
                            });
                        } else {
                            const isAnyBersihTidakChecked = bersihTidakCheckboxes.some(box => box.checked);
                            if (!isAnyBersihTidakChecked) {
                                angkaCheckboxes.forEach(box => box.disabled = false);
                            }
                        }
                    }

                    if (isAngka(currentValue)) {
                        if (cb.checked) {
                            bersihTidakCheckboxes.forEach(box => {
                                box.checked = false;
                                box.disabled = true;
                            });
                        } else {
                            const isAnyAngkaChecked = angkaCheckboxes.some(box => box.checked);
                            if (!isAnyAngkaChecked) {
                                bersihTidakCheckboxes.forEach(box => box.disabled = false);
                            }
                        }
                    }
                });
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-loading').click(function() {
            var newGroup = $('.loading-group').first().clone();
            newGroup.find('input').val(''); 
            $('#form-loading-wrapper').append(newGroup);
        });

        $(document).on('click', '.btn-remove', function() {
            if ($('.loading-group').length > 1) {
                $(this).closest('.loading-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });
    });
</script>
