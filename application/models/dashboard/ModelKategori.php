<?php 
 

class ModelKategori extends CI_Model
{	

  function getIdKategori($kategori)
  {
    $query = $this->db->select('*')->from('set_kategori')->where('nama_set_kategori', $kategori)->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->id_set_kategori : null;
  }
  
}

?>