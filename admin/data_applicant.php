<?php 
if($_SESSION['level'] == "admin"){
	$search = "";
	$searchOptions = $_POST['pilihan'];
	$qWord = $_POST['data_cari'];
	$searchMode = false;
	if(isset($_POST['search']) && $qWord != "")
	{
		$search = $qWord;
		$searchMode = true;
	}
	if(isset($_POST['search']) && $qWord === "")
	{
		echo "Please, fill the search box";
	}
	if(isset($_POST['clear']))
	{
		$searchOptions = "clear";
		$qWord = "";
	}
	
	function getStatus($status) {
		switch($status)
		{
			case 1 : return "buffer"; break;
			case 2 : return "terjadwal"; break;
			case 3 : return "hadir"; break;
			case 4 : return "tidak hadir"; break;
			case 5 : return "qualified"; break;
			case 6 : return "hired"; break;
			case 7 : return "terminate"; break;
		}
	}

?>
<p style="font-family:trebuchet MS; color:#006633; font-size:18px; text-decoration:underline; ">DAFTAR APPLICANT</p>
<br/><p>
  
 
 
<form name="form1" method="POST" action="?file=adm_data">
	Cari: <select name="pilihan" id="pilihan">
	<option value="no" <?php echo ($searchOptions == "no" ? "selected" : ""); ?>>No Applicant</option>
	<option value="nama" <?php echo ($searchOptions == "nama" ? "selected" : ""); ?>>Nama Applicant</option>
	<option value="penempatan" <?php echo ($searchOptions == "penempatan" ? "selected" : ""); ?>>Penempatan</option>
	</select></tr>
	<input name="data_cari" type="text" id="data_cari" value="<?php echo $qWord; ?>"></input></td>
	<input name="search" class="button" type="submit" id="search" value="Searching">
	<input name="clear" class="button" type="submit" id="clearSearch" value="Clear Search">
	</td>
	</table>
</form>

</p><br/>

<a href='?file=adm_applicant'><img src='images/op.png' width='16' height='16' border='0'>Tambah Data Applicant</a><br/><br/>

<table width="100%">
   <thead style="height: font-family:trebuchet MS; auto;">
     <tr bgcolor="#8DD3FF">
	   <th style="width: 3%;" align="center">NO</th>
	   <th style="width: 15%;" align="center">No Applicant</th>
	   <th style="width: 30%;" align="center">Nama Lengkap</th>
	   <th style="width: 20%;" align="center">Penempatan</th>
	   <th style="width: 15%;" align="center">Posisi</th>
	   <th style="width: 10%;" align="center">AKSI</th>
	   <th style="width: 10%;" align="center">STATUS</th>
     </tr>
   </thead>
   <tbody id="tableBody" style="font-family:trebuchet MS;">
  <?php
		$query = "SELECT * from applicant";
		if($searchOptions == "no")
		{
			$query = $query." where no_applicant = '$search'";
		}
		if($searchOptions == "nama")
		{
			$query = $query." where nama_lengkap LIKE '%$search%'";
		}
		if($searchOptions == "penempatan")
		{
			$query = $query." where penempatan LIKE '%$search%'";
		}
		if($searchOptions == "clear")
		{
			$query = "SELECT * from applicant";
		}		
		$sql=mysql_query($query) or die(mysql_error());
        if(mysql_num_rows($sql) > 0){
		  $x = 1;
		  while($row=mysql_fetch_array($sql)){
			echo "<tr>
					<td style='border:1px solid #CBF3C2;' align='center'>$x</td>
					<td style='border:1px solid #CBF3C2;' align='center'>$row[no_applicant]</td>
                    <td style='border:1px solid #CBF3C2;' align='center'>$row[nama_lengkap]</td>
					<td style='border:1px solid #CBF3C2;' align='center'>$row[penempatan]</td>
					<td style='border:1px solid #CBF3C2;' align='center'>$row[posisi]</td>
					<td style='border:1px solid #CBF3C2; width: 100%;'><center>
					<a href=\"#\" onclick=\"AddtoPenjadwalan($row[no_applicant]);return false;\"><img src='images/check.png' width='16' height='16' border='0'></a> |
                    <a href='?file=adm_applicant&id_applicant=$row[no_applicant]&mode=view'><img src='images/det.png' width='16' height='16' border='0'></a> | 
					<a href='?file=adm_applicant&id_applicant=$row[no_applicant]&mode=edit'><img src='images/edit.png' width='16' height='16' border='0'></a> |
					<a href='#' onclick='deleteApplicant($row[no_applicant]);return false;'><img src='images/del.png' width='16' height='16' border='0'></a>
					</td>
					<td style='border:1px solid #CBF3C2;' align='center'>".getStatus($row['status'])."</td>
		         </tr>";
			$x++;
		  }
		} else {
		  echo "<tr>
					<td colspan='5' style='border:1px solid #CBF3C2;font-size:20px;' align='center'>Data Kosong</td>
                    </td>
				  </tr>";
		}
  ?>
   </tbody>
  
</table>
 <br />
      <br />
	     <br />
</div></div></div>
<script type="text/javascript">
	function AddtoPenjadwalan(id)
	{
	
	var conf = confirm("Tambahkan ke daftar penjadwalan?");
	
	if(conf==true)
	{
		$.ajax({
			url:"admin/jadwal_add.php?no_applicant="+id,
			type:"GET",
			success:function(hasil)
			{
				if(hasil==1)
				{
					//alert("ok");
					window.location = "home.php?file=penjadwalan";
				}
				else
				{
					alert(hasil);
				}
			}
		 });
	}
	
	}
	
	function deleteApplicant(id)
	{
	
	var conf = confirm("Yakin ingin menghapus applicant ini?");
	
	if(conf==true)
	{
		$.ajax({
			url:"admin/f_hapus_applicant.php?no_applicant="+id,
			type:"GET",
			success:function(hasil)
			{
				if(hasil==1)
				{
					alert("applicant berhasil dihapus");
					window.location = "home.php?file=adm_data";
				}
				else
				{
					alert(hasil);
				}
			}
		 });
	}
	
	}
</script>
<?php  ?>

<?php 

}else{

}
