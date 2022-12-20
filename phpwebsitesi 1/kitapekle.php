<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tür Ekle</title>
<link rel="stylesheet" type="text/css" href="degistir.css" />
</head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
function ara(islem)
{   
	var yazar=$("#yazar").val();
	var eser=$("#eser").val();
	$.ajax({
		type:'POST',
		url:"kitapislem.php",
		data:'islem='+islem+'&yazar='+yazar+'&eser='+eser,
		success: function(cevap){
		$("#sonuc").html(cevap)
		}
		
	})
	}

function guncelle(islem,id)
{   var answer=confirm("Güncellemek İstediğinize Emin misiniz?");
if(answer){
	var yazarg=$("#yazarg").val();
	var eserg=$("#eserg").val();
	if(yazarg=="" || eserg=="") alert("Boş Bırakmayınız...");
	else
	{
		$.ajax({
		type:'POST',
		url:"kitapislem.php",
		data:'islem='+islem+'&id='+id+'&yazarg='+yazarg+'&eserg='+eserg,
		success: function(cevap){	
		if(cevap==1) alert("Kayıt Güncellendi...");
		location.reload();
		}
		
	})
		
		}
}
	}
	
function sil(islem,id)
{ var answer=confirm("Silmek İstediğinize Emin misiniz?");
if(answer){
	$.ajax({
		type:'POST',
		url:"kitapislem.php",
		data:'islem='+islem+'&id='+id,
		success: function(cevap){	
		if(cevap==0) alert("Bu Türe Ait Kelime Var Silemezsiniz...");
		if(cevap==1) alert("Kayıt Silindi...");
		location.reload();
		}
		
	})
}
}
function getir(islem,id)	
{
	$.ajax({
		type:'POST',
		url:"kitapislem.php",
		data:'islem='+islem+'&id='+id,
		success: function(cevap){	
		$("#guncelle").html(cevap)
		}
		
	})
	}
</script>
<body>
<center>
<form action="kitapekle.php" method="post">
<table border=1><tr><td colspan="2" align="center">Kitap Ekle</td></tr>
<tr><td>Yazar</td><td><input type="text" name="yazar"></td></tr>
<tr><td>Eser</td><td><input type="text" name="eser"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Kaydet"></td></tr></table></form>
</center>
<?php
include("baglanti.php");
if($_POST)
{
$y=$_POST["yazar"]; $e=$_POST["eser"];
if($y=="" || $e=="") echo "<center><font color=red>Boş bırakmayın</font></center>";
else
{   
$sql="select * from kutuphane where yazar='$y' or eser='$e' "; 
$result=mysqli_query($conn,$sql); $say=mysqli_num_rows($result);
if($say<1)
{$sql="insert into kutuphane(yazar,eser) values('$y','$e')";
mysqli_query($conn,$sql);
echo "<center><font color=green>Kaydedildi</font></center>";
header("Refresh: 1;");
}
else echo "<center><font color=red>Farklı birşey deneyin</font></center>";
}
}

?><br><center>
<table><tr><td>Yazar</td><td><input type="text" id="yazar"  onKeyUp="ara('ara');"></td>
<td>Eser</td><td><input type="text" id="eser" onKeyUp="ara('ara');"></td></tr></table></center>
<br>
<div id="sonuc">
<!-- Listeleme -->
<table border=1 align="center"><tr><td colspan=5 align="center"><font color=red><b>Rafta Bulunanlar</b></font></td></tr>
<tr><td>Kitap No</td><td>Yazar</td><td>Eser</td><td>Güncelle</td><td>Sil</td></tr>
<?php 
$sayac=0;
$sql="select yazar,eser,kitap_id from kutuphane"; $result=mysqli_query($conn,$sql);
$say=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result))
{  $sayac++;
	echo "<tr><td>$sayac</td><td>$row[0]</td><td>$row[1]</td><td><button onclick=getir('getir',$row[2]); class=\"one\">Güncelle</button></td><td><button onclick=sil('sil',$row[2]); class=\"two\">Sil</button></td></tr>";
	}
echo "<tr><td colspan=5>Toplam Kayıt Sayısı : $say</td></tr>"; ?></table>
</div>
<div id="guncelle">

</div>


</body>
</html>