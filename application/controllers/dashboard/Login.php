<?php 


class Login extends CI_Controller
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->model('dashboard/ModelLogin');
    $this->load->model('component/Modal');
    $this->load->model('dashboard/ModelPengaturan');
  }

	public function index()
	{

    if($this->ModelLogin->isAccessable()){
      redirect(base_url('dashboard/home'));
		}else{
			if(null !== ($this->input->post('inputLogin'))){
        $this->login($this->input->post('inputUsername'), $this->input->post('inputPassword'));
      }else{
        $data = array(
          'settings'		=> $this->ModelPengaturan->getAllSettings()
        );
        $this->load->view('dashboard/Login', $data);
      }
		}
  }

  private function login($username, $password)
  {
    $getAccess = $this->ModelLogin->getAccess($username, $password);
    if($getAccess['access']){
      $session = array(
        'username_pengguna' => $username,
        'tipe_pengguna' => $getAccess['tipe_pengguna']
      );

      $this->session->set_userdata($session);
      redirect(base_url('dashboard/home'));
    }else{
      $this->session->set_flashdata('login_message', $this->Modal->createMessageModal('Login Gagal', 'Punten. Username atau Password salah, silakan coba lagi.'));
      redirect(base_url('dashboard/login'));
    }
  } 
  
}

?>