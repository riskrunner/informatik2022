<!DOCTYPE html>
<html>

<title>KSL-Leihbibliothek</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-grey w3-animate-left" style="z-index:3;width: 300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="websiteicon.png" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Reservieren</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="/test/etst.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white">Sortiment</a> 
    <a href="https://www.tu.berlin/ub/" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Universitäts-Bibliothek</a>
  </div>
  
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

<!-- Header -->
<header id="header">
  <a href="#"><img src="placeholder.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
  <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
  <div class="w3-container">
  <h1><b>Reservieren:</b></h1>
</header>

<body>

<!-- Reservier-Formular -->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$DBname = "leihbuechereimysqldb";

$conn = new mysqli($servername, $username, $password, $DBname);

$ObjId=0;
$Bool = FALSE;
$x=0;
for($x=0; $x<=40; $x++)  {
  if(isset($_GET['resbtn_'.$x])){
      $ObjId = $x;
      break;
  }
}

#Deklarationen
$BestandName = "";
$ResObjTyp = "Medien";

$sqlGetBestandName = "SELECT NameObj, ObjTyp, IDObj FROM tabellebuechereibestand WHERE IDObj = $ObjId"; #Name, Typ und ID werden erfasst und gespeichert.

if($result = $conn->query($sqlGetBestandName)){
    if($result->num_rows>0){
        while($row=$result->fetch_array()){
            $BestandName = $row['NameObj'];
            $ObjTyp=(int)$row['ObjTyp'];
            $sqlMedium = "SELECT NameMedienArt FROM `tabellemedienarten` WHERE IDMedienArt = $ObjTyp";
            $QueryOutput = $conn->query($sqlMedium);
            $QOArray = $QueryOutput->fetch_array();
            $ResObjTyp = $QOArray['NameMedienArt'];
        }
    }
}

$datetoday = new DateTime();
$abgabe_datum = date_add($datetoday,date_interval_create_from_date_string("14 days"));
$Datum = date_format($abgabe_datum, 'Y-m-d');
#Per 'echo' Befehl wird der "Reservieren" bereich ausgegeben. HTML versteht den Text dabei sofort als Anweisungen, die Umgewandelt werden. 
echo "<div class=\"w3-container w3-padding-large w3-dark-blue\">";
    echo "<h4 id=\"Resvrn\"><b>Reservieren:</b></h4>";
    echo "<h5>Reservierte Medien können nur vor Ort in der Bibliothek abgeholt werden</h5>";
    echo "<hr class=\"w3-opacity\">";
    echo "<form id=\"res_form\" action=\"reservieren.php\" method=\"get\">";
      echo "<div class=\"w3-section\">";
        echo "<label>" . $ResObjTyp . " Name:</label>";
        echo "<input class=\"w3-input w3-border\" type=\"text\" name=\"BestandName\" required value=\"" . $BestandName . "\">"; #Der Inhalt des Feldes wird in die Adresszeile eingetragen.
      echo "</div>";
      echo "<div class=\"w3-section\">";
        echo "<label> Deine Kunden-ID:</label>";
        echo "<input class=\"w3-input w3-border\" type=\"text\" name=\"IDResKunde\" required placeholder = \"Deine KundenID\">";
      echo "</div>";
      echo "<input type=\"submit\" value=\"Reservieren\" name=\"resvrn_btn\" class=\"w3-button w3-black w3-margin-bottom\">";
    echo "</form>";
echo "</div>";
?>

<?php

if(isset($_GET['resvrn_btn'])){

$servername = "localhost";
$username = "root";
$password = "";
$DBname = "leihbuechereimysqldb";

$conn = new mysqli($servername, $username, $password, $DBname);

if(isset($_GET['BestandName'])){          #Aus der Adresszeile (wenn gegeben) werden BestandName und KundenID in Strings gespeichert
    $Bestandname = $_GET['BestandName'];  
}
if(isset($_GET['IDResKunde'])){
    $KundenID = $_GET['IDResKunde'];
}

$sqlcheckbestandname = "SELECT * FROM tabellebuechereibestand WHERE NameObj = '$Bestandname'"; #"BestandName" ist der bei der Reservierung eingegebene Name wie z.B. eines Buches. Aus der Tabelle die den Bestand enthält werden alle Informationen der so benannten Elemente ausgewählt.  
if($resultcheckbestandname = $conn->query($sqlcheckbestandname)){
    if($resultcheckbestandname->num_rows>0){
        while($rowcheckbestandname=$resultcheckbestandname->fetch_array()){     #Die Informationen zum Objekt werden ausgewählt
            $IDResObj = (int)$rowcheckbestandname['IDObj'];     
            $ObjTyp=(int)$rowcheckbestandname['ObjTyp'];
            $sqlMedium = "SELECT NameMedienArt FROM `tabellemedienarten` WHERE IDMedienArt='$ObjTyp'";
            $QueryOutput = $conn->query($sqlMedium);
            $QOArray = $QueryOutput->fetch_array();
            $ResObjTyp = (string)$QOArray['NameMedienArt'];
            $artikelArray = array(    #Welcher Artikel gehört zu dieser Kategorie?
                "Buch" => "das",
                "Film auf Video" => "den",
                "DVD" => "die",
                "Zeitschrift" => "die",
                "Musik-CD" => "die",
            );
        }
    }
    else{
        echo "<script>";
        echo "window.alert(\"Leider haben wir momentan keine Objekte mit diesem Namen im Bestand. Überprüfen sie eventuell die Schreibweise vom Namen.\")"; #Popupfenster mit der Information das ein Objekt nicht gefunden werden konnte.
        echo "</script>";
    }
}

$sqlcheckresstatus = "SELECT * FROM tabellebuechereibestand WHERE NabeObj = '$BestandName'";
if($resultcheckresstatus = $conn->query($sqlcheckresstatus)){
  if($resultcheckresstatus->num_rows>0){
      while($rowcheckresstatus=$resultcheckresstatus->fetch_array()){
        if($rowcheckresstatus['ObjResStats'] == 0){ #wenn ein Element reserviert ist wird dies in der Datenbank vermerkt, indem "ObjResStatus" auf 1 gesetzt wird
          echo "<script>";
          echo "window.alert(\"Leider kann dieses Objekt zurzeit nicht reserviert werden, da jemand anderes dies schon getan hat.\")";  #Popupfenster mit Benachrichtigung
          echo "</script>";
        }
      }
}
}

$sqlcheckkundenID = "SELECT * FROM tabellekunden WHERE IDKunde = $KundenID";
if($resultcheckkundenID = $conn->query($sqlcheckkundenID)){
    if($resultcheckkundenID->num_rows>0){
        while($rowcheckbestandname=$resultcheckkundenID->fetch_array()){    #Die KundenID wird überprüft. Ohne eine gültige KundenID kann kein Buch reserviert oder ausgeliehen werden.
            $IDResKunde = $rowcheckbestandname['IDKunde'];  
            $FullNameResKunde = (string)$rowcheckbestandname['VornameKunde'] . " " . (string)$rowcheckbestandname['NachnameKunde'];
        }
    }
    else{
        echo "<script>";
        echo "window.alert(\"Leider ist dies keiene gültige Kunden_ID. Falls sie ein regisitrierter Kunde sind, überprüfen sie ihre eingegebene Kunden-ID. Ansonsten können sie sich gerne bei uns vor Ort registrieren.\")";
        echo "</script>";
    }
}


$sqlresinput = "UPDATE tabellebuechereibestand SET ObjResStatus=1  WHERE IDObj = $IDResObj";  #Der Reservierstatus eines Objektes wird aktualisiert.
if (1===1) {
    echo "<script>";            #Ein Popfenster bestätigt die Reservierung
      $mes = $FullNameResKunde . ", sie haben erfolgreich " . $artikelArray[$ResObjTyp] . " " . $ResObjTyp . " " . $Bestandname . " reserviert."; 
      echo "window.alert(\"$mes\")";
    echo "</script>";
} else {
  echo "Error: " . $sqlresinput . "<br>" . $conn->error;
}

}
?>

<footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>Hier unten befindet sich kein weiterer Inhalt, das ist hier das Ende der Seite.</p>
    </div>
  
    <div class="w3-third">
      <h3>NEWS</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="placeholder.png" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="placeholder.png" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Ipsum</span><br>
          <span>Praes tinci sed</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third">
      <h3>Contact us</h3>
      <h5>jk pls dont</h5>
      <p>
        email@email.com </br>
        030-1234567   </br>
        Berlin, GERMANY
      </p>
    </div>

  </div>
  </footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>



</html>