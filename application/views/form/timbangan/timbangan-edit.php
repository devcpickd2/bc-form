<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Timbangan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('timbangan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Timbangan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('timbangan/edit/'.$timbangan->uuid);?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $timbangan->date; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $timbangan->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $timbangan->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $timbangan->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div>
                    </div>

                    <div class="form-area" id="form-timbangan-wrapper">
                        <label class="form-label font-weight-bold">Hasil Pemeriksaan</label>

                        <?php
                        $timbangan_data = json_decode($timbangan->peneraan_hasil, true);

                        if (!is_array($timbangan_data)) {
                            echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                            $timbangan_data = [];
                        }

                        foreach ($timbangan_data as $i => $detail):
                            $kode_timbangan = isset($detail['kode_timbangan']) ? $detail['kode_timbangan'] : '';
                            $kapasitas = isset($detail['kapasitas']) ? $detail['kapasitas'] : '';
                            $model = isset($detail['model']) ? $detail['model'] : '';
                            $lokasi = isset($detail['lokasi']) ? $detail['lokasi'] : '';
                            $peneraan_standar = isset($detail['peneraan_standar']) ? $detail['peneraan_standar'] : '';
                            $pukul = isset($detail['pukul']) ? $detail['pukul'] : '';
                            $hasil = isset($detail['hasil']) ? $detail['hasil'] : '';
                            ?>
                            <div class="timbangan-group border p-3 mb-3 rounded bg-light" data-index="<?= $i ?>">
                                <div class="form-group row align-items-end">
                                    <div class="col-sm-2">
                                        <label>Kode Timbangan</label>
                                        <select name="kode_timbangan[]" class="form-control kode-timbangan">
                                            <option value="" disabled selected>Pilih Kode</option>
                                            <?php foreach($list_timbangan as $lt): ?>
                                                <option value="<?= $lt->kode_timbangan ?>"
                                                    data-kapasitas="<?= $lt->kapasitas ?>"
                                                    data-model="<?= $lt->model ?>"
                                                    data-lokasi="<?= $lt->lokasi ?>"
                                                    <?= $kode_timbangan == $lt->kode_timbangan ? 'selected' : '' ?>>
                                                    <?= $lt->kode_timbangan ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label>Kapasitas</label>
                                        <input type="text" name="kapasitas[]" class="form-control" 
                                        value="<?= htmlspecialchars($kapasitas) ?>" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Model</label>
                                        <input type="text" name="model[]" class="form-control" 
                                        value="<?= htmlspecialchars($model) ?>" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Lokasi</label>
                                        <input type="text" name="lokasi[]" class="form-control" 
                                        value="<?= htmlspecialchars($lokasi) ?>">
                                    </div>
                                    <div class="col-sm-1">
                                        <label>Standar (g)</label>
                                        <input type="text" name="peneraan_standar[]" class="form-control" value="<?= htmlspecialchars($peneraan_standar) ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Pukul</label>
                                        <input type="time" name="pukul[]" class="form-control" value="<?= htmlspecialchars($pukul) ?>">
                                    </div>
                                    <div class="col-sm-1">
                                        <label>Hasil</label>
                                        <input type="text" name="hasil[]" class="form-control" value="<?= htmlspecialchars($hasil) ?>">
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <button type="button" class="btn btn-danger btn-remove mt-4">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button type="button" class="btn btn-primary mt-2" id="add-timbangan">+ Tambah Pemeriksaan</button>
                    <hr>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Keterangan</label>
                            <textarea class="form-control" name="keterangan"><?= $timbangan->keterangan; ?></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('keterangan') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"><?= $timbangan->catatan; ?></textarea>
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

    // Tambah baris
        $('#add-timbangan').click(function () {

            let newGroup = $('.timbangan-group').first().clone();

            newGroup.find('input').val('');
            newGroup.find('select').val('');

            $('#form-timbangan-wrapper').append(newGroup);
        });

    // Hapus baris
        $(document).on('click', '.btn-remove', function () {
            if ($('.timbangan-group').length > 1) {
                $(this).closest('.timbangan-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });

    // Auto isi dari master
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
