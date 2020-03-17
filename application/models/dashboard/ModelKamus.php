<?php 
 

class ModelKamus extends CI_Model
{	

  function getIdKamus($kamus)
  {
    $query = $this->db->select('*')->from('set_kamus')->where('isi_set_kamus', $kamus)->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->id_set_kamus : null;
  }

  function getIdKamusInKategori($kamus, $kategori)
  {
    $this->load->model('dashboard/ModelKategori', 'ModelKategori');

    $idKategori = $this->ModelKategori->getIdKategori($kategori);
    if(null !== $idKategori){
      $where = array(
        'isi_set_kamus'     => $kamus,
        'id_set_kategori'   => $idKategori
      );
      $query = $this->db->select('*')->from('set_kamus')->where($where)->limit(1)->get();
      return ($query->result() != null)? $query->result()[0]->id_set_kamus : null;
    }else{
      return null;
    }
  }

  function getKamusById($idKamus)
  {
    $query = $this->db->select('isi_set_kamus')->from('set_kamus')->where('id_set_kamus', $idKamus)->limit(1)->get();
    return ($query->result() != null)? $query->result()[0]->isi_set_kamus : null;
  }
  
}

?>