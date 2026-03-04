<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit List Kebersihan Ruang</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="post" action="<?= base_url('list_kebersihan/edit/'.$list_kebersihan->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="font-weight-bold">Area</label>
                        <input type="text"
                        name="area"
                        class="form-control <?= form_error('area') ? 'is-invalid' : '' ?>"
                        value="<?= set_value('area', $list_kebersihan->area); ?>">

                        <div class="invalid-feedback">
                            <?= form_error('area'); ?>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="font-weight-bold">Bagian</label>

                        <div id="bagian-wrapper">
                            <?php
                            $old_bagian = set_value('bagian[]');
                            $data_bagian = !empty($old_bagian)
                            ? $this->input->post('bagian')
                            : $bagian;
                            ?>

                            <?php if(!empty($data_bagian)) : ?>
                                <?php foreach($data_bagian as $b) : ?>
                                    <div class="input-group mb-2">
                                        <input type="text"
                                        name="bagian[]"
                                        class="form-control"
                                        value="<?= $b; ?>">

                                        <div class="input-group-append">
                                            <button type="button"
                                            class="btn btn-danger remove-bagian">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="input-group mb-2">
                                <input type="text"
                                name="bagian[]"
                                class="form-control">

                                <div class="input-group-append">
                                    <button type="button"
                                    class="btn btn-danger remove-bagian">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="button"
                id="add-bagian"
                class="btn btn-primary btn-sm mt-2">
                <i class="fa fa-plus"></i> Tambah Bagian
            </button>

        </div>

    </div>

    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i> Update
    </button>

    <a href="<?= base_url('list_kebersihan'); ?>"
     class="btn btn-danger">
     Batal
 </a>

</form>
</div>
</div>
</div>

</div>

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

            let allInput = document.querySelectorAll('#bagian-wrapper .input-group');

        // Minimal 1 bagian harus ada
            if(allInput.length > 1){
                e.target.closest('.input-group').remove();
            } else {
                alert('Minimal 1 bagian harus ada');
            }
        }
    });
</script>