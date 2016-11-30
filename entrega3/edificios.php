<html>
 <body>
 <h3>EDIFICIOS</h3>
 
<form action="updateAdd.php" method="post">
 <p>Adicionar Edificio: <input type="text" name="morada"/></p>
 <p><input type="submit" value="Submit"/></p>
</form>

<form action="updateRemove.php" method="post">
 <p>Remover Edificio: <input type="text" name="morada"/></p>
 <p><input type="submit" value="Submit"/></p>
</form>

<?php
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist177981";
 $password = "cjrg2559";
 $dbname = $user;

 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT morada FROM edificio;";

 $result = $db->query($sql);
 echo("Edificios registados :");
echo("<table border=\"0\" cellspacing=\"5\">\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['morada']}</td>\n");
 echo("<td><a href=\"totalCadaEspaco.php?morada={$row['morada']}\">Ver Espacos</a></td>\n");
 echo("</tr>\n");
 }
 echo("</table>\n");

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