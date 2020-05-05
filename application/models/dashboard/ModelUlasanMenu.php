<?php 
 

class ModelUlasanMenu extends CI_Model
{	

  function getMenuReviewCounts($idMenu) {
    $query = $this->db->select('COUNT(*) as review_counts')->from('ulasan_menu_toko')->where('id_menu_toko', $idMenu)->get();
    return $query->result()[0]->review_counts;
  }

  function getOverallMenuRatings($idMenu) {
    $query = $this->db->select('AVG(rating_menu_toko) as avg_rating_menu_toko')->from('ulasan_menu_toko')->where('id_menu_toko', $idMenu)->get();
    $overallRatings = floor($query->result()[0]->avg_rating_menu_toko * 2) / 2;
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