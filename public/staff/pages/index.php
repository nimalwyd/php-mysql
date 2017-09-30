

<?php require_once('../../../private/initialize.php'); ?>

<?php 
$page_set = find_all_pages();
?>

<?php $page_title = 'pages menu'; ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<div id="content">
	<div class="pages listing">
	<h1>Pages</h1>
	<div class="actions"> 
	<a class="action" href="<?php echo url_for('/staff/pages/new.php'); ?>">create new page</a>
	</div>
	<table class="list">
	 <tr>
	 <th>ID</th>
	<th>POSITION</th>
	<th>Visible</th>
	<th>Name</th>
	<th>&nbsp</th>
	<th>&nbsp</th>
	<th>&nbsp</th>
	</tr>

	<?php while($page=mysqli_fetch_assoc($page_set)){ ?>
	<tr>
		<td><?php echo $page['id']; ?></td>
                <td><?php echo $page['subject_id']; ?></td>
		<td><?php echo $page['position']; ?></td>
		<td><?php echo $page['visible']== 1 ? 'true' : 'false'; ?></td>
		<td><?php echo $page['menu_name']; ?></td>
		<td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id='.$page['id']); ?>">View</a></td>
		<td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id='.$page['id']); ?>">Edit</a></td>
		<td><a class="action" href="<?php echo url_for('/staff/pages/delete.php?id='.$page['id']); ?>">Delete</a></td>
	</tr>
	<?php } 
//you can also pass multilple values to the page requested as 
// <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?page=1&id='.$subject['id']);
 ?>

	</table>
	</div>
		
<?php

mysqli_free_result($page_set);

?>







<?php include(SHARED_PATH.'/staff_footer.php'); ?>
