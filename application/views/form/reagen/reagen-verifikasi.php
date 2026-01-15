<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Verifikasi Penggunaan Reagen Klorin</h1>

    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center"><?= $this->session->flashdata('success_msg') ?></div>
    <?php endif ?>

    <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center"><?= $this->session->flashdata('error_msg') ?></div>
    <?php endif ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $nama_bulan = [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'];
                        foreach($bulan_tahun as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $nama_bulan[$row->bulan] ?></td>
                                <td><?= $row->tahun ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('reagen/status/'.$row->bulan.'/'.$row->tahun) ?>" class="btn btn-info btn-sm">Detail</a>

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#verifikasiModal" data-bulan="<?= $row->bulan ?>" data-tahun="<?= $row->tahun ?>">Verifikasi</button>

                                    <a href="<?= base_url('reagen/cetak/'.$row->bulan.'/'.$row->tahun) ?>" class="btn btn-danger btn-sm">PDF</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal konfirmasi verifikasi -->
<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="verifikasiForm" method="post" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Verifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Apakah yakin ingin verifikasi semua data bulan <span id="modalBulan"></span> tahun <span id="modalTahun"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ya, Verifikasi</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    $('#verifikasiModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var bulan = button.data('bulan');
        var tahun = button.data('tahun');
        var modal = $(this);
        modal.find('#modalBulan').text(bulan);
        modal.find('#modalTahun').text(tahun);
        modal.find('#verifikasiForm').attr('action', '<?= base_url("reagen/verifikasi/") ?>' + bulan + '/' + tahun);
    });
</script>
