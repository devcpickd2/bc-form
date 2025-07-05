<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Pemeriksaan Benda Mudah Pecah</h1>
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
                <a href="<?= base_url('pecahbelah/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center" rowspan="2">No</th>
                            <th rowspan="2">Tanggal / Shift</th>
                            <th rowspan="2">Nama Barang</th>
                            <th rowspan="2">Area / Pemilik</th>
                            <th rowspan="2">Jumlah (pcs)</th>
                            <th colspan="2" style="text-align: center;">Kondisi</th>
                            <th rowspan="2">Keterangan</th>
                            <th rowspan="2">Produksi</th>
                            <th rowspan="2">Supervisor</th>
                            <th rowspan="2" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th>Kondisi Awal</th>
                            <th>Kondisi Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($pecahbelah as $val) {
                            $datetime = new DateTime($val->date);
                            $tanggalFormatted = $datetime->format('d-m-Y');

                            $breakable = json_decode($val->benda_pecah, true);
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $tanggalFormatted . " / " . $val->shift;?></td>
                                <td>
                                    <ul>
                                        <?php 
                                        if (!empty($breakable)) {
                                            foreach ($breakable as $equip) {
                                                echo '<li>' . htmlspecialchars($equip['nama_barang']) . '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <?php 
                                        if (!empty($breakable)) {
                                            foreach ($breakable as $equip) {
                                              echo '<li>' . htmlspecialchars($equip['area']) . " / " . htmlspecialchars($equip['pemilik']) . '</li>';
                                          }
                                      }
                                      ?>
                                  </ul>
                              </td>
                              <td>
                                <ul>
                                    <?php 
                                    if (!empty($breakable)) {
                                        foreach ($breakable as $equip) {
                                            echo '<li>' . htmlspecialchars($equip['jumlah']) . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php 
                                    if (!empty($breakable)) {
                                        foreach ($breakable as $equip) {
                                            echo '<li>' . htmlspecialchars($equip['kondisi_awal']) . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php 
                                    if (!empty($breakable)) {
                                        foreach ($breakable as $equip) {
                                            echo '<li>' . htmlspecialchars($equip['kondisi_akhir']) . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php 
                                    if (!empty($breakable)) {
                                        foreach ($breakable as $equip) {
                                            echo '<li>' . htmlspecialchars($equip['keterangan']) . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </td>
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
                                <a href="<?= base_url('pecahbelah/edit/' . $val->uuid); ?>" class="btn btn-warning btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                <a href="<?= base_url('pecahbelah/check/' . $val->uuid); ?>" class="btn btn-danger btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Check Out">
                                    <i class="fas fa-sign-out-alt fa-lg"></i>
                                </a>
                                <a href="<?= base_url('pecahbelah/detail/' . $val->uuid); ?>" class="btn btn-success btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class="fas fa-info-circle fa-lg"></i>
                                </a>
                                <a href="<?= base_url('pecahbelah/delete/'.$val->uuid);?>" class="btn btn-danger btn-sm me-1 rounded-circle shadow" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
