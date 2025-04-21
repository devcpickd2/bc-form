<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('favicon.ico');?>" type="image/x-icon">

    <title>Login to E-BC</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css');?>">
    <style type="text/css">
        .login-container{
            position: relative;
            top: 40%;
            transform: 
            translateY(-50%);
        }
        .login-form:before{
            content: '';
            width: 1px; 
            height: 100%;
            background-color: #4B0082;
            position: absolute; 
            left: 0; 
            top: 0;
        }
        @media (max-width: 992px){
            .login-form:before{
                display: none;
            }
            .logo-mobile{
                display: block!important;
                width: 50px; 
                margin: 0 auto 20px auto;
            }
        }
        #bg-animate {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: none; /* Pastikan background tidak mengganggu */
            z-index: -1; /* Pastikan elemen tidak berada di atas konten lain */
        }

        #bg-animate canvas{
            width: 100%!important;
            height: 100%!important;
        }
    </style>
</head>

<body class="bg-gradient-danger">

    <div id="bg-animate"></div>

    <div class="container login-container">

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card o-hidden shadow-lg border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-700 mb-4">E-Form Bread Crumb<br></h1>
                                        <?php if($this->session->flashdata('error_msg')): ?>
                                            <div class="alert alert-danger">
                                                <?= $this->session->flashdata('error_msg') ?>
                                            </div>
                                            <br>
                                        <?php endif ?>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user <?= form_error('username') ? 'invalid' : '' ?>" value="<?= set_value('username'); ?>"
                                            placeholder="Enter Username...">
                                            <div class="invalid-feedback <?= !empty(form_error('username')) ? 'd-block':'';?>">
                                                <?= form_error('username') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user <?= form_error('password') ? 'invalid' : '' ?>" value="<?= set_value('password'); ?>" placeholder="Password">
                                            <div class="invalid-feedback <?= !empty(form_error('password')) ? 'd-block':'';?>">
                                                <?= form_error('password') ?>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-facebook btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanta/0.5.21/vanta.rings.min.js"></script>



<script>
// Jika ada instansi Vanta sebelumnya
    if (window.vantaEffect) {
        window.vantaEffect.destroy();
    }

// Inisialisasi background baru
    VANTA.RINGS({
        el: "#bg-animate",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00
    });

</script>

</body>

</html>

<style>
    .btn{
        background-color:   #2F4F4F; 
        color: white;             
        border: none;              
        padding: 10px 20px;        
        font-size: 16px;          
        cursor: pointer;          
    }

    .btn:hover {
        background-color:   #696969; 
        color: white;              
    }
    .card {
        background-color: #D3D3D3;
        opacity: 0.9;
    }
</style>

