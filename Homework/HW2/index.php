<!DOCTYPE html>
<html>
    <head>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
        <title>Homework 2: Something Special </title>
        <h1>Something Special</h1>
        <hr>
    </head>
    <body>
      <h2>One of my favorite programming things is generating an array of random numbers and returning the sum of those numbers.</h2>
    </body>
</html>

<?php
$arr = array();
$total = 0;
for ($n = 0; $n < 9; $n++) {
    $t = rand(0,100);
    $arr[$n] = $t;
    echo "<div id = 'random'>$arr[$n]</div>";
}

for ($k = 0; $k < 9; $k++) {
    $total += $arr[$k];  
}

echo "Total is: " . $total;
?>