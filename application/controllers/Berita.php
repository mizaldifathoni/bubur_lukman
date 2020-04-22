<?php 


class Berita extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('dashboard/ModelPengaturan');
		$this->load->model('dashboard/ModelStatistik');
  }

	public function index()
	{
		$data = array(
			'settings' => $this->ModelPengaturan->getAllSettings()
		);
		$this->ModelStatistik->addStatistics(base_url() . 'Berita');
		$this->load->view('Berita.php', $data);
	}
}

 ?>