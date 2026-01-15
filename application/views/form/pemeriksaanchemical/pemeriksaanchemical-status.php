<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Chemical dari Supplier</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pemeriksaanchemical-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Chemical dari Supplier
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                $datetime = (new DateTime($pemeriksaanchemical->date))->format('d-m-Y');
                $exp = (new DateTime($pemeriksaanchemical->expired))->format('d-m-Y');
                ?>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="font-weight-bold">PEMERIKSAAN CHEMICAL DARI SUPPLIER</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                        <td colspan="2"><b>Tanggal:</b> <?= $datetime; ?></td>
                        <td colspan="5"><b>Shift:</b> <?= $pemeriksaanchemical->shift; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jenis Chemical</b></td>
                        <td colspan="6"><?= $pemeriksaanchemical->jenis_chemical; ?></td>
                    </tr>
                    <tr>
                        <td><b>Pemasok</b></td>
                        <td colspan="6"><?= $pemeriksaanchemical->pemasok; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jenis Mobil</b></td>
                        <td colspan="6"><?= $pemeriksaanchemical->jenis_mobil; ?></td>
                    </tr>
                    <tr>
                        <td><b>No. Polisi</b></td>
                        <td colspan="6"><?= $pemeriksaanchemical->no_polisi; ?></td>
                    </tr>
                    <tr>
                        <td><b>Identitas Pengantar</b></td>
                        <td colspan="6"><?= $pemeriksaanchemical->identitas_pengantar; ?></td>
                    </tr>
                    <tr>
                        <td><b>No. PO / DO</b></td>
                        <td colspan="6"><?= $pemeriksaanchemical->no_po; ?></td>
                    </tr>
                    <tr class="table-primary text-center font-weight-bold">
                        <th colspan="7">KONDISI MOBIL</th>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <?php
                            $keteranganMobil = [1=>'Bersih',2=>'Kotor',3=>'Bau',4=>'Bocor',5=>'Basah',6=>'Kering',7=>'Bebas Hama'];
                            if (!empty($pemeriksaanchemical->kondisi_mobil)) {
                                $mobilList = is_array($pemeriksaanchemical->kondisi_mobil) ? $pemeriksaanchemical->kondisi_mobil : explode(',', $pemeriksaanchemical->kondisi_mobil);
                                echo '<ul class="mb-0">';
                                foreach ($mobilList as $m) echo '<li>' . ($keteranganMobil[trim($m)] ?? 'Tidak diketahui') . '</li>';
                                echo '</ul>';
                            } else {
                                echo 'Tidak ada data';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Kode Produksi</b></td>
                        <td colspan="6"><?= $pemeriksaanchemical->kode_produksi; ?></td>
                    </tr>
                    <tr>
                        <td><b>Expired Date</b></td> 
                        <td colspan="6"><?= $exp; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Jumlah Barang</b></td>
                        <td colspan="2"><b>Sampel (pcs)</b></td>
                        <td colspan="3"><b>Jumlah Reject</b></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $pemeriksaanchemical->jumlah_barang; ?></td>
                        <td colspan="2"><?= $pemeriksaanchemical->sampel; ?></td>
                        <td colspan="3"><?= $pemeriksaanchemical->jumlah_reject; ?></td>
                    </tr>
                    <tr class="table-primary text-center">
                        <th colspan="3">KONDISI FISIK</th>
                        <th colspan="4">HALAL BERLAKU</th>
                    </tr>
                    <tr class="text-center">
                        <td><b>Kemasan</b></td>
                        <td><b>Warna</b></td>
                        <td><b>pH</b></td>
                        <td colspan="4"><b>Berlaku</b></td>
                    </tr>
                    <tr class="text-center">
                        <td><?= icon_check($pemeriksaanchemical->kemasan, 'sesuai'); ?></td>
                        <td><?= icon_check($pemeriksaanchemical->warna, 'sesuai'); ?></td>
                        <td><?= $pemeriksaanchemical->ph; ?></td>
                        <td colspan="4"><?= icon_check($pemeriksaanchemical->halal_berlaku, 'berlaku'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Segel</b></td>
                        <td colspan="5"><?= $pemeriksaanchemical->segel ?: '−'; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Penerimaan</b></td>
                        <td colspan="5"><?= icon_check($pemeriksaanchemical->penerimaan=='ok'?'sesuai':'tidak sesuai', 'sesuai'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>COA</b></td>
                        <td colspan="2"><?= icon_check($pemeriksaanchemical->coa=='ada'?'sesuai':'tidak sesuai', 'sesuai'); ?></td>
                        <td colspan="3"><?= !empty($pemeriksaanchemical->bukti_coa) ? '<a href="'.base_url('uploads/'.$pemeriksaanchemical->bukti_coa).'" target="_blank">Link COA</a>' : '−'; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Keterangan</b></td>
                        <td colspan="5"><?= $pemeriksaanchemical->keterangan ?: '−'; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Form Verifikasi -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="post" action="<?= base_url('pemeriksaanchemical/status/'.$pemeriksaanchemical->uuid); ?>">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="font-weight-bold">Status</label>
                    <select class="form-control <?= form_error('status_spv') ? 'is-invalid' : '' ?>" name="status_spv">
                        <option value="1" <?= set_select('status_spv', '1'); ?> <?= $pemeriksaanchemical->status_spv == 1 ? 'selected' : ''; ?>>Verified</option>
                        <option value="2" <?= set_select('status_spv', '2'); ?> <?= $pemeriksaanchemical->status_spv == 2 ? 'selected' : ''; ?>>Revision</option>
                    </select>
                    <div class="invalid-feedback"><?= form_error('status_spv'); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="font-weight-bold">Catatan Revisi</label>
                    <textarea class="form-control <?= form_error('catatan_spv') ? 'is-invalid' : '' ?>" name="catatan_spv"><?= $pemeriksaanchemical->catatan_spv; ?></textarea>
                    <div class="invalid-feedback"><?= form_error('catatan_spv'); ?></div>
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-success btn-md mr-2">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('pemeriksaanchemical/verifikasi') ?>" class="btn btn-danger btn-md">
                        <i class="fa fa-times"></i> Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<!-- Styling -->
<style>
    .breadcrumb {
        background-color: #2E86C1;
        padding: 10px 16px;
        border-radius: 0.25rem;
    }

    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .table {
        width: 100%;
        font-size: 15px;
    }

    .table th, .table td {
        padding: 10px 12px;
        vertical-align: middle;
        word-break: break-word;
    }

    .invalid-feedback {
        display: block;
    }
</style>

<!-- Helper -->
<?php
function icon_check($val, $yes) {
    return $val === $yes ? '✔️' : ($val ? '❌' : '−');
}
?>
