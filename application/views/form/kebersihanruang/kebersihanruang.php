<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Kebersihan Ruang Produksi</h1>
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
                <a href="<?= base_url('kebersihanruang/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
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
                            <th>Lokasi</th>
                            <th>Bagian</th>
                            <th>Kondisi</th>
                            <th>Problem</th>
                            <th>Tindakan Koreksi</th>
                            <th>Produksi</th>
                            <th>Supervisor</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($kebersihanruang as $val) {
                            $datetime = new DateTime($val->date);
                            $tanggalFormatted = $datetime->format('d-m-Y');

                            $details = json_decode($val->detail, true);

                            $kondisiMap = [
                                '0' => 'Bersih',
                                '1' => 'Berdebu',
                                '2' => 'Basah',
                                '3' => 'Pecah/Retak',
                                '4' => 'Sisa produksi (terigu/produk)',
                                '5' => 'Noda (tinta, karat)',
                                '6' => 'Pertumbuhan mikroorganisme (jamur/bau busuk)',
                            ];

                            $bagianList = '';
                            $kondisiList = '';
                            $problemList = '';
                            $tindakanList = '';

                            if (is_array($details)) {
                                foreach ($details as $d) {
                                    $bagianList .= '<li>' . htmlspecialchars($d['bagian']) . '</li>';
                                    $kondisiList .= '<li>' . ($kondisiMap[$d['kondisi']] ?? htmlspecialchars($d['kondisi'])) . '</li>';
                                    $problemList .= '<li>' . (!empty($d['problem']) ? htmlspecialchars($d['problem']) : '-') . '</li>';
                                    $tindakanList .= '<li>' . (!empty($d['tindakan']) ? htmlspecialchars($d['tindakan']) : '-') . '</li>';
                                }
                            }

                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $tanggalFormatted . " / " . $val->shift; ?></td>
                                <td><?= htmlspecialchars($val->lokasi); ?></td>
                                <td><ul><?= $bagianList ?></ul></td>
                                <td><ul><?= $kondisiList ?></ul></td>
                                <td><ul><?= $problemList ?></ul></td>
                                <td><ul><?= $tindakanList ?></ul></td>
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
                                    <a href="<?= base_url('kebersihanruang/edit/' . $val->uuid); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="<?= base_url('kebersihanruang/detail/' . $val->uuid); ?>" class="btn btn-success btn-icon-split">
                                        <span class="text">Detail</span>
                                    </a>
                                    <a href="<?= base_url('kebersihanruang/delete/'.$val->uuid);?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
