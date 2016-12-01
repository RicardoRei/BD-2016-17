<html>
 <body>
 <h3>PAGAMENTOS</h3>
 
<form action="pagar.php" method="post">
 <p>Pagar Reserva : </p>	
 <p>Numero: <input type="text" name="numero"/></p>
 <p>Metodo: <input type="text" name="metodo"/></p>

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
 $sql = "SELECT A.morada,A.codigo,A.numero
		 from aluga A
  		 where not exists(
			select numero from paga
			where A.numero=numero);";

 $result = $db->query($sql);
 echo("Reservas em Divida:");
echo("<table border=\"0\" cellspacing=\"5\">\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['morada']}</td>\n");
 echo("<td>{$row['codigo']}</td>\n");
 echo("<td>{$row['numero']}</td>\n");
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