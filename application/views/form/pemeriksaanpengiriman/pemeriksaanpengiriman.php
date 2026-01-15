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
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
        <br>
    <?php endif ?> 

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group text-right">
                <a href="<?= base_url('pemeriksaanpengiriman/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center" rowspan="2">No</th>
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">Nama Supplier</th>
                            <th rowspan="2">Nama Barang</th>
                            <th colspan="5" class="text-center">Kondisi Mobil</th>
                            <th rowspan="2">Supervisor</th>
                            <th rowspan="2" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th>Segel</th>
                            <th>Kebersihan</th>
                            <th>Bocor</th>
                            <th>Hama</th>
                            <th>Jam Datang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($pemeriksaanpengiriman as $val) {
                            $datetime = new datetime($val->date);
                            $datetime = $datetime->format('d-m-Y');

                            $timing = new DateTime($val->jam_datang);
                            $timing = $timing->format('H:i');

                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
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
                                    <a href="<?= base_url('pemeriksaanpengiriman/edit/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Update</span>
                                    </a>
                                    <a href="<?= base_url('pemeriksaanpengiriman/detail/'.$val->uuid);?>" class="btn btn-success btn-icon-split">
                                        <span class="text">Detail</span>
                                    </a>
                                    <!-- <a href="<?= base_url('pemeriksaanpengiriman/delete/'.$val->uuid);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <span class="text">Delete</span>
                                    </a> -->
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
<style> 
    th {
        background-color: #f8f9fc;
    }
</style>
