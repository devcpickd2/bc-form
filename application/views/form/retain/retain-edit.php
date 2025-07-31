<!-- FILE: retain_edit.php -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Retain Sample Report</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('retain') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Retain Sample Report</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('retain/edit/' . $retain->uuid); ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control" value="<?= date('Y-m-d', strtotime($retain->date)) ?>">
                        </div>
                        <?php 
                        $plant_map = [
                            '651ac623-5e48-44cc-b2f6-5d622603f53c' => 'Bread Crumb Cikande',
                            '1eb341e0-1ec4-4484-ba8f-32d23352b84d' => 'Bread Crumb Salatiga'
                        ];

                        $plant_name = isset($plant_map[$retain->plant]) ? $plant_map[$retain->plant] : 'Unknown Plant';
                        ?>

                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Plant</label>
                            <input type="text" class="form-control" value="<?= $plant_name ?>" readonly>
                            <input type="hidden" name="plant" value="<?= $retain->plant ?>">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Sample Type</label>
                            <input type="text" name="sample_type" class="form-control" value="<?= $retain->sample_type ?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Sample Storage</label>
                            <select name="sample_storage" class="form-control">
                                <option value="Dry" <?= $retain->sample_storage == 'Dry' ? 'selected' : '' ?>>Dry</option>
                                <option value="Other" <?= $retain->sample_storage == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label class="form-label font-weight-bold">Deskripsi Produk</label>
                        <div id="description-group">
                            <?php
                            $deskripsiIndex = 0;
                            $descList = json_decode($retain->description, true);
                            foreach ($descList as $desc) {
                                ?>
                                <div class="row mb-2 description-entry">
                                    <div class="col-md-2">
                                        <label>Nama Produk</label>
                                        <input type="text" name="description[<?= $deskripsiIndex ?>][nama_produk]" class="form-control" value="<?= $desc['nama_produk'] ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Kode Produksi</label>
                                        <input type="text" name="description[<?= $deskripsiIndex ?>][kode_produksi]" class="form-control" value="<?= $desc['kode_produksi'] ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Best Before</label>
                                        <input type="date" name="description[<?= $deskripsiIndex ?>][best_before]" class="form-control" value="<?= $desc['best_before'] ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Quantity (g)</label>
                                        <input type="text" name="description[<?= $deskripsiIndex ?>][quantity]" class="form-control" value="<?= $desc['quantity'] ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Remarks</label>
                                        <input type="text" name="description[<?= $deskripsiIndex ?>][remarks]" class="form-control" value="<?= $desc['remarks'] ?>">
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-description" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php $deskripsiIndex++;
                            } ?>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm mt-2" id="add-description">
                            <i class="fa fa-plus"></i> Tambah Deskripsi
                        </button>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"><?= $retain->catatan ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success mr-2">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="<?= base_url('retain') ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let deskripsiIndex = <?= $deskripsiIndex ?>;

    document.getElementById('add-description').addEventListener('click', function () {
        const container = document.getElementById('description-group');

        const newEntry = document.createElement('div');
        newEntry.classList.add('row', 'mb-2', 'description-entry');
        newEntry.innerHTML = `
            <div class="col-md-2">
                <input type="text" name="description[${deskripsiIndex}][nama_produk]" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" name="description[${deskripsiIndex}][kode_produksi]" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="date" name="description[${deskripsiIndex}][best_before]" class="form-control" value="<?= date('Y-m-d', strtotime('+1 year')) ?>">
            </div>
            <div class="col-md-2">
                <input type="text" name="description[${deskripsiIndex}][quantity]" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="text" name="description[${deskripsiIndex}][remarks]" class="form-control">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-description" title="Hapus">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newEntry);
        deskripsiIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.closest('.remove-description')) {
            const entry = e.target.closest('.description-entry');
            entry.remove();
        }
    });
</script>
<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>