<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Pemeriksaan Pembuatan Larutan</h1>
    </div>

    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div><br>
    <?php endif ?>

    <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-times"></i>
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
                            <th>Tanggal / Pukul</th>
                            <th>Area</th>
                            <th>Nama Chemical</th>
                            <th>Expired</th>
                            <th>Konsentrasi</th>
                            <th>Larutan Beku</th>
                            <th>Air</th>
                            <th>Last Updated</th>
                            <th>Last Verified</th>
                            <th>SPV</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($pembuatanlarutan as $val):
                            $tanggal = (new DateTime($val->date))->format('d-m-Y');
                            $pukul = (new DateTime($val->pukul))->format('H:i');
                            $expired = (new DateTime($val->expired))->format('d-m-Y');
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $tanggal . ' / ' . $pukul ?></td>
                            <td><?= htmlspecialchars($val->area) ?></td>
                            <td><?= htmlspecialchars($val->nama_chemical) ?></td>
                            <td><?= $expired ?></td>
                            <td><?= htmlspecialchars($val->konsentrasi) ?></td>
                            <td><?= htmlspecialchars($val->larutan_beku) ?></td>
                            <td><?= htmlspecialchars($val->air) ?></td>
                            <td><?= date('H:i - d m Y', strtotime($val->modified_at)) ?></td>
                            <td><?= date('H:i - d m Y', strtotime($val->tgl_update_spv)) ?></td>
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
                                <a href="<?= base_url('pembuatanlarutan/status/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
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
                <form action="<?= base_url('pembuatanlarutan/cetak') ?>" method="post" class="form-inline">
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

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "ordering": false,
            "searching": true
        });
    });
</script>
