<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Checklist Inventaris Peralatan QC Bread Crumb</h1> -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('inventaris'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Checklist Inventaris Peralatan QC Bread Crumb
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                $datetime = new DateTime($inventaris->date);
                $formattedDate = $datetime->format('d-m-Y');
                $equipment = json_decode($inventaris->peralatan, true);
                if (!is_array($equipment)) $equipment = [];
                ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">CHECKLIST INVENTARIS PERALATAN QC BREAD CRUMB</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $formattedDate; ?></td>
                            <td><b>Shift:</b> <?= $inventaris->shift; ?></td>
                            <td colspan="4"></td>
                        </tr>

                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Daftar Alat</td>
                        </tr>

                        <tr class="table-primary text-center">
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Jumlah</th>
                            <th>Awal Shift</th>
                            <th>Akhir Shift</th>
                            <th colspan="2">Keterangan</th>
                        </tr>

                        <?php $no = 1; foreach ($equipment as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_alat']) ?></td>
                                <td><?= htmlspecialchars($row['jumlah']) ?></td>
                                <td><?= htmlspecialchars($row['kondisi_awal']) ?></td>
                                <td><?= htmlspecialchars($row['kondisi_akhir']) ?></td>
                                <td colspan="2"><?= htmlspecialchars($row['keterangan']) ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC Awal Shift</b></td>
                            <td colspan="5"><?= htmlspecialchars($inventaris->username); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC Akhir Shift</b></td>
                            <td colspan="5"><?= htmlspecialchars($inventaris->qc_update); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Status Supervisor</b></td>
                            <td colspan="5">
                                <?php
                                switch ($inventaris->status_spv) {
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
                            <td colspan="5"><?= !empty($inventaris->catatan_spv) ? htmlspecialchars($inventaris->catatan_spv) : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
