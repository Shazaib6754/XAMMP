<?php
 
var_dump($_POST);
 
require_once('functions.php');
 
if(isset($_POST['btn_ins'])){
 
Insertfietsen($_POST);
echo'<script>alert("merk:" '. $_POST['merk'] . 'is toegevoegd")</script>';
}
 
 
?>
 
 
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert fietsen</title>
</head>
<body>
    <h2>Insert fietsen</h2>
    <form action="insert_fietsen.php" method="post">
        <label for="merk">merk:</label>
        <input type="text" id="merk" name="merk" required><br><br>
 
        <label for="type">type:</label>
        <input type="text" id="type" name="type" required><br><br>
 
        <label for="prijs">prijs:</label>
        <input type="text" id="prijs" name="prijs" required><br><br>
 
 
        <label for="brouwerij">Kies een fiets:</label>
        <select id="brouwerij" name="brouwerij" required>
            <option value="E-bike">E-bike</option>
            <option value="Giant">Giant</option>
            <option value="sparta">sparta</option>
        </select><br><br>
 
        <input type="submit" value="Insert">
    </form>
</body>
</html>