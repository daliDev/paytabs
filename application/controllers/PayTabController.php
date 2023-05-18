<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayTabController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	 public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
 		$this->load->helper('url');
 		$this->load->helper('form');
		 $this->load->model('payModel');
	}
	 public function index()
	{
		
		$data["arr_catheg"] = $this->payModel->getCatheg(0);
		$this->load->view('payTabView',$data);
	}

	public function getCathegByParent(){
		$parent_id = $this->input->post('parent_id');
		//die("...".$parent_id);
		$arr_catheg = $this->payModel->getCatheg($parent_id);
		echo json_encode($arr_catheg);
	}

}
