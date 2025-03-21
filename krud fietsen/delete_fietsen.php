<?php
// Shazaib Raja
// functie: verwijder een fietsen op basis van de fietsencode
include 'functions.php';
 
// Haal fietsen uit de database
if(isset($_GET['fietsen'])){
    DeleteFietsen($_GET['fietsen']);
 
    echo '<script>alert("fietsencode: ' . $_GET['fietsen'] . ' is verwijderd")</script>';
    echo "<script> location.replace('crud_fietsen.php'); </script>";
}
?>