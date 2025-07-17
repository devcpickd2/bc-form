<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Suhu Ruang</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('suhu')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Suhu Ruang</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('suhu/tambah');?>">
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
                            <label class="form-label font-weight-bold">Pukul</label>
                            <input type="time" name="pukul" class="form-control <?= form_error('pukul') ? 'invalid' : '' ?> " 
                            value="<?php echo date('H:00') ?>" 
                            min="01:00" 
                            max="23:00" 
                            step="3600"> 
                            <div class="invalid-feedback <?= !empty(form_error('pukul')) ? 'd-block' : '' ; ?>">
                                <?= form_error('pukul') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <!-- Dropdown Plant -->
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Plant</label>
                            <select name="plant" id="plantDropdown" class="form-control <?= form_error('plant') ? 'is-invalid' : '' ?>">
                                <option value="">-- Pilih Plant --</option>
                                <option value="Cikande" <?= set_select('plant', 'Cikande') ?>>Cikande</option>
                                <option value="Salatiga" <?= set_select('plant', 'Salatiga') ?>>Salatiga</option>
                            </select>
                            <div class="invalid-feedback <?= form_error('plant') ? 'd-block' : '' ?>">
                                <?= form_error('plant') ?>
                            </div>
                        </div>

                        <!-- Lokasi Cikande -->
                        <div class="col-sm-4 lokasi-form d-none" id="lokasiCikande">
                            <label class="form-label font-weight-bold">Lokasi Cikande</label>
                            <select id="lokasiCikandeSelect" class="form-control">
                                <option value="">-- Pilih Lokasi --</option>
                                <option value="Ruang Produksi">Ruang Produksi</option>
                                <option value="Gudang Premix">Gudang Premix</option>
                                <option value="Gudang Raw Material">Gudang Raw Material</option>
                                <option value="Gudang Finish Good">Gudang Finish Good</option>
                                <option value="Proofing Room">Proofing Room</option>
                                <option value="Aging Room 1">Aging Room 1</option>
                                <option value="Aging Room 2">Aging Room 2</option>
                                <option value="Ruang Produksi (Bubble)">Ruang Produksi (Bubble)</option>
                            </select>
                        </div>

                        <!-- Lokasi Salatiga -->
                        <div class="col-sm-4 lokasi-form d-none" id="lokasiSalatiga">
                            <label class="form-label font-weight-bold">Lokasi Salatiga</label>
                            <select id="lokasiSalatigaSelect" class="form-control">
                                <option value="">-- Pilih Lokasi --</option>
                                <option value="Ruang Pengayakan">Ruang Pengayakan</option>
                                <option value="Ruang RM">Ruang RM</option>
                                <option value="Chiller 1">Chiller 1</option>
                                <option value="Chiller 2">Chiller 2</option>
                                <option value="Chiller 3">Chiller 3</option>
                                <option value="Chiller 4">Chiller 4</option>
                                <option value="Chiller 5">Chiller 5</option>
                                <option value="Chiller 6">Chiller 6</option>
                                <option value="Ruang Mixing">Ruang Mixing</option>
                                <option value="Area Baking">Area Baking</option>
                                <option value="Area Cutting & Grinding">Area Cutting & Grinding</option>
                                <option value="Ruang Aging">Ruang Aging</option>
                                <option value="Area Packing">Area Packing</option>
                            </select>
                        </div>

                        <!-- Hidden input yang dikirim ke server -->
                        <input type="hidden" name="lokasi" id="lokasiHidden" value="<?= set_value('lokasi') ?>">
                    </div>

                    <?php if (form_error('lokasi')): ?>
                        <div class="col-sm-12">
                            <div class="text-danger small"><?= form_error('lokasi') ?></div>
                        </div>
                    <?php endif; ?>


                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Suhu (<span id="standarSuhuLabel">... - ...</span> °C)</label>
                            <input type="text" name="suhu" class="form-control <?= form_error('suhu') ? 'invalid' : '' ?> " value="<?= set_value('suhu'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('suhu')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('suhu') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">RH (<span id="standarRhLabel"></span> %)</label>
                            <input type="text" name="rh" class="form-control <?= form_error('rh') ? 'invalid' : '' ?> " value="<?= set_value('rh'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('rh')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('rh') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
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
                            <a href="<?= base_url('suhu')?>" class="btn btn-md btn-danger">
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
    // Data suhu standar
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

    // Data RH standar
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

        $('#lokasiCikandeSelect, #lokasiSalatigaSelect').change(function () {
            let lokasi = $(this).val();

        // Suhu
            let suhu = suhuStandar[lokasi] || '';
            $('#inputSuhu').val(suhu);
            $('#standarSuhuLabel').text(suhu || '... - ...');

        // RH
            let rh = rhStandar[lokasi] || '';
            $('#inputRh').val(rh);
            $('#standarRhLabel').text(rh || '');

        // Hidden lokasi
            $('#lokasiHidden').val(lokasi);
        });
    });
</script>

<!-- Script jQuery -->
<script>
    $(document).ready(function () {
        function toggleLokasiDropdown() {
            const selectedPlant = $('#plantDropdown').val();
            $('.lokasi-form').addClass('d-none');
            $('#lokasiHidden').val('');

            if (selectedPlant === 'Cikande') {
                $('#lokasiCikande').removeClass('d-none');
            } else if (selectedPlant === 'Salatiga') {
                $('#lokasiSalatiga').removeClass('d-none');
            }
        }

        // Ketika dropdown lokasi berubah
        $('#lokasiCikandeSelect').on('change', function () {
            $('#lokasiHidden').val($(this).val());
        });
        $('#lokasiSalatigaSelect').on('change', function () {
            $('#lokasiHidden').val($(this).val());
        });

        // Inisialisasi saat halaman pertama kali dimuat
        toggleLokasiDropdown();

        // Tetapkan dropdown lokasi jika set_value('lokasi') ada
        const oldLokasi = "<?= set_value('lokasi') ?>";
        $('#lokasiCikandeSelect option[value="' + oldLokasi + '"]').prop('selected', true);
        $('#lokasiSalatigaSelect option[value="' + oldLokasi + '"]').prop('selected', true);
        $('#lokasiHidden').val(oldLokasi);

        $('#plantDropdown').on('change', toggleLokasiDropdown);
    });
</script>