<?php 


class About extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('dashboard/ModelPengaturan');
		$this->load->model('dashboard/ModelToko');
		$this->load->model('dashboard/ModelStatistik');
  }

	public function index()
	{
		$data = array(
			'settings' => $this->ModelPengaturan->getAllSettings(),
			'shop_locations'	=> $this->ModelToko->getSemuaLokasiToko()
		);
		$this->ModelStatistik->addStatistics(base_url() . 'About');
		$this->load->view('About', $data);
	}
}

 ?>