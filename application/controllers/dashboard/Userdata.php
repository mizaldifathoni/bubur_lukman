<?php 


class Userdata extends CI_Controller
{
	
	function __construct()
  {
    parent::__construct();
		$this->load->model('dashboard/ModelLogin');
		$this->load->model('dashboard/ModelPengaturan');
		$this->load->model('dashboard/ModelToko');
		$this->load->model('dashboard/ModelMenuToko');
		$this->load->model('dashboard/ModelUlasan');
    $this->load->model('dashboard/ModelStatistik');
    $this->load->model('dashboard/ModelUserData');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}else{
				$data = array(
          'settings'	=> $this->ModelPengaturan->getAllSettings(),
          'userdata'  => $this->getUserDataRowsHtml()      
				);
				$this->load->view('dashboard/userdata', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

  private function getUserDataRowsHtml() {
    $allUserData = $this->ModelUserData->getAllUserData();

    //Thanks to Allah, then https://stackoverflow.com/users/3933332/rizier123
    $tmp = array();
    foreach($allUserData as $key => $innerUserData) {
      $allUserData[$key]->no_telepon_pengulas = (substr($innerUserData->no_telepon_pengulas, 0, 1) == '0')? '+62' . substr($innerUserData->no_telepon_pengulas, 1) : $innerUserData->no_telepon_pengulas; 
      
      if(in_array($innerUserData->no_telepon_pengulas, $tmp)){
        unset($allUserData[$key]);
      }else{
        $tmp[] = $innerUserData->no_telepon_pengulas;
      }
    }

    $html = '';

    $num = 1;
    foreach($allUserData as $userData) {
      //$noTelepon = (substr($userData->no_telepon_pengulas, 0, 1) == '0')? '+62' . substr($userData->no_telepon_pengulas, 1) : $userData->no_telepon_pengulas; 
      $noTelepon = $userData->no_telepon_pengulas;
      $noTeleponWithoutPlus = substr($noTelepon, 1);

      $html .= '
        <tr>
          <th scope="row">' . $num . '</th>
          <td>' . $userData->nama_pengulas . '</td>
          <td>' . $noTelepon . '</td>
          <td>
            <a class="badge badge-secondary p-2" href="tel:' . $noTelepon . '"><i class="fa fa-phone mr-1"></i> Telepon</a>
            <a class="badge badge-success p-2" href="#" onclick="sendWhatsApp(\'' . $num . '\')"><i class="fab fa-whatsapp fa-lg mr-1"></i> WhatsApp</a>
            <div class="d-none" id="no_telepon_' . $num . '">' . $noTeleponWithoutPlus . '</div>
          </td>
        </tr>
      ';

      $num++;
    }
    
    return $html;
  }
	

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}
}

 ?>