<html>
 <body>
 <h3> Postos inseridos no Espaço : <?=$_REQUEST['morada']?> <?=$_REQUEST['codigo']?></h3>
<?php
 $morada = $_REQUEST['morada'];
 $codigo = $_REQUEST['codigo'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist177981";
 $password = "cjrg2559";
 $dbname = $user;
 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT morada, codigo, codigo_espaco
from Espaco natural join Posto where morada='$morada' and codigo=$codigo";
 $result = $db->query($sql);
 echo("<table border=\"0\" cellspacing=\"5\">\n");

 foreach($result as $row)
 {
 echo("<tr> \n");
 echo("<td>{$row['morada']}</td>\n");
 echo("<td>{$row['codigo']}</td>\n");
 echo("<td>{$row['codigo_espaco']}</td>\n");
 echo("<td><a href=\"updateRemoveEspaco.php?morada={$row['morada']}&codigo={$row['codigo']}\">Remover Posto</a></td>\n");
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
<form action="addPosto.php" method="post">
 <p>Adicionar Posto : </p>	
 <p>Morada: <input type="text" name="morada"/></p>
 <p>Codigo: <input type="text" name="codigo"/></p>
 <p><input type="submit" value="Submit"/></p>
</form>

 <form><input Type="button" VALUE="Go Back" onClick="history.go(-1);return true;"></form>

 </body>
</html>