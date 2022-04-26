<?php
  //author: Mick Baldzer
  //@return: Effektive Temperatur $efftemp
  function EffektiveTemperatur_Stern($L_Stern, $R2_Stern){
    $efftempstern = pow(($L_Stern) / (4 * pi() * 5.67037e-8 * pow($R2_Stern, 2)), 1/4);
    return $efftemp;
  }
?>