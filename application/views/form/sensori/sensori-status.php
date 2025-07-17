<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Laporan Sensori Finish Good</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('sensori'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Sensori Finish Good</a>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <?php 
                        $datetime = new DateTime($sensori->date);
                        $datetime = $datetime->format('d-m-Y');
                        ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" colspan="7">LAPORAN SENSORI FINISH GOOD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left"><b>Nama Produk</b></td>
                                    <td colspan="5"><?= $sensori->nama_produk; ?></td>
                                </tr>
                                <?php
                                $sensori_produk = json_decode($sensori->produk, true);
                                if (!is_array($sensori_produk)) $sensori_produk = [];
                                ?>
                                <tr>
                                    <th colspan="7" style="text-align:center;">Sensori Produk</th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align:center;">Kode Produksi / BB</th>
                                    <th style="text-align:center;">Warna</th>
                                    <th style="text-align:center;">Tekstur</th>
                                    <th style="text-align:center;">Rasa</th>
                                    <th style="text-align:center;">Aroma</th>
                                    <th style="text-align:center;">Kenampakan</th>
                                </tr>
                                <?php 
                                foreach ($sensori_produk as $row): ?>
                                    <tr>
                                        <td colspan="2"><?= htmlspecialchars($row['kode_produksi']); ?> / <?= htmlspecialchars($row['best_before']); ?></td>
                                        <td style="text-align:center;">
                                            <?= ($row['warna'] == 'Ok') ? '✔' : (($row['warna'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['warna'])) ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= ($row['tekstur'] == 'Ok') ? '✔' : (($row['tekstur'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['tekstur'])) ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= ($row['rasa'] == 'Ok') ? '✔' : (($row['rasa'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['rasa'])) ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= ($row['aroma'] == 'Ok') ? '✔' : (($row['aroma'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['aroma'])) ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= ($row['kenampakan'] == 'Ok') ? '✔' : (($row['kenampakan'] == 'Tidak Ok') ? '✘' : htmlspecialchars($row['kenampakan'])) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <td colspan="3">Catatan</td>
                                    <td colspan="6"> <?= !empty($sensori->catatan) ? $sensori->catatan : 'Tidak ada'; ?></td>
                                </tr>

                                <tr>
                                    <th style="text-align:center;" colspan="7">VERIFIKASI</th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left">QC</td>
                                    <td colspan="5"><?= htmlspecialchars($sensori->username); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:left">Produksi</td>
                                    <td colspan="5"><?= $sensori->nama_produksi;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('sensori/status/'.$sensori->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Status</label>
                            <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                                <option value="1" <?= set_select('status_spv', '1'); ?> <?= $sensori->status_spv == 1?'selected':'';?>>Verified</option>
                                <option value="2" <?= set_select('status_spv', '2'); ?> <?= $sensori->status_spv == 2?'selected':'';?>>Revision</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('status_spv') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan Revisi</label>
                            <textarea class="form-control" name="catatan_spv" ><?= $sensori->catatan_spv; ?></textarea>
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
                            <a href="<?= base_url('sensori/verifikasi')?>" class="btn btn-md btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </form>
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
