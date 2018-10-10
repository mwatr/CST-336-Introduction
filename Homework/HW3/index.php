<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
        <title>Homework 3: HTML Forms</title>
        <div id = "purpose">Create a randomly generated array of integers!</div>
        <hr>
    </head>
    <body>
        <form method = "Post">
          <h2>How many numbers do you want in your array?</h2>
          <input type = "text" name = "count"></input>
          <br>
          <h2>What is the range of your generated numbers?</h2>
          <input type = "text" name = "range"></input>
          <br><br>
          <input type = "submit" name = "choose"></input><br>
        </form>
     <?php
       include 'functions.php';
       $num1 = $_POST["count"];
       $num2 = $_POST["range"];
       play_numbers($num1, $num2);
     ?>
    </body>
</html>