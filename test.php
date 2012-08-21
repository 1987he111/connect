<?php
require_once("db.php");
try{
$db = new PDO(
"mysql:host=yallara.cs.rmit.edu.au".";port=54403".";dbname=".DB_NAME,
DB_USER,
DB_PW
);
$sql = "select region_id, region_name from region";
foreach($db->query($sql) as $row){
echo $row['region_id'].'-'.$row['region_name'].'<br />';
}
$db = null;
}catch(PDOException $e){
echo $e->getMessage();
}
?>
