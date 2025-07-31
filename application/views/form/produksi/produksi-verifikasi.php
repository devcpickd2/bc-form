<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Verifikasi Proses Produksi</h1>
    </div>

    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
        <br>
    <?php endif ?> 

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="<?= base_url('produksi/cetak') ?>" method="post" id="form_cetak_pdf">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">
                                    <i class="fas fa-print fa-lg"></i>
                                </th>
                                <th width="20px" class="text-center">No</th>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>Types of Product</th>
                                <th>Production Code</th>
                                <th>Last Updated</th>
                                <th>Last Verified</th>
                                <th>SPV</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($produksi as $val) {
                                $datetime = new datetime($val->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="checkbox[]" value="<?= $val->uuid ?>" class="select_row"></td>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $datetime; ?></td> 
                                    <td><?= $val->shift; ?></td>
                                    <td><?= $val->nama_produk; ?></td>
                                    <td><?= $val->kode_produksi; ?></td>
                                    <td><?= date('H:i - d m Y', strtotime($val->modified_at)); ?></td>
                                    <td><?= date('H:i - d m Y', strtotime($val->tgl_update)); ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($val->status_spv == 0) {
                                            echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                        } elseif ($val->status_spv == 1) {
                                            echo '<span style="color: #28b463; font-weight: bold;">Verified</span>';
                                        } elseif ($val->status_spv == 2) {
                                            echo '<span style="color: red; font-weight: bold;">Revision</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('produksi/status/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                            <span class="text">Verifikasi</span>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="checkbox[]" id="selected_items">
                </form>
            </div>

            <br>
            <hr>

            <div class="card shadow mb-4">
                <div class="card-header bg-info text-white">
                    <h6 class="m-0 font-weight-bold">Pilih Data untuk Dicetak</h6>
                </div>
                <div class="card-body">
                    <!-- Baris 1: Tombol Cetak PDF -->
                    <div class="row mb-4">
                        <div class="col">
                            <form id="form_cetak_pdf" action="<?= base_url('produksi/cetak_pdf') ?>" method="post">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-file-pdf"></i> Cetak PDF
                                </button>
                                <label style="color: red; font-style: italic;">*Pilih checkbox untuk cetak pdf</label>
                            </form>
                        </div>
                    </div>

                    <!-- Baris 2: Form Export Excel -->
                    <form action="<?= base_url('produksi/export_excel') ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="tanggal"><strong>Pilih Tanggal:</strong></label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nama_produk"><strong>Pilih Produk:</strong></label>
                                <select name="nama_produk" id="nama_produk" class="form-control" required>
                                    <option value="">-- Pilih Produk --</option>
                                </select>
                            </div>

                            <div class="form-group align-self-end">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-file-excel"></i> Export Excel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
</div>

<script>
    document.getElementById('select_all').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('.select_row');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = this.checked;
        });
    });

    document.getElementById('form_cetak_pdf').addEventListener('submit', function(event) {
        var selectedCheckboxes = document.querySelectorAll('.select_row:checked');
        var selectedItems = [];

        selectedCheckboxes.forEach(function(checkbox) {
            selectedItems.push(checkbox.value); 
        });
        if (selectedItems.length === 0) {
            event.preventDefault(); 
            alert("Silakan pilih data yang ingin dicetak.");
            return;
        }
        document.getElementById('selected_items').value = selectedItems.join(',');
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tanggal').on('change', function() {
            var tanggal = $(this).val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url("produksi/get_produk_by_tanggal") ?>',
                data: { tanggal: tanggal },
                dataType: 'json',
                success: function(data) {
                    $('#nama_produk').empty();
                    $('#nama_produk').append('<option value="">-- Pilih Produk --</option>');
                    $.each(data, function(i, item) {
                        $('#nama_produk').append('<option value="'+item.nama_produk+'">'+item.nama_produk+'</option>');
                    });
                },
                error: function() {
                    alert('Gagal mengambil data produk.');
                }
            });
        });
    });
</script>

<style> 
    th {
        background-color: #f8f9fc;
    }
</style>
