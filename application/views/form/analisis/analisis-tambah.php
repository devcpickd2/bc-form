<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Permohonan Analisis Sampel Laboratorium</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('analisis')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Permohonan Analisis Sampel Laboratorium</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('analisis/tambah');?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tipe Sampel</label>
                            <input type="text" name="tipe_sampel" class="form-control <?= form_error('tipe_sampel') ? 'invalid' : '' ?> " value="<?= set_value('tipe_sampel'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('tipe_sampel')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('tipe_sampel') ?>
                            </div>
                        </div> 
                        <?php
                        $storage_value = set_value('penyimpanan', isset($data->penyimpanan) ? $data->penyimpanan : '');
                        $storage_options = ['Dry'];
                        $is_custom_storage = !in_array($storage_value, $storage_options) && $storage_value !== '';
                        ?>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Penyimpanan</label>
                            <select name="penyimpanan" id="penyimpanan" class="form-control <?= form_error('penyimpanan') ? 'is-invalid' : '' ?>" onchange="toggleInputLainnya('penyimpanan', 'inputStorageLain')">
                                <option value="">-- Pilih Storage --</option>
                                <?php foreach ($storage_options as $option): ?>
                                    <option value="<?= $option ?>" <?= !$is_custom_storage && $storage_value == $option ? 'selected' : '' ?>><?= $option ?></option>
                                <?php endforeach; ?>
                                <option value="Other" <?= $is_custom_storage ? 'selected' : '' ?>>Other</option>
                            </select>

                            <div id="inputStorageLain" style="display: <?= $is_custom_storage ? 'block' : 'none' ?>; margin-top: 10px;">
                                <input type="text" id="penyimpanan_lainnya" class="form-control" placeholder="Masukkan storage lain" value="<?= $is_custom_storage ? $storage_value : '' ?>">
                            </div>

                            <div class="invalid-feedback <?= form_error('penyimpanan') ? 'd-block' : '' ?>">
                                <?= form_error('penyimpanan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'invalid' : '' ?> " value="<?= set_value('nama_produk'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_produk')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_produk') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Production Code</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= set_value('kode_produksi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_produksi') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Best Before</label>
                            <input type="date" name="best_before" class="form-control <?= form_error('best_before') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('best_before')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('best_before') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jumlah Sampel (g)</label>
                            <input type="text" name="jumlah_sampel" class="form-control <?= form_error('jumlah_sampel') ? 'invalid' : '' ?> " value="<?= set_value('jumlah_sampel'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_sampel')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_sampel') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('analisis')?>" class="btn btn-md btn-danger">
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
    function toggleInputLainnya(dropdownId, inputDivId) {
        var dropdown = document.getElementById(dropdownId);
        var inputDiv = document.getElementById(inputDivId);
        if (dropdown.value === "Other") {
            inputDiv.style.display = "block";
        } else {
            inputDiv.style.display = "none";
        }
    }

    window.onload = function () {
        toggleInputLainnya('penyimpanan', 'inputStorageLain');
    };

    document.querySelector("form").addEventListener("submit", function () {
        var dropdown = document.getElementById("penyimpanan");
        var input = document.getElementById("penyimpanan_lainnya");

        if (dropdown.value === "Other" && input.value.trim() !== "") {
            const newOption = document.createElement("option");
            newOption.value = input.value.trim();
            newOption.text = input.value.trim();
            newOption.selected = true;
            dropdown.appendChild(newOption);
        }
    });
</script>
