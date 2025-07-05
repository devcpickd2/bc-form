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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Date / Shift</th>
                            <th>Types of Product</th>
                            <th>Production Code</th>
                            <th>Produksi</th>
                            <th>Supervisor</th>
                            <th class="text-center">Process</th>
                            <th class="text-center">Packing</th>
                            <th class="text-center">Action</th>
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
                                    <a href="<?= base_url('produksi/bahan/'.$val->uuid);?>" class="btn btn-warning btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Raw Material">
                                        <i class="fas fa-box fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('produksi/mixing/'.$val->uuid);?>" class="btn btn-info btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Mixing">
                                        <i class="fas fa-blender fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('produksi/fermentasi/'.$val->uuid);?>" class="btn btn-success btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Fermentasi">
                                        <i class="fas fa-vial fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('produksi/baking/'.$val->uuid);?>" class="btn btn-danger btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Baking">
                                        <i class="fas fa-bread-slice fa-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('produksi/stalling/'.$val->uuid);?>" class="btn btn-warning btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Stalling">
                                        <i class="fas fa-pause-circle fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('produksi/grinding/'.$val->uuid);?>" class="btn btn-info btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Grinding">
                                        <i class="fas fa-cogs fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('produksi/drying/'.$val->uuid);?>" class="btn btn-success btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Drying">
                                        <i class="fas fa-wind fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('produksi/packing/'.$val->uuid);?>" class="btn btn-danger btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Packing">
                                        <i class="fas fa-box-open fa-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('produksi/edit/'.$val->uuid);?>" class="btn btn-warning btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('produksi/detail/'.$val->uuid);?>" class="btn btn-success btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                        <i class="fas fa-info-circle fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('produksi/delete/'.$val->uuid);?>" class="btn btn-danger btn-sm me-1 rounded-circle shadow" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                     <i class="fas fa-trash fa-lg"></i>
                                 </a>
                             </td>
                         </tr>
                         <?php 
                         $no++;
                     }
                     ?>
                 </tbody>
             </table>
         </form>
     </div>
 </div>
</div>
</div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>

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
