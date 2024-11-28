<?php
// DATABASE
$sname= "localhost";
$unmae= "id17473629_webpembelajarandarjah6";
$password = "-ce^ij1hBvz(uZ<&";
$db_name = "id17473629_webdarjah6";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}