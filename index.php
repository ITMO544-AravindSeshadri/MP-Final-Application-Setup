<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>My Page</title>
<meta charset="utf-8">
<style>
#MyForm
{
text-align:center;
border-style: 2px outline;
background-color:#FFCBA4;
}
</style>
</head>
<body bgcolor="#96C8A2">
<h2 style="text-align:center;">Input Form</h2>
<form id="MyForm" enctype="multipart/form-data" action="submit.php" method="POST">
Enter Email: <input type="email" name="useremail"><br>
Enter Phone Number: <input type="phone" name="phone"><br>
<input type="hidden" name="MAX_FILE_SIZE" value="3000000"><br>
Load Image: <input type="file" name="userfile"><br>
<input type="submit" value="Submit Form" />
</form>
<br>
<br>
<a href="introspection.php">Click here to take a backup of the databatase!</a>
<!--<form enctype="multipart/form-data" action="gallery.php" method="POST">
Enter email of the Gallery to find: <input type="email" name="email"><br>
<input type="submit" value="View Gallery" id="gal" />
</form>-->
</body>
</html>