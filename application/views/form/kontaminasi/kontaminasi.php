<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Kontaminasi Benda Asing</h1>
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
                <a href="<?= base_url('kontaminasi/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Jenis Kontaminasi</th>
                            <th>Bukti</th>
                            <th>Produk</th>
                            <th>Kode Produksi</th>
                            <th>Produksi</th>
                            <th>Supervisor</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($kontaminasi as $val) {
                            $datetime = new datetime($val->date);
                            $datetime = $datetime->format('d-m-Y');
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $datetime; ?></td>
                                <td><?= $val->jenis_kontaminasi; ?></td>
                                <td>
                                    <?php if (!empty($val->bukti)): ?>
                                        <img src="<?= base_url('uploads/' . $val->bukti); ?>" alt="Bukti Temuan" style="max-width: 150px; max-height: 100px;">
                                    <?php else: ?>
                                        <p>No image available</p>
                                    <?php endif; ?>
                                </td>
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
                                    <a href="<?= base_url('kontaminasi/edit/'.$val->uuid);?>" class="btn btn-warning btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('kontaminasi/detail/'.$val->uuid);?>" class="btn btn-success btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                        <i class="fas fa-info-circle fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('kontaminasi/delete/'.$val->uuid);?>" class="btn btn-danger btn-sm me-1 rounded-circle shadow" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                       <i class="fas fa-trash fa-lg"></i>
                                   </td>
                               </tr>
                               <?php 
                               $no++;
                           }
                           ?>
                       </tbody>
                   </table>
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
<style> 
    th {
        background-color: #f8f9fc;
    }
</style>
