<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Kontaminasi Benda Asing</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('kontaminasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Kontaminasi Benda Asing
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                    $tanggal = (new DateTime($kontaminasi->date))->format('d-m-Y');
                    $jam = (new DateTime($kontaminasi->time))->format('H:i');
                ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">KONTAMINASI BENDA ASING</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $tanggal; ?></td>
                            <td><b>Pukul:</b> <?= $jam; ?></td>
                            <td colspan="4"><b>Shift:</b> <?= $kontaminasi->shift; ?></td>
                        </tr>

                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Hasil Pemeriksaan</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Jenis Kontaminasi</b></td>
                            <td colspan="5"><?= $kontaminasi->jenis_kontaminasi; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Nama Produk</b></td>
                            <td colspan="5"><?= $kontaminasi->nama_produk; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Kode Produksi</b></td>
                            <td colspan="5"><?= $kontaminasi->kode_produksi; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Tahapan</b></td>
                            <td colspan="5"><?= $kontaminasi->tahapan; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Jumlah Temuan</b></td>
                            <td colspan="5"><?= $kontaminasi->jumlah_temuan; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Bukti Temuan</b></td>
                            <td colspan="5">
                                <?php
                                $bukti = $kontaminasi->bukti ?? null;

                                $path1 = FCPATH . 'uploads/' . $bukti;
                                $path2 = FCPATH . 'uploads/kontaminasi/' . $bukti;

                                if (!empty($bukti)) {
                                    if (file_exists($path1)) {
                                        $img_url = base_url('uploads/' . $bukti);
                                    } elseif (file_exists($path2)) {
                                        $img_url = base_url('uploads/kontaminasi/' . $bukti);
                                    } else {
                                        $img_url = null;
                                    }
                                } else {
                                    $img_url = null;
                                }
                                ?>

                                <?php if ($img_url): ?>
                                    <img src="<?= $img_url; ?>" alt="Bukti Temuan" style="max-width: 200px; max-height: 150px;">
                                <?php else: ?>
                                    <p>Tidak ada gambar</p>
                                <?php endif; ?>

                                </td>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Analisis Temuan</b></td>
                            <td colspan="5"><?= $kontaminasi->analisis; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Tindakan Koreksi</b></td>
                            <td colspan="5"><?= $kontaminasi->tindakan; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Keterangan</b></td>
                            <td colspan="5"><?= !empty($kontaminasi->keterangan) ? $kontaminasi->keterangan : 'Tidak ada'; ?></td>
                        </tr>

                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $kontaminasi->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= $kontaminasi->nama_produksi; ?></td>
                        </tr>
                        <tr>
                            <td><b>Status Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                switch ($kontaminasi->status_spv) {
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
                            <td><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($kontaminasi->catatan_spv) ? $kontaminasi->catatan_spv : 'Tidak ada'; ?></td>
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
