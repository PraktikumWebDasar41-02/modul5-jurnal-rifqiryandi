<?php 
include 'konek.php';
session_start();
$nim = $_SESSION['idd'];
$que = mysqli_query($conn,"SELECT * FROM t_jurnal1 WHERE NIM = '$nim'");
if ($arr=mysqli_fetch_array($que)) {
	$name=$arr['Nama'];	
}
 ?>
 <form method="get">
 	<table>
 		<tr>
 			<td>Nama</td>
 			<td><?php echo $name;?></td>
 		</tr>
 		<tr>
 			<td>Komentar</td>
 			<td><textarea name="txtar"></textarea></td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="kirim" value="submit"></td>
 		</tr>
 	</table>	
 </form>
 
 <?php 
 if (isset($_GET['kirim'])) {
 	if (str_word_count($_GET['txtar'])>=5) {
 		$text = $_GET['txtar'];
 		$updt = mysqli_query($conn,"UPDATE t_jurnal1 SET komen='$text' WHERE NIM='$nim'");
 		if (isset($updt)) {
 			
 			header("Location:view.php");
 		}else{
 			echo "update gagal";
 		}
 	}else{
 		echo "MIN 5 kata";
 	}
 }
  ?>
