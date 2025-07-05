<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Laporan Sensori Finish Good</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('sensori'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Sensori Finish Good</a>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <?php 
                        $datetime = new DateTime($sensori->date);
                        $datetime = $datetime->format('d-m-Y');
                        ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" colspan="7">LAPORAN SENSORI FINISH GOOD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>Nama Produk</b></td>
                                    <td colspan="5"><?= $sensori->nama_produk; ?></td>
                                </tr>
                                <?php
                                $sensori_produk = json_decode($sensori->produk, true);
                                if (!is_array($sensori_produk)) $sensori_produk = [];
                                ?>
                                <tr>
                                    <th colspan="7" style="text-align:center;">Sensori Produk</th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align:center;">Warna</th>
                                    <th style="text-align:center;">Tekstur</th>
                                    <th style="text-align:center;">Rasa</th>
                                    <th style="text-align:center;">Aroma</th>
                                    <th style="text-align:center;">Kenampakan</th>
                                </tr>
                                <?php 
                                foreach ($sensori_produk as $row): ?>
                                    <tr>
                                        <td colspan="2" style="text-align:center;">
                                            <?= ($row['warna'] == 'Ok') ? '✔' : (($row['warna'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['warna'])) ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= ($row['tekstur'] == 'Ok') ? '✔' : (($row['tekstur'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['tekstur'])) ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= ($row['rasa'] == 'Ok') ? '✔' : (($row['rasa'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['rasa'])) ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= ($row['aroma'] == 'Ok') ? '✔' : (($row['aroma'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['aroma'])) ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= ($row['kenampakan'] == 'Ok') ? '✔' : (($row['kenampakan'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['kenampakan'])) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <td colspan="3">Catatan</td>
                                    <td colspan="6"> <?= !empty($sensori->catatan) ? $sensori->catatan : 'Tidak ada'; ?></td>
                                </tr>

                                <tr>
                                    <th style="text-align:center;" colspan="7">VERIFIKASI</th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left">QC</td>
                                    <td colspan="5"><?= htmlspecialchars($sensori->username); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left">Produksi</td>
                                    <td colspan="5"><?= $sensori->nama_produksi;?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left">Diketahui Produksi</td>
                                    <td colspan="5">
                                        <?php
                                        if ($sensori->status_produksi == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($sensori->status_produksi == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                        } elseif ($sensori->status_produksi == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                        }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left">Catatan Produksi</td>
                                    <td colspan="5"><?= !empty($sensori->catatan_produksi) ? $sensori->catatan_produksi : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left">Disetujui Supervisor</td>
                                    <td colspan="5">
                                        <?php
                                        if ($sensori->status_spv == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($sensori->status_spv == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                        } elseif ($sensori->status_spv == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left">Catatan Supervisor</td>
                                    <td colspan="5"><?= !empty($sensori->catatan_spv) ? htmlspecialchars($sensori->catatan_spv) : 'Tidak ada'; ?></td>
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
