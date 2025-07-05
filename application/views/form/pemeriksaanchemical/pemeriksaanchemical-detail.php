<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Chemical dari Supplier</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pemeriksaanchemical'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Chemical dari Supplier</a>
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
                                        $datetime = new DateTime($pemeriksaanchemical->date);
                                        $datetime = $datetime->format('d-m-Y');
                                        $exp = new DateTime($pemeriksaanchemical->expired);
                                        $exp = $exp->format('d-m-Y');
                                        ?>
                                        <tr>
                                            <th style="text-align:center;" colspan="7">PEMERIKSAAN CHEMICAL DARI SUPPLIER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align:left;" colspan="2"><b>Tanggal: <?= $datetime; ?></b></td>
                                            <td colspan="5"><b>Shift: <?= $pemeriksaanchemical->shift; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jenis Chemical</b></td>
                                            <td colspan="6"><?= $pemeriksaanchemical->jenis_chemical; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pemasok</b></td>
                                            <td colspan="6"><?= $pemeriksaanchemical->pemasok; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Kode Produksi</b></td>
                                            <td colspan="6"><?= $pemeriksaanchemical->kode_produksi; ?></td>
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
                                            <td><?= $pemeriksaanchemical->jumlah_barang; ?></td>
                                            <td><?= $pemeriksaanchemical->sampel; ?></td>
                                            <td colspan="5"><?= $pemeriksaanchemical->jumlah_reject; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:center;" colspan="3">KONDISI FISIK</th>
                                            <th style="text-align:center;" colspan="6">HALAL BERLAKU</th>
                                        </tr>
                                        <tr>
                                            <td><b>Kemasan</b></td>
                                            <td><b>Warna</b></td>
                                            <td><b>pH</b></td>
                                            <td colspan="6" style="text-align: center;"><b>Berlaku</b></td>
                                        </tr>
                                        <tr>
                                            <td><?= ($pemeriksaanchemical->kemasan == 'sesuai') ? '✔️' : (($pemeriksaanchemical->kemasan == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                            <td><?= ($pemeriksaanchemical->warna == 'sesuai') ? '✔️' : (($pemeriksaanchemical->warna == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                            <td><?= $pemeriksaanchemical->ph;?></td>
                                            <td colspan="6" style="text-align: center;"><?= ($pemeriksaanchemical->halal_berlaku == 'berlaku') ? '✔️' : (($pemeriksaanchemical->halal_berlaku == 'tidak berlaku') ? '❌' : '−'); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Segel</b></td>
                                            <td><b>COA</b></td>
                                            <td colspan="6"><b>Penerimaan</b></td>
                                        </tr>
                                        <tr>
                                            <td><?= $pemeriksaanchemical->segel;?></td>
                                            <td><?= ($pemeriksaanchemical->coa == 'ada') ? '✔️' : (($pemeriksaanchemical->coa == 'tidak ada') ? '❌' : '−'); ?></td>
                                            <td colspan="6"><?= ($pemeriksaanchemical->penerimaan == 'ok') ? '✔️' : (($pemeriksaanchemical->penerimaan == 'tolak') ? '❌' : '−'); ?></td>
                                        </tr>
                                    </tr>
                                    <tr>
                                        <td>Bukti COA</td>
                                        <td colspan="6">
                                            <?php if (!empty($pemeriksaanchemical->bukti_coa)): ?>
                                                <a href="<?= base_url('uploads/' . $pemeriksaanchemical->bukti_coa); ?>" target="_blank">
                                                    Link COA
                                                </a>
                                            <?php else: ?>
                                                <p>Tidak ada file</p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td colspan="6"> <?= !empty($pemeriksaanchemical->keterangan) ? $pemeriksaanchemical->keterangan : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center;" colspan="9">VERIFIKASI</th>
                                    </tr>
                                    <tr>
                                        <td>QC</td>
                                        <td colspan="6"><?= $pemeriksaanchemical->username;?></td>
                                    </tr>
                                    <tr>
                                        <td>Disetujui Supervisor</td>
                                        <td colspan="6"><?php
                                        if ($pemeriksaanchemical->status_spv == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($pemeriksaanchemical->status_spv == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                        } elseif ($pemeriksaanchemical->status_spv == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                        }
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan Supervisor</td>
                                    <td colspan="6"><?= !empty($pemeriksaanchemical->catatan_spv) ? $pemeriksaanchemical->catatan_spv : 'Tidak ada'; ?></td>
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


