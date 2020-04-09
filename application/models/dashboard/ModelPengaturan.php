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
        'shop_history'                => $query->result()[5]->value,
        'phone_number'                => $query->result()[6]->value,
        'email'                       => $query->result()[7]->value,
        'location'                    => $query->result()[8]->value,
        'opening_hours'               => $query->result()[9]->value,
        'facebook_link'               => $query->result()[10]->value,
        'instagram_link'              => $query->result()[11]->value
      );
    }else{
      $allSettings = array(
        'title'                       => '',
        'logo_path'                   => '',
        'welcome_message'             => '',
        'welcome_message_description' => '',
        'shop_photo_path'             => '',
        'shop_history'                => '',
        'phone_number'                => '',
        'email'                       => '',
        'location'                    => '',
        'opening_hours'               => '',
        'facebook_link'               => '#',
        'instagram_link'              => '#'
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

  function getPhoneNumber()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'nomor_hp')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function getEmail()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'email')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function getLocation()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'lokasi')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function getOpeningHours()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'waktu_buka')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function getFacebookLink()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'link_facebook')->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->value : null;
  }

  function getInstagramLink()
  {
    $query = $this->db->select('value')->from('pengaturan')->where('variabel', 'link_instagram')->limit(1)->get();
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

  function updatePhoneNumber($phoneNumber)
  {
    $update = array('value' => $phoneNumber);
    return $this->db->where('variabel', 'nomor_hp')->update('pengaturan', $update);
  }

  function updateEmail($email)
  {
    $update = array('value' => $email);
    return $this->db->where('variabel', 'email')->update('pengaturan', $update);
  }

  function updateLocation($location)
  {
    $update = array('value' => $location);
    return $this->db->where('variabel', 'lokasi')->update('pengaturan', $update);
  }

  function updateOpeningHours($openingHours)
  {
    $update = array('value' => $openingHours);
    return $this->db->where('variabel', 'waktu_buka')->update('pengaturan', $update);
  }

  function updateFacebookLink($facebookLink)
  {
    $update = array('value' => $facebookLink);
    return $this->db->where('variabel', 'link_facebook')->update('pengaturan', $update);
  }

  function updateInstagramLink($instagramLink)
  {
    $update = array('value' => $instagramLink);
    return $this->db->where('variabel', 'link_instagram')->update('pengaturan', $update);
  }
}

?>