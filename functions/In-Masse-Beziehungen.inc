<?php
  //author: Mick Baldzer
  //@return: $massse
  function LeuchtkraftMasse($leuchtkraft){
    $masse = pow($leuchtkraft, 1/3.5);
    return $masse;
  }

  function RadiusMasse($radius){
    $masse = pow($radius, 1/0.6);
    return $masse;
  }

  function OberflaechentMasse($oberflaechent){
    $masse23 = pow($oberflaechent, 4);
    $masse = pow($masse23, 1/2.3);
    return $masse;
  }
?>