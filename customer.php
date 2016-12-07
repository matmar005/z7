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
$ip = $_SERVER["REMOTE_ADDR"];
		
//okreslanie geolokalizacji za pomoca strony www

function ip_details($ip) {
$json = file_get_contents("http://ipinfo.io/{$ip}/geo");
$details = json_decode($json);
return $details;
}
$details = ip_details($ip);
$COUNTRY=$details -> country; 

   
   $conn2 = new mysqli($servername, $username, $password, $dbname);
// Check DB connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}   
   
   $sql="SELECT * FROM users WHERE user='$user'";
$result = $conn->query($sql);
if ($result->num_rows == 1 ) {
    while($row = $result->fetch_assoc()) {
		$userdb=$row["user"];
        if($row['pass']==$pass) {
		echo "<h2>Witamy ".$row['Imie']." ".$row[Nazwisko]."</h2>";

		echo "<br>Adres IP hosta: ".$ip;

$sql2 = "INSERT INTO logi (stan, user, ip, lok) VALUES ('1','$userdb' ,'$ip', '$COUNTRY')";
if ($conn2->query($sql2) === TRUE) {
    //echo "Record updated successfully";
$conn2->close();
	} else {
    echo "Error updating record: " . $conn2->error;
$conn2->close();
	}

		
   } else {
   echo "Incorrect Credentials, Try again...";
   
$sql2 = "INSERT INTO logi (stan, user, ip, lok) VALUES ('0','$userdb' ,'$ip', '$COUNTRY')";
if ($conn2->query($sql2) === TRUE) {
    //echo "Record updated successfully";
$conn2->close();
	} else {
    echo "Error updating record: " . $conn2->error;
$conn2->close();
	}
   
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