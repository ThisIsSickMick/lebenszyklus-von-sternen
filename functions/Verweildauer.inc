<?php
  //author: Mick Baldzer
  //@return: $verweildauer des Sterns mit der Masse $masse bzw. $verweildauer_masse
  function Verweildauer($masse){
    $verweildauer_Stern = 7.7 * pow(10, 9) * pow(1/$masse, 2.5);
    return $verweildauer_Stern;
  }

  //@return: $teilchenmenge des Sterns mit der Masse $masse_kg
  function Teilchenmenge($masse){
    $masse_kg = $masse * (1.989 * pow(10, 30));
    $teilchenmenge = (2 * $masse_kg) / (1.67*pow(10, -27));
    return $teilchenmenge;
  }
?>