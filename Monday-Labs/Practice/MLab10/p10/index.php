<?php
session_start();

function displayQuiz(){
    //displays Quiz if session is active

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CSUMB Online Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            <?php echo "Welcome ".$_SESSION['username']."! ";?> 
            <input type="button" id="logoutBtn" value="Logout" />    
        </div>
        
        <div class="content-wrapper">
            <!--Display Quiz Content-->
            <div id="quiz">
            
            </div>
            <div id="mascot">
                <img src="img/mascot.png" alt="CSUMB Mascot" width="350" />
            </div>
        </div>
        
        <!--Javascript files-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </body>
</html>