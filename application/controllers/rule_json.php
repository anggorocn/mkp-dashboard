<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once("functions/string.func.php");
include_once("functions/date.func.php");

class rule_json extends CI_Controller
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


	function get_tanggal_after()
	{

		$reqDueDate = $this->input->get("reqDueDate");
		$reqPerpanjanganDueDays = $this->input->get("reqPerpanjanganDueDays");

		if(empty($reqDueDate))
		{
			echo "";
			return;
		}

		if(empty($reqPerpanjanganDueDays))
		{
			echo "";
			return;
		}

		$result = $this->db->query(" SELECT TO_CHAR((TO_DATE('$reqDueDate', 'DD-MM-YYYY') + INTERVAL '$reqPerpanjanganDueDays' DAY), 'DD-MM-YYYY') HASIL FROM DUAL ")->row()->HASIL;

		echo $result;
		

	}

}
