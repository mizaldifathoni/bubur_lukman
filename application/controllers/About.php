<?php 


class About extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('dashboard/ModelPengaturan');
		$this->load->model('dashboard/ModelToko');
  }

	public function index()
	{
		$data = array(
			'settings' => $this->ModelPengaturan->getAllSettings(),
			'shop_locations'	=> $this->ModelToko->getSemuaLokasiToko()
		);
		$this->load->view('About', $data);
	}
}

 ?>