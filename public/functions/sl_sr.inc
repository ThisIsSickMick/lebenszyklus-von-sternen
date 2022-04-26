<?php
  //author: Mick Baldzer
  //@return: $Rss: Radius des Ereignishorizonts eines Körpers mit der Masse $msr
  function Schwarzschildradius($msr){
    $Rss = 2 * 1.3806e-23 * $msr / pow(300000, 2); //je nach Einheit 300000000 oder 300000!!!
    return $Rss;
  }
?>