<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Magnet Trap</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('magnettrap'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Magnet Trap</a>
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
                                $datetime = new datetime($magnettrap->date);
                                $datetime = $datetime->format('d-m-Y');

                                $time = new datetime($magnettrap->time);
                                $time = $time->format('H:i');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">PEMERIKSAAN MAGNET TRAP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                    <td><b>Shift : <?= $magnettrap->shift;?><b></td>
                                        <td colspan="5"><b>Pukul : <?= $time;?><b></td>
                                        </tr>
                                        <tr>
                                            <td>Tahapan</td>
                                            <td colspan="6"><?= $magnettrap->tahapan;?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kontaminasi</td>
                                            <td colspan="6"><?= $magnettrap->kontaminasi;?></td>
                                        </tr>
                                        <tr>
                                            <td>Bukti Temuan</td>
                                            <td colspan="6">
                                                <?php if (!empty($magnettrap->bukti)): ?>
                                                    <img src="<?= base_url('uploads/' . $magnettrap->bukti); ?>" alt="Bukti Temuan" style="max-width: 200px; max-height: 150px;">
                                                <?php else: ?>
                                                    <p>No image available</p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Analisis Temuan</td>
                                            <td colspan="6"><?= $magnettrap->analisis;?></td>
                                        </tr>
                                        <tr>
                                            <td>Tindakan Koreksi</td>
                                            <td colspan="6"><?= $magnettrap->tindakan;?></td>
                                        </tr>
                                        <tr>
                                            <td>Verifikasi</td>
                                            <td colspan="6"><?= $magnettrap->verifikasi;?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td colspan="6"> <?= !empty($magnettrap->keterangan) ? $magnettrap->keterangan : 'Tidak ada'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Catatan</td>
                                            <td colspan="6"> <?= !empty($magnettrap->catatan) ? $magnettrap->catatan : 'Tidak ada'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>QC</td>
                                            <td colspan="6"><?= $magnettrap->username;?></td>
                                        </tr>
                                        <tr>
                                            <td>Enginer</td>
                                            <td colspan="5"><?= $magnettrap->nama_enginer;?></td>
                                        </tr>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form class="user" method="post" action="<?= base_url('magnettrap/statuseng/'.$magnettrap->uuid);?>">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="form-label font-weight-bold">Status</label>
                                    <select class="form-control <?= form_error('status_enginer') ? 'invalid' : '' ?>" name="status_enginer">
                                        <option value="1" <?= set_select('status_enginer', '1'); ?> <?= $magnettrap->status_enginer == 1?'selected':'';?>>Checked</option>
                                        <option value="2" <?= set_select('status_enginer', '2'); ?> <?= $magnettrap->status_enginer == 2?'selected':'';?>>Re-Check</option>
                                    </select>
                                    <div class="invalid-feedback <?= !empty(form_error('status_enginer')) ? 'd-block' : '' ; ?> ">
                                        <?= form_error('status_enginer') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label class="form-label font-weight-bold">Catatan Revisi</label>
                                    <textarea class="form-control" name="catatan_enginer" ><?= $magnettrap->catatan_enginer; ?></textarea>
                                    <div class="invalid-feedback <?= !empty(form_error('catatan_enginer')) ? 'd-block' : '' ; ?> ">
                                        <?= form_error('catatan_enginer') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-md btn-success mr-2">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    <a href="<?= base_url('magnettrap/diketahui')?>" class="btn btn-md btn-danger">
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