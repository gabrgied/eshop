<?php
        session_start();
        $_SESSION['atsakymas4']=$_POST['atsakymas4'];
        $atsakymas4=$_SESSION['atsakymas4'];

 ?>
<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        <form action="vertinimas.php" method="POST">
           <p>Kaip vertinate jūsų prekių pristatymo greitį?</p>
            
            <p><input type ="radio" name ="atsakymas5" value ="1" placeholder="1">Labai blogai</p>
            <p><input type ="radio" name ="atsakymas5" value ="2">Blogai</p>
            <p><input type ="radio" name ="atsakymas5" value ="3"">Vidutiniškai</p>
            <p><input type ="radio" name ="atsakymas5" value ="4"">Gerai</p>
            <p><input type ="radio" name ="atsakymas5" value ="5"">Puikiai</p>
           
            <input class="submit" type="submit" name="submit" value="Pateikti">
        </form>
    </body>
</html>


