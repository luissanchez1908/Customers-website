
<?php
if ($_COOKIE['UserID'] == null){

	 echo "Please  <a href= \"login.html\"> Log in!!!</a>";;
}


else {
$NAME = $_GET['NAME'];
$TELEPHONE = $_GET['TELEPHONE'];
$ADDRESS = $_GET['ADDRESS'];
$COMMENTS = $_GET['COMMENTS'];


echo "<BR>Name is " . $NAME ;
echo "<BR>Telephone is " . $TELEPHONE;
echo "<BR>Address is " . $ADDRESS;
echo "<BR>Comments is " . $COMMENTS;




if ($NAME == NULL)
{
	echo "<BR>Customer name field cannot be empty. Please <a href= \"addcustomer.php\"> Try again </a><BR>";
}

elseif ($TELEPHONE == NULL)
{
	echo "<BR>Customer description field cannot be empty. Please <a href= \"addcustomer.php\"> Try again </a><BR>";
}

elseif ($ADDRESS== NULL)
{
	echo "<BR>Customer description field cannot be empty. Please <a href= \"addcustomer.php\"> Try again </a><BR>";
}

elseif ($COMMENTS== NULL)
{
	echo "<BR>Customer description field cannot be empty. Please <a href= \"addcustomer.php\"> Try again </a><BR>";
}

else
{


  include "dbconfig.php";
  //create connection
  $conn = mysqli_connect($hostname, $user, $password, $dbname );

  //check connection
  if (!$conn){
  	die("Connection Failed: " . mysqli_connect_error());
  }

	$query = "SELECT name FROM mediaexpress.customers WHERE TELEPHONE = \"$TELEPHONE\"";

	$result = mysqli_query($conn, $query);

	if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
			echo "<BR>There is already a Customer with the same telephone. Please <a href= \"addcustomer.php\"> Try again </a><BR>";
		}

		else
		{

			$i_query = "INSERT into mediaexpress.customers VALUES (ID, \"$NAME\", \"$TELEPHONE\", \"$ADDRESS\", \"$COMMENTS\")";

			$i_result = mysqli_query($conn, $i_query);


			if($i_result)
			{
				echo "<BR>Input succesful<BR>";
			}
			else
			{
				echo "<BR><br>Error" . mysqli_error($conn);
			}

		}

	}

echo "<a href='showtables.php'>MAIN MENU</a>";
}
}

?>
