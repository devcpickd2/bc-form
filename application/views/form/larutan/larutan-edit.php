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
                <form method="post" action="<?= base_url('larutan/edit/' . $larutan->uuid); ?>">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Tanggal</label>
                                <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>" value="<?= $larutan->date ?>">
                                <div class="invalid-feedback"><?= form_error('date') ?></div>
                            </div>
                            <div class="col-sm-3">
                                <label>Shift</label>
                                <select class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>" name="shift">
                                    <option value="1" <?= $larutan->shift == 1 ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= $larutan->shift == 2 ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?= $larutan->shift == 3 ? 'selected' : '' ?>>3</option>
                                </select>
                                <div class="invalid-feedback"><?= form_error('shift') ?></div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row align-items-center">
                            <div class="col-md-2">
                                <label>Nama Bahan</label>
                                <input type="text" readonly class="form-control" name="nama_bahan" value="<?= $larutan->nama_bahan ?>">
                            </div>
                            <div class="col-md-1">
                                <label>Kadar</label>
                                <input type="text" readonly class="form-control" name="kadar" value="<?= $larutan->kadar ?>">
                            </div>
                            <div class="col-md-1">
                                <label>Bahan Kimia</label>
                                <input type="text" class="form-control" name="bahan_kimia" value="<?= $larutan->bahan_kimia ?>">
                            </div>
                            <div class="col-md-1">
                                <label>Air Bersih</label>
                                <input type="text" class="form-control" name="air_bersih" value="<?= $larutan->air_bersih ?>">
                            </div>
                            <div class="col-md-1">
                                <label>Volume Akhir</label>
                                <input type="text" class="form-control" name="volume_akhir" value="<?= $larutan->volume_akhir ?>">
                            </div>
                            <div class="col-md-1">
                                <label>Kebutuhan</label>
                                <input type="text" class="form-control" name="kebutuhan" value="<?= $larutan->kebutuhan ?>">
                            </div>
                            <div class="col-md-1 text-center">
                                <label>Keterangan</label><br>
                                <input type="checkbox" name="keterangan" value="Sesuai" <?= $larutan->keterangan == 'Sesuai' ? 'checked' : '' ?>>
                            </div>
                            <div class="col-md-2">
                                <label>Tindakan</label>
                                <input type="text" class="form-control" name="tindakan" value="<?= $larutan->tindakan ?>">
                            </div>
                            <div class="col-md-2">
                                <label>Verifikasi</label>
                                <input type="text" class="form-control" name="verifikasi" value="<?= $larutan->verifikasi ?>">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label>Catatan</label>
                                <textarea class="form-control" name="catatan" rows="2"><?= $larutan->catatan ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <a href="<?= base_url('larutan') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                            </div>
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
