<?php
  function play_numbers($count, $range) {
    $arr = array();
    $total = 0;
    for ($n = 0; $n < $count; ++$n) {
        $arr[$n] = rand(0,$range);
        echo "<div id = 'random'>$arr[$n]</div>";
    }
    
    for ($k = 0; $k < $count; ++$k) {
        $total += $arr[$k];
    }
    
    echo "<div id = 'sum'>Total is: $total</div>";
  }
?>