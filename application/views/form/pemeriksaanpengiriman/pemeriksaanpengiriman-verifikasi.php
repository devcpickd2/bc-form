<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</h1>
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
            <i class="fas fa-times"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
        <br>
    <?php endif ?> 

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th class="text-center">Segel</th>
                            <th class="text-center">Kebersihan</th>
                            <th class="text-center">Bocor</th>
                            <th class="text-center">Hama</th>
                            <th class="text-center">Jam Datang</th>
                            <th>Last Updated</th>
                            <th>Last Verified</th>
                            <th class="text-center">SPV</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($pemeriksaanpengiriman as $val) {
                            $datetime = new DateTime($val->date);
                            $datetime = $datetime->format('d-m-Y');
                            $timing = new DateTime($val->jam_datang);
                            $timing = $timing->format('H:i');
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $datetime; ?></td>
                                <td><?= $val->nama_supplier; ?></td>
                                <td><?= $val->nama_barang; ?></td>
                                <td class="text-center">
                                    <?= ($val->segel == 'ok') ? '✔️' : (($val->segel == 'tidak ok') ? '❌' : '−'); ?>
                                </td>
                                <td class="text-center">
                                    <?= ($val->kebersihan == 'ok') ? '✔️' : (($val->kebersihan == 'tidak ok') ? '❌' : '−'); ?>
                                </td>
                                <td class="text-center">
                                    <?= ($val->bocor == 'ok') ? '✔️' : (($val->bocor == 'tidak ok') ? '❌' : '−'); ?>
                                </td>
                                <td class="text-center">
                                    <?= ($val->hama == 'ok') ? '✔️' : (($val->hama == 'tidak ok') ? '❌' : '−'); ?>
                                </td>
                                <td class="text-center"><?= $timing; ?></td>
                                <td><?= date('H:i - d m Y', strtotime($val->modified_at)); ?></td>
                                <td><?= date('H:i - d m Y', strtotime($val->tgl_update_spv)); ?></td>
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
                                    <a href="<?= base_url('pemeriksaanpengiriman/status/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Verifikasi</span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br>
            <div class="mb-3">
                <form action="<?= base_url('pemeriksaanpengiriman/cetak') ?>" method="post" class="form-inline">
                    <label for="tanggal" class="mr-2 font-weight-bold">Pilih Tanggal:</label>
                    <input type="date" name="tanggal" class="form-control mr-2" required>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-print fa-sm text-white-50"></i> Cetak PDF
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<style> 
    th {
        background-color: #f8f9fc;
    }
</style>
