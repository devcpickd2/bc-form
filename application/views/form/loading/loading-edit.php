<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Pemeriksaan Loading Produk</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('loading')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Loading Produk</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post" action="<?= base_url('loading/edit/'.$loading->uuid);?>">
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
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $loading->date; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('date') ?>
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option value="1" <?= set_select('shift', '1'); ?> <?= $loading->shift == 1?'selected':'';?>>1</option>
                            <option value="2" <?= set_select('shift', '2'); ?> <?= $loading->shift == 2?'selected':'';?>>2</option>
                            <option value="3" <?= set_select('shift', '3'); ?> <?= $loading->shift == 3?'selected':'';?>>3</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">No. Polisi Mobil</label>
                        <input type="text" name="no_pol" class="form-control <?= form_error('no_pol') ? 'invalid' : '' ?> " value="<?= $loading->no_pol; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('no_pol')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('no_pol') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Start Loading</label>
                        <input type="time" name="start_loading" class="form-control <?= form_error('start_loading') ? 'invalid' : '' ?> " value="<?= $loading->start_loading; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('start_loading')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('start_loading') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Finish Loading</label>
                        <input type="time" name="finish_loading" class="form-control <?= form_error('finish_loading') ? 'invalid' : '' ?> " value="<?= $loading->finish_loading; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('finish_loading')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('finish_loading') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Nama Sopir</label>
                        <input type="text" name="nama_supir" class="form-control <?= form_error('nama_supir') ? 'invalid' : '' ?> " value="<?= $loading->nama_supir; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('nama_supir')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('nama_supir') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Ekspedisi</label>
                        <input type="text" name="ekspedisi" class="form-control <?= form_error('ekspedisi') ? 'invalid' : '' ?> " value="<?= $loading->ekspedisi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('ekspedisi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('ekspedisi') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tujuan</label>
                        <input type="text" name="tujuan" class="form-control <?= form_error('tujuan') ? 'invalid' : '' ?> " value="<?= $loading->tujuan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tujuan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('tujuan') ?>
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">No. Segel</label>
                        <input type="text" name="no_segel" class="form-control <?= form_error('no_segel') ? 'invalid' : '' ?> " value="<?= $loading->no_segel; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('no_segel')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('no_segel') ?>
                        </div>
                    </div> 
                </div>
                <hr>
                
                <h5>Detail Kondisi Mobil</h5>
                <div class="container-fluid px-0">
                    <?php
                    $max_rows = 100;

                    $kondisi_mobil = json_decode($loading->kondisi_mobil, true);

                    if (!is_array($kondisi_mobil)) {
                        echo "<div class='alert alert-danger'>Data detail Kondisi Mobil tidak valid atau kosong.</div>";
                        $kondisi_mobil = [];
                    }

                    $kondisi_mobil = array_slice($kondisi_mobil, 0, $max_rows);

                    $kondisiMap = [
                        '1' => 'Noda (karat, cat, tinta)',
                        '2' => 'Bekas oli di lantai, di dinding',
                        '3' => 'Pallet rusak/pecah',
                    ];

    // Pecah jadi dua baris
                    $chunks = array_chunk($kondisi_mobil, 5);
                    foreach ($chunks as $chunk) {
                        echo '<div class="row">';
                        foreach ($chunk as $row) {
                            $list_kondisi = isset($row['list_kondisi']) ? htmlspecialchars($row['list_kondisi']) : '';
                            $keterangan = isset($row['kondisi_mobil_keterangan']) ? $row['kondisi_mobil_keterangan'] : 'Ok';
                            ?>
                            <div class="col-md-2 mb-3">
                                <label class="font-weight-bold"><?= $list_kondisi ?></label>
                                <input type="hidden" name="list_kondisi[]" value="<?= $list_kondisi ?>">
                                <select name="kondisi_mobil_keterangan[]" class="form-control" required>
                                    <option value="Ok" <?= $keterangan === 'Ok' ? 'selected' : '' ?>>Ok</option>
                                    <option value="Tidak" <?= $keterangan === 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                                    <?php foreach ($kondisiMap as $key => $label): ?>
                                        <option value="<?= $key ?>" <?= (string)$keterangan === (string)$key ? 'selected' : '' ?>>
                                            <?= $key ?> - <?= $label ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                    ?>
                </div>

                <hr>
                <div class="form-area" id="form-loading-wrapper">
                    <label class="form-label font-weight-bold">LOADING</label>

                    <?php
                    $loading_data = json_decode($loading->loading, true);

                    if (!is_array($loading_data)) {
                        echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                        $loading_data = [];
                    }

                    foreach ($loading_data as $index => $item):
                        $nama_produk = isset($item['nama_produk']) ? htmlspecialchars($item['nama_produk']) : '';
                        $kondisi_produk = isset($item['kondisi_produk']) ? htmlspecialchars($item['kondisi_produk']) : '';
                        $kondisi_kemasan = isset($item['kondisi_kemasan']) ? htmlspecialchars($item['kondisi_kemasan']) : '';
                        $kode_produksi = isset($item['kode_produksi']) ? htmlspecialchars($item['kode_produksi']) : '';
                        $expired = isset($item['expired']) ? htmlspecialchars($item['expired']) : date("Y-m-d");
                        $keterangan = isset($item['keterangan']) ? htmlspecialchars($item['keterangan']) : '';
                        ?>

                        <div class="loading-group border p-3 mb-3 rounded bg-light">
                            <!-- Baris input -->
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama_produk[]" class="form-control form-control-sm" value="<?= $nama_produk ?>">
                                </div>
                                <div class="col-md-2">
                                    <label>Kondisi Produk</label>
                                    <input type="text" name="kondisi_produk[]" class="form-control form-control-sm" value="<?= $kondisi_produk ?>">
                                </div>
                                <div class="col-md-2">
                                    <label>Kondisi Kemasan</label>
                                    <input type="text" name="kondisi_kemasan[]" class="form-control form-control-sm" value="<?= $kondisi_kemasan ?>">
                                </div>
                                <div class="col-md-2">
                                    <label>Kode Produksi</label>
                                    <input type="text" name="kode_produksi[]" class="form-control form-control-sm" value="<?= $kode_produksi ?>">
                                </div>
                                <div class="col-md-2">
                                    <label>Expired</label>
                                    <input type="date" name="expired[]" class="form-control form-control-sm" value="<?= $expired ?>">
                                </div>
                                <div class="col-md-2">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan[]" class="form-control form-control-sm" value="<?= $keterangan ?>">
                                </div>
                            </div>

                            <!-- Tombol hapus di bawah -->
                            <div class="form-group row mt-2">
                                <div class="col-12 text-right">
                                    <button type="button" class="btn btn-danger btn-sm btn-remove">Hapus</button>
                                </div>
                            </div>
                        </div>


                    <?php endforeach; ?>
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
                const currentValue = cb.value.split(':')[1]; // Ambil 'Ok', 'Tidak', atau angka

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
                        // Jika semua Ok dan Tidak tidak dicentang, aktifkan kembali angka
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
        newGroup.find('input').val(''); // kosongkan input
        $('#form-loading-wrapper').append(newGroup);
    });

    // Hapus baris input
        $(document).on('click', '.btn-remove', function() {
            if ($('.loading-group').length > 1) {
                $(this).closest('.loading-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });
    });
</script>
