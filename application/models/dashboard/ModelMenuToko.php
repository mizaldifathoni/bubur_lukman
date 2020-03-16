<?php 
 

class ModelMenuToko extends CI_Model
{	

  function getAllMenus()
  {
    $query = $this->db->select('*')->from('menu_toko')->get();
    return $query->result();
  }

  function getFoodMenus()
  {
    $this->load->model('dashboard/ModelKamus', 'ModelKamus');
    $query = $this->db->select('*')->from('menu_toko')->where('id_tipe_menu', $this->ModelKamus->getIdKamus('makanan'))->get();
    return $query->result();
  }

  function getDrinksMenus()
  {
    $this->load->model('dashboard/ModelKamus', 'ModelKamus');
    $query = $this->db->select('*')->from('menu_toko')->where('id_tipe_menu', $this->ModelKamus->getIdKamus('minuman'))->get();
    return $query->result();
  }
  
}

?>