<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('larutan'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</a>
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
                                $datetime = new datetime($larutan->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">VERIFIKASI PEMBUATAN LARUTAN CLEANING DAN SANITASI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                    <td colspan="6"><b>Shift : <?= $larutan->shift;?><b></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Bahan</td>
                                        <td colspan="6"><?= $larutan->nama_bahan;?></td>
                                    </tr>
                                    <tr>
                                        <td>Kadar yang Diinginkan</td>
                                        <td colspan="6"><?= $larutan->kadar;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="text-align: center;"><b>Verifikasi Formulasi</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center;">Bahan Kimia (ml)</td>
                                        <td colspan="2" style="text-align: center;">Air Bersih (ml)</td>
                                        <td colspan="3" style="text-align: center;">Volume Akhir (ml)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center;"><?= $larutan->bahan_kimia;?></td>
                                        <td colspan="2" style="text-align: center;"><?= $larutan->air_bersih;?></td>
                                        <td colspan="3" style="text-align: center;"><?= $larutan->volume_akhir;?></td>
                                    </tr>
                                    <tr>
                                        <td>Kebutuhan</td>
                                        <td colspan="6"><?= $larutan->kebutuhan;?></td>
                                    </tr>
                                     <tr>
                                        <td>Keterangan</td>
                                        <td colspan="6"><?= $larutan->keterangan;?></td>
                                    </tr>
                                     <tr>
                                        <td>Tindakan Koreksi</td>
                                        <td colspan="6"><?= $larutan->tindakan;?></td>
                                    </tr>
                                     <tr>
                                        <td>Verifikasi Setelah Tindakan Koreksi</td>
                                        <td colspan="6"><?= $larutan->verifikasi;?></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan</td>
                                        <td colspan="6"> <?= !empty($larutan->catatan) ? $larutan->catatan : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center;" colspan="5">VERIFIKASI</th>
                                    </tr>
                                    <tr>
                                        <td>QC</td>
                                        <td colspan="6"><?= $larutan->username;?></td>
                                    </tr>
                                    <tr>
                                        <td>Produksi</td>
                                        <td colspan="5"><?= $larutan->nama_produksi;?></td>
                                    </tr>
                                    <tr>
                                        <td>Diketahui Produksi</td>
                                        <td colspan="4">
                                            <?php
                                            if ($larutan->status_produksi == 0) {
                                                echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                            } elseif ($larutan->status_produksi == 1) {
                                                echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                            } elseif ($larutan->status_produksi == 2) {
                                                echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                            }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan Produksi</td>
                                        <td colspan="4"><?= !empty($larutan->catatan_produksi) ? $larutan->catatan_produksi : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Disetujui Supervisor</td>
                                        <td colspan="4"><?php
                                        if ($larutan->status_spv == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($larutan->status_spv == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                        } elseif ($larutan->status_spv == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                        }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan Supervisor</td>
                                    <td colspan="4"><?= !empty($larutan->catatan_spv) ? $larutan->catatan_spv : 'Tidak ada'; ?></td>
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