<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('sanitasi')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Sanitasi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('sanitasi/edit/'.$sanitasi->uuid);?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $sanitasi->date; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $sanitasi->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $sanitasi->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $sanitasi->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Pukul</label>
                            <input type="time" name="waktu" class="form-control <?= form_error('waktu') ? 'invalid' : '' ?> " value="<?= $sanitasi->waktu; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('waktu')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('waktu') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-area" id="form-sanitasi-wrapper">
                        <label class="form-label font-weight-bold">Hasil Pemeriksaan</label>
                        <?php
                        $sanitasi_data = json_decode($sanitasi->area, true);

                        if (!is_array($sanitasi_data)) {
                            echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                            $sanitasi_data = [];
                        }

                        foreach ($sanitasi_data as $i => $detail): 
                            $sub_area   = isset($detail['sub_area']) ? $detail['sub_area'] : '';
                            $standar    = isset($detail['standar']) ? $detail['standar'] : '';
                            $aktual     = isset($detail['aktual']) ? $detail['aktual'] : '';
                            $suhu_air   = isset($detail['suhu_air']) ? $detail['suhu_air'] : '';
                            $keterangan = isset($detail['keterangan']) ? $detail['keterangan'] : '';
                            $tindakan   = isset($detail['tindakan']) ? $detail['tindakan'] : '';
                            $gambar     = isset($detail['gambar']) ? $detail['gambar'] : null;
                            ?>
                            <div class="sanitasi-group border p-3 mb-3 rounded bg-light" data-index="<?= $i ?>">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Area</label>
                                        <select name="sub_area[]" class="form-control">
                                            <option value="Foot Basin" <?= ($sub_area == 'Foot Basin') ? 'selected' : '' ?>>Foot Basin</option>
                                            <option value="Hand Basin" <?= ($sub_area == 'Hand Basin') ? 'selected' : '' ?>>Hand Basin</option>
                                            <option value="Air Cuci Tangan" <?= ($sub_area == 'Air Cuci Tangan') ? 'selected' : '' ?>>Air Cuci Tangan</option>
                                            <option value="Air Cleaning" <?= ($sub_area == 'Air Cleaning') ? 'selected' : '' ?>>Air Cleaning</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Standar (ppm)</label>
                                        <select name="standar[]" class="form-control">
                                            <option value="50" <?= ($standar == '50') ? 'selected' : '' ?>>50</option>
                                            <option value="200" <?= ($standar == '200') ? 'selected' : '' ?>>200</option>
                                            <option value="-" <?= ($standar == '-') ? 'selected' : '' ?>>-</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Aktual</label>
                                        <input type="text" name="aktual[]" class="form-control" value="<?= $aktual ?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Upload Gambar</label>
                                        <input type="file" name="gambar[]" class="form-control">
                                        <?php if (!empty($gambar)): ?>
                                            <small>
                                                <a href="<?= base_url('uploads/sanitasi/' . $gambar) ?>" target="_blank">Lihat Gambar Sebelumnya</a>
                                            </small>
                                            <input type="hidden" name="gambar_lama[]" value="<?= $gambar ?>">
                                        <?php else: ?>
                                            <input type="hidden" name="gambar_lama[]" value="">
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label>Suhu Air</label>
                                        <input type="text" name="suhu_air[]" class="form-control" value="<?= $suhu_air ?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan[]" class="form-control" value="<?= $keterangan ?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Tindakan</label>
                                        <input type="text" name="tindakan[]" class="form-control" value="<?= $tindakan ?>">
                                    </div>
                                    <div class="col-sm-3 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-primary mt-2" id="add-sanitasi">+ Tambah Pemeriksaan</button>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"><?= $sanitasi->catatan; ?></textarea>
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
    let index = $('.sanitasi-group').length;  // Mulai dengan indeks sesuai jumlah grup yang ada

    $('#add-sanitasi').click(function () {
        const newGroup = $('.sanitasi-group').first().clone(); // Clone grup pertama
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
        $('#form-sanitasi-wrapper').append(newGroup);

        index++;  // Tingkatkan indeks untuk grup berikutnya
    });

    // Hapus grup sanitasi yang sudah ada
    $(document).on('click', '.btn-remove', function () {
        if ($('.sanitasi-group').length > 1) {
            $(this).closest('.sanitasi-group').remove();
            // Update index setelah grup dihapus
            index = $('.sanitasi-group').length;
        } else {
            alert("Minimal satu baris harus ada.");
        }
    });
});

</script>