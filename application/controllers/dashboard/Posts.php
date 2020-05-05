<?php 


class Posts extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('component/Modal');
		$this->load->model('dashboard/ModelKamus');
		$this->load->model('dashboard/ModelLogin');
		$this->load->model('dashboard/ModelPosting');
		$this->load->model('dashboard/ModelPengaturan');
  }

	public function index()
	{
		if($this->ModelLogin->isAccessable()){
			if(null !== $this->input->post('inputLogout')){
				$this->logout();
			}elseif(null !== $this->input->post('buatPosting')){
				unset($_POST['buatPosting']);
				$this->addPost();
			}elseif(null !== $this->input->post('editPosting')){
				unset($_POST['editPosting']);
				$this->editPost();
			}elseif(null !== $this->input->post('hapusPosting')){
				unset($_POST['hapusPosting']);
				$this->deletePost();
			}else{
				$data = array(
					'accordions' => $this->getPostsAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings()
				);
				
				$this->load->view('dashboard/posts', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}

	private function getPostCardsHtml()
	{
		$html = '
									<div class="row">
                    <div class="col-md-6 col-lg-4 mb-4" style="min-height: 300px">
                      <div class="card mb-4 shadow-sm h-100 ">
                        <div class="card-body align-middle d-flex h-almost-100">
                          <div class="row justify-content-center align-self-center w-100 m-1">
                            <div class="col-md-12">
                              <center>
                                <a class="card-text" href="#" data-toggle="modal" data-target="#addPostModal"><i class="fas fa-plus-circle fa-7x"></i></a>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
		';

		$allPosts = $this->ModelPosting->getAllPosts();
		foreach($allPosts as $post){
      $labelHtml = '';
      if($post->label == "berita") {
        $labelHtml = '<span class="badge badge-info p-1">Berita</span>';
      }else{
        $labelHtml = '<span class="badge badge-success p-1">Promo</span>';
      }

			$html .=
			'
										<div class="col-md-6 col-lg-4 mb-4">
                      <div class="card mb-4 shadow-sm h-100">
                        <img src="' . base_url() . $post->foto_posting . '" class="bd-placeholder-img card-img-top" width="100%" height="225"/>
                        <div class="card-body pb-0">
                          <a href="" data-toggle="modal" data-target="#editPostModal" data-id-posting="' . $post->id_posting . '" data-judul-posting="' . $post->judul_posting . '" data-tipe-posting="' . $post->label .'" data-isi-posting="' . $post->isi_posting . '" data-foto-posting="' . $post->foto_posting . '"><h4 class="font-weight-bold">' . $post->judul_posting . '</h4></a>
                        </div>
                        <div class="card-body pt-0 d-flex justify-content-between align-items-end">
                          <div class="btn-group">
                            <a href="" class="text-secondary mr-4" data-toggle="modal" data-target="#editPostModal" data-id-posting="' . $post->id_posting . '" data-judul-posting="' . $post->judul_posting . '" data-tipe-posting="' . $post->label .'" data-isi-posting="' . $post->isi_posting . '" data-foto-posting="' . $post->foto_posting . '"><i class="fas fa-pencil-square-o"></i> Edit</a>
                            <a href="" class="text-danger" data-toggle="modal" data-target="#deletePostModal" data-id-posting="' . $post->id_posting . '" data-judul-posting="' . $post->judul_posting . '"><i class="fas fa-trash"></i> Hapus</a>
                          </div>
                          <div>
                            ' . $labelHtml . '
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

	private function getPostsAccordionsHtml()
	{
    $html =
    '
            <div class="card">
                <a class="card-header p-0" href="#" id="heading" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                  <h2 class="mb-0 p-0">
                    <button class="btn btn-link btn-lg" type="button">
                      <i id="accordion" class="fas fa-chevron-down mr-1 accordion-icon"></i> Postingan ' . $this->ModelPengaturan->getTitle() . '
                    </button>
                  </h2>
                </a>

                <div id="collapse" class="collapse show" aria-labelledby="heading" data-parent="#accordion">
                  <div class="card-body pb-0">
    ';
      
    $html .= $this->getPostCardsHtml();

    $html .=
    '
                </div>
              </div>
            </div>      
    ';

		return $html;
  }
  
  public function addPost(){
		if(isset($_FILES['buat_foto_posting'])){
			$arrayImageName = explode('.', $_FILES['buat_foto_posting']['name']);
			$imageExtension = strtolower(end($arrayImageName));
			$namaFotoPosting = str_replace(' ', '_', $this->input->post('buat_judul_posting')) . '_' . uniqid() . '.' . $imageExtension;
      $pathFolderFotoPosting = 'assets/picture/posts/';
      $pathFotoPosting = $pathFolderFotoPosting . $namaFotoPosting;

			$post = array(
        'judul_posting'         => $this->input->post('buat_judul_posting'),
				'id_tipe_posting'				=> $this->ModelKamus->getIdKamusInKategori($this->input->post('buat_jenis_posting'), 'tipe_posting'),
				'isi_posting'						=> $this->input->post('buat_isi_posting'),
				'foto_posting'      		=> $pathFotoPosting
			);

			if (!file_exists('./' . $pathFolderFotoPosting)) {
				mkdir('./' . $pathFolderFotoPosting, 0777, true);
			}

			$config['upload_path']    = './' . $pathFolderFotoPosting;
			$config['allowed_types']  = 'gif|jpg|png';
			$config['file_name']			= $namaFotoPosting;
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('buat_foto_posting')){
				if($this->ModelPosting->addPost($post)){
					$data = array(
						'accordions' => $this->getPostsAccordionsHtml(),
					  'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', '<i>' . $post['judul_posting'] . '</i> berhasil diposting.')
					);
					$this->load->view('dashboard/posts', $data);
				}else{
					$data = array(
						'accordions' => $this->getPostsAccordionsHtml(),
					  'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Menu', 'Maaf, nampaknya ada kesalahan dalam menambah menu, silakan coba lagi nanti.')
					);
					$this->load->view('dashboard/posts', $data);
				}
			}else{
				$data = array(
					'accordions' => $this->getPostsAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Menu', 'Maaf, nampaknya foto yang diunggah tidak sesuai, pastikan foto yang diupload berekstensi png, gif, atau jpg!')
				);
				$this->load->view('dashboard/posts', $data);
			}
		}else{
			$data = array(
				'accordions' => $this->getPostsAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menambah Menu', 'Maaf, nampaknya Anda belum mengunggah foto posting, foto posting tidak boleh kosong.')
			);
			$this->load->view('dashboard/posts', $data);
		}
		
  }
  
  public function editPost(){
		if(isset($_FILES['edit_foto_posting']['name']) && $_FILES['edit_foto_posting']['name'] !== ''){
			$arrayImageName = explode('.', $_FILES['edit_foto_posting']['name']);
			$imageExtension = strtolower(end($arrayImageName));
			$namaFotoPosting = str_replace(' ', '_', $this->input->post('edit_judul_posting')) . '_' . uniqid() . '.' . $imageExtension;
      $pathFolderFotoPosting = 'assets/picture/posts/';
      $pathFotoPosting = $pathFolderFotoPosting . $namaFotoPosting;
			
      $idPosting 	= $this->input->post('edit_id_posting');
      $judulPostingAwal = $this->input->post('edit_judul_posting_awal');
      
			$post = array(
        'id_tipe_posting'				=> $this->ModelKamus->getIdKamusInKategori($this->input->post('edit_jenis_posting'), 'tipe_posting'),
        'foto_posting'      		=> $pathFotoPosting,
        'judul_posting'         => $this->input->post('edit_judul_posting'),
				'isi_posting'						=> $this->input->post('edit_isi_posting')
			);

			$config['upload_path']    = './' . $pathFolderFotoPosting;
			$config['allowed_types']  = 'gif|jpg|png';
			$config['file_name']			= $namaFotoPosting;
			
      $this->load->library('upload', $config);
      
			if($this->upload->do_upload('edit_foto_posting')){
				if($this->ModelPosting->editPost($idPosting, $post)){
					$data = array(
						'accordions'		=> $this->getPostsAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Post <i>' . $judulPostingAwal . '</i> berhasil diperbaharui!')
					);
					$this->load->view('dashboard/posts', $data);
				}else{
					$data = array(
						'accordions'		=> $this->getPostsAccordionsHtml(),
						'settings'		=> $this->ModelPengaturan->getAllSettings(),
						'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Posting', 'Maaf, nampaknya ada kesalahan dalam memperbaharui posting, silakan coba lagi nanti.')
					);
					$this->load->view('dashboard/posts', $data);
				}
			}else{
				$data = array(
					'accordions'		=> $this->getPostsAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Posting', 'Maaf, nampaknya foto yang diunggah tidak sesuai, pastikan foto yang diupload berekstensi png, gif, atau jpg!')
				);
				$this->load->view('dashboard/posts', $data);
			}
		}else{
      $idPosting = $this->input->post('edit_id_posting');
      $judulPostingAwal = $this->input->post('edit_judul_posting_awal');

			$post = array(
        'id_tipe_posting'				=> $this->ModelKamus->getIdKamusInKategori($this->input->post('edit_jenis_posting'), 'tipe_posting'),
        'judul_posting'         => $this->input->post('edit_judul_posting'),
				'isi_posting'						=> $this->input->post('edit_isi_posting')
			);

			if($this->ModelPosting->editPost($idPosting, $post)){
				$data = array(
					'accordions'		=> $this->getPostsAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Post <i>' . $judulPostingAwal . '</i> berhasil diperbaharui!')
				);
				$this->load->view('dashboard/posts', $data);
			}else{
				$data = array(
					'accordions'		=> $this->getPostsAccordionsHtml(),
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Posting', 'Maaf, nampaknya ada kesalahan dalam memperbaharui posting, silakan coba lagi nanti.')
				);
				$this->load->view('dashboard/posts', $data);
			}
		}
  }
  
  private function deletePost()
	{		
    $idPosting = $this->input->post('hapus_id_posting');
    $judulPosting = $this->input->post('hapus_judul_posting');

		if($this->ModelPosting->deletePost($idPosting)){
			$data = array(
				'accordions'		=> $this->getPostsAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Berhasil menghapus post <i>' . $judulPosting . '</i>.')
			);
			
			$this->load->view('dashboard/posts', $data);
		}else{
			$data = array(
				'accordions'		=> $this->getPostsAccordionsHtml(),
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Menghapus Menu', 'Maaf, nampaknya ada kesalahan dalam menghapus posting, silakan coba lagi nanti.')
			);
			
			$this->load->view('dashboard/posts', $data);
		}
		
	}
}

 ?>