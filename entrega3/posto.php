<html>
 <body>
 <h3> Postos inseridos no Espaço : <?=$_REQUEST['morada']?> <?=$_REQUEST['codigo']?></h3>
<?php
	// any valid date in the past
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	// always modified right now
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	// HTTP/1.1
	header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
	// HTTP/1.0
	header("Pragma: no-cache");
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
 echo("<td><a href=\"updateRemovePosto.php?morada={$row['morada']}&codigo={$row['codigo']}\">Remover Posto</a></td>\n");
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
<form action="updateAddPosto.php" method="post">
 <p>Adicionar Posto neste Espaço : </p>	
 <p>Codigo: <input type="text" name="codigo_posto"/></p>
 <input type="hidden" value="<?php echo $morada?>" name="morada" />
 <input type="hidden" value="<?php echo $codigo?>" name="codigo_espaco" />
 <p><input type="submit" value="Submit"/></p>
</form>
 <form><input Type="button" VALUE="Go Back" onClick="changeHref()"></form>
  <script>
 function changeHref()
	{
		window.location.href = "http://web.ist.utl.pt/ist178047/espacos.php";
	}
 </script>

 </body>
</html>