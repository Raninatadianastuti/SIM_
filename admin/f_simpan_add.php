<?php

/**
 * @author ADMIN
 * @copyright 2011
 */
 
include "../f_connect.php";
 
$del = $_GET['file'];
$no_applicant = $_GET['id_applicant'];
$mode = $_POST['mode'];

$noap = $_POST['no_applicant'];
$noid = $_POST['no_identitas'];
$nama = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$tlp = $_POST['no_tlp'];
$email = $_POST['email'];
$ttl = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];;
$jk = $_POST['jenis_kelamin'];
$status = $_POST['status_pernikahan'];
$agama = $_POST['agama'];
$gol = $_POST['gol_darah'];
$pend = $_POST['pendidikan'];
$penempatan = $_POST['penempatan'];
$posisi = $_POST['posisi'];
$foto = $_POST['image'];
    
 
if ($mode == 'add'){
         $simpan = mysql_query ("INSERT INTO applicant VALUES ('$noap','$noid','$nama','$alamat','$kota','$tlp','$email','$ttl','$tgl_lahir',
											'$jk','$status','$agama','$gol','$pend','$penempatan','$posisi','$foto','1')") or die("Kesalahan : ".mysql_error());
		$jadwal=mysql_query ("INSERT INTO penjadwalan VALUES ('$noap','','0')") or die("Kesalahan : ".mysql_error());
          header('location:../home.php?file=adm_data');
        }else{
        echo "<font color=red>Data Gagal Disimpan</font>";
}

if ($mode == 'update' & !empty($noid)){	
          $update = mysql_query ("UPDATE applicant SET no_applicant ='$noap', no_identitas = '$noid', nama_lengkap = '$nama', alamat='$alamat', kota = '$kota', no_tlp = '$tlp', email = '$email', tempat_lahir='$ttl', tgl_lahir='$tgl_lahir', jenis_kelamin='$jk', status_pernikahan='$status', agama='$agama', gol_darah='$gol', pendidikan='$pend', penempatan='$penempatan', posisi='$posisi', image='$foto' where no_applicant = '$noap'");
          header('location:../home.php?file=adm_data');
        }else{
        echo "<font color=red>Data Gagal Disimpan</font>";
}

if($del == 'del_applicant' & !empty($no_applicant)){
        $delete = mysql_query("DELETE FROM applicant where no_applicant ='$no_applicant'");
        header('location:../SIM/home.php?file=adm_data');
}

?>
