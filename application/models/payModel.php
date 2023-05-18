<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class payModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getCatheg($parent_id=0){
		return $this->db->query("select * from Cathegorie where parent='$parent_id'")->result_array();
	}
}
?>
