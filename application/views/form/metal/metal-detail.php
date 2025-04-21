<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Metal</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('metal'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Metal Detector</a>
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
                                $datetime = new datetime($metal->date_metal);
                                $datetime = $datetime->format('d-m-Y');
                                $timing = new DateTime($metal->time);
                                $timing = $timing->format('H:i');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="5">PEMERIKSAAN METAL DETECTOR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                    <td ><b>Shift : <?= $metal->shift;?><b></td>
                                        <td colspan="3"><b>Pukul : <?= $timing;?><b></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Produk</td>
                                            <td colspan="4"><?= $metal->nama_produk;?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode Produksi</td>
                                            <td colspan="4"><?= $metal->kode_produksi;?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Program</td>
                                            <td colspan="4"><?= $metal->no_program;?></td>
                                        </tr>
                                        <tr>
                                            <td><b>STD. Spesimen</b></td>
                                            <td  class="text-center"><b>Fe 2.5 (mm)</b></td>
                                            <td  class="text-center"><b>Non Fe 3.0 (mm)</b></td>
                                            <td  class="text-center" colspan="2"><b>SUS 304 3.0 (mm)</b></td>
                                        </tr>
                                        <tr>
                                            <td>Deteksi</td>
                                            <td class="text-center">    
                                                <?php
                                                if ($metal->std_fe == 'lolos') {
                                                    echo '<span style="color: green; font-weight: bold;">&#10004;</span>'; 
                                                } else {
                                                    echo '<span style="color: red; font-weight: bold;">&#10006;</span>'; 
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($metal->std_nonfe == 'lolos') {
                                                    echo '<span style="color: green; font-weight: bold;">&#10004;</span>'; 
                                                } else {
                                                    echo '<span style="color: red; font-weight: bold;">&#10006;</span>'; 
                                                }
                                                ?>
                                            </td>
                                            <td colspan="2" class="text-center">
                                                <?php
                                                if ($metal->std_sus304 == 'lolos') {
                                                    echo '<span style="color: green; font-weight: bold;">&#10004;</span>'; 
                                                } else {
                                                    echo '<span style="color: red; font-weight: bold;">&#10006;</span>'; 
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td colspan="4"><?= $metal->keterangan;?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center;" colspan="5">VERIFIKASI</th>
                                        </tr>
                                        <tr>
                                            <td>QC</td>
                                            <td colspan="6"><?= $metal->username_2;?></td>
                                        </tr>
                                        <tr>
                                            <td>Produksi</td>
                                            <td colspan="5"><?= $metal->nama_produksi_metal;?></td>
                                        </tr>
                                        <tr>
                                            <td>Diketahui Produksi</td>
                                            <td colspan="4">
                                                <?php
                                                if ($metal->status_produksi == 0) {
                                                    echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                                } elseif ($metal->status_produksi == 1) {
                                                    echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                                } elseif ($metal->status_produksi == 2) {
                                                    echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                                }
                                            ?></td>
                                        </tr>
                                        <tr>
                                            <td>Catatan Produksi</td>
                                            <td colspan="4"><?= !empty($metal->catatan_produksi) ? $metal->catatan_produksi : 'Tidak ada'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Disetujui Supervisor</td>
                                            <td colspan="4"><?php
                                            if ($metal->status_spv == 0) {
                                                echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                            } elseif ($metal->status_spv == 1) {
                                                echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                            } elseif ($metal->status_spv == 2) {
                                                echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                            }
                                        ?></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan SPV</td>
                                        <td colspan="4"><?= !empty($metal->catatan_spv) ? $metal->catatan_spv : 'Tidak ada'; ?></td>
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

