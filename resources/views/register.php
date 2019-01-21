<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>

<form action = "registeruser" method="POST">
	<input type="hidden" name="_token" value = "<?php echo csrf_token() ?>"/>
	<h2> Welcome to Job Match! Register Below</h2>
	<br>
	<table>
		
		<tr>
			<td>First Name </td>
			<td><input type="text" name="fName"/></td>
		</tr>
		<tr>
			<td>Last Name </td>
			<td><input type="text" name="lName"/></td>
		</tr>
		<tr>
			<td>Username </td>
			<td><input type="text" name="username"/></td>
		</tr>
		<tr>
			<td>Email </td>
			<td><input type="email" name="email"/></td>
		</tr>
		<tr>
			<td>Phone </td>
			<td><input type="text" name="phone"/></td>
		</tr>
		<tr>
			<td>Street </td>
			<td><input type="text" name="street"/></td>
		</tr>
		<tr>
			<td>State </td>
			<td><input type="text" name="state"/></td>
		</tr>
		<tr>
			<td>Zip </td>
			<td><input type="text" name="zip"/></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" name="password"/></td>
		</tr>
		<tr>
			<td>Confirm Password: </td>
			<td><input type="password" name="password"/></td>
		</tr>
		<tr>
			<td colspan = "2" align="center">
				<input type = "submit" value ="Login" />
			</td>
		</tr>
	</table>
</form>
</body>
</html>