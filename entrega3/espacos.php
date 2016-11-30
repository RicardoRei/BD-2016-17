<html>
 <body>
 <h3>Espaços e Postos de Trabalho</h3>
 
<form action="updateAddEspaco.php" method="post">
 <p>Adicionar Espaço : </p>	
 <p>Morada: <input type="text" name="morada"/></p>
 <p><input type="submit" value="Submit"/></p>
</form>

<form action="updateRemoveEspaco.php" method="post">
 <p>Remover Espaço : </p>
  <p>Morada: <input type="text" name="morada"/></p>
 <p>Codigo: <input type="text" name="codigo"/></p>
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
 $sql = "SELECT * from espaco;";
 $result = $db->query($sql);
 echo("Espaços registados :");
echo("<table border=\"0\" cellspacing=\"5\">\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['morada']}</td>\n");
 echo("<td>{$row['codigo']}</td>\n");
 echo("<td><a href=\"posto.php?morada={$row['morada']}&codigo={$row['codigo']}\">Ver Postos</a></td>\n");
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