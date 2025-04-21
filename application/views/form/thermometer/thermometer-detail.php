<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Peneraan Thermometer</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('thermometer'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Peneraan Thermometer</a>
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
                                $datetime = new datetime($thermometer->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">PENERAAN THERMOMETER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;" colspan="7"><b>Tanggal : <?= $datetime;?></b></td>
                                </tr>
                                <tr>
                                    <td>Kode Thermometer</td>
                                    <td colspan="6"><?= $thermometer->kode_thermo;?></td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td colspan="6"><?= $thermometer->area;?></td>
                                </tr>
                                <tr>
                                    <td><b>Standar</b></td>
                                    <td colspan="6"><b><?= $thermometer->standar;?></b></td>
                                </tr>
                                <tr>
                                    <td>Waktu Peneraan</td>
                                    <td colspan="6"><?= $thermometer->peneraan_waktu;?></td>
                                </tr>
                                <tr>
                                    <td>Hasil Peneraan</td>
                                    <td colspan="6"><?= $thermometer->peneraan_hasil;?></td>
                                </tr>
                                <tr>
                                    <td>Tindakan Perbaikan</td>
                                    <td colspan="6"> <?= !empty($thermometer->tindakan_perbaikan) ? $thermometer->tindakan_perbaikan : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align:center;" colspan="5">VERIFIKASI</th>
                                </tr>
                                <tr>
                                    <td>QC</td>
                                    <td colspan="6"><?= $thermometer->username;?></td>
                                </tr>
                                <!-- <tr>
                                    <td>Produksi</td>
                                    <td colspan="5"><?= $thermometer->nama_produksi;?></td>
                                </tr>
                                <tr>
                                    <td>Diketahui Produksi</td>
                                    <td colspan="4">
                                        <?php
                                        if ($thermometer->status_produksi == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($thermometer->status_produksi == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                        } elseif ($thermometer->status_produksi == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                        }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan Produksi</td>
                                    <td colspan="4"><?= !empty($thermometer->catatan_produksi) ? $thermometer->catatan_produksi : 'Tidak ada'; ?></td>
                                </tr> -->
                                <tr>
                                    <td>Disetujui Supervisor</td>
                                    <td colspan="4"><?php
                                    if ($thermometer->status_spv == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($thermometer->status_spv == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                    } elseif ($thermometer->status_spv == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                    }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Catatan Supervisor</td>
                                <td colspan="4"><?= !empty($thermometer->catatan_spv) ? $thermometer->catatan_spv : 'Tidak ada'; ?></td>
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
        border-bottom: 1px solid #ddd; /
    }
    .table td {
        white-space: nowrap;
    }
</style>