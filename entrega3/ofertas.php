<html>
 <body>
 <h3>OFERTAS</h3>
 
<form action="updateAddOferta.php" method="post">
 <p>Adicionar Oferta : </p>	
 <p>Morada: <input type="text" name="morada"/></p>
 <p>Codigo: <input type="text" name="codigo"/></p>
 <p>Data inicio(ano/mes/dia): <input type="text" name="inicio"/></p>
 <p>Data fim(ano/mes/dia): <input type="text" name="fim"/></p>
 <p>Tarifa(semanal/mensal): <input type="text" name="tarifa"/></p>

 <p><input type="submit" value="Submit"/></p>
</form>

<form action="updateRemoveOferta.php" method="post">
 <p>Remover Oferta : </p>
  <p>Morada: <input type="text" name="morada"/></p>
 <p>Codigo: <input type="text" name="codigo"/></p>
 <p>Data inicio(ano/mes/dia): <input type="text" name="inicio"/></p>
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
 $sql = "SELECT morada,codigo,data_inicio FROM Oferta;";

 $result = $db->query($sql);
 echo("Ofertas registadas :");
echo("<table border=\"0\" cellspacing=\"5\">\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['morada']}</td>\n");
 echo("<td>{$row['codigo']}</td>\n");
 echo("<td>{$row['data_inicio']}</td>\n");
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