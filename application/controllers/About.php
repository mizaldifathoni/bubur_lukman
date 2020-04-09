<?php 


class About extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('dashboard/ModelPengaturan');
  }

	public function index()
	{
		$data = array(
			'settings' => $this->ModelPengaturan->getAllSettings()
		);
		$this->load->view('About', $data);
	}
}

 ?>