<?php
 if ($_COOKIE['UserID'] == null){
	 
		echo "Please  <a href= \"login.html\"> Log in!!!</a>";;
 }


else {
include 'index.php'; ?>
<html>
<form action = "search_customer.php"  method = "GET">
<br> TELEPHONE: <input type = 'integer' name = "telephone"  id = "telephone">
<input type = "submit" value = "Search!">
<br>
<br>
</html>
<?php
include 'dbconfig.php';

$query1 = "select * from database_name";

echo "<BR>Customers: ";
$result1 = mysqli_query($conn, $query1);

if($result1)
{
  if(mysqli_num_rows($result1)>0)
  {

    echo "<br><TABLE border =1>";
    echo "<TR><TD>NAME<TD>TELEPHONE<TD>ADDRESS<TD>COMMENTS\n";
    while($row = mysqli_fetch_array($result1))
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
    mysqli_free_result($result1);
  }

}
}
 ?>
