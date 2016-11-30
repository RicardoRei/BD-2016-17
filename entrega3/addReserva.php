<html>
 <body>
<?php
 $morada = $_REQUEST['morada'];
 $codigo = $_REQUEST['codigo'];
 $data = $_REQUEST['inicio'];
 $nif = $_REQUEST['nif'];
 $num = rand();
 $numero = "$num";
 $timestamp = date('Y-m-d G:i:s');
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist177981";
 $password = "cjrg2559";
 $dbname = $user;
 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password,array(PDO::ATTR_PERSISTENT=> true));
 } catch (Exception $e) {
  die("Unable to connect: " . $e->getMessage());
}
 try{
 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	$db->beginTransaction();
 	$db->exec("INSERT into reserva values ('$numero')");
 	$db->exec("INSERT into aluga values ('$morada','$codigo','$data','$nif','$numero')");
 	$db->exec("INSERT into estado values ('$numero', '$timestamp', 'aceite')");
 	$db->commit();
 }catch (Exception $e) {
  $db->rollBack();
  echo "Failed: " . $e->getMessage();
}

 echo("<p>Reserva efectuada com sucesso</p>");
 
?>
 <form><input Type="button" VALUE="Go Back" onClick="history.go(-1);return true;"></form>
 </body>
</html>