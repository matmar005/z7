<?php 
if (is_uploaded_file($_FILES['plik']['tmp_name'])) 
{ 
echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>'; 
move_uploaded_file($_FILES['plik']['tmp_name'], 
$_SERVER['DOCUMENT_ROOT']."/z7/".$_POST['cat']."/".$_FILES['plik']['name']); 
} 
else {echo 'Błąd przy przesyłaniu danych!';} 

?>