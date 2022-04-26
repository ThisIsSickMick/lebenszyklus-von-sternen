<?php
  //author: Mick Baldzer
  //@return: $masseSL: Masse des Schw. Lochs mit den Attributen $a und $tu eines Orbiters
  function MasseSL($a,$tu){
    $masseSL = pow($a, 3) / pow($tu, 2);
    return $masseSL;
  }
?>