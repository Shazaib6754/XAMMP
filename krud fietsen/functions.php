<?php
// auteur: Shazaib Raja
// Function: functies
 
function fietsenmaker(){
    $txt = "
    <h1>fietsenmaker</h1>
    <nav>
    <a href='insert_fietsen.php'>Nieuw fietsentje toevoegen</a>
    </nav> ";
    echo $txt;
    $result = GetData("fietsen");
    Printfietsenmaker($result);
}
 
function GetData($table) {
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    return $query->fetchAll();
}
 
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fietsenmaker";
 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
 
function Printfietsenmaker($result){
    $table = "<table border=1px>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";
    }
    foreach ($result as $row){
        $table .= "<tr>";
        foreach ($row as $cell){
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "<td>
        <form method='post' action='update_fietsen.php?fietsencode=$row[merk]'>      
            <button name='wzg'>Wijzigen</button>    
        </form>
        </td>";
        $table .= "<td>
        <a href='delete_fietsen.php?merk=$row[merk]'>Delete</a>
        </td>";
    }
    $table .= "</tr></table>";
    echo $table;
}
 
function Insertfietsen($post) {
    try {
        $conn = ConnectDb();
        $query = $conn->prepare("INSERT INTO fietsen (merk, type, prijs) VALUES (:merk, :type, :prijs)");
        $query->execute([
            'merk' => $post['merk'],
            'type' => $post['type'],
            'prijs' => $post['prijs'],
        ]);
    } catch (PDOException $e) {
        echo "Insert failed: " . $e->getMessage();
    }
}
 
function DeleteFietsen($fietsencode){
    try {
        $conn = ConnectDb();
        $query = $conn->prepare("DELETE FROM fietsen WHERE merk = :merk");
        $query->execute(['merk' => $fietsencode]);
    } catch(PDOException $e) {
        echo "Delete failed: " . $e->getMessage();
    }
}
 
function Getfietsen($fietsen){
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM fietsen WHERE merk = :merk");
    $query->execute(['merk' => $fietsen]);
    return $query->fetch();
}
?>