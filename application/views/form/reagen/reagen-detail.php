<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Verifikasi Penggunaan Reagen Klorin</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('reagen'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Penggunaan Reagen Klorin</a>
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
                                $datetime = new datetime($reagen->date);
                                $datetime = $datetime->format('d-m-Y');

                                $bb = new datetime($reagen->best_before);
                                $bb = $bb->format('d-m-Y');

                                $open = new datetime($reagen->tgl_buka_botol);
                                $open = $open->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">VERIFIKASI PENGGUNAAN REAGEN KLORIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                </tr>
                                <tr>
                                    <td>Nama Larutan</td>
                                    <td colspan="6"><?= $reagen->nama_larutan;?></td>
                                </tr>
                                <tr>
                                    <td>No. Lot</td>
                                    <td colspan="6"><?= $reagen->no_lot;?></td>
                                </tr>
                                <tr>
                                    <td>Best Before</td>
                                    <td colspan="6"><?= $bb ;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Buka Botol</td>
                                    <td colspan="6"><?= $open ;?></td>
                                </tr>
                                <tr>
                                    <td>Volume Penggunaan Larutan</td>
                                    <td colspan="6"><?= $reagen->volume_penggunaan;?> mL</td>
                                </tr>
                                <tr>
                                    <td>Volume Volume Akhir Larutan</td>
                                    <td colspan="6"><?= $reagen->volume_akhir;?> mL</td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td colspan="6"> <?= !empty($reagen->catatan) ? $reagen->catatan : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align:center;" colspan="5">VERIFIKASI</th>
                                </tr>
                                <tr>
                                    <td>QC</td>
                                    <td colspan="6"><?= $reagen->username;?></td>
                                </tr>
                                <tr>
                                    <td>Disetujui Supervisor</td>
                                    <td colspan="4"><?php
                                    if ($reagen->status_spv == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($reagen->status_spv == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                    } elseif ($reagen->status_spv == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                    }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Catatan Supervisor</td>
                                <td colspan="4"><?= !empty($reagen->catatan_spv) ? $reagen->catatan_spv : 'Tidak ada'; ?></td>
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