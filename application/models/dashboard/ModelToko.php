<?php 
 

class ModelToko extends CI_Model
{	

  function getAllToko()
  {
    $query = $this->db->select('*')->from('toko')->get();
    return $query->result();
  }

  function getTokoByIdToko($idToko)
  {
    $query = $this->db->select('*')->from('toko')->where('id_toko', $idToko)->get();
    return $query->result();
  }

  function getTokoByNamaToko($namaToko)
  {
    $query = $this->db->select('*')->from('toko')->where('nama_toko', $namaToko)->get();
    return $query->result();
  }

  function getNamaTokoByIdToko($idToko)
  {
    $query = $this->db->select('nama_toko')->from('toko')->where('id_toko', $idToko)->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->nama_toko : null;
  }

  function getIdTokoByNamaToko($namaToko)
  {
    $query = $this->db->select('id_toko')->from('toko')->where('nama_toko', $namaToko)->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->id_toko : null;
  }

  function getLokasiTokoByIdToko($idToko)
  {
    $query = $this->db->select('lokasi_toko')->from('toko')->where('id_toko', $idToko)->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->lokasi_toko : null;
  }

  function addToko($toko)
  {
    return $this->db->insert('toko', $toko);
  }

  function editToko($idToko, $toko)
  {
    return $this->db->where('id_toko', $idToko)->update('toko', $toko);
  }

  function deleteToko($idToko)
  {
    return $this->db->where('id_toko', $idToko)->delete('toko');
  }
  
}

?>