<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Permohonan Analisis Sampel Laboratorium</h1>
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
                            <th>Tipe Sampel</th>
                            <th>Penyimpanan</th>
                            <th>Nama Produk</th>
                            <th>Kode Produksi / Best Before</th>
                            <th>Permintaan Analisis</th>
                            <th>Last Updated</th>
                            <th>Last Verified</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        function tampilkan_analisis($kode) {
                            $map = [
                                '1' => 'Moisture',
                                '2' => 'Salinity',
                                '3' => 'pH',
                                '4' => 'Bulk Density',
                                '5' => 'TPC',
                                '6' => 'Enterobacter',
                                '7' => 'Salmonella',
                                '8' => 'Yeast and Mold',
                            ];
                            return $map[$kode] ?? $kode;
                        }

                        $no = 1;
                        foreach($analisis as $val):
                            $datetime = new DateTime($val->date);
                            $datetime = $datetime->format('d-m-Y');
                            $bb = new DateTime($val->best_before);
                            $bb = $bb->format('d-m-Y');
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $datetime; ?></td>
                                <td><?= htmlspecialchars($val->tipe_sampel); ?></td>
                                <td><?= htmlspecialchars($val->penyimpanan); ?></td>
                                <td><?= htmlspecialchars($val->nama_produk); ?></td>
                                <td><?= htmlspecialchars($val->kode_produksi) . " / " . $bb; ?></td>
                                <td>
                                    <?php
                                    $nilai = explode(',', $val->analisis);
                                    $hasil = array_map('tampilkan_analisis', array_map('trim', $nilai));
                                    echo htmlspecialchars(implode(', ', $hasil));
                                    ?>
                                </td>
                                <td><?= date('H:i - d m Y', strtotime($val->modified_at)); ?></td>
                                <td><?= date('H:i - d m Y', strtotime($val->tgl_update_produksi)); ?></td>
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
                                    <a href="<?= base_url('analisis/statusprod/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Check</span>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            $no++;
                        endforeach; 
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
