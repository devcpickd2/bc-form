<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold">Detail Kebersihan Ruang Produksi</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('kebersihanruang-diketahui'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Kebersihan
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Pemeriksaan -->
    <div class="card shadow mb-4">
        <div class="card-body">

            <?php 
            $formattedDate = (new DateTime($kebersihanruang->date))->format('d-m-Y');
            $details = json_decode($kebersihanruang->detail, true);
            $kondisiMap = [
                '0' => 'Bersih',
                '1' => 'Berdebu',
                '2' => 'Basah',
                '3' => 'Pecah/Retak',
                '4' => 'Sisa produksi (terigu/produk)',
                '5' => 'Noda (tinta, karat)',
                '6' => 'Pertumbuhan mikroorganisme (jamur/bau busuk)',
            ];
            ?>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th colspan="6">KEBERSIHAN RUANG PRODUKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><strong>Tanggal</strong></td>
                            <td colspan="4"><?= $formattedDate; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Shift</strong></td>
                            <td colspan="4"><?= $kebersihanruang->shift; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Lokasi</strong></td>
                            <td colspan="4"><?= htmlspecialchars($kebersihanruang->lokasi); ?></td>
                        </tr>
                        <!-- Detail Pemeriksaan -->
                        <tr class="text-center bg-light">
                            <th colspan="6">DETAIL PEMERIKSAAN</th>
                        </tr>
                        <tr class="text-white text-center" style="background-color:#2E86C1;">
                            <th style="width: 50px;">No</th>
                            <th colspan="2">Bagian</th>
                            <th>Kondisi</th>
                            <th>Problem</th>
                            <th>Tindakan</th>
                        </tr>

                        <?php if (!empty($details)): ?>
                            <?php foreach ($details as $i => $row): ?>
                                <tr>
                                    <td class="text-center"><?= $i + 1; ?></td>
                                    <td colspan="2"><?= htmlspecialchars($row['bagian']); ?></td>
                                    <td class="text-center"><?= $kondisiMap[$row['kondisi']] ?? htmlspecialchars($row['kondisi']); ?></td>
                                    <td><?= $row['problem'] ? htmlspecialchars($row['problem']) : '-'; ?></td>
                                    <td><?= $row['tindakan'] ? htmlspecialchars($row['tindakan']) : '-'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data detail</td>
                            </tr>
                        <?php endif; ?>

                        <!-- Verifikasi -->
                        <tr class="text-center bg-light">
                            <th colspan="6">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>QC</strong></td>
                            <td colspan="4"><?= htmlspecialchars($kebersihanruang->username); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Produksi</strong></td>
                            <td colspan="4"><?= htmlspecialchars($kebersihanruang->nama_produksi); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('kebersihanruang/status/'.$kebersihanruang->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $kebersihanruang->status_spv == 1?'selected':'';?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $kebersihanruang->status_spv == 2?'selected':'';?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control" name="catatan_spv" ><?= $kebersihanruang->catatan_spv; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan_spv')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('catatan_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('kebersihanruang/verifikasi')?>" class="btn btn-md btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Custom Styles -->
<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
    .table th, .table td {
        vertical-align: middle;
        font-size: 15px;
        padding: 8px;
    }
    .table th:first-child,
    .table td:first-child {
        text-align: center;
        width: 50px;
    }
</style>
