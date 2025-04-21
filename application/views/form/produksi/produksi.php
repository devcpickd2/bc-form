<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Verifikasi Proses Produksi</h1>
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
            <div class="form-group text-right">
                <a href="<?= base_url('produksi/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <!-- <form action="<?= base_url('produksi/cetak') ?>" method="post" id="form_cetak_pdf"> -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <!-- <th width="30px" class="text-center">
                                    <i class="fas fa-print fa-lg"></i>
                                </th> -->
                                <th width="20px" class="text-center">No</th>
                                <th>Date / Shift</th>
                                <th>Types of Product</th>
                                <th>Production Code</th>
                                <th>Produksi</th>
                                <th>Supervisor</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Process</th>
                                <th class="text-center">Going to Finish</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($produksi as $val) {
                                $datetime = new datetime($val->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <!-- <td class="text-center"><input type="checkbox" name="checkbox[]" value="<?= $val->uuid ?>" class="select_row"></td> -->
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $datetime . ' / '. $val->shift; ?></td>
                                    <td><?= $val->nama_produk; ?></td>
                                    <td><?= $val->kode_produksi; ?></td>
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
                                        <a href="<?= base_url('produksi/edit/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                            <span class="text">Edit</span>
                                        </a>
                                        <a href="<?= base_url('produksi/detail/'.$val->uuid);?>" class="btn btn-success btn-icon-split">
                                            <span class="text">Detail</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                     <a href="<?= base_url('produksi/bahan/'.$val->uuid);?>" class="btn btn-primary btn-icon-split">
                                        <span class="text">Raw Material</span>
                                    </a>
                                    <a href="<?= base_url('produksi/mixing/'.$val->uuid);?>" class="btn btn-primary btn-icon-split">
                                        <span class="text">Mixing</span>
                                    </a>
                                    <a href="<?= base_url('produksi/fermentasi/'.$val->uuid);?>" class="btn btn-primary btn-icon-split">
                                        <span class="text">Fermentasi & E. Baking</span>
                                    </a></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('produksi/stalling/'.$val->uuid);?>" class="btn btn-danger btn-icon-split">
                                            <span class="text">Stalling</span>
                                        </a>
                                        <a href="<?= base_url('produksi/drying/'.$val->uuid);?>" class="btn btn-danger btn-icon-split">
                                            <span class="text">Drying</span>
                                        </a>
                                        <a href="<?= base_url('produksi/packing/'.$val->uuid);?>" class="btn btn-danger btn-icon-split">
                                            <span class="text">Packing</span>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- <input type="hidden" name="checkbox[]" id="selected_items"> -->
                </form>
            </div>

           <!--  <br>
            <hr>
            <div class="form-group">
                <label>Pilih Data yang akan dicetak:</label>
                <br>
                <button type="submit" form="form_cetak_pdf" class="btn btn-success">
                    <i class="fas fa-print fa-sm text-white-50"></i> Cetak PDF
                </button>
            </div> -->
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
