<form method="POST">
	<table>
		<tr>
			<td>NIM</td>
			<td><input type="text" name="nimm"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="namaa"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="emaill" placeholder="example@gmail.com"></td>
		</tr>
		<tr>
			<td><input type="submit" name="send" value="submit"></td>
		</tr>
	</table>
</form>

<?php 
include 'konek.php';

if (isset($_POST['send'])) {
	
	if (strlen($_POST['nimm'])==10 && $_POST['nimm']!="" && is_numeric($_POST['nimm'])) {
	$id = $_POST['nimm'];	
	}else{
		echo "NIM kurang";
	}

	if (strlen($_POST['namaa'])>20 || $_POST['namaa']=="") {
		echo "Nama anda tidak valid";
	}else{
		$nam = $_POST['namaa'];
	}

	if (!strpos($_POST['emaill'], "@")||!strpos($_POST['emaill'], ".com")) {
		echo "Email anda tidak sesuai";
	}else{
		$ema = $_POST['emaill'];
	}

	// if (!filter_var($_POST['emaill'],FILTER_VALIDATE_EMAIL)&& $_POST['emaill']!="") {
		
	// }

	if (isset($id) && isset($nam) && isset($ema)) {
		session_start();
		$_SESSION['idd'] = $id;		
		$que = mysqli_query($conn,"INSERT INTO t_jurnal1(NIM, Nama, email) VALUES ($id,'$nam','$ema')");
	if (isset($que)) {
		echo "DATA TERSIMPAN";
		header("Location:komentar.php");
		}else{
			echo "DATA TIDAK TERSIMPAN";
		}
	}
	
}



	
 

 ?>