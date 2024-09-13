<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class tes_json extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		//kauth
		if (!$this->kauth->getInstance()->hasIdentity()) {
			// trow to unauthenticated page!
			// redirect('login');
		}



        $this->SERVICES_ID_ACCESS = $this->kauth->getInstance()->getIdentity()->SERVICES_ID_ACCESS;
        $this->SERVICES_KODE_ACCESS = $this->kauth->getInstance()->getIdentity()->SERVICES_KODE_ACCESS;

	}



	function json()
	{
		$i = 0;
		$arr_json[$i]['kode']	= "ADM_AKUNTANSI";
		$arr_json[$i]['nama']	= "Admin Akuntansi";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Tanaman";
		$i++;
		$arr_json[$i]['kode']	= "ADM_BAHAN_OLAHAN";
		$arr_json[$i]['nama']	= "Admin Bahan Olahan";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Quality Assurance";
		$i++;
		$arr_json[$i]['kode']	= "ADM_GUDANG";
		$arr_json[$i]['nama']	= "Admin Gudang";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Keuangan";
		$i++;
		$arr_json[$i]['kode']	= "ADM_AKUNTANSI";
		$arr_json[$i]['nama']	= "Admin Akuntansi";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Tanaman";
		$i++;
		$arr_json[$i]['kode']	= "ADM_BAHAN_OLAHAN";
		$arr_json[$i]['nama']	= "Admin Bahan Olahan";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Quality Assurance";
		$i++;
		$arr_json[$i]['kode']	= "ADM_GUDANG";
		$arr_json[$i]['nama']	= "Admin Gudang";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Keuangan";
		$i++;
		$arr_json[$i]['kode']	= "ADM_AKUNTANSI";
		$arr_json[$i]['nama']	= "Admin Akuntansi";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Tanaman";
		$i++;
		$arr_json[$i]['kode']	= "ADM_BAHAN_OLAHAN";
		$arr_json[$i]['nama']	= "Admin Bahan Olahan";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Quality Assurance";
		$i++;
		$arr_json[$i]['kode']	= "ADM_GUDANG";
		$arr_json[$i]['nama']	= "Admin Gudang";
		$arr_json[$i]['level']	= "5";
		$arr_json[$i]['fungsi']	= "Keuangan";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_fungsi()
	{
		$i = 0;
		$arr_json[$i]['kode']	= "KEU";
		$arr_json[$i]['nama']	= "Keuangan";
		$arr_json[$i]['alias']	= "KU";
		$i++;
		$arr_json[$i]['kode']	= "TAN";
		$arr_json[$i]['nama']	= "Tanaman";
		$arr_json[$i]['alias']	= "TA";
		$i++;
		$arr_json[$i]['kode']	= "QUA";
		$arr_json[$i]['nama']	= "Quality Assurance";
		$arr_json[$i]['alias']	= "QA";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_sub_unit()
	{
		$i = 0;
		$arr_json[$i]['kode']	= "PK";
		$arr_json[$i]['nama']	= "Pabrik Karet";
		$arr_json[$i]['unit']	= "PABRIK";
		$arr_json[$i]['komoditi']= "KARET";
		$i++;
		$arr_json[$i]['kode']	= "KK";
		$arr_json[$i]['nama']	= "Kebun Karet";
		$arr_json[$i]['unit']	= "KEBUN";
		$arr_json[$i]['komoditi']= "KARET";
		$i++;
		$arr_json[$i]['kode']	= "PS";
		$arr_json[$i]['nama']	= "Pabrik Sawit";
		$arr_json[$i]['unit']	= "PABRIK";
		$arr_json[$i]['komoditi']= "SAWIT";
		$i++;
		$arr_json[$i]['kode']	= "PK";
		$arr_json[$i]['nama']	= "Pabrik Karet";
		$arr_json[$i]['unit']	= "PABRIK";
		$arr_json[$i]['komoditi']= "KARET";
		$i++;
		$arr_json[$i]['kode']	= "PK";
		$arr_json[$i]['nama']	= "Pabrik Karet";
		$arr_json[$i]['unit']	= "PABRIK";
		$arr_json[$i]['komoditi']= "KARET";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_unit()
	{
		$i = 0;
		$arr_json[$i]['kode']	= "DIS";
		$arr_json[$i]['nama']	= "Distrik";
		$arr_json[$i]['alias']	= "Distrik";
		$i++;
		$arr_json[$i]['kode']	= "PBRK";
		$arr_json[$i]['nama']	= "Pabrik";
		$arr_json[$i]['alias']	= "PB";
		$i++;
		$arr_json[$i]['kode']	= "KBUN";
		$arr_json[$i]['nama']	= "Kebun";
		$arr_json[$i]['alias']	= "KBN";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_komoditi()
	{
		$i = 0;
		$arr_json[$i]['kode']	= "KRT";
		$arr_json[$i]['nama']	= "Karet";
		$arr_json[$i]['alias']	= "KARET";
		$i++;
		$arr_json[$i]['kode']	= "SWT";
		$arr_json[$i]['nama']	= "Sawit";
		$arr_json[$i]['alias']	= "SWIT";
		$i++;
		$arr_json[$i]['kode']	= "TBU";
		$arr_json[$i]['nama']	= "Tebu";
		$arr_json[$i]['alias']	= "TB";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_sub_area()
	{
		$i = 0;
		$arr_json[$i]['kode']	= "AHO0";
		$arr_json[$i]['nama']	= "Kantor PTPN I";
		$arr_json[$i]['perusahaan']	= "PTPN I";
		$i++;
		$arr_json[$i]['kode']	= "AHO1";
		$arr_json[$i]['nama']	= "Kantor PTPN II";
		$arr_json[$i]['perusahaan']	= "PTPN II";
		$i++;
		$arr_json[$i]['kode']	= "AHO2";
		$arr_json[$i]['nama']	= "Kantor PTPN III";
		$arr_json[$i]['perusahaan']	= "PTPN III";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}


	function json_kpi()
	{
		$i = 0;
		$arr_json[$i]['kode']	= "KPI0001";
		$arr_json[$i]['kpi']	= "Pencatatan Transaksi secara akurat dan tepat";
		$arr_json[$i]['definisi']	= "Pencatatan Transaksi secara akurat dan tepat Pencatatan Transaksi secara akurat dan tepat";
		$arr_json[$i]['satuan']	= "index";
		$arr_json[$i]['formula']	= "SUM";
		$arr_json[$i]['frekuensi']	= "TRIWULAN";
		$arr_json[$i]['polaritas']	= "MAX";
		$i++;
		$arr_json[$i]['kode']	= "KPI0001";
		$arr_json[$i]['kpi']	= "Pencatatan Transaksi secara akurat dan tepat";
		$arr_json[$i]['definisi']	= "Pencatatan Transaksi secara akurat dan tepat Pencatatan Transaksi secara akurat dan tepat";
		$arr_json[$i]['satuan']	= "index";
		$arr_json[$i]['formula']	= "SUM";
		$arr_json[$i]['frekuensi']	= "TRIWULAN";
		$arr_json[$i]['polaritas']	= "MAX";
		$i++;
		$arr_json[$i]['kode']	= "KPI0001";
		$arr_json[$i]['kpi']	= "Pencatatan Transaksi secara akurat dan tepat";
		$arr_json[$i]['definisi']	= "Pencatatan Transaksi secara akurat dan tepat Pencatatan Transaksi secara akurat dan tepat";
		$arr_json[$i]['satuan']	= "index";
		$arr_json[$i]['formula']	= "SUM";
		$arr_json[$i]['frekuensi']	= "TRIWULAN";
		$arr_json[$i]['polaritas']	= "MAX";
		$i++;


		$data['data'] = $arr_json;
		echo json_encode($data);
	}


	function json_map_jab_sub_unit()
	{
		$i = 0;
		$arr_json[$i]['sub_unit']	= "Pabrik Karet";
		$arr_json[$i]['jumlah']		= "4";
		$i++;
		$arr_json[$i]['sub_unit']	= "Pabrik Karet";
		$arr_json[$i]['jumlah']		= "4";
		$i++;
		$arr_json[$i]['sub_unit']	= "Pabrik Karet";
		$arr_json[$i]['jumlah']		= "4";
		$i++;
		$arr_json[$i]['sub_unit']	= "Pabrik Karet";
		$arr_json[$i]['jumlah']		= "4";
		$i++;
		$arr_json[$i]['sub_unit']	= "Pabrik Karet";
		$arr_json[$i]['jumlah']		= "4";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_map_kpi_jab()
	{
		$i = 0;
		$arr_json[$i]['jabatan']	= "Admin Akuntansi";
		$arr_json[$i]['jumlah']		= "3";
		$i++;
		$arr_json[$i]['jabatan']	= "Admin Bahan Olahan";
		$arr_json[$i]['jumlah']		= "3";
		$i++;
		$arr_json[$i]['jabatan']	= "Admin Gudang";
		$arr_json[$i]['jumlah']		= "3";
		$i++;
		$arr_json[$i]['jabatan']	= "Admin Kebun";
		$arr_json[$i]['jumlah']		= "3";
		$i++;
		$arr_json[$i]['jabatan']	= "Admin Keuangan";
		$arr_json[$i]['jumlah']		= "3";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_status_bawahan()
	{
		$i = 0;
		$arr_json[$i]['jabatan']	= "Admin Gudang";
		$arr_json[$i]['sub_unit']	= "Kebun Karet";
		$arr_json[$i]['status_bawahan']	= "Tidak Punya";
		$arr_json[$i]['jumlah']		= "0";
		$i++;
		$arr_json[$i]['jabatan']	= "Admin Gudang";
		$arr_json[$i]['sub_unit']	= "Pabrik Karet";
		$arr_json[$i]['status_bawahan']	= "Punya";
		$arr_json[$i]['jumlah']		= "3";
		$i++;
		$arr_json[$i]['jabatan']	= "Admin Gudang";
		$arr_json[$i]['sub_unit']	= "Pabrik Karet";
		$arr_json[$i]['status_bawahan']	= "Tidak Punya";
		$arr_json[$i]['jumlah']		= "0";
		$i++;
		$arr_json[$i]['jabatan']	= "Admin Gudang";
		$arr_json[$i]['sub_unit']	= "Pabrik Karet";
		$arr_json[$i]['status_bawahan']	= "Tidak Punya";
		$arr_json[$i]['jumlah']		= "0";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_jabatan_karyawan()
	{
		$i = 0;
		$arr_json[$i]['perusahaan']	= "N001";
		$arr_json[$i]['nik']		= "1000001";
		$arr_json[$i]['nama']		= "Amat Hairin";
		$arr_json[$i]['unit_kerja']	= "Kb Tulungsari";
		$arr_json[$i]['posisi']		= "Mandor Panen";
		$arr_json[$i]['jabatan']	= "-";
		$i++;
		$arr_json[$i]['perusahaan']	= "N001";
		$arr_json[$i]['nik']		= "1000001";
		$arr_json[$i]['nama']		= "Amat Hairin";
		$arr_json[$i]['unit_kerja']	= "Kb Tulungsari";
		$arr_json[$i]['posisi']		= "Mandor Panen";
		$arr_json[$i]['jabatan']	= "-";
		$i++;
		$arr_json[$i]['perusahaan']	= "N001";
		$arr_json[$i]['nik']		= "1000001";
		$arr_json[$i]['nama']		= "Amat Hairin";
		$arr_json[$i]['unit_kerja']	= "Kb Tulungsari";
		$arr_json[$i]['posisi']		= "Mandor Panen";
		$arr_json[$i]['jabatan']	= "-";
		$i++;
		$arr_json[$i]['perusahaan']	= "N001";
		$arr_json[$i]['nik']		= "1000001";
		$arr_json[$i]['nama']		= "Amat Hairin";
		$arr_json[$i]['unit_kerja']	= "Kb Tulungsari";
		$arr_json[$i]['posisi']		= "Mandor Panen";
		$arr_json[$i]['jabatan']	= "-";
		$i++;


		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_buka_tutup()
	{
		$i = 0;
		$arr_json[$i]['unit']		= "Pabrik Karet";
		$arr_json[$i]['status']		= "Buka";
		$arr_json[$i]['tgl_mulai']	= "02-07-2021";
		$arr_json[$i]['tgl_selesai']= "12-07-2021";
		$i++;
		$arr_json[$i]['unit']		= "Kebun Karet";
		$arr_json[$i]['status']		= "Buka";
		$arr_json[$i]['tgl_mulai']	= "02-07-2021";
		$arr_json[$i]['tgl_selesai']= "12-07-2021";
		$i++;
		$arr_json[$i]['unit']		= "Pabrik Karet";
		$arr_json[$i]['status']		= "Tutup";
		$arr_json[$i]['tgl_mulai']	= "02-07-2021";
		$arr_json[$i]['tgl_selesai']= "12-07-2021";
		$i++;
		$arr_json[$i]['unit']		= "Pabrik Karet";
		$arr_json[$i]['status']		= "Tutup";
		$arr_json[$i]['tgl_mulai']	= "02-07-2021";
		$arr_json[$i]['tgl_selesai']= "12-07-2021";
		$i++;
		$arr_json[$i]['unit']		= "Pabrik Karet";
		$arr_json[$i]['status']		= "Buka";
		$arr_json[$i]['tgl_mulai']	= "02-07-2021";
		$arr_json[$i]['tgl_selesai']= "12-07-2021";
		$i++;

		$data['data'] = $arr_json;
		echo json_encode($data);
	}

	function json_jabatan_sub_unit()
	{
		$i = 0;
		$arr_json[$i]['kode']	= "ADM_AKUNTANSI";
		$arr_json[$i]['nama']	= "Admin Akuntansi";
		$arr_json[$i]['level']	= "5";
		$i++;
		$arr_json[$i]['kode']	= "ADM_BAHAN_OLAHAN";
		$arr_json[$i]['nama']	= "Admin Bahan Olahan";
		$arr_json[$i]['level']	= "5";
		$i++;
		$arr_json[$i]['kode']	= "ADM_GUDANG";
		$arr_json[$i]['nama']	= "Admin Gudang";
		$arr_json[$i]['level']	= "5";
		$i++;
		$arr_json[$i]['kode']	= "ADM_AKUNTANSI";
		$arr_json[$i]['nama']	= "Admin Akuntansi";
		$arr_json[$i]['level']	= "5";
		$i++;


		$data['data'] = $arr_json;
		echo json_encode($data);
	}
}
