<?php
	include "../f_connect.php";
	
	$no_ap=$_GET['no_applicant'];
	
	$sql=mysql_query("SELECT * from applicant where no_applicant='$no_ap'") or die (mysql_query());
	
	if($res = mysql_num_rows($sql) == 1)
	{
		$query=mysql_query("DELETE from applicant where no_applicant='$no_ap'");
		echo 1;
	}
?>