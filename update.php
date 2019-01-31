<?php
if ($_COOKIE['UserID'] == null){

	 echo "Please  <a href= \"login.html\"> Log in!!!</a>";;
}


else {
include 'index.php';
include "dbconfig.php";


$query = "SELECT * FROM mediaexpress.customers";
$result = mysqli_query($conn, $query);


if($result)
{
	if(mysqli_num_rows($result)>0)
	{

		echo "<TABLE border = 1>\n";
		echo "<TR><TD>NAME<TD>TELEPHONE<TD>ADDRESS<TD>COMMENTS\n";
		$table_row = 0;
		echo "<form action = \"updatetable.php\" method = \"POST\">";
		while($row = mysqli_fetch_array($result))
		{
			$table_row ++;

      $NAME = $row['NAME'];
      $TELEPHONE = $row['TELEPHONE'];
      $ADDRESS = $row['ADDRESS'];
      $COMMENTS = $row['COMMENTS'];
			echo "
			<TR><TD><input type = \"text\" value = \"$NAME\" id = \"NAME_$table_row\" name = \"NAME_$table_row\">
			<TD><input type = \"text\" value = \"$TELEPHONE\" id = \"TELEPHONE_$table_row\" name = \"TELEPHONE_$table_row\">
			<TD><input type = \"text\" value = \"$ADDRESS\" id = \"ADDRESS_$table_row\" name = \"ADDRESS_$table_row\">
			<TD><input type = \"text\" value = \"$COMMENTS\" id = \"COMMENTS_$table_row\" name = \"COMMENTS_$table_row\">\n";

		}
		echo "</TABLE>\n";

		echo "<input type =\"text\" value = $table_row id = \"max_row\" name = \"max_row\" readonly hidden><input type =\"submit\" value = \"UPDATE\" id = \"button\" name = \"button\"><BR></form>";
	}

	else
	{

		echo "<br> No records in the database.\n";
		mysqli_free_result($result);
	}

}

else
{
	echo "<BR> No result set from the database.\n";
}
}

mysqli_close($conn);


?>
