
<?php require_once('../../../private/initialize.php'); ?>
<?php 

if(is_post_request())
{
$menu_name = $_POST['menu_name'] ;
$position = $_POST['postion'] ;
$visible = $_POST['visible'] ;

$sql= "insert into subjects ";
$sql .= "(menu_name,position,visible) ";
$sql .= "values(";
$sql .= "'".$menu_name."', ";
$sql .= "'".$position."', ";
$sql .= "'".$visible."'";
$sql .= ")";
$result=mysqli_query($db,$sql);
//for insert statements , $result will be either true or false
if($result)
{

$new_id=mysqli_insert_id($db);  // return the id of last item inserted
redirect_to(url_for('/staff/subjects/show.php?id='.$new_id));
}
else
{
//insert failed
echo mysqli_error($db);  //outputs the last query error
db_disconnect($db);
exit;

}
}else
{
redirect_to(url_for('/staff/subjects/new.php'));
}

?>
