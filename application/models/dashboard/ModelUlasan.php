<?php 
 

class ModelUlasan extends CI_Model
{	

  function getRecentReviews() {
    $query = $this->db->select('*')->from('ulasan_toko')->order_by('tanggal_ulasan_toko', 'ASC')->limit(5)->get();
    return $query->result();
  }

  function getReviewCounts() {
    $query = $this->db->select('COUNT(*) as review_counts')->from('ulasan_toko')->get();
    return $query->result()[0]->review_counts;
  }

  function getOverallRatings() {
    $query = $this->db->select('AVG(rating_toko) as avg_rating_toko')->from('ulasan_toko')->get();
    return  floor($query->result()[0]->avg_rating_toko * 2) / 2;
  }

  function insertReview($review)
  {
    return $this->db->insert('ulasan_toko', $review);
  }

  function deleteReview($idReview)
  {
    return $this->db->where('id_ulasan_toko', $idReview)->delete('ulasan_toko');
  }
  
}

?>