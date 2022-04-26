<?php
  //author: Mick Baldzer
  //@return: $Freifallzeit des dynamischen Kollaps des Protosterns
  function Freifallzeit($rho2){
    $freifallzeit_zwischenergebnis = 32 * 6.674e-11 * $rho2;
    $freifallzeit = sqrt((3 * pi()) / $freifallzeit_zwischenergebnis);
    return $freifallzeit;
  }
?>