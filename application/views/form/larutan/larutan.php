<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</h1>
    </div>

    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-times"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group text-right">
                <a href="<?= base_url('larutan/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th width="20px" class="text-center" rowspan="2">No</th>
                            <th rowspan="2">Tanggal / Shift</th>
                            <th rowspan="2">Nama Bahan</th>
                            <th rowspan="2">Kadar yang Diinginkan</th>
                            <th colspan="3" style="text-align: center;">Verifikasi Formulasi</th>
                            <th rowspan="2">Produksi</th>
                            <th rowspan="2">Supervisor</th>
                            <th rowspan="2" class="text-center">Action</th> -->
                            <th>No</th>
                            <th>Tanggal / Shift</th>
                            <th>Supervisor</th>
                            <th>Action</th>
                        </tr>
                        <!-- <tr>
                            <th>Bahan Kimia (ml)</th>
                            <th>Air Bersih (ml)</th>
                            <th>Volume Akhir (ml)</th>
                        </tr> -->
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($larutan as $val) {
                            $datetime = new DateTime($val->date);
                            $tanggalFormatted = $datetime->format('d-m-Y');
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $tanggalFormatted . " / " . $val->shift;?></td>
                                <!-- <td><?= $val->nama_bahan; ?></td>
                                <td><?= $val->kadar; ?></td>
                                <td><?= $val->bahan_kimia; ?></td>
                                <td><?= $val->air_bersih; ?></td>
                                <td><?= $val->volume_akhir; ?></td> -->
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
                                    <a href="<?= base_url('larutan/edit/' . $val->uuid); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="<?= base_url('larutan/detail/' . $val->uuid); ?>" class="btn btn-success btn-icon-split">
                                        <span class="text">Detail</span>
                                    </a>
                                    <a href="<?= base_url('larutan/delete/'.$val->uuid);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <span class="text">Delete</span>
                                    </a>
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
