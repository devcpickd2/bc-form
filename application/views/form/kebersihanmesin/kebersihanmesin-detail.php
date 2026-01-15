<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Kebersihan dan Sanitasi Setelah Perbaikan Mesin</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('kebersihanmesin'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan
                </a>
            </li>
        </ol>
    </nav>

    <!-- Card -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                $tanggal = (new DateTime($kebersihanmesin->date))->format('d-m-Y');
                $tanggal_perbaikan = (new DateTime($kebersihanmesin->tgl_perbaikan))->format('d-m-Y');
                ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">PEMERIKSAAN KEBERSIHAN DAN SANITASI SETELAH PERBAIKAN MESIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Tanggal</b></td>
                            <td colspan="6"><?= $tanggal; ?></td>
                        </tr>
                        <tr>
                            <td><b>Shift</b></td>
                            <td colspan="6"><?= $kebersihanmesin->shift; ?></td>
                        </tr>
                        <tr>
                            <td><b>Mesin / Peralatan</b></td>
                            <td colspan="6"><?= htmlspecialchars($kebersihanmesin->mesin); ?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Perbaikan</b></td>
                            <td colspan="6"><?= htmlspecialchars($kebersihanmesin->perbaikan); ?></td>
                        </tr>
                        <tr>
                            <td><b>Area</b></td>
                            <td colspan="6"><?= htmlspecialchars($kebersihanmesin->area); ?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Perbaikan</b></td>
                            <td colspan="6"><?= $tanggal_perbaikan; ?></td>
                        </tr>

                        <tr class="bg-light text-center font-weight-bold">
                            <td colspan="3">Kondisi</td>
                            <td colspan="4">Spare Part yang Tertinggal</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><?= htmlspecialchars($kebersihanmesin->kondisi); ?></td>
                            <td colspan="4"><?= htmlspecialchars($kebersihanmesin->spare_part); ?></td>
                        </tr>

                        <tr>
                            <td><b>Keterangan</b></td>
                            <td colspan="6"><?= !empty($kebersihanmesin->keterangan) ? htmlspecialchars($kebersihanmesin->keterangan) : 'Tidak ada'; ?></td>
                        </tr>

                        <tr class="table-primary text-center font-weight-bold">
                            <td colspan="7">VERIFIKASI</td>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= htmlspecialchars($kebersihanmesin->username); ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= htmlspecialchars($kebersihanmesin->nama_produksi); ?></td>
                        </tr>
                        <tr>
                            <td><b>Disetujui Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                $status_spv = [
                                    0 => '<span class="text-secondary font-weight-bold">Created</span>',
                                    1 => '<span class="text-success font-weight-bold">Verified</span>',
                                    2 => '<span class="text-danger font-weight-bold">Revision</span>'
                                ];
                                echo $status_spv[$kebersihanmesin->status_spv] ?? '-';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($kebersihanmesin->catatan_spv) ? htmlspecialchars($kebersihanmesin->catatan_spv) : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Custom CSS -->
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
