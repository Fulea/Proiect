<?php 
include("conn.php"); 

// Am primit parametrul cod: 
$cod = $_REQUEST['cod']; 

// Caut articolul $cod in tabelul activitati 
$result = mysqli_query($cnx, "SELECT * FROM activitati WHERE codaut = '$cod'"); 
if (mysqli_num_rows($result) > 0) { 
    // gasit 
    $row = mysqli_fetch_assoc($result); 
    $idactivi = $row["id"]; 
    echo $idactivi . '<br>'; 
    // Caut articolele corespunzatoare in participanti 
    $articole = []; 
    $cda = "SELECT idpart, lat, lng, baterie FROM participanti WHERE idactivi = $idactivi"; 
    echo $cda . "<br>"; 
    if ($rez = mysqli_query($cnx, $cda)) { 
        while ($linie = mysqli_fetch_assoc($rez)) { 
            $articole[] = $linie; 
        } 
    } 
} 
else { 
    echo "Articol absent!"; 
} 
if ($result) { 
    mysqli_free_result($result); 
} 
if ($rez) { 
    mysqli_free_result($rez); 
} 
$cnx->close(); 
echo json_encode($articole); 
?>