<?php 


class Menu extends CI_Controller
{

	function __construct()
  {
		parent::__construct();
		$this->load->model('dashboard/ModelKamus');
		$this->load->model('dashboard/ModelMenuToko');
		$this->load->model('dashboard/ModelToko');
		$this->load->model('dashboard/ModelPengaturan');
  }
	
	public function index()
	{
		$data = array(
			'accordions' => $this->getMenuTokoAccordionsHtml(),
			'settings' => $this->ModelPengaturan->getAllSettings(),
			'locations' => $this->getLokasiTokoHtml()
		);
		$this->load->view('menu', $data);
	}

	private function getAllMenusHtml($idToko, $isFirstToko)
	{
		$foods = $this->ModelMenuToko->getFoodMenusByIdToko($idToko);

		$html = '
		<div class="row special-list">
		';

		foreach($foods as $food){
			$html .= '
			<div class="col-lg-4 col-md-6 special-grid dishes toko' . $idToko . '">
					<div class="gallery-single fix">
						<img src="' . base_url('assets/picture/menu-toko/') . $idToko . '/' . $food->nama_thumbnail_menu . '" class="img-fluid" style="height: 240px;" alt="Image">
						<div class="why-text">
							<h4>' . $food->nama_menu . '</h4>
							<p>' . $food->deskripsi_menu . '</p>
							<h5> Rp ' . $food->harga_menu . '</h5>
						</div>
					</div>
				</div>
			';
		}

		$beverages = $this->ModelMenuToko->getDrinksMenusByIdToko($idToko);

		foreach($beverages as $beverage){
			$html .= '
			<div class="col-lg-4 col-md-6 special-grid beverages toko' . $idToko . '">
					<div class="gallery-single fix">
						<img src="' . base_url('assets/picture/menu-toko/') . $idToko . '/' . $beverage->nama_thumbnail_menu . '" class="img-fluid" style="height: 240px;" alt="Image">
						<div class="why-text">
							<h4>' . $beverage->nama_menu . '</h4>
							<p>' . $beverage->deskripsi_menu . '</p>
							<h5> Rp ' . $beverage->harga_menu . '</h5>
						</div>
					</div>
				</div>
			';
		}

		$html .= '
		</div>
		';

		return $html;
	}

	private function getMenuTokoAccordionsHtml()
	{
		$allToko = $this->ModelToko->getAllToko();

		$html = '
		<div class="row">
			<div class="col-lg-12">
				<div class="special-menu text-center">
					<div class="button-group filter-button-group">
						<button id="toko0" class="active" onclick="tokoOnClick(\'0\')" data-filter="*">Semua Toko</button>
		';

		

		$firstTime = true;
		foreach($allToko as $toko){
			$html .= '
						<button id="toko' . $toko->id_toko . '" class="" onclick="tokoOnClick(\'' . $toko->id_toko . '\')" data-filter=".toko' . $toko->id_toko . '">' . $toko->nama_toko . '</button>
			';
			$firstTime = false;
		}

		$html .= '
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="special-menu text-center">
					<div class="button-group filter-button-group">
						<button id="allMenu" class="active" data-filter="toko' . $toko->id_toko . '">Semua</button>
						<button id="beverages" data-filter=".beverages">Minuman</button>
						<button id="dishes" data-filter=".dishes">Makanan</button>
					</div>
				</div>
			</div>
		</div>
		';

		$isFirstToko = true;
		foreach($allToko as $toko){
			$html .= $this->getAllMenusHtml($toko->id_toko, $isFirstToko);
			$isFirstToko = false;
		}

		return $html;
	}

	public function getLokasiTokoHtml()
	{
		$allToko = $this->ModelToko->getAllToko();

		$html = '
		<div class="alert alert-success pt-4 pb-4">
			<center><h2><strong>Lokasi</strong></h2></center>
		';

		foreach($allToko as $toko){
			$html .= '
			<center><h4 class="p-1"><strong>' . $toko->nama_toko . ':</strong> ' . $toko->lokasi_toko . '</h4></center>
			';
		}

		$html .= '
		</div>
		';

		return $html;
	} 
}

 ?>