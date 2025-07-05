<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('larutan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('larutan/tambah');?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option disabled selected>Pilih Shift</option>
                                <option value="1" <?= set_select('shift', 1); ?>>Shift 1</option>
                                <option value="2" <?= set_select('shift', 2); ?>>Shift 2</option>
                                <option value="3" <?= set_select('shift', 3); ?>>Shift 3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Bahan</label>
                            <select name="nama_bahan" id="nama_bahan" class="form-control <?= form_error('nama_bahan') ? 'is-invalid' : '' ?>" onchange="toggleInputLainnya()">
                                <option value="">-- Pilih Nama Bahan --</option>
                                <option value="METTA KLIN" <?= set_value('nama_bahan') == 'METTA KLIN' ? 'selected' : '' ?>>METTA KLIN</option>
                                <option value="DIVERFOAM" <?= set_value('nama_bahan') == 'DIVERFOAM' ? 'selected' : '' ?>>DIVERFOAM</option>
                                <option value="METTA C 330" <?= set_value('nama_bahan') == 'METTA C 330' ? 'selected' : '' ?>>METTA C 330</option>
                                <option value="HAND SOFT" <?= set_value('nama_bahan') == 'HAND SOFT' ? 'selected' : '' ?>>HAND SOFT</option>
                                <option value="METTA QUART" <?= set_value('nama_bahan') == 'METTA QUART' ? 'selected' : '' ?>>METTA QUART</option>
                                <option value="KLORIN 12%" <?= set_value('nama_bahan') == 'KLORIN 12%' ? 'selected' : '' ?>>KLORIN 12%</option>
                                <option value="lainnya" <?= set_value('nama_bahan') == 'lainnya' ? 'selected' : '' ?>>Input Lainnya</option>
                            </select>

                            <div id="inputLainnya" style="display: none; margin-top: 10px;">
                                <input type="text" id="nama_bahan_lainnya" class="form-control" placeholder="Masukkan nama bahan lain" value="<?= set_value('nama_bahan') ?>">
                            </div>

                            <div class="invalid-feedback <?= !empty(form_error('nama_bahan')) ? 'd-block' : '' ?>">
                                <?= form_error('nama_bahan') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kadar yang Diinginkan</label>
                            <select name="kadar" id="kadar" class="form-control <?= form_error('kadar') ? 'is-invalid' : '' ?>" onchange="toggleInputKadar()">
                                <option value="">-- Pilih Kadar yang Diinginkan --</option>
                                <option value="2 %" <?= set_value('kadar') == '2 %' ? 'selected' : '' ?>>2 %</option>
                                <option value="3 %" <?= set_value('kadar') == '3 %' ? 'selected' : '' ?>>3 %</option>
                                <option value="5 %" <?= set_value('kadar') == '5 %' ? 'selected' : '' ?>>5 %</option>
                                <option value="100 %" <?= set_value('kadar') == '100 %' ? 'selected' : '' ?>>100 %</option>
                                <option value="50 PPM" <?= set_value('kadar') == '50 PPM' ? 'selected' : '' ?>>50 PPM</option>
                                <option value="200 PPM" <?= set_value('kadar') == '200 PPM' ? 'selected' : '' ?>>200 PPM</option>
                                <option value="500 PPM" <?= set_value('kadar') == '500 PPM' ? 'selected' : '' ?>>500 PPM</option>
                                <option value="lainnya" <?= set_value('kadar') == 'lainnya' ? 'selected' : '' ?>>Input Lainnya</option>
                            </select>
                            <div id="inputKadarLain" style="display: none; margin-top: 10px;">
                                <input type="text" id="kadar_lainnya" class="form-control" placeholder="Masukkan kadar lain" value="<?= set_value('kadar') ?>">
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
                                <option value="3" <?= set_value('bahan_kimia') == '3' ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= set_value('bahan_kimia') == '4' ? 'selected' : '' ?>>4</option>
                                <option value="167" <?= set_value('bahan_kimia') == '167' ? 'selected' : '' ?>>167</option>
                                <option value="250" <?= set_value('bahan_kimia') == '250' ? 'selected' : '' ?>>250</option>
                                <option value="300" <?= set_value('bahan_kimia') == '300' ? 'selected' : '' ?>>300</option>
                                <option value="-" <?= set_value('bahan_kimia') == '-' ? 'selected' : '' ?>>-</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('bahan_kimia')) ? 'd-block' : '' ?>">
                                <?= form_error('bahan_kimia') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Air Bersih (ml)</label>
                            <select name="air_bersih" class="form-control <?= form_error('air_bersih') ? 'is-invalid' : '' ?>">
                                <option value="">-- Pilih Air Bersih (ml) --</option>
                                <option value="996" <?= set_value('air_bersih') == '996' ? 'selected' : '' ?>>996</option>
                                <option value="4750" <?= set_value('air_bersih') == '4750' ? 'selected' : '' ?>>4750</option>
                                <option value="7997" <?= set_value('air_bersih') == '7997' ? 'selected' : '' ?>>7997</option>
                                <option value="9700" <?= set_value('air_bersih') == '9700' ? 'selected' : '' ?>>9700</option>
                                <option value="14700" <?= set_value('air_bersih') == '14700' ? 'selected' : '' ?>>14700</option>
                                <option value="99833" <?= set_value('air_bersih') == '99833' ? 'selected' : '' ?>>99833</option>
                                <option value="-" <?= set_value('air_bersih') == '-' ? 'selected' : '' ?>>-</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('air_bersih')) ? 'd-block' : '' ?>">
                                <?= form_error('air_bersih') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Volume Akhir (ml)</label>
                            <select name="volume_akhir" class="form-control <?= form_error('volume_akhir') ? 'is-invalid' : '' ?>">
                                <option value="">-- Pilih Volume Akhir (ml) --</option>
                                <option value="1000" <?= set_value('volume_akhir') == '1000' ? 'selected' : '' ?>>1000</option>
                                <option value="5000" <?= set_value('volume_akhir') == '5000' ? 'selected' : '' ?>>5000</option>
                                <option value="8000" <?= set_value('volume_akhir') == '8000' ? 'selected' : '' ?>>8000</option>
                                <option value="10000" <?= set_value('volume_akhir') == '10000' ? 'selected' : '' ?>>10000</option>
                                <option value="15000" <?= set_value('volume_akhir') == '15000' ? 'selected' : '' ?>>15000</option>
                                <option value="100000" <?= set_value('volume_akhir') == '100000' ? 'selected' : '' ?>>100000</option>
                                <option value="-" <?= set_value('volume_akhir') == '-' ? 'selected' : '' ?>>-</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('volume_akhir')) ? 'd-block' : '' ?>">
                                <?= form_error('volume_akhir') ?>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kebutuhan</label>
                            <input type="text" name="kebutuhan" class="form-control <?= form_error('kebutuhan') ? 'invalid' : '' ?> " value="<?= set_value('kebutuhan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kebutuhan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kebutuhan') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control <?= form_error('keterangan') ? 'invalid' : '' ?> " value="<?= set_value('keterangan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('keterangan') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tindakan Koreksi</label>
                            <input type="text" name="tindakan" class="form-control <?= form_error('tindakan') ? 'invalid' : '' ?> " value="<?= set_value('tindakan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('tindakan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('tindakan') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Verifikasi Setelah Tindakan Koreksi</label>
                            <input type="text" name="verifikasi" class="form-control <?= form_error('verifikasi') ? 'invalid' : '' ?> " value="<?= set_value('verifikasi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('verifikasi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('verifikasi') ?>
                            </div>
                        </div> 
                    </div>
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
    function toggleInputLainnya() {
        var dropdown = document.getElementById("nama_bahan");
        var inputLainnya = document.getElementById("inputLainnya");

        if (dropdown.value === "lainnya") {
            inputLainnya.style.display = "block";
        } else {
            inputLainnya.style.display = "none";
        }
    }

    // Ganti isi dropdown sebelum submit jika user isi input manual
    document.querySelector("form").addEventListener("submit", function (e) {
        var dropdown = document.getElementById("nama_bahan");
        var inputLain = document.getElementById("nama_bahan_lainnya");

        if (dropdown.value === "lainnya" && inputLain.value.trim() !== "") {
            // Buat option baru di dropdown dan pilih
            var customOption = document.createElement("option");
            customOption.value = inputLain.value;
            customOption.text = inputLain.value;
            customOption.selected = true;
            dropdown.appendChild(customOption);
        }
    });

    // Aktifkan input "lainnya" kalau sebelumnya diset
    window.onload = toggleInputLainnya;
</script>

<script>
    function toggleInputKadar() {
        const dropdown = document.getElementById("kadar");
        const inputLain = document.getElementById("inputKadarLain");

        if (dropdown.value === "lainnya") {
            inputLain.style.display = "block";
        } else {
            inputLain.style.display = "none";
        }
    }

    // Saat form disubmit, jika "lainnya", ganti nilai dropdown dengan input user
    document.querySelector("form").addEventListener("submit", function () {
        const dropdown = document.getElementById("kadar");
        const input = document.getElementById("kadar_lainnya");

        if (dropdown.value === "lainnya" && input.value.trim() !== "") {
            const newOption = document.createElement("option");
            newOption.value = input.value;
            newOption.text = input.value;
            newOption.selected = true;
            dropdown.appendChild(newOption);
        }
    });

    // Tampilkan input jika sebelumnya user pilih "lainnya"
    window.onload = toggleInputKadar;
</script>
