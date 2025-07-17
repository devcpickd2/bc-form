<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Pemeriksaan Kebersihan dan Sanitasi Setelah Perbaikan Mesin</h1>
    </div>

    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
        <br>
    <?php endif ?> 

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="<?= base_url('larutan/cetak') ?>" method="post" id="form_cetak_pdf">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center" rowspan="2">
                                    <i class="fas fa-print fa-lg"></i>
                                </th>
                                <th width="20px" class="text-center" rowspan="2">No</th>
                                <th rowspan="2">Tanggal / Shift</th>
                                <th rowspan="2">Nama Bahan</th>
                                <th rowspan="2">Kadar yang Diinginkan</th>
                                <th colspan="3" style="text-align: center;">Verifikasi Formulasi</th>
                                <th rowspan="2">Last Updated</th>
                                <th rowspan="2">Last Verified</th>
                                <th rowspan="2">Produksi</th>
                                <th rowspan="2">SPV</th>
                                <th rowspan="2" class="text-center">Action</th>
                            </tr>
                            <tr>
                                <th>Bahan Kimia (ml)</th>
                                <th>Air Bersih (ml)</th>
                                <th>Volume Akhir (ml)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($larutan as $val) {
                                $datetime = new datetime($val->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="checkbox[]" value="<?= $val->uuid ?>" class="select_row"></td>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $datetime . " / " . $val->shift;?></td>
                                    <td><?= $val->nama_bahan; ?></td>
                                    <td><?= $val->kadar; ?></td>
                                    <td><?= $val->bahan_kimia; ?></td>
                                    <td><?= $val->air_bersih; ?></td>
                                    <td><?= $val->volume_akhir; ?></td>
                                    <td><?= date('H:i - d m Y', strtotime($val->modified_at)); ?></td>
                                    <td><?= date('H:i - d m Y', strtotime($val->tgl_update_spv)); ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($val->status_produksi == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($val->status_produksi == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                        } elseif ($val->status_produksi == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($val->status_spv == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($val->status_spv == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                        } elseif ($val->status_spv == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('larutan/status/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                            <span class="text">Verifikasi</span>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="checkbox[]" id="selected_items">
                </form>
            </div>
            <br>
            <hr>
            <form action="<?= base_url('larutan/cetak') ?>" method="post" class="mb-4" id="form_cetak_pdf">
                <div class="form-group row">
                    <label class="col-form-label font-weight-bold">Pilih Tanggal :</label>
                    <div class="col-sm-3">
                        <select name="tanggal" class="form-control" required>
                            <option value="">-- Pilih Tanggal --</option>
                            <?php
                            $tanggalList = [];
                            foreach ($larutan as $item) {
                                $dateFormatted = date('Y-m-d', strtotime($item->date));
                                if (!in_array($dateFormatted, $tanggalList)) {
                                    $tanggalList[] = $dateFormatted;
                                    echo '<option value="' . $dateFormatted . '">' . date('d-m-Y', strtotime($dateFormatted)) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-print fa-sm text-white-50"></i> Cetak PDF
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    document.getElementById('select_all').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('.select_row');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = this.checked;
        });
    });

    document.getElementById('form_cetak_pdf').addEventListener('submit', function(event) {
        var selectedCheckboxes = document.querySelectorAll('.select_row:checked');
        var selectedItems = [];

        selectedCheckboxes.forEach(function(checkbox) {
            selectedItems.push(checkbox.value); 
        });
        if (selectedItems.length === 0) {
            event.preventDefault(); 
            alert("Silakan pilih data yang ingin dicetak.");
            return;
        }
        document.getElementById('selected_items').value = selectedItems.join(',');
    });
</script>
<style> 
    th {
        background-color: #f8f9fc;
    }
</style>
