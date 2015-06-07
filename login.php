<?php 
	include ('header.php'); 
	include ('user.php');
?>

	<div id="main_content">
		<div id="login">
		<?php 
		if(isset($_POST['submit'])){
				$login = new User;
				$login->loginUser();
				if($login->loginUser()==TRUE){
					header("Location: index.php");
				}
				else { ?>
					<table>
						<form action="login.php" method="post">
						<tr><td class="label">Username:</td><td><input type="text" name="username" id="username" class="input_txt" /></td></tr>
						<tr><td class="label">Password:</td><td><input type="password" name="password" id="password" class="input_txt" /></td></tr>
						<tr><td></td><td><input type="submit" value="submit" name="submit" id="submit" class="submit" /></td></tr>
						<tr><td></td><td><a href="passreset.php">Forget your password?</a></td></tr>
					</table>
			<?php }
		}
		else { 
		?>
			<table>
			<form action="login.php" method="post">
			<tr><td class="label">Username:</td><td><input type="text" name="username" id="username" class="input_txt" value="testme@gmail.com" /></td></tr>
			<tr><td class="label">Password:</td><td><input type="password" name="password" id="password" class="input_txt" value="testme1" /></td></tr>
			<tr><td></td><td><input type="submit" value="submit" name="submit" id="submit" class="submit" /></td></tr>
			</table>
		<?php
		}
		?>
		</div>
	</div>
</body>
</html>