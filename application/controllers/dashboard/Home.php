<?php 


class Home extends CI_Controller
{
	
	function __construct()
  {
    parent::__construct();
    $this->load->model('dashboard/ModelLogin');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}else{
				$this->load->view('dashboard/home');
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