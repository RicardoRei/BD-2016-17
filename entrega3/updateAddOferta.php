<html>
 <body>
<?php
 $morada = $_REQUEST['morada'];
 $codigo = $_REQUEST['codigo'];
 $data_i = $_REQUEST['inicio'];
 $data_f = $_REQUEST['fim'];
 $tarifa = $_REQUEST['tarifa'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist177981";
 $password = "cjrg2559";
 $dbname = $user;
 $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "INSERT into Oferta values ('$morada',$codigo,'$data_i','$data_f','$tarifa')";
 echo("<p>QUERY: $sql</p>");
 echo("<p>A nova Oferta foi adicionada com sucesso</p>");
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