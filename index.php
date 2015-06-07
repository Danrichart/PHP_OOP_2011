<?php include_once('header.php'); ?>
	<div id="main_content">
	<?php if(isset($_SESSION['username']) && isset($_SESSION['firstname']) && isset($_SESSION['logged_in'])) {
	?>
			<div class="list_links">
				<a href="logout.php">Logout</a>
			</div>
			<div id="wrap_add">
				<form action="index.php" method="post">
				<input type="submit" value="Add" name="add" id="add" class="add_submit" />
				<input type="text" name="add_list" id="add_list" class="add_class" />
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
			</div>
			<div id="waiting" style="display: none;">
				<img src="images/ajax-loader-large.gif" title="loader" alt="loader" width="25" height="25" />
			</div><!--waiting loading gif-->
		
	<?php
		include_once('user_list.php');
		$display_list = new User_List();
		$display_list->displayList();
	}
	else { ?>
		<p id="landing"><a href="login.php">Login</a></p>
		
	<?php } ?>
	</div>
</body>
</html>