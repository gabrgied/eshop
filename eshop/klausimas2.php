<?php
        session_start();
        $_SESSION['atsakymas1']=$_POST['atsakymas1'];
        $atsakymas1=$_SESSION['atsakymas1'];

 ?>
<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        <form action="klausimas3.php" method="POST">
             <p>Kaip vertinate mūsų internetinės svetainės funkcionalumą?</p>
            
            <p><input type ="radio" name ="atsakymas2" value ="1" placeholder="1">Labai blogai</p>
            <p><input type ="radio" name ="atsakymas2" value ="2">Blogai</p>
            <p><input type ="radio" name ="atsakymas2" value ="3"">Vidutiniškai</p>
            <p><input type ="radio" name ="atsakymas2" value ="4"">Gerai</p>
            <p><input type ="radio" name ="atsakymas2" value ="5"">Puikiai</p>
           
            <input class="submit" type="submit" name="submit" value="Pateikti">
        </form>
    </body>
</html>
