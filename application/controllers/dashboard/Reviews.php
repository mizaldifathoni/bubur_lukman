<?php 


class Reviews extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('component/Modal');
		$this->load->model('dashboard/ModelKamus');
		$this->load->model('dashboard/ModelLogin');
		$this->load->model('dashboard/ModelMenuToko');
		$this->load->model('dashboard/ModelToko');
		$this->load->model('dashboard/ModelPengaturan');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}else{
				$data = array(
					'accordions' => $this->getShopReviewsAccordionHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings()
				);
				
				$this->load->view('dashboard/reviews', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}

  private function getShopReviewsAccordionHtml() {

  }
}

 ?>