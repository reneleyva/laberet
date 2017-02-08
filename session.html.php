<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
</head>
<body>
	<h2>New User Registration</h2>
	<p><font color="black" size="+1"><tt><b>*Obligatories fieds</b></tt></font>
	</p>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
		<table border="0" cellpadding="0" cellspacing="5">
			<tr>
				<td align="right">
				<p>Username</p>
				</td>
				<td>
					<input type="text" name="new_username" size="25"/>
					<font color="black" size="+1"><tt><b>*</b></tt></font>
				</td>
			</tr>

			<tr>
				<td align="right">
					<p>Full Name</p>
				</td>
				<td>
					<input type="text" name="new_realname" size="25"/>
					<font color="black" size="+1"><tt><b>*</b></tt></font>

				</td>
			</tr>
			<tr>
				<td align="right">
					<p>E-mail address</p>
				</td>
				<td>
					<input type="text" name="new_email" size="25">
					<font color="black" size="+1"><tt><b>*</b></tt></font>
				</td>
			</tr>
			<tr>
				<td>
					<p>Password</p>
				</td>
				<td>
					<input type="text" name="new_pass" size="25"/>
					<font color="black" size="+1"><tt><b>*</b></tt></font>
				</td>
			</tr>
		</table>
	</form>

</body>
</html>