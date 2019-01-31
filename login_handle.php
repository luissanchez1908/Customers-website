<?php
include 'dbconfig.php';

$userid= $_POST['UserID'];
$password= $_POST['Password'];

//echo $userid;
//echo $password;

$query = sprintf("SELECT * FROM mediaexpress.users WHERE UserID= '%s' AND Password = '%s'",$_POST['UserID'], $_POST['Password']);
$result = mysqli_query($conn, $query);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$query = sprintf("SELECT UserID, Password FROM mediaexpress.users WHERE UPPER(UserID) = '%s' AND Password = '%s'", strtoupper($_POST['UserID']), $_POST['Password']);
			$result = mysqli_query($conn, $query);
			if ($result) {
				if (mysqli_num_rows($result) > 0) {

					setcookie("UserID",$_POST['UserID'], time() + (86400 * 30), "/");
					header("Location: showtables.php");

				}

			}

		}else {
			echo "Wrong loging ";}


	}

	mysqli_close($conn);

?>
