<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Sanitasi Warehouse</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('sanitasiwarehouse'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Sanitasi Warehouse
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <?php 
            $datetime = new DateTime($sanitasiwarehouse->date);
            $formattedDate = $datetime->format('d-m-Y');
            $details = json_decode($sanitasiwarehouse->detail, true);
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">PEMERIKSAAN SANITASI WAREHOUSE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $formattedDate; ?></td>
                            <td colspan="5"><b>Area:</b> <?= htmlspecialchars($sanitasiwarehouse->area); ?></td>
                        </tr>
                        <tr class="bg-light text-center font-weight-bold">
                            <td style="width:5%;">No</td>
                            <td colspan="2" style="width:30%;">Titik Pemeriksaan</td>
                            <td style="width:20%;">Kondisi</td>
                            <td style="width:15%;">Masalah</td>
                            <td style="width:15%;">Tindakan</td>
                            <td style="width:15%;"></td>
                        </tr>
                        <?php 
                        $kondisiMap = [
                            '0' => 'Bersih',
                            '1' => 'Berdebu',
                            '2' => 'Basah',
                            '3' => 'Sampah (sisa lakban, kertas, remah produk/bahan baku, plastik, kardus bekas)',
                            '4' => 'Pertumbuhan mikroorganisme (jamur dan bau busuk)',
                            '5' => 'Pallet rusak/pecah',
                            '6' => 'Terdapat aktifitas binatang (tikus, kecoa, lalat, ulat, belatung)',
                            '7' => 'Sarang laba-laba',
                        ];
                        ?>
                        <?php if (!empty($details) && is_array($details)) : ?>
                            <?php foreach ($details as $i => $row) : ?>
                                <tr class="text-center">
                                    <td><?= $i + 1; ?></td>
                                    <td colspan="2" class="text-left"><?= htmlspecialchars($row['bagian']); ?></td>
                                    <td><?= isset($kondisiMap[$row['kondisi']]) ? $kondisiMap[$row['kondisi']] : htmlspecialchars($row['kondisi']); ?></td>
                                    <td class="text-left"><?= !empty($row['problem']) ? htmlspecialchars($row['problem']) : '-'; ?></td>
                                    <td class="text-left"><?= !empty($row['tindakan']) ? htmlspecialchars($row['tindakan']) : '-'; ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data detail</td>
                            </tr>
                        <?php endif; ?>
                        <tr class="table-primary text-center font-weight-bold">
                            <td colspan="7">VERIFIKASI</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC</b></td>
                            <td colspan="5"><?= htmlspecialchars($sanitasiwarehouse->username); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Warehouse</b></td>
                            <td colspan="5"><?= htmlspecialchars($sanitasiwarehouse->nama_wh); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Disetujui Supervisor</b></td>
                            <td colspan="5">
                                <?php
                                switch ($sanitasiwarehouse->status_spv) {
                                    case 1:
                                        echo '<span class="text-success font-weight-bold">Verified</span>';
                                        break;
                                    case 2:
                                        echo '<span class="text-danger font-weight-bold">Revision</span>';
                                        break;
                                    default:
                                        echo '<span class="text-secondary font-weight-bold">Created</span>';
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Catatan Supervisor</b></td>
                            <td colspan="5"><?= !empty($sanitasiwarehouse->catatan_spv) ? htmlspecialchars($sanitasiwarehouse->catatan_spv) : 'Tidak ada'; ?></td>
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
        padding: 8px 16px;
        border-radius: 0.25rem;
    }

    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .breadcrumb .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    .table {
        width: 100%;
        font-size: 15px;
    }

    .table td, .table th {
        padding: 10px 12px;
        vertical-align: middle;
        word-break: break-word;
    }

    @media (max-width: 768px) {
        .table td, .table th {
            font-size: 14px;
            padding: 8px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
