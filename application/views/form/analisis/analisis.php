<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Permohonan Analisis Sampel Laboratorium</h1>
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
                <a href="<?= base_url('analisis/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Tipe Sampel</th>
                            <th>Penyimpanan</th>
                            <th>Nama Produk</th>
                            <th>Kode Produksi / Best Before</th>
                            <th>Permintaan Analisis</th>
                            <th>Produksi</th>
                            <th>Supervisor</th>
                            <th>LAB</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        function tampilkan_analisis($kode) {
                            $map = [
                                '1' => 'Moisture',
                                '2' => 'Salinity',
                                '3' => 'pH',
                                '4' => 'Bulk Density',
                                '5' => 'TPC',
                                '6' => 'Enterobacter',
                                '7' => 'Salmonella',
                                '8' => 'Yeast and Mold',
                            ];
                            return $map[$kode] ?? $kode;
                        }

                        $no = 1;
                        foreach($analisis as $val):
                            $datetime = new DateTime($val->date);
                            $datetime = $datetime->format('d-m-Y');
                            $bb = new DateTime($val->best_before);
                            $bb = $bb->format('d-m-Y');
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $datetime; ?></td>
                                <td><?= htmlspecialchars($val->tipe_sampel); ?></td>
                                <td><?= htmlspecialchars($val->penyimpanan); ?></td>
                                <td><?= htmlspecialchars($val->nama_produk); ?></td>
                                <td><?= htmlspecialchars($val->kode_produksi) . " / " . $bb; ?></td>
                                <td>
                                    <?php
                                    $nilai = explode(',', $val->analisis);
                                    $hasil = array_map('tampilkan_analisis', array_map('trim', $nilai));
                                    echo htmlspecialchars(implode(', ', $hasil));
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($val->status_produksi == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($val->status_produksi == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                    } elseif ($val->status_produksi == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                    }
                                    ?>
                                </td>
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
                                    <?php
                                    if ($val->status_lab == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($val->status_lab == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Accepted</span>';
                                    } elseif ($val->status_lab == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Returned</span>';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('analisis/edit/'.$val->uuid);?>" class="btn btn-warning btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                    <a href="<?= base_url('analisis/analis/'.$val->uuid);?>" class="btn btn-danger btn-sm me-1 rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Analisis">
                                        <i class="fas fa-flask fa-lg"></i>
                                    </a>
                                    <button 
                                    class="btn btn-success btn-sm me-1 rounded-circle shadow btn-detail" 
                                    data-uuid="<?= $val->uuid ?>"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class="fas fa-info-circle fa-lg"></i>
                                </button>
                                <a href="<?= base_url('analisis/delete/'.$val->uuid);?>" class="btn btn-danger btn-sm me-1 rounded-circle shadow" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                   <i class="fas fa-trash fa-lg"></i>
                               </a>
                           </td>
                       </tr>
                       <?php 
                       $no++;
                   endforeach; 
                   ?>
               </tbody>
           </table>

           <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

           <script>
            $(document).ready(function() {
                $('.btn-detail').click(function() {
                    var uuid = $(this).data('uuid');
                    var modal = new bootstrap.Modal(document.getElementById('detailModal'));
                    $('#detailModalBody').html(`
                        <div class="text-center">
                            <div class="spinner-border" role="status"></div>
                                <span> Loading...</span>
                        </div>
                    `);
                    modal.show();
                    $.ajax({
                        url: "<?= base_url('analisis/ajax-detail/') ?>" + uuid,
                        type: "GET",
                        success: function(response) {
                            $('#detailModalBody').html(response);
                        },
                        error: function() {
                            $('#detailModalBody').html('<div class="alert alert-danger">Gagal memuat detail.</div>');
                        }
                    });
                });
            });
        </script>

    </div>
</div>
</div>
</div>
</div>
<!-- Modal Detail Analisis -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Permohonan Analisis Sampel Laboratorium</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body" id="detailModalBody">
        <div class="text-center">
          <div class="spinner-border" role="status"></div>
          <span> Loading...</span>
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
