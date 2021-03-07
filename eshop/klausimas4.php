<?php
        session_start();
        $_SESSION['atsakymas3']=$_POST['atsakymas3'];
        $atsakymas3=$_SESSION['atsakymas3'];
 ?>
<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        <form action="klausimas5.php" method="POST">
            <p>Kaip įvertintumėte mūsų prekių kokybę?</p>
            
            <p><input type ="radio" name ="atsakymas4" value ="1" placeholder="1">Labai blogai</p>
            <p><input type ="radio" name ="atsakymas4" value ="2">Blogai</p>
            <p><input type ="radio" name ="atsakymas4" value ="3"">Vidutiniškai</p>
            <p><input type ="radio" name ="atsakymas4" value ="4"">Gerai</p>
            <p><input type ="radio" name ="atsakymas4" value ="5"">Puikiai</p>
           
            <input class="submit" type="submit" name="submit" value="Pateikti">
        </form>
    </body>
</html>
