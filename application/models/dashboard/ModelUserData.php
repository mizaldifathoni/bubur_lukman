<?php 
 

class ModelUserData extends CI_Model
{	
  function getAllUserData() {
    $queryUlasanToko = $this->db->select('nama_pengulas, no_telepon_pengulas')->group_by('no_telepon_pengulas')->from('ulasan_toko')->get();
    $queryUlasanMenu = $this->db->select('nama_pengulas, no_telepon_pengulas')->group_by('no_telepon_pengulas')->from('ulasan_menu_toko')->get();

    $userData = null;

    if($queryUlasanToko->result() != null && $queryUlasanMenu->result() != null) {
      $userData = array_merge($queryUlasanToko->result(), $queryUlasanMenu->result());
    }

    return $userData;
  }

}

?>