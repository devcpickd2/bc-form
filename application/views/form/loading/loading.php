<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Pemeriksaan Loading Produk</h1>
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
                <a href="<?= base_url('loading/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Tanggal / Shift</th>
                            <th>Start - Finish Loading</th>
                            <th>Tujuan</th>
                            <th style="text-align: center;">LOADING</th>
                            <th>Supervisor</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <!-- <tr>
                            <th>Nama Produk</th>
                            <th>Kode Produksi</th>
                            <th>Kode Expired</th>
                            <th>Keterangan</th>
                        </tr> -->
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($loading as $val) {
                            $datetime = new DateTime($val->date);
                            $tanggalFormatted = $datetime->format('d-m-Y');

                            $start = new DateTime($val->start_loading);
                            $startFormatted = $start->format('H:i');
                            $finish = new DateTime($val->finish_loading);
                            $finishFormatted = $finish->format('H:i');

                            $result = json_decode($val->loading, true);
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $tanggalFormatted . " / ". $val->shift ?></td>
                                <td><?= $startFormatted . " / ". $finishFormatted; ?></td>
                                <td><?= htmlspecialchars($val->tujuan) ?></td>
                                <td>
                                    <table class="table table-sm table-bordered mb-0">
                                        <thead style="background-color:#2E86C1; color:gray; text-align:center;">
                                            <tr>
                                                <th width="30%">Nama Produk</th>
                                                <th width="20%">Kode Produksi</th>
                                                <th width="20%">Kode Expired</th>
                                                <th width="20%">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($result) && is_array($result)): ?>
                                            <?php foreach ($result as $row): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($row['nama_produk'] ?? '-'); ?></td>
                                                    <td style="text-align:center;"><?= htmlspecialchars($row['kode_produksi'] ?? '-'); ?></td>
                                                    <td style="text-align:center;"><?= htmlspecialchars($row['expired'] ?? '-'); ?></td>
                                                    <td style="text-align:center;"><?= htmlspecialchars($row['keterangan'] ?? '-'); ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
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
                                <a href="<?= base_url('loading/edit/' . $val->uuid); ?>" class="btn btn-warning btn-icon-split">
                                    <span class="text">Edit</span>
                                </a>
                                <a href="<?= base_url('loading/detail/' . $val->uuid); ?>" class="btn btn-success btn-icon-split">
                                    <span class="text">Detail</span>
                                </a>
                                <a href="<?= base_url('loading/delete/'.$val->uuid);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
