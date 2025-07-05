<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Seasoning dari Pemasok</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('seasoning'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Seasoning dari Pemasok</a>
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
                                        $datetime = new DateTime($seasoning->date);
                                        $datetime = $datetime->format('d-m-Y');
                                        $exp = new DateTime($seasoning->expired);
                                        $exp = $exp->format('d-m-Y');
                                        ?>
                                        <tr>
                                            <th style="text-align:center;" colspan="7">PEMERIKSAAN SEASONING DARI PEMASOK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align:left;" colspan="7"><b>Tanggal: <?= $datetime; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jenis Seasoning</b></td>
                                            <td colspan="6"><?= $seasoning->jenis_seasoning; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Spesifikasi</b></td>
                                            <td colspan="6"><?= $seasoning->spesifikasi; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pemasok</b></td>
                                            <td colspan="6"><?= $seasoning->pemasok; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Kode Produksi</b></td>
                                            <td colspan="6"><?= $seasoning->kode_produksi; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Expired Date</b></td>
                                            <td colspan="6"><?= $exp; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jumlah Barang</b></td>
                                            <td><b>Sampel (pcs)</b></td>
                                            <td colspan="5"><b>Jumlah Reject</b></td>
                                        </tr>
                                        <tr>
                                            <td><?= $seasoning->jumlah_barang; ?></td>
                                            <td><?= $seasoning->sampel; ?></td>
                                            <td colspan="5"><?= $seasoning->jumlah_reject; ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="7">KONDISI FISIK</th>
                                        </tr>
                                        <tr>
                                            <td><b>Kemasan</b></td>
                                            <td><b>Warna</b></td>
                                            <td><b>Kotoran</b></td>
                                            <td colspan="3"><b>Aroma</b></td>
                                        </tr>
                                        <tr>
                                            <td><?= ($seasoning->kemasan == 'sesuai') ? '✔️' : (($seasoning->kemasan == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                            <td><?= ($seasoning->warna == 'sesuai') ? '✔️' : (($seasoning->warna == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                            <td><?= ($seasoning->kotoran == 'sesuai') ? '✔️' : (($seasoning->kotoran == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                            <td colspan="3"><?= ($seasoning->aroma == 'sesuai') ? '✔️' : (($seasoning->aroma == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Kadar Air</b></td>
                                            <td colspan="6"><?= $seasoning->kadar_air; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Negara Asal dibuat</b></td>
                                            <td colspan="6"><?= $seasoning->negara_asal; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Segel</b></td>
                                            <td colspan="6"><?= $seasoning->segel; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Penerimaan</b></td>
                                            <td colspan="6"><?= $seasoning->penerimaan; ?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="7">PERSYARATAN DOKUMEN</th>
                                        </tr>
                                        <tr>
                                            <td><b>Logo Halal</b></td>
                                            <td><b>Halal</b></td>
                                            <td colspan="2"><b>COA</b></td>
                                            <td colspan="2"><b>Allergen</b></td>
                                        </tr>
                                        <tr>
                                            <td><?= $seasoning->logo_halal;?></td>
                                            <td><?= $seasoning->sertif_halal;?></td>
                                            <td colspan="2"><?= $seasoning->coa;?></td>
                                            <td colspan="2"><?= $seasoning->allergen;?></td>
                                        </tr>
                                    </tr>
                                    <tr>
                                        <td>Bukti COA</td>
                                        <td colspan="6">
                                            <?php if (!empty($seasoning->bukti_coa)): ?>
                                                <a href="<?= base_url('uploads/' . $seasoning->bukti_coa); ?>" target="_blank">
                                                    Link COA
                                                </a>
                                            <?php else: ?>
                                                <p>Tidak ada file</p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td colspan="6"> <?= !empty($seasoning->keterangan) ? $seasoning->keterangan : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan</td>
                                        <td colspan="6"> <?= !empty($seasoning->catatan) ? $seasoning->catatan : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center;" colspan="7">VERIFIKASI</th>
                                    </tr>
                                    <tr>
                                        <td>QC</td>
                                        <td colspan="6"><?= $seasoning->username;?></td>
                                    </tr>
                                    <tr>
                                        <td>Disetujui Supervisor</td>
                                        <td colspan="6"><?php
                                        if ($seasoning->status_spv == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($seasoning->status_spv == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                        } elseif ($seasoning->status_spv == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                        }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan Supervisor</td>
                                    <td colspan="6"><?= !empty($seasoning->catatan_spv) ? $seasoning->catatan_spv : 'Tidak ada'; ?></td>
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


