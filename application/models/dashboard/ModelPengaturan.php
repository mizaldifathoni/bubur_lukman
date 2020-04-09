<?php 
 

class ModelPengaturan extends CI_Model
{
  
  function getAllSettings()
  {
    $query = $this->db->select('*')->from('pengaturan')->get();

    $allSettings = '';
    if($query->result() != null){
      $allSettings = array(
        'title'                       => $query->result()[0]->value,
        'logo_path'                   => $query->result()[1]->value,
        'welcome_message'             => $query->result()[2]->value,
        'welcome_message_description' => $query->result()[3]->value,
        'shop_photo_path'             => $query->result()[4]->value,
        'shop_history'                => $query->result()[5]->value
      );
    }else{
      $allSettings = array(
        'title'                       => '',
        'logo_path'                   => '',
        'welcome_message'             => '',
        'welcome_message_description' => '',
        'shop_photo_path'             => '',
        'shop_history'                => ''
      );
    }

    return $allSettings;
  }

  function getTitle()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'judul_web')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }
  
  function getLogoPath()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'logo')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function getWelcomeMessage()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'pesan_selamat_datang')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }
  
  function getWelcomeMessageDescription()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'deskripsi_pesan_selamat_datang')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function getShopPhotoPath()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'foto_toko')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function getShopHistory()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'sejarah_toko')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function updateTitle($title)
  {
    $update = array('value' => $title);
    return $this->db->where('variabel', 'judul_web')->update('pengaturan', $update);
  }

  function updateLogoPath($logoPath)
  {
    $update = array('value' => $logoPath);
    return $this->db->where('variabel', 'logo')->update('pengaturan', $update);
  }

  function updateWelcomeMessage($welcomeMessage)
  {
    $update = array('value' => $welcomeMessage);
    return $this->db->where('variabel', 'pesan_selamat_datang')->update('pengaturan', $update);
  }

  function updateWelcomeMessageDescription($welcomeMessageDescription)
  {
    $update = array('value' => $welcomeMessageDescription);
    return $this->db->where('variabel', 'deskripsi_pesan_selamat_datang')->update('pengaturan', $update);
  }

  function updateShopPhotoPath($shopPhotoPath)
  {
    $update = array('value' => $shopPhotoPath);
    return $this->db->where('variabel', 'foto_toko')->update('pengaturan', $update);
  }

  function updateShopHistory($shopHistory)
  {
    $update = array('value' => $shopHistory);
    return $this->db->where('variabel', 'sejarah_toko')->update('pengaturan', $update);
  }
}

?>