<?php
  //author: Mick Baldzer
  //@return: $jeans_masse
  function JeansMasse($rho, $t){
    $foo = (1.3806e-23 * $t)/(6.674e-11 * 2.3 * 1.673e-27);
    $jeans_masse = sqrt(6/pi()) * sqrt((1/$rho) * pow($foo,3));
    return $jeans_masse;
  }
?>