<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah List Kebersihan Ruang</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('list_kebersihan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar List Kebersihan Ruang</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('list_kebersihan/tambah');?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Area</label>
                            <input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?> " value="<?= set_value('area'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('area')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('area') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Bagian</label>
                            <div id="bagian-wrapper">
                                <div class="input-group mb-2">
                                    <input type="text" name="bagian[]" class="form-control">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger remove-bagian">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="add-bagian" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Tambah Bagian
                            </button>
                            <div class="invalid-feedback <?= !empty(form_error('bagian')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('bagian') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('list_kebersihan')?>" class="btn btn-md btn-danger">
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

<script>
    document.getElementById('add-bagian').addEventListener('click', function () {
        let wrapper = document.getElementById('bagian-wrapper');

        let div = document.createElement('div');
        div.classList.add('input-group', 'mb-2');

        div.innerHTML = `
        <input type="text" name="bagian[]" class="form-control">
        <div class="input-group-append">
            <button type="button" class="btn btn-danger remove-bagian">
                <i class="fa fa-minus"></i>
            </button>
        </div>
        `;

        wrapper.appendChild(div);
    });

    document.addEventListener('click', function(e){
        if(e.target.closest('.remove-bagian')){
            e.target.closest('.input-group').remove();
        }
    });
</script>