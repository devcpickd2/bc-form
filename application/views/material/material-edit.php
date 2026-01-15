<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update List Raw Material Bread Crumb</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('material')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar List Raw Material Bread Crumb</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('material/edit/'.$material->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Nama Material</label>
                            <input type="text" name="material" class="form-control <?= form_error('material') ? 'invalid' : '' ?> " value="<?= $material->material; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('material')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('material') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Berat</label>
                            <input type="text" name="berat" class="form-control <?= form_error('berat') ? 'invalid' : '' ?> " value="<?= $material->berat; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('berat')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('berat') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('material')?>" class="btn btn-md btn-danger">
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
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>