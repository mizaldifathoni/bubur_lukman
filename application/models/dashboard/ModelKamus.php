<?php 
 

class ModelKamus extends CI_Model
{	

  function getIdKamus($kamus)
  {
    $query = $this->db->select('*')->from('set_kamus')->where('isi_set_kamus', $kamus)->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]['id_kamus'] : null;
  }
  
}

?>