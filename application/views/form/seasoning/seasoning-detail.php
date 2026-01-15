<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Seasoning dari Pemasok</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('seasoning'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Seasoning dari Pemasok
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4"> 
        <div class="card-body">
            <?php 
            $datetime = (new DateTime($seasoning->date))->format('d-m-Y');
            $exp = (new DateTime($seasoning->expired))->format('d-m-Y');
            ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">PEMERIKSAAN SEASONING DARI PEMASOK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="7"><b>Tanggal:</b> <?= $datetime; ?></td></tr>
                        <tr><td><b>Jenis Seasoning</b></td><td colspan="6"><?= $seasoning->jenis_seasoning; ?></td></tr>
                        <tr><td><b>Spesifikasi</b></td><td colspan="6"><?= $seasoning->spesifikasi; ?></td></tr>
                        <tr><td><b>Pemasok</b></td><td colspan="6"><?= $seasoning->pemasok; ?></td></tr>
                        <tr><td><b>Jenis Mobil</b></td><td colspan="6"><?= $seasoning->jenis_mobil; ?></td></tr>
                        <tr><td><b>No. Polisi</b></td><td colspan="6"><?= $seasoning->no_polisi; ?></td></tr>
                        <tr><td><b>Identitas Pengantar</b></td><td colspan="6"><?= $seasoning->identitas_pengantar; ?></td></tr>
                        <tr><td><b>No. PO / DO</b></td><td colspan="6"><?= $seasoning->no_po; ?></td></tr>
                        <!-- Kondisi Mobil -->
                        <tr class="table-primary text-center font-weight-bold">
                            <th colspan="9">KONDISI MOBIL</th>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <?php
                                $keteranganMobil = [1=>'Bersih',2=>'Kotor',3=>'Bau',4=>'Bocor',5=>'Basah',6=>'Kering',7=>'Bebas Hama'];
                                if (!empty($seasoning->kondisi_mobil)) {
                                    $mobilList = is_array($seasoning->kondisi_mobil) ? $seasoning->kondisi_mobil : explode(',', $seasoning->kondisi_mobil);
                                    echo '<ul class="mb-0">';
                                    foreach ($mobilList as $m) echo '<li>' . ($keteranganMobil[trim($m)] ?? 'Tidak diketahui') . '</li>';
                                    echo '</ul>';
                                } else {
                                    echo 'Tidak ada data';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr><td><b>Kode Produksi</b></td><td colspan="6"><?= $seasoning->kode_produksi; ?></td></tr>
                        <tr><td><b>Expired Date</b></td><td colspan="6"><?= $exp; ?></td></tr>
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
                        <tr class="table-primary text-center"><th colspan="7">KONDISI FISIK</th></tr>
                        <tr class="text-center">
                            <td><b>Kemasan</b></td>
                            <td><b>Warna</b></td>
                            <td><b>Kotoran</b></td>
                            <td colspan="4"><b>Aroma</b></td>
                        </tr>
                        <tr class="text-center">
                            <td><?= icon_check($seasoning->kemasan, 'sesuai'); ?></td>
                            <td><?= icon_check($seasoning->warna, 'sesuai'); ?></td>
                            <td><?= icon_check($seasoning->kotoran, 'sesuai'); ?></td>
                            <td colspan="4"><?= icon_check($seasoning->aroma, 'sesuai'); ?></td>
                        </tr>
                        <tr><td><b>Kadar Air</b></td><td colspan="6"><?= $seasoning->kadar_air; ?></td></tr>
                        <tr><td><b>Negara Asal dibuat</b></td><td colspan="6"><?= $seasoning->negara_asal; ?></td></tr>
                        <tr><td><b>Segel</b></td><td colspan="6"><?= $seasoning->segel; ?></td></tr>
                        <tr><td><b>Penerimaan</b></td><td colspan="6"><?= icon_check($seasoning->penerimaan, 'ok'); ?></td></tr>

                        <tr class="table-primary text-center"><th colspan="7">PERSYARATAN DOKUMEN</th></tr>
                        <tr class="text-center">
                            <td><b>Logo Halal</b></td>
                            <td><b>Halal</b></td>
                            <td colspan="2"><b>COA</b></td>
                            <td colspan="2"><b>Allergen</b></td>
                        </tr>
                        <tr class="text-center">
                            <td><?= $seasoning->logo_halal; ?></td>
                            <td><?= $seasoning->sertif_halal; ?></td>
                            <td colspan="2"><?= $seasoning->coa; ?></td>
                            <td colspan="2"><?= $seasoning->allergen; ?></td>
                        </tr>

                        <tr><td><b>Bukti COA</b></td>
                            <td colspan="6">
                                <?php if (!empty($seasoning->bukti_coa)): ?>
                                    <a href="<?= base_url('uploads/' . $seasoning->bukti_coa); ?>" target="_blank">Link COA</a>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada file</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr><td><b>Keterangan</b></td><td colspan="6"><?= !empty($seasoning->keterangan) ? $seasoning->keterangan : 'Tidak ada'; ?></td></tr>
                        <tr><td><b>Catatan</b></td><td colspan="6"><?= !empty($seasoning->catatan) ? $seasoning->catatan : 'Tidak ada'; ?></td></tr>

                        <tr class="table-primary text-center"><th colspan="7">VERIFIKASI</th></tr>
                        <tr><td><b>QC</b></td><td colspan="6"><?= $seasoning->username; ?></td></tr>
                        <tr>
                            <td><b>Disetujui Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                if ($seasoning->status_spv == 0) {
                                    echo '<span class="text-secondary font-weight-bold">Created</span>';
                                } elseif ($seasoning->status_spv == 1) {
                                    echo '<span class="text-success font-weight-bold">Verified</span>';
                                } elseif ($seasoning->status_spv == 2) {
                                    echo '<span class="text-danger font-weight-bold">Revision</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($seasoning->catatan_spv) ? $seasoning->catatan_spv : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- CSS -->
<style>
    .breadcrumb {
        background-color: #2E86C1;
        padding: 10px 16px;
        border-radius: 0.25rem;
    }

    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .table {
        width: 100%;
        font-size: 15px;
    }

    .table th, .table td {
        padding: 10px 12px;
        vertical-align: middle;
        word-break: break-word;
    }

    .text-center th, .text-center td {
        text-align: center;
    }
</style>

<!-- Helper -->
<?php
function icon_check($val, $yes = 'sesuai') {
    return $val === $yes ? '✔️' : ($val === 'tidak sesuai' ? '❌' : '−');
}
?>
