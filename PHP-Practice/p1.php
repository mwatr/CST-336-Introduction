<html>
    
<?php
/*Notice there can be multiple PHP declarations.*/

$Name = "Toad";   //Demonstrating that variables in PHP are case sensitive
$name = 5;
echo "<div>$Name</div>";

$MyName = $Name . " Phallum"; //The '.' is what concatenates strings
echo "$MyName";
echo "<div>My name is " . $MyName . " </div>";
echo "<div>I am " . $name . " centuries old. </div>";

for ($n = 0; $n < $name; $n++) {
    echo "<div>Mah Boi</div>";
}
?>

<?php

$n = 20943;
$n = number_format($n,2); 
echo $n  . "<br><br>";

$n = rand(5,15); //random number generator?   
echo $n  . "<br><br>";

$n = "hElLo WoRlD!";
echo strtoupper($n)  .  "<br><br>";

?>
</html>