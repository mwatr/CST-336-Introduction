<?php include '../../database.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Meme Lab</title>
    <style>
      body {
        background-color:#81a89a;
      }
    </style>
  </head>
  <body>
    <h1>Meme Generator</h1>
    <img height="100px" width="150px" src="https://www.publicdomainpictures.net/pictures/90000/velka/alpaca-chewing.jpg" alt="a-chewing-alpaca">
    <h2>Welcome to my Meme Generator!</h2>
    
    <form method="post" action="meme.php">
        Line 1: <input type="text" name="line1"></input> <br/>
        Line 2: <input type="text" name="line2"></input> <br/>
        Meme Type:
        <select name="meme_type">
          <option value="thinking-ape">Deep Thought Ape</option>
          <option value="exoplanet">Exoplanet</option>
          <option value="dragon">Dragon</option>
          <option value="muraena">Moray Eel</option>
        </select>

        <input type="submit"></input>
    </form>
    
    <a href="./meme.php">View all memes</a>
    
  </body>
</html>