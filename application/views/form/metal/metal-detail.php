<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-3 text-center text-gray-800 font-weight-bold">Detail Pemeriksaan Metal Detector</h1> -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('metal'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Metal Detector
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                $datetime = (new DateTime($metal->date_metal))->format('d-m-Y');
                $timing = (new DateTime($metal->time))->format('H:i');
                $timing2 = (new DateTime($metal->update_time_t))->format('H:i');
                $timing3 = (new DateTime($metal->update_time_b))->format('H:i');

                function tampilkanIkon($nilai) {
                    if ($nilai === null || $nilai === '') return '<span style="color: gray; font-weight: bold;">-</span>';
                    if ($nilai == 'terdeteksi') return '<span style="color: green; font-weight: bold;">&#10004;</span>';
                    return '<span style="color: red; font-weight: bold;">&#10006;</span>';
                }
                ?>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th colspan="5" class="font-weight-bold text-center">PEMERIKSAAN METAL DETECTOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Tanggal</b></td>
                            <td colspan="4"><?= $datetime; ?></td>
                        </tr>
                        <tr>
                            <td><b>Shift</b></td>
                            <td colspan="4"><?= $metal->shift; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Produk</td>
                            <td colspan="4"><?= $metal->nama_produk; ?></td>
                        </tr>
                        <tr>
                            <td>Kode Produksi</td>
                            <td colspan="4"><?= $metal->kode_produksi; ?></td>
                        </tr>
                        <tr>
                            <td>No. Program</td>
                            <td colspan="4"><?= $metal->no_program; ?></td>
                        </tr>
                        <tr>
                            <td>Deteksi NG</td>
                            <td colspan="4">
                                <?= $metal->deteksi_ng == '1' ? 'Belt Conveyor Berhenti' : ($metal->deteksi_ng == '2' ? 'Rejector' : '-') ?>
                            </td>
                        </tr>
                        <tr class="table-primary text-center">
                            <td><b>STD. Spesimen</b></td>
                            <td><b>Pukul</b></td>
                            <td><b>Fe <?= $metal->std_fe; ?></b></td>
                            <td><b>Non Fe <?= $metal->std_nonfe; ?></b></td>
                            <td><b>SUS 304 <?= $metal->std_sus304; ?></b></td>
                        </tr>
                        <tr>
                            <td>Deteksi Pertama</td>
                            <td><?= $timing; ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->fe_d); ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->nonfe_d); ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->sus_d); ?></td>
                        </tr>
                        <tr>
                            <td>Deteksi Kedua</td>
                            <td><?= $timing2; ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->fe_t); ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->nonfe_t); ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->sus_t); ?></td>
                        </tr>
                        <tr>
                            <td>Deteksi Terakhir</td>
                            <td><?= $timing3; ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->fe_b); ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->nonfe_b); ?></td>
                            <td class="text-center"><?= tampilkanIkon($metal->sus_b); ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td colspan="4"><?= $metal->keterangan; ?></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td colspan="4"><?= !empty($metal->catatan_metal) ? $metal->catatan_metal : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <td colspan="5"><b>VERIFIKASI</b></td>
                        </tr>
                        <tr>
                            <td>QC</td>
                            <td colspan="4"><?= $metal->username_1; ?></td>
                        </tr>
                        <tr>
                            <td>Produksi</td>
                            <td colspan="4"><?= $metal->nama_produksi_metal; ?></td>
                        </tr>
                        <tr>
                            <td>Disetujui Supervisor</td>
                            <td colspan="4">
                                <?php
                                switch ($metal->status_spv) {
                                    case 1: echo '<span class="text-success font-weight-bold">Verified</span>'; break;
                                    case 2: echo '<span class="text-danger font-weight-bold">Revision</span>'; break;
                                    default: echo '<span class="text-secondary font-weight-bold">Created</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Catatan SPV</td>
                            <td colspan="4"><?= !empty($metal->catatan_spv) ? $metal->catatan_spv : 'Tidak ada'; ?></td>
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
    }
    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .table {
        width: 100%;
        font-size: 15px;
        margin: 0 auto;
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
        width: 200px;
    }

    @media (max-width: 768px) {
        .table th,
        .table td {
            font-size: 14px;
        }
    }
</style>
