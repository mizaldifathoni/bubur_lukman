<?php 
 

class ModelLog extends CI_Model
{	

  function getRecentLogs() {
    $query = $this->db->select('log.*, pengguna.id_pengguna, pengguna.username_pengguna')->from('log')->order_by('tanggal_log', 'DESC')->limit(50)->join('pengguna', 'log.id_pengguna = pengguna.id_pengguna')->get();

    return $query->result();
  }

  function insertLoginLog($idPengguna) {
    $log = array(
      'id_pengguna' => $idPengguna,
      'isi_log' => 'Login'
    );

    $this->insertLog($log);
  }

  function insertCreateLog($idPengguna, $tipe, $nama) {
    $log = array(
      'id_pengguna' => $idPengguna,
      'isi_log' => 'Membuat ' . $tipe . ' baru ' . ' yaitu ' . $nama
    );

    $this->insertLog($log);
  }

  function insertUpdateLog($idPengguna, $tipe, $nama) {
    $log = array(
      'id_pengguna' => $idPengguna,
      'isi_log' => 'Mengubah salah satu ' . $tipe . ' ' . ' yaitu ' . $nama
    );

    $this->insertLog($log);
  }

  function insertDeleteLog($idPengguna, $tipe, $nama) {
    $log = array(
      'id_pengguna' => $idPengguna,
      'isi_log' => 'Menghapus salah satu ' . $tipe . ' ' . ' yaitu ' . $nama
    );

    $this->insertLog($log);
  }

  function insertLog($log) {
    $query = $this->db->insert('log', $log);
  }

}

?>