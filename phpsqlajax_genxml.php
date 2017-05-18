<?php
require("db.php");
// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

@$conexion_orange = mysql_connect($hostname_conexion_orange, $username_conexion_orange, $password_conexion_orange) or trigger_error(mysql_error(),E_USER_ERROR);  
if (!$conexion_orange) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected =mysql_select_db($database_conexion_orange, $conexion_orange);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table

$query = " select`swan_map`.`Identifiant`,`swan_map`.`fin`,`swan_map`.`Etat`,`swan_map`.`Description`, `site_2g3g`.`lat`, `site_2g3g`.`lng` from `swan_map` join `site_2g3g` on `swan_map`.`ID_OB`=`site_2g3g`.`ID_OB`where `Etat` LIKE '%nifi%' OR `Etat` LIKE 'Ini%'   ";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODEfaza 
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("Identifiant", utf8_encode($row['Identifiant']));
  $newnode->setAttribute("fin", utf8_encode($row['fin']));
  $newnode->setAttribute("Etat", utf8_encode($row['Etat']));
  $newnode->setAttribute("Description", utf8_encode($row['Description']));
  $newnode->setAttribute("lat", utf8_encode($row['lat']));
  $newnode->setAttribute("lng", utf8_encode($row['lng']));
  
}

echo $dom->saveXML();

?>