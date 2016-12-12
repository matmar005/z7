<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";


  if(empty($_POST['firstname'])){
   $error1 = true;
   echo"Please enter your first name.<br>";}
    else{$error1=false;}
 
  if(empty($_POST['secondname'])){
   $error2 = true;
   echo"Please enter your second name.<br>";}
  else{$error2=false;}
    
    if(empty($_POST['user'])){
   $error5 = true;
   echo"Please enter your login.<br>";}
    else{$error5=false;}
 
  if(empty($_POST['pass'])){
   $error6 = true;
   echo"Please enter your password.<br>";}
  else{$error6=false;}
  
  
  
  // if there's no error, continue to login
  if ($error1==false && $error2==false && $error5==false && $error6==false) {
   
 mkdir($_POST['user'],0777, true);
 chmod($_POST['user'],0777);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO users (user, pass,Imie, Nazwisko) VALUES ('{$_POST['user']}','{$_POST['pass']}','{$_POST['firstname']}', '{$_POST['secondname']}')";
if ($conn->query($sql) === TRUE) {
    echo "Pomyślnie dodano ". $_POST['user'];
	echo"<br><a href='index.php'>Powrót do strony głównej</a>";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();


  }
  

?>