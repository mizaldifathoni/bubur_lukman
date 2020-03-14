<?php 


class Menu extends CI_Controller
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
				$this->load->view('dashboard/menu');
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