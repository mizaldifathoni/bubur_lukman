<?php 


class Menu extends CI_Controller
{
	
	function __construct()
  {
    parent::__construct();
		$this->load->model('dashboard/ModelLogin');
		$this->load->model('dashboard/ModelMenuToko');
		$this->load->model('dashboard/ModelToko');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}else{
				$data = array(
					'accordions' => $this->getMenuTokoAccordionsHtml()
				);
				
				$this->load->view('dashboard/menu', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}



	private function getMenuCardsHtml($idToko)
	{
		$namaToko = $this->ModelToko->getNamaTokoByIdToko($idToko);

		$html = '
									<div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                      <div class="card mb-4 shadow-sm h-100 ">
                        <div class="card-body align-middle d-flex h-almost-100">
                          <div class="row justify-content-center align-self-center w-100 m-1">
                            <div class="col-md-12">
                              <center>
                                <a class="card-text" href="#" data-toggle="modal" data-target="#addMenuModal" data-id-toko="' . $idToko .  '" data-nama-toko="' . $namaToko . '"><i class="fas fa-plus-circle fa-7x"></i></a>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
		';

		$allMenus = $this->ModelMenuToko->getAllMenus();
		foreach($allMenus as $menu){
			$html .=
			'
										<div class="col-md-6 col-lg-4 mb-4">
                      <div class="card mb-4 shadow-sm h-100">
                        <img src="' . base_url('assets/picture/menu-toko/') . $menu->nama_thumbnail_menu . '" class="bd-placeholder-img card-img-top" width="100%" height="225"/>
                        <div class="card-body">
                          <h4 class="font-weight-bold">' . $menu->nama_menu . '</h4>
                          <p class="card-text">' . $menu->deskripsi_menu . '</p>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-end">
                          <div class="btn-group">
                            <a href="" class="text-secondary mr-4"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href=""class="text-danger"><i class="fas fa-trash"></i> Hapus</a>
                          </div>
                          <span class="text-muted">Rp ' . $menu->harga_menu . '</span>
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

		$html =
		'
					<div class="accordion" id="accordion">
		';

		$firstTime = true;
		foreach($allToko as $toko){
			$html .=
			'
						<div class="card">
              <a class="card-header p-0" href="#" id="heading' . $toko->id_toko . '" data-toggle="collapse" data-target="#collapse' . $toko->id_toko . '" aria-expanded="true" aria-controls="collapse' . $toko->id_toko . '">
                <h2 class="mb-0 p-0">
                  <button class="btn btn-link btn-lg" type="button">
                    <i id="accordion' . $toko->id_toko . '" class="fas fa-chevron-down mr-1 accordion-icon"></i> ' . $toko->nama_toko . '
                  </button>
                </h2>
              </a>

              <div id="collapse' . $toko->id_toko . '" class="collapse ' . (($firstTime)? 'show' : '' ). '" aria-labelledby="heading' . $toko->id_toko . '" data-parent="#accordion">
                <div class="card-body pb-0">
			';
			
			$html .= $this->getMenuCardsHtml($toko->id_toko);

			$html .=
			'
                </div>
              </div>
            </div>
			';	

			$firstTime = false;
		}

		$html .=
		'
					</div>
		';

		return $html;
	}
}

 ?>