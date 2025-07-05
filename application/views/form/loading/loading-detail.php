<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Loading Produk</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('loading'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Loading Produk</a>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <?php 
                        $datetime = new DateTime($loading->date);
                        $datetime = $datetime->format('d-m-Y');
                        ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" colspan="7">PEMERIKSAAN LOADING PRODUK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                                    <td colspan="5" style="text-align:left;"><b>Shift: <?= $loading->shift; ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:center;"><b>Start Loading</b></td>
                                    <td colspan="4" style="text-align:center;"><b>Finish Loading</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:center;"><?= $loading->start_loading ?></td>
                                    <td colspan="4" style="text-align:center;"><?= $loading->finish_loading ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>No. Polisi</b></td>
                                    <td colspan="5"><?= $loading->no_pol; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>Nama Supir</b></td>
                                    <td colspan="5"><?= $loading->nama_supir; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>Ekspedisi</b></td>
                                    <td colspan="5"><?= $loading->ekspedisi; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>Tujuan</b></td>
                                    <td colspan="5"><?= $loading->tujuan; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>No. Segel</b></td>
                                    <td colspan="5"><?= $loading->no_segel; ?></td>
                                </tr>
                                <?php
                                $kondisi_mobil = json_decode($loading->kondisi_mobil, true);
                                $loading_produk = json_decode($loading->loading, true);
                                if (!is_array($kondisi_mobil)) $kondisi_mobil = [];
                                if (!is_array($loading_produk)) $loading_produk = [];

                                $kondisiMap = [
                                    '1' => 'Noda (karat, cat, tinta)',
                                    '2' => 'Bekas oli di lantai, di dinding',
                                    '3' => 'Pallet rusak/pecah',
                                ];
                                ?>
                                <tr>
                                    <th colspan="7" style="text-align:center;">KONDISI MOBIL</th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: left;">List Kondisi</th>
                                    <th colspan="5">Keterangan</th>
                                </tr>
                                <?php foreach ($kondisi_mobil as $row): ?>
                                    <tr>
                                        <td colspan="2" style="text-align: left;"><?= htmlspecialchars($row['list_kondisi']) ?></td>
                                        <td colspan="5">
                                            <?php
                                            $ket = $row['kondisi_mobil_keterangan'];
                                            echo isset($kondisiMap[$ket]) ? $kondisiMap[$ket] : $ket;
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th colspan="7" style="text-align:center;">LOADING PRODUK</th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Kondisi Produk</th>
                                    <th>Kondisi Kemasan</th>
                                    <th>Kode Produksi</th>
                                    <th>Expired</th>
                                    <th>Keterangan</th>
                                </tr>
                                <?php $no = 1; foreach ($loading_produk as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                                    <td><?= htmlspecialchars($row['kondisi_produk']) ?></td>
                                    <td><?= htmlspecialchars($row['kondisi_kemasan']) ?></td>
                                    <td><?= htmlspecialchars($row['kode_produksi']) ?></td>
                                    <td><?= htmlspecialchars($row['expired']) ?></td>
                                    <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <th style="text-align:center;" colspan="7">VERIFIKASI</th>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">QC</td>
                                <td colspan="5"><?= htmlspecialchars($loading->username); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">Warehouse</td>
                                <td colspan="5"><?= $loading->nama_wh;?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">Diketahui Warehouse</td>
                                <td colspan="5">
                                    <?php
                                    if ($loading->status_wh == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($loading->status_wh == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                    } elseif ($loading->status_wh == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                    }
                                ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">Catatan Warehouse</td>
                                <td colspan="5"><?= !empty($loading->catatan_wh) ? $loading->catatan_wh : 'Tidak ada'; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">Disetujui Supervisor</td>
                                <td colspan="5">
                                    <?php
                                    if ($loading->status_spv == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($loading->status_spv == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                    } elseif ($loading->status_spv == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">Catatan Supervisor</td>
                                <td colspan="5"><?= !empty($loading->catatan_spv) ? htmlspecialchars($loading->catatan_spv) : 'Tidak ada'; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style type="text/css">
    .breadcrumb {
        background-color: #2E86C1;
    }
    .no-border {
        border: none;
        box-shadow: none;
    }
    .table {
        width: 80%; 
        font-size: 16px; 
        margin: 0 auto; 
        border-collapse: collapse;
    }
    .table, .table th, .table td {
        border: 1px solid #ddd;
    }
    .table th, .table td {
        padding: 6px 8px;
        text-align: left;
        word-wrap: break-word;
        white-space: normal !important;
    }
    .table td {
        white-space: nowrap;
    }

    .table th:first-child,
    .table td:first-child {
        width: 50px;
        max-width: 50px;
        text-align: center;
        white-space: nowrap;
    }
</style>
