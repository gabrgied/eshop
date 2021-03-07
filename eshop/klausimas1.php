<?php
        session_start();
        
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        <form action="klausimas2.php" method="POST">
            <p>Kaip vertinate mūsų siūlomų prekių pasirinkimą?</p>
            
            <p><input type ="radio" name ="atsakymas1" value ="1" placeholder="1">Labai blogai</p>
            <p><input type ="radio" name ="atsakymas1" value ="2">Blogai</p>
            <p><input type ="radio" name ="atsakymas1" value ="3"">Vidutiniškai</p>
            <p><input type ="radio" name ="atsakymas1" value ="4"">Gerai</p>
            <p><input type ="radio" name ="atsakymas1" value ="5"">Puikiai</p>
           
            <input class="submit" type="submit" name="submit" value="Pateikti">
        </form>
    </body>
</html>
