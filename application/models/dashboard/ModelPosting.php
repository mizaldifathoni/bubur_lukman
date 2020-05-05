<?php 
 

class ModelPosting extends CI_Model
{	

  function getAllPosts()
  {
    $query = $this->db->select('posting.*, set_kamus.id_set_kamus, set_kamus.isi_set_kamus as label')->from('posting')->join('set_kamus', 'posting.id_tipe_posting = set_kamus.id_set_kamus')->get();
    return $query->result();
  }

  function getRecentPosts()
  {
    $query = $this->db->select('posting.*, set_kamus.id_set_kamus, set_kamus.isi_set_kamus as label')->from('posting')->join('set_kamus', 'posting.id_tipe_posting = set_kamus.id_set_kamus')->order_by('tanggal_posting', 'DESC')->get();
    return $query->result();
  }

  function addPost($post)
  {
    return $this->db->insert('posting', $post);
  }

  function editPost($idPost, $post)
  {
    return $this->db->where('id_posting', $idPost)->update('posting', $post);
  }

  function deletePost($idPost)
  {
    return $this->db->where('id_posting', $idPost)->delete('posting');
  }
  
}

?>