<?php 
include "f_connect.php";
if($_SESSION['level'] == "admin"){

?>
<h3>Cari Applicant</h3>

 <form name="form1" method="POST" action="">
	Cari: <select name="pilihan" id="pilihan">
	<option value="no">No Applicant</option>
	<option value="nama">Nama Applicant</option>
	</select></tr>
	<input name="data_cari" type="text" id="data_cari" ></input></td>
	<input name="search" class="button" type="submit" id="search" value="Searching"></td>
	</table>
</form>
<?php
}
?>