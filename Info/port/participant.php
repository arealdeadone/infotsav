<?php require_once('connect.php');?>
<html>
<body>
<form action="partvalidform.php" method="POST">
<table>
<tr>
<td>Name*</td>
<td><input type="text" placeholder="Name" name="name" /></td>
</tr>
<tr>
<td>College*</td>
<td><input type="text" placeholder="College" name="college" /></td>
</tr>
<tr>
<td>Phone Number*</td>
<td><input type="text" placeholder="Phone Number" name="phone" /></td>
</tr>
<tr>
<td>Email id*</td>
<td><input type="text" placeholder="College" name="email" /></td>
</tr>
<tr>
<td>Transaction Id</td>
<td><input type="text" placeholder="Transaction Id" name="trans" /></td>
</tr>
<tr>

<td><input type="submit" value="Submit" name="submit" /></td>
</tr>
</form>
</body>
</html>
