<?php 
include("conn.php"); 

// Inserez un articol in tabelul activitati 
$datact = date("Y-m-d"); 
mysqli_query($cnx,"INSERT INTO activitati VALUES (null,'a','$datact')"); 
$id = mysqli_insert_id($cnx); 
$cod = md5('proiect'.$id); 

// Corectez codul din baza 
mysqli_query($cnx,"UPDATE activitati set codaut = '$cod' WHERE id = $id"); 
$cnx->close(); 
echo '{"codact": "' . $cod . '"}'; // Obiect in format JSON 
?>