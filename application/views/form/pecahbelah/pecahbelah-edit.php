<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Benda Mudah Pecah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('pecahbelah') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('pecahbelah/edit/' . $pecahbelah->uuid); ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control" value="<?= $pecahbelah->date ?>">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control" name="shift">
                            <option value="1" <?= $pecahbelah->shift == 1 ? 'selected' : '' ?>>Shift 1</option>
                            <option value="2" <?= $pecahbelah->shift == 2 ? 'selected' : '' ?>>Shift 2</option>
                            <option value="3" <?= $pecahbelah->shift == 3 ? 'selected' : '' ?>>Shift 3</option>
                        </select>
                    </div>
                </div>

                <hr>
                <h5 class="font-weight-bold mb-3">Edit Data Benda Mudah Pecah</h5>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm align-middle text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th class="text-left">Nama Benda</th>
                                <th class="text-left">Area</th>
                                <th class="text-left">Pemilik</th>
                                <th>Jumlah</th>
                                <th>Kondisi Awal</th>
                                <th>Kondisi Akhir</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $benda_pecah = json_decode($pecahbelah->benda_pecah);
                            foreach ($benda_pecah as $i => $b): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td class="text-left">
                                        <input type="hidden" name="nama_barang[]" value="<?= htmlspecialchars($b->nama_barang) ?>">
                                        <?= htmlspecialchars($b->nama_barang) ?>
                                    </td>
                                    <td class="text-left">
                                        <input type="hidden" name="area[]" value="<?= htmlspecialchars($b->area) ?>">
                                        <?= htmlspecialchars($b->area) ?>
                                    </td>
                                    <td class="text-left">
                                        <input type="hidden" name="pemilik[]" value="<?= htmlspecialchars($b->pemilik) ?>">
                                        <?= htmlspecialchars($b->pemilik) ?>
                                    </td>
                                    <td>
                                        <input type="text" name="jumlah[]" value="<?= htmlspecialchars($b->jumlah) ?>">
                                        <!-- <?= htmlspecialchars($b->jumlah) ?> -->
                                    </td>
                                    <td>
                                        <input type="checkbox" name="kondisi_awal[<?= $i ?>]" value="Ok" <?= ($b->kondisi_awal == 'Ok') ? 'checked' : '' ?>>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="kondisi_akhir[<?= $i ?>]" value="Ok" <?= ($b->kondisi_akhir == 'Ok') ? 'checked' : '' ?>>
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" class="form-control form-control-sm" value="<?= htmlspecialchars($b->keterangan) ?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                        <a href="<?= base_url('pecahbelah') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
    th, td {
        vertical-align: middle !important;
    }
    .table th {
        background-color: #3498DB;
        color: white;
    }
</style>
