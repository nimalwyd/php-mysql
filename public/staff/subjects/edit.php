<?php require_once('../../../private/initialize.php'); ?>
<?php
$page_title ='Edit Subject';
include(SHARED_PATH.'/staff_header.php');

if(!isset($_GET['id'])){
redirect_to(url_for('/staff/subjects/index.php'));
}
$id=$_GET['id'];


if(is_post_request())
{
$subject=[];
  $subject['id'] = $id;
$subject['menu_name']=$_POST['menu_name'] ;
$subject['position']=$_POST['position'] ;
$subject['visible']=$_POST['visible'] ;
/*
$errors = validate_subject($subject);
if(!empty($errors)){


var_dump($errors);
exit;


}
*/

$sql="update subjects set ";
$sql.="menu_name='".$subject['menu_name']."', ";
$sql.="position='".$subject['position']."', ";
$sql.="visible='".$subject['visible']."' ";
$sql.="where id='".$id."' ";
$sql.="limit 1";

$result=mysqli_query($db,$sql);
//for update statements the result is true/false
if($result)
{
redirect_to(url_for('/staff/subjects/show.php?id='.$id));
}
else
{
//update failed
echo mysqli_error($db);  //outputs the last query error
db_disconnect($db);
exit;
}

}else
{
//redirect_to(url_for('/staff/subjects/new.php'));
$subject = find_subject_by_id($id);
$subject_set=find_all_subjects();
$subject_count=mysqli_num_rows($subject_set);
mysqli_free_result($subject_set);
}

?>

<div id="content">
	<a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">
&laquo; Back to list </a>
<div class="subject new">
<h1>Edit subject</h1>


<form action="<?php echo url_for('/staff/subjects/edit.php?id='.$id); ?>" method="post">
<dl>  
<dt>menu Name</dt>
<dd><input type="text" name="menu_name" value="<?php echo $subject['menu_name']; ?>" /></dd>
</dl>
<dl>
<dt> Position</dt>
<dd>
<select name="postion">
<?php
  for($i=1; $i <= $subject_count; $i++) {
    echo "<option value=\"{$i}\"";
    if($subject["position"] == $i) {
      echo " selected";
    }
    echo ">{$i}</option>";
  }
?>

</select>
</dd>
</dl>
<dl>
<dt>Visible</dt>
<dd>
<input type="hidden" name="visible" value="0" />
<input type="checkbox" name="visible" value="1"<?php 
 if($subject['visible'] =="1"){echo"checked";}?> />
</dd>
</dl>
<div id="operation">
<input type="submit"value="Edit subject"/>
</div>
</form>
</div>
</div>


