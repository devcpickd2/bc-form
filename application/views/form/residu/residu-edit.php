<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Verifikasi Residu Klorin</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('residu') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Residu Klorin
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('residu/edit/' . $residu->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?>" value="<?= set_value('date', $residu->date) ?>">
                        <div class="invalid-feedback <?= form_error('date') ? 'd-block' : '' ?>"><?= form_error('date') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Area</label>
                        <input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?>" value="<?= set_value('area', $residu->area) ?>">
                        <div class="invalid-feedback <?= form_error('area') ? 'd-block' : '' ?>"><?= form_error('area') ?></div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Titik Sampling</label>
                        <input type="text" name="titik_sampling" class="form-control <?= form_error('titik_sampling') ? 'invalid' : '' ?>" value="<?= set_value('titik_sampling', $residu->titik_sampling) ?>">
                        <div class="invalid-feedback <?= form_error('titik_sampling') ? 'd-block' : '' ?>"><?= form_error('titik_sampling') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold">Standar (PPM)</label>
                        <p class="form-control-plaintext font-weight-bold">0.1 - 5</p>
                        <input type="hidden" name="standar" value="0.1 - 5">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Hasil Pemeriksaan (PPM)</label>
                        <input type="text" name="hasil_pemeriksaan" class="form-control <?= form_error('hasil_pemeriksaan') ? 'invalid' : '' ?>" value="<?= set_value('hasil_pemeriksaan', $residu->hasil_pemeriksaan) ?>">
                        <div class="invalid-feedback <?= form_error('hasil_pemeriksaan') ? 'd-block' : '' ?>"><?= form_error('hasil_pemeriksaan') ?></div>
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <div class="form-check">
                            <input class="form-check-input <?= form_error('keterangan') ? 'is-invalid' : '' ?>" type="radio" name="keterangan" id="keterangan_ok" value="Ok" <?= set_value('keterangan', $residu->keterangan) === 'Ok' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="keterangan_ok">Ok</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input <?= form_error('keterangan') ? 'is-invalid' : '' ?>" type="radio" name="keterangan" id="keterangan_tidak_ok" value="Tidak Ok" <?= set_value('keterangan', $residu->keterangan) === 'Tidak Ok' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="keterangan_tidak_ok">Tidak Ok</label>
                        </div>
                        <div class="invalid-feedback <?= form_error('keterangan') ? 'd-block' : '' ?>"><?= form_error('keterangan') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tindakan Koreksi</label>
                        <input type="text" name="tindakan" class="form-control <?= form_error('tindakan') ? 'invalid' : '' ?>" value="<?= set_value('tindakan', $residu->tindakan) ?>">
                        <div class="invalid-feedback <?= form_error('tindakan') ? 'd-block' : '' ?>"><?= form_error('tindakan') ?></div>
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Verifikasi</label>
                        <input type="text" name="verifikasi" class="form-control <?= form_error('verifikasi') ? 'invalid' : '' ?>" value="<?= set_value('verifikasi', $residu->verifikasi) ?>">
                        <div class="invalid-feedback <?= form_error('verifikasi') ? 'd-block' : '' ?>"><?= form_error('verifikasi') ?></div>
                    </div>
                </div>

                <hr>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"><?= set_value('catatan', $residu->catatan) ?></textarea>
                        <div class="invalid-feedback <?= form_error('catatan') ? 'd-block' : '' ?>"><?= form_error('catatan') ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                        <a href="<?= base_url('residu') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>
