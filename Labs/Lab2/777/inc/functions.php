<?php

        function play_the_game() {
          $totalPoints = 0;
          for ($n = 0; $n < 3; ++$n) {
            ${"token" . $n} = rand(0,3);
            slot_display(${"token" . $n}, $n);
          }
        
          points_display($token1, $token2, $token3, $token4);
        }
        
        function slot_display($display, $pos) {
           switch($display) {
             case 0: $symbol = "cherry";
             break;
             case 1: $symbol = "lemon";
             break;
             case 2: $symbol = "seven";
             break;
             case 3: $symbol = "grapes";
           } 
           
           echo "<img id = 'reel&pos' src = 'img/$symbol.png' alt = '$symbol' title = '$symbol' width = '70' />";
        }
        
        function points_display ($token1, $token2, $token3, $token4) {
          echo "<div id = 'output'>";
          if ($token1 == $token2 && $token2 == $token3) {
              switch($token3) {
                  case 0: $totalPoints = 1000;
                  echo "<h1>You hit the Jackpot!</h1>";
                  break;
                  case 1: $totalPoints = 500;
                  break;
                  case 2: $totalPoints = 250;
                  break;
                  case 3: $totalPoints = 900;
              }
              
              echo "<h2>You have won $totalPoints points this game!</h2>";
          } else {
              echo "<h3>Try again!</h3>";
          }
          echo "</div>";
        }
?>