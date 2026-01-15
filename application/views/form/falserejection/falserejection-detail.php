<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-3 text-center text-gray-800 font-weight-bold border-bottom pb-2">Detail Monitoring False Rejection</h1> -->

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('falserejection'); ?>">
                    <i class="fas fa-arrow-left"></i> Monitoring False Rejection
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                    $datetime = new DateTime($falserejection->date_false_rejection);
                    $formatted_date = $datetime->format('d-m-Y');
                ?>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th colspan="2" class="font-weight-bold text-center">MONITORING FALSE REJECTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tanggal</td>
                            <td><b><?= $formatted_date; ?></b></td>
                        </tr>
                        <tr>
                            <td>Shift</td>
                            <td><b><?= $falserejection->shift_monitoring; ?></b></td>
                        </tr>
                        <tr>
                            <td>Mesin</td>
                            <td><?= $falserejection->no_mesin; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Produk</td>
                            <td><?= $falserejection->nama_produk; ?></td>
                        </tr>
                        <tr>
                            <td>Kode Produksi</td>
                            <td><?= $falserejection->kode_produksi; ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Pack/Bag Tidak Lolos</td>
                            <td><?= !empty($falserejection->jumlah_tidak_lolos) ? $falserejection->jumlah_tidak_lolos : '0'; ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah dengan Kontaminasi</td>
                            <td><?= !empty($falserejection->jumlah_kontaminasi) ? $falserejection->jumlah_kontaminasi : '0'; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kontaminasi</td>
                            <td><?= $falserejection->jenis_kontaminasi; ?></td>
                        </tr>
                        <tr>
                            <td>Posisi Kontaminasi</td>
                            <td><?= $falserejection->posisi_kontaminasi; ?></td>
                        </tr>
                        <tr>
                            <td>False Rejection</td>
                            <td><?= !empty($falserejection->falserejection) ? $falserejection->falserejection : '0'; ?></td>
                        </tr>
                        <tr>
                            <td>Catatan Monitoring</td>
                            <td><?= !empty($falserejection->catatan) ? $falserejection->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center text-uppercase">
                            <td colspan="2"><b>Verifikasi</b></td>
                        </tr>
                        <tr>
                            <td>QC</td>
                            <td><?= $falserejection->username_2; ?></td>
                        </tr>
                        <tr>
                            <td>Produksi</td>
                            <td><?= !empty($falserejection->nama_produksi_false) ? $falserejection->nama_produksi_false : 'Belum dikoreksi'; ?></td>
                        </tr>
                        <tr>
                            <td>Disetujui Supervisor</td>
                            <td>
                                <?php
                                switch ($falserejection->status_spv_false) {
                                    case 1: echo '<span class="text-success font-weight-bold">Verified</span>'; break;
                                    case 2: echo '<span class="text-danger font-weight-bold">Revision</span>'; break;
                                    default: echo '<span class="text-secondary font-weight-bold">Created</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Catatan Supervisor</td>
                            <td><?= !empty($falserejection->catatan_spv) ? $falserejection->catatan_spv : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>
                </table>
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

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #dee2e6;
        white-space: normal !important;
    }

    .table td:first-child {
        font-weight: bold;
        width: 220px;
    }

    @media (max-width: 768px) {
        .table th,
        .table td {
            font-size: 14px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
