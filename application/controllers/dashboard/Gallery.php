<?php 


class Gallery extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('component/Modal');
		$this->load->model('dashboard/ModelKamus');
		$this->load->model('dashboard/ModelLogin');
		$this->load->model('dashboard/ModelFoto');
		$this->load->model('dashboard/ModelPengaturan');

		$this->load->library('session');
		$this->load->model('dashboard/ModelLog');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
        $this->logout();
      }else if(null !== $this->input->post('tambahFoto')){
        unset($_POST['tambahFoto']);
        $this->addPhoto();
      }else if(null !== $this->input->post('editFoto')){
        unset($_POST['editFoto']);
        $this->editPhoto();
      }else if(null !== $this->input->post('hapusFoto')){
        unset($_POST['hapusFoto']);
				$this->deletePhoto();
			}else{
				$data = array(
					'accordions' => $this->getPhotosAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings()
				);
				
				$this->load->view('dashboard/gallery', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}

	private function getPhotoCardsHtml()
	{
		$html = '
									<div class="row">
                    <div class="col-md-6 col-lg-4 mb-4" style="min-height: 300px">
                      <div class="card mb-4 shadow-sm h-100 ">
                        <div class="card-body align-middle d-flex h-almost-100">
                          <div class="row justify-content-center align-self-center w-100 m-1">
                            <div class="col-md-12">
                              <center>
                                <a class="card-text" href="#" data-toggle="modal" data-target="#addPhotoModal"><i class="fas fa-plus-circle fa-7x"></i></a>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
		';

		$allPhotos = $this->ModelFoto->getAllPhotos();
		foreach($allPhotos as $photo){
			$html .=
			'
										<div class="col-md-6 col-lg-4 mb-4">
                      <div class="card mb-4 shadow-sm h-100">
                        <img src="' . base_url() . $photo->path_foto . '" class="bd-placeholder-img card-img-top" width="100%" height="225"/>
                        <div class="card-body pb-0">
                          <a href="" data-toggle="modal" data-target="#editPhotoModal" data-id-foto="' . $photo->id_foto . '" data-judul-foto="' . $photo->judul_foto . '" data-path-foto="' . $photo->path_foto . '"><h4 class="font-weight-bold mb-3">' . $photo->judul_foto . '</h4></a>
                        </div>
                        <div class="card-body pt-0 d-flex justify-content-between align-items-end">
                          <div class="btn-group">
                            <a href="" class="text-secondary mr-4" data-toggle="modal" data-target="#editPhotoModal" data-id-foto="' . $photo->id_foto . '" data-judul-foto="' . $photo->judul_foto . '" data-path-foto="' . $photo->path_foto . '"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="" class="text-danger" data-toggle="modal" data-target="#deletePhotoModal" data-id-foto="' . $photo->id_foto . '" data-judul-foto="' . $photo->judul_foto . '"><i class="fas fa-trash"></i> Hapus</a>
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

	private function getPhotosAccordionsHtml()
	{
    $html =
    '
            <div class="card">
                <a class="card-header p-0" href="#" id="heading" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                  <h2 class="mb-0 p-0">
                    <button class="btn btn-link btn-lg" type="button">
                      <i id="accordion" class="fas fa-chevron-down mr-1 accordion-icon"></i> Galeri ' . $this->ModelPengaturan->getTitle() . '
                    </button>
                  </h2>
                </a>

                <div id="collapse" class="collapse show" aria-labelledby="heading" data-parent="#accordion">
                  <div class="card-body pb-0">
    ';
      
    $html .= $this->getPhotoCardsHtml();

    $html .=
    '
                </div>
              </div>
            </div>      
    ';

		return $html;
  }
  
  private function addPhoto(){
		if(isset($_FILES['tambah_foto'])){
			$arrayImageName = explode('.', $_FILES['tambah_foto']['name']);
			$imageExtension = strtolower(end($arrayImageName));
			$namaFoto = str_replace(' ', '_', $this->input->post('tambah_judul_foto')) . '_' . uniqid() . '.' . $imageExtension;
      $pathFolderFoto = 'assets/picture/gallery/';
      $pathFoto = $pathFolderFoto . $namaFoto;

			$photo = array(
        'judul_foto'         => $this->input->post('tambah_judul_foto'),
				'path_foto'      		=> $pathFoto
			);

			if (!file_exists('./' . $pathFolderFoto)) {
				mkdir('./' . $pathFolderFoto, 0777, true);
			}

			$config['upload_path']    = './' . $pathFolderFoto;
			$config['allowed_types']  = 'gif|jpg|png';
			$config['file_name']			= $namaFoto;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('tambah_foto')){
				if($this->ModelFoto->addPhoto($photo)){
					$data = array(
						'accordions' => $this->getPhotosAccordionsHtml(),
					  'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Foto <i>' . $photo['judul_foto'] . '</i> berhasil ditambahkan.')
					);

					$this->ModelLog->insertCreateLog($this->session->userdata('id_pengguna'), 'foto galeri', $photo['judul_foto']);

					$this->load->view('dashboard/gallery', $data);
				}else{
					$data = array(
						'accordions' => $this->getPhotosAccordionsHtml(),
					  'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Foto', 'Maaf, nampaknya ada kesalahan dalam menambah foto, silakan coba lagi nanti.')
					);
					$this->load->view('dashboard/gallery', $data);
				}
			}else{
				$data = array(
					'accordions' => $this->getPhotosAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Foto', 'Maaf, nampaknya foto yang diunggah tidak sesuai, pastikan foto yang diupload berekstensi png, gif, atau jpg!')
				);
				$this->load->view('dashboard/gallery', $data);
			}
		}else{
			$data = array(
				'accordions' => $this->getPhotosAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Foto', 'Maaf, nampaknya Anda belum mengunggah foto, foto tidak boleh kosong.')
			);
			$this->load->view('dashboard/gallery', $data);
		}
  }

  public function editPhoto(){
		if(isset($_FILES['edit_foto']['name']) && $_FILES['edit_foto']['name'] !== ''){
			$arrayImageName = explode('.', $_FILES['edit_foto']['name']);
			$imageExtension = strtolower(end($arrayImageName));
			$namaFoto = str_replace(' ', '_', $this->input->post('edit_judul_foto')) . '_' . uniqid() . '.' . $imageExtension;
      $pathFolderFoto = 'assets/picture/gallery/';
      $pathFoto = $pathFolderFoto . $namaFoto;
			
      $idFoto 	= $this->input->post('edit_id_foto');
      $judulFotoAwal = $this->input->post('edit_judul_foto_awal');
      
			$photo = array(
        'judul_foto'         => $this->input->post('edit_judul_foto'),
				'path_foto'      		=> $pathFoto
			);

			$config['upload_path']    = './' . $pathFolderFoto;
			$config['allowed_types']  = 'gif|jpg|png';
			$config['file_name']			= $namaFoto;
			
      $this->load->library('upload', $config);
      
			if($this->upload->do_upload('edit_foto')){
				if($this->ModelFoto->editPhoto($idFoto, $photo)){
					$data = array(
						'accordions'		=> $this->getPhotosAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Foto <i>' . $judulFotoAwal . '</i> berhasil diperbaharui!')
					);

					$this->ModelLog->insertUpdateLog($this->session->userdata('id_pengguna'), 'foto galeri', $photo['judul_foto']);

					$this->load->view('dashboard/gallery', $data);
				}else{
					$data = array(
						'accordions'		=> $this->getPhotosAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Foto', 'Maaf, nampaknya ada kesalahan dalam memperbaharui foto, silakan coba lagi nanti.')
					);
					$this->load->view('dashboard/gallery', $data);
				}
			}else{
				$data = array(
					'accordions'		=> $this->getPhotosAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Foto', 'Maaf, nampaknya foto yang diunggah tidak sesuai, pastikan foto yang diupload berekstensi png, gif, atau jpg!')
				);
				$this->load->view('dashboard/gallery', $data);
			}
		}else{
      $idFoto 	= $this->input->post('edit_id_foto');
      $judulFotoAwal = $this->input->post('edit_judul_foto_awal');

			$photo = array(
        'judul_foto'         => $this->input->post('edit_judul_foto')
			);

			if($this->ModelFoto->editPhoto($idFoto, $photo)){
				$data = array(
					'accordions'		=> $this->getPhotosAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Foto <i>' . $judulFotoAwal . '</i> berhasil diperbaharui!')
				);

				$this->ModelLog->insertUpdateLog($this->session->userdata('id_pengguna'), 'foto galeri', $photo['judul_foto']);

				$this->load->view('dashboard/gallery', $data);
			}else{
				$data = array(
					'accordions'		=> $this->getPhotosAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Foto', 'Maaf, nampaknya ada kesalahan dalam memperbaharui foto, silakan coba lagi nanti.')
				);
				$this->load->view('dashboard/gallery', $data);
			}
		}
  }

  private function deletePhoto()
	{		
    $idFoto = $this->input->post('hapus_id_foto');
    $judulFoto = $this->input->post('hapus_judul_foto');

		if($this->ModelFoto->deletePhoto($idFoto)){
			$data = array(
				'accordions'		=> $this->getPhotosAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Berhasil menghapus foto <i>' . $judulFoto . '</i>.')
			);
			
			$this->ModelLog->insertDeleteLog($this->session->userdata('id_pengguna'), 'foto galeri', $judulFoto);

			$this->load->view('dashboard/gallery', $data);
		}else{
			$data = array(
				'accordions'		=> $this->getPhotosAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menghapus Foto', 'Maaf, nampaknya ada kesalahan dalam menghapus foto, silakan coba lagi nanti.')
			);
			
			$this->load->view('dashboard/gallery', $data);
		}
		
	}
}

 ?>