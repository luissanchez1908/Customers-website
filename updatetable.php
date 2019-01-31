
<?php
if ($_COOKIE['UserID'] == null){

	 echo "Please  <a href= \"login.html\"> Log in!!!</a>";;
}


else {
include "dbconfig.php";

$max_row = $_POST["max_row"];





for($i = $max_row; $i>0 ; $i--)
{
//$p_id = $_POST["id_$i"];

$NAME = $_POST["NAME_$i"];
$TELEPHONE = $_POST["TELEPHONE_$i"];
$ADDRESS = $_POST["ADDRESS_$i"];
$COMMENTS = $_POST["COMMENTS_$i"];

//UPDATE `customers` SET `NAME`='Luis A',`TELEPHONE`=9087648409,`ADDRESS`='313 pearl st',`COMMENTS`= 'new' WHERE `TELEPHONE`= '9087648409'

$query = "UPDATE mediaexpress.customers SET NAME =  \"$NAME\" , TELEPHONE = \"$TELEPHONE\" , ADDRESS= \"$ADDRESS\" ,COMMENTS = \"$COMMENTS\" WHERE TELEPHONE= $TELEPHONE";

$result = mysqli_query($conn, $query);

if($result)
{
	echo "<BR>Update succesful<BR>";
}
else
{
	echo "<BR><br>Error" . mysqli_error($conn);
}

}

echo "<a href='showtables.php'>MAIN MENU</a><br>";

}

?>
