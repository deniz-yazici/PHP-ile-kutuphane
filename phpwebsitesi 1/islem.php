<?php
include("baglanti.php");
$islem=$_POST["islem"];
$yazar=$_POST["yazar"];
$eser=$_POST["eser"];

if($islem=="ara")
{
echo "<br><table border=1><tr><td colspan=4 align=center bgcolor='#FF920D'>Raflar</td></tr>
<tr><td><font color=red><b>Sıra</b></font></td><td><font color=red><b>Yazar</b></font></td><td>
<font color=red><b>Eser</b></font></td><td><font color=red><b>Tür</b></font></td></tr>";
$sql="select yazaradi,eseradi,yazar,eser from raflar,kutuphane where yazaradi like ('$yazar%') and 
eseradi like('$eser%') and tur=kitap_id order by yazaradi"; 
$result=mysqli_query($conn,$sql);$say=mysqli_num_rows($result); $sayac=0;
while ($row=mysqli_fetch_array($result))
{
$sayac++;
echo "<tr><td><font color=blue><b>$sayac</b></font></td><td>$row[0]</td><td>$row[1]</td>
<td>$row[2]-$row[3]</td></tr>";
}
echo "<tr><td colspan=4 align=right>Toplam Kayıt Sayısı:<font color=red><b>$say</b></font></table>";
}
else if($islem=="guncelle")
{
	
	
	}

else if ($islem=="sil")
{
	
	
	
	}

?>