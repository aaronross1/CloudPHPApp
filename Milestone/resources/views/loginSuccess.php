<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login Success</title>
</head>
<body>
<h2> Hello!</h2>

<?php
echo "Login successful as " . $username;
?>
<br>
<br>
<a href="{{ url('/home') }}">Go Home</a>
</body>
</html>