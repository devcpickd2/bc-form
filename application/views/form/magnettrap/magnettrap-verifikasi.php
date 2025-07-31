<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Pemeriksaan Magnet Trap</h1>
    </div>

    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div><br>
    <?php endif ?>

    <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div><br>
    <?php endif ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Tanggal / Shift</th>
                            <th>Tahapan</th>
                            <th>Jenis Kontaminasi</th>
                            <th>Bukti</th>
                            <th>Last Updated</th>
                            <th>Last Verified</th>
                            <th>SPV</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($magnettrap as $val): 
                            $tanggal = (new DateTime($val->date))->format('d-m-Y');
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $tanggal . " / " . $val->shift ?></td>
                                <td><?= $val->tahapan ?></td>
                                <td><?= $val->kontaminasi ?></td>
                                <td>
                                    <?php if (!empty($val->bukti)): ?>
                                        <img src="<?= base_url('uploads/' . $val->bukti) ?>" alt="Bukti" style="max-width: 150px; max-height: 100px;">
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada gambar</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('H:i - d m Y', strtotime($val->modified_at)) ?></td>
                                <td><?= date('H:i - d m Y', strtotime($val->tgl_update_spv)) ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($val->status_spv == 0) {
                                        echo '<span style="color:#99a3a4;font-weight:bold;">Created</span>';
                                    } elseif ($val->status_spv == 1) {
                                        echo '<span style="color:#28b463;font-weight:bold;">Verified</span>';
                                    } elseif ($val->status_spv == 2) {
                                        echo '<span style="color:red;font-weight:bold;">Revision</span>';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('magnettrap/status/' . $val->uuid) ?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Verifikasi</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <br><hr>
            <div class="form-group">
                <form action="<?= base_url('magnettrap/cetak') ?>" method="post" class="form-inline">
                <label for="tanggal" class="mr-2 font-weight-bold">Pilih Tanggal:</label>
                <input type="date" name="tanggal" class="form-control mr-2" required>

                <label for="shift" class="mr-2 font-weight-bold">Shift:</label>
                <select name="shift" class="form-control mr-2" required>
                    <option value="">-- Pilih Shift --</option>
                    <option value="1">Shift 1</option>
                    <option value="2">Shift 2</option>
                    <option value="3">Shift 3</option>
                </select>

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
