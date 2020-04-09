<?php 


class Home extends CI_Controller
{
	
	function __construct()
  {
    parent::__construct();
		$this->load->model('dashboard/ModelLogin');
		$this->load->model('dashboard/ModelPengaturan');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}else{
				$data = array(
					'settings'		=> $this->ModelPengaturan->getAllSettings()
				);
				$this->load->view('dashboard/home', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}
}

 ?>