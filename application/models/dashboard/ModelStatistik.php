<?php 
 

class ModelStatistik extends CI_Model
{
  
  function addStatistics($uri)
  {
    try {
      $this->load->model('component/Client');
      $clientIP = $this->Client->getIP();
      if($clientIP == '::1') $clientIP = 'Unknown';
      $clientLocation = $this->Client->getLocation($clientIP);
      $negara = ($clientLocation['country'] !== null)? $clientLocation['country'] : 'Unknown';
      $kota   = ($clientLocation['city'] !== null)? $clientLocation['city'] : 'Unknown';

      $statistics = array(
        'uri'     => $uri,
        'ip'      => $clientIP,
        'negara'  => $negara,
        'kota'    => $kota
      );

      $query = $this->db->insert('statistik', $statistics);
      return $query;
    } catch(Exception $ex) {
      return $ex;
    }
  }

  function getWeeklyStatistics()
  {
    $views = array(0, 0, 0, 0, 0, 0, 0);
    $days  = array('Hari ini', 'Kemarin', '', '', '', '', '');

    $baseDateStart  = date('Y-m-d 00:00:00');
    $baseDateEnd    = date('Y-m-d 23:59:59');
    for($i=0; $i<7; $i++) {
      $dateStart = date('Y-m-d H:i:s', strtotime('-' . $i . ' day', strtotime($baseDateStart))); 
      $dateEnd = date('Y-m-d H:i:s', strtotime('-' . $i . ' day', strtotime($baseDateEnd)));

      $query = $this->db->select('COUNT(*) as views')->from('statistik')->where('tanggal BETWEEN "' . $dateStart . '" AND "' . $dateEnd . '"')->get();
      $views[$i] = ($query->result()[0]->views !== null)? $query->result()[0]->views : 0;

      if($i > 1){
        $days[$i] = date('j F', strtotime($dateStart));
      }
    }

    $viewsInDays = array(
      'views' => $views,
      'days'  => $days
    );

    return $viewsInDays;
  }

  function getYesterdayStatistics()
  {
    $yesterdayStart  = date('Y-m-d H:i:s', strtotime('-1 day', strtotime(date('Y-m-d 00:00:00'))));
    $yesterdayEnd    = date('Y-m-d H:i:s', strtotime('-1 day', strtotime(date('Y-m-d 23:59:59'))));
    $query = $this->db->select('COUNT(*) as views')->from('statistik')->where('tanggal BETWEEN "' . $yesterdayStart . '" AND "' . $yesterdayEnd . '"')->get();
    return ($query->result()[0]->views !== null)? $query->result()[0]->views : 0;
  }

  function getTodayStatistics()
  {
    $todayStart  = date('Y-m-d 00:00:00');
    $todayEnd    = date('Y-m-d 23:59:59');
    $query = $this->db->select('COUNT(*) as views')->from('statistik')->where('tanggal BETWEEN "' . $todayStart . '" AND "' . $todayEnd . '"')->get();
    return ($query->result()[0]->views !== null)? $query->result()[0]->views : 0;
  }

  function getThisWeekStatistics()
  {
    $todayInWeek = date('w');
    $startWeekDate = date('Y-m-d H:i:s', strtotime('-' . $todayInWeek . ' day', strtotime(date('Y-m-d 00:00:00'))));
    $endWeekDate = date('Y-m-d H:i:s', strtotime('+' . (6 - $todayInWeek) . ' day', strtotime(date('Y-m-d 23:59:59'))));

    $query = $this->db->select('COUNT(*) as views')->from('statistik')->where('tanggal BETWEEN "' . $startWeekDate . '" AND "' . $endWeekDate . '"')->get();
    return ($query->result()[0]->views !== null)? $query->result()[0]->views : 0;
  }

  function getThisMonthStatistics()
  {
    $todayInMonth = date('n');
    $daysInMonth = date('t');
    $startMonthDate = date('Y-m-01 00:00:00');
    $endMonthDate = date('Y-m-' . $daysInMonth . ' 23:59:59');

    $query = $this->db->select('COUNT(*) as views')->from('statistik')->where('tanggal BETWEEN "' . $startMonthDate . '" AND "' . $endMonthDate . '"')->get();
    return ($query->result()[0]->views !== null)? $query->result()[0]->views : 0;
  }

  function getThisYearStatistics()
  {
    $startYearDate = date('Y-01-01 00:00:00');
    $endYearDate = date('Y-m-d H:i:s', strtotime('+1 year', strtotime($startYearDate)));

    $query = $this->db->select('COUNT(*) as views')->from('statistik')->where('tanggal BETWEEN "' . $startYearDate . '" AND "' . $endYearDate . '"')->get();
    return ($query->result()[0]->views !== null)? $query->result()[0]->views : 0;
  }

  function getAllTimeStatistics()
  {
    $query = $this->db->select('COUNT(*) as views')->from('statistik')->get();
    return ($query->result()[0]->views !== null)? $query->result()[0]->views : 0;
  }

  function getAllStatistics()
  {
    $statistics = array(
      'yesterday' => $this->getYesterdayStatistics(),
      'today'     => $this->getTodayStatistics(),
      'weekly'    => $this->getThisWeekStatistics(),
      'monthly'   => $this->getThisMonthStatistics(),
      'yearly'    => $this->getThisYearStatistics(),
      'all_time'   => $this->getAllTimeStatistics()
    );
    
    return $statistics;
  }

  function getMostVisitorCity()
  {
    $query = $this->db->from('statistik')->select('negara, kota, COUNT(kota) as views')->group_by('kota')->order_by('views', 'DESC')->limit(6)->get();
    return ($query->result() !== null)? $query->result() : null;
  }

}

?>