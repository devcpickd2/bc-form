<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('larutan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
               <form class="user" method="post" action="<?= base_url('larutan/edit/'.$larutan->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $larutan->date; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('date') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option value="1" <?= set_select('shift', '1'); ?> <?= $larutan->shift == 1?'selected':'';?>>1</option>
                            <option value="2" <?= set_select('shift', '2'); ?> <?= $larutan->shift == 2?'selected':'';?>>2</option>
                            <option value="3" <?= set_select('shift', '3'); ?> <?= $larutan->shift == 3?'selected':'';?>>3</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <?php
                    $nama_bahan_value = set_value('nama_bahan', isset($larutan->nama_bahan) ? $larutan->nama_bahan : '');
                    $kadar_value = set_value('kadar', isset($larutan->kadar) ? $larutan->kadar : '');
                    $nama_bahan_options = ['METTA KLIN', 'DIVERFOAM', 'METTA C 330', 'HAND SOFT', 'METTA QUART', 'KLORIN 12%'];
                    $kadar_options = ['2 %', '3 %', '5 %', '100 %', '50 PPM', '200 PPM', '500 PPM'];
                    $is_custom_nama_bahan = !in_array($nama_bahan_value, $nama_bahan_options);
                    $is_custom_kadar = !in_array($kadar_value, $kadar_options);
                    ?>

                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Nama Bahan</label>
                        <select name="nama_bahan" id="nama_bahan" class="form-control <?= form_error('nama_bahan') ? 'is-invalid' : '' ?>" onchange="toggleInputLainnya('nama_bahan', 'inputLainnya')">
                            <option value="">-- Pilih Nama Bahan --</option>
                            <?php foreach ($nama_bahan_options as $option): ?>
                                <option value="<?= $option ?>" <?= !$is_custom_nama_bahan && $nama_bahan_value == $option ? 'selected' : '' ?>><?= $option ?></option>
                            <?php endforeach; ?>
                            <option value="lainnya" <?= $is_custom_nama_bahan ? 'selected' : '' ?>>Input Lainnya</option>
                        </select>
                        <div id="inputLainnya" style="display: <?= $is_custom_nama_bahan ? 'block' : 'none' ?>; margin-top: 10px;">
                            <input type="text" id="nama_bahan_lainnya" class="form-control" placeholder="Masukkan nama bahan lain" value="<?= $is_custom_nama_bahan ? $nama_bahan_value : '' ?>">
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('nama_bahan')) ? 'd-block' : '' ?>">
                            <?= form_error('nama_bahan') ?>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Kadar yang Diinginkan</label>
                        <select name="kadar" id="kadar" class="form-control <?= form_error('kadar') ? 'is-invalid' : '' ?>" onchange="toggleInputLainnya('kadar', 'inputKadarLain')">
                            <option value="">-- Pilih Kadar yang Diinginkan --</option>
                            <?php foreach ($kadar_options as $option): ?>
                                <option value="<?= $option ?>" <?= !$is_custom_kadar && $kadar_value == $option ? 'selected' : '' ?>><?= $option ?></option>
                            <?php endforeach; ?>
                            <option value="lainnya" <?= $is_custom_kadar ? 'selected' : '' ?>>Input Lainnya</option>
                        </select>
                        <div id="inputKadarLain" style="display: <?= $is_custom_kadar ? 'block' : 'none' ?>; margin-top: 10px;">
                            <input type="text" id="kadar_lainnya" class="form-control" placeholder="Masukkan kadar lain" value="<?= $is_custom_kadar ? $kadar_value : '' ?>">
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('kadar')) ? 'd-block' : '' ?>">
                            <?= form_error('kadar') ?>
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Bahan Kimia (ml)</label>
                        <select name="bahan_kimia" class="form-control <?= form_error('bahan_kimia') ? 'is-invalid' : '' ?>">
                            <option value="">-- Pilih Bahan Kimia (ml) --</option>
                            <?php
                            $bahan_kimia_options = ['3', '4', '167', '250', '300', '-'];
                            foreach ($bahan_kimia_options as $option) {
                                $selected = set_value('bahan_kimia', $larutan->bahan_kimia) == $option ? 'selected' : '';
                                echo "<option value=\"$option\" $selected>$option</option>";
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('bahan_kimia')) ? 'd-block' : '' ?>">
                            <?= form_error('bahan_kimia') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Air Bersih (ml)</label>
                        <select name="air_bersih" class="form-control <?= form_error('air_bersih') ? 'is-invalid' : '' ?>">
                            <option value="">-- Pilih Air Bersih (ml) --</option>
                            <?php
                            $air_bersih_options = ['996', '4750', '7997', '9700', '14700', '99833', '-'];
                            foreach ($air_bersih_options as $option) {
                                $selected = set_value('air_bersih', $larutan->air_bersih) == $option ? 'selected' : '';
                                echo "<option value=\"$option\" $selected>$option</option>";
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('air_bersih')) ? 'd-block' : '' ?>">
                            <?= form_error('air_bersih') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Volume Akhir (ml)</label>
                        <select name="volume_akhir" class="form-control <?= form_error('volume_akhir') ? 'is-invalid' : '' ?>">
                            <option value="">-- Pilih Volume Akhir (ml) --</option>
                            <?php
                            $volume_akhir_options = ['1000', '5000', '8000', '10000', '15000', '100000', '-'];
                            foreach ($volume_akhir_options as $option) {
                                $selected = set_value('volume_akhir', $larutan->volume_akhir) == $option ? 'selected' : '';
                                echo "<option value=\"$option\" $selected>$option</option>";
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('volume_akhir')) ? 'd-block' : '' ?>">
                            <?= form_error('volume_akhir') ?>
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Kebutuhan</label>
                        <input type="text" name="kebutuhan" class="form-control <?= form_error('kebutuhan') ? 'invalid' : '' ?> " value="<?= $larutan->kebutuhan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kebutuhan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kebutuhan') ?>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control <?= form_error('keterangan') ? 'invalid' : '' ?> " value="<?= $larutan->keterangan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('keterangan') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Tindakan Koreksi</label>
                        <input type="text" name="tindakan" class="form-control <?= form_error('tindakan') ? 'invalid' : '' ?> " value="<?= $larutan->tindakan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tindakan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('tindakan') ?>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Verifikasi Setelah Tindakan Koreksi</label>
                        <input type="text" name="verifikasi" class="form-control <?= form_error('verifikasi') ? 'invalid' : '' ?> " value="<?= $larutan->verifikasi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('verifikasi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('verifikasi') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"><?= $larutan->catatan; ?></textarea>
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
                        <a href="<?= base_url('larutan')?>" class="btn btn-md btn-danger">
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
    function toggleInputLainnya(dropdownId, inputWrapperId) {
        const dropdown = document.getElementById(dropdownId);
        const inputWrapper = document.getElementById(inputWrapperId);
        if (dropdown.value === "lainnya") {
            inputWrapper.style.display = "block";
        } else {
            inputWrapper.style.display = "none";
        }
    }

    window.onload = function () {
        toggleInputLainnya('nama_bahan', 'inputLainnya');
        toggleInputLainnya('kadar', 'inputKadarLain');
    };

    document.querySelector("form").addEventListener("submit", function () {
        handleCustomInput('nama_bahan', 'nama_bahan_lainnya');
        handleCustomInput('kadar', 'kadar_lainnya');
    });

    function handleCustomInput(selectId, inputId) {
        const dropdown = document.getElementById(selectId);
        const input = document.getElementById(inputId);
        if (dropdown.value === "lainnya" && input.value.trim() !== "") {
            const newOption = document.createElement("option");
            newOption.value = input.value.trim();
            newOption.text = input.value.trim();
            newOption.selected = true;
            dropdown.appendChild(newOption);
        }
    }
</script>
