<?php
if ($_COOKIE['UserID'] == null){

	 echo "Please  <a href= \"login.html\"> Log in!!!</a>";;
}


else {
include 'index.php';
include "dbconfig.php";
//create connection
$conn = mysqli_connect($hostname, $user, $password, $dbname );

//check connection
if (!$conn){
	die("Connection Failed: " . mysqli_connect_error());
}

echo "<b>Add Customer</b><BR>";


echo "<form action = \"insertcustomer.php\" method = \"GET\">
Name: <input type = \"text\" id = \"NAME\"  name = \"NAME\" ><BR>
Telephone: <input type = \"text\" id = \"TELEPHONE\" name = \"TELEPHONE\" ><BR>
Address: <input type = \"text\" id = \"ADDRESS\" name = \"ADDRESS\" ><BR>
Comments: <input type = \"text\" id = \"COMMENTS\"  name = \"COMMENTS\" ><BR>";

$query = "SELECT NAME FROM database_name.customers";

$result = mysqli_query($conn, $query);

if($result)
{
	if(mysqli_num_rows($result)>0)
	{

		while($row = mysqli_fetch_array($result))
		{

			//$ID= $row['ID'];
			//echo "<option value = \"$ID\"> $ID </option>";
		}

	}


}

echo "</select>
<input type = \"submit\" id = \"addproducts_button\" value = \" Submit Customer\"<BR>
</form>";
}

?>
