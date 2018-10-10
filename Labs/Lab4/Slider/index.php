<!DOCTYPE html>
<html>
    <head>
        <link "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <title>Lab 4: Carousel</title>
        <?php
           $backgroundImage = "img/sea.jpg";
        ?>
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?-$backgroundImage ?>');
            }
        </style>
    </head>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
    <body>
        <br /> <br />
    <?php
      if(!isset($ImageURLS))
            echo "<h2>Type of a keyword to see a slideshow <br /> composed of images from PixaBay.com</h2>";
      else 
            //Image carousel here
    ?>
    
    <br /> <br />
    <form>
        <input type="text" name="keyword" placeholder="Keyword">
        <input type="submit" value="Submit" />
    </form>
    </body>
</html>
