<?php 
 

class Time extends CI_Model
{	

  function relativeTime($time)
  {
    $d[0] = array(1,"detik");
    $d[1] = array(60,"menit");
    $d[2] = array(3600,"jam");
    $d[3] = array(86400,"hari");
    $d[4] = array(604800,"minggu");
    $d[5] = array(2592000,"bulan");
    $d[6] = array(31104000,"tahun");
    
    $w = array();
    
    $return = "";
    $now = time();
    $diff = ($now-$time);
    $secondsLeft = $diff;
    
    for($i=6;$i>-1;$i--)
    {
         $w[$i] = intval($secondsLeft/$d[$i][0]);
         $secondsLeft -= ($w[$i]*$d[$i][0]);
         if($w[$i]!=0)
         {
            $return.= abs($w[$i]) . " " . $d[$i][1] ." ";
             break;
         }
    
    }
    
    $return .= ($diff>=0)?"yang lalu":"lagi";
    return ($return != 'yang lalu')? $return : 'beberapa detik yang lalu';
    
    //thanks to https://stackoverflow.com/users/600600/xdebug
  }
  
}

?>

