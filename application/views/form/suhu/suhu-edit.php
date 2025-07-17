<?php
// Mapping nama plant dari UUID
function getPlantName($uuid) {
    if ($uuid === '651ac623-5e48-44cc-b2f6-5d622603f53c') return 'Cikande';
    if ($uuid === '1eb341e0-1ec4-4484-ba8f-32d23352b84d') return 'Salatiga';
    return 'Tidak diketahui';
}
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Suhu</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('suhu')?>"><i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Suhu</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('suhu/edit/'.$suhu->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>" value="<?= $suhu->date ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
                            <option value="1" <?= set_select('shift', '1', $suhu->shift == 1); ?>>1</option>
                            <option value="2" <?= set_select('shift', '2', $suhu->shift == 2); ?>>2</option>
                            <option value="3" <?= set_select('shift', '3', $suhu->shift == 3); ?>>3</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Pukul</label>
                        <input type="time" name="pukul" class="form-control <?= form_error('pukul') ? 'is-invalid' : '' ?>" 
                        value="<?= set_value('pukul', date('H:00', strtotime($suhu->pukul))) ?>" 
                        min="01:00" max="23:00" step="3600">
                        <div class="invalid-feedback"><?= form_error('pukul') ?></div>
                    </div>
                </div>

                <hr>

                <!-- Plant ditampilkan sebagai teks, disimpan dalam hidden input -->
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Plant</label>
                        <input type="text" class="form-control" value="<?= getPlantName($suhu->plant) ?>" readonly>
                        <input type="hidden" name="plant" id="plantHidden" value="<?= $suhu->plant ?>">
                    </div>

                    <!-- Lokasi Cikande -->
                    <div class="col-sm-4 lokasi-form d-none" id="lokasiCikande">
                        <label class="form-label font-weight-bold">Lokasi Cikande</label>
                        <select id="lokasiCikandeSelect" class="form-control">
                            <option value="">-- Pilih Lokasi --</option>
                            <?php
                            $lokasiCikande = [
                                "Ruang Produksi", "Gudang Premix", "Gudang Raw Material", "Gudang Finish Good",
                                "Proofing Room", "Aging Room 1", "Aging Room 2", "Ruang Produksi (Bubble)"
                            ];
                            foreach ($lokasiCikande as $lok) {
                                echo '<option value="'.$lok.'"'.($suhu->lokasi == $lok ? ' selected' : '').'>'.$lok.'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Lokasi Salatiga -->
                    <div class="col-sm-4 lokasi-form d-none" id="lokasiSalatiga">
                        <label class="form-label font-weight-bold">Lokasi Salatiga</label>
                        <select id="lokasiSalatigaSelect" class="form-control">
                            <option value="">-- Pilih Lokasi --</option>
                            <?php
                            $lokasiSalatiga = [
                                "Ruang Pengayakan", "Ruang RM", "Chiller 1", "Chiller 2", "Chiller 3",
                                "Chiller 4", "Chiller 5", "Chiller 6", "Ruang Mixing", "Area Baking",
                                "Area Cutting & Grinding", "Ruang Aging", "Area Packing"
                            ];
                            foreach ($lokasiSalatiga as $lok) {
                                echo '<option value="'.$lok.'"'.($suhu->lokasi == $lok ? ' selected' : '').'>'.$lok.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Hidden lokasi yang disubmit -->
                    <input type="hidden" name="lokasi" id="lokasiHidden" value="<?= set_value('lokasi', $suhu->lokasi) ?>">
                </div>
                <?php if (form_error('lokasi')): ?>
                    <div class="text-danger small"><?= form_error('lokasi') ?></div>
                <?php endif; ?>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">
                            Suhu (<span id="standarSuhuLabel"><?= $suhu->suhu ?></span> °C)
                        </label>
                        <input type="text" name="suhu" class="form-control <?= form_error('suhu') ? 'is-invalid' : '' ?>" value="<?= set_value('suhu', $suhu->suhu) ?>">
                        <div class="invalid-feedback"><?= form_error('suhu') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">
                            RH (<span id="standarRhLabel"><?= $suhu->rh ?></span> %)
                        </label>
                        <input type="text" name="rh" class="form-control <?= form_error('rh') ? 'is-invalid' : '' ?>" value="<?= set_value('rh', $suhu->rh) ?>">
                        <div class="invalid-feedback"><?= form_error('rh') ?></div>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"><?= set_value('catatan', $suhu->catatan) ?></textarea>
                        <div class="invalid-feedback"><?= form_error('catatan') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('suhu') ?>" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- SCRIPT PLANT DAN LOKASI -->
<script>
    $(document).ready(function () {
        function toggleLokasiDropdown(plant) {
            $('.lokasi-form').addClass('d-none');
            $('#lokasiHidden').val('');

            if (plant === '651ac623-5e48-44cc-b2f6-5d622603f53c') {
                $('#lokasiCikande').removeClass('d-none');
                $('#lokasiHidden').val($('#lokasiCikandeSelect').val());
            } else if (plant === '1eb341e0-1ec4-4484-ba8f-32d23352b84d') {
                $('#lokasiSalatiga').removeClass('d-none');
                $('#lokasiHidden').val($('#lokasiSalatigaSelect').val());
            }
        }

        const currentPlant = $('#plantHidden').val();
        toggleLokasiDropdown(currentPlant);

        $('#lokasiCikandeSelect').on('change', function () {
            $('#lokasiHidden').val($(this).val());
        });
        $('#lokasiSalatigaSelect').on('change', function () {
            $('#lokasiHidden').val($(this).val());
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Standar suhu dan RH
        const suhuStandar = {
            "Ruang Produksi": "25 - 35",
            "Gudang Premix": "15 - 22",
            "Gudang Raw Material": "25 - 35",
            "Gudang Finish Good": "28 - 36",
            "Proofing Room": "34 - 36",
            "Aging Room 1": "35 - 45",
            "Aging Room 2": "35 - 45",
            "Ruang Produksi (Bubble)": "25 - 35",
            "Ruang Pengayakan": "25 - 35",
            "Ruang RM": "15 - 22",
            "Chiller 1": "0 - 4",
            "Chiller 2": "0 - 4",
            "Chiller 3": "0 - 4",
            "Chiller 4": "0 - 4",
            "Chiller 5": "0 - 4",
            "Chiller 6": "0 - 4",
            "Ruang Mixing": "25 - 35",
            "Area Baking": "25 - 35",
            "Area Cutting & Grinding": "25 - 35",
            "Ruang Aging": "35 - 45",
            "Area Packing": "25 - 35"
        };

        const rhStandar = {
           "Ruang Produksi": "65 - 80",
           "Gudang Premix": "45 - 55",
           "Gudang Raw Material": "60 - 75",
           "Gudang Finish Good": "60 - 75",
           "Proofing Room": "78 - 82",
           "Aging Room 1": "50 - 70",
           "Aging Room 2": "50 - 70",
           "Ruang Produksi (Bubble)": "65 - 80"
       };

       function isiStandarSuhuRh(lokasi) {
        const suhu = suhuStandar[lokasi] || '... - ...';
        const rh = rhStandar[lokasi] || '';

        $('#inputSuhu').val(suhu);
        $('#standarSuhuLabel').text(suhu);

        $('#inputRh').val(rh);
        $('#standarRhLabel').text(rh);
    }

        // Saat halaman dibuka, jika sudah ada lokasi, langsung isi standar
    const lokasiAwal = $('#lokasiHidden').val();
    if (lokasiAwal) {
        isiStandarSuhuRh(lokasiAwal);
    }

        // Saat pilih lokasi dari dropdown
    $('#lokasiCikandeSelect, #lokasiSalatigaSelect').on('change', function () {
        const lokasi = $(this).val();
        $('#lokasiHidden').val(lokasi);
        isiStandarSuhuRh(lokasi);
    });
});
</script>

<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>
