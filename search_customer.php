
<?php
if ($_COOKIE['UserID'] == null){

	 echo "Please  <a href= \"login.html\"> Log in!!!</a>";;
}


else {
include 'index.php';
include "dbconfig.php";
$TELEPHONE = $_GET['telephone'];

echo  "The search result is: $TELEPHONE";

$query="SELECT * FROM mediaexpress.customers WHERE (`TELEPHONE` LIKE '%".$TELEPHONE."%')";
$raw_results= mysqli_query($conn, $query);

if($raw_results)
{
if(mysqli_num_rows($raw_results)>0)
{

	echo "<br><TABLE border =1>";
	echo "<TR><TD>NAME<TD>TELEPHONE<TD>ADDRESS<TD>COMMENTS\n";
	while($row = mysqli_fetch_array($raw_results))
	{

		$NAME = $row['NAME'];
		$TELEPHONE = $row['TELEPHONE'];
		$ADDRESS = $row['ADDRESS'];
		$COMMENTS = $row['COMMENTS'];
	echo "<TR><TD>$NAME<TD>$TELEPHONE<TD>$ADDRESS<TD>$COMMENTS\n";

	}
	echo "</TABLE>\n";

}
else
{
	echo "<br> No records in the database.\n";
	mysqli_free_result($raw_results);
}
}
else
{
echo "<BR> No result set from the database.\n";
}
}


mysqli_close($conn);
?>
