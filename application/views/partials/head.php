<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets\img\favicon.ico');?>" type="image/x-icon">
    <title>E-BC</title>
    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
    <!-- Custom styles for this page -->
    <!-- Bootstrap 4 Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Tempus Dominus Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css');?>">
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home');?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bread-slice"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BREAD CRUMB</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item <?= $active_nav == 'home' ?'active':'';?>">
                <a class="nav-link" href="<?= base_url('home');?>">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">Master</div>
            <li class="nav-item <?= $active_nav == 'data_master' | $active_nav == 'pegawai' | $active_nav == 'departemen' | $active_nav == 'plant'?'active':'';?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster"
                aria-expanded="true" aria-controls="collapseDataMaster">
                <i class="fas fa-briefcase"></i>
                <span>Data Master</span>
            </a>

            <div id="collapseDataMaster" class="collapse <?= $active_nav == 'pegawai' | $active_nav == 'departemen' | $active_nav == 'plant' ?'show':'';?>" aria-labelledby="headingDataMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= $active_nav == 'pegawai' ?'active':'';?>" href="<?= base_url('pegawai')?>">Pegawai</a>
                    <a class="collapse-item <?= $active_nav == 'departemen' ?'active':'';?>" href="<?= base_url('departemen')?>">Departemen</a>
                    <a class="collapse-item <?= $active_nav == 'plant' ?'active':'';?>" href="<?= base_url('plant')?>">Plant</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">Online Form</div>
        <li class="nav-item <?= $active_nav == 'form_qc' | $active_nav == 'pengayakan' | $active_nav == 'produksi' | $active_nav == 'metal' |  $active_nav == 'falserejection' |  $active_nav == 'kontaminasi' |  $active_nav == 'kekuatanmagnet' |  $active_nav == 'verifikasimagnet' |  $active_nav == 'thermometer' |  $active_nav == 'timbangan' |  $active_nav == 'releasepacking' |  $active_nav == 'pengemasan' ? 'active' : ''; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQC1"
            aria-expanded="true" aria-controls="collapseQC1">
            <i class="fas fa-file"></i>
            <span>Form QC</span>
        </a>
        <div id="collapseQC1" class="collapse <?= $active_nav == 'pengayakan' | $active_nav == 'produksi' | $active_nav == 'metal' |  $active_nav == 'falserejection' | $active_nav == 'kontaminasi' |  $active_nav == 'kekuatanmagnet' |  $active_nav == 'verifikasimagnet' |  $active_nav == 'thermometer' |  $active_nav == 'timbangan' |  $active_nav == 'releasepacking' |  $active_nav == 'pengemasan' ?'show':'';?>" aria-labelledby="headingQC" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $active_nav == 'pengayakan' ?'active':'';?>" href="<?= base_url('pengayakan')?>">Pengayakan</a>
                <a class="collapse-item <?= $active_nav == 'produksi' ?'active':'';?>" href="<?= base_url('produksi')?>">Verifikasi Produksi</a>
                <a class="collapse-item <?= $active_nav == 'metal' ?'active':'';?>" href="<?= base_url('metal')?>">Pemeriksaan Metal Detector</a>
                <a class="collapse-item <?= $active_nav == 'falserejection' ?'active':'';?>" href="<?= base_url('falserejection')?>">Monitoring False Rejection</a>
                <a class="collapse-item <?= $active_nav == 'kontaminasi' ?'active':'';?>" href="<?= base_url('kontaminasi')?>">Kontaminasi Benda Asing</a>
                <a class="collapse-item <?= $active_nav == 'kekuatanmagnet' ?'active':'';?>" href="<?= base_url('kekuatanmagnet')?>">Pemeriksaan Magnet Trap</a>
                <a class="collapse-item <?= $active_nav == 'verifikasimagnet' ?'active':'';?>" href="<?= base_url('verifikasimagnet')?>">Verifikasi Magnet Trap</a>
                <a class="collapse-item <?= $active_nav == 'thermometer' ?'active':'';?>" href="<?= base_url('thermometer')?>">Peneraan Thermometer</a>
                <a class="collapse-item <?= $active_nav == 'timbangan' ?'active':'';?>" href="<?= base_url('timbangan')?>">Pemeriksaan Timbangan</a>
                <a class="collapse-item <?= $active_nav == 'releasepacking' ?'active':'';?>" href="<?= base_url('releasepacking')?>">Release Packing</a>
                <a class="collapse-item <?= $active_nav == 'pengemasan' ?'active':'';?>" href="<?= base_url('pengemasan')?>">Pemeriksaan Proses Pengemasan</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Verifikasi</div>
    <li class="nav-item <?= ($active_nav == 'verifikasi' || $active_nav == 'verifikasi-pengayakan' || $active_nav == 'verifikasi-produksi' || $active_nav == 'verifikasi-metal' || $active_nav == 'verifikasi-falserejection' || $active_nav == 'verifikasi-kontaminasi' || $active_nav == 'verifikasi-kekuatanmagnet' || $active_nav == 'verifikasi-verifikasimagnet' || $active_nav == 'verifikasi-thermometer' || $active_nav == 'verifikasi-timbangan' || $active_nav == 'verifikasi-releasepacking' || $active_nav == 'verifikasi-pengemasan') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQC2" aria-expanded="true" aria-controls="collapseQC2">
            <i class="fas fa-clipboard-check"></i>
            <span>Verifikasi Supervisor</span>
        </a>
        <div id="collapseQC2" class="collapse <?= ($active_nav == 'verifikasi-pengayakan' || $active_nav == 'verifikasi-produksi' || $active_nav == 'verifikasi-metal' || $active_nav == 'verifikasi-falserejection' || $active_nav == 'verifikasi-kontaminasi' || $active_nav == 'verifikasi-kekuatanmagnet' || $active_nav == 'verifikasi-verifikasimagnet' || $active_nav == 'verifikasi-thermometer' || $active_nav == 'verifikasi-timbangan' || $active_nav == 'verifikasi-releasepacking' || $active_nav == 'verifikasi-pengemasan') ? 'show' : ''; ?>" aria-labelledby="headingQC" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $active_nav == 'verifikasi-pengayakan' ? 'active' : ''; ?>" href="<?= base_url('pengayakan/verifikasi')?>">Pengayakan</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-produksi' ? 'active' : ''; ?>" href="<?= base_url('produksi/verifikasi')?>">Verifikasi Produksi</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-metal' ? 'active' : ''; ?>" href="<?= base_url('metal/verifikasi')?>">Pemeriksaan Metal Detector</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-falserejection' ? 'active' : ''; ?>" href="<?= base_url('falserejection/verifikasi')?>">Monitoring False Rejection</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-kontaminasi' ? 'active' : ''; ?>" href="<?= base_url('kontaminasi/verifikasi')?>">Kontaminasi Benda Asing</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-kekuatanmagnet' ? 'active' : ''; ?>" href="<?= base_url('kekuatanmagnet/verifikasi')?>">Pemeriksaan Magnet Trap</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-verifikasimagnet' ? 'active' : ''; ?>" href="<?= base_url('verifikasimagnet/verifikasi')?>">Verifikasi Magnet Trap</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-thermometer' ? 'active' : ''; ?>" href="<?= base_url('thermometer/verifikasi')?>">Peneraan Thermometer</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-timbangan' ? 'active' : ''; ?>" href="<?= base_url('timbangan/verifikasi')?>">Pemeriksaan Timbangan</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-releasepacking' ? 'active' : ''; ?>" href="<?= base_url('releasepacking/verifikasi')?>">Release Packing</a>
                <a class="collapse-item <?= $active_nav == 'verifikasi-pengemasan' ? 'active' : ''; ?>" href="<?= base_url('pengemasan/verifikasi')?>">Pemeriksaan Proses Pengemasan</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Verifikasi</div>
    <li class="nav-item <?= ($active_nav == 'diketahui' || $active_nav == 'diketahui-pengayakan' || $active_nav == 'diketahui-produksi' || $active_nav == 'diketahui-metal' || $active_nav == 'diketahui-falserejection' || $active_nav == 'diketahui-kontaminasi' || $active_nav == 'diketahui-kekuatanmagnet' || $active_nav == 'diketahui-verifikasimagnet' || $active_nav == 'diketahui-thermometer' || $active_nav == 'diketahui-pengemasan') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQC3" aria-expanded="true" aria-controls="collapseQC3">
            <i class="fas fa-clipboard-check"></i>
            <span>Verifikasi Produksi</span>
        </a>
        <div id="collapseQC3" class="collapse <?= ($active_nav == 'diketahui-pengayakan' || $active_nav == 'diketahui-produksi' || $active_nav == 'diketahui-metal' || $active_nav == 'diketahui-falserejection' || $active_nav == 'diketahui-kontaminasi' || $active_nav == 'diketahui-kekuatanmagnet' || $active_nav == 'diketahui-verifikasimagnet' || $active_nav == 'diketahui-thermometer' || $active_nav == 'diketahui-pengemasan') ? 'show' : ''; ?>" aria-labelledby="headingQC" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $active_nav == 'diketahui-pengayakan' ? 'active' : ''; ?>" href="<?= base_url('pengayakan/diketahui')?>">Pengayakan</a>
                <a class="collapse-item <?= $active_nav == 'diketahui-produksi' ? 'active' : ''; ?>" href="<?= base_url('produksi/diketahui')?>">Verifikasi Produksi</a>
                <a class="collapse-item <?= $active_nav == 'diketahui-metal' ? 'active' : ''; ?>" href="<?= base_url('metal/diketahui')?>">Pemeriksaan Metal Detector</a>
                <a class="collapse-item <?= $active_nav == 'diketahui-falserejection' ? 'active' : ''; ?>" href="<?= base_url('falserejection/diketahui')?>">Monitoring False Rejection</a>
                <a class="collapse-item <?= $active_nav == 'diketahui-kontaminasi' ? 'active' : ''; ?>" href="<?= base_url('kontaminasi/diketahui')?>">Kontaminasi Benda Asing</a>
                <a class="collapse-item <?= $active_nav == 'diketahui-kekuatanmagnet' ? 'active' : ''; ?>" href="<?= base_url('kekuatanmagnet/diketahui')?>">Pemeriksaan Magnet Trap</a>
                <a class="collapse-item <?= $active_nav == 'diketahui-verifikasimagnet' ? 'active' : ''; ?>" href="<?= base_url('verifikasimagnet/diketahui')?>">Verifikasi Magnet Trap</a>
                <!-- <a class="collapse-item <?= $active_nav == 'diketahui-thermometer' ? 'active' : ''; ?>" href="<?= base_url('thermometer/diketahui')?>">Peneraan Thermometer</a> -->
                <!-- <a class="collapse-item <?= $active_nav == 'diketahui-timbangan' ? 'active' : ''; ?>" href="<?= base_url('timbangan/diketahui')?>">Peneraan Thermometer</a> -->
                <a class="collapse-item <?= $active_nav == 'diketahui-pengemasan' ? 'active' : ''; ?>" href="<?= base_url('pengemasan/diketahui')?>">Pemeriksaan Proses Pengemasan</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-l Iight bg-white topbar mb-4 static-top shadow">
         <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <div class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 nama-pt">
            <strong>PT. Charoen Pokphand Indonesia - Food Division ( Cikande 2 )</strong>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-dark small text-capitalize">Hi, <?= $this->session->userdata('username');?></span>
                    <i class="fa fa-user-circle fa-2x text-dark" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('logout');?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Logout</i>
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <style type="text/css">
        #wrapper {
            background-color: #2E86C1;
        }
        .mr-2 {
            font-size: 18px;
            font-weight: bold;
        } 
    </style>
