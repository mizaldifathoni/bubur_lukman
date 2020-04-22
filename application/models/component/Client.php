<?php 
 
class Client extends CI_Model
{	

  function getIP()
  {
    //Thanks to https://stackoverflow.com/users/2223355/shiv
    //and https://stackoverflow.com/users/72437/cheok-yan-cheng

    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'Unknown';

    return $ipaddress;
  }

  function getLocation($ip)
  {
    //Thanks to https://stackoverflow.com/users/4438159/hamza

    $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));
    $country = $geo["geoplugin_countryName"];
    $city = $geo["geoplugin_city"];

    $loc = array(
      'country' => $country,
      'city'    => $city
    );

    return $loc;
  }
  
}

?>

