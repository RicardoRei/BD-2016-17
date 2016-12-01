<html>
 <body>
<?php
 $morada = $_REQUEST['morada'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist177981";
 $password = "cjrg2559";
 $dbname = $user;
 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "INSERT INTO edificio VALUES ('$morada');";
 echo("<p>QUERY: $sql</p>");
 echo("<p>O novo Edificio foi adicionado com sucesso</p>");
 $db->query($sql);
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
		window.location.href = "http://web.ist.utl.pt/ist178047/edificios.php";
	}
 </script>
 </body>
</html>