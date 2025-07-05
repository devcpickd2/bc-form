<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Benda Mudah Pecah<</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('pecahbelah') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Benda Mudah Pecah
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('pecahbelah/tambah'); ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?>" value="<?= date("Y-m-d") ?>">
                        <div class="invalid-feedback <?= form_error('date') ? 'd-block' : '' ?>"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option disabled selected>Pilih Shift</option>
                            <option value="1" <?= set_select('shift', 1) ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', 2) ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', 3) ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('shift') ? 'd-block' : '' ?>"><?= form_error('shift') ?></div>
                    </div>
                </div>
                <hr>

                <div class="form-area" id="form-pecahbelah-wrapper">
                    <label class="form-label font-weight-bold">Checklist Alat</label>
                    <div class="pecahbelah-group border p-3 mb-4 rounded bg-light" data-index="0">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Nama Alat</label>
                                <select class="form-control select2-alat" name="nama_barang[]" style="width: 100%;">
                                    <option disabled selected>Nama Barang</option>
                                    <option value="Lampu + Cover">Lampu + Cover</option>
                                    <option value="Akrilik Showcase">Akrilik Showcase</option>
                                    <option value="Akrilik Freezer">Akrilik Freezer</option>
                                    <option value="Akrilik Pada Pintu">Akrilik Pada Pintu</option>
                                    <option value="Akrilik Jendela">Akrilik Jendela</option>
                                    <option value="Akrilik pada pintu & jendela">Akrilik pada pintu & jendela</option>
                                    <option value="Akrilik Penutup Blower">Akrilik Penutup Blower</option>
                                    <option value="Akrilik Sheeting Moulding">Akrilik Sheeting Moulding</option>
                                    <option value="Akrilik Timer Oven">Akrilik Timer Oven</option>
                                    <option value="Akrilik Box Lakban">Akrilik Box Lakban</option>
                                    <option value="Akrilik Panel">Akrilik Panel</option>
                                    <option value="Penutup Mesin Cutting">Penutup Mesin Cutting</option>
                                    <option value="Penutup Mesin Sieving">Penutup Mesin Sieving</option>
                                    <option value="Box Preparasi">Box Preparasi</option>
                                    <option value="Box Tepung Besar">Box Tepung Besar</option>
                                    <option value="Box Tepung Kecil">Box Tepung Kecil</option>
                                    <option value="Penutup Box Tepung Kecil">Penutup Box Tepung Kecil</option>
                                    <option value="Box Water Chiller">Box Water Chiller</option>
                                    <option value="Box Reject dan Waste">Box Reject dan Waste</option>
                                    <option value="Box Metal Detector">Box Metal Detector</option>
                                    <option value="Box Pencucian">Box Pencucian</option>
                                    <option value="Botol Semprot">Botol Semprot</option>
                                    <option value="Baking Cart">Baking Cart</option>
                                    <option value="Tempat minyak goreng">Tempat minyak goreng</option>
                                    <option value="Jam Dinding">Jam Dinding</option>
                                    <option value="Display Suhu">Display Suhu</option>
                                    <option value="Fly Catcher">Fly Catcher</option>
                                    <option value="Tempat telepon akrilik">Tempat telepon akrilik</option>
                                    <option value="Cermin">Cermin</option>
                                    <option value="Dispenser handsanitizer">Dispenser handsanitizer</option>
                                    <option value="Tempat Sampah">Tempat Sampah</option>
                                    <option value="Helm Code Red">Helm Code Red</option>
                                    <option value="Lampu Alarm">Lampu Alarm</option>
                                    <option value="Test Piece">Test Piece</option>
                                    <option value="Kacamata">Kacamata</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Area</label>
                                <select class="form-control" name="area[]">
                                    <option disabled selected>Nama Area</option>
                                    <option value="Ruang Buffer">Ruang Buffer</option>
                                    <option value="Ruang Pengayakan">Ruang Pengayakan</option>
                                    <option value="Chiller 2">Chiller 2</option>
                                    <option value="Ruang Preparasi">Ruang Preparasi</option>
                                    <option value="Ruang Mixing">Ruang Mixing</option>
                                    <option value="Ruang Fermentasi">Ruang Fermentasi</option>
                                    <option value="Ruang Baking">Ruang Baking</option>
                                    <option value="Ruang Cleaning">Ruang Cleaning</option>
                                    <option value="Ruang Cutting">Ruang Cutting</option>
                                    <option value="Ruang Grinding">Ruang Grinding</option>
                                    <option value="Ruang Aging">Ruang Aging</option>
                                    <option value="Ruang Packing">Ruang Packing</option>
                                    <option value="Office QC">Office QC</option>
                                    <option value="Office Produksi">Office Produksi</option>
                                    <option value="Ruang RM">Ruang RM</option>
                                    <option value="Lift">Lift</option>
                                    <option value="Anteroom">Anteroom</option>
                                    <option value="Loker">Loker</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Pemilik</label>
                                <select class="form-control" name="pemilik[]">
                                    <option value="Produksi">Produksi</option>
                                    <option value="QC">QC</option>
                                </select>
                            </div>
                        </div>

                        <div class="row kondisi-wrapper">
                            <div class="col-sm-3">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah[]" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan[]" class="form-control">
                            </div>
                            <div class="col-3">
                                <label>Kondisi Awal</label>
                                <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Ok" class="form-check-input"><label class="form-check-label">Ok</label></div>
                                <div class="form-check"><input type="radio" name="kondisi_awal[0]" value="Tidak Ok" class="form-check-input"><label class="form-check-label">Tidak Ok</label></div>
                            </div>
                            <div class="col-sm-3 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                            </div> 
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-2" id="add-pecahbelah">+ Tambah Benda</button>
                <hr>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url('pecahbelah') ?>" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
    .input-lainnya-wrapper {
        margin-top: 10px;
    }
</style>

<script>
$(document).ready(function () {
    let index = 1;

    $('#add-pecahbelah').click(function () {
        const newGroup = $('.pecahbelah-group').first().clone();
        newGroup.attr('data-index', index);

        // Reset input
        newGroup.find('input[type="text"], input[type="number"]').val('');
        newGroup.find('input[type="radio"]').prop('checked', false);

        // Reset select native (tanpa Select2)
        newGroup.find('select').val('');

        // Update name radio button berdasarkan index
        newGroup.find('input[type="radio"]').each(function () {
            const baseName = $(this).attr('name').split('[')[0];
            $(this).attr('name', baseName + '[' + index + ']');
        });

        $('#form-pecahbelah-wrapper').append(newGroup);
        index++;
    });

    $(document).on('click', '.btn-remove', function () {
        if ($('.pecahbelah-group').length > 1) {
            $(this).closest('.pecahbelah-group').remove();
        } else {
            alert("Minimal satu baris harus ada.");
        }
    });
});
</script>
