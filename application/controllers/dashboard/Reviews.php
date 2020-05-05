<?php 


class Reviews extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('component/Modal');
		$this->load->model('component/Time');
		$this->load->model('dashboard/ModelKamus');
		$this->load->model('dashboard/ModelLogin');
		$this->load->model('dashboard/ModelPengaturan');
		$this->load->model('dashboard/ModelUlasan');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}else{
				$data = array(
					'settings'			=> $this->ModelPengaturan->getAllSettings(),
					'shop_reviews'	=> $this->getShopReviewsHtml()
				);
				
				$this->load->view('dashboard/reviews', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}

  private function getShopReviewsHtml() {
		$reviews = $this->ModelUlasan->getAllReviews();

		$html = '';
		
		if($reviews == null){

		} else {
			$overallRatings = $this->ModelUlasan->getOverallRatings();
			$reviewsCount = count($reviews);

			$html .= '
						<div class="tab-pane fade pt-4 px-4 show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
              <div class="row">
                <div class="col-lg-12 pt-3 pb-5">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                      <strong class="d-inline-block mb-3">Total Rating</strong>
                    </div>
                    <div class="col-12 d-flex justify-content-center mb-3">
                      <h1 class="text-primary d-flex align-items-center"><i class="fa fa-star fa-3x mr-3"></i> <span class="display-4">' . $overallRatings . '</span></h1>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                      <small class="text-muted">dari ' . $reviewsCount . ' ulasan</small>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-5">
                  <div class="text-center">
                    <button id="allShopReviews" class="btn btn-light active" onclick="filterButtonClicked(this)" data-filter="shop*">Semua</button>
                    <button id="positiveShopReviews" onclick="filterButtonClicked(this)" class="btn btn-light" data-filter="shoppositive">Positif</button>
                    <button id="negativeShopReviews" onclick="filterButtonClicked(this)" class="btn btn-light" data-filter="shopnegative">Negatif</button>
                  </div>
                </div>
              </div>
              <div class="row">
			';

			foreach($reviews as $review) {
				$isPositiveReview = ($review->rating_toko >= 3);

				$html .= '
								<div class="col-lg-12 mb-4 ' . (($isPositiveReview)? 'shoppositive' : 'shopnegative') . '">
                  <div class="card shadow-sm rounded">
                    <div class="card-body align-middle d-flex h-almost-100">
                      <div class="row justify-content-center align-self-center w-100 m-1">
                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                          <div class="rounded-circle mtm-5 mbm-5" width="140" height="140">
                            <i class="fa fa-user fa-5x"></i>
                          </div>
                        </div>
                        <div class="col-lg-10 d-flex flex-column align-items-start pr-0">
                          <strong class="d-inline-block mb-2">' . $review->nama_pengulas . '</strong>
                          <p class="mb-3">' . $review->isi_ulasan_toko . '</p>
                          <div class="row w-100 d-flex justify-content-between pl-3">
                            <div class="col-xs-6">
				';

				for($i=1; $i<=$review->rating_toko; $i++){
					$html .= '
															<i class="fa fa-star text-primary mb-1"></i>
					';
				}

				for($i=$review->rating_toko+1; $i<=5; $i++){
					$html .= '
															<i class="fa fa-star text-muted mb-1"></i>
					';
				}
															
				$html .= '
                            </div>
                            <div class="col-xs-6">
                              <small class="mb-1 text-muted">' . $this->Time->relativeTime(strtotime($review->tanggal_ulasan_toko)) . '</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
				';
			}
			

			$html .= '
                
              </div>
            </div>
			';
		}
		
		return $html;
  }
}

 ?>