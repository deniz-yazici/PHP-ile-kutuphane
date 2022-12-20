<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
function ara(islem)
{   
	var yazar=$("#yazar").val();
	var eser=$("#eser").val();
	$.ajax({
		type:'POST',
		url:"islem.php",
		data:'islem='+islem+'&yazar='+yazar+'&eser='+eser,
		success: function(cevap){
		$("#sonuc").html(cevap)
		}
		
	})
	}

function guncelle(islem)
{
	
	}
	
function sil(islem)
{
	
	
	}
</script>
<body>
<center>
<form action="rafekle.php" name="form1" method="post">
<table border=1>
<tr><td colspan="2" align="center">Kelime Ekle</td></tr>
<tr><td>Yazar</td><td><input type="text" name="yazar"></td></tr>
<tr><td>Eser</td><td><input type="text" name="eser"></td></tr>
<tr><td>Tür</td><td><select name="tur">

<?php
include("baglanti.php");
$sql="select * from kutuphane"; $result=mysqli_query($conn,$sql); 
while($row=mysqli_fetch_array($result))
{  
	echo "<option value=$row[0]>$row[1]-$row[2]</option>";
	}
?>
</select> </td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Kaydet"></td></tr>
</table>
</form>
<?php 
include("baglanti.php");
if($_POST)
{    
   
	$y=$_POST["yazar"]; $e=$_POST["eser"]; $tur=$_POST["tur"];
	if($y=="" || $e=="") echo "<center><font color=red>Boş Bırakmayınız...</font></center>";
	else
	{   
	$sql="select * from raflar where yazaradi='$y' ";
	$result=mysqli_query($conn,$sql); $say=mysqli_num_rows($result);
	    if($say<1)
		{$sql="insert into raflar(yazaradi,eseradi,tur) values('$y','$e',$tur)";
		mysqli_query($conn,$sql);
		echo "<center><font color=green>Kaydetme İşlemi Başarılı...</font></center>";
		}
		else echo "<center><font color=red>Zaten Kayıtlı...</font></center>";
		
		}
	}
?><br>
<table><tr><td>Yazar</td><td><input type="text" id="yazaradi"  onKeyUp="ara('ara');"></td>
<td>Eser</td><td><input type="text" id="eseradi" onKeyUp="ara('ara');"></td></tr></table>
<div id='sonuc'>
<?php
echo "<br><table border=1><tr><td colspan=4 align=center bgcolor='#FF920D'>Raflar</td></tr>
<tr><td><font color=red><b>Sıra</b></font></td><td><font color=red><b>Yazar</b></font></td><td>
<font color=red><b>Eser</b></font></td><td><font color=red><b>Tür</b></font></td></tr>";
$sql="select yazaradi,eseradi,yazar,eser from raflar,kutuphane where tur=kitap_id order by yazaradi"; 
$result=mysqli_query($conn,$sql);$say=mysqli_num_rows($result); $sayac=0;
while ($row=mysqli_fetch_array($result))
{
$sayac++;
echo "<tr><td><font color=blue><b>$sayac</b></font></td><td>$row[0]</td><td>$row[1]</td>
<td>$row[2]-$row[3]</td></tr>";
}
echo "<tr><td colspan=4 align=right>Toplam Kayıt Sayısı:<font color=red><b>$say</b></font></table>";
?>
</div>
</center>
</body>
</html>











