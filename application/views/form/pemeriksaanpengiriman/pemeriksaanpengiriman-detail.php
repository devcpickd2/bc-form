<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pemeriksaanpengiriman'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</a>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <div style="display: flex; gap: 20px; align-items: flex-start;">
                            <!-- DETAIL PEMERIKSAAN DI KANAN -->
                            <div style="flex: 2;">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <?php 
                                        $datetime = new DateTime($pemeriksaanpengiriman->date);
                                        $datetime = $datetime->format('d-m-Y');
                                        $timing = new DateTime($pemeriksaanpengiriman->jam_datang);
                                        $timing = $timing->format('H:i');
                                        ?>
                                        <tr>
                                            <th style="text-align:center;" colspan="9">PEMERIKSAAN PENGIRIMAN RM, SEASONING, KEMASAN DAN CHEMICAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align:left;" colspan="9"><b>Tanggal: <?= $datetime; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b>Nama Supplier</b></td>
                                            <td colspan="6"><?= $pemeriksaanpengiriman->nama_supplier; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b>Nama Barang</b></td>
                                            <td colspan="6"><?= $pemeriksaanpengiriman->nama_barang; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b>Jenis Mobil Pengangkut</b></td>
                                            <td colspan="6"><?= $pemeriksaanpengiriman->jenis_mobil; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b>No. Polisi</b></td>
                                            <td colspan="6"><?= $pemeriksaanpengiriman->no_polisi; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b>Identitas Pengirim</b></td>
                                            <td colspan="6"><?= $pemeriksaanpengiriman->identitas_pengantar; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center;" colspan="9">KONDISI MOBIL</th>
                                        </tr>
                                        <tr>
                                            <td><b>Segel</b></td>
                                            <td><b>Kebersihan</b></td>
                                            <td><b>Bocor</b></td>
                                            <td><b>Hama</b></td>
                                            <td><b>Jam Datang</b></td>
                                        </tr>
                                        <tr>
                                            <td><?= ($pemeriksaanpengiriman->segel == 'ok') ? '✔️' : (($pemeriksaanpengiriman->segel == 'tidak ok') ? '❌' : '−'); ?></td>
                                            <td><?= ($pemeriksaanpengiriman->kebersihan == 'ok') ? '✔️' : (($pemeriksaanpengiriman->kebersihan == 'tidak ok') ? '❌' : '−'); ?></td>
                                            <td><?= ($pemeriksaanpengiriman->bocor == 'ok') ? '✔️' : (($pemeriksaanpengiriman->bocor == 'tidak ok') ? '❌' : '−'); ?></td>
                                            <td><?= ($pemeriksaanpengiriman->hama == 'ok') ? '✔️' : (($pemeriksaanpengiriman->hama == 'tidak ok') ? '❌' : '−'); ?></td>
                                            <td colspan="5"><?= $timing; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Keterangan</td>
                                            <td colspan="6"> <?= !empty($pemeriksaanpengiriman->keterangan) ? $pemeriksaanpengiriman->keterangan : 'Tidak ada'; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center;" colspan="9">VERIFIKASI</th>
                                        </tr>
                                        <tr>
                                            <td colspan="3">QC</td>
                                            <td colspan="6"><?= $pemeriksaanpengiriman->username;?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Disetujui Supervisor</td>
                                            <td colspan="6"><?php
                                            if ($pemeriksaanpengiriman->status_spv == 0) {
                                                echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                            } elseif ($pemeriksaanpengiriman->status_spv == 1) {
                                                echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                            } elseif ($pemeriksaanpengiriman->status_spv == 2) {
                                                echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                            }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Catatan Supervisor</td>
                                        <td colspan="6"><?= !empty($pemeriksaanpengiriman->catatan_spv) ? $pemeriksaanpengiriman->catatan_spv : 'Tidak ada'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
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
        width: 50%; 
        font-size: 16px; 
        margin: 0 auto; 
    }
    .table, .table th, .table td {
        border: none;
    }
    .table th, .table td {
        padding: 6px 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        word-wrap: break-word;
        white-space: normal !important;
    }
    .table td {
        white-space: nowrap;
    }
</style>


