<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<a href="{{ url('/') }}">Go Home</a>
</body>
</html>