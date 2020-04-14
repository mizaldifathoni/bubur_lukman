<?php 


class Shop extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('component/Modal');
		$this->load->model('dashboard/ModelKamus');
		$this->load->model('dashboard/ModelLogin');
		$this->load->model('dashboard/ModelMenuToko');
		$this->load->model('dashboard/ModelToko');
		$this->load->model('dashboard/ModelPengaturan');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}elseif(null !== $this->input->post('tambahToko')){
				unset($_POST['tambahToko']);
				$this->addToko();
			}elseif(null !== $this->input->post('editToko')){
				unset($_POST['editToko']);
				$this->editToko();
			}elseif(null !== $this->input->post('hapusToko')){
				unset($_POST['hapusToko']);
				$this->deleteToko();
			}else{
				$data = array(
					'accordions' => $this->getTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings()
				);
				
				$this->load->view('dashboard/shop', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}

	private function getTokoCardsHtml()
	{
		$html = '
									<div class="row">
                    <div class="col-md-6 col-lg-4 mb-4" style="min-height: 446px">
                      <div class="card mb-4 shadow-sm h-100 ">
                        <div class="card-body align-middle d-flex h-almost-100">
                          <div class="row justify-content-center align-self-center w-100 m-1">
                            <div class="col-md-12">
                              <center>
                                <a class="card-text" href="#" data-toggle="modal" data-target="#addShopModal"><i class="fas fa-plus-circle fa-7x"></i></a>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
		';

		$allShops = $this->ModelToko->getAllToko();
		foreach($allShops as $shop){
			$html .=
			'
										<div class="col-md-6 col-lg-4 mb-4">
                      <div class="card mb-4 shadow-sm h-100">
                        <img src="' . base_url() . $shop->foto_toko . '" class="bd-placeholder-img card-img-top" width="100%" height="225"/>
                        <div class="card-body">
                        <a href="" data-toggle="modal" data-target="#editShopModal" data-id-toko="' . $shop->id_toko . '" data-nama-toko="' . $shop->nama_toko . '" data-lokasi-toko="' . $shop->lokasi_toko . '" data-foto-toko="' . $shop->foto_toko . '"><h4 class="font-weight-bold mb-3">' . $shop->nama_toko . '</h4></a>
                          <p class="card-text">' . $shop->lokasi_toko . '</p>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-end">
                          <div class="btn-group">
                            <a href="" class="text-secondary mr-4" data-toggle="modal" data-target="#editShopModal" data-id-toko="' . $shop->id_toko . '" data-nama-toko="' . $shop->nama_toko . '" data-lokasi-toko="' . $shop->lokasi_toko . '" data-foto-toko="' . $shop->foto_toko . '"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="" class="text-danger" data-toggle="modal" data-target="#deleteShopModal" data-id-toko="' . $shop->id_toko .  '" data-nama-toko="' . $shop->nama_toko . '"><i class="fas fa-trash"></i> Hapus</a>
                          </div>
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

	private function getTokoAccordionsHtml()
	{
    $html =
    '
            <div class="card">
                <a class="card-header p-0" href="#" id="heading" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                  <h2 class="mb-0 p-0">
                    <button class="btn btn-link btn-lg" type="button">
                      <i id="accordion" class="fas fa-chevron-down mr-1 accordion-icon"></i> Toko ' . $this->ModelPengaturan->getTitle() . '
                    </button>
                  </h2>
                </a>

                <div id="collapse" class="collapse show" aria-labelledby="heading" data-parent="#accordion">
                  <div class="card-body pb-0">
    ';
      
    $html .= $this->getTokoCardsHtml();

    $html .=
    '
                </div>
              </div>
            </div>      
    ';

		return $html;
	}

	public function addToko(){
		if(isset($_FILES['tambah_foto_toko'])){
			$arrayImageName = explode('.', $_FILES['tambah_foto_toko']['name']);
			$imageExtension = strtolower(end($arrayImageName));
			$namaFotoToko   = 'foto_' . str_replace(' ', '_', $this->input->post('tambah_nama_toko')) . '_' . uniqid() . '.' . $imageExtension;

			$toko = array(
				'nama_toko'							=> $this->input->post('tambah_nama_toko'),
				'lokasi_toko' 				=> $this->input->post('tambah_lokasi_toko'),
				'foto_toko'						=> 'assets/picture/toko/' . $namaFotoToko
			);

			if (!file_exists('./assets/picture/toko/')) {
				mkdir('./assets/picture/toko/', 0777, true);
			}

			$config['upload_path']    = './assets/picture/toko/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['file_name']			= $namaFotoToko;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('tambah_foto_toko')){
				if($this->ModelToko->addToko($toko)){
					$data = array(
						'accordions'		=> $this->getTokoAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Toko <i>' . $toko['nama_toko'] . '</i> berhasil ditambahkan.')
					);
					$this->load->view('dashboard/shop', $data);
				}else{
					$data = array(
						'accordions'		=> $this->getTokoAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Toko', 'Whoops! Nampaknya ada kesalahan dalam menambah toko, silakan coba lagi nanti.')
					);
					$this->load->view('dashboard/shop', $data);
				}
			}else{
				$data = array(
					'accordions'		=> $this->getTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Toko', 'Whoops! Nampaknya foto yang diunggah tidak sesuai, pastikan foto yang diupload berekstensi png, gif, atau jpg!')
				);
				$this->load->view('dashboard/shop', $data);
			}
		}else{
			$data = array(
				'accordions'		=> $this->getTokoAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Toko', 'Whoops! Nampaknya Anda belum mengunggah foto toko, foto toko tidak boleh kosong.')
			);
			$this->load->view('dashboard/shop', $data);
		}
		
	}

	public function editToko(){
    $idToko 	= $this->input->post('edit_id_toko');
		if(isset($_FILES['edit_foto_toko']['name']) && $_FILES['edit_foto_toko']['name'] !== ''){
			$arrayImageName = explode('.', $_FILES['edit_foto_toko']['name']);
			$imageExtension = strtolower(end($arrayImageName));
			$namaFotoToko = 'foto_' . str_replace(' ', '_', $this->input->post('edit_nama_toko')) . '_' . uniqid() . '.' . $imageExtension;

			$toko = array(
				'nama_toko'							=> $this->input->post('edit_nama_toko'),
				'lokasi_toko' 				=> $this->input->post('edit_lokasi_toko'),
				'foto_toko'						=> 'assets/picture/toko/' . $namaFotoToko
			);

			$config['upload_path']    = './assets/picture/toko/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['file_name']			= $namaFotoToko;
      
      if(isset($this->upload)) unset($this->upload);
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('edit_foto_toko')){
				if($this->ModelToko->editToko($idToko, $toko)){
					$data = array(
						'accordions'		=> $this->getTokoAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Toko <i>' . $toko['nama_toko'] . '</i> berhasil diperbaharui!')
					);
					$this->load->view('dashboard/shop', $data);
				}else{
					$data = array(
						'accordions'		=> $this->getTokoAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Toko', 'Whoops! Nampaknya ada kesalahan dalam memperbaharui toko, silakan coba lagi nanti.')
					);
					$this->load->view('dashboard/shop', $data);
				}
			}else{
				$data = array(
					'accordions'		=> $this->getTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Toko', 'Whoops! Nampaknya foto yang diunggah tidak sesuai, pastikan foto yang diupload berekstensi png, gif, atau jpg!')
				);
				$this->load->view('dashboard/shop', $data);
			}
		}else{

      $toko = array(
				'nama_toko'							=> $this->input->post('edit_nama_toko'),
				'lokasi_toko' 				=> $this->input->post('edit_lokasi_toko'),
			);
			
			if($this->ModelToko->editToko($idToko, $toko)){
				$data = array(
					'accordions'		=> $this->getTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Toko <i>' . $toko['nama_toko'] . '</i> berhasil diperbaharui!')
				);
				$this->load->view('dashboard/shop', $data);
			}else{
				$data = array(
					'accordions'		=> $this->getTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Toko', 'Whoops! Nampaknya ada kesalahan dalam memperbaharui toko, silakan coba lagi nanti.')
				);
				$this->load->view('dashboard/shop', $data);
			}
		}
	}

	private function deleteToko()
	{		
		$idToko = $this->input->post('hapus_id_toko');

		if($this->ModelToko->deleteToko($idToko)){
			$data = array(
				'accordions'		=> $this->getTokoAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Berhasil menghapus toko <i>' . $this->input->post('hapus_nama_toko') . '</i>.')
			);
			
			$this->load->view('dashboard/shop', $data);
		}else{
			$data = array(
				'accordions'		=> $this->getTokoAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menghapus Toko', 'Whoops! Nampaknya ada kesalahan dalam menghapus toko, silakan coba lagi nanti.')
			);
			
			$this->load->view('dashboard/shop', $data);
		}
		
	}
}

 ?>