<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Daftar Verifikasi Penggunaan Reagen Klorin</h1>
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
            <div class="form-group text-right">
                <a href="<?= base_url('reagen/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th width="300" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $nama_bulan = [
                            1=>'Januari', 2=>'Februari', 3=>'Maret',
                            4=>'April', 5=>'Mei', 6=>'Juni',
                            7=>'Juli', 8=>'Agustus', 9=>'September',
                            10=>'Oktober', 11=>'November', 12=>'Desember'
                        ];
                        ?>

                        <?php foreach ($bulan_tahun as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $nama_bulan[$row->bulan] ?></td>
                                <td><?= $row->tahun ?></td>
                                <td class="text-center">

                                    <a href="<?= base_url('reagen/detail/'.$row->bulan.'/'.$row->tahun) ?>"
                                       class="btn btn-success btn-sm">
                                       Detail
                                   </a>

                                <!--    <a href="<?= base_url('reagen/edit_bulan/'.$row->bulan.'/'.$row->tahun) ?>"
                                       class="btn btn-warning btn-sm">
                                       Edit
                                   </a>

                                   <a href="<?= base_url('reagen/delete_bulan/'.$row->bulan.'/'.$row->tahun) ?>"
                                       onclick="return confirm('Yakin hapus semua data bulan ini?')"
                                       class="btn btn-danger btn-sm">
                                       Delete
                                   </a> -->

                               </td>
                           </tr>
                       <?php endforeach ?>
                   </tbody>
               </table>
           </div>
       </div>
   </div>
</div>
</div>

