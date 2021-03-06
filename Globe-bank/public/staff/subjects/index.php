

<?php require_once('../../../private/initialize.php'); ?>

<?php

$subject_set = find_all_subjects();
 

?>

<?php $page_title = 'Staff menu'; ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>

<div id="content">
	<div class="subjects listing">
	<h1>subjects</h1>
	<div class="actions"> 
	<a class="action" href="<?php echo url_for('/staff/subjects/new.php'); ?>">create new subject</a>
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

	<?php while( $subject=mysqli_fetch_assoc($subject_set)){ ?>
	<tr>
		<td><?php echo $subject['id']; ?></td>
		<td><?php echo $subject['position']; ?></td>
		<td><?php echo $subject['visible']== 1 ? 'true' : 'false'; ?></td>
		<td><?php echo $subject['menu_name']; ?></td>
		<td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id='.$subject['id']); ?>">View</a></td>
		<td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id='.$subject['id']); ?>">Edit</a></td>
		<td><a class="action" href="<?php echo url_for('/staff/subjects/delete.php?id='.$subject['id']); ?>">Delete</a></td>
	</tr>
	<?php } 
//you can also pass multilple values to the page requested as 
// <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?page=1&id='.$subject['id']);
 ?>

	</table>
<?php
mysqli_free_result($subject_set);

?>
	</div>


<?php include(SHARED_PATH.'/staff_footer.php'); ?>
