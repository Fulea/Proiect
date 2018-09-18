<?php 
include("conn.php"); 

// Am primit urmatorii parametri: 
$cod = $_REQUEST['cod']; 
$idpart = $_REQUEST['idpart']; 
$lat = $_REQUEST['lat']; 
$lng = $_REQUEST['lng']; 

// Caut articolul $cod in tabelul activitati 
$result = mysqli_query($cnx, "SELECT * FROM activitati WHERE codaut = '$cod'"); 
if (mysqli_num_rows($result) > 0) { 
    // gasit 
    $row = mysqli_fetch_assoc($result); 
    $idactivi = $row["id"]; 
    // Creez un articol in participanti 
    $datatimp = date('Y-m-d H:i:s'); 
    $cda = "INSERT INTO participanti VALUES (null,$idactivi,'$idpart', $lat, $lng, '$datatimp', 100)"; 
    mysqli_query($cnx, $cda); 
} 
else { 
    echo "Articol absent!"; 
} 
if ($result) {
    mysqli_free_result($result); 
} 
$cnx->close(); 
?>