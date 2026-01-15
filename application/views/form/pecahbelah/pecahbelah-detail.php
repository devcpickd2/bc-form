<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Pemeriksaan Benda Mudah Pecah</h1> -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pecahbelah'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Benda Mudah Pecah
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                $datetime = new DateTime($pecahbelah->date);
                $formattedDate = $datetime->format('d-m-Y');
                $breakable = json_decode($pecahbelah->benda_pecah, true);
                if (!is_array($breakable)) $breakable = [];
                ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="8" class="text-center font-weight-bold">PEMERIKSAAN BENDA MUDAH PECAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $formattedDate; ?></td>
                            <td><b>Shift:</b> <?= $pecahbelah->shift; ?></td>
                            <td colspan="5"></td>
                        </tr>

                        <tr class="bg-light text-center">
                            <td colspan="8" class="font-weight-bold">Daftar Alat</td>
                        </tr>

                        <tr class="table-primary text-center">
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Area</th>
                            <th>Pemilik</th>
                            <th>Jumlah</th>
                            <th>Awal Shift</th>
                            <th>Akhir Shift</th>
                            <th>Keterangan</th>
                        </tr>

                        <?php $no = 1; foreach ($breakable as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                                <td><?= htmlspecialchars($row['area']) ?></td>
                                <td><?= htmlspecialchars($row['pemilik']) ?></td>
                                <td><?= htmlspecialchars($row['jumlah']) ?></td>
                                <td><?= htmlspecialchars($row['kondisi_awal']) ?></td>
                                <td><?= htmlspecialchars($row['kondisi_akhir']) ?></td>
                                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr class="table-primary text-center">
                            <th colspan="8">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC Awal Shift</b></td>
                            <td colspan="6"><?= htmlspecialchars($pecahbelah->username); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC Akhir Shift</b></td>
                            <td colspan="6"><?= htmlspecialchars($pecahbelah->qc_update); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Produksi</b></td>
                            <td colspan="6"><?= htmlspecialchars($pecahbelah->nama_produksi); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Disetujui Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                switch ($pecahbelah->status_spv) {
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
                            <td colspan="6"><?= !empty($pecahbelah->catatan_spv) ? htmlspecialchars($pecahbelah->catatan_spv) : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
