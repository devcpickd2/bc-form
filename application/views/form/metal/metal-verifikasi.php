<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Pemeriksaan Metal Detector</h1>
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
                <form action="<?= base_url('metal/cetak') ?>" method="post" id="form_cetak_pdf">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">
                                    <i class="fas fa-print fa-lg"></i> 
                                </th>
                                <th width="20px" class="text-center">No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Types of Product</th>
                                <th>Production Code</th>
                                <th>Last Updated</th>
                                <th>Last Verified</th>
                                <th>Produksi</th>
                                <th>SPV</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($metal as $val) {
                                $datetime = new datetime($val->date_metal);
                                $datetime = $datetime->format('d-m-Y'); 

                                $timing = new DateTime($val->time);
                                $timing = $timing->format('H:i');
                                ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="checkbox[]" value="<?= $val->uuid ?>" class="select_row"></td>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $datetime; ?></td>
                                    <td><?= $timing; ?></td>
                                    <td><?= $val->nama_produk; ?></td>
                                    <td><?= $val->kode_produksi; ?></td>
                                    <td><?= date('H:i - d m Y', strtotime($val->modified_at)); ?></td>
                                    <td><?= date('H:i - d m Y', strtotime($val->tgl_update_spv_metal)); ?></td>
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
                                        <a href="<?= base_url('metal/status/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
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
            <div class="form-group">
                <label>Pilih Data yang akan dicetak:</label>
                <br>
                <button type="submit" form="form_cetak_pdf" class="btn btn-success">
                    <i class="fas fa-print fa-sm text-white-50"></i> Cetak PDF
                </button>
            </div>
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
