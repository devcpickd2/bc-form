<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Verifikasi Proses Produksi</h1>
    </div>

    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group text-right">
                <a href="<?= base_url('proses/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Shift</th>
                            <th class="text-center">Types of Product</th>
                            <th class="text-center">Kode Produksi</th>
                            <th class="text-center">Finish Product</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($proses as $val) {
                            $datetime = new datetime($val->date);
                            $datetime = $datetime->format('d-m-Y');
                        ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $datetime; ?></td>
                                <td><?= $val->shift; ?></td>
                                <td><?= $val->nama_produk; ?></td>
                                <td class="text-center">
                                    <?php
                                    $data = json_decode($val->proses_produksi, true);

                                    // Get the kode_produksi array
                                    $kodeList = $data['dough_mixing']['kode_produksi'] ?? [];

                                    // Find the first non-empty kode produksi
                                    $firstKode = '';
                                    foreach ($kodeList as $kp) {
                                        if (!empty($kp)) {
                                            $firstKode = $kp;
                                            break;
                                        }
                                    }

                                    echo $firstKode ?: '-';
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('proses/packing/' . $val->uuid); ?>" class="btn btn-primary btn-icon-split">
                                        <span class="text">Finish Product</span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('proses/edit/' . $val->uuid); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Update</span>
                                    </a>
                                    <a href="<?= base_url('proses/detail/' . $val->uuid); ?>" class="btn btn-success btn-icon-split">
                                        <span class="text">Detail</span>
                                    </a>
                                    <a href="<?= base_url('proses/delete/' . $val->uuid); ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <span class="text">Delete</span>
                                    </a>
                                </td>

                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    th {
        background-color: #f8f9fc;
    }
</style>