<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Pemeriksaan Sanitasi Warehouse</h1>
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Area</th>
                            <th>Titik Pemeriksaan</th>
                            <th>Kondisi</th>
                            <th>Masalah</th>
                            <th>Tindakan Koreksi</th>
                            <th>Last Updated</th>
                            <th>Last Verified</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($sanitasiwarehouse as $val) {
                            $datetime = new DateTime($val->date);
                            $tanggalFormatted = $datetime->format('d-m-Y');

                            $details = json_decode($val->detail, true);

                            $kondisiMap = [
                                '0' => 'Bersih',
                                '1' => 'Berdebu',
                                '2' => 'Basah',
                                '3' => 'Sampah (sisa lakban, kertas, remah produk/bahan baku, plastik, kardus bekas)',
                                '4' => 'Pertumbuhan mikroorganisme (jamur dan bau busuk)',
                                '5' => 'Pallet rusak/pecah',
                                '6' => 'Terdapat aktifitas binatang (tikus, kecoa, lalat, ulat, belatung)',
                                '7' => 'Sarang laba-laba',
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
                                <td><?= $tanggalFormatted; ?></td>
                                <td><?= htmlspecialchars($val->area); ?></td>
                                <td><ul><?= $bagianList ?></ul></td>
                                <td><ul><?= $kondisiList ?></ul></td>
                                <td><ul><?= $problemList ?></ul></td>
                                <td><ul><?= $tindakanList ?></ul></td>
                                <td><?= date('H:i - d m Y', strtotime($val->modified_at)); ?></td>
                                <td><?= date('H:i - d m Y', strtotime($val->tgl_update_wh)); ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($val->status_wh == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($val->status_wh == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                    } elseif ($val->status_wh == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('sanitasiwarehouse/statuswh/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Verifikasi</span>
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
