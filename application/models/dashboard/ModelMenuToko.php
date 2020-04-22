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

  function getAllMenusByIdToko($idToko)
  {
    $query = $this->db->select('*')->from('menu_toko')->where('id_toko', $idToko)->get();
    return $query->result();
  }

  function getFoodMenusByIdToko($idToko)
  {
    $this->load->model('dashboard/ModelKamus', 'ModelKamus');
    $where = array(
      'id_toko'       => $idToko,
      'id_tipe_menu'  => $this->ModelKamus->getIdKamus('makanan')
    );
    $query = $this->db->select('*')->from('menu_toko')->where($where)->get();
    return $query->result();
  }

  function getDrinksMenusByIdToko($idToko)
  {
    $this->load->model('dashboard/ModelKamus', 'ModelKamus');
    $where = array(
      'id_toko'       => $idToko,
      'id_tipe_menu'  => $this->ModelKamus->getIdKamus('minuman')
    );
    $query = $this->db->select('*')->from('menu_toko')->where($where)->get();
    return $query->result();
  }

  function getIdTokoWithMaxMenuTokoCount() 
  {
    $query = $this->db->query('SELECT * FROM menu_toko GROUP BY id_toko ORDER BY COUNT(id_toko) DESC LIMIT 1');
    return $query->result()[0]->id_toko;
  }

  function getMenuCounts()
  {
    $query = $this->db->select('COUNT(id_menu_toko) as total_menu')->from('menu_toko')->get();
    return ($query->result() !== null)? $query->result()[0]->total_menu : 0;
  }

  function insertMenu($menu)
  {
    return $this->db->insert('menu_toko', $menu);
  }

  function editMenu($idMenu, $menu)
  {
    return $this->db->where('id_menu_toko', $idMenu)->update('menu_toko', $menu);
  }

  function deleteMenu($idMenu)
  {
    return $this->db->where('id_menu_toko', $idMenu)->delete('menu_toko');
  }
  
}

?>