<?php require_once('../../../private/initialize.php'); ?>
<?php


//$id= $_GET['id'];
$id= isset($_GET['id']) ? $_GET['id'] : '1';
//echo $id;
echo htmlspecialchars($id);  // as a precaution against hacking using html codes as part of string passed or using other scripting languages like java script  in the string passed


$page =  find_page_by_id($id);
?>

<div id="content">
<a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to list</a>

<!-- url encode helps to deal with special character in the query part of the url -->
<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">

    <h1>Page: <?php echo h($page['menu_name']); ?></h1>

    <div class="attributes">
      <?php $subject = find_subject_by_id($page['subject_id']); ?>
      <dl>
        <dt>Subject</dt>
        <dd><?php echo h($subject['menu_name']); ?></dd>
      </dl>
      <dl>
        <dt>Menu Name</dt>
        <dd><?php echo h($page['menu_name']); ?></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd><?php echo h($page['position']); ?></dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd><?php echo $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><?php echo h($page['content']); ?></dd>
      </dl>
    </div>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

