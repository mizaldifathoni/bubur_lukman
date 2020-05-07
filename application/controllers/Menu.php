<?php 


class Menu extends CI_Controller
{

	function __construct()
  {
		parent::__construct();
		$this->load->model('component/Modal');
		$this->load->model('dashboard/ModelKamus');
		$this->load->model('dashboard/ModelMenuToko');
		$this->load->model('dashboard/ModelToko');
		$this->load->model('dashboard/ModelPengaturan');
		$this->load->model('dashboard/ModelUlasanMenu');
		$this->load->model('dashboard/ModelStatistik');
  }
	
	public function index()
	{
		if(null !== $this->input->post('tambahUlasanMenu')){
			$this->addMenuReview();
		}else{
			$data = array(
				'accordions' => $this->getMenuTokoAccordionsHtml(),
				'settings' => $this->ModelPengaturan->getAllSettings(),
				'locations' => $this->getLokasiTokoHtml()
			);
			$this->ModelStatistik->addStatistics(base_url() . 'Menu');
			$this->load->view('menu', $data);
		}
	}

	private function getAllMenusHtml($idToko, $isFirstToko)
	{
		$foods = $this->ModelMenuToko->getFoodMenusByIdToko($idToko);

		$html = '
		<!-- <div class="row special-list"> -->
		';

		foreach($foods as $food){
			$disc = $food->diskon_menu;
			$isDiscountEnabled = ($disc > 0);
			$priceBefore = $food->harga_menu;
			$priceAfter = $priceBefore - ($priceBefore * ($disc/100));
			$menuRating = $this->ModelUlasanMenu->getMenuRatings($food->id_menu_toko);
			$menuReviewCounts = $this->ModelUlasanMenu->getMenuReviewCounts($food->id_menu_toko);

			$html .= '
				<div class="col-lg-4 col-md-6 special-grid dishes toko' . $idToko . '">
					<div class="gallery-single fix mb-2">
						<div class="container p-0 m-0">
							<img src="' . base_url('assets/picture/menu-toko/') . $idToko . '/' . $food->nama_thumbnail_menu . '" class="img-fluid w-100" style="height: 240px;" alt="Image">
							' . (($isDiscountEnabled)? '<div class="badge badge-info top-right p-2">Diskon ' . $disc .'%</div>' : '') . '
						</div>
						<div class="why-text">
							<h4>' . $food->nama_menu . '</h4>
							<p>' . $food->deskripsi_menu . '</p>
							<h5> ' . (($isDiscountEnabled)? 'Rp ' . $priceAfter . '<sup><small>  <del>Rp ' . $priceBefore . '</del></small></sup>' : 'Rp ' . $priceBefore) . '</h5>
						</div>
					</div>
					<div class="row" style="min-height: 36px">
						<div class="col-12 d-flex justify-content-between">
						<span data-toggle="tooltip" data-placement="bottom" title="' . $menuRating . '/5.0 dari ' . $menuReviewCounts . ' ulasan">
			';

			if($menuReviewCounts != 0) {
				$html .= '
					<i class="fa fa-star text-primary mb-1"></i> ' . $menuRating . '
				';
			}
								
			$html .= '
							</span>
							<a class="text-primary" href="#" data-toggle="modal" data-target="#ulasMenuModal" data-id-menu="' . $food->id_menu_toko . '" data-nama-menu="' . $food->nama_menu . '">
								<svg class="bi bi-chat-dots" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M2.678 11.894a1 1 0 01.287.801 10.97 10.97 0 01-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 01.71-.074A8.06 8.06 0 008 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 01-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 00.244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 01-2.347-.306c-.52.263-1.639.742-3.468 1.105z" clip-rule="evenodd"/>
									<path d="M5 8a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
			';
		}

		$beverages = $this->ModelMenuToko->getDrinksMenusByIdToko($idToko);

		foreach($beverages as $beverage){
			$disc = $beverage->diskon_menu;
			$isDiscountEnabled = ($disc > 0);
			$priceBefore = $beverage->harga_menu;
			$priceAfter = $priceBefore - ($priceBefore * ($disc/100));
			$menuRating = $this->ModelUlasanMenu->getMenuRatings($beverage->id_menu_toko);
			$menuReviewCounts = $this->ModelUlasanMenu->getMenuReviewCounts($beverage->id_menu_toko);

			$html .= '
				<div class="col-lg-4 col-md-6 special-grid beverages toko' . $idToko . '">
					<div class="gallery-single fix mb-2">
						<div class="container p-0 m-0">
							<img src="' . base_url('assets/picture/menu-toko/') . $idToko . '/' . $beverage->nama_thumbnail_menu . '" class="img-fluid w-100" style="height: 240px;" alt="Image">
							' . (($isDiscountEnabled)? '<div class="badge badge-info top-right p-2">Diskon ' . $disc .'%</div>' : '') . '
						</div>
						<div class="why-text">
							<h4>' . $beverage->nama_menu . '</h4>
							<p>' . $beverage->deskripsi_menu . '</p>
							<h5> ' . (($isDiscountEnabled)? 'Rp ' . $priceAfter . '<sup><small>  <del>Rp ' . $priceBefore . '</del></small></sup>' : 'Rp ' . $priceBefore) . '</h5>
						</div>
					</div>
					<div class="row" style="min-height: 36px">
						<div class="col-12 d-flex justify-content-between">
							<span data-toggle="tooltip" data-placement="bottom" title="' . $menuRating . '/5.0 dari ' . $menuReviewCounts . ' ulasan">
			';

			if($menuReviewCounts != 0) {
				$html .= '
					<i class="fa fa-star text-primary mb-1"></i> ' . $menuRating . '
				';
			}
								
			$html .= '
							</span>
							<a class="text-primary" href="#" data-toggle="modal" data-target="#ulasMenuModal" data-id-menu="' . $beverage->id_menu_toko . '" data-nama-menu="' . $beverage->nama_menu . '">
								<svg class="bi bi-chat-dots" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M2.678 11.894a1 1 0 01.287.801 10.97 10.97 0 01-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 01.71-.074A8.06 8.06 0 008 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 01-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 00.244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 01-2.347-.306c-.52.263-1.639.742-3.468 1.105z" clip-rule="evenodd"/>
									<path d="M5 8a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
			';
		}

		$html .= '
		<!-- </div> -->
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
		<div class="row special-list">
		';

		$isFirstToko = true;
		foreach($allToko as $toko){
			$html .= $this->getAllMenusHtml($toko->id_toko, $isFirstToko);
			$isFirstToko = false;
		}

		$html .= '
		</div>
		';

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

	private function addMenuReview() {
		$review = array(
			'id_menu_toko' => $this->input->post('id_menu_toko'),
			'nama_pengulas' => $this->input->post('nama_pengulas_menu'),
			'rating_menu_toko'	=> $this->input->post('rating_menu'),
			'isi_ulasan_menu_toko' => $this->input->post('isi_ulasan_menu'),
			'no_telepon_pengulas' => $this->input->post('no_telepon_pengulas_menu'),
			'token_ulasan_menu_toko' => uniqid(),
			'tanggal_ulasan_menu_toko' => date('Y-m-d h:i:sa')
		);

		if($this->ModelUlasanMenu->insertReview($review)){
			$data = array(
				'accordions' => $this->getMenuTokoAccordionsHtml(),
				'settings' => $this->ModelPengaturan->getAllSettings(),
				'locations' => $this->getLokasiTokoHtml(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Ulasan Anda berhasil ditambahkan, terimakasih sudah mengulas menu kami :)')
			);
			$this->load->view('menu', $data);
		}else{
			$data = array(
				'accordions' => $this->getMenuTokoAccordionsHtml(),
				'settings' => $this->ModelPengaturan->getAllSettings(),
				'locations' => $this->getLokasiTokoHtml(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Ulasan', 'Maaf, nampaknya ada kesalahan dalam menambahkan ulasan, silahkan coba lagi.')
			);
			$this->load->view('menu', $data);
		}

	}

}

 ?>