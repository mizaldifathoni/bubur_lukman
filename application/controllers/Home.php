<?php 


class Home extends CI_Controller
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
			'menus' => $this->getAllMenusHtml(),
			'settings' => $this->ModelPengaturan->getAllSettings(),
			'shop_locations'	=> $this->ModelToko->getSemuaLokasiToko()
		);
		$this->load->view('home', $data);
	}

	private function getAllMenusHtml()
	{
		$idToko = $this->ModelMenuToko->getIdTokoWithMaxMenuTokoCount();
		$foods = $this->ModelMenuToko->getFoodMenusByIdToko($idToko);

		$html = '
		<div class="row">
			<div class="col-lg-12">
				<div class="special-menu text-center">
					<div class="button-group filter-button-group">
						<button id="allMenu" class="active" data-filter="*">Semua</button>
						<button id="beverages" data-filter=".beverages">Minuman</button>
						<button id="dishes" data-filter=".dishes">Makanan</button>
					</div>
				</div>
			</div>
		</div>

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
								<div class="row">
									<div class="col-7">
										<h5> Rp ' . $food->harga_menu . '</h5>
									</div>
									<div id="bintangMenu" class="starratingMenu risingstar d-flex justify-content-center flex-row-reverse class="col-5">
										<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Sangat Bagus"> </label>
										<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Bagus"> </label>
										<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Biasa Saja"> </label>
										<input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Buruk"> </label>
										<input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sangat Buruk"> </label>
									</div>
								</div>	
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
}



 ?>