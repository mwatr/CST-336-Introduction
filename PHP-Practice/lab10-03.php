<?php
    session_start();
         
     //$val = rand(1, 100);
        
     if(isset($_POST['destroy'])) {
        session_destroy();
        session_start();
     }
     
     if(!isset($_SESSION['randomVal']))
        $_SESSION['randomVal'] = rand(1, 100);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Wednesday, October 3rd</title>
    </head>
    <body>
        Guess a between 1 and 100: <?php echo $_SESSION['randomVal'];?>
        <form method = "post">
            <input type = "submit" name = "destroy" value = "Destroy!"></input>
            <input type = "submit" name = "reset" value = "Guess!"></input><br>
            <input type = "text" name = "guess"></input></br>
            <?php
              if (guess > $_SESSION['randomVal'])
                echo "TOO HIGH";
                
              else if (guess < $_SESSION['randomVal'])
                echo "TOO LOW";
              
              else 
                echo "KORREKT!";
            ?>
        </form>
    </body>
</html>