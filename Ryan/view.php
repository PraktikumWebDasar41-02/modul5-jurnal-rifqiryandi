<?php 
include 'konek.php';
session_start();
$nim = $_SESSION['idd'];
$que = mysqli_query($conn,"SELECT * FROM t_jurnal1 WHERE NIM = '$nim'");
if ($arr=mysqli_fetch_array($que)) {
	$name=$arr['Nama'];	
	$tex = $arr['komen'];
	$itung = str_word_count($tex);
	echo "Nama :".$name."<br>";
	echo "komentar :".$tex."<br>";
	echo "Jumlah :".$itung."<br>";
}
?>


