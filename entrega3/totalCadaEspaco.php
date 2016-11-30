<html>
 <body>
 <h3> Total realizado para cada espaço no Edificio : <?=$_REQUEST['morada']?></h3>
<?php
 $morada = $_REQUEST['morada'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist177981";
 $password = "cjrg2559";
 $dbname = $user;
 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "SELECT morada,codigo,sum(tarifa) as sum
from edificio natural join oferta natural join aluga natural join paga
where morada='$morada' group by morada,codigo;";
 $result = $db->query($sql);
 echo("<table border=\"0\" cellspacing=\"5\">\n");

 foreach($result as $row)
 {
 echo("<tr> \n");
 echo("<td>{$row['morada']}</td>\n");
 echo("<td>{$row['codigo']}</td>\n");
 echo("<td>{$row['sum']}</td>\n");
 echo("</tr>\n");
 }
 echo("</table>\n");
 echo("<p>QUERY: $sql</p>");
 $db = null;
 }
 catch (PDOException $e)
 {
 echo("<p>ERROR: {$e->getMessage()}</p>");
 }
?>

 <form><input Type="button" VALUE="Go Back" onClick="history.go(-1);return true;"></form>

 </body>
</html>