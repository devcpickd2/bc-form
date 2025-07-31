<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Detail Produksi</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('produksi'); ?>">
          <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Produksi
        </a>
      </li>
    </ol>
  </nav>


<!-- Verifikasi Proses Produksi -->
<?php $tanggal = (new DateTime($produksi->date))->format('d-m-Y'); ?>
<div class="card shadow mb-4">
  <div class="card-header bg-info text-white">Verifikasi Proses Produksi</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
        <tbody>
          <tr><td><strong>Tanggal</strong></td><td><?= $tanggal; ?></td><td><strong>Shift</strong></td><td><?= $produksi->shift; ?></td></tr>
          <tr><td><strong>Jenis Produk</strong></td><td colspan="3"><?= $produksi->nama_produk; ?></td></tr>
          <tr><td><strong>Kode Produksi</strong></td><td colspan="3"><?= $produksi->kode_produksi; ?></td></tr>
          <tr class="table-primary text-center"><th>Raw Material</th><th>Kode</th><th>Berat</th><th>Sensori</th></tr>
          <?php
          $bahan = [
            'Tepung Terigu' => [$produksi->tegu_kode, $produksi->tegu_berat, $produksi->tegu_sens],
            'Tapioka Starch' => [$produksi->tapioka_kode, $produksi->tapioka_berat, $produksi->tapioka_sens],
            'Ragi' => [$produksi->ragi_kode, $produksi->ragi_berat, $produksi->ragi_sens],
            'Bread Improver' => [$produksi->bread_kode, $produksi->bread_berat, $produksi->bread_sens],
            'Shortening' => [$produksi->shortening_kode, $produksi->shortening_berat, $produksi->shortening_sens],
            'Chill Water' => [$produksi->chill_water_kode, $produksi->chill_water_berat, $produksi->chill_water_sens]
          ];
          foreach ($bahan as $nama => $data) {
            echo "<tr><td>{$nama}</td><td>{$data[0]}</td><td>{$data[1]}</td><td>{$data[2]}</td></tr>";
          }
          ?>
          <tr class="table-secondary text-center"><th colspan="4">Daftar Premix</th></tr>
          <tr class="text-center"><th>No</th><th>Kode</th><th>Berat</th><th>Sensori</th></tr>
          <?php
          $premix = json_decode($produksi->premix, true) ?: [];
          $no = 1;
          foreach ($premix as $item) {
            echo "<tr><td class='text-center'>{$no}</td><td>{$item['kode']}</td><td>{$item['berat']}</td><td>{$item['sens']}</td></tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Mixing Dough -->
<div class="card shadow mb-4">
  <div class="card-header bg-success text-white">Mixing Dough</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
        <tbody>
          <tr><td><strong>Waktu Mixing</strong></td><td><?= $produksi->mix_dough_waktu_1; ?> Menit</td></tr>
          <tr><td><strong>Hasil & Nomor Mesin</strong></td><td colspan="2"><?= $produksi->mix_dough_mesin; ?> / <?= $produksi->mix_dough_mesin; ?></td></tr>
          <tr><td><strong>Dough Cutting</strong></td><td colspan="2"><?= $produksi->mix_dough_cutting; ?></td></tr>
          <tr><td><strong>Suhu & RH Ruang</strong></td><td colspan="2"><?= $produksi->mix_dough_suhu_ruang; ?> / <?= $produksi->mix_dough_rh_ruang; ?></td></tr>
          <tr><td><strong>Suhu Adonan</strong></td><td colspan="2"><?= $produksi->mix_dough_suhu_adonan; ?></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Fermentasi -->
<div class="card shadow mb-4">
  <div class="card-header bg-warning text-white">Fermentasi</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <tbody>
          <tr><td><strong>Suhu</strong></td><td><?= $produksi->fermen_suhu; ?> °C</td></tr>
          <tr><td><strong>RH</strong></td><td><?= $produksi->fermen_rh; ?> %</td></tr>
          <tr><td><strong>Jam Mulai</strong></td><td><?= date('H:i', strtotime($produksi->fermen_jam_mulai)); ?></td></tr>
          <tr><td><strong>Jam Selesai</strong></td><td><?= date('H:i', strtotime($produksi->fermen_jam_selesai)); ?></td></tr>
          <tr><td><strong>Lama Proses</strong></td><td><?= $produksi->fermen_lama_proses; ?></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Electric Baking -->
<div class="card shadow mb-4">
  <div class="card-header bg-danger text-white">Electric Baking</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <tbody>
          <tr><td><strong>Suhu Produk</strong></td><td colspan="5"><?= $produksi->electric_baking_suhu; ?> °C</td></tr>
          <tr><td><strong>No Mesin & Expand Roti %</strong></td><td colspan="5"><?= $produksi->electric_baking_mesin; ?> / <?= $produksi->electric_baking_expand; ?></td></tr>
          <tr class="table-primary text-center"><th colspan="6">Sensori</th></tr>
          <tr>
            <td></td>
            <td style="text-align:center;"><b>Kematangan</b></td>
            <td style="text-align:center;"><b>Rasa</b></td>
            <td style="text-align:center;"><b>Aroma</b></td>
            <td style="text-align:center;"><b>Tekstur</b></td>
            <td style="text-align:center;"><b>Warna</b></td>
          </tr>
          <tr>
            <td><strong>Hasil</strong></td>
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

<!-- Verifikasi Proses Produksi -->
<?php $tanggal_stall = (new DateTime($produksi->date_stall))->format('d-m-Y'); ?>
<div class="card shadow mb-4">
  <div class="card-header bg-info text-white">Verifikasi Proses Produksi</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
        <tbody>
          <tr><td><strong>Tanggal</strong></td><td><?= $tanggal_stall; ?></td><td><strong>Shift</strong></td><td><?= $produksi->shift_pack; ?></td></tr>
          <tr class="table-primary text-center"><th colspan="7">Stalling</th></tr>
          <tr><td><strong>Jam Mulai</strong></td><td colspan="3"><?= $produksi->stall_jam_mulai; ?></td></tr>
          <tr><td><strong>Jam Berhenti</strong></td><td colspan="3"><?= $produksi->stall_jam_berhenti; ?></td></tr>
          <tr><td><strong>Kadar Air Produk</strong></td><td colspan="3"><?= $produksi->stall_kadar_air; ?></td></tr>
          <tr class="table-primary text-center"><th colspan="7">Drying</th></tr>
          <tr><td><strong>Suhu (°C)</strong></td><td colspan="3"><?= $produksi->dry_suhu; ?></td></tr>
          <tr><td><strong>Speed Rotasi (4 - 6 RPM)</strong></td><td colspan="3"><?= $produksi->dry_rotasi; ?></td></tr>
          <tr><td><strong>Kadar Air 4 - 8 (%)</strong></td><td colspan="3"><?= $produksi->dry_kadar_air; ?> °C</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Packing Area -->
<div class="card shadow mb-4">
  <div class="card-header bg-secondary text-white">Packing Area</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <tbody>
          <tr class="table-primary text-center"><th colspan="7">Produk</th></tr>
          <tr>
            <td></td>
            <td style="text-align:center;"><b>Hasil</b></td>
            <td style="text-align:center;"><b>Rasa</b></td>
            <td style="text-align:center;"><b>Aroma</b></td>
            <td style="text-align:center;"><b>Tekstur</b></td>
            <td style="text-align:center;"><b>Warna</b></td>
          </tr>
          <tr>
            <td><strong>Hasil</strong></td>
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
      <!-- <tr><td><strong>Nama Produk</strong></td><td colspan="5"><?= $produksi->packing_nama_produk; ?></td></tr>
      <tr><td><strong>Kode Kemasan</strong></td><td colspan="5"><?= $produksi->packing_kode_kemasan; ?></td></tr> -->
      <tr>
        <td colspan="2"><b>Gambar Aktual Kemasan</b></td>
        <td colspan="5">
          <?php if (!empty($produksi->gambar_kode_kemasan)): ?>
            <img src="<?= base_url('uploads/' . $produksi->gambar_kode_kemasan); ?>" style="max-width: 200px; max-height: 180px;">
          <?php else: ?>
            Tidak ada gambar
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td><strong>Kondisi Kemasan</strong></td>
        <td colspan="5">
          <?= $produksi->packing_kondisi_kemasan == 1 ? 'Oke' : ($produksi->packing_kondisi_kemasan == 2 ? 'Tidak Oke' : ''); ?>
        </td>
      </tr>

<!-- <tr>
    <td colspan="2"><b>Gambar Aktual</b></td>
    <td colspan="5">
      <?php if (!empty($produksi->gambar_kondisi_kemasan)): ?>
        <img src="<?= base_url('uploads/' . $produksi->gambar_kondisi_kemasan); ?>" style="max-width: 200px; max-height: 180px;">
    <?php else: ?>
        Tidak ada gambar
    <?php endif; ?>
</td>
</tr> -->
</tbody>
</table>
</div>
</div>
</div>

<!-- Verifikasi -->
<div class="card shadow mb-4">
  <div class="card-header bg-dark text-white">Verifikasi</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <tbody>
          <tr><td><strong>QC</strong></td><td><?= $produksi->username; ?></td></tr>
          <tr><td><strong>Produksi</strong></td><td><?= $produksi->nama_produksi; ?></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <form class="user" method="post" action="<?= base_url('produksi/status/'.$produksi->uuid);?>">
      <div class="form-group row">
        <div class="col-sm-6">
          <label class="form-label font-weight-bold">Status</label>
          <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $produksi->status_spv == 1?'selected':'';?>>Verified</option>
            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $produksi->status_spv == 2?'selected':'';?>>Revision</option>
          </select>
          <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> ">
            <?= form_error('shift') ?>
          </div>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sm-6">
          <label class="form-label font-weight-bold">Catatan Revisi</label>
          <textarea class="form-control" name="catatan_spv" ><?= $produksi->catatan_spv; ?></textarea>
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
          <a href="<?= base_url('produksi/verifikasi')?>" class="btn btn-md btn-danger">
            <i class="fa fa-times"></i> Batal
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

<!-- Tambahkan CSS final untuk perbaikan tampilan -->
<style>
  .breadcrumb {
    background-color: #2E86C1;
    border-radius: .25rem;
    padding: 0.5rem 1rem;
  }

  .breadcrumb a {
    color: white !important;
    font-weight: 500;
  }

  .card-header {
    font-size: 1rem;
    font-weight: bold;
  }

  .table {
    font-size: 13px;
  }

  .table th {
    background-color: #f8f9fc;
    text-align: center;
  }

  .table td {
    vertical-align: middle !important;
  }

  .badge-status {
    font-size: 12px;
    padding: 4px 8px;
  }

  img {
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }

  @media (max-width: 768px) {
    .table-responsive {
      overflow-x: auto;
    }

    .table td,
    .table th {
      font-size: 12px;
    }

    .card-header {
      font-size: 14px;
    }

    .breadcrumb {
      font-size: 13px;
    }
  }

  .text-center td,
  .text-center th {
    text-align: center;
  }

  .table-primary th,
  .table-primary td,
  .table-secondary th,
  .table-secondary td {
    background-color: #e9ecef !important;
  }

  .text-green {
    color: green;
    font-weight: bold;
  }

  .text-red {
    color: red;
    font-weight: bold;
  }

  .checkmark {
    color: green;
    font-size: 16px;
    font-weight: bold;
  }

  .crossmark {
    color: red;
    font-size: 16px;
    font-weight: bold;
  }

  .section-title {
    background-color: #f8f9fc;
    padding: 8px 16px;
    font-weight: bold;
    border-left: 4px solid #007bff;
    margin-bottom: 10px;
    font-size: 15px;
  }

  .table th[colspan] {
    text-align: center;
    background-color: #dee2e6 !important;
  }

  .text-sm {
    font-size: 13px;
  }
</style>