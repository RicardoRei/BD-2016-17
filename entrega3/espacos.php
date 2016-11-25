<html>
 <body>
 <h3>ESPAÇOS</h3>
 
<form action="updateAddEspaco.php" method="post">
 <p>Adicionar Espaço Trabalho: <input type="text" name="morada"/></p>
 <p><input type="submit" value="Submit"/></p>
</form>

<form action="updateAddPosto.php" method="post">
 <p>Adicionar Posto Trabalho: <input type="text" name="morada"/></p>
 <p><input type="submit" value="Submit"/></p>
</form>

<form action="updateRemove.php" method="post">
 <p>Remover Espaço Trabalho: <input type="text" name="morada"/></p>
 <p><input type="submit" value="Submit"/></p>
</form>

<form action="updateRemove.php" method="post">
 <p>Remover Posto: <input type="text" name="morada"/></p>
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

 $sql = "SELECT * FROM Espaco;";

 $result = $db->query($sql);
 echo("Espaços registados :");
 echo("<table border=\"0\" cellspacing=\"5\">\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['morada']}</td>\n");
 echo("<tr>\n");
 echo("<td>{$row['codigo']}</td>\n");
 echo("</tr>\n");
 }
 echo("</table>\n");

 $sql = "SELECT * FROM ;";

 $result = $db->query($sql);
 echo("Espaços registados :");
 echo("<table border=\"0\" cellspacing=\"5\">\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['morada']}</td>\n");
 echo("<tr>\n");
 echo("<td>{$row['codigo']}</td>\n");
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