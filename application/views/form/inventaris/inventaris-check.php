<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Checklist Inventaris Peralatan QC Bread Crumb</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('inventaris') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Checklist Inventaris Peralatan QC Bread Crumb
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('inventaris/check/'.$inventaris->uuid);?>">
                <table>
                    <thead>
                     <tr>
                         <?php 
                         $datetime = new DateTime($inventaris->date);
                         $datetime = $datetime->format('d-m-Y');
                         ?>
                         <td style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                     </tr>
                     <tr>
                        <td style="text-align:left;"><b>Shift: <?= $inventaris->shift; ?></b></td>
                    </tr>
                </thead>
            </table>
            <hr>

            <div class="form-area" id="form-inventaris-wrapper">
                <label class="form-label font-weight-bold">Checklist Alat</label>
                <?php
                $inventaris_data = json_decode($inventaris->peralatan, true);

                if (!is_array($inventaris_data)) {
                    echo "<div class='alert alert-danger'>Data LOADING tidak valid atau kosong.</div>";
                    $inventaris_data = [];
                }

                foreach ($inventaris_data as $i => $detail): 
                    $nama_alat = isset($detail['nama_alat']) ? $detail['nama_alat'] : '';
                    $jumlah = isset($detail['jumlah']) ? $detail['jumlah'] : '';
                    $keterangan = isset($detail['keterangan']) ? $detail['keterangan'] : '';
                    $awal = isset($detail['kondisi_awal']) ? $detail['kondisi_awal'] : 'Ok';
                    $akhir = isset($detail['kondisi_akhir']) ? $detail['kondisi_akhir'] : 'Ok';
                    ?>
                    <div class="inventaris-group border p-3 mb-3 rounded bg-light" data-index="<?= $i ?>">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Nama Alat</label>
                                <select class="form-control" name="nama_alat[]" readonly>
                                    <option value="Adaptor Timbangan Mettler Toledo" <?= $nama_alat == 'Adaptor Timbangan Mettler Toledo' ? 'selected' : '' ?>>Adaptor Timbangan Mettler Toledo</option>
                                    <option value="Timbangan Mettler Toledo" <?= $nama_alat == 'Timbangan Mettler Toledo' ? 'selected' : '' ?>>Timbangan Mettler Toledo</option>
                                    <option value="Anak Timbang 10 kg" <?= $nama_alat == 'Anak Timbang 10 kg' ? 'selected' : '' ?>>Anak Timbang 10 kg</option>
                                    <option value="Moisture Analyzer Mettler Toledo" <?= $nama_alat == 'Moisture Analyzer Mettler Toledo' ? 'selected' : '' ?>>Moisture Analyzer Mettler Toledo</option>
                                    <option value="Stabilizer" <?= $nama_alat == 'Stabilizer' ? 'selected' : '' ?>>Stabilizer</option>
                                    <!-- Add other options as needed -->
                                </select>
                            </div> 
                            <div class="col-sm-3">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah[]" class="form-control" value="<?= $jumlah ?>" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan[]" class="form-control" value="<?= $keterangan ?>" readonly>
                            </div>
                        </div>
                        <div class="row kondisi-wrapper">
                            <div class="col-sm-3">
                                <label><strong>Kondisi Awal Shift</strong></label>
                                <input type="text" name="kondisi_awal[]" class="form-control" value="<?= $awal ?>" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label><strong>Kondisi Akhir Shift</strong></label>
                                <div class="row kondisi-wrapper">
                                    <div class="col-6">
                                        <div class="form-check"><input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Tidak Tersedia" class="form-check-input" <?= $akhir == 'Tidak Tersedia' ? 'checked' : '' ?>><label class="form-check-label">Tidak Tersedia</label></div>
                                        <div class="form-check"><input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Baik" class="form-check-input" <?= $akhir == 'Baik' ? 'checked' : '' ?>><label class="form-check-label">Baik</label></div>
                                        <div class="form-check"><input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Rusak" class="form-check-input" <?= $akhir == 'Rusak' ? 'checked' : '' ?>><label class="form-check-label">Rusak</label></div>
                                        <div class="form-check"><input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Hilang" class="form-check-input" <?= $akhir == 'Hilang' ? 'checked' : '' ?>><label class="form-check-label">Hilang</label></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check"><input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Bersih" class="form-check-input" <?= $akhir == 'Bersih' ? 'checked' : '' ?>><label class="form-check-label">Bersih</label></div>
                                        <div class="form-check"><input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Kotor" class="form-check-input" <?= $akhir == 'Kotor' ? 'checked' : '' ?>><label class="form-check-label">Kotor</label></div>
                                        <div class="form-check"><input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Habis" class="form-check-input" <?= $akhir == 'Habis' ? 'checked' : '' ?>><label class="form-check-label">Habis</label></div>
                                        <div class="form-check"><input type="radio" name="kondisi_akhir[<?= $i ?>]" value="Baik Bersih Masih" class="form-check-input" <?= $akhir == 'Baik Bersih Masih' ? 'checked' : '' ?>><label class="form-check-label">Baik Bersih Masih</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-md btn-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('inventaris') ?>" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
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
        let index = <?= count($inventaris_data); ?>;

        // Add new inventaris group
        $('#add-inventaris').click(function () {
            const newGroup = $('.inventaris-group').first().clone();
            newGroup.attr('data-index', index);

            // Reset input fields
            newGroup.find('input[type="text"], input[type="number"]').val('');
            newGroup.find('input[type="radio"]').prop('checked', false);
            newGroup.find('select').val('');

            // Update name attributes based on the current index
            newGroup.find('input[type="radio"]').each(function () {
                const baseName = $(this).attr('name').split('[')[0];
                $(this).attr('name', baseName + '[' + index + ']');
            });

            $('#form-inventaris-wrapper').append(newGroup);
            index++;
        });

        // Remove inventaris group
        $(document).on('click', '.btn-remove', function () {
            if ($('.inventaris-group').length > 1) {
                $(this).closest('.inventaris-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });
    });
</script>
