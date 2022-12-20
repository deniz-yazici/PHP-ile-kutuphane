<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="ornek.css" />
</head>
<body>
	<?php
include("baglanti.php");
$islem=$_POST["islem"];


if($islem=="ara")
{
$yazar=$_POST["yazar"];
$eser=$_POST["eser"];	


$sql="select yazar,eser from kutuphane where yazar like('$yazar%') and eser like('$eser%')";
 
echo '<table border=1 align="center"><tr><td colspan=5 align="center"><font color=red><b>Rafta Bulunanlar</b></font></td></tr>
<tr><td>Kitap No</td><td>Yazar Adı</td><td>Eser Adı</td><td>Güncelle</td><td>Sil</td></tr>'; 
$sayac=0;
$sql="select yazar,eser,kitap_id from kutuphane where yazar like('$yazar%') and eser like('$eser%')";
$result=mysqli_query($conn,$sql); $say=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result))
{  $sayac++;
echo "<tr><td>$sayac</td><td>$row[0]</td><td>$row[1]</td><td><button onclick=getir('getir',$row[2]);>Güncelle</button></td>
<td><button onclick=sil('sil',$row[2]);>Sil</button></td>
</tr>";
}
echo "<tr><td colspan=5>Toplam Kayıt Sayısı : $say</td></tr></table>"; 
}


else if($islem=="guncelle") {   
	$id=$_POST["id"];
	$yazarg=$_POST["yazarg"];
	$eserg=$_POST["eserg"];
	$sql="update kutuphane set yazar='$yazarg',eser='$eserg' where kitap_id=$id"; 
    $result=mysqli_query($conn,$sql);
	echo "1";
	}

else if ($islem=="sil") {
	$id=$_POST["id"];
	$sql="select * from raflar where tur=$id";
$result=mysqli_query($conn,$sql); 
$say=mysqli_num_rows($result);
if($say>0) echo "0";
else {
	$sql="delete from kutuphane where kitap_id=$id";
    $result=mysqli_query($conn,$sql);
	echo "1";
	}
	}
else if($islem=="getir")
{
	$id=$_POST["id"];
	$sql="select * from kutuphane where kitap_id=$id"; 
    $result=mysqli_query($conn,$sql);
echo "<center><table border=1><tr><td colspan=2 align=center>Satır Güncelle</td></tr>";
	while($row=mysqli_fetch_array($result))
{ 
echo "<tr><td>Yazar</td><td><input type=text id='yazarg' value='$row[1]'></td></tr>
<tr><td>Eser</td><td><input type=text id='eserg' value='$row[2]'></td></tr>";}
echo "<tr><td colspan=2 align=center><button onclick=guncelle('guncelle',$id);>Güncelle</td></tr></table></center>";
	}

?>