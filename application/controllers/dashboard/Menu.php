<?php 


class Menu extends CI_Controller
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

		$this->load->library('session');
		$this->load->model('dashboard/ModelLog');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}elseif(null !== $this->input->post('tambahMenu')){
				unset($_POST['tambahMenu']);
				$this->addMenu();
			}elseif(null !== $this->input->post('editMenu')){
				unset($_POST['editMenu']);
				$this->editMenu();
			}elseif(null !== $this->input->post('hapusMenu')){
				unset($_POST['hapusMenu']);
				$this->deleteMenu();
			}else{
				$data = array(
					'accordions' => $this->getMenuTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings()
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
                    <div class="col-md-6 col-lg-4 mb-4" style="min-height: 446px">
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

		$allMenus = $this->ModelMenuToko->getAllMenusByIdToko($idToko);
		foreach($allMenus as $menu){
			$html .=
			'
										<div class="col-md-6 col-lg-4 mb-4">
                      <div class="card mb-4 shadow-sm h-100">
                        <img src="' . base_url('assets/picture/menu-toko/' . $idToko . '/') . $menu->nama_thumbnail_menu . '" class="bd-placeholder-img card-img-top" width="100%" height="225"/>
                        <div class="card-body">
												<a href="" data-toggle="modal" data-target="#editMenuModal" data-id-toko="' . $idToko . '" data-id-menu-toko="' . $menu->id_menu_toko .  '" data-nama-menu="' . $menu->nama_menu . '" data-nama-toko="' . $namaToko . '" data-deskripsi-menu="' . $menu->deskripsi_menu . '" data-tipe-menu="' . $this->ModelKamus->getKamusById($menu->id_tipe_menu) . '" data-harga-menu="' . $menu->harga_menu . '" data-diskon-menu="' . $menu->diskon_menu . '" data-foto-thumbnail="' . $menu->nama_thumbnail_menu . '"><h4 class="font-weight-bold mb-3">' . $menu->nama_menu . '</h4></a>
                          <p class="card-text">' . $menu->deskripsi_menu . '</p>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-end">
                          <div class="btn-group">
                            <a href="" class="text-secondary mr-4" data-toggle="modal" data-target="#editMenuModal" data-id-toko="' . $idToko . '" data-id-menu-toko="' . $menu->id_menu_toko .  '" data-nama-menu="' . $menu->nama_menu . '" data-nama-toko="' . $namaToko . '" data-deskripsi-menu="' . $menu->deskripsi_menu . '" data-tipe-menu="' . $this->ModelKamus->getKamusById($menu->id_tipe_menu) . '" data-harga-menu="' . $menu->harga_menu . '" data-diskon-menu="' . $menu->diskon_menu . '" data-foto-thumbnail="' . $menu->nama_thumbnail_menu . '"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="" class="text-danger" data-toggle="modal" data-target="#deleteMenuModal" data-id-menu-toko="' . $menu->id_menu_toko .  '" data-nama-menu="' . $menu->nama_menu . '" data-nama-toko="' . $namaToko . '"><i class="fas fa-trash"></i> Hapus</a>
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

		$i = 0;
		$tokoCount = count($allToko);
		$lastToko = false;
		foreach($allToko as $toko){
			if(++$i === $tokoCount) $lastToko = true;
			$html .=
			'
						<div class="card">
              <a class="card-header p-0" href="#" id="heading' . $toko->id_toko . '" data-toggle="collapse" data-target="#collapse' . $toko->id_toko . '" aria-expanded="true" aria-controls="collapse' . $toko->id_toko . '">
                <h2 class="mb-0 p-0">
                  <button class="btn btn-link btn-lg" type="button">
                    <i id="accordion' . $toko->id_toko . '" class="fas ' . (($lastToko)? 'fa-chevron-down' : 'fa-chevron-right' ) . ' mr-1 accordion-icon"></i> ' . $toko->nama_toko . '
                  </button>
                </h2>
              </a>

              <div id="collapse' . $toko->id_toko . '" class="collapse ' . (($lastToko)? 'show' : '' ). '" aria-labelledby="heading' . $toko->id_toko . '" data-parent="#accordion">
                <div class="card-body pb-0">
			';
			
			$html .= $this->getMenuCardsHtml($toko->id_toko);

			$html .=
			'
                </div>
              </div>
            </div>
			';	
		}

		$html .=
		'
					</div>
		';

		return $html;
	}

	public function addMenu(){
		if(isset($_FILES['tambah_foto_menu'])){
			$arrayImageName = explode('.', $_FILES['tambah_foto_menu']['name']);
			$imageExtension = strtolower(end($arrayImageName));
			$namaFotoMenu = uniqid() . '.' . $imageExtension;
			$namaToko = $this->input->post('tambah_nama_toko');

			$menu = array(
				'id_toko'								=> $this->input->post('tambah_id_toko'),
				'id_tipe_menu'					=> $this->ModelKamus->getIdKamusInKategori($this->input->post('tambah_tipe_menu'), 'tipe_menu_toko'),
				'nama_menu'							=> $this->input->post('tambah_nama_menu'),
				'deskripsi_menu' 				=> $this->input->post('tambah_deskripsi_menu'),
				'harga_menu'						=> $this->input->post('tambah_harga_menu'),
				'diskon_menu'						=> $this->input->post('tambah_diskon_menu'),
				'nama_thumbnail_menu'		=> $namaFotoMenu
			);

			if (!file_exists('./assets/picture/menu-toko/' . $menu['id_toko'] . '/')) {
				mkdir('./assets/picture/menu-toko/' . $menu['id_toko'] . '/', 0777, true);
			}

			$config['upload_path']    = './assets/picture/menu-toko/' . $menu['id_toko'] . '/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['file_name']			= $namaFotoMenu;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('tambah_foto_menu')){
				if($this->ModelMenuToko->insertMenu($menu)){
					$data = array(
						'accordions'		=> $this->getMenuTokoAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Menu <i>' . $menu['nama_menu'] . '</i> berhasil ditambahkan ke toko <i>' . $namaToko . '</i>.')
					);

					$this->ModelLog->insertCreateLog($this->session->userdata('id_pengguna'), 'menu restoran', $menu['nama_menu']);

					$this->load->view('dashboard/menu', $data);
				}else{
					$data = array(
						'accordions'		=> $this->getMenuTokoAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Menu', 'Whoops! Nampaknya ada kesalahan dalam menambah menu, silakan coba lagi nanti.')
					);
					$this->load->view('dashboard/menu', $data);
				}
			}else{
				$data = array(
					'accordions'		=> $this->getMenuTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Menu', 'Whoops! Nampaknya foto yang diunggah tidak sesuai, pastikan foto yang diupload berekstensi png, gif, atau jpg!')
				);
				$this->load->view('dashboard/menu', $data);
			}
		}else{
			$data = array(
				'accordions'		=> $this->getMenuTokoAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Menu', 'Whoops! Nampaknya Anda belum mengunggah foto menu, foto menu tidak boleh kosong.')
			);
			$this->load->view('dashboard/menu', $data);
		}
		
	}

	public function editMenu(){
		if(isset($_FILES['edit_foto_menu']['name']) && $_FILES['edit_foto_menu']['name'] !== ''){
			$arrayImageName = explode('.', $_FILES['edit_foto_menu']['name']);
			$imageExtension = strtolower(end($arrayImageName));
			$namaFotoMenu = uniqid() . '.' . $imageExtension;
			
			$idToko 	= $this->input->post('edit_id_toko');
			$namaToko = $this->input->post('edit_nama_toko');
			$idMenu		= $this->input->post('edit_id_menu_toko');

			$menu = array(
				'id_tipe_menu'					=> $this->ModelKamus->getIdKamusInKategori($this->input->post('edit_tipe_menu'), 'tipe_menu_toko'),
				'nama_menu'							=> $this->input->post('edit_nama_menu'),
				'deskripsi_menu' 				=> $this->input->post('edit_deskripsi_menu'),
				'harga_menu'						=> $this->input->post('edit_harga_menu'),
				'diskon_menu'						=> $this->input->post('edit_diskon_menu'),
				'nama_thumbnail_menu'		=> $namaFotoMenu
			);

			$config['upload_path']    = './assets/picture/menu-toko/' . $idToko . '/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['file_name']			= $namaFotoMenu;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('edit_foto_menu')){
				if($this->ModelMenuToko->editMenu($idMenu, $menu)){
					$data = array(
						'accordions'		=> $this->getMenuTokoAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Menu pada toko <i>' . $namaToko . '</i> berhasil diperbaharui!')
					);

					$this->ModelLog->insertUpdateLog($this->session->userdata('id_pengguna'), 'menu restoran', $menu['nama_menu'] . ' pada toko ' . $namaToko);

					$this->load->view('dashboard/menu', $data);
				}else{
					$data = array(
						'accordions'		=> $this->getMenuTokoAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Menu', 'Whoops! Nampaknya ada kesalahan dalam memperbaharui menu, silakan coba lagi nanti.')
					);
					$this->load->view('dashboard/menu', $data);
				}
			}else{
				$data = array(
					'accordions'		=> $this->getMenuTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Menu', 'Whoops! Nampaknya foto yang diunggah tidak sesuai, pastikan foto yang diupload berekstensi png, gif, atau jpg!')
				);
				$this->load->view('dashboard/menu', $data);
			}
		}else{
			$namaToko = $this->input->post('edit_nama_toko');
			$idMenu		= $this->input->post('edit_id_menu_toko');

			$menu = array(
				'id_tipe_menu'					=> $this->ModelKamus->getIdKamusInKategori($this->input->post('edit_tipe_menu'), 'tipe_menu_toko'),
				'nama_menu'							=> $this->input->post('edit_nama_menu'),
				'deskripsi_menu' 				=> $this->input->post('edit_deskripsi_menu'),
				'harga_menu'						=> $this->input->post('edit_harga_menu'),
				'diskon_menu'						=> $this->input->post('edit_diskon_menu'),
			);
			
			if($this->ModelMenuToko->editMenu($idMenu, $menu)){
				$data = array(
					'accordions'		=> $this->getMenuTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Menu pada toko <i>' . $namaToko . '</i> berhasil diperbaharui!')
				);

				$this->ModelLog->insertUpdateLog($this->session->userdata('id_pengguna'), 'menu restoran', $menu['nama_menu'] . ' pada toko ' . $namaToko);

				$this->load->view('dashboard/menu', $data);
			}else{
				$data = array(
					'accordions'		=> $this->getMenuTokoAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Menu', 'Whoops! Nampaknya ada kesalahan dalam memperbaharui menu, silakan coba lagi nanti.')
				);
				$this->load->view('dashboard/menu', $data);
			}
		}
	}

	private function deleteMenu()
	{		
		$idMenu = $this->input->post('hapus_id_menu_toko');

		if($this->ModelMenuToko->deleteMenu($idMenu)){
			$data = array(
				'accordions'		=> $this->getMenuTokoAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Berhasil menghapus menu <i>' . $this->input->post('hapus_nama_menu') . '</i> dari toko <i>' . $this->input->post('hapus_nama_toko') . '</i>.')
			);
			
			$this->ModelLog->insertDeleteLog($this->session->userdata('id_pengguna'), 'menu restoran', $this->input->post('hapus_nama_menu') . ' pada toko ' . $this->input->post('hapus_nama_toko'));

			$this->load->view('dashboard/menu', $data);
		}else{
			$data = array(
				'accordions'		=> $this->getMenuTokoAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menghapus Menu', 'Whoops! Nampaknya ada kesalahan dalam menghapus menu, silakan coba lagi nanti.')
			);
			
			$this->load->view('dashboard/menu', $data);
		}
		
	}
}

 ?>