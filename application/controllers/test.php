<?php 
public function export_excel() {
	if ($this->input->server('REQUEST_METHOD') === 'POST') {
		$today = $this->input->post('today'); 

		if ($today) {
			$data['post_mortem'] = $this->post_mortem_model->get_pm($today);
				// var_dump($data);
				// exit();

			if (!empty($data['post_mortem'])) {
				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$sheet->setCellValue('A1', 'Laporan RPA Post Mortem')->getStyle('A1')->getFont()->setBold(true)->setSize(16);
				$sheet->setCellValue('A2', 'PT . Charoen Pokphand Indonesia - Food Division')->getStyle('A2')->getFont()->setSize(16);
				$sheet->setCellValue('A3', 'Banyumas - Jawa Tengah')->getStyle('A3')->getFont()->setSize(11);

				$sheet->mergeCells('B5:H5');
				$sheet->setCellValue('B5', 'Identitas')->getStyle('B5')->getFont()->setBold(true);
				$sheet->mergeCells('B6:B8');
				$sheet->getStyle('B6:B8')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('B6', 'No Truck');
				$sheet->mergeCells('C6:C8');
				$sheet->getStyle('C6:C8')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('C6', 'Nama Farm');
				$sheet->mergeCells('D6:D8');
				$sheet->getStyle('D6:D8')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('D6', 'CH / OH');
				$sheet->mergeCells('E6:E8');
				$sheet->getStyle('E6:E8')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('E6', 'Waktu');
				$sheet->mergeCells('F6:F8');
				$sheet->getStyle('F6:F8')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('F6', 'Ayam di Proses');
				$sheet->mergeCells('G6:G8');
				$sheet->getStyle('G6:G8')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('G6', 'Average Farm (Kg/Ekor)');
				$sheet->mergeCells('H6:H8');
				$sheet->getStyle('H6:H8')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('H6', 'Average RPA (Kg/Ekor)');

				$sheet->mergeCells('I5:AN5');
				$sheet->setCellValue('I5', 'Kondisi Ayam dari Farm')->getStyle('I5')->getFont()->setBold(true);

				$sheet->mergeCells('I6:L6');
				$sheet->setCellValue('I6', 'Sayap');
				$sheet->mergeCells('I7:J7');
				$sheet->setCellValue('I7', 'Memar Kebiruan');
				$sheet->setCellValue('I8', 'Defect');
				$sheet->setCellValue('J8', '%');
				$sheet->mergeCells('K7:L7');
				$sheet->setCellValue('K7', 'Patah Memar');
				$sheet->setCellValue('K8', 'Defect');
				$sheet->setCellValue('L8', '%');

				$sheet->mergeCells('M6:V6');
				$sheet->setCellValue('M6', 'Kaki');
				$sheet->mergeCells('M7:N7');
				$sheet->setCellValue('M7', 'Memar Kebiruan');
				$sheet->setCellValue('M8', 'Defect');
				$sheet->setCellValue('N8', '%');
				$sheet->mergeCells('O7:P7');
				$sheet->setCellValue('O7', 'Patah Memar');
				$sheet->setCellValue('O8', 'Defect');
				$sheet->setCellValue('P8', '%');
				$sheet->mergeCells('Q7:R7');
				$sheet->setCellValue('Q7', 'Arthritis');
				$sheet->setCellValue('Q8', 'Defect');
				$sheet->setCellValue('R8', '%');
				$sheet->mergeCells('Q7:R7');
				$sheet->setCellValue('Q7', 'Arthritis');
				$sheet->setCellValue('Q8', 'Defect');
				$sheet->setCellValue('R8', '%');
				$sheet->mergeCells('S7:T7');
				$sheet->setCellValue('S7', 'Hock Bruise');
				$sheet->setCellValue('S8', 'Defect');
				$sheet->setCellValue('T8', '%');
				$sheet->mergeCells('U7:V7');
				$sheet->setCellValue('U7', 'Hock Burn');
				$sheet->setCellValue('U8', 'Defect');
				$sheet->setCellValue('V8', '%');

				$sheet->mergeCells('W6:Z6');
				$sheet->setCellValue('W6', 'Dada');
				$sheet->mergeCells('W7:X7');
				$sheet->setCellValue('W7', 'Memar Kebiruan');
				$sheet->setCellValue('W8', 'Defect');
				$sheet->setCellValue('X8', '%');
				$sheet->mergeCells('Y7:Z7');
				$sheet->setCellValue('Y7', 'Breast Burn');
				$sheet->setCellValue('Y8', 'Defect');
				$sheet->setCellValue('Z8', '%');

				$sheet->mergeCells('AA6:AB7');
				$sheet->getStyle('AA6:AB7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('AA6', 'Punggung Memar Kebiruan');
				$sheet->setCellValue('AA8', 'Defect');
				$sheet->setCellValue('AB8', '%');
				$sheet->mergeCells('AC6:AD7');
				$sheet->getStyle('AC6:AD7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('AC6', 'Luka Parut');
				$sheet->setCellValue('AC8', 'Defect');
				$sheet->setCellValue('AD8', '%');
				$sheet->mergeCells('AE6:AF7');
				$sheet->getStyle('AE6:AF7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('AE6', 'Kulit Berjamur');
				$sheet->setCellValue('AE8', 'Defect');
				$sheet->setCellValue('AF8', '%');
				$sheet->mergeCells('AG6:AH7');
				$sheet->getStyle('AG6:AH7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('AG6', 'Penyakit Bisul');
				$sheet->setCellValue('AG8', 'Defect');
				$sheet->setCellValue('AH8', '%');
				$sheet->mergeCells('AI6:AJ7');
				$sheet->getStyle('AI6:AJ7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('AI6', 'Kulit & Daging Merah Tua/ada Bintik Merah Darah');
				$sheet->setCellValue('AI8', 'Defect');
				$sheet->setCellValue('AJ8', '%');
				$sheet->mergeCells('AK6:AL7');
				$sheet->getStyle('AK6:AL7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('AK6', 'Pertumbuhan / Fisik tidak Normal');
				$sheet->setCellValue('AK8', 'Defect');
				$sheet->setCellValue('AL8', '%');
				$sheet->mergeCells('AM6:AN7');
				$sheet->getStyle('AM6:AN7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('AM6', 'Sub Total Defect');
				$sheet->setCellValue('AM8', 'Defect');
				$sheet->setCellValue('AN8', '%');

				$sheet->mergeCells('AO5:BL5');
				$sheet->setCellValue('AO5', 'Kondisi Ayam Akibat Proses RPA')->getStyle('AU5')->getFont()->setBold(true);
				$sheet->mergeCells('AO6:AZ6');
				$sheet->setCellValue('AO6', 'Karena Mesin Auto-Evisceration');
				$sheet->mergeCells('AO7:AP7');
				$sheet->setCellValue('AO7', 'Kulit Sobek Dada');
				$sheet->setCellValue('AO8', 'Defect');
				$sheet->setCellValue('AP8', '%');
				$sheet->mergeCells('AQ7:AR7');
				$sheet->setCellValue('AQ7', 'Kulit Sobek Paha');
				$sheet->setCellValue('AQ8', 'Defect');
				$sheet->setCellValue('AR8', '%');
				$sheet->mergeCells('AS7:AT7');
				$sheet->setCellValue('AS7', 'Karkas Rusak');
				$sheet->setCellValue('AS8', 'Defect');
				$sheet->setCellValue('AT8', '%');
				$sheet->mergeCells('AU7:AV7');
				$sheet->setCellValue('AU7', 'Empedu Pecah');
				$sheet->setCellValue('AU8', 'Defect');
				$sheet->setCellValue('AV8', '%');
				$sheet->mergeCells('AW7:AX7');
				$sheet->setCellValue('AW7', 'Daging Dada Bawah Terpotong');
				$sheet->setCellValue('AW8', 'Defect');
				$sheet->setCellValue('AX8', '%');
				$sheet->mergeCells('AY7:AZ7');
				$sheet->setCellValue('AY7', 'Daging Dada Atas Terpotong');
				$sheet->setCellValue('AY8', 'Defect');
				$sheet->setCellValue('AZ8', '%');

				$sheet->mergeCells('BA6:BD6');
				$sheet->setCellValue('BA6', 'Karena Mesin Plucker');
				$sheet->mergeCells('BA7:BB7');
				$sheet->setCellValue('BA7', 'Sayap Patah Tanpa Memar');
				$sheet->setCellValue('BA8', 'Defect');
				$sheet->setCellValue('BB8', '%');
				$sheet->mergeCells('BC7:BD7');
				$sheet->setCellValue('BC7', 'Kulit Sobek Dada - Paha');
				$sheet->setCellValue('BC8', 'Defect');
				$sheet->setCellValue('BD8', '%');

				$sheet->mergeCells('BE6:BF7');
				$sheet->getStyle('BE6:BF7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BE6', 'Over Scalder');
				$sheet->setCellValue('BE8', 'Defect');
				$sheet->setCellValue('BF8', '%');
				$sheet->mergeCells('BG6:BH7');
				$sheet->getStyle('BG6:BH7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BG6', 'Kaki Patah Tanpa Memar');
				$sheet->setCellValue('BG8', 'Defect');
				$sheet->setCellValue('BH8', '%');
				$sheet->mergeCells('BI6:BJ6');
				$sheet->setCellValue('BI6', 'Karena Leg Cutter');
				$sheet->mergeCells('BI7:BJ7');
				$sheet->setCellValue('BI7', 'Kaki Terpotong');
				$sheet->setCellValue('BI8', 'Defect');
				$sheet->setCellValue('BJ8', '%');
				$sheet->mergeCells('BK6:BL7');
				$sheet->getStyle('BK6:BL7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BK6', 'Sub Total Defect');
				$sheet->setCellValue('BK8', 'Defect');
				$sheet->setCellValue('BL8', '%');
				$sheet->mergeCells('BM5:BN7');
				$sheet->getStyle('BM5:BN7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BM5', 'Total Defect');
				$sheet->setCellValue('BM8', 'Defect');
				$sheet->setCellValue('BN8', '%');

				$sheet->mergeCells('BP5:BS5');
				$sheet->setCellValue('BP5', 'Ayam Defect')->getStyle('BP5')->getFont()->setBold(true);
				$sheet->mergeCells('BP6:BQ7');
				$sheet->getStyle('BP6:BQ7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BP6', 'Ayam Defect');
				$sheet->setCellValue('BP8', 'Defect');
				$sheet->setCellValue('BQ8', '%');
				$sheet->mergeCells('BR6:BS7');
				$sheet->getStyle('BR6:BS7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BR6', 'Defect > 1');
				$sheet->setCellValue('BR8', 'Defect');
				$sheet->setCellValue('BS8', '%');
				$sheet->mergeCells('BT5:BU7');
				$sheet->getStyle('BT5:BU7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BT5', 'Total Ayam Defect');
				$sheet->setCellValue('BT8', 'Ayam Defect');
				$sheet->setCellValue('BU8', '%');

				$sheet->mergeCells('BW5:CF5');
				$sheet->setCellValue('BW5', 'Defect Handling Farm - RPHU')->getStyle('CC5')->getFont()->setBold(true);
				$sheet->mergeCells('BW6:BX7');
				$sheet->getStyle('BW6:BX7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BW6', 'Sayap Memar Kemerahan');
				$sheet->setCellValue('BW8', 'Defect');
				$sheet->setCellValue('BX8', '%');
				$sheet->mergeCells('BY6:BZ7');
				$sheet->getStyle('BY6:BZ7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('BY6', 'Kaki Memar Kemerahan');
				$sheet->setCellValue('BY8', 'Defect');
				$sheet->setCellValue('BZ8', '%');
				$sheet->mergeCells('CA6:CB7');
				$sheet->getStyle('CA6:CB7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('CA6', 'Dada Memar Kemerahan');
				$sheet->setCellValue('CA8', 'Defect');
				$sheet->setCellValue('CB8', '%');
				$sheet->mergeCells('CC6:CD7');
				$sheet->getStyle('CC6:CD7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('CC6', 'Punggung Memar Kemerahan');
				$sheet->setCellValue('CC8', 'Defect');
				$sheet->setCellValue('CD8', '%');
				$sheet->mergeCells('CE6:CF7');
				$sheet->getStyle('CE6:CF7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('CE6', 'Sub Total Defect');
				$sheet->setCellValue('CE8', 'Defect');
				$sheet->setCellValue('CF8', '%');

				$sheet->mergeCells('CH5:CS5');
				$sheet->setCellValue('CH5', 'Reject Hati Sortir Post Mortem')->getStyle('CH5')->getFont()->setBold(true);
				$sheet->mergeCells('CH6:CK6');
				$sheet->setCellValue('CH6', 'Hancur');
				$sheet->mergeCells('CH7:CI7');
				$sheet->setCellValue('CH7', 'Ringan');
				$sheet->setCellValue('CH8', 'Defect');
				$sheet->setCellValue('CI8', '%');
				$sheet->mergeCells('CJ7:CK7');
				$sheet->setCellValue('CJ7', 'Berat');
				$sheet->setCellValue('CJ8', 'Ayam Defect');
				$sheet->setCellValue('CK8', '%');
				$sheet->mergeCells('CL6:CM7');
				$sheet->getStyle('CL6:CM7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('CL6', 'Hati Tidak Normal / Berpenyakit');
				$sheet->setCellValue('CL8', 'Defect');
				$sheet->setCellValue('CM8', '%');
				$sheet->mergeCells('CN6:CO7');
				$sheet->getStyle('CN6:CO7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('CN6', 'Jantung Tdk Normal / Berpenyakit');
				$sheet->setCellValue('CN8', 'Defect');
				$sheet->setCellValue('CO8', '%');
				$sheet->mergeCells('CP6:CQ7');
				$sheet->getStyle('CP6:CQ7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('CP6', 'Organ Dalam Lain Tidak Normal');
				$sheet->setCellValue('CP8', 'Defect');
				$sheet->setCellValue('CQ8', '%');
				$sheet->mergeCells('CR6:CS7');
				$sheet->getStyle('CR6:CS7')->getAlignment()->setWrapText(true);
				$sheet->setCellValue('CR6', 'Sub Total Defect');
				$sheet->setCellValue('CR8', 'Defect');
				$sheet->setCellValue('CS8', '%');

					// Add data
				$row = 9; 
				foreach ($data['post_mortem'] as $val) {
					$sheet->setCellValue('B' . $row, $val->nomor_truk);
					$sheet->setCellValue('C' . $row, $val->nama_farm);
					if ($val->ch_oh == 0) {
						$ch_oh = "CH";
					} elseif ($val->ch_oh == 1) {
						$ch_oh = "OH";
					}
					$sheet->setCellValue('D' . $row, $ch_oh);
					$sheet->setCellValue('E' . $row, $val->waktu_kedatangan);
					$sheet->setCellValue('F' . $row, $val->jumlah_ayam);
					$sheet->setCellValue('G' . $row, $val->average_farm);
					$sheet->setCellValue('H' . $row, $val->average_rpa);
					$sheet->setCellValue('I' . $row, $val->sayap_memar_kebiruan_defect + $val->sayap_memar_kebiruan_defect_lebih);
					$sheet->setCellValue('J' . $row, (($val->sayap_memar_kebiruan_defect + $val->sayap_memar_kebiruan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('K' . $row, $val->sayap_patah_memar_defect + $val->sayap_patah_memar_defect_lebih);
					$sheet->setCellValue('L' . $row, (($val->sayap_patah_memar_defect + $val->sayap_patah_memar_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('M' . $row, $val->kaki_memar_defect + $val->kaki_memar_kebiruan_defect_lebih);
					$sheet->setCellValue('N' . $row, (($val->kaki_memar_defect + $val->kaki_memar_kebiruan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('O' . $row, $val->kaki_patah_defect + $val->kaki_patah_memar_defect_lebih);
					$sheet->setCellValue('P' . $row, (($val->kaki_patah_defect + $val->kaki_patah_memar_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('Q' . $row, $val->kaki_arthritis_defect + $val->arthritis_defect_lebih);
					$sheet->setCellValue('R' . $row, (($val->kaki_arthritis_defect + $val->arthritis_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('S' . $row, $val->hock_bruise_defect + $val->hock_bruise_defect_lebih);
					$sheet->setCellValue('T' . $row, (($val->hock_bruise_defect + $val->hock_bruise_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('U' . $row, $val->hock_burn_defect + $val->hock_burn_defect_lebih);
					$sheet->setCellValue('V' . $row, (($val->hock_burn_defect + $val->hock_burn_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('W' . $row, $val->dada_memar_defect + $val->dada_memar_kebiruan_defect_lebih);
					$sheet->setCellValue('X' . $row, (($val->dada_memar_defect + $val->dada_memar_kebiruan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('Y' . $row, $val->breast_burn_defect + $val->breast_burn_defect_lebih);
					$sheet->setCellValue('Z' . $row, (($val->breast_burn_defect + $val->breast_burn_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AA' . $row, $val->punggung_memar_defect + $val->punggung_memar_kebiruan_defect_lebih);
					$sheet->setCellValue('AB' . $row, (($val->punggung_memar_defect + $val->punggung_memar_kebiruan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AC' . $row, $val->luka_parut_defect + $val->luka_parut_defect_lebih);
					$sheet->setCellValue('AD' . $row, (($val->luka_parut_defect + $val->luka_parut_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AE' . $row, $val->kulit_berjamur_defect + $val->kulit_berjamur_defect_lebih);
					$sheet->setCellValue('AF' . $row, (($val->kulit_berjamur_defect + $val->kulit_berjamur_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AG' . $row, $val->penyakit_kulit_defect + $val->penyakit_bisul_defect_lebih);
					$sheet->setCellValue('AH' . $row, (($val->penyakit_kulit_defect + $val->penyakit_bisul_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AI' . $row, $val->kulit_daging_bintik_defect + $val->kulit_bintik_merah_defect_lebih);
					$sheet->setCellValue('AJ' . $row, (($val->kulit_daging_bintik_defect + $val->kulit_bintik_merah_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AK' . $row, $val->pertumbuhan_tidak_normal_defect + $val->pertumbuhan_tidak_normal_defect_lebih);
					$sheet->setCellValue('AL' . $row, (($val->pertumbuhan_tidak_normal_defect + $val->pertumbuhan_tidak_normal_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AM' . $row, $val->sub_total_farm_defect + $val->sayap_memar_kebiruan_defect_lebih + $val->sayap_patah_memar_defect_lebih + $val->kaki_memar_kebiruan_defect_lebih + $val->kaki_patah_memar_defect_lebih + $val->arthritis_defect_lebih + $val->hock_bruise_defect_lebih + $val->hock_burn_defect_lebih + $val->dada_memar_kebiruan_defect_lebih + $val->breast_burn_defect_lebih + $val->punggung_memar_kebiruan_defect_lebih + $val->luka_parut_defect_lebih + $val->kulit_berjamur_defect_lebih + $val->penyakit_bisul_defect_lebih + $val->kulit_bintik_merah_defect_lebih + $val->pertumbuhan_tidak_normal_defect_lebih);
					$sheet->setCellValue('AN' . $row, (($val->sub_total_farm_defect + $val->sayap_memar_kebiruan_defect_lebih + $val->sayap_patah_memar_defect_lebih + $val->kaki_memar_kebiruan_defect_lebih + $val->kaki_patah_memar_defect_lebih + $val->arthritis_defect_lebih + $val->hock_bruise_defect_lebih + $val->hock_burn_defect_lebih + $val->dada_memar_kebiruan_defect_lebih + $val->breast_burn_defect_lebih + $val->punggung_memar_kebiruan_defect_lebih + $val->luka_parut_defect_lebih + $val->kulit_berjamur_defect_lebih + $val->penyakit_bisul_defect_lebih + $val->kulit_bintik_merah_defect_lebih + $val->pertumbuhan_tidak_normal_defect_lebih) / $val->jumlah_ayam) * 100);
					$sheet->setCellValue('AO' . $row, $val->rpa_kulit_sobek_dada_defect + $val->rpa_kulit_sobek_dada_defect_lebih);
					$sheet->setCellValue('AP' . $row, (($val->rpa_kulit_sobek_dada_defect + $val->rpa_kulit_sobek_dada_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AQ' . $row, $val->rpa_kulit_sobek_paha_defect + $val->rpa_kulit_sobek_paha_defect_lebih);
					$sheet->setCellValue('AR' . $row, (($val->rpa_kulit_sobek_paha_defect + $val->rpa_kulit_sobek_paha_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AS' . $row, $val->rpa_karkas_rusak_defect + $val->rpa_karkas_rusak_defect_lebih);
					$sheet->setCellValue('AT' . $row, (($val->rpa_karkas_rusak_defect + $val->rpa_karkas_rusak_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AU' . $row, $val->rpa_empedu_pecah_defect + $val->rpa_empedu_pecah_defect_lebih);
					$sheet->setCellValue('AV' . $row, (($val->rpa_empedu_pecah_defect + $val->rpa_empedu_pecah_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AW' . $row, $val->rpa_daging_dada_bawah_cut_defect + $val->rpa_daging_dada_bawah_defect_lebih);
					$sheet->setCellValue('AX' . $row, (($val->rpa_daging_dada_bawah_cut_defect + $val->rpa_daging_dada_bawah_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('AY' . $row, $val->rpa_daging_dada_atas_cut_defect + $val->rpa_daging_dada_atas_defect_lebih);
					$sheet->setCellValue('AZ' . $row, (($val->rpa_daging_dada_atas_cut_defect + $val->rpa_daging_dada_atas_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BA' . $row, $val->rpa_sayap_patah_defect + $val->rpa_sayap_patah_defect_lebih);
					$sheet->setCellValue('BB' . $row, (($val->rpa_sayap_patah_defect + $val->rpa_sayap_patah_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BC' . $row, $val->rpa_kulit_sobek_dp_defect + $val->rpa_kulit_sobek_dp_defect_lebih);
					$sheet->setCellValue('BD' . $row, (($val->rpa_kulit_sobek_dp_defect + $val->rpa_kulit_sobek_dp_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BE' . $row, $val->rpa_over_scalder_defect + $val->rpa_over_scalder_defect_lebih);
					$sheet->setCellValue('BF' . $row, (($val->rpa_over_scalder_defect + $val->rpa_over_scalder_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BG' . $row, $val->rpa_kaki_patah_defect + $val->rpa_kaki_patah_defect_lebih);
					$sheet->setCellValue('BH' . $row, (($val->rpa_kaki_patah_defect + $val->rpa_kaki_patah_defect_lebih) /$val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BI' . $row, $val->rpa_kaki_terpotong_defect + $val->rpa_kaki_terpotong_defect_lebih);
					$sheet->setCellValue('BJ' . $row, (($val->rpa_kaki_terpotong_defect + $val->rpa_kaki_terpotong_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BK' . $row, $val->sub_total_rpa_defect + $val->rpa_kulit_sobek_dada_defect_lebih + $val->rpa_kulit_sobek_paha_defect_lebih + $val->rpa_karkas_rusak_defect_lebih + $val->rpa_empedu_pecah_defect_lebih + $val->rpa_daging_dada_bawah_defect_lebih + $val->rpa_daging_dada_atas_defect_lebih + $val->rpa_sayap_patah_defect_lebih + $val->rpa_kulit_sobek_dp_defect_lebih + $val->rpa_over_scalder_defect_lebih + $val->rpa_kaki_patah_defect_lebih + $val->rpa_kaki_terpotong_defect_lebih);
					$sheet->setCellValue('BL' . $row, (($val->sub_total_rpa_defect + $val->rpa_kulit_sobek_dada_defect_lebih + $val->rpa_kulit_sobek_paha_defect_lebih + $val->rpa_karkas_rusak_defect_lebih + $val->rpa_empedu_pecah_defect_lebih + $val->rpa_daging_dada_bawah_defect_lebih + $val->rpa_daging_dada_atas_defect_lebih + $val->rpa_sayap_patah_defect_lebih + $val->rpa_kulit_sobek_dp_defect_lebih + $val->rpa_over_scalder_defect_lebih + $val->rpa_kaki_patah_defect_lebih + $val->rpa_kaki_terpotong_defect_lebih) / $val->jumlah_ayam) * 100 );
						//////belum diupdate
					$sheet->setCellValue('BM' . $row, $val->sub_total_farm_defect + $val->sub_total_rpa_defect);
					$sheet->setCellValue('BN' . $row, (($val->sub_total_farm_defect + $val->sub_total_rpa_defect) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BP' . $row, $val->sub_total_farm_defect + $val->sub_total_sg_defect + $val->sub_total_rpa_defect);
					$sheet->setCellValue('BQ' . $row, (($val->sub_total_farm_defect + $val->sub_total_sg_defect + $val->sub_total_rpa_defect) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BR' . $row, $val->ayam_defect_lebih_dari_satu);
					$sheet->setCellValue('BS' . $row, (($val->ayam_defect_lebih_dari_satu) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BT' . $row, $val->total_ayam_defect);
					$sheet->setCellValue('BU' . $row, (($val->total_ayam_defect) / $val->jumlah_ayam) * 100);                                                                                                                
					$sheet->setCellValue('BW' . $row, $val->sg_sayap_memar_defect + $val->sg_sayap_memar_kemerahan_defect_lebih);
					$sheet->setCellValue('BX' . $row, (($val->sg_sayap_memar_defect + $val->sg_sayap_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('BY' . $row, $val->sg_kaki_memar_defect + $val->sg_kaki_memar_kemerahan_defect_lebih);
					$sheet->setCellValue('BZ' . $row, (($val->sg_kaki_memar_defect + $val->sg_kaki_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('CA' . $row, $val->sg_dada_memar_defect + $val->sg_dada_memar_kemerahan_defect_lebih);
					$sheet->setCellValue('CB' . $row, (($val->sg_dada_memar_defect + $val->sg_dada_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('CC' . $row, $val->sg_punggung_memar_defect + $val->sg_punggung_memar_kemerahan_defect_lebih);
					$sheet->setCellValue('CD' . $row, (($val->sg_punggung_memar_defect + $val->sg_punggung_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('CE' . $row, $val->sub_total_sg_defect + $val->sg_punggung_memar_kemerahan_defect_lebih + $val->sg_kaki_memar_kemerahan_defect_lebih + $val->sg_kaki_memar_kemerahan_defect_lebih + $val->sg_punggung_memar_kemerahan_defect_lebih);
					$sheet->setCellValue('CF' . $row, (($val->sub_total_sg_defect + $val->sg_punggung_memar_kemerahan_defect_lebih + $val->sg_kaki_memar_kemerahan_defect_lebih + $val->sg_kaki_memar_kemerahan_defect_lebih + $val->sg_punggung_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );
					$sheet->setCellValue('CH' . $row, $val->ip_hati_hancur_ringan_defect);
					$sheet->setCellValue('CI' . $row, $val->ip_hati_hancur_ringan_persen);
					$sheet->setCellValue('CJ' . $row, $val->ip_hati_hancur_berat_defect);
					$sheet->setCellValue('CK' . $row, $val->ip_hati_hancur_berat_persen);
					$sheet->setCellValue('CL' . $row, $val->hati_tidak_normal_defect);
					$sheet->setCellValue('CM' . $row, $val->hati_tidak_normal_persen);
					$sheet->setCellValue('CN' . $row, $val->jantung_tidak_normal_defect);
					$sheet->setCellValue('CO' . $row, $val->jantung_tidak_normal_persen);
					$sheet->setCellValue('CP' . $row, $val->organ_dalam_tidak_normal_defect);
					$sheet->setCellValue('CQ' . $row, $val->organ_dalam_tidak_normal_persen);
					$sheet->setCellValue('CR' . $row, $val->sub_total_ip_defect + $val->sub_total_ordal_farm_defect);
					$sheet->setCellValue('CS' . $row, (($val->sub_total_ip_defect + $val->sub_total_ordal_farm_defect) / $val->jumlah_ayam) * 100);

					$row++;
				}

				$lastColumnIndex = $sheet->getHighestColumn();
				$lastRowIndex = $sheet->getHighestRow();
				$range = 'B5:' . $lastColumnIndex . $lastRowIndex;

				$styleArray = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '000000'],
						],
					],
				];

				$sheet->getStyle('E:E')->getNumberFormat()->setFormatCode('HH:MM');
				$sheet->getStyle('B5:CS1000')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$sheet->getStyle('B5:CS8')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

				$sheet->getStyle($range)->applyFromArray($styleArray);
				$column = ['G', 'H', 'J', 'L', 'N', 'P', 'R', 'T', 'V', 'X', 'Z', 'AB', 'AD', 'AF', 'AH', 'AJ', 'AL', 'AN', 'AP', 'AR', 'AT', 'AV', 'AX', 'AZ', 'BB', 'BD', 'BF', 'BH', 'BJ', 'BL', 'BN', 'BQ', 'BS', 'BU', 'BX', 'BZ', 'CB', 'CD', 'CF', 'CI', 'CK', 'CM', 'CO', 'CQ', 'CS'];
				
				foreach ($column as $index) {
					$spreadsheet->getActiveSheet()->getStyle($index.'9:'.$index.'500')->getNumberFormat()->setFormatCode('0.00');
				}

				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename="post_mortem_report_' . $today . '.xls"');
				header('Cache-Control: max-age=0');

					// Save to file
				$writer = new Xls($spreadsheet);
				$writer->save('php://output');
				return; 
			}
		}
	}

	$data['active_nav'] = 'report-pm'; 
	$this->load->view('partials/head', $data);
	$this->load->view('report/report-pm');
	$this->load->view('partials/footer');
}
?>