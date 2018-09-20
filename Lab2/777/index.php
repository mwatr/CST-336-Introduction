<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("css/styles.css");
        </style>
        <title> 777 Slot Machine </title>
    </head>
    <body>
      <div id = "main">
        <?php
          include 'inc/functions.php';
          play_the_game();
        ?>
      </div>
       <form>
           <input type = "submit" value = "Spin!" />
       </form>
    </body>
</html>