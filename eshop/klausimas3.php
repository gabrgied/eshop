<?php
        session_start();
        $_SESSION['atsakymas2']=$_POST['atsakymas2'];
        $atsakymas2=$_SESSION['atsakymas2'];
 ?>
<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        <form action="klausimas4.php" method="POST">
             <p>Kaip vertinate mūsų siūlomų prekių kainą?</p>
            
            <p><input type ="radio" name ="atsakymas3" value ="1" placeholder="1">Labai blogai</p>
            <p><input type ="radio" name ="atsakymas3" value ="2">Blogai</p>
            <p><input type ="radio" name ="atsakymas3" value ="3"">Vidutiniškai</p>
            <p><input type ="radio" name ="atsakymas3" value ="4"">Gerai</p>
            <p><input type ="radio" name ="atsakymas3" value ="5"">Puikiai</p>
           
            <input class="submit" type="submit" name="submit" value="Pateikti">
        </form>
    </body>
</html>


