<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="degistir.css" />
<title>Giriş</title>

</head>

<body>
<center>
	<h1>KİTAPLAR SİTESİ</h1>
	<br><br><br><br>
<table border=1><tr><td colspan=2 align="center">Giriş Yap</td></tr>
<form action="index.php" method="post">
<tr><td>Kullanıcı Adı</td><td> <input type="text" name="kullaniciadi"></td></tr>
<tr><td>Şifre</td><td><input type="password" name="sifre"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Giriş Yap" class="a"></td></tr>
</form></table>

<?php
if($_POST){  
	$k=$_POST["kullaniciadi"]; $s=$_POST["sifre"];
	if($k=="" || $s=="" ) echo "Boş Bırakmayınız...";
	else
	   {
		if($k=="yazici" && $s=="1907") {echo "Yönlendiriliyorsunuz..."; 
			header("Refresh:1; url=kitapekle.php");} 
                else echo "<font color=red><b>Kullanıcı Adınız veya Şifreniz Hatalı</b></font>";		
	   }
	 }

?>
</center>
</body>
</html>