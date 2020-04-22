<?php 


class Home extends CI_Controller
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
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}else{
				$data = array(
					'settings'							=> $this->ModelPengaturan->getAllSettings(),
					'weekly_statistics' 		=> $this->ModelStatistik->getWeeklyStatistics(),
					'all_statistics'				=> $this->ModelStatistik->getAllStatistics(),
					'most_visitor_location'	=> $this->getMostVisitorCityHtml(),
					'shop_counts'						=> $this->ModelToko->getJumlahToko(),
					'menu_counts'						=> $this->ModelMenuToko->getMenuCounts(),
					'post_counts'						=> 0,
					'review_counts'					=> $this->ModelUlasan->getReviewCounts()
				);
				$this->load->view('dashboard/home', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function getMostVisitorCityHtml()
	{
		$data = $this->ModelStatistik->getMostVisitorCity();

		$html = '
							<table class="table table-bordered rounded">
                <tbody>
		';

		$indeks = 0;
		foreach($data as $row) {
			$html .= '
									<tr>
                    <td>' . $row->kota . ', ' . $row->negara . '</td>
                    <td>' . $row->views . '</td>
                  </tr>
			';
			$indeks++;
		}

		for($i=$indeks; $i<6; $i++) {
			$html .= '
									<tr>
                    <td>-</td>
                    <td>-</td>
                  </tr>
			';
		}

		$html .= '
								</tbody>
								</table>
		';

		return $html;
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}
}

 ?>