<?php
  //author: Mick Baldzer
  //@return: $leuchtkraft
  function MasseLeuchtkraft($masse){
    $leuchtkraft = pow($masse, 3.5);
    return $leuchtkraft;
  }

  //@return: $radius
  function MasseRadius($masse){
    $radius = pow($masse, 0.6);
    return $radius;
  }

  //@return: $oberflaechent
  function MasseOberflaechent($masse){
    $oberflaechent4 = pow($masse, 2.3);
    $oberflaechent = pow($oberflaechent4, 1/4);
    return $oberflaechent;
  }
?>