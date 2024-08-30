<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Post Mortem</h1>
        <a href="<?= base_url('post-mortem/tambah')?>" class="btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Pemeriksaan</a>
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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="form-group" id="cpi">
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Truk</th>
                            <th>Nopol Truk</th>
                            <th>Date</th>
                            <th>Ekspedisi</th>
                            <th>Nama Farm</th>
                            <th>CH / OH</th>
                            <th>Waktu</th>
                            <th>Shift</th>
                            <th>Ayam di Proses (ekor)</th>
                            <th>Farm Average (kg)</th>
                            <th>RPA Average (kg)</th>
                            <th>Nama Mesin</th>
                            <!-- <th>QC</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($post_mortem as $val) {
                            $datetime = new datetime($val->date);
                            $datetime = $datetime->format('d-m-Y');

                            $waktu = substr($val->waktu_kedatangan, 0,5);
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $val->nomor_truk; ?></td>
                                <td><?= $val->nopol_truk; ?></td>
                                <td><?= $datetime; ?></td>
                                <td><?= $val->ekspedisi; ?></td>
                                <td><?= $val->nama_farm; ?></td>
                                <td>
                                    <?php
                                    if ($val->ch_oh == 0) {
                                        echo "CH";
                                    } elseif ($val->ch_oh == 1) {
                                        echo "OH";
                                    }
                                    ?>
                                </td>
                                <td><?= $waktu; ?></td>
                                <td><?= $val->shift; ?></td>
                                <td><?= $val->jumlah_ayam; ?></td>
                                <td><?= $val->average_farm; ?></td>
                                <td><?= $val->average_rpa; ?></td>
                                <td><?= $val->nama_mesin; ?></td>
                                <!-- <td><?= $val->username; ?></td> -->
                                <td class="text-center">
                                    <a href="<?= base_url('post-mortem/edit/'.$val->uuid);?>" class="btn btn-primary btn-icon-split">
                                        <span class="text">Update</span>
                                    </a>
<!--                                     <a href="<?= base_url('post-mortem/tunggal/'.$val->uuid);?>" class="btn btn-success btn-icon-split">
                                        <span class="text">Input Defect</span>
                                    </a> -->
                                    <a href="<?= base_url('post-mortem/cetak/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Pdf</span>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
</div>
</div>