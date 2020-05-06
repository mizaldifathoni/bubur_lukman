<?php 


class Changelog extends CI_Controller
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
    $this->load->model('dashboard/ModelLog');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}else{
				$data = array(
          'settings'	=> $this->ModelPengaturan->getAllSettings(),
          'changelog'  => $this->getChangeLogRowsHtml()      
				);
				$this->load->view('dashboard/changelog', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

  private function getChangeLogRowsHtml() {
    $recentChangeLogs = $this->ModelLog->getRecentLogs();
    

    $html = '';

    foreach($recentChangeLogs as $changeLog) {
      $html .= '
        <tr>
          <th scope="row">' . $changeLog->id_log . '</th>
          <td>' . $changeLog->username_pengguna . '</td>
          <td>' . $changeLog->isi_log . '</td>
          <td>' . $changeLog->tanggal_log . '</td>
        </tr>
      ';
    }
    
    return $html;
  }
	

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}
}

 ?>