<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Defect Tunggal</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('post-mortem')?>">
                    <i class="fas fa-arrow-left">
                    </i>Daftar Post Mortem</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Defect Tunggal</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('post-mortem/detail/'.$post_mortem->uuid);?>">
                    <div class="table-responsive">                        
                        <table class="table" id="mytable">
                            <label>Identitas</label>
                            <hr>
                            <thead>
                                <?php 
                                $datetime = new datetime($post_mortem->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th colspan="2">Tanggal : <?= $datetime ?></th>
                                    <th>Shift : <?= $post_mortem->shift ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="18%">Waktu Kedatangan</td>
                                    <td width="10px">:</td>
                                    <td><?= $post_mortem->waktu_kedatangan; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Truk</td>
                                    <td>:</td>
                                    <td><?= $post_mortem->nomor_truk ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Farm</td>
                                    <td>:</td>
                                    <td><?= $post_mortem->nama_farm ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Ayam</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="jumlah_ayam" class="form-control <?= form_error('jumlah_ayam') ? 'invalid' : '' ?> " value="<?= $post_mortem->jumlah_ayam; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Average Farm</td>
                                        <td>:</td>
                                        <td><?= $post_mortem->average_farm ?></td>
                                    </tr>
                                    <tr>
                                        <td>Average RPA</td>
                                        <td>:</td>
                                        <td><?= $post_mortem->average_rpa ?></td>
                                    </tr>
                                </tbody> 
                            </table>  
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-md btn-success mr-2">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('post-mortem')?>" class="btn btn-md btn-danger">
                                    <i class="fa fa-times"></i> Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>