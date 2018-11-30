<?php 
  include 'database.php'; 
  
  function createMeme($line1, $line2, $memetype) {
    
    if($memetype == 'thinking-ape') 
      $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Deep_in_thought.jpg';
    elseif($memetype == 'exoplanet')
      $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/f/fd/HD_40307_e.jpg';
    elseif($memetype == 'dragon')
      $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/0/02/High_Valyrian_flag.png';
    elseif($memetype == 'muraena')
      $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Moray_Eel_at_the_Audubon_Aquarium_of_the_Americas.jpg';
      
    $dbConn = getDatabaseConnection("generate_memes");
    
    //$sql = "INSERT INTO `all_memes` (`id`, `line1`, `line2`, `meme_type`, `meme_url`) VALUES (NULL, '$line1', '$line2', '$memetype', '$memeURL')"; 
    $sql = "INSERT INTO `all_memes` 
      (`id`, `line1`, `line2`, `meme_type`, `meme_url`, `create_date`) 
      VALUES 
      (NULL, '$line1', '$line2', '$memeType', '$memeURL', NOW());"; 

    
    $statement = $dbConn->prepare($sql);
    $result = $statement->execute(); 
    
    if (!$result) {
      return null; 
    }
    
    $last_id = $dbConn->lastInsertId();

    // fetch the newly created object from database
    $sql = "SELECT * FROM all_memes WHERE id = $last_id"; 
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    $newMeme = $records[0];
    
    return $newMeme; 
  }
  
  function displayMemes() {
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * from all_memes WHERE 1"; 
    
    if(isset($_POST['search']) && !empty($_POST['search'])) {
      // query the databse for any records that match this search
      $sql .= " AND (line1 LIKE '%{$_POST['search']}%' OR line2 LIKE '%{$_POST['search']}%')";
    } 
    
    if(isset($_POST['meme-type']) && !empty($_POST['meme-type'])) {
      $sql .= " AND meme_type = '{$_POST['meme-type']}'"; 
    }
    
    if(isset($_POST['order-by-date'])) {
      $sql .= " ORDER BY create_date"; 
      
      if ($_POST['order-by-date'] == 'newest-first') {
        $sql .= " DESC"; 
      }
    }


    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    foreach ($records as $record) {
       $memeURL = $record['meme_url']; 
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; 
       echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; 
       echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
       echo  '</div>'; 
    }
} 

//First line to be executed
if (isset($_POST['line1']) && isset($_POST['line2'])) {
  $memeObj = createMeme($_POST['line1'], $_POST['line2'], $_POST['meme_type']);
}

//Second line to be executed...?
if(isset($_POST['search'])) {
  // query the databse for any records that match this search
  $dbConn = getDatabaseConnection(); 
  $sql = "SELECT * from all_memes WHERE line1 = '{$_POST['search']}'";
  
  $statement = $dbConn->prepare($sql); 
  
  $statement->execute(); 
  $records = $statement->fetchAll(); 
}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Your Meme</title>
    <style>
      body {
        background-color:#81a89a;
      }    
    
      .meme-div{
      width: 450px;
      height: 450px;
      background-size: cover;
      text-align: center;
      position: relative;
      }
      
      h2 {
        position: absolute;
        left: 0;
        right: 0;
        margin: 15px 0;
        padding: 0 5px;
        font-family: impact;
        color: white;
        text-shadow: 1px 1px black;
      }
      
      .line1 {
         top: 0;
      }
      
      .line2 {
         bottom: 0;
      }
    </style>
  </head>
  <body>
    <?php if(isset($_POST['line1']) && isset($_POST['line2'])) { ?>
    <h1>Your Meme</h1>
    <!--The image needs to be rendered for each new meme
    so set the div's background-image property inline-->
    <div class="meme-div" style="background-image:url(<?= $memeObj['meme_url']; ?>);">
        <h2 class="line1"> <?=  $memeObj['line1'] ?> </h2>
        <h2 class="line2"> <?=  $memeObj['line2'] ?> </h2>
    </div>
    <?php } ?>
    
    <div class="memes-container">
      <?php displayMemes(); ?>
      <div style="clear:both"></div>
    </div>
    <h1>All memes previous generated</h1>
    <form method="post" action="meme.php">
        Search:  <input type="text" name="search"></input> 
        <input type="submit"></input>
    </form>

  </body>
</html>