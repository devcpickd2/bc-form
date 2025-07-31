<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Disposisi Produk dan Prosedur</h1>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('disposisi-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Disposisi Produk dan Prosedur
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <?php 
                    $datetime = new DateTime($disposisi->date);
                    $formattedDate = $datetime->format('d-m-Y');
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th colspan="6" class="text-center font-weight-bold">DISPOSISI PRODUK DAN PROSEDUR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Tanggal</b></td>
                            <td colspan="5"><b><?= $formattedDate; ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Nomor</b></td>
                            <td colspan="4"><?= $disposisi->nomor; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Kepada</b></td>
                            <td colspan="4"><?= $disposisi->kepada; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Disposisi</b></td>
                            <td colspan="4"><?= $disposisi->disposisi; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Dasar Disposisi</b></td>
                            <td colspan="4"><?= !empty($disposisi->dasar_disposisi) ? $disposisi->dasar_disposisi : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Uraian Disposisi</b></td>
                            <td colspan="4"><?= !empty($disposisi->uraian_disposisi) ? $disposisi->uraian_disposisi : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Catatan</b></td>
                            <td colspan="4"><?= !empty($disposisi->catatan) ? $disposisi->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="6">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td colspan="2"><b>QC</b></td>
                            <td colspan="4"><?= $disposisi->username; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Produksi</b></td>
                            <td colspan="4"><?= $disposisi->nama_produksi; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Disetujui Supervisor</b></td>
                            <td colspan="4">
                                <?php
                                switch ($disposisi->status_spv) {
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
                            <td colspan="4"><?= !empty($disposisi->catatan_spv) ? $disposisi->catatan_spv : 'Tidak ada'; ?></td>
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
