<?php
  //author: Mick Baldzer
  //@return: Massezuwachsrate ($Mzw) + Leuchtkraft ($lacc) und Geschwindigkeit ($vff) der Akkretion 
  function Massezuwachsrate($Ts){
    $cs = sqrt((1.3806e-23 * $Ts) / (6.674e-11 * 2.3 * 1.673e-27));
    $Mzw = 0.975 * (pow($cs, 3) / 6.674e-11);
    return $Mzw;
  }
  
  function Lacc($Ms, $Rs, $Mzw){
    $lacc = (6.674e-11 * $Ms * $Mzw) / $Rs;
    return $lacc;
  }

  function vff($Ms, $Rs){
    $vff = sqrt((2 * 6.674e-11 * $Ms) / $Rs);
    return $vff;
  }

  function EffektiveTemperatur($Ms, $Mzw, $Rs){
    $efftemp = pow((6.674e-11 * $Ms * $Mzw) / (4 * pi() * 5.67037e-8 * pow($Rs, 3)), 1/4);
    return $efftemp;
  }
?>