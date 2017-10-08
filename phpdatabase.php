<?php

$connection=mysqli_connect("localhost","user2","n","phplearn");

if(mysqli_connect_errno())
{

echo "Failed to connect to mysql: ".mysqli_connect_error();

}
else
{

echo "connected to the database";

}
$sqlinsert= "insert into table1 values(1,'nimal',26)";
$sqlinsert1= "insert into table1 values(2,'nirmal',26)";
$sqldelete="delete from table1 where id ='2'";
$sqlselect="select * from table1";
$sqlupdate="update table1 set name = 'nirmal krishna' where id = '2'";
$result=mysqli_query($connection,$sqlselect);
if($result)
{
echo nl2br("\nsuccess");
}
else
{
echo nl2br("\nfail");
}


echo "<table border='1' style='border-collapse:collapse'>";
echo "<th> id </th><th>name</th><th>age</th>";
while($row=mysqli_fetch_assoc($result))
{
echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td></tr>";

}

echo "</table>";

mysqli_close($connection);






?>
