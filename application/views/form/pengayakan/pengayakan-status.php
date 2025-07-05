<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pengayakan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pengayakan-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Pengayakan</a>
                </li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <?php 
                                $datetime = new datetime($pengayakan->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">PEMERIKSAAN PENGAYAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                    <td colspan="6"><b>Shift : <?= $pengayakan->shift;?><b></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td colspan="6"><?= $pengayakan->nama_barang;?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Produksi</td>
                                        <td colspan="6"><?= $pengayakan->kode_produksi;?></td>
                                    </tr>
                                    <tr>
                                        <td>Expired Date</td>
                                        <td colspan="6"><?= $pengayakan->expired_date;?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Barang</td>
                                        <td colspan="6"><?= $pengayakan->jumlah_barang;?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kontaminasi Benda Asing</b></td>
                                        <td style="text-align:center;"><b>Screen Mess</b></td>
                                        <td style="text-align:center;"><b>Kerikil</b></td>
                                        <td style="text-align:center;"><b>Benang</b></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td style="text-align:center;"><?= $pengayakan->kba_screenmess;?></td>
                                        <td style="text-align:center;"><?= $pengayakan->kba_kerikil;?></td>
                                        <td style="text-align:center;"><?= $pengayakan->kba_benang;?></td>
                                    </tr>
                                    <tr>
                                        <td>Kondisi Screen Ayakan</td>
                                        <td colspan="6"><?= $pengayakan->kondisi;?></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan</td>
                                        <td colspan="6"> <?= !empty($pengayakan->catatan) ? $pengayakan->catatan : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>QC</td>
                                        <td colspan="6"> <?= !empty($pengayakan->username) ? $pengayakan->username : 'Tidak ada'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Diketahui Produksi</td>
                                        <td colspan="4">
                                            <?php
                                            if ($pengayakan->status_produksi == 0) {
                                                echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                            } elseif ($pengayakan->status_produksi == 1) {
                                                echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                            } elseif ($pengayakan->status_produksi == 2) {
                                                echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                            }
                                        ?></td>
                                    </tr>
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form class="user" method="post" action="<?= base_url('pengayakan/status/'.$pengayakan->uuid);?>">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="form-label font-weight-bold">Status</label>
                                <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                                    <option value="1" <?= set_select('status_spv', '1'); ?> <?= $pengayakan->status_spv == 1?'selected':'';?>>Verified</option>
                                    <option value="2" <?= set_select('status_spv', '2'); ?> <?= $pengayakan->status_spv == 2?'selected':'';?>>Revision</option>
                                </select>
                                <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                                    <?= form_error('status_spv') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <label class="form-label font-weight-bold">Catatan Revisi</label>
                                <textarea class="form-control" name="catatan_spv" ><?= $pengayakan->catatan_spv; ?></textarea>
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
                                <a href="<?= base_url('pengayakan/verifikasi')?>" class="btn btn-md btn-danger">
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
            width: 50%; 
            font-size: 16px; 
            margin: 0 auto; 
        }
        .table, .table th, .table td {
            border: none;
        }
        .table th, .table td {
            padding: 6px 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
            white-space: normal !important;
        }
        .table td {
            white-space: nowrap;
        }

    </style>
