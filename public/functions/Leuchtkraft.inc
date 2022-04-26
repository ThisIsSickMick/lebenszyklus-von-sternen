<?php
  //author: Mick Baldzer
  //@return: Leuchtkraft $L
  function Leuchtkraft($R_Stern, $Teff_Stern){
    $L = 5.67037e-8 * 4 * pi() * pow($R_Stern, 2) * pow($Teff_Stern, 4);
    return $L;
  }
?>