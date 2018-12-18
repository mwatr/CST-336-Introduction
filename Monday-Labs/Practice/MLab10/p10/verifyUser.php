<?php include 'database.php'; 
$dbConn = getDatabaseConnection("c9");
$sql = "SELECT * FROM users WHERE username =:username AND password =:password";
$statement = $dbConn->prepare($sql);

$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
// if (($username === 'user_1' || $username === 'user_2') && password === 's3cr3t') {
//     $dbConn = getDatabaseConnection("c9");
//     $sql = "SELECT * FROM `p10_users` WHERE 1";
//     $statement = $dbConn->prepare($sql);
//     $result = $statement->execute();
// } else {
//     echo "NO!";
// }
?>