<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<title>Register successful</title>
</head>
<body>
<h2> Hello!</h2>

<?php
echo "Register successful as " . $username;
?>
<br>
<br>
<a href="{{ url('/login') }}">Login</a>
</body>
</html>