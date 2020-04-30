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
		$this->load->model('dashboard/ModelStatistik');
  }
	
	public function index()
	{
		if(null !== $this->input->post('tambahUlasan')){
			$this->addReview();
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
										// <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Sangat Bagus"> </label>
										// <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Bagus"> </label>
										// <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Biasa Saja"> </label>
										// <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Buruk"> </label>
										// <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sangat Buruk"> </label>
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
							<div class="col-xs-6">
								<span class="mb-1 text-primary">';
								
			for($star=1; $star<= $review->rating_toko; $star++){
					$html .= '<i class="fa fa-star"></i>';
			}

			$html .= '</span><span class="mb-1 text-muted>';

			for($star=$review->rating_toko; $star<=5; $star++){
				$html .= '<i class="fa fa-star"></i>';
			}

			$reviewTime = strtotime($review->tanggal_ulasan_toko);
							
			$html .=
			'
								</span>
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

}



 ?>