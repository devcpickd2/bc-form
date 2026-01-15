<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Sanitasi Warehouse</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('sanitasiwarehouse-diketahui'); ?>">
                    <i class="fas fa-arrow-left"></i> Pemeriksaan Sanitasi Warehouse
                </a>
            </li>
        </ol>
    </nav>

    <!-- Card Detail -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php 
            $datetime = new DateTime($sanitasiwarehouse->date);
            $formattedDate = $datetime->format('d-m-Y');
            $details = json_decode($sanitasiwarehouse->detail, true);
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
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="6" class="font-weight-bold">PEMERIKSAAN SANITASI WAREHOUSE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal</b></td>
                            <td colspan="4"><?= $formattedDate; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Area</b></td>
                            <td colspan="4"><?= htmlspecialchars($sanitasiwarehouse->area); ?></td>
                        </tr>
                        <tr class="text-center font-weight-bold">
                            <th style="width:5%;">No</th>
                            <th colspan="2" style="width:35%;">Titik Pemeriksaan</th>
                            <th style="width:20%;">Kondisi</th>
                            <th style="width:20%;">Problem</th>
                            <th style="width:20%;">Tindakan</th>
                        </tr>
                        <?php if (!empty($details) && is_array($details)): ?>
                            <?php foreach ($details as $i => $row): ?>
                                <tr>
                                    <td class="text-center"><?= $i + 1; ?></td>
                                    <td colspan="2"><?= htmlspecialchars($row['bagian']); ?></td>
                                    <td class="text-center"><?= $kondisiMap[$row['kondisi']] ?? htmlspecialchars($row['kondisi']); ?></td>
                                    <td><?= !empty($row['problem']) ? htmlspecialchars($row['problem']) : '-'; ?></td>
                                    <td><?= !empty($row['tindakan']) ? htmlspecialchars($row['tindakan']) : '-'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center">Tidak ada data detail</td></tr>
                        <?php endif; ?>
                        <tr class="table-primary text-center font-weight-bold">
                            <td colspan="6">VERIFIKASI</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC</b></td>
                            <td colspan="4"><?= htmlspecialchars($sanitasiwarehouse->username); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Warehouse</b></td>
                            <td colspan="4"><?= htmlspecialchars($sanitasiwarehouse->nama_wh); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Verifikasi -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('sanitasiwarehouse/status/'.$sanitasiwarehouse->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $sanitasiwarehouse->status_spv == 1 ? 'selected' : ''; ?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $sanitasiwarehouse->status_spv == 2 ? 'selected' : ''; ?>>Revision</option>
                        </select>
                        <div class="invalid-feedback d-block"><?= form_error('status_spv') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $sanitasiwarehouse->catatan_spv; ?></textarea>
                        <div class="invalid-feedback d-block"><?= form_error('catatan_spv') ?></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="<?= base_url('sanitasiwarehouse/verifikasi') ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Batal
                </a>
            </form>
        </div>
    </div>
</div>  
</div>

<!-- Styles -->
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
        border-collapse: collapse;
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
