<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Produksi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('produksi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Produksi</a>
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
                                $datetime = new datetime($produksi->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="6">VERIFIKASI PROSES PRODUKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                    <td colspan="5"><b>Shift : <?= $produksi->shift;?><b></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Produk</td>
                                        <td colspan="5"><?= $produksi->nama_produk;?></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Produksi</td>
                                        <td colspan="5"><?= $produksi->kode_produksi;?></td>
                                    </tr>
                                    <tr>
                                        <td><b>RAW MATERIAL</b></td>
                                        <td><b>Kode</b></td>
                                        <td><b>Berat</b></td>
                                        <td colspan="3"><b>Sensori</b></td>
                                    </tr>
                                    <tr>
                                        <td>Tepung Terigu</td>
                                        <td><?= $produksi->tegu_kode;?></td>
                                        <td><?= $produksi->tegu_berat;?></td>
                                        <td colspan="3"><?= $produksi->tegu_sens;?></td>
                                    </tr>
                                    <tr>
                                        <td>Tapioka Starch</td>
                                        <td><?= $produksi->tapioka_kode;?></td>
                                        <td><?= $produksi->tapioka_berat;?></td>
                                        <td colspan="3"><?= $produksi->tapioka_sens;?></td>
                                    </tr>
                                    <tr>
                                        <td>Ragi</td>
                                        <td><?= $produksi->ragi_kode;?></td>
                                        <td><?= $produksi->ragi_berat;?></td>
                                        <td colspan="3"><?= $produksi->ragi_sens;?></td>
                                    </tr><tr>
                                        <td>Bread Improver</td>
                                        <td><?= $produksi->bread_kode;?></td>
                                        <td><?= $produksi->bread_berat;?></td>
                                        <td colspan="3"><?= $produksi->bread_sens;?></td>
                                    </tr>
                                    <tr>
                                        <td>Premix 1</td>
                                        <td><?= $produksi->premix_kode_1;?></td>
                                        <td><?= $produksi->premix_berat_1;?></td>
                                        <td colspan="3"><?= $produksi->premix_sens_1;?></td>
                                    </tr>
                                    <tr>
                                        <td>Premix 2</td>
                                        <td><?= $produksi->premix_kode_2;?></td>
                                        <td><?= $produksi->premix_berat_2;?></td>
                                        <td colspan="3"><?= $produksi->premix_sens_2;?></td>
                                    </tr>
                                    <tr>
                                        <td>Premix 3</td>
                                        <td><?= $produksi->premix_kode_3;?></td>
                                        <td><?= $produksi->premix_berat_3;?></td>
                                        <td colspan="3"><?= $produksi->premix_sens_3;?></td>
                                    </tr>
                                    <tr>
                                        <td>Shortening</td>
                                        <td><?= $produksi->shortening_kode;?></td>
                                        <td><?= $produksi->shortening_berat;?></td>
                                        <td colspan="3"><?= $produksi->shortening_sens;?></td>
                                    </tr>
                                    <tr>
                                        <td>Chill Water (15 ± 1°C)</td>
                                        <td><?= $produksi->chill_water_kode;?></td>
                                        <td><?= $produksi->chill_water_berat;?></td>
                                        <td colspan="3"><?= $produksi->chill_water_sens;?></td>
                                    </tr>

                                    <tr>
                                        <td  style="text-align:center;" colspan="6"><b>MIXING DOUGH</b></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Mixing(11 Menit)</td>
                                        <td colspan="5"><?= $produksi->mix_dough_waktu;?></td>
                                    </tr>
                                    <tr>
                                        <td>Hasil & Nomor Mesin</td>
                                        <td colspan="5"><?= $produksi->mix_dough_mesin;?></td>
                                    </tr>
                                    <tr>
                                        <td>Dough Cutting (630 - 670 g)</td>
                                        <td colspan="5"><?= $produksi->mix_dough_cutting;?></td>
                                    </tr>
                                    <tr>
                                        <td>Suhu & RH Ruang</td>
                                        <td colspan="5"><?= $produksi->mix_dough_suhu_ruang;?></td>
                                    </tr>
                                    <tr>
                                        <td>Suhu Adonan (29 - 31°C)</td>
                                        <td colspan="5"><?= $produksi->mix_dough_suhu_adonan;?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;" colspan="6"><b>FERMENTASI</b></td>
                                    </tr>
                                    <tr>
                                        <td>Suhu (°C)</td>
                                        <td colspan="5"><?= $produksi->fermen_suhu;?></td>
                                    </tr>
                                    <tr>
                                        <td>RH (%)</td>
                                        <td colspan="5"><?= $produksi->fermen_rh;?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam Mulai</td>
                                        <td colspan="5"><?= date('H:i', strtotime($produksi->fermen_jam_mulai)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam Selesai</td>
                                        <td colspan="5"><?= date('H:i', strtotime($produksi->fermen_jam_selesai)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lama Proses</td>
                                        <td colspan="5"><?= $produksi->fermen_lama_proses;?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;" colspan="6"><b>ELECTRIC BAKING</b></td>
                                    </tr>
                                    <tr>
                                        <td>Suhu Produk (80 - 97°C)</td>
                                        <td colspan="5"><?= $produksi->electric_baking_suhu;?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Mesin & Expand Roti %</td>
                                        <td colspan="5"><?= $produksi->electric_baking_mesin;?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;" colspan="6"><b>SENSORI</b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="text-align:center;"><b>Kematangan</b></td>
                                        <td style="text-align:center;"><b>Rasa</b></td>
                                        <td style="text-align:center;"><b>Aroma</b></td>
                                        <td style="text-align:center;"><b>Tekstur</b></td>
                                        <td style="text-align:center;"><b>Warna</b></td>
                                    </tr>
                                    <tr>
                                        <td>Hasil</td>
                                        <td style="text-align:center;">
                                            <?= $produksi->sens_kematangan == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->sens_kematangan == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= $produksi->sens_rasa == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->sens_rasa == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= $produksi->sens_aroma == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->sens_aroma == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= $produksi->sens_tekstur == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->sens_tekstur == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= $produksi->sens_warna == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->sens_warna == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                             <thead>
                                <?php 
                                $datetime = new datetime($produksi->date_stall);
                                $datetime = $datetime->format('d-m-Y');
                                ?>

                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                    <td colspan="5"><b>Shift : <?= $produksi->shift_pack;?><b></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;" colspan="6"><b>STALLING</b></td>
                                    </tr>
                                    <tr>
                                        <td>Jam Mulai</td>
                                        <td colspan="5"><?= date('H:i', strtotime($produksi->stall_jam_mulai)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam Selesai</td>
                                        <td colspan="5"><?= date('H:i', strtotime($produksi->stall_jam_berhenti)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kadar Air 32-34 (%)</td>
                                        <td colspan="5"><?= $produksi->stall_kadar_air;?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;" colspan="6"><b>DRYING</b></td>
                                    </tr>
                                    <tr>
                                        <td>Suhu (°C)</td>
                                        <td colspan="5"><?= $produksi->dry_suhu;?></td>
                                    </tr>
                                    <tr>
                                        <td>Speed Rotasi (4-6 RPM)</td>
                                        <td colspan="5"><?= $produksi->dry_rotasi;?></td>
                                    </tr>
                                    <tr>
                                        <td>Kadar Air 4-8 (%)</td>
                                        <td colspan="5"><?= $produksi->dry_kadar_air;?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;" colspan="6"><b>PRODUK</b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="text-align:center;"><b>Hasil</b></td>
                                        <td style="text-align:center;"><b>Rasa</b></td>
                                        <td style="text-align:center;"><b>Aroma</b></td>
                                        <td style="text-align:center;"><b>Tekstur</b></td>
                                        <td style="text-align:center;"><b>Warna</b></td>
                                    </tr>
                                    <tr>
                                     <td>Hasil</td>
                                     <td style="text-align:center;">
                                        <?= $produksi->produk_hasil == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->produk_hasil == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?= $produksi->produk_rasa == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->produk_rasa == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?= $produksi->produk_aroma == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->produk_aroma == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?= $produksi->produk_tekstur == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->produk_tekstur == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?= $produksi->produk_warna == 'oke' ? '<span style="color: green; font-weight: bold;">&#10004;</span>' : ($produksi->produk_warna == 'tidak' ? '<span style="color: red; font-weight: bold;">&#10006;</span>' : ''); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center;" colspan="6"><b>PACKING AREA</b></td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td colspan="5"><?= $produksi->packing_nama_produk;?></td>
                                </tr>
                                <tr>
                                    <td>Kode Kemasan</td>
                                    <td colspan="5"><?= $produksi->packing_kode_kemasan;?></td>
                                </tr>
                                <tr>
                                    <td>Best Before</td>
                                    <td colspan="5"><?= date('d m Y', strtotime($produksi->packing_bb)); ?></td>
                                </tr>
                                <tr>
                                    <td>Kondisi Kemasan</td>
                                    <td colspan="5"><?= $produksi->packing_kondisi_kemasan;?></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td colspan="5"> <?= !empty($produksi->catatan) ? $produksi->catatan : 'Tidak ada'; ?></td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" colspan="6">VERIFIKASI</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td>QC</td>
                                    <td colspan="6"><?= $produksi->username;?></td>
                                </tr>
                                <tr>
                                    <td>Produksi</td>
                                    <td><?= $produksi->nama_produksi;?></td>
                                </tr>
                                <td>Diketahui Produksi</td>
                                <td colspan="4">
                                    <?php
                                    if ($produksi->status_produksi == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($produksi->status_produksi == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                    } elseif ($produksi->status_produksi == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                    }
                                ?></td></tr>
                                <tr>
                                    <td>Catatan Produksi</td>
                                    <td colspan="4"><?= !empty($produksi->catatan_produksi) ? $produksi->catatan_produksi : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <td>Disetujui Supervisor</td>
                                    <td colspan="4"><?php
                                    if ($produksi->status_spv == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($produksi->status_spv == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                    } elseif ($produksi->status_spv == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                    }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Catatan SPV</td>
                                <td colspan="4"><?= !empty($produksi->catatan_spv) ? $produksi->catatan_spv : 'Tidak ada'; ?></td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
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
        width: 40%;
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
    }
    .table td {
        white-space: nowrap; 
    }
</style>

