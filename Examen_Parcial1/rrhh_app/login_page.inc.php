<h2>Login</h2>
<form action="login.php" method="post">
	<p><label class="label" for="usrname">User Name:</label>
	<input id="usrname" type="text" name="usrname" size="30" maxlength="50" value="<?php 
		if (isset($_POST['usrname'])) echo $_POST['usrname']; ?>" > </p>
	<br>
	<p><label class="label" for="psword">Password:</label>
	<input id="psword" type="password" name="psword" size="12" maxlength="40" value="<?php 
		if (isset($_POST['psword'])) echo $_POST['psword']; ?>" ><span>&nbsp;Between 8 and 40 characters.</span></p>
	<p>&nbsp;</p><p><input id="submit" type="submit" name="submit" value="Login"></p>
</form><br>
