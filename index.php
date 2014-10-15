<?php 
session_start(); 
?>
<html>
<body>
<form action="main.php" method="post">
Name: <input type="text" name="name">
Password: <input type="password" name="pass">
<input type="submit" value="Log In">
</form>
</br>
<a href="add_user.php">Add user</a>
</body>
</html>
