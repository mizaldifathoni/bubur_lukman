<?php 


class Settings extends CI_Controller
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
			}elseif(null !== $this->input->post('updateBaseSettings')){
				unset($_POST['updateBaseSettings']);
				$this->updateBaseSettings();
			}elseif(null !== $this->input->post('updateContactSettings')){
				unset($_POST['updateContactSettings']);
				$this->updateContactSettings();
			}elseif(null !== $this->input->post('updateOpeningHoursSettings')){
				unset($_POST['updateOpeningHoursSettings']);
				$this->updateOpeningHoursSettings();
			}else{
				$data = array(
					'settings'		=> $this->ModelPengaturan->getAllSettings()
				);
				
				$this->load->view('dashboard/settings', $data);
			}
		}else{
			redirect(base_url('dashboard/login'));
		}
	}

	private function logout()
	{
		$this->ModelLogin->destroyAccess();
	}

	public function updateBaseSettings()
	{
		$isLogoNotNull = isset($_FILES['logo']['name']) && $_FILES['logo']['name'] !== '';
		$isPhotoNotNull = isset($_FILES['foto_toko']['name']) && $_FILES['foto_toko']['name'] !== '';

		$isLogoUploadSuccess = true;
		$isPhotoUploadSuccess = true;

		$title = $this->input->post('judul_web');
		$shopHistory = $this->input->post('sejarah_toko');
		$pathLogo = '';
		$pathPhoto = '';
		
		if($isLogoNotNull){
			$arrayLogoName = explode('.', $_FILES['logo']['name']);
			$logoExtension = strtolower(end($arrayLogoName));
			$namaLogo = 'logo_' . str_replace(' ', '_', $title) . '_' . uniqid() . '.' . $logoExtension;
			$pathLogo = 'assets/picture/base/' . $namaLogo;

			if (!file_exists('./assets/picture/base/')) {
				mkdir('./assets/picture/base/', 0777, true);
			}

			$configUploadLogo['upload_path']    = './assets/picture/base/';
			$configUploadLogo['allowed_types']  = 'gif|jpg|png';
			$configUploadLogo['file_name']			= $namaLogo;
				
			$this->load->library('upload', $configUploadLogo);

			if($this->upload->do_upload('logo')){
				$isLogoUploadSuccess = true;

			}else{
				$isLogoUploadSuccess = false;
			}
		}

		if($isPhotoNotNull){
			$arrayPhotoName = explode('.', $_FILES['foto_toko']['name']);
			$photoExtension = strtolower(end($arrayPhotoName));
			$namaPhoto = 'foto_' . str_replace(' ', '_', $title) . '_' . uniqid() . '.' . $photoExtension;
			$pathPhoto = 'assets/picture/base/' . $namaPhoto;

			if (!file_exists('./assets/picture/base/')) {
				mkdir('./assets/picture/base/', 0777, true);
			}

			$configUploadPhoto['upload_path']    = './assets/picture/base/';
			$configUploadPhoto['allowed_types']  = 'gif|jpg|jpeg|png';
			$configUploadPhoto['file_name']			= $namaPhoto;
			
			if(isset($this->upload)) unset($this->upload);
			$this->load->library('upload', $configUploadPhoto);

			if($this->upload->do_upload('foto_toko')){
				$isPhotoUploadSuccess = true;
			}else{
				$isPhotoUploadSuccess = false;
			}
		}

		$isUpdateSuccess = false;
		if($isLogoNotNull && $isLogoUploadSuccess && $isPhotoNotNull && $isPhotoUploadSuccess){
			$isUpdateSuccess = ($this->ModelPengaturan->updateTitle($title) && $this->ModelPengaturan->updateShopHistory($shopHistory) && $this->ModelPengaturan->updateLogoPath($pathLogo) && $this->ModelPengaturan->updateShopPhotoPath($pathPhoto));
		}else if($isLogoNotNull && $isLogoUploadSuccess && !$isPhotoNotNull){
			$isUpdateSuccess = ($this->ModelPengaturan->updateTitle($title) && $this->ModelPengaturan->updateShopHistory($shopHistory) && $this->ModelPengaturan->updateLogoPath($pathLogo));
		}else if(!$isLogoNotNull && $isPhotoNotNull && $isPhotoUploadSuccess){
			$isUpdateSuccess = ($this->ModelPengaturan->updateTitle($title) && $this->ModelPengaturan->updateShopHistory($shopHistory) && $this->ModelPengaturan->updateShopPhotoPath($pathPhoto));
		}else{
			$isUpdateSuccess = ($this->ModelPengaturan->updateTitle($title) && $this->ModelPengaturan->updateShopHistory($shopHistory));
		}

		if($isUpdateSuccess){
			$data = array(
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Pengaturan dasar berhasil diperbaharui.')
			);

			$this->ModelLog->insertUpdateLog($this->session->userdata('id_pengguna'), 'pengaturan', 'pengaturan dasar');

			$this->load->view('dashboard/settings', $data);
		}else{
			if(!$isLogoUploadSuccess || !$isPhotoUploadSuccess){
				$data = array(
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Pengaturan', 'Whoops! Nampaknya gambar yang diunggah tidak sesuai, pastikan gambar yang diupload berekstensi png, gif, atau jpg.')
				);
				$this->load->view('dashboard/settings', $data);
			}else{
				$data = array(
					'settings'		=> $this->ModelPengaturan->getAllSettings(),
					'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Pengaturan', 'Whoops! Nampaknya ada kesalahan dalam memperbaharui pengaturan dasar, silakan coba lagi nanti.')
				);
				$this->load->view('dashboard/settings', $data);
			}
		}
	}

	function updateContactSettings()
	{
		$phoneNumber		= $this->input->post('nomor_hp');
		$email					= $this->input->post('email');
		$location				=	$this->input->post('lokasi');
		$facebookLink 	= $this->input->post('link_facebook');
		$instagramLink	= $this->input->post('link_instagram');

		if($this->ModelPengaturan->updatePhoneNumber($phoneNumber) && $this->ModelPengaturan->updateEmail($email) && $this->ModelPengaturan->updateLocation($location) && $this->ModelPengaturan->updateFacebookLink($facebookLink) && $this->ModelPengaturan->updateInstagramLink($instagramLink)){
			$data = array(
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Pengaturan kontak dan media sosial berhasil diperbaharui.')
			);

			$this->ModelLog->insertUpdateLog($this->session->userdata('id_pengguna'), 'pengaturan', 'pengaturan kontak dan media sosial');

			$this->load->view('dashboard/settings', $data);
		}else{
			$data = array(
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Pengaturan', 'Whoops! Nampaknya ada kesalahan dalam memperbaharui pengaturan kontak dan media sosial, silakan coba lagi nanti.')
			);
			$this->load->view('dashboard/settings', $data);
		}
	}

	function updateOpeningHoursSettings()
	{
		$openingHours	= $this->input->post('waktu_buka');

		if($this->ModelPengaturan->updateOpeningHours($openingHours)){
			$data = array(
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Berhasil!', 'Pengaturan waktu buka berhasil diperbaharui.')
			);

			$this->ModelLog->insertUpdateLog($this->session->userdata('id_pengguna'), 'pengaturan', 'pengaturan waktu buka');

			$this->load->view('dashboard/settings', $data);
		}else{
			$data = array(
				'settings'		=> $this->ModelPengaturan->getAllSettings(),
				'messageModal'	=> $this->Modal->createMessageModal('Gagal Memperbaharui Pengaturan', 'Whoops! Nampaknya ada kesalahan dalam memperbaharui pengaturan waktu buka, silakan coba lagi nanti.')
			);
			$this->load->view('dashboard/settings', $data);
		}
	}
	
}

 ?>