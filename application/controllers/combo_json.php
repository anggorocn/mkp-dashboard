<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class combo_json extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		//kauth
		if (!$this->kauth->getInstance()->hasIdentity()) {
			// trow to unauthenticated page!
			redirect('login');
		}



        $this->SERVICES_ID_ACCESS = $this->kauth->getInstance()->getIdentity()->SERVICES_ID_ACCESS;
        $this->SERVICES_KODE_ACCESS = $this->kauth->getInstance()->getIdentity()->SERVICES_KODE_ACCESS;

	}



	function metode_jurnal_pembayaran()
	{
		$i = 0;
		$arr_json[$i]['id']		= "AUTO";
		$arr_json[$i]['text']	= "AUTO JURNAL";
		$i++;
		$arr_json[$i]['id']		= "MANUAL";
		$arr_json[$i]['text']	= "MANUAL";
		$i++;
		echo json_encode($arr_json);
	}



	function tipe_data()
	{
		$i = 0;
		$arr_json[$i]['id']		= "TEXT";
		$arr_json[$i]['text']	= "TEXT";
		$i++;
		$arr_json[$i]['id']		= "DATE";
		$arr_json[$i]['text']	= "DATE";
		$i++;
		$arr_json[$i]['id']		= "NUMBER";
		$arr_json[$i]['text']	= "NUMBER";
		$i++;
		echo json_encode($arr_json);
	}





	function jenis_transaksi()
	{
		$i = 0;
		$arr_json[$i]['id']		= "ACTIVITY";
		$arr_json[$i]['text']	= "ACTIVITY";
		$i++;
		$arr_json[$i]['id']		= "KERTAS KERJA";
		$arr_json[$i]['text']	= "KERTAS KERJA";
		$i++;
		echo json_encode($arr_json);
	}


	function status_aktif_deaktif()
	{
		$i = 0;
		$arr_json[$i]['id']		= "A";
		$arr_json[$i]['text']	= "AKTIF";
		$i++;
		$arr_json[$i]['id']		= "D";
		$arr_json[$i]['text']	= "NON-AKTIF";
		$i++;
		echo json_encode($arr_json);
	}


	function metode_pembayaran()
	{
		$i = 0;
		$arr_json[$i]['id']		= "KODE BAYAR";
		$arr_json[$i]['text']	= "KODE BAYAR";
		$i++;
		$arr_json[$i]['id']		= "VIRTUAL ACCOUNT";
		$arr_json[$i]['text']	= "VIRTUAL ACCOUNT";
		$i++;
		$arr_json[$i]['id']		= "AUTO COLLECTION";
		$arr_json[$i]['text']	= "AUTO COLLECTION";
		$i++;

		echo json_encode($arr_json);
	}



	function metode_pelunasan()
	{
		$i = 0;
		$arr_json[$i]['id']		= "FULL";
		$arr_json[$i]['text']	= "FULL";
		$i++;
		$arr_json[$i]['id']		= "DIPOTONG PPH23";
		$arr_json[$i]['text']	= "DIPOTONG PPH23";
		$i++;

		echo json_encode($arr_json);
	}


	function comboSatuan()
	{
		$i = 0;

		$this->load->model("Satuan");
		$satuan  = new Satuan();
		$satuan->selectByParamsMonitoring(array());
		while ($satuan->nextRow()) {
			$arr_json[$i]['id']		= $satuan->getField("NAME");
			$arr_json[$i]['text']	= $satuan->getField("NAME");
			$i++;
		}
		echo json_encode($arr_json);
	}


	function ambil_tahun()
	{
		$tahun = Date('Y');
		$i = 0;
		for ($j = 2017; $j <= $tahun; $j++) {
			$arr_json[$i]['id']		= $j;
			$arr_json[$i]['text']	= $j;
			$i++;
		}
		$arr_json[$i]['id']		= "All Year";
		$arr_json[$i]['text']	= "All Year";
		echo json_encode($arr_json);
	}

	function ComboBank()
	{
		$this->load->model("Bank");
		$bank = new Bank();
		$bank->selectByParamsMonitoring(array());
		$arr_json = array();
		$i = 0;
		while ($bank->nextRow()) {
			$arr_json[$i]['id']		= $bank->getField("BANK_PEMBAYARAN_ID");
			$arr_json[$i]['text']	= $bank->getField("NAMA");
			$arr_json[$i]['rekening']	= $bank->getField("KODE_REKENING");
			$i++;
		}
		echo json_encode($arr_json);
	}

	function comboValueDollar()
	{
		$i = 0;

		$arr_json[$i]['id']		= "USD";
		$arr_json[$i]['text']	= "USD";
		$i++;
		$arr_json[$i]['id']		= "IDR";
		$arr_json[$i]['text']	= "IDR";

		echo json_encode($arr_json);
	}
	function comboValueDollar2()
	{
		$i = 0;

		$arr_json[$i]['id']		= "0";
		$arr_json[$i]['text']	= "USD";
		$i++;
		$arr_json[$i]['id']		= "1";
		$arr_json[$i]['text']	= "IDR";

		echo json_encode($arr_json);
	}

	function comboEquipCategori()
	{
		$this->load->model('EquipCategory');
		$equip_category = new EquipCategory();
		$equip_category->selectByParamsMonitoring(array());
		$i = 0;
		while ($equip_category->nextRow()) {
			$arr_json[$i]['id']		= $equip_category->getField("EC_ID");
			$arr_json[$i]['text']	= strtoupper($equip_category->getField("EC_NAME"));
			$i++;
		}
		echo json_encode($arr_json);
	}

	function comboEquipmentCategori()
	{
		$this->load->model('EquipmentKategori');
		$equip_category = new EquipmentKategori();
		$equip_category->selectByParamsMonitoring(array());
		$i = 0;
		while ($equip_category->nextRow()) {
			$arr_json[$i]['id']		= $equip_category->getField("EQUIPMENT_KATEGORI_ID");
			$arr_json[$i]['text']	= strtoupper($equip_category->getField("NAMA"));
			$i++;
		}
		echo json_encode($arr_json);
	}
	function comboEquipList()
	{
		$this->load->model('EquipmentList');
		$equipment_list = new EquipmentList();
		$equipment_list->selectByParamsMonitoring(array());
		$i = 0;
		while ($equipment_list->nextRow()) {
			$arr_json[$i]['id']		= $equipment_list->getField("EQUIP_ID");
			$arr_json[$i]['text']	= strtoupper($equipment_list->getField("EQUIP_NAME"));
			$i++;
		}
		echo json_encode($arr_json);
	}


	function comboKategori()
	{
		$i = 0;
		$arr_json[$i]['id']		= "COMPANY";
		$arr_json[$i]['text']	= "COMPANY";
		$i++;
		$arr_json[$i]['id']		= "VESSEL";
		$arr_json[$i]['text']	= "VESSEL";

		echo json_encode($arr_json);
	}

	function comboJenisAplikasi()
	{
		$i = 0;
		$arr_json[$i]['id']		= "URL";
		$arr_json[$i]['text']	= "URL";
		$i++;
		$arr_json[$i]['id']		= "MOBILEAPP";
		$arr_json[$i]['text']	= "MOBILEAPP";

		echo json_encode($arr_json);
	}


	function status()
	{
		$i = 0;
		$arr_json[$i]['id']		= "0";
		$arr_json[$i]['text']	= "Pending";
		$i++;
		$arr_json[$i]['id']		= "1";
		$arr_json[$i]['text']	= "Realisasi";
		$i++;
		$arr_json[$i]['id']		= "2";
		$arr_json[$i]['text']	= "Cancel";

		echo json_encode($arr_json);
	}


	function aduan()
	{
		$i = 0;
		$arr_json[$i]['id']		= "BELUM";
		$arr_json[$i]['text']	= "BELUM DIBALAS";
		$i++;
		$arr_json[$i]['id']		= "SUDAH";
		$arr_json[$i]['text']	= "SUDAH DIBALAS";
		$i++;
		$arr_json[$i]['id']		= "SEMUA";
		$arr_json[$i]['text']	= "SEMUA";

		echo json_encode($arr_json);
	}

	function personil_combo()
	{
		$this->load->model("DokumenKualifikasi");
		$dokumen_kualifikasi = new DokumenKualifikasi();
		$dokumen_kualifikasi->selectByParamsMonitoringPersonil(array());
		$i = 0;
		while ($dokumen_kualifikasi->nextRow()) {
			$arr_json[$i]['id']		= $dokumen_kualifikasi->getField("DOCUMENT_ID");
			$arr_json[$i]['text']	= $dokumen_kualifikasi->getField("NAME") . ' - ' . $dokumen_kualifikasi->getField("POSITION");
			$i++;
		}
		echo json_encode($arr_json);
	}

	function combo_jasa()
	{
		$this->load->model("Services");
		$services = new Services();

		$statement = " AND A.KODE_FAKTUR IS NOT NULL ";
		$services->selectByParamsMonitoring(array(), -1, -1, $statement);
		// echo $services->query;
		// exit;
		$i = 0;
		while ($services->nextRow()) {
			$arr_json[$i]['id']		= $services->getField("SERVICES_ID");
			$arr_json[$i]['text']	= $services->getField("NAMA");
			$arr_json[$i]['due_days']	= $services->getField("DUE_DAYS");
			$arr_json[$i]['metode_pembayaran']	= $services->getField("METODE_PEMBAYARAN");
			$i++;
		}
		echo json_encode($arr_json);
	}


	function combo_jasa_all()
	{
		$this->load->model("Services");
		$services = new Services();

		$statement = " AND A.KODE_FAKTUR IS NOT NULL ";


		if(!empty($this->SERVICES_ID_ACCESS))
			$statement .= " AND A.SERVICES_ID IN (".$this->SERVICES_ID_ACCESS.") ";

		
		$services->selectByParamsMonitoring(array(), -1, -1, $statement);
		// echo $services->query;
		// exit;
		$i = 0;


		$arr_json[$i]['id']		= "";
		$arr_json[$i]['text']	= "Semua";
		$i++;


		while ($services->nextRow()) {
			$arr_json[$i]['id']		= $services->getField("SERVICES_ID");
			$arr_json[$i]['text']	= $services->getField("NAMA");
			$arr_json[$i]['due_days']	= $services->getField("DUE_DAYS");
			$arr_json[$i]['metode_pembayaran']	= $services->getField("METODE_PEMBAYARAN");
			$i++;
		}
		echo json_encode($arr_json);
	}


	function combo_transaksi_company()
	{
		$this->load->model("Tagihan");
		$tagihan = new Tagihan();

		$tagihan->selectByParamsPerusahaanTagihan(array(), -1, -1, $statement);
		// echo $tagihan->query;
		// exit;
		$i = 0;


		$arr_json[$i]['id']		= "";
		$arr_json[$i]['text']	= "Semua";
		$i++;


		while ($tagihan->nextRow()) {
			$arr_json[$i]['id']		= $tagihan->getField("PELANGGAN_KODE");
			$arr_json[$i]['text']	= $tagihan->getField("PELANGGAN")." (".$tagihan->getField("PELANGGAN_KODE").")";
			$i++;
		}
		echo json_encode($arr_json);
	}


	function combo_locking_company()
	{
		$this->load->model("Tagihan");
		$tagihan = new Tagihan();

        $statement = " AND A.REC_STAT = '0'  ";
        $statement .= " AND A.DUE_DATE IS NOT NULL AND A.DUE_DATE < SYSDATE  ";
		$tagihan->selectByParamsPerusahaanTagihan(array(), -1, -1, $statement);
		// echo $tagihan->query;
		// exit;
		$i = 0;


		$arr_json[$i]['id']		= "";
		$arr_json[$i]['text']	= "Semua";
		$i++;


		while ($tagihan->nextRow()) {
			$arr_json[$i]['id']		= $tagihan->getField("PELANGGAN_KODE");
			$arr_json[$i]['text']	= $tagihan->getField("PELANGGAN")." (".$tagihan->getField("PELANGGAN_KODE").")";
			$i++;
		}
		echo json_encode($arr_json);
	}


	function combo_rupa_rupa()
	{
		$this->load->model("Services");
		$services = new Services();

		$statement = " AND A.KODE_FAKTUR IS NOT NULL AND A.JENIS_TRANSAKSI = 'ACTIVITY' ";

		if(!empty($this->SERVICES_ID_ACCESS))
			$statement .= " AND A.SERVICES_ID IN (".$this->SERVICES_ID_ACCESS.") ";
 
		$services->selectByParamsMonitoring(array(), -1, -1, $statement);
		// echo $services->query;
		// exit;
		$i = 0;
		while ($services->nextRow()) {
			$arr_json[$i]['id']		= $services->getField("SERVICES_ID");
			$arr_json[$i]['text']	= $services->getField("NAMA");
			$arr_json[$i]['due_days']	= $services->getField("DUE_DAYS");
			$arr_json[$i]['metode_pembayaran']	= $services->getField("METODE_PEMBAYARAN");
			$i++;
		}
		echo json_encode($arr_json);
	}

	function combo_satuan()
	{
		$this->load->model("Satuan");
		$satuan = new Satuan();

		$satuan->selectByParamsMonitoring(array());
		// echo $satuan->query;
		// exit;
		$i = 0;
		while ($satuan->nextRow()) {
			$arr_json[$i]['id']		= $satuan->getField("NAME");
			$arr_json[$i]['text']	= $satuan->getField("NAME");
			$i++;
		}
		echo json_encode($arr_json);
	}


	function combo_satuanV2()
	{
		$this->load->model("Tarif");
		$tarif = new Tarif();

		$reqServicesDetilId = $this->input->get("reqServicesDetilId");
		// echo $reqServicesDetilId;
		// exit;
		$statement = " AND A.SERVICES_ID = " . $reqServicesDetilId;
		$tarif->selectByParamsMonitoringv2(array(), -1, -1, $statement);
		// echo $tarif->query;
		// exit;
		$i = 0;
		while ($tarif->nextRow()) {
			$arr_json[$i]['id']		= $tarif->getField("SATUAN");
			$arr_json[$i]['text']	= $tarif->getField("SATUAN");
			$arr_json[$i]['tarif']	= numberToIna($tarif->getField("TARIF"));
			$i++;
		}
		echo json_encode($arr_json);
	}


	function combo_ppn()
	{
		$i = 0;
		$arr_json[$i]['id']		= "Y";
		$arr_json[$i]['text']	= "Ya";
		$i++;
		$arr_json[$i]['id']		= "N";
		$arr_json[$i]['text']	= "Tidak";

		echo json_encode($arr_json);
	}


	function validasi()
	{
		$i = 0;
		$arr_json[$i]['id']		= "validasi";
		$arr_json[$i]['text']	= "BELUM DIVALIDASI";
		$i++;
		$arr_json[$i]['id']		= "tolak";
		$arr_json[$i]['text']	= "DITOLAK";

		echo json_encode($arr_json);
	}



	function cabang()
	{
		$this->load->model("Master");
		$master = new Master();

		$master->selectCabang(array());
		$i = 0;
		while ($master->nextRow()) {
			$arr_json[$i]['id']		= $master->getField("CABANG_ID");
			$arr_json[$i]['text']	= $master->getField("NAMA");
			$i++;
		}

		echo json_encode($arr_json);
	}

	function pegawai_struktural()
	{
		$query = $this->db->query(" SELECT NIK, NAME, NAMA_POSISI FROM PEGAWAI_STRUKTURAL
									ORDER BY TO_NUMBER(KJ) ASC  ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["NIK"];
			$arr_json[$i]['text']	= $row["NAME"]." (".$row["NAMA_POSISI"].")";
			$i++;
		}
		
		echo json_encode($arr_json);
		

	}


	function profit_center()
	{
		$query = $this->db->query(" SELECT  KOSTL, NAME_KOSTL FROM PROFIT_CENTER ORDER BY KOSTL ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["KOSTL"];
			$arr_json[$i]['text']	= $row["NAME_KOSTL"]." (".$row["KOSTL"].")";
			$i++;
		}
		
		echo json_encode($arr_json);
	}


	function gl_piutang()
	{
		$query = $this->db->query(" SELECT SAKNR, TXT50 FROM GL_ACCOUNT WHERE SAKNR LIKE '1%' ORDER BY SAKNR ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["SAKNR"];
			$arr_json[$i]['text']	= $row["TXT50"]." (".$row["SAKNR"].")";
			$i++;
		}
		
		echo json_encode($arr_json);
	}


	function combo_faktur_company()
	{
		$query = $this->db->query(" SELECT DISTINCT CUSTOMER, CUSTOMER_NAME FROM FAKTUR_PAJAK_ALL  ");
		$i = 0;

		$arr_json[$i]['id']		= "";
		$arr_json[$i]['text']	= "Semua";
		$i++;

		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["CUSTOMER"];
			$arr_json[$i]['text']	= $row["CUSTOMER_NAME"]." (".$row["CUSTOMER"].")";
			$i++;
		}
		
		echo json_encode($arr_json);
	}


	function combo_faktur_periode()
	{
		$query = $this->db->query(" SELECT PERIODE_PAJAK FROM (SELECT DISTINCT PERIODE_PAJAK FROM FAKTUR_PAJAK_ALL) ORDER BY TO_DATE(PERIODE_PAJAK, 'MMYYYY') DESC  ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["PERIODE_PAJAK"];
			$arr_json[$i]['text']	= getNamePeriode($row["PERIODE_PAJAK"]);
			$i++;
		}
		
		echo json_encode($arr_json);
	}


	function gl_akun()
	{
		$query = $this->db->query(" SELECT SAKNR, TXT50 FROM GL_ACCOUNT ORDER BY SAKNR ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["SAKNR"];
			$arr_json[$i]['text']	= $row["SAKNR"]." - ".$row["TXT50"];
			$i++;
		}
		
		echo json_encode($arr_json);
	}


	function pajak()
	{
		$query = $this->db->query(" SELECT SAKNR, TXT50 FROM GL_ACCOUNT ORDER BY SAKNR ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["SAKNR"];
			$arr_json[$i]['text']	= $row["SAKNR"]." - ".$row["TXT50"];
			$i++;
		}
		
		echo json_encode($arr_json);
	}


	function bank_customer()
	{
		$query = $this->db->query(" SELECT BANK_CUSTOMER_ID, NAMA FROM BANK_CUSTOMER WHERE BANK_PEMBAYARAN_ID IS NOT NULL ORDER BY NAMA ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["BANK_CUSTOMER_ID"];
			$arr_json[$i]['text']	= $row["NAMA"];
			$i++;
		}
		
		echo json_encode($arr_json);
	}


	function kas_bank()
	{
		$query = $this->db->query(" SELECT BANK_PEMBAYARAN_ID, NAMA, COA FROM BANK_PEMBAYARAN WHERE COA IS NOT NULL ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["BANK_PEMBAYARAN_ID"];
			$arr_json[$i]['text']	= $row["NAMA"]." (".$row["COA"].")";
			$i++;
		}
		
		echo json_encode($arr_json);
	}



	function va_bank()
	{
		$query = $this->db->query(" SELECT BANK_PEMBAYARAN_ID, NAMA, KODE_VA FROM BANK_PEMBAYARAN WHERE COA IS NOT NULL AND KODE_VA IS NOT NULL ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["BANK_PEMBAYARAN_ID"];
			$arr_json[$i]['text']	= $row["NAMA"]." (".$row["KODE_VA"].")";
			$i++;
		}
		
		echo json_encode($arr_json);
	}


	function user_group()
	{
		$query = $this->db->query(" SELECT USER_LEVEL_ID, NAMA FROM USER_LEVEL WHERE KODE = '0' ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["USER_LEVEL_ID"];
			$arr_json[$i]['text']	= $row["NAMA"];
			$i++;
		}
		
		echo json_encode($arr_json);
	}



	function approval_jabatan()
	{
		$query = $this->db->query(" SELECT DISTINCT POSITION, NAMA_POSISI, KJ FROM PEGAWAI_STRUKTURAL ORDER BY KJ ");
		$i = 0;
		foreach ($query->result_array() as $row)
		{
			$arr_json[$i]['id']		= $row["POSITION"];
			$arr_json[$i]['text']	= $row["NAMA_POSISI"];
			$i++;
		}
		
		echo json_encode($arr_json);
	}



	function jenis_pajak()
	{
		$i = 0;

		$query = $this->db->query(" select jenis_pajak_persen_id, nama, keterangan, persen from jenis_pajak_persen
										ORDER BY jenis_pajak_persen_id ");
		foreach ($query->result_array() as $row) {
			$arr_json[$i]['id']		= $row['JENIS_PAJAK_PERSEN_ID'];
			$arr_json[$i]['text']	= $row['NAMA'] . " - " . $row['KETERANGAN'];
			$arr_json[$i]['persen']		= $row['PERSEN'];
			$i++;
		}

		echo json_encode($arr_json);
	}



	function kode_faktur()
	{
		$i = 0;

		$query = $this->db->query(" SELECT 
								KODE, PENDAPATAN, INISIAL, 
								   STATUS, KD_TEMPLATE
						FROM FAK_JENIS_PENDAPATAN WHERE STATUS = 'A' ");
		foreach ($query->result_array() as $row) {
			$arr_json[$i]['id']		= $row['KODE'];
			$arr_json[$i]['text']	= $row['KODE'] . " - " . $row['PENDAPATAN'];
			$i++;
		}

		echo json_encode($arr_json);
	}

	function periode_manfee()
	{

		$i = 0;

		for($j=1;$j<=12;$j++)
		{

			$reqPeriode = generateZero($j,2).date("Y");

			$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM MANAJEMEN_FEE_LOCK WHERE PERIODE = '$reqPeriode' ")->row()->ADA;

			if($adaData > 0)
				continue;

			$arr_json[$i]['id']		= $reqPeriode;
			$arr_json[$i]['text']	= getNamePeriode(generateZero($j,2).date("Y"));
			$i++;

		}
		echo json_encode($arr_json);

	}


	function periode_lock()
	{

		$reqTransaksi = $this->input->get("reqTransaksi");
		$i = 0;

		for($j=1;$j<=12;$j++)
		{

			$reqPeriode = generateZero($j,2).date("Y");

			$adaData = $this->db->query(" SELECT COUNT(1) ADA FROM LOADER_LOCK WHERE PERIODE = '$reqPeriode' AND TRANSAKSI = '$reqTransaksi' AND NOT STATUS = 'REJECT' ")->row()->ADA;

			if($adaData > 0)
				continue;

			$arr_json[$i]['id']		= $reqPeriode;
			$arr_json[$i]['text']	= getNamePeriode(generateZero($j,2).date("Y"));
			$i++;

		}
		echo json_encode($arr_json);

	}


	function periode_manfee_data()
	{
		$i = 0;

 		$arr_json = array();
		$query = $this->db->query(" SELECT A.PERIODE, CASE WHEN B.LOCKED_BY IS NULL THEN 0 ELSE 1 END PERIODE_LOCK FROM 
					(SELECT  DISTINCT PERIODE  FROM MANAJEMEN_FEE) A
					LEFT JOIN MANAJEMEN_FEE_LOCK B ON A.PERIODE = B.PERIODE  
					ORDER BY TO_DATE(A.PERIODE, 'MMYYYY') DESC ");
		foreach ($query->result_array() as $row) {
			$arr_json[$i]['id']		= $row['PERIODE'];
			$arr_json[$i]['text']	= getNamePeriode($row['PERIODE']);
			$arr_json[$i]['status']		= $row['PERIODE_LOCK'];
			$i++;
		}

		echo json_encode($arr_json);
	}


	function periode_patimban_data()
	{
		$i = 0;
 		
 		$arr_json = array();
		$query = $this->db->query(" SELECT A.PERIODE, 
						CASE WHEN B.LOCKED_BY IS NULL THEN 0 ELSE 1 END, NVL(STATUS, 'DRAFT') STATUS, PEGAWAI_NAMA_APPROVAL1, 
						PEGAWAI_NAMA_APPROVAL2, 
                               CASE 
                                    WHEN PEGAWAI_NAMA_APPROVAL1 IS NULL THEN 'Belum Diposting'
                                    WHEN APPROVAL1 IS NULL THEN 'Menunggu Persetujuan ' ||  PEGAWAI_NAMA_APPROVAL1 
                                    WHEN APPROVAL1 = 'Y' THEN 'Disetujui oleh ' ||  PEGAWAI_NAMA_APPROVAL1 
                                    WHEN APPROVAL1 = 'T' THEN 'Ditolak oleh ' ||  PEGAWAI_NAMA_APPROVAL1 || ' dengan alasan ' || APPROVAL1_ALASAN
                                END APPROVAL1, 
                                CASE 
                                    WHEN PEGAWAI_NAMA_APPROVAL2 IS NULL THEN 'Belum Diposting'
                                    WHEN APPROVAL1 = 'T' THEN '' 
                                    WHEN APPROVAL2 IS NULL THEN 'Menunggu Persetujuan ' ||  PEGAWAI_NAMA_APPROVAL2 
                                    WHEN APPROVAL2 = 'Y' THEN 'Disetujui oleh ' ||  PEGAWAI_NAMA_APPROVAL2 
                                    WHEN APPROVAL2 = 'T' THEN 'Ditolak oleh ' ||  PEGAWAI_NAMA_APPROVAL2 || ' dengan alasan ' || APPROVAL2_ALASAN
                                END APPROVAL2 
					FROM 
					(SELECT  DISTINCT PERIODE  FROM PATIMBAN_LOADER) A
					LEFT JOIN LOADER_LOCK B ON A.PERIODE = B.PERIODE   AND B.TRANSAKSI = 'PATIMBAN_LOADER'
					ORDER BY TO_DATE(A.PERIODE, 'MMYYYY') DESC ");
		foreach ($query->result_array() as $row) {
			$arr_json[$i]['id']		= $row['PERIODE'];
			$arr_json[$i]['text']	= getNamePeriode($row['PERIODE']);
			$arr_json[$i]['status']		= $row['STATUS'];
			$arr_json[$i]['PEGAWAI_NAMA_APPROVAL1']		= $row['PEGAWAI_NAMA_APPROVAL1'];
			$arr_json[$i]['PEGAWAI_NAMA_APPROVAL2']		= $row['PEGAWAI_NAMA_APPROVAL2'];
			$arr_json[$i]['APPROVAL1']		= coalesce($row['APPROVAL1'], "Belum Diposting");
			$arr_json[$i]['APPROVAL2']		= coalesce($row['APPROVAL2'], "Belum Diposting");
			$i++;
		}

		echo json_encode($arr_json);
	}



	function periode_invoice_header()
	{
		$i = 0;

 		$arr_json = array();
		$query = $this->db->query(" SELECT PERIODE FROM (SELECT  DISTINCT TO_CHAR(CREATED_DATE, 'MMYYYY') PERIODE  FROM INVOICE_HEADER) ORDER BY TO_DATE(PERIODE, 'MMYYYY') DESC ");
		foreach ($query->result_array() as $row) {
			$arr_json[$i]['id']		= $row['PERIODE'];
			$arr_json[$i]['text']	= getNamePeriode($row['PERIODE']);
			$i++;
		}

		echo json_encode($arr_json);
	}



	function periode_cetak_nota_all()
	{
		$i = 0;

		$reqStatus = $this->input->get("reqStatus");

 		$arr_json = array();
		$query = $this->db->query(" SELECT PERIODE FROM (SELECT  DISTINCT TO_CHAR(TANGGAL_NOTA, 'MMYYYY') PERIODE  FROM TAGIHAN_CETAK_NOTA WHERE REC_STAT = '$reqStatus') ORDER BY TO_DATE(PERIODE, 'MMYYYY') DESC ");
		foreach ($query->result_array() as $row) {
			$arr_json[$i]['id']		= $row['PERIODE'];
			$arr_json[$i]['text']	= getNamePeriode($row['PERIODE']);
			$i++;
		}

		echo json_encode($arr_json);
	}

	function periode_manfee_transaksi()
	{
		$i = 0;

		$query = $this->db->query(" SELECT A.PERIODE FROM (SELECT  DISTINCT PERIODE  FROM MANAJEMEN_FEE) A
				INNER JOIN MANAJEMEN_FEE_LOCK B ON A.PERIODE = B.PERIODE
			   WHERE NOT EXISTS(SELECT 1 FROM TAGIHAN_MANFEE X WHERE X.PERIODE = A.PERIODE AND NOT NVL(POSTING,'X') = 'BATAL')
		       ORDER BY TO_DATE(PERIODE, 'MMYYYY') DESC ");
		foreach ($query->result_array() as $row) {
			$arr_json[$i]['id']		= $row['PERIODE'];
			$arr_json[$i]['text']	= getNamePeriode($row['PERIODE']);
			$i++;
		}

		echo json_encode($arr_json);
	}



	function periode_patimban_transaksi()
	{
		$i = 0;

		$query = $this->db->query(" 
				SELECT A.PERIODE
				    FROM (SELECT DISTINCT PERIODE
				            FROM PATIMBAN_LOADER) A
				         INNER JOIN LOADER_LOCK B
				             ON     A.PERIODE = B.PERIODE
				                AND B.TRANSAKSI = 'PATIMBAN_LOADER'
				                AND STATUS = 'APPROVE'
				   WHERE NOT EXISTS
				             (SELECT 1
				                FROM TAGIHAN_PROJECT X
				               WHERE     X.PERIODE_TAGIHAN = A.PERIODE
				                     AND NOT NVL (POSTING, 'X') = 'BATAL'
				                     AND SERVICES_ID = '98')
				ORDER BY TO_DATE (PERIODE, 'MMYYYY') DESC
		 ");
		foreach ($query->result_array() as $row) {
			$arr_json[$i]['id']		= $row['PERIODE'];
			$arr_json[$i]['text']	= getNamePeriode($row['PERIODE']);
			$i++;
		}

		echo json_encode($arr_json);
	}



}
