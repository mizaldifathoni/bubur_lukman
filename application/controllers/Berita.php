<?php 


class Berita extends CI_Controller
{
	
	function __construct()
  {
		parent::__construct();
		$this->load->model('dashboard/ModelPengaturan');
		$this->load->model('dashboard/ModelStatistik');
		$this->load->model('dashboard/ModelPosting');
  }

	public function index()
	{
		$data = array(
			'settings'	=> $this->ModelPengaturan->getAllSettings(),
			'posts'			=> $this->getPostsHtml()
		);
		$this->ModelStatistik->addStatistics(base_url() . 'Berita');
		$this->load->view('Berita.php', $data);
	}

	public function getPostsHtml() {
		$posts = $this->ModelPosting->getRecentPosts();

		$html = '';

		$isPostAvailable = false;

		foreach($posts as $post) {
			$isPostAvailable = true;

			$labelHtml = '';
			if($post->label == "berita") {
        $labelHtml = '<span class="badge badge-info mr-2">Berita</span>';
      }else{
        $labelHtml = '<span class="badge badge-success mr-2">Promo</span>';
			}
			
			$postDescription = strip_tags($post->isi_posting, '<br></br>');
			if(strlen($postDescription) > 320) {
				$postDescription = substr($postDescription, 0, 320) . '...';
			}

			$days = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');
			$months = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

			$timestamp = $post->tanggal_posting;
			$dayOfWeek = date('N', strtotime($timestamp));
			$monthOfYear = date('n', strtotime($timestamp));
			$dayOfMonth = date('j ', strtotime($timestamp));
			$year = date('Y', strtotime($timestamp));

			$postDate = $days[$dayOfWeek - 1] . ', ' . $dayOfMonth . ' ' . $months[$monthOfYear - 1] . ' ' . $year;

			

			$html .= '
																	<div class="row py-5">
                                    <div class="col-md-4 pr-4 mbm-3">
                                        <div class="post-media">
                                            <a href="#" title="' . $post->judul_posting . '" data-toggle="modal" data-target="#viewPostModal" data-id-posting="' . $post->id_posting . '">
                                                <img id="foto_posting_' . $post->id_posting . '" src="' . base_url() . $post->foto_posting . '" alt="' . $post->judul_posting . '" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="blog-meta big-meta col-md-8">
                                        <h2 class="bg-aqua">
                                            <a id="judul_posting_' . $post->id_posting . '" class="mb-3" href="#" title="' . $post->judul_posting . '" data-toggle="modal" data-target="#viewPostModal" data-id-posting="' . $post->id_posting . '">' . $labelHtml . ' ' . $post->judul_posting . '</a>
                                        </h2>
                                        <h4 class="text-muted p-0 mt-0 mb-3">' . $postDescription . '</h4>
                                        <div class="d-flex justify-content-end">
                                            <h3><small id="tanggal_posting_' . $post->id_posting . '">' . $postDate . '</small></h3>
																				</div>
																				
																				<div id="isi_posting_' . $post->id_posting . '" class="d-none">
																					' . $post->isi_posting . '
																				</div>

                                    </div>
                                </div>

                                <hr class="invis">
			';
		}

		if(!$isPostAvailable) {
			$html .= '
				<div class="row min-p-5 mb-5">
					<div class="col-12 d-flex justify-content-center">
						<img class="w-100 p-5" src="' . base_url() . 'assets/picture/illustration/empty_place.png' . '" style="max-width: 768px"/>
					</div>
					<div class="col-12 d-flex justify-content-center">
						<h1 class="mb-3">Wah, belum ada berita saat ini...</h1>
					</div>
					<div class="col-12 d-flex justify-content-center">
						<a class="btn btn-light" href="' . base_url() . '">Kembali ke beranda</a>
					</div>
				</div>
			';
		}

		return $html;
		
	}
}

 ?>