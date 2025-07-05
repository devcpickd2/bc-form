<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Permohonan Analisis Sampel Laboratorium</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('analisis'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Permohonan Analisis Sampel Laboratorium</a>
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
                                $datetime = new datetime($analisis->date);
                                $datetime = $datetime->format('d-m-Y');
                                $bb = new datetime($analisis->best_before);
                                $bb = $bb->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="6">analisis SAMPLE REPORT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                </tr>
                                <tr>
                                    <td>Tipe Sampel</td>
                                    <td colspan="5"><?= $analisis->tipe_sampel;?></td>
                                </tr>
                                <tr>
                                    <td>Penyimpanan</td>
                                    <td colspan="5"><?= $analisis->penyimpanan;?></td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td colspan="5"><?= $analisis->nama_produk;?></td>
                                </tr>
                                <tr>
                                    <td>Kode Produksi</td>
                                    <td colspan="5"><?= $analisis->kode_produksi;?></td>
                                </tr>
                                <tr>
                                    <td>Best Before</td>
                                    <td colspan="5"><?= $bb;?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Sampel (g)</td>
                                    <td colspan="5"><?= $analisis->jumlah_sampel;?></td>
                                </tr>
                                <tr>
                                    <td>Permintaan Analisis</td>
                                    <td colspan="5"><?= $analisis->analisis;?></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td colspan="5"> <?= !empty($analisis->catatan) ? $analisis->catatan : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align:center;" colspan="6">VERIFIKASI</th>
                                </tr>
                                <tr>
                                    <td>QC</td>
                                    <td colspan="5"><?= $analisis->username;?></td>
                                </tr>
                                <tr>
                                    <td>Produksi</td>
                                    <td colspan="5"><?= $analisis->nama_produksi;?></td>
                                </tr>
                                <tr>
                                    <td>Diketahui Produksi</td>
                                    <td colspan="5">
                                        <?php
                                        if ($analisis->status_produksi == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($analisis->status_produksi == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                        } elseif ($analisis->status_produksi == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                        }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan Produksi</td>
                                    <td colspan="5"><?= !empty($analisis->catatan_produksi) ? $analisis->catatan_produksi : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <td>LAB</td>
                                    <td colspan="5"><?= $analisis->nama_lab;?></td>
                                </tr>
                                <tr>
                                    <td>Diterima Lab</td>
                                    <td colspan="5">
                                        <?php
                                        if ($analisis->status_lab == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($analisis->status_lab == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Accepted</span>';
                                        } elseif ($analisis->status_lab == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Returned</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Catatan Produksi</td>
                                    <td colspan="5"><?= !empty($analisis->catatan_produksi) ? $analisis->catatan_produksi : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <td>Disetujui Supervisor</td>
                                    <td colspan="5"><?php
                                    if ($analisis->status_spv == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($analisis->status_spv == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                    } elseif ($analisis->status_spv == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                    }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Catatan Supervisor</td>
                                <td colspan="5"><?= !empty($analisis->catatan_spv) ? $analisis->catatan_spv : 'Tidak ada'; ?></td>
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