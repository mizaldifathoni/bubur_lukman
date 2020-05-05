<?php 
 

class ModelUlasanMenu extends CI_Model
{
  function getAllReviews() {
    $query = $this->db->select('ulasan_menu_toko.*, menu_toko.id_menu_toko, menu_toko.nama_menu, toko.id_toko, toko.nama_toko')->from('ulasan_menu_toko')->order_by('tanggal_ulasan_menu_toko', 'DESC')->limit(50)->join('menu_toko', 'ulasan_menu_toko.id_menu_toko = menu_toko.id_menu_toko')->join('toko', 'menu_toko.id_toko = toko.id_toko')->get();
    return $query->result();
  }

  function getOverallMenuReviewCounts() {
    $query = $this->db->select('COUNT(*) as review_counts')->from('ulasan_menu_toko')->get();
    return $query->result()[0]->review_counts;
  }

  function getOverallMenuRatings() {
    $query = $this->db->select('AVG(rating_menu_toko) as avg_rating_menu_toko')->from('ulasan_menu_toko')->get();
    $overallRatings = floor($query->result()[0]->avg_rating_menu_toko * 10) / 10;
    return  number_format($overallRatings, 1);
  }

  function getMenuReviewCounts($idMenu) {
    $query = $this->db->select('COUNT(*) as review_counts')->from('ulasan_menu_toko')->where('id_menu_toko', $idMenu)->get();
    return $query->result()[0]->review_counts;
  }

  function getMenuRatings($idMenu) {
    $query = $this->db->select('AVG(rating_menu_toko) as avg_rating_menu_toko')->from('ulasan_menu_toko')->where('id_menu_toko', $idMenu)->get();
    $overallRatings = floor($query->result()[0]->avg_rating_menu_toko * 10) / 10;
    return  number_format($overallRatings, 1);
  }

  function insertReview($review)
  {
    return $this->db->insert('ulasan_menu_toko', $review);
  }

  function deleteReview($idReview)
  {
    return $this->db->where('id_ulasan_menu_toko', $idReview)->delete('ulasan_menu_toko');
  }
  
}

?>