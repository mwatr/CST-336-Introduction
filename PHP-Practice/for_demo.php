<?php
define("SPACE", 10);

$arr[SPACE];
$sum = 0;

function print_power() {
  /*'$i++' or '++$i'?*/
  for ($i = 0;$i < SPACE; ++$i) {
    echo "<div>...The power within...</div>";    
  }
}

print_power();
?>