<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth/login';
$route['login'] = 'auth/login';
$route['home'] = 'home';

// $route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['departemen'] = 'departemen';
$route['departemen/tambah'] = 'departemen/tambah';
$route['departemen/edit/(:any)'] = 'departemen/edit/$1';

$route['plant'] = 'plant';
$route['plant/tambah'] = 'plant/tambah';
$route['plant/edit/(:any)'] = 'plant/edit/$1';

$route['pegawai'] = 'pegawai';
$route['pegawai/tambah'] = 'pegawai/tambah';
$route['pegawai/edit/(:any)'] = 'pegawai/edit/$1';
$route['pegawai/edituser/(:any)'] = 'pegawai/edituser/$1';
$route['pegawai/editpass/(:any)'] = 'pegawai/editpass/$1';

$route['pengayakan'] = 'form/pengayakan';
$route['pengayakan/tambah'] = 'form/pengayakan/tambah';
$route['pengayakan/edit/(:any)'] = 'form/pengayakan/edit/$1';
$route['pengayakan/detail/(:any)'] = 'form/pengayakan/detail/$1';
$route['pengayakan/verifikasi'] = 'form/pengayakan/verifikasi';
$route['pengayakan/status/(:any)'] = 'form/pengayakan/status/$1';
$route['pengayakan/cetak'] = 'form/pengayakan/cetak';
$route['pengayakan/diketahui'] = 'form/pengayakan/diketahui';
$route['pengayakan/statusprod/(:any)'] = 'form/pengayakan/statusprod/$1';

$route['produksi'] = 'form/produksi';
$route['produksi/tambah'] = 'form/produksi/tambah';
$route['produksi/detail/(:any)'] = 'form/produksi/detail/$1';
$route['produksi/edit/(:any)'] = 'form/produksi/edit/$1';
$route['produksi/cetak'] = 'form/produksi/cetak';
$route['produksi/bahan/(:any)'] = 'form/produksi/bahan/$1';
$route['produksi/mixing/(:any)'] = 'form/produksi/mixing/$1';
$route['produksi/fermentasi/(:any)'] = 'form/produksi/fermentasi/$1';
$route['produksi/stalling/(:any)'] = 'form/produksi/stalling/$1';
$route['produksi/drying/(:any)'] = 'form/produksi/drying/$1';
$route['produksi/packing/(:any)'] = 'form/produksi/packing/$1';
$route['produksi/verifikasi'] = 'form/produksi/verifikasi';
$route['produksi/status/(:any)'] = 'form/produksi/status/$1';
$route['produksi/diketahui'] = 'form/produksi/diketahui';
$route['produksi/statusprod/(:any)'] = 'form/produksi/statusprod/$1';
$route['remove-premix'] = 'form/removePremix';

$route['metal'] = 'form/metal';
$route['metal/tambah'] = 'form/metal/tambah';
$route['metal/detail/(:any)'] = 'form/metal/detail/$1';
$route['metal/edit/(:any)'] = 'form/metal/edit/$1';
$route['metal/verifikasi'] = 'form/metal/verifikasi';
$route['metal/status/(:any)'] = 'form/metal/status/$1';
$route['metal/cetak'] = 'form/metal/cetak';
$route['metal/diketahui'] = 'form/metal/diketahui';
$route['metal/statusprod/(:any)'] = 'form/metal/statusprod/$1';

$route['falserejection'] = 'form/falserejection';
$route['falserejection/tambah'] = 'form/falserejection/tambah';
$route['falserejection/detail/(:any)'] = 'form/falserejection/detail/$1';
$route['falserejection/edit/(:any)'] = 'form/falserejection/edit/$1';
$route['falserejection/verifikasi'] = 'form/falserejection/verifikasi';
$route['falserejection/status/(:any)'] = 'form/falserejection/status/$1';
$route['falserejection/cetak'] = 'form/falserejection/cetak';
$route['falserejection/diketahui'] = 'form/falserejection/diketahui';
$route['falserejection/statusprod/(:any)'] = 'form/falserejection/statusprod/$1';

$route['kontaminasi'] = 'form/kontaminasi';
$route['kontaminasi/tambah'] = 'form/kontaminasi/tambah';
$route['kontaminasi/detail/(:any)'] = 'form/kontaminasi/detail/$1';
$route['kontaminasi/edit/(:any)'] = 'form/kontaminasi/edit/$1';
$route['kontaminasi/verifikasi'] = 'form/kontaminasi/verifikasi';
$route['kontaminasi/status/(:any)'] = 'form/kontaminasi/status/$1';
$route['kontaminasi/cetak'] = 'form/kontaminasi/cetak';
$route['kontaminasi/diketahui'] = 'form/kontaminasi/diketahui';
$route['kontaminasi/statusprod/(:any)'] = 'form/kontaminasi/statusprod/$1';

$route['kekuatanmagnet'] = 'form/kekuatanmagnet';
$route['kekuatanmagnet/tambah'] = 'form/kekuatanmagnet/tambah';
$route['kekuatanmagnet/detail/(:any)'] = 'form/kekuatanmagnet/detail/$1';
$route['kekuatanmagnet/edit/(:any)'] = 'form/kekuatanmagnet/edit/$1';
$route['kekuatanmagnet/verifikasi'] = 'form/kekuatanmagnet/verifikasi';
$route['kekuatanmagnet/status/(:any)'] = 'form/kekuatanmagnet/status/$1';
$route['kekuatanmagnet/cetak'] = 'form/kekuatanmagnet/cetak';
$route['kekuatanmagnet/diketahui'] = 'form/kekuatanmagnet/diketahui';
$route['kekuatanmagnet/statusprod/(:any)'] = 'form/kekuatanmagnet/statusprod/$1';

$route['verifikasimagnet'] = 'form/verifikasimagnet';
$route['verifikasimagnet/tambah'] = 'form/verifikasimagnet/tambah';
$route['verifikasimagnet/detail/(:any)'] = 'form/verifikasimagnet/detail/$1';
$route['verifikasimagnet/edit/(:any)'] = 'form/verifikasimagnet/edit/$1';
$route['verifikasimagnet/verifikasi'] = 'form/verifikasimagnet/verifikasi';
$route['verifikasimagnet/status/(:any)'] = 'form/verifikasimagnet/status/$1';
$route['verifikasimagnet/cetak'] = 'form/verifikasimagnet/cetak';
$route['verifikasimagnet/diketahui'] = 'form/verifikasimagnet/diketahui';
$route['verifikasimagnet/statusprod/(:any)'] = 'form/verifikasimagnet/statusprod/$1';

$route['thermometer'] = 'form/thermometer';
$route['thermometer/tambah'] = 'form/thermometer/tambah';
$route['thermometer/detail/(:any)'] = 'form/thermometer/detail/$1';
$route['thermometer/edit/(:any)'] = 'form/thermometer/edit/$1';
$route['thermometer/verifikasi'] = 'form/thermometer/verifikasi';
$route['thermometer/status/(:any)'] = 'form/thermometer/status/$1';
$route['thermometer/cetak'] = 'form/thermometer/cetak';
$route['thermometer/diketahui'] = 'form/thermometer/diketahui';
$route['thermometer/statusprod/(:any)'] = 'form/thermometer/statusprod/$1';

$route['timbangan'] = 'form/timbangan';
$route['timbangan/tambah'] = 'form/timbangan/tambah';
$route['timbangan/detail/(:any)'] = 'form/timbangan/detail/$1';
$route['timbangan/edit/(:any)'] = 'form/timbangan/edit/$1';
$route['timbangan/verifikasi'] = 'form/timbangan/verifikasi';
$route['timbangan/status/(:any)'] = 'form/timbangan/status/$1';
$route['timbangan/cetak'] = 'form/timbangan/cetak';
$route['timbangan/diketahui'] = 'form/timbangan/diketahui';
$route['timbangan/statusprod/(:any)'] = 'form/timbangan/statusprod/$1';

$route['releasepacking'] = 'form/releasepacking';
$route['releasepacking/tambah'] = 'form/releasepacking/tambah';
$route['releasepacking/detail/(:any)'] = 'form/releasepacking/detail/$1';
$route['releasepacking/edit/(:any)'] = 'form/releasepacking/edit/$1';
$route['releasepacking/verifikasi'] = 'form/releasepacking/verifikasi';
$route['releasepacking/status/(:any)'] = 'form/releasepacking/status/$1';
$route['releasepacking/cetak'] = 'form/releasepacking/cetak';
$route['releasepacking/diketahui'] = 'form/releasepacking/diketahui';
$route['releasepacking/statusprod/(:any)'] = 'form/releasepacking/statusprod/$1';

$route['pengemasan'] = 'form/pengemasan';
$route['pengemasan/tambah'] = 'form/pengemasan/tambah';
$route['pengemasan/detail/(:any)'] = 'form/pengemasan/detail/$1';
$route['pengemasan/edit/(:any)'] = 'form/pengemasan/edit/$1';
$route['pengemasan/verifikasi'] = 'form/pengemasan/verifikasi';
$route['pengemasan/status/(:any)'] = 'form/pengemasan/status/$1';
$route['pengemasan/cetak'] = 'form/pengemasan/cetak';
$route['pengemasan/diketahui'] = 'form/pengemasan/diketahui';
$route['pengemasan/statusprod/(:any)'] = 'form/pengemasan/statusprod/$1';