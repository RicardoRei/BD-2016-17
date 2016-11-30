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

 $sql = "SELECT distinct P.morada, P.codigo, P.codigo_espaco
from espaco E, posto P where P.morada='$morada' and P.codigo_espaco='$codigo'";
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
 echo ("<p>Adicionar Novo Posto neste Espaco :</p>");
 echo("<td><a href=\"updateAddPosto.php?mo=$morada&cod_espaco=$codigo\">Adicionar Posto</a></td>\n");
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