<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Loading Produk</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('loading'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Loading Produk</a>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <?php 
                        $datetime = new DateTime($loading->date);
                        $datetime = $datetime->format('d-m-Y');
                        ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" colspan="7">PEMERIKSAAN LOADING PRODUK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                                    <td colspan="5" style="text-align:left;"><b>Shift: <?= $loading->shift; ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:center;"><b>Start Loading</b></td>
                                    <td colspan="4" style="text-align:center;"><b>Finish Loading</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:center;"><?= $loading->start_loading ?></td>
                                    <td colspan="4" style="text-align:center;"><?= $loading->finish_loading ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>No. Polisi</b></td>
                                    <td colspan="5"><?= $loading->no_pol; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>Nama Supir</b></td>
                                    <td colspan="5"><?= $loading->nama_supir; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>Ekspedisi</b></td>
                                    <td colspan="5"><?= $loading->ekspedisi; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>Tujuan</b></td>
                                    <td colspan="5"><?= $loading->tujuan; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>No. Segel</b></td>
                                    <td colspan="5"><?= $loading->no_segel; ?></td>
                                </tr>
                                <?php
                                $kondisi_mobil = json_decode($loading->kondisi_mobil, true);
                                $loading_produk = json_decode($loading->loading, true);
                                if (!is_array($kondisi_mobil)) $kondisi_mobil = [];
                                if (!is_array($loading_produk)) $loading_produk = [];

                                $kondisiMap = [
                                    '1' => 'Noda (karat, cat, tinta)',
                                    '2' => 'Bekas oli di lantai, di dinding',
                                    '3' => 'Pallet rusak/pecah',
                                ];
                                ?>
                                <tr>
                                    <th colspan="7" style="text-align:center;">KONDISI MOBIL</th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: left;">List Kondisi</th>
                                    <th colspan="5">Keterangan</th>
                                </tr>
                                <?php foreach ($kondisi_mobil as $row): ?>
                                    <tr>
                                        <td colspan="2" style="text-align: left;"><?= htmlspecialchars($row['list_kondisi']) ?></td>
                                        <td colspan="5">
                                            <?php
                                            $ket = $row['kondisi_mobil_keterangan'];
                                            echo isset($kondisiMap[$ket]) ? $kondisiMap[$ket] : $ket;
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th colspan="7" style="text-align:center;">LOADING PRODUK</th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Kondisi Produk</th>
                                    <th>Kondisi Kemasan</th>
                                    <th>Kode Produksi</th>
                                    <th>Expired</th>
                                    <th>Keterangan</th>
                                </tr>
                                <?php $no = 1; foreach ($loading_produk as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                                    <td><?= htmlspecialchars($row['kondisi_produk']) ?></td>
                                    <td><?= htmlspecialchars($row['kondisi_kemasan']) ?></td>
                                    <td><?= htmlspecialchars($row['kode_produksi']) ?></td>
                                    <td><?= htmlspecialchars($row['expired']) ?></td>
                                    <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <th style="text-align:center;" colspan="7">VERIFIKASI</th>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">QC</td>
                                <td colspan="5"><?= htmlspecialchars($loading->username); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">Warehouse</td>
                                <td colspan="5"><?= $loading->nama_wh;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('loading/statuswh/'.$loading->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Status</label>
                            <select class="form-control <?= form_error('status_wh') ? 'invalid' : '' ?>" name="status_wh">
                                <option value="1" <?= set_select('status_wh', '1'); ?> <?= $loading->status_wh == 1?'selected':'';?>>Checked</option>
                                <option value="2" <?= set_select('status_wh', '2'); ?> <?= $loading->status_wh == 2?'selected':'';?>>Re-Check</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('status_wh')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('status_wh') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan Revisi</label>
                            <textarea class="form-control" name="catatan_wh" ><?= $loading->catatan_wh; ?></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('catatan_wh')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('catatan_wh') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('loading/diketahui')?>" class="btn btn-md btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>

<style type="text/css">
    .breadcrumb {
        background-color: #2E86C1;
    }
    .no-border {
        border: none;
        box-shadow: none;
    }
    .table {
        width: 80%; 
        font-size: 16px; 
        margin: 0 auto; 
        border-collapse: collapse;
    }
    .table, .table th, .table td {
        border: 1px solid #ddd;
    }
    .table th, .table td {
        padding: 6px 8px;
        text-align: left;
        word-wrap: break-word;
        white-space: normal !important;
    }
    .table td {
        white-space: nowrap;
    }

    .table th:first-child,
    .table td:first-child {
        width: 50px;
        max-width: 50px;
        text-align: center;
        white-space: nowrap;
    }
</style>
