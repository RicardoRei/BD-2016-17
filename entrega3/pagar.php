<html>
 <body>
<?php
 $numero = $_REQUEST['numero'];
 $data = date('Y-m-d G:i:s');
 $metodo = $_REQUEST['metodo'];
 $timestamp = date('Y-m-d G:i:s');

 try
 {
	 $host = "db.ist.utl.pt";
	 $user ="ist177981";
	 $password = "cjrg2559";
	 $dbname = $user;
	 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $sql1 = "INSERT into paga values ('$numero','$data','$metodo')";
	 $sql2 = "UPDATE estado set estado='paga',time_stamp='$timestamp' where numero='$numero'";
	 echo("<p>QUERY: $sql1</p>");
	 echo("<p>QUERY: $sql2</p>");

	 echo("<p>A Reserva foi paga com sucesso</p>");
	 $db->query($sql1);
	 $db->query($sql2);
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
		window.location.href = "http://web.ist.utl.pt/ist178047/pagamentos.php";
	}
 </script>
 </body>
</html>