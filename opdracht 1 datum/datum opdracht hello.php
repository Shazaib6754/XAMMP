<?php
//Auteur: Shazaib Raja
//funnctie: Oefening

// Huidige uur in 24-uurs formaat
$current_hour = date("17");

// Controleer het tijdsbereik en toon de corresponderende boodschap
if ($current_hour >= 6 && $current_hour < 12) {
    // Ochtend
    echo "Het is morgen!<br>";
} elseif ($current_hour >= 12 && $current_hour < 18) {
    // Middag
    echo "Het is middag!<br>";;
} elseif ($current_hour >= 18 && $current_hour < 24) {
    // Avond
    echo "Het is avond!<br>";
} else {
    // Nacht
    echo "Het is nacht!<br>";
}

?>