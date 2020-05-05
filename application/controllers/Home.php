<?php 


class Home extends CI_Controller
{

	function __construct()
  {
		parent::__construct();
		$this->load->model('component/Modal');
		$this->load->model('component/Time');
		$this->load->model('dashboard/ModelKamus');
		$this->load->model('dashboard/ModelMenuToko');
		$this->load->model('dashboard/ModelToko');
		$this->load->model('dashboard/ModelPengaturan');
		$this->load->model('dashboard/ModelUlasan');
		$this->load->model('dashboard/ModelUlasanMenu');
		$this->load->model('dashboard/ModelStatistik');
  }
	
	public function index()
	{
		if(null !== $this->input->post('tambahUlasan')){
			$this->addReview();
		}elseif(null !== $this->input->post('tambahUlasanMenu')){
			$this->addMenuReview();
		}else{
			$data = array(
				'menus' => $this->getAllMenusHtml(),
				'settings' => $this->ModelPengaturan->getAllSettings(),
				'shop_locations'	=> $this->ModelToko->getSemuaLokasiToko(),
				'reviews' => $this->getRecentReviewsHtml(),
				'ratings' => $this->getOverallRatingsHtml()
			);
			$this->ModelStatistik->addStatistics(base_url() . 'Home');
			$this->load->view('home', $data);
		}
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
					<div class="row">
						<div class="col-12 d-flex justify-content-between">
							<span data-toggle="tooltip" data-placement="bottom" title="' . $menuRating . '/5.0 dari ' . $menuReviewCounts . ' ulasan">';

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
			$menuRating = $this->ModelUlasanMenu->getMenuRatings($food->id_menu_toko);
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
							<h5> ' . (($isDiscountEnabled)? 'Rp ' . $priceAfter . '<sup><small>  <del>Rp ' . $priceBefore . '</del></sup>' : 'Rp ' . $priceBefore) . '</h5>
						</div>
					</div>
					<div class="row">
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
		</div>
		';

		return $html;
	}

	private function addReview() {

		$review = array(
			'nama_pengulas' => $this->input->post('nama_pengulas'),
			'rating_toko'	=> $this->input->post('rating_toko'),
			'isi_ulasan_toko' => $this->input->post('isi_ulasan_toko'),
			'no_telepon_pengulas' => $this->input->post('no_telepon_pengulas'),
			'token_ulasan_toko' => uniqid(),
			'tanggal_ulasan_toko' => date('Y-m-d h:i:sa')
		);

		if($this->ModelUlasan->insertReview($review)){
			$data = array(
				'menus' => $this->getAllMenusHtml(),
				'settings' => $this->ModelPengaturan->getAllSettings(),
				'shop_locations'	=> $this->ModelToko->getSemuaLokasiToko(),
				'reviews' => $this->getRecentReviewsHtml(),
				'ratings' => $this->getOverallRatingsHtml(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Ulasan Anda berhasil ditambahkan, terimakasih sudah mengulas toko kami :)')
			);
			$this->load->view('home', $data);
		}else{
			$data = array(
				'menus' => $this->getAllMenusHtml(),
				'settings' => $this->ModelPengaturan->getAllSettings(),
				'shop_locations'	=> $this->ModelToko->getSemuaLokasiToko(),
				'reviews' => $this->getRecentReviewsHtml(),
				'ratings' => $this->getOverallRatingsHtml(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Ulasan', 'hoops! Nampaknya ada kesalahan dalam menambahkan ulasan, silahkan coba lagi.')
			);
			$this->load->view('home', $data);
		}

	}

	private function getRecentReviewsHtml()
	{
		$html = '';

		$reviews = $this->ModelUlasan->getRecentReviews();
		$isFirstTime = true;
		foreach($reviews as $review) {
			$html .= 
			'
			<div class="carousel-item' . (($isFirstTime)? ' active' : '') . '">
				<div class="row">
					<div class="col-lg-3 d-flex justify-content-center align-items-start">
						<div class="rounded-circle mbm-5" width="140" height="140">
							<i class="fa fa-user fa-5x"></i>
						</div>
					</div>
					<div class="col-lg-9 d-flex flex-column align-items-start">
						<strong class="d-inline-block mb-2">' . $review->nama_pengulas . '</strong>
						<p class="mb-auto">' . $review->isi_ulasan_toko . '</p>
						<div class="row w-100 d-flex justify-content-between pl-3">
							<div class="col-xs-6">';
								
			for($star=1; $star<=$review->rating_toko; $star++){
					$html .= '<i class="fa fa-star text-primary mb-1"></i>';
			}

			for($star=$review->rating_toko+1; $star<=5; $star++){
				$html .= '<i class="fa fa-star text-muted mb-1"></i>';
			}

			$reviewTime = strtotime($review->tanggal_ulasan_toko);
							
			$html .=
			'
							</div>
							<div class="col-xs-6">
								<small class="mb-1 text-muted">' . $this->Time->relativeTime($reviewTime) . '</small>
							</div>
						</div>
					</div>
				</div>
			</div>
			';

			$isFirstTime = false;
		}

		return $html;
	}

	private function getOverallRatingsHtml()
	{
		$html = 
		'
							<div class="col-12 d-flex justify-content-center">
								<strong class="d-inline-block mb-3">Total Rating</strong>
							</div>
							<div class="col-12 d-flex justify-content-center ">
								<h1 class="text-primary d-flex align-items-center"><i class="fa fa-star fa-3x mr-3"></i> <span class="display-4">' . $this->ModelUlasan->getOverallRatings() . '</span></h1>
							</div>
							<div class="col-12 d-flex justify-content-center">
								<small class="text-muted">dari ' . $this->ModelUlasan->getReviewCounts() . ' ulasan</small>
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
				'menus' => $this->getAllMenusHtml(),
				'settings' => $this->ModelPengaturan->getAllSettings(),
				'shop_locations'	=> $this->ModelToko->getSemuaLokasiToko(),
				'reviews' => $this->getRecentReviewsHtml(),
				'ratings' => $this->getOverallRatingsHtml(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Ulasan Anda berhasil ditambahkan, terimakasih sudah mengulas menu kami :)')
			);
			$this->load->view('home', $data);
		}else{
			$data = array(
				'menus' => $this->getAllMenusHtml(),
				'settings' => $this->ModelPengaturan->getAllSettings(),
				'shop_locations'	=> $this->ModelToko->getSemuaLokasiToko(),
				'reviews' => $this->getRecentReviewsHtml(),
				'ratings' => $this->getOverallRatingsHtml(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Ulasan', 'Maaf, nampaknya ada kesalahan dalam menambahkan ulasan, silahkan coba lagi.')
			);
			$this->load->view('home', $data);
		}

	}

}



 ?>