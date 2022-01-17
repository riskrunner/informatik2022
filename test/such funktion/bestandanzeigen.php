<html>
<body>

<?php

//require_once "C:\xampp\php\pear\server.php";

$servername = "localhost";
$username = "root";
$password = "";
$DBname = "leihbuechereimysqldb";

$conn = new mysqli($servername, $username, $password, $DBname);

if ($conn->connect_error){
    die("Error connecting to server: " . $conn->connect_error);
}
echo "connection established";

//$fname = $conn->real_escape_string($_REQUEST["vorname"]);
//$lname = $conn->real_escape_string($_REQUEST["lname"]);
//$anschrift = $conn->real_escape_string($_REQUEST["anschrift"]);
//
//$sql = "INSERT INTO tabellekunden (VornameKunde, NachnameKunde, AnschriftKunde) VALUES ('$fname', '$lname', '$anschrift')";

$sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand`";
if($result = $conn->query($sqlBestandSearch)){
    if($result->num_rows>0){
        echo "<table>";
            echo "<tr>";
                echo "<th>ID-Nummer</th>";
                echo "<th>Name</th>";
                echo "<th>Beschreibung</th>";
                echo "<th>Medium</th>";
                echo "<th>Leih-Status</th>";
                echo "<th>Reservierungen</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                $ObjTyp=(int)$row['ObjTyp'];
                $sqlMedium = "SELECT NameMedienArt FROM `tabellemedienarten` WHERE IDMedienArt=$ObjTyp";
                $QueryOutput = $conn->query($sqlMedium);
                $QOArray = $QueryOutput->fetch_array();
                $ResObjTyp = $QOArray['NameMedienArt'];
                echo "<th>" . $row['IDObj'] . "</th>";
                echo "<th>" . $row['NameObj'] . "</th>";
                echo "<th>" . $row['ObjBeschreibung'] . "</th>";
                echo "<th>" . $ResObjTyp . "</th>";
                echo "<th>" . $row['ObjLeihStatus'] . "</th>";
                echo "<th>" . $row['ObjResStatus'] . "</th>";
            echo "</tr>";
        }
        echo "</table>";
        $result->free();
    } else{
        echo "Kein passender Bestand gefunden.";
    }
} else{
    echo "ERROR: Failed to execute $sql. " . $conn->error;
}

//if ($conn->query($sql) === TRUE) {
//    echo "Neuer Kunde erfolgreich hinzugefügt: " . $fname . $lname . $anschrift;
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

$conn->close();

?>

</body>
</html>