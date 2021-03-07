<?php

    function user_login ($ID, $pass) 
{ 

$sqlLog = mysql_query("SELECT * FROM 'vartotojai' WHERE 'ID' = '".$ID."' AND 'slaptazodis' = '".$pass."' LIMIT 1"); 
$rowcount = mysql_num_rows($sqlLog); 
if ($rowcount<=0 )
{ 
echo "Neteisingas vartotojo ID/slaptažodis"; 
}
else 
{ 

$_SESSION['ID'] = $ID; 
}
}

