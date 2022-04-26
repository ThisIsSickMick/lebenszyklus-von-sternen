<?php
  //author: Mick Baldzer
  //@return: Kelvin-Helmholtz-Zeit $tKH
  function KelvinHelmholtzZeit($Lp, $Mp2, $Rp2){
    $tKH = (6.674e-11 * pow($Mp2, 2) / (2 * $Rp2 * $Lp));
    return $tKH;
  }
?>