<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Pembuatan Larutan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pembuatanlarutan'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Pembuatan Larutan</a>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <div style="display: flex; gap: 20px; align-items: flex-start;">
                            <div style="flex: 2;">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <?php 
                                        $datetime = new DateTime($pembuatanlarutan->date);
                                        $datetime = $datetime->format('d-m-Y');
                                        $datetime2 = new DateTime($pembuatanlarutan->expired);
                                        $datetime2 = $datetime2->format('d-m-Y');
                                        $timing = new DateTime($pembuatanlarutan->pukul);
                                        $timing = $timing->format('H:i');
                                        ?>
                                        <tr>
                                            <th style="text-align:center;" colspan="7">PEMERIKSAAN PEMBUATAN LARUTAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                                            <td style="text-align:left;" colspan="6"><b>Jam: <?= $timing; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Area</b></td>
                                            <td colspan="6"><?= $pembuatanlarutan->area; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Nama Chemical</b></td>
                                            <td colspan="6"><?= $pembuatanlarutan->nama_chemical; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Expired</b></td>
                                            <td colspan="6"><?= $datetime2; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Konsentrasi Larutan (ppm)</b></td>
                                            <td colspan="6"><?= $pembuatanlarutan->konsentrasi; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b></b></td>
                                            <td><b>Larutan Beku</b></td>
                                            <td colspan="5"><b>Air</b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pengenceran</b></td>
                                            <td><?= $pembuatanlarutan->larutan_beku; ?></td>
                                            <td colspan="5"><?= $pembuatanlarutan->air; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Catatan</td>
                                            <td colspan="6"> <?= !empty($pembuatanlarutan->catatan) ? $pembuatanlarutan->catatan : 'Tidak ada'; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center;" colspan="7">VERIFIKASI</th>
                                        </tr>
                                        <tr>
                                            <td>QC</td>
                                            <td colspan="6"><?= $pembuatanlarutan->username;?></td>
                                        </tr>
                                        <tr>
                                            <td>Disetujui Supervisor</td>
                                            <td colspan="6"><?php
                                            if ($pembuatanlarutan->status_spv == 0) {
                                                echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                            } elseif ($pembuatanlarutan->status_spv == 1) {
                                                echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                            } elseif ($pembuatanlarutan->status_spv == 2) {
                                                echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                            }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan Supervisor</td>
                                        <td colspan="6"><?= !empty($pembuatanlarutan->catatan_spv) ? $pembuatanlarutan->catatan_spv : 'Tidak ada'; ?></td>
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


