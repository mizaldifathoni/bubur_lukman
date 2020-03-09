<?php 
 

class ModelLogin extends CI_Model
{	

  function getAccess($username, $password)
  {
    $username = $this->db->escape_str($username);
    $password = $this->db->escape_str($password);
    
    $table = "pengguna";
    $where = array(
      "username_pengguna" => $username,
      "password_pengguna" => md5($password)
    );
    $limit = 1;

    $query = $this->db->get_Where($table,$where, $limit);
    $access = ($query->num_rows() > 0)? true : false;
    $tipe_pengguna = (!$query)? $query->row_array()['id_tipe_pengguna'] : 0;
    $returnArray = array(
      'access' => $access,
      'tipe_pengguna' => $tipe_pengguna
    );

		return $returnArray;
  }

  function isAccessable()
  {
    return ($this->session->userdata('username_pengguna') !== null)? true : false;
  }
  
  function destroyAccess()
  {
    $this->session->sess_destroy();
    redirect(base_url('dashboard/login'));
  }
  
}

?>