<?php 
	require_once 'lib/jrad/php/master.php';
	include_once 'lib/jrad/php/widget.php';
	include_once 'lib/jrad/php/chart.php';	
	include_once 'src/_config_page.php';	
	include_once 'src/_config_app.php';
	include_once 'src/glob_class.php';
	include_once 'src/glob_action.php';		
	include_once 'src/'.$page_ctx_action;	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	include_once 'inc/meta.php';
	include_once 'inc/head.php';
?>
</head>
<body>
<table border="0">
<tr>
	<td>
    <header>
      <a href="">
        <img src="img/logo.png" alt="" />
        <h2><?php echo APPNAME; ?></h2>
      </a>
    </header>
    
    <?php echo Notice::main($error, $errno); ?>
  </td>
</tr>
<tr>
	<td>