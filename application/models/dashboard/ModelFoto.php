<?php 
 

class ModelFoto extends CI_Model
{	

  function getAllPhotos()
  {
    $query = $this->db->select('*')->from('foto')->get();
    return $query->result();
  }

  function addPhoto($foto)
  {
    return $this->db->insert('foto', $foto);
  }

  function editPhoto($idFoto, $foto)
  {
    return $this->db->where('id_foto', $idFoto)->update('foto', $foto);
  }

  function deletePhoto($idFoto)
  {
    return $this->db->where('id_foto', $idFoto)->delete('foto');
  }
  
}

?>