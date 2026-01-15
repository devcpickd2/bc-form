<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Benda Mudah Pecah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('pecahbelah') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Benda Mudah Pecah
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Check Out</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('pecahbelah/check/'.$pecahbelah->uuid);?>">
                <table>
                    <thead>
                       <tr>
                           <?php 
                           $datetime = new DateTime($pecahbelah->date);
                           $datetime = $datetime->format('d-m-Y');
                           ?>
                           <td style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                       </tr>
                       <tr>
                           <td style="text-align:left;"><b>Shift: <?= $pecahbelah->shift; ?></b></td>
                       </tr>
                   </thead>
               </table>
               <hr>
               <div class="form-area" id="form-pecahbelah-wrapper">
                <label class="form-label font-weight-bold">Checklist Alat</label>
                <?php
                $pecahbelah_data = json_decode($pecahbelah->benda_pecah, true);

                if (!is_array($pecahbelah_data)) {
                    echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                    $pecahbelah_data = [];
                }

                foreach ($pecahbelah_data as $i => $detail): 
                    $nama_barang = isset($detail['nama_barang']) ? $detail['nama_barang'] : '';
                    $area = isset($detail['area']) ? $detail['area'] : '';
                    $pemilik = isset($detail['pemilik']) ? $detail['pemilik'] : '';
                    $jumlah = isset($detail['jumlah']) ? $detail['jumlah'] : '';
                    $keterangan = isset($detail['keterangan']) ? $detail['keterangan'] : '';
                    $awal = isset($detail['kondisi_awal']) ? $detail['kondisi_awal'] : 'Ok';
                    $akhir = isset($detail['kondisi_akhir']) ? $detail['kondisi_akhir'] : 'Ok';
                    ?>
                    <div class="pecahbelah-group border p-3 mb-4 rounded bg-light" data-index="<?= $i ?>">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Nama Alat</label>
                                <select class="form-control" name="nama_barang[]" readonly>
                                    <?php
                                    $alat_list = [
                                        "Lampu + Cover", "Akrilik Showcase", "Akrilik Freezer", "Akrilik Pada Pintu",
                                        "Akrilik Jendela", "Akrilik pada pintu & jendela", "Akrilik Penutup Blower",
                                        "Akrilik Sheeting Moulding", "Akrilik Timer Oven", "Akrilik Box Lakban",
                                        "Akrilik Panel", "Penutup Mesin Cutting", "Penutup Mesin Sieving",
                                        "Box Preparasi", "Box Tepung Besar", "Box Tepung Kecil", "Penutup Box Tepung Kecil",
                                        "Box Water Chiller", "Box Reject dan Waste", "Box Metal Detector",
                                        "Box Pencucian", "Botol Semprot", "Baking Cart", "Tempat minyak goreng",
                                        "Jam Dinding", "Display Suhu", "Fly Catcher", "Tempat telepon akrilik",
                                        "Cermin", "Dispenser handsanitizer", "Tempat Sampah", "Helm Code Red",
                                        "Lampu Alarm", "Test Piece", "Kacamata"
                                    ];
                                    foreach ($alat_list as $alat) {
                                        $selected = $nama_barang == $alat ? 'selected' : '';
                                        echo "<option value=\"$alat\" $selected>$alat</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Area</label>
                                <select class="form-control" name="area[]" readonly>
                                    <?php
                                    $area_list = [
                                        "Ruang Buffer", "Ruang Pengayakan", "Chiller 2", "Ruang Preparasi", "Ruang Mixing",
                                        "Ruang Fermentasi", "Ruang Baking", "Ruang Cleaning", "Ruang Cutting", "Ruang Grinding",
                                        "Ruang Aging", "Ruang Packing", "Office QC", "Office Produksi", "Ruang RM", "Lift",
                                        "Anteroom", "Loker"
                                    ];
                                    foreach ($area_list as $areas) {
                                        $selected = $area == $areas ? 'selected' : '';
                                        echo "<option value=\"$areas\" $selected>$areas</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Pemilik</label>
                                <select class="form-control" name="pemilik[]" readonly>
                                    <option value="Produksi" <?= $pemilik == 'Produksi' ? 'selected' : '' ?>>Produksi</option>
                                    <option value="QC" <?= $pemilik == 'QC' ? 'selected' : '' ?>>QC</option>
                                </select>
                            </div>
                        </div>
                        <div class="row kondisi-wrapper">
                            <div class="col-sm-3">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah[]" class="form-control" value="<?= $jumlah ?>" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan[]" class="form-control" value="<?= $keterangan ?>" readonly>
                            </div>
                            <div class="col-3">
                                <label>Kondisi Awal</label>
                                <input type="text" name="kondisi_awal[]" class="form-control" value="<?= $awal ?>" readonly>
                            </div>
                            <div class="col-3">
                                <label>Kondisi Akhir</label>
                                <div>
                                    <input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Ok" <?= $akhir === 'Ok' ? 'checked' : '' ?>> Ok
                                    <input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Tidak Ok" <?= $akhir === 'Tidak Ok' ? 'checked' : '' ?>> Tidak Ok
                                </div>
                                <?php echo form_error('kondisi_akhir[]', '<div class="text-danger">', '</div>'); ?>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
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
    .kondisi-akhir-wrapper input[type="radio"] {
        margin-right: 40px;
    }
</style>
