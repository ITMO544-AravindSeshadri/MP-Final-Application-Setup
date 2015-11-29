<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>My Page</title>
<meta charset="utf-8">
<style>
.MyForm
{
text-align:center;
border-style:2px solid;
border-radius:20px;
background-color:#FFCBA4;
margin-left:150px;
margin-right:150px;
}
</style>
</head>
<body bgcolor="#96C8A2">
<h2 style="text-align:center;">Input Form</h2>
<form class="MyForm" enctype="multipart/form-data" action="submit.php" method="POST">
<br><br>Enter Email: <input type="email" name="useremail"><br><br>
Enter Phone Number: <input type="phone" name="phone"><br><br>
<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
Load Image: <input type="file" name="userfile"><br><br>
<input type="submit" value="Submit Form" /><br><br>
</form>
<br>
<br>
<a href="introspection.php">Click here to take a backup of the databatase!</a>
<form class="MyForm" enctype="multipart/form-data" action="gallery.php" method="POST">
<br><br>Enter email of the Gallery to find: <input type="email" name="email"><br><br>
<input type="submit" value="View Gallery" id="gal" /><br><br>
</form>
</body>
</html>