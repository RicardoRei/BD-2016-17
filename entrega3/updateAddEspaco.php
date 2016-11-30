<html>
 <body>
<?php
 $morada = $_REQUEST['morada'];
 $num = rand();
 $codigo = "$num";

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
 	$db->exec("INSERT into alugavel values ('$morada', '$codigo', 'http://lorempixel.com/400/200/')");
 	$db->exec("INSERT into espaco values ('$morada','$codigo')");
 	$db->commit();
 }catch (Exception $e) {
  $db->rollBack();
  echo "Failed: " . $e->getMessage();
}

 echo("<p>Espaço adicionado com sucesso ao Edificio $morada</p>");
 
?>
 <form><input Type="button" VALUE="Go Back" onClick="history.go(-1);return true;"></form>
 </body>
</html>