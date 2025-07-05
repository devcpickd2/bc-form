<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Kebersihan dan Sanitasi Setelah Perbaikan Mesin</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('kebersihanmesin'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Kebersihan dan Sanitasi Setelah Perbaikan Mesin</a>
                </li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <?php 
                                $datetime = new datetime($kebersihanmesin->date);
                                $datetime = $datetime->format('d-m-Y');

                                $date_repaired = new datetime($kebersihanmesin->tgl_perbaikan);
                                $date_repaired = $date_repaired->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">PEMERIKSAAN KEBERSIHAN DAN SANITASI SETELAH PERBAIKAN MESIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                    <td colspan="6"><b>Shift : <?= $kebersihanmesin->shift;?><b></td>
                                    </tr>
                                    <tr>
                                        <td>Mesin / Peralatan</td>
                                        <td colspan="6"><?= $kebersihanmesin->mesin;?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Perbaikan</td>
                                        <td colspan="6"><?= $kebersihanmesin->perbaikan;?></td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td colspan="6"><?= $kebersihanmesin->area;?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Perbaikan</td>
                                        <td colspan="6"><?= $date_repaired;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: center;">Kondisi</td>
                                        <td colspan="4" style="text-align: center;">Spare Part yang Tertinggal</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: center;"><?= $kebersihanmesin->kondisi;?></td>
                                        <td colspan="4" style="text-align: center;"><?= $kebersihanmesin->spare_part;?></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td colspan="6"> <?= !empty($kebersihanmesin->keterangan) ? $kebersihanmesin->keterangan : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center;" colspan="5">VERIFIKASI</th>
                                    </tr>
                                    <tr>
                                        <td>QC</td>
                                        <td colspan="6"><?= $kebersihanmesin->username;?></td>
                                    </tr>
                                    <tr>
                                        <td>Produksi</td>
                                        <td colspan="5"><?= $kebersihanmesin->nama_produksi;?></td>
                                    </tr>
                                    <tr>
                                        <td>Diketahui Produksi</td>
                                        <td colspan="4">
                                            <?php
                                            if ($kebersihanmesin->status_produksi == 0) {
                                                echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                            } elseif ($kebersihanmesin->status_produksi == 1) {
                                                echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                            } elseif ($kebersihanmesin->status_produksi == 2) {
                                                echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                            }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan Produksi</td>
                                        <td colspan="4"><?= !empty($kebersihanmesin->catatan_produksi) ? $kebersihanmesin->catatan_produksi : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Disetujui Supervisor</td>
                                        <td colspan="4"><?php
                                        if ($kebersihanmesin->status_spv == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($kebersihanmesin->status_spv == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                        } elseif ($kebersihanmesin->status_spv == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                        }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan Supervisor</td>
                                    <td colspan="4"><?= !empty($kebersihanmesin->catatan_spv) ? $kebersihanmesin->catatan_spv : 'Tidak ada'; ?></td>
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