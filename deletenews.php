<?php
include 'functions.php';

$id =$error= "";

if(isset($_GET['id']))
{
	$id = sanitizeString ( $_GET['id'] );

	if ($id == "") {
		$error = "idÎª¿Õ£¡";
	} else {
		$query = "delete from news where id = '$id'";

		if (mysqli_num_rows ( queryMysql ( $query ) ) == 0) {
			$error = "É¾³ýÊ§°Ü£¡";
		} else {
			$error = "É¾³ý³É¹¦£¡";
		}
		
		//redirect('newslist.php');
	}
}

?>