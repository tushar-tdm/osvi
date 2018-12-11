<?php

$dbsn = "localhost";
$dbun = "root"; //pi
$dbpwd = "";	//tushar
$dbname = "osvi";

$conn = mysqli_connect($dbsn,$dbun,$dbpwd,$dbname);
if($conn == 'false'){
	echo "cannot connect to the database";
}

// website password in 000webhostapp.com = Qddk^Eoy6TzJPPFN&R(%  Website name = NITKosvi 
