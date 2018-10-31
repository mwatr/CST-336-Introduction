<?php 
    include '../../../../../database.php';
    $dbConn = getDatabaseConnection("c9"); 
    
    function getCategory() {
        global $dbConn;
        $sql = "SELECT DISTINCT category FROM p1_quotes";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll();

        foreach ($records as $r) {
            echo "<option value='" . $r['category'] . "'>" . $r['category'] . "</option>";
        }
    }
    
    function displayQuotes() {
        global $dbConn;
        $namedparameters = array();
        
        $sql = "SELECT quote FROM p1_quotes WHERE 1";
        if (!empty($_GET['keyword'])) {
            $sql .= " AND quote LIKE :quote";
            //match the quote with the selected keyword
            $namedparameters[':quote'] = '%' . $_GET['keyword'] . '%';
        }
        
        if (!empty($_GET['category'])) {
            $sql .= " AND category LIKE :category";
            //match the quote with the selected keyword
            $namedparameters[':category'] = $_GET['category'];
        }
        
        if (!empty($_GET['order'])) {
            $sql .= " ORDER BY quote ";
            switch ($_GET['order']) {
                case "asc":
                    $sql .= " ASC";
                    break;
                case "desc":
                    $sql .= " DESC";
                    break;
            }
        }
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedparameters);
        $records = $stmt->fetchAll();
        
        if (sizeof($records) == 0) {
            echo "No quotes found!";
            return;
        }
        
        if (!empty($_GET['quote'])) {
            echo "";    
        }
        
        foreach($records as $r) {
            echo $r['quote'] . "<br>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <link href="styles.css" rel="stylesheet">
        <h1>Famous Quote Finder!</h1>
        <title>Monday Lab - Practice 7</title>
    </head>
    <body>
        <form>
            Enter Quote Keyword <input type = "text" name = "keyword"><br>
            
            Category <select name='category'>
                <option value = "">Select One</option>
                <?php getCategory(); ?>
            </select> <br>
            Order <br>
            A-Z<input type = "radio" name = "order" value = "asc"><br>
            Z-A<input type = "radio" name = "order" value = "desc"><br>
            
            <input type = "submit" name = "display" value = "Display Quotes!">
        </form>
        
        <?php displayQuotes(); ?>
    </body>
</html>

