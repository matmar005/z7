<html>

<head>
<title>CRM</title>
</head>

<style>
body {
    background-image: url("Logo.png");
	background-position: left top;
	background-repeat: no-repeat;
	background-size: 600px 350px;
	}

#log_cust{
	
	position: absolute;
	left: 450px;
	top: 450px;
	
}

#reg_cust{
	position: absolute;
	left: 450px;
	top: 550px;
	
}
</style>


<body>



<div id='log_cust'>
<form method="post" action="customer.php">
Login customer:<input type="text" name="user_cust" maxlength="20" size="20" style="position: absolute;left: 106px;"><br>
Hasło:         <input type="password" name="pass_cust" maxlength="20" size="20" style="position: absolute;left: 106px;"><br>
<input type="submit" value="Customer Login" style="position: absolute;left: 100px;"/>
</form>
</div>

<div id="reg_cust">
Nie masz jeszczcze konta?<br>
Zarejestruj się!
<form method="post" action="register.php">
Imię:<input type="text" name="firstname" maxlength="20" size="20" style="position: absolute;left: 106px;"><br>
Nazwisko:<input type="text" name="secondname" maxlength="20" size="20" style="position: absolute;left: 106px;"><br>
Login:<input type="text" name="user" maxlength="20" size="20" style="position: absolute;left: 106px;"><br>
Hasło:<input type="password" name="pass" maxlength="20" size="20" style="position: absolute;left: 106px;"><br>
<input type="submit" value="Register" style="position: absolute;left: 100px;"/>
</form>
</div>


</body>
</html>