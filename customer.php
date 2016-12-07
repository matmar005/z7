<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 if(isSet($_POST['user_cust']) ) { 
$user=$_POST['user_cust']; // login z formularza
$pass=$_POST['pass_cust']; // hasło z formularza
  if(empty($user)){
   $error1 = true;
   echo"Please enter your login.";}
    else{$error1=false;}
 
  if(empty($pass)){
   $error2 = true;
   echo"Please enter your password.";}
  else{$error2=false;}
  // if there's no error, continue to login
  if ($error1==false && $error2==false) {
   
 
   $sql="SELECT * FROM users WHERE user='$user'";
$result = $conn->query($sql);
if ($result->num_rows == 1 ) {
    while($row = $result->fetch_assoc()) {
		$mail=$row["user"];
        if($row['pass']==$pass) {
		echo "<h2>Witamy ".$row['Imie']." ".$row[Nazwisko]."</h2>";

		$browser_type = $_SERVER['HTTP_USER_AGENT'];

		$ip = $_SERVER["REMOTE_ADDR"];
		echo "<br>Adres IP hosta: ".$ip;

//okreslanie geolokalizacji za pomoca strony www

function ip_details($ip) {
$json = file_get_contents("http://ipinfo.io/{$ip}/geo");
$details = json_decode($json);
return $details;
}
$details = ip_details($ip);
$COUNTRY=$details -> country; 
echo $COUNTRY;
		
   } else {
   echo "Incorrect Credentials, Try again...";
   }
    }
  }
  //else{echo"błąd";}
 
 }
 }


$conn->close();
?>
</BODY>
</HTML>