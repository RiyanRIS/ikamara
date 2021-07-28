<?php

function nav($a, $b){
  if($a == $b){
    echo "active";
  }
}

function selected($a, $b){
  if($a == $b){
    echo "selected=\"selected\"";
  }
}

function checked($a, $b){
  if($a == $b){
    echo "checked=\"checked\"";
  }
}