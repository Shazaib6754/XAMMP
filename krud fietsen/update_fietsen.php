<?php
 
    echo "<h1>Update fietsen</h1>";
    require_once('functions.php');
 
    // Test of er op de wijzig-knop is gedrukt
    if(isset($_POST['btn_wzg'])){
        Updatefietsen($_POST);
 
        //header("location: crud_fietsenen.php");
    }
 
    if(isset($_GET['fietsen'])){  
        // Haal alle info van de betreffende fietsen $_GET['fietsen']
        $fietsen = $_GET['fietsen'];
        $row = Getfietsen($fietsen);
   
?>
 
<html>
    <body>
        <form method="post">
        <br>
        <input type="hidden" name="fietsen" value="<?php echo $row['fietsen'];?>"><br>
        merk:<input type="" name="merk" value="<?php echo $row['merk'];?>"><br>
        type: <input type="text" name="type" value="<?= $row['type']?>"><br>
        prijs: <input type="text" name="prijs" value="<?= $row['prijs']?>"><br>
        <?php
            //dropDownBrouwer('brouwcode', $row['brouwcode'] );
        ?>
 
        <!---Brouwcode: <input type="text" name="brouwcode" value="<?= $row['fietsen']?>">-->
        <br><br>
         <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
        <br><br>
        <a href='crud_fietsen.php'>Home</a>
    </body>
</html>
 
<?php
    } else {
        "Geen fietsen opgegeven<br>";
    }
?>