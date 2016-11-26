<html>
 <body>
<?php
 $numero = $_REQUEST['n'];
 $data = $_REQUEST['inicio'];
 $metodo = $_REQUEST['metodo'];

 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist177981";
 $password = "cjrg2559";
 $dbname = $user;
 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "INSERT into Paga values ($numero,'$data','$metodo')";
 echo("<p>QUERY: $sql</p>");
 echo("<p>A Reserva foi paga com sucesso</p>");
 $db->query($sql);
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