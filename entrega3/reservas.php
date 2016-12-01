<html>
 <body>
 <h3>RESERVAS</h3>
 
<form action="addReserva.php" method="post">
 <p>Criar Reserva : </p>	
 <p>Morada: <input type="text" name="morada"/></p>
 <p>Codigo: <input type="text" name="codigo"/></p>
 <p>Data inicio(ano/mes/dia): <input type="text" name="inicio"/></p>
 <p>NIF: <input type="text" name="nif"/></p>

 <p><input type="submit" value="Submit"/></p>
</form>

<?php
	// any valid date in the past
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	// always modified right now
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	// HTTP/1.1
	header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
	// HTTP/1.0
	header("Pragma: no-cache");
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist177981";
 $password = "cjrg2559";
 $dbname = $user;

 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "SELECT O.morada,O.codigo,O.data_inicio
		from oferta O
		where not exists(
				Select morada,codigo,data_inicio
				from aluga
				where O.morada=morada and O.codigo=codigo and O.data_inicio=data_inicio);";

 $result = $db->query($sql);
 echo("Espaços com Ofertas mas não Alugados :");
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
 <form><input Type="button" VALUE="Go Back" onClick="changeHref()"></form>
  <script>
 function changeHref()
	{
		window.location.href = "http://web.ist.utl.pt/ist178047/home_page.html";
	}
 </script>

 </body>