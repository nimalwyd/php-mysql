<?php require_once('../../../private/initialize.php'); ?>
<?php
$page_title ='New page';
include(SHARED_PATH.'/staff_header.php');


$menu_name = '' ;
$position = '' ;
$visible = '' ;
if(is_post_request())
{
$menu_name = $_POST['menu_name'] ;
$position = $_POST['postion'] ;
$visible = $_POST['visible'] ;

echo "Form Parameters<br />";
echo "Menu name: ".$menu_name."<br />";
echo "Position: ".$position."<br />";
echo "Visible: ".$visible."<br />";

}

?>

<div id="content">
	<a class="back-link" href="<?php echo url_for('/staff/index.php'); ?>">
&laquo; Back to list </a>
<div class="subject new">
<h1>Edit Page</h1>


<form action="<?php echo url_for('/staff/pages/edit.php'); ?>" method="post">
<dl>  
<dt>menu Name</dt>
<dd><input type="text" name="menu_name" value="<?php echo $menu_name; ?>" /></dd>
</dl>
<dl>
<dt> Position</dt>
<dd>
<select name="postion">
<option value="1">1</option>
</select>
</dd>
</dl>
<dl>
<dt>Visible</dt>
<dd>
<input type="hidden" name="visible" value="0" />
<input type="checkbox" name="visible" value="1" />
</dd>
</dl>
<div id="operation">
<input type="submit"value="Edit page"/>
</div>
</form>
</div>
</div>

